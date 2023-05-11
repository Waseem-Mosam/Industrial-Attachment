<?php 
//establishes database connection and checks if data has been entered on form 
include "../../assets/dbconnect.php";

if (isset($_POST['studID']) && !empty($_FILES['pdf_file']['name'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	// validate student id with sanitize function
	$studID = validate($_POST['studID']);
    
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];
//converts pdf to binary format
    $pdf_blob = fopen($file_tmp, "rb");
    
	//checks if student id has been entered
	if(empty($studID)){
        header("Location: ../studentDash.php?error=Student ID is required");
	    exit();
	}else{
        	// insert data into database
		$sql = "INSERT INTO iams_report (id, name, file) VALUES ('".$studID."', '".$file_name."', '".$pdf_blob."');";
    		//checks if insertion into table was successful
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
