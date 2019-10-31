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
<h2>Welcome to the Taxi System for Morrisville Students<br><br>Please Sign Up With Information Your Below </h2> 
<hr>
<title> AddStudent </title>

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
    if (empty($_POST["Morrisville_Id"])) {
		echo "<p> Morrisville Id field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["Morrisville_Id"]))
			$mid = $_POST["Morrisville_Id"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
if ($errorCount == 0){
	if ($conn !== FALSE){
		//create SQL query
		$SQLstring = "DELETE FROM students" .
		" WHERE Morrisville_Id = $mid";
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