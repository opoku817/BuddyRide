<!DOCTYPE html>

<html>
<style>
body {
	background-image:url(morrisville.jpg);
	background-position:top right;
	background-color :#65a773; 
	background-repeat:no-repeat;
	background-size: 500px 80px;
}
</style>
<title> Buddy Ride System </title>
<h1> Buddy Ride System </h1>
<hr>
<title>Add Payment </title>
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
				$morrisvilleid = $_POST["morrisvilleid"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation model
		if (empty($_POST["model"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["model"]))
				$model = $_POST["model"];
			else{
				echo("<p> Morrisville Id field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation year
		if  (empty($_POST["year"])){
			echo "<p> Card Name field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["year"]))
				$year = $_POST["year"];
			else{
				echo("<p> Card Name field must be a numberic value! </p>");
				$errorCount++;
			} 
		}
		//validation licenseplate
		if (empty($_POST["licenseplate"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["licenseplate"]))
				$licenseplate = $_POST["licenseplate"];
			else{
				echo("<p> Morrisville Id field must be a string value! </p>");
				$errorCount++;
			}
		}
		//update car
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query

				$SQLupdate = "UPDATE car SET model = '$model', year = $year, licenseplate = '$licenseplate' WHERE morrisvilleid = $morrisvilleid";

			$QueryResult = mysqli_query( $conn, $SQLupdate);
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