<?php

/** 
 * QueryBuilder is a class of api-tasks added by Merve Temizer.
 * 
 * QueryBuilder returns query strings, or build them using parameters.
 * 
 * @package classes 
 * @author Merve Temizer
 * @version 0.0.0 
 * @access public  
 */ 
class QueryBuilder
{


	/** 
	 * getSingleQuery:
	 * returns PDO SQLITE query that returns a single row,
	 * according to id specified during execution in ConstructionStages class.
	 * 
	 * 
	 * @param none
	 * @return string
	 * @access public
	 */
	public static function getSingleQuery()
		{
		return "SELECT
				ID as id,
				name, 
				strftime('%Y-%m-%dT%H:%M:%SZ', start_date) as startDate,
				strftime('%Y-%m-%dT%H:%M:%SZ', end_date) as endDate,
				duration,
				durationUnit,
				color,
				externalId,
				status
			FROM construction_stages
			WHERE ID = :id
			LIMIT 1
		";
		
	}
	
	/** 
	 * getAllQuery:
	 * returns PDO SQLITE query string to fetch all the records in the database.
	 * 
	 * 
	 * @param none
	 * @return string 
	 * @access public
	 */
	public static function getAllQuery()
		{
		return "SELECT
				ID as id,
				name, 
				strftime('%Y-%m-%dT%H:%M:%SZ', start_date) as startDate,
				strftime('%Y-%m-%dT%H:%M:%SZ', end_date) as endDate,
				duration,
				durationUnit,
				color,
				externalId,
				status
			FROM construction_stages
		";
		
	}
	
	/** 
	 * getInsertQuery:
	 * returns PDO SQLITE query string to insert a new record to database.
	 * Changes the $exc_array to include parameters inside it.
	 * 
	 * 
	 * @param $data ConstructionStagesCreateUpdate
	 * @param $exc_array array
	 * @return string 
	 * @access public
	 */
	public static function getInsertQuery($data, &$exc_array)
		{	
		$exc_array = [
			'name' => $data->name,
			'start_date' => $data->startDate,
			'end_date' => $data->endDate,
			'duration' => $data->duration,
			'durationUnit' => $data->durationUnit,
			'color' => $data->color,
			'externalId' => $data->externalId,
			'status' => $data->status,
		];
			return "INSERT INTO construction_stages
			    (name, start_date, end_date, duration, durationUnit, color, externalId, status)
			    VALUES (:name, :start_date, :end_date, :duration, :durationUnit, :color, :externalId, :status)";
	}
	
	/** 
	 * getUpdateQuery:
	 * returns PDO SQLITE query string to update a record.
	 * Changes the $exc_array to include parameters inside it.
	 * 
	 * 
	 * @param $data ConstructionStagesCreateUpdate
	 * @param $exc_array array
	 * @return string 
	 * @access public
	 */
	public static function getUpdateQuery($data,&$exc_array){
	
		$set_elements = array();
		$vars = get_object_vars($data);
		foreach ($vars as $name => $value) {
				
			if (isset($data->$name)) {
				if($name == 'startDate'){
					array_push($set_elements, "start_date = :".$name." ");
				}else if($name == 'endDate'){
					array_push($set_elements, "end_date = :".$name." ");
				}else{
					array_push($set_elements, $name." = :".$name." ");
				}
				
				$exc_array[$name]=$data->$name;
			}
				

			
		}
		$set_clause = implode(', ',$set_elements); 
		return "UPDATE construction_stages ".
			   " SET ".$set_clause." WHERE ID = :id";
	}
	
	
	/** 
	 * getDeleteQuery:
	 * returns PDO SQLITE query string to update a single row,
	 * with a status deleted, to be executed in ConstructionStages class.
	 * 
	 * 
	 * @param $data ConstructionStagesCreateUpdate
	 * @param $exc_array array
	 * @return string 
	 * @access public
	 */
	public static function getDeleteQuery(){
	
			
		$query = "UPDATE construction_stages
			    SET status = :status WHERE ID = :id";
		return  $query;
		
	}
}

?>
