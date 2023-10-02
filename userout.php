<!-- logout from application-->
<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "device");
if(isset($_POST['logout_btn'])){
    
    unset($_SESSION['auth']);
     unset($_SESSION['auth_user']);

     $_SESSION['Status']="log-out successfully";
     header('Location:applogin.php');
     exit(0);
                
    
}
?>  