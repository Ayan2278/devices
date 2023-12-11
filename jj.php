<!-- send data of asset table to Angular script -->
<!-- send data of asset table to Angular script -->
<?php

include '_db_Connect.php';

$sel = mysqli_query($conn, "SELECT * FROM asset");
$data = array();
$count = 1;
$act;
$dist;

while ($row = mysqli_fetch_array($sel)) {
    if (status($row['pc_sr']) == 'Active') {
        $act = "Active";
    } else {
        $act = "Inactive";
    }
    $data[] = array("school_name" => $row['school_name'], "district" => $row['district'], "block" => $row['block'], "village" => $row['village'], "pc_sr" => $row['pc_sr'], "TFT_id" => $row['TFT_id'], "Webcam_id" => $row['Webcam_id'], "Headphone_id" => $row['Headphone_id'], "sr" => $count, "status" => $act);
    $dist[] = array("district" => $row['district']);

    $count++;
}

session_start();
// Use function for Live Status of Devices
function status($pcNo)
{
    $file = "JSON PC/" . $pcNo . ".json";
    $data = file_get_contents($file);
    $data = json_decode($data, true);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('H:i:s');
    $datee = date("d/m/Y");
    $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));

    foreach ($data as $row) {
        if ($newDate < $row['End time'] && $datee == $row['Date']) {
            return 'Active';
        }
    }
}

?>
<?php
// include authentication file 
include 'authentication.php';

//include connection file
include '_db_Connect.php';
$tft;
$web;
$hp;

