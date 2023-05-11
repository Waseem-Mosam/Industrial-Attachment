<?php 
//establish database connection and check if necessary data has been entered on form
include "../../assets/dbconnect.php";

if (isset($_POST['studID']) && isset($_POST['grade'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	//validate and sanitize date
	$studID = validate($_POST['studID']);
    $grade = validate($_POST['grade']);
    

	if(empty($studID)){
        header("Location: ../lecDash.php?error=Student ID is required");
	    exit();
	}else if(empty($grade)){
        header("Location: ../lecDash.php?error=Grade is required");
	    exit();
    }else if($grade<0 || $grade>100){
        header("Location: ../lecDash.php?error=Grade should range from 0-100");
		exit();
	}else{
        	//inserts data into database
		$sql = "INSERT INTO iams_grades (id, mark) VALUES ('".$studID."', '".$grade."');";
    		//checks if insertion was successful
		if ($conn->query($sql) === TRUE) {
            header("Location: ../lecDash.php");
        } else {
            header("Location: ../lecDash.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: ../lecDash.php");
	exit();
}
