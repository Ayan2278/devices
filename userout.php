<!-- logout from application-->
<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "system");
if(isset($_POST['logout_btn'])){
    
    unset($_SESSION['authh']);
     unset($_SESSION['authh_user']);

     $_SESSION['Status']="log-out successfully";
     header('Location:applogin.php');
     exit(0);
}
?>  