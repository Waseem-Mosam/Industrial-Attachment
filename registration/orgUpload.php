<?php 
//establishes database connection and ensures all data has been entered on form
include "../assets/dbconnect.php";

if (isset($_POST['orgName']) && isset($_POST['repFName']) && isset($_POST['repLName']) && isset($_POST['email']) && isset($_POST['locations']) && isset($_POST['projects']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	// validate and sanitize data
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
		$repID = "";
		$fullname = $repFName.' '.$repLName;
		//insert organization representative (who is the assumed supervisor)
		$sql = "INSERT INTO iams_user (id, firstName, lastName, email, password, role, preferredLocation, preferredProject, status) VALUES (NULL, '".$repFName."', '".$repLName."', '".$email."', '".md5($pass)."', 'Organisation', '".$location."', '".$project."', NULL);";
		$conn->query($sql);
		$sql = "SELECT id FROM `iams_user` WHERE `firstName` = '".$repFName."' AND `lastName` = '".$repLName."';";
        //execute query
		$result = mysqli_query($conn, $sql);
        
		while ($row = mysqli_fetch_object($result)){
            $repID = $row->id;
		}
		
		//insert organization
        $sql = "INSERT INTO iams_org (orgName, repID, email, location, project) VALUES ('".$orgName."', '".$repID."', '".$email."', '".$location."', '".$project."');";

		if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php");
        } else {
            header("Location: orgReg.php?error=Error :.". $conn->error);
        }
    }
}else{
	header("Location: orgReg.php");
	exit();
}
