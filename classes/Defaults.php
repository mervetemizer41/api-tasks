<?php

/** 
 * Defaults is a class which is added by Merve Temizer to api-tasks.
 * 
 * Defaults has methods and is used to assign default values if needed,
 * along data adding and updating proceess.
 * 
 * @package classes
 * @author Merve Temizer 
 * @version 0.0.0 
 * @access public  
 */ 
class Defaults
{
	
	/** 
	 * assignDefaults:
	 * assign defaults if needed according to $contextData into $dataToBeModified.
	 * 
	 * 
	 * @param ConstructionStagesCreateUpdate $dataToBeModified
	 * @param ConstructionStagesCreateUpdate $endDate
	 * @param CheckList $checkList 
	 * @return none
	 * @access public
	 */
	public static function assignDefaults(ConstructionStagesCreateUpdate &$dataToBeModified, ConstructionStagesCreateUpdate $contextData, $checkList){
		
		if($checkList->durationUnit=== ValidationLevel::NeedsDefault){
			$dataToBeModified->durationUnit = 'DAYS';
			$contextData->durationUnit = 'DAYS';
		}
		if($checkList->duration === ValidationLevel::NeedsDefault){
			$dataToBeModified->duration = self::calculateDuration($contextData->startDate, $contextData->endDate, $contextData->durationUnit);
		}
		if($checkList->status === ValidationLevel::NeedsDefault){
			$dataToBeModified->status = 'NEW';
		}
	}
	
	
	
	/** 
	 * calculateDuration:
	 * calculates duration according to $startDate, $endDate and durationUnit.
	 * 
	 * 
	 * @param $startDate string
	 * @param $endDate string
	 * @param $durationUnit string 
	 * @return $res float 
	 * @access public
	 */
	public static function calculateDuration($startDate, $endDate, $durationUnit)
	{	
		
		$startDateInt = strtotime($startDate);
		$endDateInt = strtotime($endDate);
		$startDateDT = new DateTime();
		$endDateDT = new DateTime();
		$startDateDT->setTimestamp($startDateInt);
		$endDateDT->setTimestamp($endDateInt);
		
		
		$interval = $startDateDT->diff($endDateDT);
		$res;
		
		if($durationUnit == 'HOURS'){
			$days = $interval->days;
			$residualHours = $interval->h;
			$res = $days * 24 + $residualHours;
		}
		else if($durationUnit == 'DAYS'){
			$days = $interval->days;
    			$residualHours = $interval->h;
    			$res = $days + ($residualHours / 24);
		}
		else if($durationUnit == 'WEEKS'){
			$days = $interval->days;
			$weeks = $days / 7;
			$residualHours = $interval->h;
			$res = $weeks + $residualHours / (24*7);
		}
		return $res;
		
    	}
}

?>
