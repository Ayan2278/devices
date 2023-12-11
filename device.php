<?php

session_start();
include 'authentication.php';
// connetion file
include '_db_Connect.php';
$sr = 1;
$count = 1;
$query = mysqli_query($conn, "SELECT * FROM `asset`");
$dataA = array();
// $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= 'PC0$c';";
// if (!isset($_POST['DIST']) || isset($_POST['Device']) && $_POST['Device'] == "Device" && $_POST['DIST'] == 'All') {

$directory = getcwd() . "/JSON//";
$filecount = 0;
$files2 = glob($directory . "*");
if ($files2) {
  $filecount = count($files2);
}
while ($sr <= $filecount) {
  $file = "JSON/PC0" . $sr . ".json";
  $pc_sr = "PC0" . $sr;
  $data = file_get_contents($file);
  $data = json_decode($data, true);
  if ($data != 0) {
    foreach ($data as $row) {
      date_default_timezone_set('Asia/Kolkata');
      $date = date('h:i:s');
      $datee = date("d/m/Y");
      $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
      if ($newDate < $row['End_time'] && $datee == $row['Date']) {
        $run = "Running";
      } else {
        $run = $row['End_time'];
      }
      $dataA[] = array(
        "Sr" => $count,
        "pc_sr" => $pc_sr,
        "date" => $row['Date'],
        "start_time" => $row['Start_time'],
        "end_time" => $run,
        "duration" => $row['Duration']
      );
      $count++;

    }
    $sr++;

  }
}

$query = mysqli_query($conn, "SELECT * FROM `asset`");
$data = array();
while ($row = mysqli_fetch_array($query)) {
  $data[] = array(
    "district" => $row['district'],
    "block" => $row['block'],
    "village" => $row['village'],
    "pc_sr" => $row['pc_sr']
  );
}

// echo json_encode($dataA);
// // }
// $query = mysqli_query($conn,"SELECT * FROM `asset`");
// $data=array();
// while ($row = mysqli_fetch_array($query)) {
//     $data[] = array(
//         "district" => $row['district'],
//         "block" => $row['block'],
//         "village" => $row['village'],
//         "pc_sr" => $row['pc_sr']
//     );
//     }
//  }

//   if ($newDate < $row['End_time'] && $datee == $row['Date']) {
//     echo '<small class="badge badge-success">Running</small>';
// } else {
//                 echo $row['End_time'] . '</td>';
//               }

// if ($newDate < $row['End_time'] && $datee == $row['Date']) {
//     return 'Running';
// }





// $directory = getcwd() . "/JSON//";
// $filecount = 0;
// $files2 = glob($directory . "*");
// if ($files2) {
//   $filecount = count($files2);
// }
// while ($c <= $filecount) {
//   $file = "JSON/PC0" . $c . ".json";
//   $data = file_get_contents($file);
//   $data = json_decode($data, true);
//   $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= '$c'";
//   $result5 = mysqli_query($conn, $query5);
//   if ($result5) {
//     $total5 = mysqli_num_rows($result5);

//     if ($data != 0) {
//       foreach ($data as $row) {
//             $data1[]=array(
//               "Sr"=>$count,
//               "pc_sr"=>$c,
//               "Date"=> $row['Date'],
//               "Start_time"=> $row['Start_time'],
//               "End_time"=> $row['End_time'],
//               "Duration"=> $row['Duration']
//             );
//             $count += 1;
//             $c += 1;
// }
// }
//   }
// }

// $count=1;
// $query = mysqli_query($conn,"SELECT * FROM `asset`");
// $data=array();
// while ($row = mysqli_fetch_array($query)) {
// $data[] = array(
//   "Sr"=>$count,
//   "pc_sr"=>$row['pc_sr']
// );

// $count++;
// }
// echo json_encode($data);












// $EMP_NAME = $_SESSION['UserName'];
// $q = "SELECT * from `login` where `UserName`='$EMP_NAME'";
// $r = mysqli_query($conn, $q);
// $t = mysqli_num_rows($r);
// $roww = $r->fetch_assoc();
// if ($t > 0) {
//   if ($roww['timming'] == 'false') {
//     header('location:index.php');
//   }
// }
// // display all districts
// $sql = "SELECT DISTINCT `district` FROM `asset`;";
// $result = mysqli_query($conn, $sql);

// //select districts
// if (isset($_POST['DIST'])) {
//   $Dis = $_POST['DIST'];
//   $sql2 = "SELECT DISTINCT `block` FROM `asset` WHERE `district`='$Dis' ORDER BY `asset`.`block` ASC ;";
//   $result2 = mysqli_query($conn, $sql2);
//   $total2 = mysqli_num_rows($result2);
// }

