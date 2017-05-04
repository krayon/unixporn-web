<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

//date_default_timezone_set('Europe/Stockholm');

// PDO MySQL queries don't have '%' or '_' escaped since they are not special
// characters in SQL, only in a LIKE comparison. Thus we have our own
// functions.
// {
function mysql_like_wildcard_escape($str) {
    return str_replace(
         array(  '\\',   '_',   '%')
        ,array('\\\\', '\\_', '\\%')
        ,$str
    );
}

function mysql_like_wildcard_unescape($str) {
    return str_replace(
         array('\\\\', '\\_', '\\%')
        ,array(  '\\',   '_',   '%')
        ,$str
    );
}
// }

try {
$conn = new PDO('mysql:host=localhost;dbname=DBNAME;charset=utf8','USERNAME','PASSWORD');
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}

catch(Exception $e) {
	//echo $e->getMessage();
	echo 'An error has occured.';
}
?>