<?php 
session_start();
//ends user session and redirects user back to login screen
session_unset();
session_destroy();

header("Location: index.php");
