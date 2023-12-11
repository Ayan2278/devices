<?php
include '_db_Connect.php';
if (isset($_POST['LSE'])) {
    $pos = $_POST['LSE'];
    $qry = "UPDATE `login` SET `live_status` = 'true' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
else if (isset($_POST["LSD"])) {
    $pos = $_POST["LSD"];
    $qry = "UPDATE `login` SET `live_status` = 'false' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}

if (isset($_POST['AssetE'])) {
    $pos = $_POST['AssetE'];
    $qry = "UPDATE `login` SET `asset` = 'true' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
else if (isset($_POST["AssetD"])) {
    $pos = $_POST["AssetD"];
    $qry = "UPDATE `login` SET `asset` = 'false' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}

if (isset($_POST['TimingE'])) {
    $pos = $_POST['TimingE'];
    $qry = "UPDATE `login` SET `timming` = 'true' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
else if (isset($_POST["TimingD"])) {
    $pos = $_POST["TimingD"];
    $qry = "UPDATE `login` SET `timming` = 'false' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}

if (isset($_POST['AddE'])) {
    $pos = $_POST['AddE'];
    $qry = "UPDATE `login` SET `add` = 'true' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
else if (isset($_POST["AddD"])) {
    $pos = $_POST["AddD"];
    $qry = "UPDATE `login` SET `add` = 'false' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}

if (isset($_POST['SchoolE'])) {
    $pos = $_POST['SchoolE'];
    $qry = "UPDATE `login` SET `school` = 'true' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
else if (isset($_POST["SchoolD"])) {
    $pos = $_POST["SchoolD"];
    $qry = "UPDATE `login` SET `school` = 'false' WHERE `roll` = '$pos'";
    $res = mysqli_query($conn,$qry);
}
header("Location:Category.php");

?>