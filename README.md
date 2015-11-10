Usage:

Instantiate logger:
$logger = new SimpleLogger($pathToLogfile, $logfileName);

Constructor params:
$pathToLogfile: 	no leading slash, include the trailing slash.  Defaults to current folder
$logfileName:		set the name of the log file here.  Defaults to "logfile.txt"

Log function:
$logger->log($text, $heeader);
$text:		Text to write to the log file
$header:	The header tag of the log entry.  Defaults to '[DEBUG]'.  Use any string or pass in a preset: 'i' for [INFO] or 'e' for [ERROR]
