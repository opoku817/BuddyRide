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
<h2>Search Form:</h2> 
<hr>
<h3>
<html lang="en">
<head> <title>Buddy Ride System</title>
<meta charset="utf-8">
</head>
<style>
body {background-image:url(morrisville.jpg);
background-position:top right;
background-color :#65a773;
background-repeat:no-repeat;
background-size: 500px 80px;}
</style>

<h2> Ride Search:</h2>
<?php
$destination =  $_POST['Destination'];
$make = $_POST['MakeCar'];
$car=$_POST['TypeCar'];

$DBName = "buddyridesystem";
$conn = mysqli_connect("localhost","root","");
if ($conn === FALSE)
 echo "Connection error:".mysqli_error(). "\n";
else {
 if(mysqli_select_db($conn, $DBName) === FALSE){

 echo "Could not select the \"$DBName\"".
 "database:" . mysqli_error($conn). "\n";
 //Close the connection
 mysqli_close($conn);
  $conn = FALSE;
 }
}
	//create SQL query
				$sql = "SELECT * FROM car, students WHERE (Destination= '$destination' OR Car_Type = '$car' OR Car_Make = '$make')AND car.Morrisville_Id = students.Morrisville_Id";
				if($destination == "" and $make == "" and $car == ""){
					$sql = "SELECT * FROM car, students WHERE car.Morrisville_Id = students.Morrisville_Id";
				}
					
				$result = mysqli_query($conn, $sql);
				
				
				
				
				
					if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($_SESSION = mysqli_fetch_assoc($result)) {
						echo "First Name:" .$_SESSION["Firstname"]. "Last Name:" .$_SESSION["Lastname"]. "ID:" .$_SESSION["Car_ID"]. " - CarMake: " . $_SESSION["Car_Make"]. " - CarModel: " . $_SESSION["Car_Model"]. 
						" - CarYear: " . $_SESSION["Car_Year"]. " - CarType: " . $_SESSION["Car_Type"]. " - Destination: " . $_SESSION["Destination"]. 
						" - MorrisvilleId: " . $_SESSION["Morrisville_Id"]. "<br>";
					
					
					}
				}
				else{ 
					echo 'No results found'; 

			}
?>
						