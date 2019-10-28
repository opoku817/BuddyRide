<!DOCTYPE html>
<html lang="en">
<head> <title>Buddy Ride System</title>
<meta charset="utf-8">
</head>
<style>
body {background-image:url(morrisville.jpg);
background-position:top right;
background-color :#65a773; 
background-repeat:no-repeat;
background-size: 500px 80px;}
</style>
<h1> Buddy Ride System</h1>
<hr> 
<h2> Ride Search:</h2>
<?php
	$DBName = "buddyridesystem";
	$conn = mysqli_connect("localhost","root","");
	if ($conn === FALSE)
		echo "Connection error:".mysqli_error(). "\n";
	else {
		if(mysqli_select_db($conn, $DBName) === FALSE){
	
		echo "Could not select the \"$DBName\"".
		"database:" . mysqli_error($conn). "\n";
		//Close the connection
		mysqli_close($conn);
			$conn = FALSE;
		}
	}
			$errorCount=0;
		//validation destination
		if (empty($_POST["destination"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["destination"]))
				$mid = $_POST["morrisvilleid"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation model
		if  (empty($_POST["model"])){
			echo "<p> Model field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["model"]))
				$mid = $_POST["model"];
			else{
				echo("<p> Model field must be a string value! </p>");
				$errorCount++;
			} 
		}
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query
				$SQLstring = "INSERT INTO Search" .
				" (destination, model,) " .
				" VALUES".
				"('$_POST[destination]','$_POST[model]')";

			$QueryResult = mysqli_query( $conn, $SQLstring);
			if ($QueryResult === FALSE)
				echo "<p>Unable to execute the query.</p>".
					"<p>Error code" . mysqli_errno($conn).": "
						. mysqli_error($conn) . "</p>";
			else
				echo "<p>Successfully added the record.<p>";
			mysqli_close($conn);
		}
	}
?>
