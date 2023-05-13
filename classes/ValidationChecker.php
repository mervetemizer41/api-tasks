<?php


/** 
 * ValidationChecker is a class which is added by Merve Temizer to api-tasks.
 * 
 * ValidationChecker has methods to build a CheckList object
 * when a post or patch request is handling.
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
 
class ValidationChecker
{
	public ConstructionStagesCreateUpdate $contextData;
	
	
	public CheckList $checkList;
	
	public ResultBody $resultBody;
	

	private static $iso8601Regex = '/^(-?(?:[1-9][0-9]*)?[0-9]{4})-(1[0-2]|0[1-9])-(3[01]|0[1-9]|[12][0-9])T(2[0-3]|[01][0-9]):([0-5][0-9]):([0-5][0-9])(.[0-9]+)?(Z)?$/';
	private static $hexColorRegex = '/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/';
	
	
	
	/** 
	 * jsonValidator:
	 * validates if a raw data is a valid JSON string.
	 *
	 *
	 * @param string $data
	 * @return bool 
	 * @access public
	 */
	public static function jsonValidator($data) {
		if (empty($data) === false) {
			$obj = json_decode($data, true);
		    return empty($obj) === false && is_string($data) && 
		      is_array($obj) ? true : false;
		}
		return false;
	    
    	}
    	/** 
	 * __construct:
	 * constructs ValidationChecker object,
	 * initializes member fields.
	 *
	 * ConstructionStagesCreateUpdate $persistentData
	 * @param ConstructionStagesCreateUpdate $data
	 * @return none
	 * @access public
	 */
    	public function __construct(){
    		$this->contextData = new ConstructionStagesCreateUpdate(null);
    		$this->checkList = new CheckList();
    		$this->resultBody = new ResultBody();
    	}
    	/** 
	 * init:
	 * inits ValidationChecker object,
	 * hence a $contextData field become available to further validation.
	 *
	 * ConstructionStagesCreateUpdate $persistentData
	 * @param ConstructionStagesCreateUpdate $data
	 * @return none
	 * @access public
	 */
    	public function init(ConstructionStagesCreateUpdate $persistentData = null, ConstructionStagesCreateUpdate $data){
    		if(empty($persistentData)){
    			$this->checkExistenceForCreate($data);
    		}else{
    			$this->checkExistenceForUpdate($persistentData, $data);
    		}
    		
    	}
    	
    	
    	/** 
	 * checkExistenceForCreate:
	 * checks object fields, to determine whether they exist or not,
	 * builds $contextData using $data.
	 *
	 * @param ConstructionStagesCreateUpdate $data
	 * @return none
	 * @access public
	 */
    	public function checkExistenceForCreate(ConstructionStagesCreateUpdate $data){
    		
		
		$res = true;
		if(self::exists($data->name)){
			$this->contextData->name = $data->name;
			$this->checkList->name = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->name = ValidationLevel::Failure;
			$res = false;
		}
		if(self::exists($data->startDate)){
			$this->contextData->startDate = $data->startDate;
			$this->checkList->startDate = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->startDate = ValidationLevel::Failure;
			$res=false;
		}
		
		if(self::exists($data->endDate)){
			$this->contextData->endDate = $data->endDate;
			$this->checkList->endDate = ValidationLevel::NeedToBeChecked;
			$this->checkList->duration = ValidationLevel::NeedsDefault;
		}
		else{
			$this->checkList->endDate = ValidationLevel::NoNeedDefault;
			
		}
		if(self::exists($data->durationUnit)){
			$this->contextData->durationUnit = $data->durationUnit;
			$this->checkList->durationUnit = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->durationUnit = ValidationLevel::NeedsDefault;
			
		}
		if(self::exists($data->color)){
			$this->contextData->color = $data->color;
			$this->checkList->color = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->color = ValidationLevel::NoNeedDefault;
			
		}
		if(self::exists($data->externalId)){
			$this->contextData->externalId = $data->externalId;
			$this->checkList->externalId = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->externalId = ValidationLevel::NoNeedDefault;
			
		}
		if(self::exists($data->status)){
			$this->contextData->status = $data->status;
			$this->checkList->status = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->status = ValidationLevel::NeedsDefault;
			
		}
		return $res;
    	}
	/** 
	 * checkExistenceForUpdate:
	 * checks object fields, to determine whether they exist or not,
	 * builds $contextData comparing $persistentData and $data.
	 *
	 * @param ConstructionStagesCreateUpdate $persistentData
	 * @param ConstructionStagesCreateUpdate $data
	 * @return none
	 * @access public
	 */
	public function checkExistenceForUpdate(ConstructionStagesCreateUpdate $persistentData, ConstructionStagesCreateUpdate $data){
    		
		
		if(self::exists($data->name)){
			$this->contextData->name = $data->name;
			$this->checkList->name = ValidationLevel::NeedToBeChecked;
		}
		else{
			$this->checkList->name == ValidationLevel::NoNeedDefault;
		}
		if(self::exists($data->startDate)){
			$this->contextData->startDate = $data->startDate;
			$this->checkList->startDate = ValidationLevel::NeedToBeChecked;
			$this->checkList->duration = ValidationLevel::NeedsDefault;
		}
		else if(self::exists($persistentData->startDate)){
			$this->contextData->startDate = $persistentData->startDate;
			$this->checkList->startDate = ValidationLevel::NeedToBeChecked;
		}
		 if(self::exists($persistentData->endDate)){
			$this->contextData->endDate = $data->endDate;
			$this->checkList->endDate = ValidationLevel::NeedToBeChecked;
			$this->checkList->duration = ValidationLevel::NeedsDefault;
		}else if(self::exists($persistentData->endDate)){
			$this->contextData->endDate = $persistentData->endDate;
			$this->checkList->endDate = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->endDate = ValidationLevel::NoNeedDefault;
		}
		
		if(self::exists($data->durationUnit)){
			$this->contextData->durationUnit = $data->durationUnit;
			$this->checkList->durationUnit = ValidationLevel::NeedToBeChecked;
			$this->checkList->duration = ValidationLevel::NeedsDefault;
		
		}else if(self::exists($persistentData->durationUnit)){
			$this->contextData->durationUnit = $persistentData->durationUnit;
			$this->checkList->durationUnit = ValidationLevel::Success;
		}else{
			$this->checkList->durationUnit = ValidationLevel::NeedsDefault;
			$this->checkList->duration = ValidationLevel::NeedsDefault;
		}
		if(self::exists($data->color)){
			$this->contextData->color = $data->color;
			$this->checkList->color = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->color = ValidationLevel::NoNeedDefault;
		}
		if(self::exists($data->externalId)){
			$this->contextData->externalId = $data->externalId;
			$this->checkList->externalId = ValidationLevel::NeedToBeChecked;
		}else{
			$this->checkList->externalId = ValidationLevel::NoNeedDefault;
		}
		if(self::exists($data->status)){
			$this->contextData->status = $data->status;
			$this->checkList->status = ValidationLevel::NeedToBeChecked;
		}else if(self::exists($persistentData->status)){
			$this->contextData->status = $persistentData->status;
			$this->checkList->status = ValidationLevel::Success;
		}else{
			$this->checkList->status = ValidationLevel::NeedsDefault;
		}
    	}
    	
    	
	/** 
	 * checkDetail:
	 * checks details using other method and returns a final review.
	 * Also builds the ResultBody value of the ValidationChecker object.
	 *
	 * @param none
	 * @return $res bool
	 * @access public
	 */
	public function checkDetail(){
		$res = true;
		if($this->checkName() === false){
			$this->resultBody->pushCause("name");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkStartDate() === false){
			$this->resultBody->pushCause("startDate");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkEndDate() === false){
			$this->resultBody->pushCause("endDate");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkDuration() === false){
			$this->resultBody->pushCause("duration");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkDurationUnit() === false){
			$this->resultBody->pushCause("durationUnit");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkColor() === false){
			$this->resultBody->pushCause("color");
			$this->resultBody->setResult("Failed");
			$res = false; 
		}
		if($this->checkExternalId() === false){
			$this->resultBody->pushCause("externalId");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		if($this->checkStatus() === false){
			$this->resultBody->pushCause("status");
			$this->resultBody->setResult("Failed");
			$res = false;
		}
		return $res;
		
	}
	
	/** 
	 * checkName:
	 * checks name field of incoming data.
	 * It is called in buildCheckList method.
	 * Its return value depends to class type of data.
	 * It behaves different whether a create or update operation is in progress.
	 *
	 * @param string $name
	 * @param CSInstanceType $csInstanceType
	 * @return ValidationLevel
	 * @access public
	 */
	public function checkName()
	{	$res = true;
		if($this->checkList->name == ValidationLevel::NeedToBeChecked){
			if(strlen($this->contextData->name) < 256){
					
				$this->checkList->name = ValidationLevel::Success;
			}else{
				$this->checkList->name = ValidationLevel::Failure;
				$res = false;
				
			}
		}
		return $res;
	}	

	
	/** 
	 * checkStartDate:
	 * checks startDate field of incoming data.
	 * It is called in buildCheckList method.
	 * Its return value depends to class type of data.
	 * It behaves different whether a create or update operation is in progress.
	 *
	 * @param int $startDateInt
	 * @param string $startDate
	 * @param CSInstanceType $csInstanceType
	 * @return ValidationLevel
	 * @access public
	 */
	public function checkStartDate()
	{	
		$res = true;
		if($this->checkList->startDate == ValidationLevel::NeedToBeChecked){
			$startDateInt = strtotime($this->contextData->startDate);
			$endDateInt = strtotime($this->contextData->endDate);
			if(self::checkDateFormat($this->contextData->startDate,$startDateInt) !== false){
				if($this->checkList->endDate == ValidationLevel::NeedToBeChecked){
					if(self::checkDateFormat($this->contextData->endDate,$endDateInt) and self::checkPrecedence($startDateInt,$endDateInt)){
						$this->checkList->startDate = ValidationLevel::Success;
					}else{
						$this->checkList->startDate = ValidationLevel::Failure;
						$res = false;
					}
				}else{
					$this->checkList->startDate = ValidationLevel::Success;
				}
				
				
			}else{
				$this->checkList->startDate = ValidationLevel::Failure;
				$res = false;
			}
		
		}
		return $res;
	}
	
	/** 
	 * checkEndDate:
	 * checks endDate field of incoming data.
	 * It is called in buildCheckList method.
	 *
	 * @param int $startDateInt
	 * @param int $endDateInt
	 * @param string $startDate
	 * @param string $endDate
	 * @return ValidationLevel
	 * @access public
	 */
	public  function checkEndDate()
	{	
		$res = true;
		if($this->checkList->endDate == ValidationLevel::NeedToBeChecked){
			$startDateInt = strtotime($this->contextData->startDate);
			$endDateInt = strtotime($this->contextData->endDate);
			if(self::checkDateFormat($this->contextData->endDate,$endDateInt) !== false){
				if(self::checkDateFormat($this->contextData->startDate,$startDateInt) and self::checkPrecedence($startDateInt,$endDateInt)){
					$this->checkList->startDate = ValidationLevel::Success;
				}else{
					$this->checkList->startDate = ValidationLevel::Failure;
					$res = false;
				}
				
				
			}else{
				$this->checkList->startDate = ValidationLevel::Failure;
				$res = false;
			}
		
		}
		return $res;
		
	}
	
	/** 
	 * checkDuration:
	 * function is intentionally left blank.
	 *
	 
	 * @return bool
	 * @access public
	 */
	public  function checkDuration()
	{	
		return true;
	}
	
	/** 
	 * checkDurationUnit:
	 * checks durationUnit field of incoming data.
	 * 
	 * It assigns ValidationLevel::Failure to checkList related field
	 * if a create or update request 
	 * attends to send different data then those are described.
	 *
	 * @param string $duration
	 * @param CSInstanceType $csInstanceType
	 * @return ValidationLevel
	 * @access public
	 */
	public  function checkDurationUnit()
	{	
		$res = true;
		if($this->checkList->durationUnit == ValidationLevel::NeedToBeChecked){
			if(( $this->contextData->durationUnit == "HOURS")
			or ($this->contextData->durationUnit == "DAYS")
			or ($this->contextData->durationUnit == "WEEKS"))
			{
				
				$this->checkList->durationUnit = ValidationLevel::Success;
			}else{
				$this->checkList->durationUnit = ValidationLevel::Failure;
				$res = false;
			}
		}
		return $res;
			
	}
	
	/** 
	 * checkColor:
	 * checks color field of incoming data.
	 * Returns Failure if color is set but is not appropriate. 
	 *
	 * @param string $color
	 * @return ValidationLevel
	 * @access public
	 */
	public function checkColor()
	{	
		$res = true;
		if($this->checkList->color == ValidationLevel::NeedToBeChecked){
			if(preg_match(self::$hexColorRegex, $this->contextData->color)==1){
				$this->checkList->color = ValidationLevel::Success;
			}else{
				$this->checkList->color = ValidationLevel::Failure;
				$res = false;
			}
		
		}
		return $res;
	}
	/** 
	 * checkExternalId:
	 * returns Failure if externalId field exists
	 * but does not meet requirement of 256 chars length. 
	 *
	 * @param string $externalId
	 * @param CSInstanceType $csInstanceType
	 * @return ValidationLevel
	 * @access public
	 */
	public function checkExternalId()
	{	
		$res = true;
		if($this->checkList->externalId == ValidationLevel::NeedToBeChecked){
			if(strlen($this->contextData->externalId) < 256){
				$this->checkList->externalId = ValidationLevel::Success;
			}else{
				$this->checkList->externalId = ValidationLevel::Failure;
				$res = false;
				
			}
		}
		return $res;
	}
	/** 
	 * checkStatus:
	 * checks status field of incoming data.
	 * Its return value depends to class type of data.
	 * It behaves different whether a create or update operation is in progress.
	 *
	 * @param string $status
	 * @param CSInstanceType $csInstanceType
	 * @return ValidationLevel
	 * @access public
	 */
	public function checkStatus()
	{	
		$res = true;
		if($this->checkList->status == ValidationLevel::NeedToBeChecked){
		
			if(($this->contextData->status == 'NEW')
			or ($this->contextData->status == 'PLANNED')
			or ($this->contextData->status == 'DELETED')
			)
			{
				$this->checkList->status = ValidationLevel::Success;
			}else{
				$this->checkList->status == ValidationLevel::Failure;
				$res = false;
			}
		}
		return $res;
	}
	/** 
	 * checkPrecedence:
	 * checks whether startDate is before endDate in incoming data or not.
	 *
	 * @param int $startDateInt
	 * @param int $endDateInt
	 * @return bool
	 * @access public
	 */
	public static function checkPrecedence($startDateInt, $endDateInt){
		if($startDateInt < $endDateInt){
			return true;
		}
		return false;
	}
	/** 
	 * checkDateFormat:
	 * checks whether a date string meets iso8601 template.
	 *
	 * @param string $dateToCheck
	 * @return bool
	 * @access public
	 */
	public static function checkDateFormat($dateToCheck,$dateInt){
		return (preg_match(self::$iso8601Regex, $dateToCheck) == 1 and $dateInt);
		
	}
	
	public static function exists($anyValue){
		if(empty($anyValue) === false and isset($anyValue)){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
}
?>
