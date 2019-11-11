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
	//validation - Morrisville ID	
    if (empty($_POST["Morrisville_Id"])) {
		echo "<p> Morrisville Id field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["Morrisville_Id"]))
			$Morrisville_Id = $_POST["Morrisville_Id"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
	//validation - Car Model	
    if (empty($_POST["Car_Model"])) {
		echo "<p> Car Model field required !</p>";
		$errorCount++;
	}
	else {
		if(is_string($_POST["Car_Model"]))
			$Car_Model = $_POST["Car_Model"];
		else{
			echo("<p> Car Model field must be a string value !</P>");
			$errorCount++;
		}	
	} 
	//validation Car Year
		if  (empty($_POST["Car_Year"])){
			echo "<p> Card Year field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Car_Year"]))
				$Car_Year = $_POST["Car_Year"];
			else{
				echo("<p> Card Year field must be a numberic value! </p>");
				$errorCount++;
			} 
		}
	//validation Car_ID
	if (empty($_POST["Car_ID"])){
		echo "<p> Car ID field required! </p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["Car_ID"]))
			$Car_ID = $_POST["Car_ID"];
		else{
			echo("<p> Car ID field must be a numeric value! </p>");
			$errorCount++;
		}
	}
	//validation Car_Make
	if (empty($_POST["Car_Make"])){
		echo "<p> Car Make field required! </p>";
		$errorCount++;
	}
	else {
		if(is_string($_POST["Car_Make"]))
			$Car_Make = $_POST["Car_Make"];
		else{
			echo("<p> Car Make field must be a string value! </p>");
			$errorCount++;
		}
	}
	//validation Car_Type
	if (empty($_POST["Car_Type"])){
		echo "<p> Car Type field required! </p>";
		$errorCount++;
	}
	else {
		if(is_string($_POST["Car_Type"]))
			$Car_Type = $_POST["Car_Type"];
		else{
			echo("<p> Car Type field must be a string value! </p>");
			$errorCount++;
		}
	}
	//validation Destination
	if (empty($_POST["Destination"])){
		echo "<p> Destination field required! </p>";
		$errorCount++;
	}
	else {
		if(is_string($_POST["Destination"]))
			$Destination = $_POST["Destination"];
		else{
			echo("<p> Destination field must be a string value! </p>");
			$errorCount++;
		}
	}
	//deactivate car
	if ($errorCount == 0){
		if ($conn !== FALSE){
		   //create SQL query
		   $SQLstring = "UPDATE car SET Active = 'N' WHERE Morrisville_Id = '$Morrisville_Id'";
		
		$QueryResult = mysqli_query( $conn, $SQLstring);
		if ($QueryResult === FALSE)
			echo "<p>Unable to execute the query.</p>".
				"<p>Error code " . mysqli_errno($conn).": " 
					. mysqli_error($conn) . "</p>";
		else 
			echo "<p>Successfully deactivated your car.</p>";
		mysqli_close($conn);
	}
}
?> 