<?php
$ser = "localhost";
$user = "root";
$pass = "";
$db = "payment";

//create database connection
$conn = mysqli_connect("localhost", "root", "");
if ($conn === FALSE)
	echo "Connection error".mysqli_error(). "\n";
else {
	if (mysqli_select_db($conn, $db) === FALSE){
		echo "<p>Could not select the \"$db\""."database:" . mysqli_error($db) . "\n";
		//close the connection
	mysqli_close($conn);
		$conn = FALSE;
	}
}
?>