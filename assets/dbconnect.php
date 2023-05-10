<?php

$sname= "localhost";
$unmae= "mor01442";
$password = "mor01442";

$db_name = "db_mos05233";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
