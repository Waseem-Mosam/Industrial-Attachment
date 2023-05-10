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