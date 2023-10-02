<?php
// this login page for dashboard and its password in database table
// connection file
include '_db_Connect.php';
  session_start();
 $conn = mysqli_connect("localhost", "root", "", "device");
if(isset($_POST['login_btn']))
{

    $EMP_NAME=$_POST['username'];
    $PASSWORD=$_POST['Password'];
                
    $log_query=$conn->prepare("SELECT * FROM `login` WHERE `username`='$EMP_NAME' AND `Password`='$PASSWORD' LIMIT 1");
    $log_query->execute();
    $result=$log_query->get_result();

    if($result->num_rows>0)
    {
        foreach($result as $row){
                $EMP_NAME=$row['username'];
                $PASSWORD=$row['Password'];
        }
            $_SESSION['auth']= true;

            $_SESSION['auth_user']=[
                'username'=>$EMP_NAME,
                'Password'=>$PASSWORD
            ];
            $_SESSION['Status']="Log-In Successfully";
            $_SESSION['username']=$EMP_NAME;
            header('location:index.php');
    }
    else{
        $_SESSION['Status']="Invalid";
        header("Location:login.php");
        echo'
            <script>
            window.location.href="Login.php";
            alert("login failed. Invalid Email and password")
        ';
        
    }

}
else{

    $_SESSION['Status']="Access denied";
    header('Location:Login.php');
   

}

?>