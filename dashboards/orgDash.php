<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Organisation Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>

     <div class="row">
          <div class="col-4">
               <h1>Account Information</h1>
               <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
               <h2>You are an <?php echo $_SESSION['role']; ?> Representative</h2>
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