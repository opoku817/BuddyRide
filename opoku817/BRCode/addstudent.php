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
	 $errorCount=0;
	//validation - ID	
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
	//validation - Password
	if (empty($_POST["password"])){
		echo "<p> Password field is required !</p>";
		$errorCount++;
	}
else {
		if(is_string($_POST["password"]))
			$pass = $_POST["password"];
		else{
			echo("<p> Password field must must be string value !</P>");
			$errorCount++;
		}	
	} 
			//validation - firstname
	if (empty($_POST["firstname"])){
		echo "<p> Firstname field is required !</p>";
		$errorCount++;
	}
	//validation - lastname
		if (empty($_POST["lastname"])){
		echo "<p> Lastname field is required !</p>";
		$errorCount++;
	}	

if ($errorCount == 0){
include("inc_db_buddyride.php");
if ($DBConnect !== FALSE)
{
	//create SQL query
	$SQLstring = "INSERT INTO students" .
	" (morrisville_id, password, firstname, lastname) " .
	" VALUES".
	"('$_POST[morrisvilleid]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]')";

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
