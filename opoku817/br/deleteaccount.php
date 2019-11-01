<!Doctype html>
<html>
<style>
body {background-image:url(header1.jpg);
background-position:top right;
background-color :#65a773; 
background-repeat:no-repeat;
background-size: 500px 80px;}
</style>

<title>Buddy Ride System</title>
<h1>Buddy Ride System </h1>
<hr>
<h2>Welcome to the Taxi System for Morrisville Students</h2> 

<?php
$DBName = "buddyridesystem";
	$conn = mysqli_connect("localhost","root","");
	if ($conn === FALSE)
		echo "Connection error:".mysqli_error(). "\n";
	else{
		if(mysqli_select_db($conn, $DBName) === FALSE){
	
		echo "Could not select the \"$DBName\"".
		"database:" . mysqli_error($conn). "\n";
		//Close the connection
		mysqli_close($conn);
			$conn = FALSE;
		}
	}
	 $errorCount=0;
	//validation - ID	
    if (empty($_POST["morrisville_id"])) {
		echo "<p> Morrisville Id field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["morrisville_id"]))
			$mid = $_POST["morrisvilleid"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
if ($errorCount == 0){
	if ($conn !== FALSE){
		//create SQL query
		$SQLstring = "DELETE FROM account" .
		" WHERE morrisville_id = $morrisville_id";
$QueryResult = mysqli_query( $conn, $SQLstring);
if ($QueryResult === FALSE)
	echo "<p>Unable to execute the query.</p>".
		"<p>Error code " . mysqli_errno($conn).": " 
			. mysqli_error($conn) . "</p>";
	else 
		echo "<p>Successfully deleted the record.</p>";
mysqli_close($conn);
}
}
?> 