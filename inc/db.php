<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

date_default_timezone_set('Europe/Stockholm');

try {
$conn = new PDO('mysql:host=localhost;dbname=DBNAME;charset=utf8','USERNAME','PASSWORD');
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}

catch(Exception $e) {
	//echo $e->getMessage();
	echo 'An error has occured.';
}
?>