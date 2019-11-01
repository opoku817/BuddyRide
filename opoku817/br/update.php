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
	<form action ="Accountupdate.php" method = "post">
		<h3>
			M Number: <br>
		<input type: "int" name="Morrisville_Id"><br><br>
		
			Password:<br>
		<input type="int" name="Password"><br><br>
			First Name :<br>
		<input type="text" name="Firstname"><br><br>
			Last Name:<br>
		<input type="int" name="Lastname"><br><br>
		
		<h4> <p><input type="reset" value = "Clear Form"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type= "submit" name = "Update" value = "Send Form" /></p> </h4>
		</h3>
	</form>
</div>
</body>
</html>