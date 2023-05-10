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
          <div class="col-6 main">
               <form action="functions/uploadFile.php" method="post" enctype="multipart/form-data">

               <h2>Submit Report</h2>

               <label>Enter ID</label>
               <input type="text" name="studID" placeholder="Student ID"><br>

               <label>File</label>
               <input type="file" name="pdf_file" accept=".pdf" required><br>

               <button type="submit">Submit</button>

               </form>
          </div>

          <div class="col-6 main">'
               <a href="../logout.php">Logout</a>
               <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
               <h1>You are a <?php echo $_SESSION['role']; ?></h1>
               <h1>Your ID is <?php echo $_SESSION['id']; ?></h1>
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