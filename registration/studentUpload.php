<?php 
include "../assets/dbconnect.php";

if (isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['email']) && isset($_POST['locations']) && isset($_POST['projects']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	
	$fName = validate($_POST['fName']);
    $lName = validate($_POST['lName']);
    $email = validate($_POST['email']);
    $location = validate($_POST['locations']);
    $project = validate($_POST['projects']);
    $pass = validate($_POST['password']);
    $confirmPass = validate($_POST['confirmPass']);

	if(empty($fName)){
        header("Location: studentReg.php?error=First name is required");
	    exit();
	}else if(empty($lName)){
        header("Location: studentReg.php?error=Last name is required");
	    exit();
	}else if(empty($email)){
        header("Location: studentReg.php?error=Email is required");
	    exit();
	}else if(empty($location)){
        header("Location: studentReg.php?error=Location is required");
	    exit();
	}else if(empty($project)){
        header("Location: studentReg.php?error=Project is required");
	    exit();
	}else if(empty($pass)){
        header("Location: studentReg.php?error=Password is required");
	    exit();
	}else if($confirmPass != $pass){
        header("Location: studentReg.php?error=Passwords must match");
	    exit();
	}else{
        $fullname = $repFName.' '.$repLName;
		$sql = "INSERT INTO iams_user (id, firstName, lastName, email, password, role, preferredLocation, preferredProject, status) VALUES (NULL, '".$fName."', '".$lName."', '".$email."', '".$pass."', 'Student', '".$location."', '".$project."', 'Not Allocated');";
    
		if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php");
        } else {
            header("Location: studentReg.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: studentReg.php");
	exit();
}