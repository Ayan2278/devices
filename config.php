<?php
 session_start();
session_regenerate_id(true);
include '_db_Connect.php';
$conn = mysqli_connect("localhost", "root", "", "device");
if(mysqli_connect_errno()){
    echo"connection failed".mysqli_connect_error();
    exit;
}

?>