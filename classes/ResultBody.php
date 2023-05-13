<?php

/** 
 * ResultBody is a class added by Merve Temizer to api-tasks.
 * 
 * ResultBody has member fields to handle results to return
 * and result's causes.
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 

class ResultBody
{	
	
	public $result;
	public $causes;
	
	
	 /** 
	 * __construct:
	 * constructs ResultBody object that has fields with null value
	 * 
	 * @param none
	 * @return ResultBody
	 * @access public
	 */ 
	public function __construct() {
		$this->result = "";
		$this->causes = array();
	}
	 /** 
	 * pushCause:
	 * pushes a cause to causes array of ResultBody.
	 * 
	 * @param $cause
	 * @return none
	 * @access public
	 */
	public function pushCause($cause){
		array_push($this->causes, $cause);
	
	}
	 /** 
	 * setResult:
	 * sets result to the ResultBody object, usually a Failed string.
	 * 
	 * @param $result string
	 * @return none
	 * @access public
	 */
	public function setResult($result){
		$this->result = $result;
	}
		
	
}
?>
