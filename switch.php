<?php
include '_db_Connect.php';
if (isset($_POST['idUN'])) {
    $id = $_POST['idUN'];
    if (isset($_POST['Live_S'])) {
        echo $id;
        $qryT = "UPDATE `login` SET `live_status`='true' WHERE `id` = '$id'";
    }
    else{
        $qryT = "UPDATE `login` SET `live_status`='false' WHERE `id` = '$id'";
      }
      $res = mysqli_query($conn , $qryT);
      echo $qryT;
    //   header("Location:Controls.php");
}
?>