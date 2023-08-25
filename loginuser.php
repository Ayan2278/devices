<?php
        // connection file
include '_db_Connect.php';
  session_start();
 $conn = mysqli_connect("localhost", "root", "", "device");
if(isset($_POST['login_btn']))
{

    $EMP_NAME=$_POST['UserName'];
    $PASSWORD=$_POST['Password'];
                
    $log_query=$conn->prepare("SELECT * FROM `login` WHERE `UserName`='$EMP_NAME' AND `Password`='$PASSWORD' LIMIT 1");
    $log_query->execute();
    $result=$log_query->get_result();

    if($result->num_rows>0)
    {
        
        foreach($result as $row){
                $EMP_NAME=$row['UserName'];
                $PASSWORD=$row['Password'];
        }
            $_SESSION['auth']= true;

            $_SESSION['auth_user']=[
                'UserName'=>$EMP_NAME,
                'Password'=>$PASSWORD
            ];
            $_SESSION['Status']="Log-In Successfully";
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