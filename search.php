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
		//validation CarID
		if (empty($_POST["Car_ID"])){
			echo "<p> Car ID field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Car_ID"]))
				$mid = $_POST["Car_ID"];
			else{
				echo("<p> Car ID field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation CarMake
		if  (empty($_POST["Car_Make"])){
			echo "<p> Car Make field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Car_Make"]))
				$mid = $_POST["Car_Make"];
			else{
				echo("<p> Car Make field must be a string value! </p>");
				$errorCount++;
			} 
		}
		//validation CarModel
		if  (empty($_POST["Car_Model"])){
			echo "<p> Car Model field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Car_Model"]))
				$mid = $_POST["Car_Model"];
			else{
				echo("<p> Car Model field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation CarYear
		if  (empty($_POST["Car_Year"])){
			echo "<p> Car Year field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Car_Year"]))
				$mid = $_POST["Car_Year"];
			else{
				echo("<p> Car Year field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation CarType
		if (empty($_POST["Car_Type"])){
			echo "<p> Car Type field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Car_Type"]))
				$mid = $_POST["Car_Type"];
			else{
				echo("<p> Car Type field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation Destination
		if  (empty($_POST["Destination"])){
			echo "<p> Destination field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Destination"]))
				$mid = $_POST["Destination"];
			else{
				echo("<p> Destination field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation MorrisvilleId
		if (empty($_POST["Morrisville_Id"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Morrisville_Id"]))
				$mid = $_POST["Morrisville_Id"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query
				$SQLstring = "INSERT INTO car" .
				" (Destination, Morrisville_Id, Car_Model, Car_ID, Car_Make, Car_Year, Car_Type) " .
				" VALUES".
				"('$_POST[Destination]','$_POST[Morrisville_Id]','$_POST[Car_Model]', '$_POST[Car_ID]', '$_POST[Car_Make]','$_POST[Car_Year]', '$_POST[Car_Type]')";

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
