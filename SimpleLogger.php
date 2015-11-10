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

    $fullname = $path . $logfileName;
    try {
		  
        if ( !file_exists($path) ) {
          throw new Exception('File not found.');
        }

        $this->filePtr = fopen($path . $logfileName, "a");	
        if ( !$this->filePtr ) {
          throw new Exception('File open failed.');
        }
    }
    catch ( Exception $e ) {
       $this->filePtr = fopen("logfile.txt", "a"); // If the specified folder or file can not be opened, place a default logfile in the current folder
    } 
  }

   /*
    * Create an entry in the logfile
    *
    * @param string $text     The text string to write to the log file
    * @param string $header   Text of the log entry header tag. Can be any string, or use presets (d='DEBUG', i='INFO', e="ERROR")
    */
   function log($text,$header = "d") {
   		$date = date(DATE_ATOM);

   		// Set the header tag
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

   		// Construct the log entry and write to the logfile
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