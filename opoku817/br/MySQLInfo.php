<html>
<body>
<title> AddStudent </title>
<h1>Student Registration</h1>
<?php
	 $errorCount=0;
	//validation - ID	
    if (empty($_POST["mid"])) {
		echo "<p> Morrisville Id field required !</p>";
		$errorCount++;
	}
	else {
		if(is_numeric($_POST["mid"]))
			$mid = $_POST["mid"];
		else{
			echo("<p> Morrisville Id field must be a numeric value !</P>");
			$errorCount++;
		}	
	} 
	//validation - Password
	if (empty($_POST["pass"])){
		echo "<p> Password field is required !</p>";
		$errorCount++;
	}
else {
		if(is_string($_POST["pass"]))
			$pass = $_POST["pass"];
		else{
			echo("<p> Password field must must be string value !</P>");
			$errorCount++;
		}	
	} 
			//validation - firstname
	if (empty($_POST["fname"])){
		echo "<p> Firstname field is required !</p>";
		$errorCount++;
	}
	//validation - lastname
		if (empty($_POST["lname"])){
		echo "<p> Lastname field is required !</p>";
		$errorCount++;
	}	

if ($errorCount == 0){
include("inc_db_buddyride.php");
if ($DBConnect !== FALSE)
{
	//create SQL query
	$SQLstring = "INSERT INTO students" .
	" (morrisvilleid, password, firstname, lastname) " .
	" VALUES".
	"('$_POST[mid]', '$_POST[pass]', '$_POST[fname]', '$_POST[fname]')";

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
