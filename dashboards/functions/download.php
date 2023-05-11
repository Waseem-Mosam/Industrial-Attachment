<?php
include "../../assets/dbconnect.php";
//after establishing database connection, fetches data from report table for specific student
$sql = "SELECT * FROM iams_report WHERE id = " . $_GET['id'];

$result = mysqli_query($conn, $sql);
//checks if file exists
if (mysqli_num_rows($result) == 0){
    header("Location: ../lecDash.php?error=File does not exist");
}

$row = mysqli_fetch_object($result);
//converts file from binary format back to pdf
header("Content-type: application/pdf");
header('Content-disposition: inline; filename='.$row->name);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
//displays pdf file
echo $row->file;
?>
