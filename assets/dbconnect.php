
<?php 
function connectDB(){
	//echo "OO connection<br />";
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname ="db_mos05233";

	$conn =new mysqli($servername, $username, $password,$dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//echo "Connected successfully <br /><br />";
	return $conn;
}
?>
