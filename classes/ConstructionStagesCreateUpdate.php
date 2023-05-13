<?php


/** 
 * ConstructionStagesCreateUpdate is a class modified by Merve Temizer in api-tasks.
 * 
 * ConstructionStagesCreateUpdate has member fields to handle values of a new record,
 * that is going to be validated, filled with defaults 
 * and finally recorded in the database.
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class ConstructionStagesCreateUpdate
{

	public $name;
	public $startDate;
	public $endDate;
	public $duration;
	public $durationUnit;
	public $color;
	public $externalId;
	public $status;
	
	
	/** 
	 * __construct:
	 * constructs ConstructionStagesCreate object
	 * that has fields filled with $data parameter.
	 * 
	 * 
	 * @param $data array 
	 * @return ConstructionStagesCreateUpdate
	 * @access public
	 */
	public function __construct($data) {
	
		if(empty($data) === false and is_object($data)) {

			$vars = get_object_vars($this);
			foreach ($vars as $name => $value) {

				if (empty($data->$name)===false and isset($data->$name)) {
					$this->$name = $data->$name;
				}else{
					$this->$name = null;
				}
			}
		}
		
	}
	
}
?>
