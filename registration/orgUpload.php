<?php 
include "../assets/dbconnect.php";

if (isset($_POST['orgName']) && isset($_POST['repFName']) && isset($_POST['repLName']) && isset($_POST['email']) && isset($_POST['locations']) && isset($_POST['projects']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$orgName = validate($_POST['orgName']);
	$repFName = validate($_POST['repFName']);
    $repLName = validate($_POST['repLName']);
    $email = validate($_POST['email']);
    $location = validate($_POST['locations']);
    $project = validate($_POST['projects']);
    $pass = validate($_POST['password']);
    $confirmPass = validate($_POST['confirmPass']);

	if (empty($orgName)) {
		header("Location: orgReg.php?error=Organisation name is required");
	    exit();
	}else if(empty($repFName)){
        header("Location: orgReg.php?error=First name is required");
	    exit();
	}else if(empty($repLName)){
        header("Location: orgReg.php?error=Last name is required");
	    exit();
	}else if(empty($email)){
        header("Location: orgReg.php?error=Email is required");
	    exit();
	}else if(empty($location)){
        header("Location: orgReg.php?error=Location is required");
	    exit();
	}else if(empty($project)){
        header("Location: orgReg.php?error=Project is required");
	    exit();
	}else if(empty($pass)){
        header("Location: orgReg.php?error=Password is required");
	    exit();
	}else if($confirmPass != $pass){
        header("Location: orgReg.php?error=Passwords must match");
	    exit();
	}else{
        $fullname = $repFName.' '.$repLName;
		$sql = "INSERT INTO iams_user (id, firstName, lastName, email, password, role, preferredLocation, preferredProject, status) VALUES (NULL, '".$repFName."', '".$repLName."', '".$email."', '".md5($pass)."', 'Organisation', '".$location."', '".$project."', 'Not Allocated');";
        $sql .= "INSERT INTO iams_org (orgName, repName, email, location, students, project) VALUES ('".$orgName."', '".$fullname."', '".$email."', '".$location."', NULL, '".$project."');";

		if ($conn->multi_query($sql) === TRUE) {
            header("Location: ../index.php");
        } else {
            header("Location: orgReg.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: orgReg.php");
	exit();
}