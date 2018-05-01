<?php 
ob_start();
session_start();
$current_file = $_SERVER['script_name'];

if(isset($_SERVER['HTTP_REFERER'])) {
  $http_referer = $_SERVER['http_referer'];
   }
else
{
	echo "Referer not set!";
}


?>