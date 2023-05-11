<?php 
//establish database connection and check if necessary data has been entered on form
include "../../assets/dbconnect.php";

if (isset($_POST['ID']) && isset($_POST['date']) && !empty($_FILES['pdfFile']['name'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	//validate student login with sanitize function
	$studID = validate($_POST['ID']);

    $date = $_POST['date'];
    
    $file_name = $_FILES['pdfFile']['name'];
    $file_tmp = $_FILES['pdfFile']['tmp_name'];
//converts pdf to binary format 
    $pdf_blob = fopen($file_tmp, "rb");
    
	//ensures that student id has been entered
	if(empty($studID)){
        header("Location: ../studentDash.php?error=Student ID is required");
	    exit();
	}else{
        	//insert data into table
		$sql = "INSERT INTO iams_logbook (name, date, file, id) VALUES ('".$file_name."', '". $date ."', '".$pdf_blob."',  '".$studID."');";
    		//checks if insertion was successful or not 
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