// // select district and block
// if (isset($_POST['DIST']) && isset($_POST['Block'])) {
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];
//   $sql3 = "SELECT  DISTINCT `village` FROM `asset` WHERE `block`='$Bl' AND `district`='$Dis';";
//   $result3 = mysqli_query($conn, $sql3);
//   $total3 = mysqli_num_rows($result3);
// }

// // select district ,block and village
// if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
//   $village = $_POST['Village'];
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];

//   $sql8 = "SELECT  DISTINCT `pc_sr` FROM `asset` WHERE `block`='$Bl' AND `district`='$Dis' AND `village`='$village'";
//   $result8 = mysqli_query($conn, $sql8);
//   $total8 = mysqli_num_rows($result8);
// }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Device</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-weight: 200;
      font-size: 16px;
    }

    .scrollbar {
      height: 300px;
      overflow-y: auto;
    }


    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
      background-color: #ADB5BD;
      border-radius: 5px;
    }


    ::-webkit-scrollbar-thumb {
      border-radius: 5px;
      background: linear-gradient(to bottom, #B8B8B8 0%, #8F8F8F 100%);
    }


    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(to bottom, #8F8F8F 0%, #B8B8B8 100%);
    }


    ::-webkit-scrollbar-track {
      background-color: #f5f5f5;
      border-radius: 1px;
    }

    .card-title {
      float: left;
      font-size: 1.5rem;
      font-weight: 400;
      margin: 0;
    }


    .bg {
      background: linear-gradient(to bottom, #2196F3, #0D47A1);
      border: none;
    }

    .bg:hover {
      transition: 0.3s;
      background: linear-gradient(to top, #0088f5, #01378a);
    }

    .popup-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);

      /* display: none; */
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .popupp {
      width: 400px;
      background: #fff;
      border-radius: 0.4rem;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      padding: 0 30px 30px;
      color: #333;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .popupp img {
      width: 100px;
      margin-top: -50px;
      border-radius;
      0.4rem;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .popupp h2 {
      font-size: 38px;
      font-weight: 500;
      margin: 30px 0 10px;
      color: red;
    }

    .popupp button {
      width: 100%;
      margin-top: 50px;
      padding: 10px 0;
      background: #6f42c1;
      color: #fff;
      border: 0;
      outline: none;
      font-size: 18px;
      border-radius: 0.4rem;
      cursor: pointer;
      box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .close {
      visibility: hidden;
      display: none;
    }

    @media print {
      body * {
        visibility: hidden;
      }

      table,
      table * {
        visibility: visible;

      }

      th {
        font-weight: 200;
        font-size: 14px;
      }

      td {

        border-color: inherit;
        border-style: solid;
        border-width: 0;
        font-size: 10px;
      }

      table {
        position: absolute;
        left: 0;
        top: -520px;
      }
    }
  </style>
  <script>
    function closePopup() {
      var popup = document.getElementById('popupp');
      popup.style.display = 'none';
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-weight: 200;
      font-size: 16px;
    }

    ::-webkit-scrollbar {
      max-width: 7px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #5c5c5c;
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      border-radius: 10px;
      background: #c7c7c7;
    }

    .focus:focus {
      border: 1px solid purple;
    }
  </style>
  <script src="Angular\angular.min.js"></script>
  <script>
    var app = angular.module("myapp", []);
    app.controller('useCtrl', function ($scope) {
      $scope.users = <?php echo json_encode($dataA); ?>;
      $scope.districts = <?php echo json_encode($data); ?>
      // $scope={{users.district}}
    })
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed " ng-app="myapp" ng-controller="useCtrl">
  <?php
  // include sidebar file
  include 'sidebar.php'
    ?>
  <div class="wrapper">

    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Device</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Device</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->


      <!-- general form elements -->
      <section class="content">
        <div class="card mx-2 shadow">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Device Timing</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" name="myForm" role="form" id="myform">
            <div class="card-body row">
              <div class="form-group col-lg-2">
                <label for="school">district</label>
                <select name="srchDistrict" ng-model="srchDistrict" style="width:100%;" class="form-control ">
                  <option value="">Select</option>
                  <option ng-repeat="user in districts " value="{{user.district}}">{{user.district}}
                  </option>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">Block</label>
                <select name="srchBlock" ng-model="srchBlock" style="width:100%;" class="form-control ">
                  <option value="">Select</option>
                  <option ng-repeat="users in districts | filter: {district : srchDistrict}" value="{{users.block}}">
                    {{users.block}}
                  </option>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">Village</label>
                <select class="form-control  " ng-model="Village" style="width: 100%" name='Village'>
                  <option Value="">Select</option>
                  <option
                    ng-repeat="users in districts | filter: {district : srchDistrict} | filter: {block : srchBlock}"
                    value="{{users.village}}">{{users.village}}</option>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">PC serial no.</label>
                <select class="form-control  " ng-model="PC" style="width: 100%" name='PC'>
                  <option value="">Select</option>
                  <option
                    ng-repeat="users in districts | filter: {district : srchDistrict} | filter: {block : srchBlock} | filter :{village : Village}"
                    value="{{users.pc_sr}}">{{users.pc_sr}}</option>
                </select>
              </div>
              <form action="device.php" method="post">
                <div class="form-group col-lg-1 my-4 w-100">
                  <button type="submit" name="Device" value="Device" class="btn  "
                    style="margin-top:8px;width:100%;  background:#6f42c1; color:white;">Device</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </form>
        </div>
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card mx-2">


                <div class="card-body">
                  <h4 class="card-title">Data</h4>

                  <table id="example2" class="  table-striped table-bordered table-hover" style="top:0; width:100%;">

                    <!-- displaying all devices data in table -->
                    <thead style="height:50px;">
                      <tr style="text-align:center;height:20px; font-size:16px;">
                        <th>SR</th>
                        <th>PC serial no.</th>
                        <th>Date</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Duration</th>
                      </tr>
                    </thead>
                    <tbody ng-controller="useCtrl">
                      <tr ng-repeat="user in users |  filter: {pc_sr : PC}"
                        style="text-align:center; height:41px; font-size:15px;">
                        <td>{{user.Sr}}</td>
                        <td>{{user.pc_sr}}</td>
                        <td>{{user.date}}</td>
                        <td>{{user.start_time}}</td>
                        <td><small class="badge badge-success"
                            ng-show="user.end_time == 'Running'">{{user.end_time}}</small>
                          <span ng-show="user.end_time != 'Running'">{{user.end_time}}</span>
                        </td>
                        <td>{{user.duration}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  // connection file
                  // include '_db_Connect.php';
                  
                  // $c = 1;
                  // $pcCount = 1;
                  // $count = 1;
                  // $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= 'PC0$c';";
                  // $directory = getcwd() . "/JSON//";
                  // $filecount = 0;
                  // $files2 = glob($directory . "*");
                  // if ($files2) {
                  //   $filecount = count($files2);
                  // }
                  // if (!isset($_POST['DIST']) || isset($_POST['Device']) && $_POST['Device'] == "Device" && $_POST['DIST'] == 'All') {
                  //   while ($c <= $filecount) {
                  //     $file = "JSON/PC0" . $c . ".json";
                  //     $data = file_get_contents($file);
                  //     $data = json_decode($data, true);
                  
                  //     $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= 'PC0$c'";
                  //     $result5 = mysqli_query($conn, $query5);
                  //     if ($result5) {
                  //       $total5 = mysqli_num_rows($result5);
                  //       if ($data != 0) {
                  //         foreach ($data as $row) {
                  //           echo '
                  //                 <tr style="text-align:center; height:41px; font-size:15px;">
                  //                     <td>' . $count . '</td>
                  //                     <td>PC0' . $c . '</td>
                  //                     <td>' . $row['Date'] . '</td>
                  //                     <td>' . $row['Start_time'] . '</td><td>';
                  //           date_default_timezone_set('Asia/Kolkata');
                  //           $date = date('h:i:s');
                  //           $datee = date("d/m/Y");
                  //           $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
                  //           if ($newDate < $row['End_time'] && $datee == $row['Date']) {
                  //             echo '<small class="badge badge-success">Running</small>';
                  //           } else {
                  //             echo $row['End_time'] . '</td>';
                  //           }
                  //           echo '
                  //                     <td>' . $row['Duration'] . '</td>
                  //                 </tr>
                  //                 ';
                  //           $count += 1;
                  //         }
                  //       } else
                  //         echo "<tr><td colspan='9'>No data found</td></tr>";
                  //     }
                  //     $c++;
                  //     $pcCount++;
                  //   }
                  
                  // }
                  // // if (isset($_POST['Device']) && $_POST['Device'] == "Device") {
                  // //   // count json file
                  // elseif ($_POST['DIST'] != "All" && $_POST['Block'] == "All") {
                  //   $Dis = $_POST['DIST'];
                  //   $query5 = "SELECT * FROM `asset` WHERE `district`= '$Dis'";
                  // } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] == "All") {
                  //   $Dis = $_POST['DIST'];
                  //   $Bl = $_POST['Block'];
                  //   $query5 = "SELECT * FROM `asset` WHERE `district`= '$Dis' AND `block`='$Bl'";
                  // } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] != "All" && $_POST['PC'] == "All") {
                  
                  //   $village = $_POST['Village'];
                  //   $Dis = $_POST['DIST'];
                  //   $Bl = $_POST['Block'];
                  
                  //   $query5 = "SELECT * FROM `asset` WHERE `district`= '$Dis' AND `block`='$Bl' AND `village`='$village' ";
                  // } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] != "All" && $_POST['PC'] != "All" && isset($_POST['Device']) && $_POST['Device'] == "Device") {
                  
                  //   $village = $_POST['Village'];
                  //   $Dis = $_POST['DIST'];
                  //   $Bl = $_POST['Block'];
                  //   $PC = $_POST['PC'];
                  //   $query5 = "SELECT * FROM `asset` WHERE `district`= '$Dis' AND `block`='$Bl' AND `village`='$village' AND `pc_sr`='$PC'";
                  // }
                  // if (isset($query5)) {
                  
                  //   $result5 = mysqli_query($conn, $query5);
                  //   $tot5 = mysqli_num_rows($result5);
                  //   if ($tot5 != 0) {
                  //     while ($row5 = $result5->fetch_assoc()) {
                  //       $pcsr = $row5['pc_sr'];
                  //       $file = "JSON/" . $pcsr . ".json";
                  //       $data = file_get_contents($file);
                  //       $data = json_decode($data, true);
                  //       if ($data != 0) {
                  //         foreach ($data as $row) {
                  //           echo '
                  //               <tr style="text-align:center; height:41px; font-size:14px;">
                  //                       <td>' . $count . '</td>
                  //                       <td>' . $pcsr . '</td>
                  //                       <td>' . $row['Date'] . '</td>
                  //                       <td>' . $row['Start_time'] . '</td><td>';
                  //           date_default_timezone_set('Asia/Kolkata');
                  //           $date = date('h:i:s');
                  //           $datee = date("d/m/Y");
                  //           $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
                  //           if ($newDate < $row['End_time'] && $datee == $row['Date']) {
                  //             echo '<small class="badge badge-success">Running</small>';
                  //           } else {
                  //             echo $row['End_time'] . '</td>';
                  //           }
                  //           echo '
                  
                  //                     <td>' . $row['Duration'] . '</td>
                  //               </tr>
                  //             ';
                  //           $count += 1;
                  //         }
                  //       } else
                  //         echo "<tr><td colspan='9'>No data found</td></tr>";
                  //     }
                  //   } else if (isset($_POST['PC']) && $_POST['PC'] != 'All') {
                  //     $file = "JSON/" . $_POST['PC'] . ".json";
                  //     $PC = $_POST['PC'];
                  //     if ($PC) {
                  //       $query4 = "SELECT * from `asset` where `pc_sr`='$PC';";
                  //       $result4 = mysqli_query($conn, $query4);
                  //       $total4 = mysqli_num_rows($result4);
                  //     }
                  //     $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= '$PC';";
                  //     $result5 = mysqli_query($conn, $query5);
                  //     if ($_POST['PC'] != "All") {
                  //       $count = 1;
                  //       $data = file_get_contents($file);
                  //       $data = json_decode($data, true);
                  //       if ($result5) {
                  //         $total5 = mysqli_num_rows($result5);
                  //         if ($data != 0) {
                  //           foreach ($data as $row) {
                  //             echo '
                  //                 <tr  style=" height:40px; font-size:14px;text-align:center;">
                  //                   <td>' . $count . '</td>
                  //                   <td>' . $PC . '</td>
                  //                   <td>' . $row['Date'] . '</td>
                  //                   <td>' . $row['Start_time'] . '</td>
                  //                   <td>' . $row['End_time'] . '</td>
                  //                   <td>' . $row['Duration'] . '</td>
                  //                 </tr>
                  //               ';
                  //             $count += 1;
                  //           }
                  //         } else
                  //           echo "<tr><td colspan='9'>No data found</td></tr>";
                  //       }
                  //     }
                  //   }
                  
                  // }
                  
                  // ?>

                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
        </section>

        <!-- /.card -->
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <?php
  //include footer file
  include 'footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script>
    function change() {
      document.getElementById("myform").submit();
    }
  </script>
  <script>
    function printTable() {
      window.print();
    }
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <!-- <script src="dist/js/adminlte.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <script>
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      placeholder: 'Please Select'
    });
  </script>
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
      });
    });
  </script>

</body>

</html>