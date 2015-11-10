<?php

/*
 * Simple php logger class
 * 
 * Usage: 
 *
 *   $logger = new SimpleLogger(PATH,LOGFILENAME)
 *
 *   PATH should have no leading slash, and include a trailing slash.  (Default is current folder)
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
    * @param string $text     The text string to write to the log file
    * @param string $header   Text of the log entry header tag. Can be any string, or use presets (d='DEBUG', i='INFO', e="ERROR")
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