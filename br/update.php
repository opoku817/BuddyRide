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
//session_start();
//$_SESSION["MID"] = '1234';
//select date to display
		$SQLSelect = "SELECT * FROM students, payment, car WHERE students.Morrisville_Id = 123987456 AND car.Morrisville_Id= 123987456 AND payment.Morrisville_Id = 123987456";
		$result = mysqli_query($conn, $SQLSelect);
		//if (mysqli_num_rows($result) > 0){
		//output
			while($rows = mysqli_fetch_assoc($result)){
				//echo "Morrisville Id: " . $rows["Morrisville_Id"]. "<br>". "Password: " . $rows["Password"]. "<br>". "Car Model: " .$rows["Car_Model"]. "<br>". "Car Make: " . $rows["Car_Make"]. "<br>". "Car Year: " . $rows["Car_Year"]. "<br>". "Licence Plate: " . $rows["Car_ID"]."<br>". "Car Type: " . $rows["Car_Type"]."<br>". "Destination: " .$rows["Destination"]."<br>". "Card Type: " .$rows["Card_Type"]."<br>". "Card Experation: " .$rows["Card_Exp"]."<br>". "Card Number: " .$rows["Card_Number"]."<br>". "CVV: " .$rows["CVV"]. "<br>";
				//echo $rows["Morrisville_Id"];
			//}
		//}
		//else {
		//	echo "0 results";
		//}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buddy Ride System</title>
    <meta charset="utf-8" />
</head>
<style>
body {background-image:url(morrisville.jpg);
background-position:top right;
background-color :#65a773; 
background-repeat:no-repeat;
background-size: 500px 80px;;}
#actinfo{
	position: relative;
	float: left;
}
</style>
<body>
<div id="wrapper">
	<header>
		<h1>Buddy Ride System</h1>
		<hr>
	</header>
	<main>
</div>
<div id ="actinfo">
	<h2> Update Account Information </h2>
	<form action ="updateaccount.php" method = "post">
		<h3>
			Morrisville Id:<br>
		<input type="int" name="Morrisville_Id" value = "<?php echo $rows["Morrisville_Id"]; ?>"><br><br>
			Password:<br>
		<input type="int" name="Password" value = "<?php echo $rows["Password"]; ?>"><br><br>
			Car Model :<br>
		<input type="text" name="Car_Model" value = "<?php echo $rows["Car_Model"]; ?>"><br><br>
			Car Make:<br>
		<input type="int" name="Car_Make" value = "<?php echo $rows["Car_Make"]; ?>"><br><br>
			Car Year:<br>
		<input type="int" name="Car_Year" value = "<?php echo $rows["Car_Year"]; ?>"><br><br>
			License Plate:<br>
		<input type="int" name="Car_ID" value = "<?php echo $rows["Car_ID"]; ?>"><br><br>
			Car Type:<br>
		<input type="int" name="Car_Type"value = "<?php echo $rows["Car_Type"]; ?>"><br><br>
			Destination:<br>
		<input type="int" name="Destination" value = "<?php echo $rows["Destination"]; ?>"><br><br>
			Card Type:<br>
		<input type="int" name="Card_Type" value = "<?php echo $rows["Card_Type"]; ?>"><br><br>
			Card Experation:<br>
		<input type="int" name="Card_Exp" value = "<?php echo $rows["Card_Exp"]; ?>"><br><br>
			Card Number:<br>
		<input type="int" name="Card_Number" value = "<?php echo $rows["Card_Number"]; ?>"><br><br>
			CVV:<br>
		<input type="int" name="CVV" value = "<?php echo $rows["CVV"]; ?>"><br><br>
		
		<h4> <p><input type="reset" value = "Clear Form"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type= "submit" name = "Update" value = "Update" /></p> </h4>
		</h3>
	</form>
	<?php
	}
	?>
</div>
</body>
</html>