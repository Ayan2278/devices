<?php
// Authentication file
 session_start();
 if(!isset($_SESSION['auth']))
 {
    $_SESSION['authe_status']="login for access dashboard";
    header("Location:login.php");   
 }
?>