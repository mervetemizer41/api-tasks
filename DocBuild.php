<?php

echo DocBuild::buildDocs();


/** 
 * DocBuild is a class added by Merve Temizer to api-tasks.
 * 
 * DocBuild builds docs. 
 * 
 * 
 * @author Merve Temizer 
 * @author Vero Developers
 * @version 0.0.0 
 * @access public  
 */ 
class DocBuild{

 	/** 
	 * listClasses:
	 * lists classes in the directory recursively.
	 * 
	 * @param none
	 * @return $fileList SplFileInfo[]
	 * @access public
	 */ 
	public static function listClasses(){
		$fileList = array();
		// Construct the iterator
		$it = new RecursiveDirectoryIterator(dirname(__FILE__));

		// Loop through files
		foreach(new RecursiveIteratorIterator($it) as $file) {
		    if ($file->getExtension() == 'php') {
		    	array_push($fileList,$file);
		    	
		    }
		}
		return $fileList;
		
	}
	/** 
	 * listComments:
	 * lists comment tokens in the file.
	 * 
	 * @param $singleClass string
	 * @return $comments string[]
	 * @access public
	 */ 
	public static function listComments($singleClass){
		
		$comments = array();
		
	 	$source = file_get_contents($singleClass);

    		$tokens = token_get_all( $source );
    		$comment = array(
			T_DOC_COMMENT         
    		);
    		foreach( $tokens as $token ) {
			if( !in_array($token[0], $comment) )
	    			continue;
	
			$txt = $token[1];
			array_push($comments, $txt);
			
			
			
    		}
		return $comments;
	}
	/** 
	 * formatComment:
	 * formats single cmment to HTML.
	 * 
	 * @param $comment string
	 * @return $txt string
	 * @access public
	 */ 
	public static function formatComment($comment){
		$txt = str_replace("/**","<p>",$comment);
		$txt = str_replace("*/","</p>",$txt);
		$txt = str_replace("*","<br>",$txt);
		return $txt;
	}
	/** 
	 * formatClassTxt:
	 * formats all the comments in a class to HTML.
	 * 
	 * @param $classTxt string
	 * @return $txt string
	 * @access public
	 */ 
	public static function formatClassTxt($classTxt){
		$txt = '<div>'.$classTxt.'</div>';
		return $txt;
	}
	
	/** 
	 * formatClassTxt:
	 * formats all the api comments in directory to HTML.
	 * 
	 * @param $classTxt string
	 * @return $txt string
	 * @access public
	 */ 
	public static function formatApiTxt($apiTxt){
		$txt = '<html><body>'.$apiTxt.'</body></html>';
		return $txt;
	}
	
	/** 
	 * formatClassHeading:
	 * formats single class name as heading.
	 * 
	 * @param $singleClass string
	 * @return $txt string
	 * @access public
	 */ 
	public static function formatClassHeading($singleClass){
		$txt = '<h3>'.$singleClass.'</h3>';
		return $txt;
	}
	
	/** 
	 * buildDocs:
	 * build docs for the files in the same directory.
	 * 
	 * @param none
	 * @return $fApiTxt string
	 * @access public
	 */ 
	public static function buildDocs(){
	
		$classList = self::listClasses();
		$apiTxt = "";
		
		foreach($classList as $singleFile ){
			$singleClass = basename($singleFile,'.php');
			 $singleClassTxt = self::formatClassHeading($singleClass);
			$commentList = self::listComments($singleFile);
			
				
				
			foreach($commentList as $singleComment){
				$fComment = self::formatComment($singleComment);
				
				$singleClassTxt .= $fComment;
			}
			
			$classTxt = self::formatClassTxt($singleClassTxt);
			
			$apiTxt .= $classTxt;
			
			
		}
		 $fApiTxt = self::formatApiTxt($apiTxt);
		 return $fApiTxt;
	}
	
   
}
?>

