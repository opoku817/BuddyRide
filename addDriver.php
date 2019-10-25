<!DOCTYPE html>

<html>
<style>
body {
	background-image:url(header1.jpg);
	background-position:top right;
	background-color :#65a773; 
	background-repeat:no-repeat;
	background-size: 500px 80px;
}
</style>
<title> Buddy Ride System </title>
<h1> Buddy Ride System </h1>
<hr>
<title>Add Driver </title>
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
		//validation morrisvilleid
		if (empty($_POST["morrisvilleid"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["morrisvilleid"]))
				$mid = $_POST["morrisvilleid"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cardname
		if  (empty($_POST["model"])){
			echo "<p> Card Name field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["model"]))
				$mid = $_POST["model"];
			else{
				echo("<p> Card Name field must be a string value! </p>");
				$errorCount++;
			} 
		}
		//validation cardnumber
		if  (empty($_POST["year"])){
			echo "<p> Card Number field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["year"]))
				$mid = $_POST["year"];
			else{
				echo("<p> Card Number field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cardtype
		if  (empty($_POST["licenseplate"])){
			echo "<p> Card Type field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["licenseplate"]))
				$mid = $_POST["licenseplate"];
			else{
				echo("<p> Card Type field must be a string value! </p>");
				$errorCount++;
			}
		}
		
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query
				$SQLstring = "INSERT INTO Driver" .
				" (morrisvilleid, model, year, licenseplate) " .
				" VALUES".
				"('$_POST[morrisvilleid]','$_POST[model]','$_POST[year]', '$_POST[licenseplate]')";

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