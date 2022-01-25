<?php

echo "<h1> Login </h1>";

$email = $_POST["email"];
$password = $_POST["password"];

###Connecting to the database###

$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "root";

$connect = mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die ("Could not connect to the database.");

echo "<H3> Connected to the Database. </h3>";


## Select the Database ##
$mysql_databasename = "users";
mysql_select_db($mysql_databasename, $connect) or die ("Could not select the database");

echo "<h3> Selected the Database. </h3>";

###########

// echo "<br> <b> Inputs:</b> ";
// echo "$email - $password <br>";

$verifyEmail = "SELECT * FROM Users WHERE Email = '$email'"; ##matching email from db

$emaildb = mysql_query($verifyEmail); ##running through sql query

while ($row = mysql_fetch_array($emaildb, MYSQL_BOTH)) { ##gets pw, first name, and last name associated w same email inputted
	$passworddb = $row["Password"];
	$firstnamedb = $row["FirstName"];
	$lastnamedb = $row["LastName"];
}

$rows = mysql_num_rows($emaildb); ##num of rows

if ($rows>0){
	if ($password == $passworddb){ ##if inputted pw matches pw with associated email
		echo "Welcome back, ", $firstnamedb, " ", $lastnamedb, "!";

	}else{
		echo "<p><b>Invalid Password.</b>";
	}
}else{
	echo "<p><b>EmailID does not exist.</b>";
}


?>


