<?php 
include "../../assets/dbconnect.php";

if (isset($_POST['studID']) && isset($_POST['orgName'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$sid = $orgname = "";
	$sid = validate($_POST['studID']);
    $orgname = validate($_POST['orgName']);
    

	if(empty($sid)){
        header("Location: ../allocationPage.php?error=Select Student");
	    exit();
	}else if(empty($orgname)){
        header("Location: ../allocatePage.php?error=Select Organization");
	    exit();
	}else{
		$sql = "INSERT INTO iams_allocation (orgName,id) VALUES ( '".$orgname."','".$sid."');";
        $sql .= "UPDATE `iams_user` SET `status` = 'Allocated' WHERE `id` = '.$sid.'; ";
        
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