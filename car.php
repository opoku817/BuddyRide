<!Doctype html>
<html>
<style>
body {background-image:url(morrisville.jpg);
background-position:top right;
background-color :#65a773; 
background-repeat:no-repeat;
background-size: 500px 80px;}
</style>
<h1> Buddy Ride System</h1>
<hr>
<h2> Driver/Car Registration</h2>
<hr>

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
	//validation - morrisvilleid
	if (empty($_POST["morrisvilleid"])) {
		echo "<p> Morrisville Id field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["morrisvilleid"]))
			$mid = $_POST["morrisvilleid"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
	//validation - model
    if (empty($_POST["model"])) {
		echo "<p> Model field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["model"]))
			$mid = $_POST["model"];
		else{
			echo("<p> Model field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
	//validation - year
	if (empty($_POST["year"])){
		echo "<p> year field is required !</p>";
		$errorCount++;
	}
else {
		if(is_string($_POST["year"]))
			$pass = $_POST["year"];
		else{
			echo("<p> Year field must must be string value !</P>");
			$errorCount++;
		}	
	} 
	//validation - licenseplate
	if (empty($_POST["licenseplate"])){
		echo "<p> licenseplate field is required !</p>";
		$errorCount++;
	
	}	
if ($errorCount == 0){
include("inc_db_car.php");
if ($DBConnect !== FALSE)
{
	//create SQL query
	$SQLstring = "INSERT INTO carinfo" .
	" (morrisvilleid, model, year, licenseplate) " .
	" VALUES".
	"('$_POST[morrisvilleid]','$_POST[model]', '$_POST[year]', '$_POST[licenseplate]')";
$QueryResult = mysqli_query( $DBConnect, $SQLstring);
if ($QueryResult === FALSE)
	echo "<p>Unable to execute the query.</p>".
		"<p>Error code " . mysqli_errno($DBConnect).": " 
			. mysqli_error($DBConnect) . "</p>";
	else 
		echo "<p>Successfully added the record.</p>";
mysqli_close($DBConnect);
}
}
?>