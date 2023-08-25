<?php
 session_start();
 if(!isset($_SESSION['auth']))
 {
    $_SESSION['auth_status']="login for access dashboard";
    header("Location:login.php");   
 }
?>