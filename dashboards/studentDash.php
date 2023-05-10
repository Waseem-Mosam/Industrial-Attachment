<?php 
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
               <form action="functions/uploadFile.php" method="post" enctype="multipart/form-data">

               <h2>Submit Report</h2>

               <label>Enter ID</label>
               <input type="text" name="studID" placeholder="Student ID"><br>

               <label>File</label>
               <input type="file" name="pdf_file" accept=".pdf" required><br>

               <button type="submit">Submit</button>

               </form>
          </div>

          

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