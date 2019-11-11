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
<h2>Welcome to the Taxi System for Morrisville Students<br> 
<hr>
<title> AddStudent </title>

<?php
	 $errorCount=0;
	//validation - ID	
    if (empty($_POST["Morrisville_id"])) {
		echo "<p> Morrisville Id is field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["Morrisville_id"]))
			$morrisville_id = $_POST["Morrisville_id"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
	//validation - Password
	if (empty($_POST["Password"])){
		echo "<p> Password field is required !</p>";
		$errorCount++;
	}
else {
		if(is_string($_POST["Password"]))
			$pass = $_POST["Password"];
		else{
			echo("<p> Password field must must be string value !</P>");
			$errorCount++;
		}	
	} 
			//validation - firstname
	if (empty($_POST["Firstname"])){
		echo "<p> Firstname field is required !</p>";
		$errorCount++;
	}
	//validation - lastname
		if (empty($_POST["Lastname"])){
		echo "<p> Lastname field is required !</p>";
		$errorCount++;
	}	

if ($errorCount == 0){
include("inc_db_buddyride.php");
if ($DBConnect !== FALSE)
{
	//create SQL query
	$SQLstring = "INSERT INTO students" .
	" (Morrisville_id, Password, Firstname, Lastname) " .
	" VALUES".
	"('$_POST[Morrisville_id]', '$_POST[Password]', '$_POST[Firstname]', '$_POST[Lastname]')";

$QueryResult = mysqli_query( $DBConnect, $SQLstring);
if ($QueryResult === FALSE)
	echo "<p>Unable to execute the query.</p>".
		"<p>Error code " . mysqli_errno($DBConnect).": " 
			. mysqli_error($DBConnect) . "</p>";
	else 
		echo "<p>Successfully added the record. Please click the link and login into your new account.  </p>";
	
mysqli_close($DBConnect);
}
}
?>
<html>
	<a href="loginstudent.html">Login to your new account</a>
</html>