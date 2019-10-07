<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0
Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<?php
$DBName = "mdi";
$DBConnect = mysqli_connect("localhost","root","");
if ($DBConnect === FALSE)
	echo "Connection error:".mysqli_error(). "\n";
else{
if(mysqli_select_db($DBConnect, $DBName) === FALSE){
	
	echo "<p> Could not select the \"$DBName\"".
	"database:" . mysqli_error($DBConnect). "\n";
//Close the connection
mysqli_close($DBConnect);
	$DBConnect = FALSE;
	}
}
?>