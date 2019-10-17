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
<title>Add Payment </title>
<?php
	$DBName = "payment";
	$DBConnect = mysqli_connect("localhost","root","");
	if ($DBConnect === FALSE)
		echo "Connection error:".mysqli_error(). "\n";
	else{
		if(mysqli_select_db($DBConnect, $DBName) === FALSE){
	
		echo "Could not select the \"$DBName\"".
		"database:" . mysqli_error($DBConnect). "\n";
		//Close the connection
		mysqli_close($DBConnect);
			$DBConnect = FALSE;
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
		if  (empty($_POST["cardname"])){
			echo "<p> Card Name field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardname"]))
				$mid = $_POST["cardname"];
			else{
				echo("<p> Card Name field must be a string value! </p>");
				$errorCount++;
			} 
		}
		//validation cardnumber
		if  (empty($_POST["cardnumber"])){
			echo "<p> Card Number field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardnumber"]))
				$mid = $_POST["cardnumber"];
			else{
				echo("<p> Card Number field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cardtype
		if  (empty($_POST["cardtype"])){
			echo "<p> Card Type field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardtype"]))
				$mid = $_POST["cardtype"];
			else{
				echo("<p> Card Type field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation cardexp
		if  (empty($_POST["cardexp"])){
			echo "<p> Card Expiration field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardexp"]))
				$mid = $_POST["cardexp"];
			else{
				echo("<p> Card Expiration field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cvv
		if  (empty($_POST["cvv"])){
			echo "<p> Card CVV field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cvv"]))
				$mid = $_POST["cvv"];
			else{
				echo("<p> CVV field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query
				$SQLstring = "INSERT INTO payment" .
				" (morrisvilleid, cardname, cardnumber, cardtype, cardexp, cvv) " .
				" VALUES".
				"('$_POST[morrisvilleid]','$_POST[cardname]','$_POST[cardnumber]', '$_POST[cardtype]', '$_POST[cardexp]', '$_POST[cvv]')";

			$QueryResult = mysqli_query( $conn, $SQLstring);
			if ($QueryResult == FALSE){
				echo "<p>Unable to execute the query.</p>".
					"<p>Error code" . mysqli_errorno($conn).": "
						. mysqli_error($conn) . "</p>";
			}
			else{
				echo "<p>Successfully added the record.<p>";
			}
			mysqli_close($conn);
		}
	}
?>