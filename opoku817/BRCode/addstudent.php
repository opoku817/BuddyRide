<html>
<body>
<title> AddStudent </title>
<h1>Student Resgistration</h1>
<?php
include("BuddyRide.php");
if ($DBConnect !== FALSE)
{
	//create SQL query
	$SQLstring = "INSERT INTO students" .
	" (morrisvilleid, password, firstname, lastnamme, driver or non-driver) " .
	" VALUES($_POST[Mnum], '$_POST[Mpass]', '$_POST[firstname]', '$_POST[lastname]')";

$QueryResult = mysqli_query( $DBConnect, $SQLstring);
if ($QueryResult === FALSE)
	echo "<p>Unable to execute the query.</p>".
		"<p>Error code " . mysqli_errno($DBConnect).": " 
			. mysqli_error($DBConnect) . "</p>";
	else 
		echo "<p>Successfully added the record.</p>";
mysqli_close($DBConnect);
}
?>