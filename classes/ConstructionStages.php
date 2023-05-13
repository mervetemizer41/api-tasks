<?php


/** 
 * ConstructionStages is a class of VERO DS playground api-tasks.
 * 
 * ConstructionStages has a member field db 
 * and does jobs like CRUD operations requested by index routes. 
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class ConstructionStages
{
	private $db;

	 /** 
	 * __construct:
	 * constructs ConstructionStages object, 
	 * initializes db member field by using Api.
	 * 
	 * @param none
	 * @return ConstructionStages 
	 * @access public
	 */ 
	public function __construct()
	{
		$this->db = Api::getDb();
	}

	
	 /** 
	 * getAll: 
	 * fetches all the records in the database.
	 *
	 * @param none
	 * @return array
	 * @access public
	 */ 
	public function getAll()
	{
		$stmt = $this->db->prepare(QueryBuilder::getAllQuery());
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


 	/** 
	 * getSingle: 
	 * fetches matching records,
	 * if everything is fine with api;
	 * a single record is fetched from database.
	 * 
	 *
	 * @param int $id
	 * @return array
	 * @access public
	 */ 
	public function getSingle($id)
	{
	
		$stmt = $this->db->prepare(QueryBuilder::getSingleQuery());
		$stmt->execute(['id' => $id]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/** 
	 * post:
	 * calls validation methods those belong ValidationChecker,
	 * validates if the incoming data is exact;
	 * if not assign defaults using methods those belong Defaults class.
	 * If everything is fine with incoming data;
	 * a single record is saved into the database.
	 * 
	 *
	 * @param ConstructionStagesCreate $data
	 * @return array
	 * @access public
	 */ 
	public function post(ConstructionStagesCreateUpdate $data)
	{	
		$validationChecker = new ValidationChecker();
		
		$validationChecker->init(null, $data);
		
		
		
		if($validationChecker->checkDetail() === false){
			
			return $validationChecker->resultBody;
		}
		
		Defaults::assignDefaults($data, $validationChecker->contextData, $validationChecker->checkList);
		
		$exc_array = array();
		$stmt = $this->db->prepare(QueryBuilder::getInsertQuery($data, $exc_array));
		$stmt->execute($exc_array);
		return $this->getSingle($this->db->lastInsertId());
	}
	
	/** 
	 * patch:
	 * requests record to be updated,
	 * calls validation methods those belong ValidationChecker,
	 *  matches persistent and new, validates if the incoming data is exact;
	 * if not assign defaults using methods those belong DefaultAssignment.
	 * If everything is fine with incoming data;
	 * a single record that is defined with $id is updated.
	 * 
	 *
	 * @param ConstructionStagesUpdate $data
	 * @param int $id
	 * @return array
	 * @access public
	 */ 
	public function patch(ConstructionStagesCreateUpdate $data, $id)
	{	
		
		$stmt = $this->db->prepare(QueryBuilder::getSingleQuery());
		$stmt->execute(['id' => $id]);
		$persistentRaw = $stmt->fetch(PDO::FETCH_LAZY);
		$persistentData = new ConstructionStagesCreateUpdate($persistentRaw);
		
		
		
		
		$validationChecker = new ValidationChecker();
		
		$validationChecker->init($persistentData, $data);
		
		if($validationChecker->checkDetail() === false){
			
			return $validationChecker->resultBody;
		}
		
		
		
		Defaults::assignDefaults($data, $validationChecker->contextData, $validationChecker->checkList);
		
		
		
		
		$exc_array = array();
		$exc_array['id'] = $id;
		
		$stmt = $this->db->prepare(QueryBuilder::getUpdateQuery($data,$exc_array));
		
		$stmt->execute($exc_array);
		
		return $this->getSingle($id);
		
		
	}

 	/** 
	 * delete:
	 * request a single record with that has $id,
	 * updates the record's status value as 'DELLETED'.
	 *
	 * @param int $id
	 * @return array
	 * @access public
	 */ 
	public function delete($id)
	{	
		$stmt = $this->db->prepare(QueryBuilder::getSingleQuery());
		$stmt->execute(['id' => $id]);
		$persistentRaw = $stmt->fetch(PDO::FETCH_LAZY);
		$data = new ConstructionStagesCreateUpdate($persistentRaw);
		if(empty($data->name)){
			$resultBody = new ResultBody();
			$resultBody->setResult('Failed');
			$resultBody->pushCause('No related record in database.');
			return $resultBody;
		}
		if($data->status == "DELETED"){
			$resultBody = new ResultBody();
			$resultBody->setResult('Failed');
			$resultBody->pushCause('Related record is already deleted.');
			return $resultBody;
		}
		$exc_array = array();
		$exc_array['status'] = 'DELETED';
		$exc_array['id'] = $id;
		$stmt = $this->db->prepare(QueryBuilder::getDeleteQuery());
		$stmt->execute($exc_array);
		
		return $this->getSingle($id);
	}	

}
?>
