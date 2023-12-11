<?php
include '_db_Connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "SELECT * from `login` where `id`='$id';";
    $res = mysqli_query($conn,$qry);
    $row= $res->fetch_assoc();
    
    if ($row['live_status'] == 'false' && isset($_POST['btnLS']) && $_POST['btnLS'] == 'disable' || $row['live_status'] == '') {
        $qryT = "UPDATE `login` SET `live_status`='true' WHERE `id` = '$id'";
    }
    else if($row['live_status'] == 'true' && isset($_POST['btnLS']) && $_POST['btnLS'] == 'enable'  || $row['live_status'] == ''){
        $qryT = "UPDATE `login` SET `live_status`='false' WHERE `id` = '$id'";
      }
    if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }

    if ($row['asset'] == 'false' && isset($_POST['btnAsset']) && $_POST['btnAsset'] == 'disable' || $row['asset'] == '') {
        $qryT = "UPDATE `login` SET `asset`='true' WHERE `id` = '$id'";
    }
    else if ($row['asset'] == 'true' && isset($_POST['btnAsset']) && $_POST['btnAsset'] == 'enable' || $row['asset'] == '') {
        $qryT = "UPDATE `login` SET `asset`='false' WHERE `id` = '$id'";
      }
      if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }
      
    if ($row['timming'] == 'false' && isset($_POST['btntm']) && $_POST['btntm'] == 'disable' || $row['timming'] == '') {
        $qryT = "UPDATE `login` SET `timming`='true' WHERE `id` = '$id'";
    }
    elseif ($row['timming'] == 'true' && isset($_POST['btntm']) && $_POST['btntm'] == 'enable' || $row['timming'] == '') {
        $qryT = "UPDATE `login` SET `timming`='false' WHERE `id` = '$id'";
      }
      if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }

    if ($row['add'] == 'false' && isset($_POST['btnad']) && $_POST['btnad'] == 'disable' || $row['add'] == '') {
        $qryT = "UPDATE `login` SET `add`='true' WHERE `id` = '$id'";
    }
    else if ($row['add'] == 'true' && isset($_POST['btnad']) && $_POST['btnad'] == 'enable' || $row['add'] == '') {
        $qryT = "UPDATE `login` SET `add`='false' WHERE `id` = '$id'";
      }
      if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }

    if ($row['school'] == 'false' && isset($_POST['btnsc']) && $_POST['btnsc'] == 'disable' || $row['school'] == '') {
        $qryT = "UPDATE `login` SET `school`='true' WHERE `id` = '$id'";
    }
    else if ($row['school'] == 'true' && isset($_POST['btnsc']) && $_POST['btnsc'] == 'enable' || $row['school'] == '') {
        $qryT = "UPDATE `login` SET `school`='false' WHERE `id` = '$id'";
      }
      if (isset($qryT)) {
        $res = mysqli_query($conn , $qryT);
    }
      header("Location:Controls.php");
}
?>
