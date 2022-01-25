<?php

echo "<h1> Sign Up </h1>";

$firstname = $_POST["signup-firstname"];
$lastname = $_POST["signup-lastname"];
$email = $_POST["signup-email"];
$password = $_POST["signup-password"];
echo "<br>";

###Connecting to the database###

$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "root";

$connect = mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die ("Could not connect to the database.");

echo "<H3> Connected to the Database. </h3>";


### Select the Database ###
$mysql_databasename = "users";
mysql_select_db($mysql_databasename, $connect) or die ("Could not select the database");

echo "<h3> Selected the Database. </h3>";

####################################

$repassword = $_POST["signup-repassword"]; ##variable to confirm password

if($password != $repassword){
	echo "Password did not match. Please try again. ";
}else{
	$insert_sql_query = "INSERT INTO Users(FirstName, LastName, Email, Password, rePassword) VALUES ('$firstname', '$lastname', '$email', '$password', '$repassword')";
}


echo "<br> $insert_sql_query <br>";

mysql_query($insert_sql_query); ##connects to the database


?>