$count=1;
$query = mysqli_query($conn,"SELECT * FROM `user`");
$data=array();
while ($row = mysqli_fetch_array($query)) {
$qry="SELECT * from `asset` where `pc_sr`='" . $row['pc_sr'] . "'";
$reslt=mysqli_query($conn, $qry);
$rowq=mysqli_fetch_assoc($reslt);
$tft=$rowq['TFT_id'];
$web=$rowq['Webcam_id'];
$hp=$rowq['Headphone_id'];
  $data[] = array(
                  "Sr"=>$count,
                  "school_name"=>$row['school_name'],
                  "username"=>$row['username'],
                  "pc_sr"=>$row['pc_sr'],
                  "TFT_id"=>$tft,
                  "Webcam_id"=>$web,
                  "Headphone_id"=>$hp
              );
              $count++;
}
$EMP_NAME = $_SESSION['UserName'];
$q = "SELECT * from `login` where `UserName`='$EMP_NAME'";
$r = mysqli_query( $conn, $q );
$t = mysqli_num_rows($r);
$roww = $r->fetch_assoc();
if ($t > 0 ) {
  if ($roww['asset']=='false') {
    header('location:index.php');
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Live-Status</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css"><!-- -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
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
                top: -320px;
            }
        }
    </style>
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
    <!-- script to get data from database -->
    <script src="Angular/angular.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope) {
            var users = <?php echo json_encode($data); ?>;
            $scope.users = users;
            $scope.districts = <?php echo json_encode($data); ?>;

            $scope.srchDistrict = '';
        });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed " ng-app="myApp" ng-controller="customersCtrl">
    <?php
    include 'sidebar.php'
        ?>
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Live Status</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Status</li>
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
                        <h3 class="card-title">Device Status</h3>
                    </div>{{srchDistrict!=''}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="live_status.php" role="form" id="myform">

                        <div class="card-body row">
                            <div class="form-group col-lg-2">
                                <label for="school">School</label>
                                <select name="schoolSrch" ng-model="schoolSrch" style="width:100%;" class="form-control">
                                <option value="">Select</option>
                                    <option ng-repeat="user in users" value="{{user.school_name}}">{{users.school_name}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Username</label>
                                <select name="srchUsername" ng-model="srchUsername" style="width:100%;" class="form-control">
                                <option value="">Select</option>
                                    <option ng-repeat="user in users | filter: {school_name : schoolSrch}" ng-show="schoolSrch!=''" value="{{users.username}}">{{user.username}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Village</label>
                                <select class="form-control" name="village" ng-model="village" id="">
                                    <option value="">Select</option>
                                    <option ng-repeat="users in users | filter: {district : srchDistrict} | filter: {block : srchBlock}" value="{{users.village}}"  ng-show="srchBlock!='' && srchDistrict!=''">{{users.village}}
                                    </option>
                                </select>
                            </div>
                            

                            <form action="live_status.php" method="post">
                                <div class="form-group col-lg-1 my-4 w-100">
                                    <button type="submit" name="Status" value="Status" class="btn  "
                                        style="margin-top:8px;width:100%;  background:#6f42c1; color:white;">Status</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->

                    </form>
                    <form method="post" action="live_status.php" role="form" id="myform">

                        <div class="card-body row">
                            <div class="form-group col-lg-2">
                                <label for="school">District</label>
                                <select name="srchDistrict" ng-model="srchDistrict" style="width:100%;" class="form-control">
                                <option value="">Select</option>
                                    <option ng-repeat="users in districts" value="{{users.district}}">{{users.district}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Block</label>
                                <select name="srchBlock" ng-model="srchBlock" style="width:100%;" class="form-control">
                                <option value="">Select</option>
                                    <option ng-repeat="users in districts | filter: {district : srchDistrict}" ng-show="srchDistrict!=''" value="{{users.block}}">{{users.block}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Village</label>
                                <select class="form-control" name="village" ng-model="village" id="">
                                    <option value="">Select</option>
                                    <option ng-repeat="users in users | filter: {district : srchDistrict} | filter: {block : srchBlock}" value="{{users.village}}"  ng-show="srchBlock!='' && srchDistrict!=''">{{users.village}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Select School </label>
                                <select class="form-control" name="school_name" ng-model="school_name" id="">
                                    <option value="">Select</option>
                                    <option ng-repeat="users in users | filter: {district : srchDistrict} | filter: {block : srchBlock} | filter:{village:village} " value="{{users.school_name}}" ng-show="village!='' && srchBlock!='' && srchDistrict!=''">
                                        {{users.school_name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">PC serial no.</label>

                                <select class="form-control" name="pc_sr" ng-model="pc_sr" id="">
                                    <option value="">Select</option>
                                    <option ng-show="school_name!='' && village!='' && srchBlock!='' && srchDistrict!=''" ng-repeat="users in users | filter: {district : srchDistrict} | filter: {block : srchBlock} | filter:{village:village} | filter:{school_name:school_name}" value="{{users.pc_sr}}">{{users.pc_sr}}</option>
                                </select>
                            </div>

                            <form action="live_status.php" method="post">
                                <div class="form-group col-lg-1 my-4 w-100">
                                    <button type="submit" name="Status" value="Status" class="btn  "
                                        style="margin-top:8px;width:100%;  background:#6f42c1; color:white;">Status</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- /.card-header -->
            </section>
            <section class="content">
                <div class="row" style="margin:1px;">
                    <div class="col-12">
                        <div class="card shadow" style="overflow:hidden; overflow-x:scroll;">
                            <div ng-controller="customersCtrl">{{users.school_name}}</div>
                            <div class="card-header" style="border: 0px; ">
                                <h4 class="card-title">Data</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="top:0;">

                                <table id="example2" class=" table-striped table-bordered table-hover"
                                    style="top:0; width:100%;">
                                    <thead style="height:50px;">
                                        <tr class="p-2" style="height:20px; font-size:16px;text-align:center;">
                                            <th>SR</th>
                                            <th>School_name</th>
                                            <th>Username</th>
                                            <th>PC SR</th>
                                            <th>TFT id</th>
                                            <th>Webcam Id</th>
                                            <th>Headphone_id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- ng-repeat="user in users | filter: {district : srchDistrict} | filter: {block : srchBlock} | filter :{village : village} | filter: {school_name: school_name} | filter: {pc_sr : pc_sr}" -->
                                        <tr ng-repeat="user in users" style=" height:40px; font-size:14px;text-align:center;">
                                            <td>{{user.Sr}}</td>
                                            <td>{{user.school_name}}</td>
                                            <td>{{user.username}}</td>
                                            <td>{{user.pc_sr}}</td>
                                            <td>{{user.TFT_id}}</td>
                                            <td>{{user.Webcam_id}}</td>
                                            <td>{{user.Headphone_id}}</td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    // // displaying all devices data in table
                                    // echo '<thead style="height:50px;">
                                    //             <tr class:"p-2" style="height:20px; font-size:16px;text-align:center;">
                                    //                     <th>SR</th>
                                    //                     <th>District</th>
                                    //                     <th>Block</th>
                                    //                     <th>Village</th>
                                    //                     <th>School name</th>
                                    //                     <th>PC sr</th>
                                    //                     <th>Status</th>
                                    //                 </tr>
                                    //                 </thead>
                                    //         <tbody>';
                                    // $count = 1;
                                    // $c = 1;
                                    // $pcCount = 1;
                                    // $count = 1;
                                    // $query1 = "SELECT * FROM `asset` ORDER BY `asset`.`pc_sr` ASC ";
                                    // if (isset($_POST['PC'])) {
                                    //     $PC = $_POST['PC'];
                                    //     $school = $_POST['school'];
                                    //     $Dis = $_POST['DIST'];
                                    //     $Bl = $_POST['Block'];
                                    //     $village = $_POST['Village'];
                                    //     if ($_POST['DIST'] == "All") {
                                    //         $query1 = "SELECT * FROM `asset` ORDER BY `asset`.`pc_sr` ASC ";
                                    //     } elseif ($_POST['DIST'] != "All" && $_POST['Block'] == "All") {
                                    //         $query1 = "SELECT  * FROM `asset`WHERE `district`='$Dis' ";
                                    //     } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] == "All") {
                                    //         $query1 = "SELECT  * FROM `asset`WHERE `district`='$Dis' AND `block`='$Bl'";
                                    //     } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] != "All" && $_POST['school'] == "All") {
                                    //         $query1 = "SELECT  * FROM `asset`WHERE `district`='$Dis' AND `block`='$Bl' AND `village`= '$village'";
                                    //     } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] != "All" && $_POST['school'] != "All" && $_POST['PC'] == "All") {
                                    //         $query1 = "SELECT  * FROM `asset`WHERE `district`='$Dis'AND `block`='$Bl' AND `village`= '$village' AND `school_name` = '$school'";
                                    //     } elseif ($_POST['DIST'] != "All" && $_POST['Block'] != "All" && $_POST['Village'] != "All" && $_POST['school'] != "All" && $_POST['PC'] != "All") {
                                    //         $query1 = "SELECT * FROM `asset` WHERE `district`='$Dis' AND `block`='$Bl' AND `village`= '$village' AND `school_name`= '$school' AND 
                                    //             `pc_sr`='$PC' ORDER BY `asset`.`pc_sr` ASC";
                                    //     }
                                    // }
                                    // //Set the connection for result
                                    // if (isset($query1)) {
                                    //     $result1 = mysqli_query($conn, $query1);
                                    //     $total1 = mysqli_num_rows($result1);
                                    // }
                                    // // Fetching the data 
                                    // if (isset($result1) && $result1) {
                                    //     while ($row = $result1->fetch_assoc()) {
                                    //         echo '
                                    //                 <tr  style=" height:40px; font-size:14px;text-align:center;">
                                    //                     <td>' . $count . '</td>
                                    //                     <td>' . $row['district'] . '</td>
                                    //                     <td>' . $row['block'] . '</td>
                                    //                     <td>' . $row['village'] . '</td>
                                    //                     <td>' . $row['school_name'] . '</td>
                                    //                     <td>' . $row['pc_sr'] . '</td>';
                                    //         echo "<td>";
                                    //         // if for Status is Active
                                    //         if (status($row['pc_sr']) == 'Active') {
                                    //             echo '<small class="badge badge-success">Active</small>';
                                    //             // Else for Status is Inactive
                                    //         } else {
                                    //             echo '<small class="badge badge-danger">Inactive</small>';
                                    //         }
                                    //         echo "</td>";
                                    //         echo "</tr>";
                                    
                                    //         $count += 1;
                                    //         $c++;
                                    //     }
                                    // } else
                                    //     echo "<tr><td colspan='9'>No data found</td></tr>";
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
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
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>