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
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <h1>You are an <?php echo $_SESSION['role']; ?> Representative</h1>
     <a href="../logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>