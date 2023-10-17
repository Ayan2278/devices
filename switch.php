<?php
include '_db_Connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "SELECT * from `login` where `id`='$id';";
    $res = mysqli_query($conn,$qry);
    $row= $res->fetch_assoc();
    if ($row['live_status'] == 'false' && isset($_POST['btnLS']) && $_POST['btnLS'] == 'disable') {
        $qryT = "UPDATE `login` SET `live_status`='true' WHERE `id` = '$id'";
    }
    else if($row['live_status'] == 'true' && isset($_POST['btnLS']) && $_POST['btnLS'] == 'enable'){
        $qryT = "UPDATE `login` SET `live_status`='false' WHERE `id` = '$id'";
      }
    if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }


    if ($row['asset'] == 'false' && isset($_POST['btnAsset']) && $_POST['btnAsset'] == 'disable') {
        $qryT = "UPDATE `login` SET `asset`='true' WHERE `id` = '$id'";
    }
    else if ($row['asset'] == 'true' && isset($_POST['btnAsset']) && $_POST['btnAsset'] == 'enable') {
        $qryT = "UPDATE `login` SET `asset`='false' WHERE `id` = '$id'";
      }
      $res = mysqli_query($conn , $qryT);


      
    if ($row['timming'] == 'false') {
        $qryT = "UPDATE `login` SET `timming`='true' WHERE `id` = '$id'";
    }
    else{
        $qryT = "UPDATE `login` SET `timming`='false' WHERE `id` = '$id'";
      }
      $res = mysqli_query($conn , $qryT);



    if ($row['add'] == 'false') {
        $qryT = "UPDATE `login` SET `add`='true' WHERE `id` = '$id'";
    }
    else{
        $qryT = "UPDATE `login` SET `add`='false' WHERE `id` = '$id'";
      }
      $res = mysqli_query($conn , $qryT);



    if ($row['school'] == 'false') {
        $qryT = "UPDATE `login` SET `school`='true' WHERE `id` = '$id'";
    }
    else{
        $qryT = "UPDATE `login` SET `school`='false' WHERE `id` = '$id'";
      }
      $res = mysqli_query($conn , $qryT);
      header("Location:Controls.php");
}
?>