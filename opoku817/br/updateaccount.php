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
<h2>Welcome to the Taxi System for Morrisville Students<br><br>Update Account </h2> 
<hr>
<h3>
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

                           $Morrisville_Id = $_POST["Morrisville_Id"];

                    else{

                           echo("<p> Morrisville Id field must be a numeric value! </p>");

                           $errorCount++;

                    }

             }

             //validation password

             if (empty($_POST["Password"])){

                    echo "<p> Password field required! </p>";

                    $errorCount++;

             }

             else {

                    if(is_string($_POST["Password"]))

                           $Password = $_POST["Password"];

                    else{

                           echo("<p> Password field must be a string value! </p>");

                           $errorCount++;

                    }

             }

             //validation name

             if  (empty($_POST["Firstname"])){

                    echo "<p> First Name field required! </p>";

                    $errorCount++;

             }

             else {

                    if(is_string($_POST["Firstname"]))

                           $Firstname = $_POST["Firstname"];

                    else{

                           echo("<p> First Name field must be a string value! </p>");

                           $errorCount++;

                    }

             }

             //validation lastname

             if (empty($_POST["Lastname"])){

                    echo "<p> Last Name field required! </p>";

                    $errorCount++;

             }

             else {

                    if(is_string($_POST["Lastname"]))

                           $Lastname = $_POST["Lastname"];

                    else{

                           echo("<p> Last Name field must be a string value! </p>");

                           $errorCount++;

                    }

             }

             //update account

             if ($errorCount == 0){

                    if ($conn !== FALSE){

                           //create SQL query

                           $SQLupdate = "UPDATE students SET Firstname = '$Firstname', Lastname = '$Lastname', Password = '$Password' WHERE Morrisville_Id = '$Morrisville_Id'";

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