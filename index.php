<?php
require_once 'Autoloader.php';
Autoloader::register();
new Api();


/** 
 * Api class is a class of api-tasks.
 * 
 * Api accepts paths and dispatches the routes. 
 * 
 * 
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class Api
{
	private static $db;
	
	/** 
	 * getDb:
	 * returns PDO $db.
	 * 
	 * @param none
	 * @return $db
	 * @access public
	 */ 
	public static function getDb()
	{
		return self::$db;
	}
	/** 
	 * __construct:
	 * constructs Api object to dispacth the routes and handle response which returns.
	 * 
	 * @param none
	 * @return $db
	 * @access public
	 */ 
	public function __construct()
	{
		

		self::$db = (new Database())->init();

		$uri = strtolower(trim((string)$_SERVER['PATH_INFO'], '/'));
		$httpVerb = isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : 'cli';

		$wildcards = [
			':any' => '[^/]+',
			':num' => '[0-9]+',
		];
		$routes = [
			'get constructionStages' => [
				'class' => 'ConstructionStages',
				'method' => 'getAll',
			],
			'get constructionStages/(:num)' => [
				'class' => 'ConstructionStages',
				'method' => 'getSingle',
			],
			'post constructionStages' => [
				'class' => 'ConstructionStages',
				'method' => 'post',
				'bodyType' => 'ConstructionStagesCreateUpdate'
			],
			'patch constructionStages/(:num)' => [
				'class' => 'ConstructionStages',
				'method' => 'patch',
				'bodyType' => 'ConstructionStagesCreateUpdate'
			],
			'delete constructionStages/(:num)' => [
				'class' => 'ConstructionStages',
				'method' => 'delete'
			],
		];

		$response = [
			'error' => 'No such route',
		];

		if ($uri) {

			foreach ($routes as $pattern => $target) {
				$pattern = str_replace(array_keys($wildcards), array_values($wildcards), $pattern);
				
				if (preg_match('#^'.$pattern.'$#i', "{$httpVerb} {$uri}", $matches)) {				
					$params = [];
					array_shift($matches);
					if ($httpVerb === 'post' or $httpVerb === 'patch') {
						$jsonData = file_get_contents('php://input');
						if(ValidationChecker::jsonValidator($jsonData) === false){
							$response = new ResultBody();
							$response->setResult('Failed');
							$response->pushCause('JSON could not be validated.');
							break;
						}
						$data = json_decode($jsonData);
						
						$params = [new $target['bodyType']($data)];
						
					}
					$params = array_merge($params, $matches);
					$response = call_user_func_array([new $target['class'], $target['method']], $params);
					break;
				}
			}

			echo json_encode($response, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		}
	}
}



?>
