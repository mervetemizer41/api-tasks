<?php

/** 
 * Database is a class of api-tasks.
 * 
 * Database initializes an sqlite database with its file
 * if it does not exist already. Also fills the database with sample data
 * which takes place in database directory.
 * 
 * @package classes 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class Database
{
	const name = 'testDb';

	private $db;

	/** 
	 * init:
	 * constructs PDO object and initializes it with structure.
	 * 
	 * 
	 * @param none
	 * @return PDO $db 
	 * @access public
	 */
	public function init()
		{
		
		$this->db = new PDO('sqlite:'.self::name.'.db', '', '', [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		]);

		
		
		$this->createTables();
		$stmt = $this->db->query('SELECT 1 FROM construction_stages LIMIT 1');
		
		if (!$stmt->fetchColumn()) {
			$this->loadData();
		}
		
		
		return $this->db;
	}
	/** 
	 * createTables:
	 * generates table in the sqlite database initialized by init method.
	 * 
	 * 
	 * @param none
	 * @return none
	 * @access public
	 */
	private function createTables()
	{
		$sql = file_get_contents('database/structure.sql');
		$this->db->exec($sql);
		

	}
	/** 
	 * loadData:
	 * fills database with sample data.
	 * 
	 * 
	 * @param none
	 * @return none
	 * @access public
	 */
	private function loadData()
	{
	
		$sql = file_get_contents('database/data.sql');
		$this->db->exec($sql);
		
	}
}
