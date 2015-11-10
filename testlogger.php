<?php

require 'SimpleLogger.php';
//$logger = new  SimpleLogger("TEMP/");
$logger = new  SimpleLogger();

$logger->log("test debug");
$logger->log("test error","e");
$logger->log("test info","i");
$logger->log("test general","GENERAL");

?>
