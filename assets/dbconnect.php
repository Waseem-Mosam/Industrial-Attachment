<?php
//database details including username, password, host address and database name
$sname= "localhost";
$unmae= "mor01442";
$password = "mor01442";

$db_name = "iams";

//OOP database connection using mysqli
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
