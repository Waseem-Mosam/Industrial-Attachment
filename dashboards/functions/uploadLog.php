<?php 
include "../../assets/dbconnect.php";

if (isset($_POST['ID']) && isset($_POST['date']) && !empty($_FILES['pdfFile']['name'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	
	$studID = validate($_POST['ID']);

    $date = $_POST['date'];
    
    $file_name = $_FILES['pdfFile']['name'];
    $file_tmp = $_FILES['pdfFile']['tmp_name'];

    $pdf_blob = fopen($file_tmp, "rb");
    

	if(empty($studID)){
        header("Location: ../studentDash.php?error=Student ID is required");
	    exit();
	}else{
        
		$sql = "INSERT INTO iams_logbook (name, date, file, id) VALUES ('".$file_name."', '". $date ."', '".$pdf_blob."',  '".$studID."');";
    
		if ($conn->query($sql) === TRUE) {
            header("Location: ../studentDash.php");
        } else {
            header("Location: ../studentDash.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: ../studentDash.php");
	exit();
}