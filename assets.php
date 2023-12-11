<?php
// include authentication file 
session_start();
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
                  "pc_sr"=>$row['pc_sr'],
                  "school_name"=>$row['school_name'],
                  "username"=>$row['username'],
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
    <title>Assets</title>
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
            top: -350px;
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
    </style>
    <script src="Angular\angular.min.js"></script>
    <script>
    var app = angular.module("myapp", []);
    app.controller('useCtrl', function($scope) {
        var users = <?php echo json_encode($data); ?>;
        $scope.users = users;
    })
    </script>
</head>
<!-- Main Sidebar Container -->

<body class="hold-transition sidebar-mini layout-fixed " ng-app="myapp" ng-controller="useCtrl">
    <?php
  include 'sidebar.php'
    ?>
    <!-- Wrapper class -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Assets</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Assets</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- /.card-shadow -->
                <div class="card mx-2 shadow">
                    <!-- /.card-header -->
                    <div class="card-header" style="border:0px;">
                        <!-- /.card-title -->
                        <h3 class="card-title ">Assets report</h3>
                    </div>{{school_name!=''}}
                    <!-- form start -->
                    <form method="post" action="assets.php" role="form" id="myform" name="myForm">
                        <div class="card-body row">
                            <div class="form-group col-lg-2">
                                <label for="device">School</label>
                                <select class="form-control" name="school_name" ng-model="school_name"  style="width: 100%">
                                    <option value="">Please Select</option>
                                    <option ng-repeat="users in users " value="{{users.school_name}}">{{users.school_name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="device">Username</label>
                                <select class="form-control " style="width: 100%" name="username"  ng-model="username">
                                    <option value="">Please Select</option>
                                    <option ng-repeat="users in users | filter:school_name " ng-show="school_name!=''" value="{{users.username}}">{{users.username}}</option>
                                </select>
                            </div>
                            <!-- general form elements -->
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">PC Id</label>
                                <select class="form-control " style="width: 100%" name='pc' ng-model="pc">
                                <option value="">Please Select</option>
                                    <option ng-repeat="users in users | filter:username | filter:school_name" ng-show="school_name!='' && username!='' " value="{{users.pc_sr}}">{{users.pc_sr}}</option>
                                </select>
                            </div>
                            <form action="#" method="get">
                                <div class="form-group col-lg-1 my-4 w-100">
                                    <button type="submit" name="Assets" value="Assets" class="btn "
                                        style="margin-top:8px; width:100%; background:#6f42c1; color:white;">Assets</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card-header -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mx-2" style="overflow:hidden; overflow-x:scroll;">
                            <div class="card-header" style="border:0px;">

                                <h4 class="card-title">Data</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="  table-striped table-bordered table-hover"
                                    style="top:0; width:100%;">
                                    <thead>
                                        <tr style="height:50px; font-size:16px; text-align:center;">
                                            <th>Sr</th>
                                            <th>School name</th>
                                            <th>Username</th>
                                            <th>PC Sr</th>
                                            <th>TFT Id</th>
                                            <th>Webcam Id</th>
                                            <th>Headphone Id</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-controller="useCtrl">
                                        <tr ng-repeat="users in users | filter:school_name | filter:username | filter:pc"
                                            style="height:40px; font-size:14px; text-align:center; ">
                                            <td>{{users.Sr}}</td>
                                            <td>{{users.school_name}}</td>
                                            <td>{{users.username}}</td>
                                            <td>{{users.pc_sr}}</td>
                                            <td>{{users.TFT_id}}</td>
                                            <td>{{users.Webcam_id}}</td>
                                            <td>{{users.Headphone_id}}</td>
                                        </tr>
                                   

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
    <script>
    $(function() {
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
    $(function() {
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