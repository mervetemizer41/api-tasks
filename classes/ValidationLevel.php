<?php

/** 
 * ValidationLevel is an enum which is added by Merve Temizer to api-tasks.
 * 
 * It serves with its four values to determine
 * if an incoming data field meets the requirements.
 * 
 * @package classes
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */
enum ValidationLevel
{
    case Failure;
    case NeedToBeChecked;
    case NoNeedDefault;
    case NeedsDefault;
    case Success;
}


?>

