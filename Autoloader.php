<?php
/** 
 * Autoloader is a class of VERO DS playground api-tasks.
 * 
 * Autoloader has no member fields, it registers classes in the directory.
 * 
 * @package classes
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class Autoloader
{	 /** 
	 * register:
	 * registers classes in the class files.
	 * 
	 * @param none
	 * @return bool
	 * @access public
	 */ 
	public static function register()
	{
		spl_autoload_register(function ($class) {
			$file = "classes/{$class}.php";
			if (file_exists($file)) {
				require $file;
				return true;
			}
			return false;
		});
	}
}
