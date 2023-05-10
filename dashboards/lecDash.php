<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lecturer Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>
     <div class="row">
          <div class="main col-4">
               <?php
               include '../assets/dbconnect.php';

               $sql = "SELECT id, name FROM iams_report ORDER BY 'id' DESC";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_object($result)){ ?>

                    
                    <a href="functions/download.php?id=<?php echo $row->id; ?>">
                         <?php echo $row->name; ?>
                    </a>

               <?php
               }
               ?>
          </div>

          

          <div class="main col-4">
               <form action="functions/submitGrade.php" method="post">
               <h2>Enter Student Grade</h2>

               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <?php include '../assets/dbconnect.php'?>
               <select name="studID">
               <option value="">Select Student ID</option>

               <?php
               $sql = "SELECT id FROM iams_user WHERE role = 'Student'";
               $result = mysqli_query($conn, $sql);

               if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['id'];
               ?>
               <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>

               <?php
                    }
               }
               ?>

               <label>Enter Grade</label>
               <input type="text" name="grade" placeholder="Grade"><br>

               <button type="submit">Submit</button>
               </form>
          </div>

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