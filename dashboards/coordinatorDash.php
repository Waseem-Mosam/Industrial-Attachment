<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Coordinator Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>
     <div class="row">
          <div class="main col-4">
               <h1>Account Information</h1>
               <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
               <h2>You are a <?php echo $_SESSION['role']; ?></h2>
               <h2>Your ID is <?php echo $_SESSION['id']; ?></h2>  
               <a href="../logout.php">Logout</a>
          </div>
     </div>
     <div class="row">
          <div class="main col-4">
               <div class="col-4">
               <h2>Current Student Allocations</h2>
               <?php
               include '../assets/dbconnect.php';
               //select unallocated students
               $sql = "SELECT id, orgName FROM `iams_allocation`;";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_object($result)){ ?>
                    <div> 
                         <h5>Student ID: <?php echo $row->id; ?></h5> 
                         <h5>Organization: <?php echo $row->orgName; ?></h5>
                         <hr>
                    </div>
               <?php
               }
               ?>
               </div>
          </div>
     </div>
     <div class="row">
          <div class="main col-4">
          <a href="allocationPage.php">Allocate Students</a>
          </div>
     </div>
     
</body>
</html>

<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>