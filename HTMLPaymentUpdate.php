<!DOCTYPE html>

<html lang="en">
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
#payinfo{
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
<div id ="payinfo">
	<h2> Update Payment Information </h2>
	<form action ="updatePayment.php" method = "post">
		<h3>
			Recipt Number: <br>
		<input type="int" name="Payment_ID"><br><br>
			Card Name:<br>
		<input type="int" name="Card_Name"><br><br>
			Card Number :<br>
		<input type="text" name="Card_Number"><br><br>
			Card Type:<br>
		<input type="int" name="Card_Type"><br><br>
			Card Expiration:<br>
		<input type="int" name="Card_Exp"><br><br>
			CVV:<br>
		<input type="int" name="CVV"><br><br>
			M Number: <br>
		<input type: "int" name="Morrisville_Id"><br><br>
		
		<h4> <p><input type="reset" value = "Clear Form"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type= "submit" name = "update" value = "Update" /></p> </h4>
		</h3>
	</form>
</div>
</body>
</html>