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
		if (empty($_POST["Morrisville_Id"])){
			echo "<p> Morrisville Id field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Morrisville_Id"]))
				$mid = $_POST["Morrisville_Id"];
			else{
				echo("<p> Morrisville Id field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation Card_Name
		if  (empty($_POST["Card_Name"])){
			echo "<p> Card Name field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Card_Name"]))
				$mid = $_POST["Card_Name"];
			else{
				echo("<p> Card Name field must be a string value! </p>");
				$errorCount++;
			} 
		}
		//validation Card Number
		if  (empty($_POST["Card_Number"])){
			echo "<p> Card Number field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Card_Number"]))
				$mid = $_POST["Card_Number"];
			else{
				echo("<p> Card Number field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation Card_Type
		if  (empty($_POST["Card_Type"])){
			echo "<p> Card Type field required! </p>";
			$errorCount++;
		}
		else {
			if(is_string($_POST["Card_Type"]))
				$mid = $_POST["Card_Type"];
			else{
				echo("<p> Card Type field must be a string value! </p>");
				$errorCount++;
			}
		}
		//validation cardexp
		if  (empty($_POST["Card_Exp"])){
			echo "<p> Card Expiration field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Card_Exp"]))
				$mid = $_POST["Card_Exp"];
			else{
				echo("<p> Card Expiration field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation cvv
		if  (empty($_POST["CVV"])){
			echo "<p> Card CVV field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["CVV"]))
				$mid = $_POST["CVV"];
			else{
				echo("<p> CVV field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		//validation Payment_ID
		if  (empty($_POST["Payment_ID"])){
			echo "<p> Recipt Number field required! </p>";
			$errorCount++;
		}
		else {
			if(is_numeric($_POST["Payment_ID"]))
				$mid = $_POST["Payment_ID"];
			else{
				echo("<p> Recipt Number field must be a numeric value! </p>");
				$errorCount++;
			}
		}
		if ($errorCount == 0){
			if ($conn !== FALSE){
				//create SQL query
				$SQLstring = "INSERT INTO payment" .
				" (Morrisville_Id, Card_Name, Card_Number, Card_Type, Card_Exp, CVV, Payment_ID) " .
				" VALUES".
				"('$_POST[Morrisville_Id]','$_POST[Card_Name]','$_POST[Card_Number]', '$_POST[Card_Type]', '$_POST[Card_Exp]', '$_POST[CVV]', '$_POST[Payment_ID]')";

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