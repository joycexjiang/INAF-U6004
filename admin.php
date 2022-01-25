<?php

echo "<h1> Display the list of users. </h1>";

### CONNECTING TO DATABASE ###

$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "root";

$connect = mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die ("Could not connect to the database.");

echo "<H4> Connected to the Database. </h4>";


## SELECT THE DATABASE ##
$mysql_databasename = "users";
mysql_select_db($mysql_databasename, $connect) or die ("Could not select the database");

echo "<h4> Selected the Database. </h4>";


## RETRIEVE DATA ###
##select * users

$ret_sql_query = "SELECT * FROM Users"; ##selecting all from users
$result = mysql_query($ret_sql_query); ##array with hash tables inside of it ##list of hash tables

##loop through the list
$total_rows = mysql_num_rows($result);
echo "<p> Total Rows: $total_rows <p>";

##loop through the array/list where each elemen represents a row from database

$i=0;

echo "<p><b> FirstName - LastName - Email </b></p>";


while ($i<$total_rows){
	$data_row = mysql_fetch_array($result); ##gets the next row; first elem of the array, a hashtable
	## to get elemn, specify the key

	$data_row_firstname = $data_row["FirstName"];
	$data_row_lastname = $data_row["LastName"];
	$data_row_email = $data_row["Email"];

	echo "<br> $data_row_firstname - $data_row_lastname - $data_row_email<br>";

	$i=$i+1;

}


?>
