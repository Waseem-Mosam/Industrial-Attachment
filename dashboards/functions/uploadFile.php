<?php 
include "../../assets/dbconnect.php";

if (isset($_POST['studID']) && !empty($_FILES['pdf_file']['name'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	
	$studID = validate($_POST['studID']);
    
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    $pdf_blob = fopen($file_tmp, "rb");
    

	if(empty($studID)){
        header("Location: ../studentDash.php?error=Student ID is required");
	    exit();
	}else{
        
		$sql = "INSERT INTO iams_report (id, name, file) VALUES ('".$studID."', '".$file_name."', '".$pdf_blob."');";
    
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