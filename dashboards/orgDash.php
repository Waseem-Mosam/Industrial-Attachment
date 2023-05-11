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
          <div class="col-4 main">
               <h1 color="white">Reports</h1>
               <?php
                    include '../assets/dbconnect.php';
                    $sql = "SELECT orgName FROM iams_org WHERE repId = '".$_SESSION['id']."';";
                    $result = mysqli_query($conn, $sql);
                    $orgName = "";
                    if($result->num_rows> 0){
                         while($org=$result->fetch_assoc()){
                         $orgName =$org['orgName'];
                         }
                    }
                    ?>
                    <?php
                    include '../assets/dbconnect.php';

                    $sql = "SELECT iams_report.id, iams_report.name FROM iams_report, iams_allocation WHERE orgName = '".$orgName."' AND iams_report.id =iams_allocation.id ORDER BY 'id' DESC;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_object($result)){ ?>

                         
                         <a href="functions/download.php?id=<?php echo $row->id; ?>">
                              <?php echo $row->name; ?>
                         </a>
                         <br><br>

                    <?php
                    }
                    ?>
          </div>
          <div class="col-4 main">

               <h1>Allocated Students</h1>
               <?php
                    include '../assets/dbconnect.php';

                    $sql = "SELECT iams_user.id, iams_user.firstName, iams_user.lastName FROM `iams_allocation`, iams_user WHERE iams_user.id = iams_allocation.id AND orgName = '".$orgName."';";
                    $result = mysqli_query($conn, $sql);
                    if($result->num_rows>0){
                         while($optionData=$result->fetch_assoc()){
                         $firstName =$optionData['firstName'];
                         $lastName =$optionData['lastName'];
                    ?>
                    <h3><?php echo $firstName." ".$lastName;?></h3>
                    
                    <?php
                         }
                    }
                    ?>
                    
          </div>
          <div class="col-4 main">
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