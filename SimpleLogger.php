<?php

/*
 * Simple php logger class
 * 
 * Usage: 
 *
 *   $var = new SimpleLogger(PATH,LOGFILENAME)
 *   PATH should have no leading slash, and include a trailing slash.  Defaults to current folder
 *   
 *   All logs are appended to the current logfile.
 */

class SimpleLogger {

	private $filePtr;

	function __construct($path = "", $logfileName = "logfile.txt") {
		$this->filePtr = fopen($path . $logfileName, "a");	
   }

   /*
    * Create an entry in the logfile
    *
    * @param
    * @param
    */
   function log($text,$header = "d") {
   		$date = date(DATE_ATOM);

   		switch($header) {

   			case "i":
   				$headerText = "INFO";
   				break;
   			case "d": 
   				$headerText = "DEBUG";
   				break;
   			case "e":
   			    $headerText = "ERROR";
   			    break;
   			default: 
   				$headerText = $header;
   				break;
   		}

   		$logLine = $date . " [ " . $headerText . " ]: " . $text . "\n"; 
   		$this->writeToFile($logLine);
   }

   function writeToFile($logText) {
   		fwrite($this->filePtr, $logText);
   }

   function close() {
   		fclose($this->filePtr);
   }
}

?>