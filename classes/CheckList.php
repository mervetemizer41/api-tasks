<?php

/** 
 * CheckList is a class added by Merve Temizer to api-tasks.
 * 
 * CheckList has member fields to handle states during validation.
 * Class members are filled by ValidationLevel enum values.
 * Class objects are used by ConstructionStages and ValidationChecker classes.
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 

class CheckList 
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
	 * constructs CheckList object that has fields with null value
	 * 
	 * @param none
	 * @return CheckList 
	 * @access public
	 */ 
	public function __construct() {

		$vars = get_object_vars($this);

		foreach ($vars as $name => $value) {

				$this->$name = NULL;
		}
		
		
	}
}
?>
