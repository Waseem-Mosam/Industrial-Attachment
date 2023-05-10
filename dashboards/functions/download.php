<?php
include "../../assets/dbconnect.php";

$sql = "SELECT * FROM iams_report WHERE id = " . $_GET['id'];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0){
    header("Location: ../lecDash.php?error=File does not exist");
}

$row = mysqli_fetch_object($result);

header("Content-type: application/pdf");
header('Content-disposition: inline; filename='.$row->name);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

echo $row->file;
?>