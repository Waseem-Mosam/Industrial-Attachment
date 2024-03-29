<?php 
//starts user session for logged in student
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>
     <div class="row">
          <div class="col-4 main">
		<!-- Displays information of student allocation to company -->
               <h1>Company</h1>
               <?php
               include '../assets/dbconnect.php';
		//checks if student has been allocated to company
               $sql = "SELECT orgName FROM iams_allocation WHERE id = '".$_SESSION['id']."'";
               $result = mysqli_query($conn, $sql);
               if($result->num_rows>0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['orgName'];
               ?>
               <h2>You work for: <?php echo $option?></h2>
               
               <?php
                    }
               }
               ?>
               

		<!-- Displays student grade if available -->
               <h1>Grade</h1>
               <?php
               include '../assets/dbconnect.php';

               $sql = "SELECT mark FROM iams_grades WHERE id = '".$_SESSION['id']."'";
               $result = mysqli_query($conn, $sql);
               if($result->num_rows==1){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['mark'];
               ?>
               <h2>You scored: <?php echo $option?></h2>

               <?php
                    }
               }
               ?>

          </div>

          <div class="col-4 main">
		<!-- Forms to submit both logbooks or report -->
               <form action="functions/uploadLog.php" method="post" enctype="multipart/form-data">
               
               <h2>Submit Logbook</h2>

               <label>Enter ID</label>
               <input type="text" name="ID" placeholder="Student ID"><br>

               <label>Date</label>
               <input type="text" name="date" placeholder="YYYY-MM-DD"><br>               

               <label>File</label>
               <input type="file" name="pdfFile" accept=".pdf" required><br>

               <button type="submit">Submit</button>

               </form>

               <br><br>

               <form action="functions/uploadFile.php" method="post" enctype="multipart/form-data">

               <h2>Submit Report</h2>

               <label>Enter ID</label>
               <input type="text" name="studID" placeholder="Student ID"><br>

               <label>File</label>
               <input type="file" name="pdf_file" accept=".pdf" required><br>

               <button type="submit">Submit</button>

               </form>
               
               
          </div>

          
	<!-- Displays user information and logout button -->
          <div class="col-4 main">'
               <h1>Account Information</h1>
               <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
               <h2>You are a <?php echo $_SESSION['role']; ?></h2>
               <h2>Your ID is <?php echo $_SESSION['id']; ?></h2>
               <a href="../logout.php">Logout</a>
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
