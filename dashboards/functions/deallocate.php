<?php 
//establish database connection and checks if necessary data has been entered 
include "../../assets/dbconnect.php";

if (isset($_POST['studID'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	//validates and sanitizes data
	$sid = "";
	$sid = validate($_POST['studID']);
    

	if(empty($sid)){
        header("Location: ../allocationPage.php?error=Select Student");
	    exit();
	}else if(empty($orgname)){
        header("Location: ../allocatePage.php?error=Select Organization");
	    exit();
	}else{
		//removes student allocation
		$sql = "DELETE FROM iams_allocation WHERE id = '".$sid."';";
        
		if ($conn->multi_query($sql) === TRUE) {
            header("Location: ../allocationPage.php");
        } else {
            header("Location: ../allocationPage.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: ../allocationPage.php");
	exit();
}
