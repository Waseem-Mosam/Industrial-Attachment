<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>

   <div class="main">
     <form action="studentUpload.php" method="post">
     	<h2>Student Registration</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	
        <label>First Name</label>
     	<input type="text" name="fName" placeholder="First Name" pattern="[A-Za-z]+" title="Can only contain letters"><br>

        <label>Last Name</label>
     	<input type="text" name="lName" placeholder="Last Name" pattern="[A-Za-z]+" title="Can only contain letters"><br>

        <label>Email</label>
     	<input type="text" name="email" placeholder="Email"><br>

        <label for="locations">Choose a location:</label><br>
        <select id="locations" name="locations">
            <option value="Lobatse">Lobatse</option>
            <option value="Gaborone">Gaborone</option>
            <option value="Francistown">Francistown</option>
            <option value="Maun">Maun</option>
            <option value="Kanye">Kanye</option>
        </select> <br>

        <label for="projects">Choose a project:</label><br>
        <select id="projects" name="projects">
            <option value="WebDev">Web Development</option>
            <option value="App">App Development</option>
            <option value="Networking">Networking</option>
            <option value="AI">Artificial Intelligence</option>
            <option value="Cyber">Cyber Security</option>
        </select> <br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

        <label>Confirm Password</label>
     	<input type="password" name="confirmPass" placeholder="Confirm Password"><br>

     	<button type="submit">Submit</button>
     </form>

      <h2>Return to login</h2>
	   <li class="regButtons">
         <a href="../index.php">Go Back</a>
	   </li>

      </div>
</body>
</html>