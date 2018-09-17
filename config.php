<?php
$sql = new mysqli("localhost","root","","class");
session_start();
function secure($strToSecure){
	global $sql;
	$strToSecure = mysqli_real_escape_string($sql, $strToSecure);
	$strToSecure = strip_tags($strToSecure);
	$strToSecure = htmlentities($strToSecure);
	return $strToSecure;
}
?>