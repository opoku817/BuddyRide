
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
<h2>Welcome to the Taxi System for Morrisville Students<br></h2> 
<hr>
<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "buddyridesystem"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['but_submit'])){

    $Morrisville_Id = mysqli_real_escape_string($con,$_POST['Morrisville_Id']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);

    if ($Morrisville_Id != "" && $Password != ""){

        $sql_query = "select count(*) as Morrisville_Id from students where Morrisville_Id='".$Morrisville_Id."' and Password='".$Password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['Morrisville_Id'];

        if($count > 0){
            $_SESSION['Morrisville_Id'] = $Morrisville_Id;
			  
            header('Location:mainaccount.html');
        }else{
            echo "Invalid username and password";
        }

    }

}