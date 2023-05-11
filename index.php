<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
	<div class="main">
     <form action="login.php" method="post">
     	<h2>Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>

	 <h2>Need an account?</h2>
	 <li class="regButtons">
		<a href="registration/studentReg.php">Register Student</a>
		<a href="registration/orgReg.php">Register Organisation</a>
	 </li>
	 
	 </div>
</body>
</html>