<?php 
session_start(); 
include "assets/dbconnect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$pass = md5($pass);
		$sql = "SELECT * FROM iams_user WHERE email='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['firstName'];
            	$_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                if($_SESSION['role']=="Student"){
                    header("Location: dashboards/studentDash.php");
		            exit();
                }
                if($_SESSION['role']=="Lecturer"){
                    header("Location: dashboards/lecDash.php");
		            exit();
                }
                if($_SESSION['role']=="Organisation"){
                    header("Location: dashboards/lecDash.php");
		            exit();
                }
                if($_SESSION['role']=="Coordinator"){
                    header("Location: dashboards/lecDash.php");
		            exit();
                }

            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}