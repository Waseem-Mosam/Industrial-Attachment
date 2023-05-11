<!DOCTYPE html>
<html>
<head>
	<title>Allocation</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
</head>
<body>
	<div class="row">
          <div class="col-4 main">
		  <!-- displays all unallocated students -->
               <h3 color="white">Unallocated Students</h3>
               <?php
               include '../assets/dbconnect.php';
               //select unallocated students
               $sql = "SELECT id,firstName,lastName, preferredLocation, preferredProject FROM `iams_user` WHERE `role` = 'Student' AND `status` = 'Not Allocated';";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_object($result)){ ?>
                    <div> 
                         <h5>Student ID: <?php echo $row->id; ?></h5> 
                         <h5>Name: <?php echo $row->firstName." ".$row->lastName; ?></h5>
                         <h5>Preferred Location: <?php echo $row->preferredLocation?></h5>
                         <h5>Interest: <?php echo $row->preferredProject; ?></h5>
                         <hr>
                    </div>
               <?php
               }
               ?>
          </div>
	 </div>

     <div class="row">
          <div class="col-4 main">
               <form action="functions/allocate.php" method="post">
		        <!-- form used to allocate students to organisation -->
                    <h2>Allocate Students</h2>

                    <?php if (isset($_GET['error'])) { ?>
                         <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php include '../assets/dbconnect.php'?>
                    <select name="studID">
                    <option value="">Select Student ID</option>

                    <?php
                    $sql = "SELECT id FROM iams_user WHERE role = 'Student' AND status = 'Not Allocated'";
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
                    </select>
                    <select name="orgName">
                    <option value="">Select Organization</option>

                    <?php
                    $sql = "SELECT orgName FROM iams_org";
                    $result = mysqli_query($conn, $sql);

                    if($result->num_rows> 0){
                         while($optionData=$result->fetch_assoc()){
                         $option =$optionData['orgName'];
                    ?>
                    <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>

                    <?php
                         }
                    }
                    ?>
                    </select>
                    <button type="submit">Submit</button>
                    </form>
                    <br><br>
		   <!-- button used to return to main dashboard of coordinator -->
                    <li class="regButtons">
                    <a href="coordinatorDash.php">Go Back</a>
                    </li>
          </div>
     </div>
      <div class="row">
          <div class="col-4 main">
		  <!-- displays all available organisations -->
               <h3 color="white">Available Organizations</h3>
               <?php
               include '../assets/dbconnect.php';
               //select unallocated students
               $sql = "SELECT orgName,location, email, project FROM `iams_org`;";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_object($result)){ ?>
                    <div> 
                         <h5><?php echo $row->orgName; ?></h5> 
                         <h5>Location: <?php echo $row->location; ?></h5>
                         <h5>Project: <?php echo $row->project; ?></h5>
                         <h5>Email: <?php echo $row->email; ?></h5>
                         <hr>
                    </div>
               <?php
               }
               ?>
          </div>
	 </div>

</body>
</html>
