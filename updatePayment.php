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
		//validation cardname
		if (empty($_POST["cardname"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["cardname"]))
				$cardname = $_POST["cardname"];
			else{
				echo("<p> Morrisville Id field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation cardnumber
		if  (empty($_POST["cardnumber"])){
			echo "<p> Card Name field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardnumber"]))
				$cardnumber = $_POST["cardnumber"];
			else{
				echo("<p> Card Name field must be a numeric value! </p>");
				$errorCount++;
			} 
		}
		//validation cardtype
		if (empty($_POST["cardtype"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["cardtype"]))
				$cardtype = $_POST["cardtype"];
			else{
				echo("<p> Morrisville Id field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation cardexp
		if (empty($_POST["cardexp"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cardexp"]))
				$cardexp = $_POST["cardexp"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cvv
		if (empty($_POST["cvv"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["cvv"]))
				$cvv = $_POST["cvv"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//update payment
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query

				$SQLupdate = "UPDATE card SET cardname = '$cardname', cardtype = '$cardtype', cardexp = $cardexp, cvv = $cvv WHERE morrisvilleid = $morrisvilleid";

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