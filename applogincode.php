<?php
        // connection file
include '_db_Connect.php';
  session_start();
 $conn = mysqli_connect("localhost", "root", "", "device");
if(isset($_POST['submit']))
{

    $EMP_NAME=$_POST['username'];
    $PASSWORD=$_POST['Password'];
                
    $log_query=$conn->prepare("SELECT * FROM `asset` WHERE `username`='$EMP_NAME' AND `Password`='$PASSWORD' LIMIT 1");
    $log_query->execute();
    $result=$log_query->get_result();

    if($result->num_rows>0)
    {
        
        foreach($result as $row){
                $id=$row['pc_sr'];
                $EMP_NAME=$row['username'];
                $PASSWORD=$row['Password'];
        }
            $_SESSION['auth']= true;

            $_SESSION['auth_user']=[
                'username'=>$EMP_NAME,
                'Password'=>$PASSWORD,
                'PC'=>$id
            ];
            $_SESSION['Status']="Log-In Successfully";
            // $_SESSION['username']=$EMP_NAME;
            $_SESSION['pc_sr']=$id;
            header('location:application.php');
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