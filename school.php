<?php
// school page in dashboard 
// session statr 
session_start();
include 'authentication.php';
// connection file
include '_db_Connect.php';
$pin;
$count=1;
$query = mysqli_query($conn,"SELECT * FROM `asset`");
$data=array();
while ($row = mysqli_fetch_array($query)) {
  $qry = "SELECT * from `school` where `school_name`='" . $row['school_name'] . "'";
  $reslt = mysqli_query($conn, $qry);
  $rowq=mysqli_fetch_assoc($reslt);
  $pin=$rowq['pincode'];
  $data[] = array(
    "Sr"=>$count,
    "school_name"=>$row['school_name'],
    "district"=>$row['district'],
    "block"=>$row['block'],
    "village"=>$row['village'],
    "pincode"=>$pin
    
);
$count++;
}

// Query for Select District
// $sql = "SELECT DISTINCT `district` FROM `asset`;";
// $result = mysqli_query($conn, $sql);
// $EMP_NAME = $_SESSION['UserName'];
// $q = "SELECT * from `login` where `UserName`='$EMP_NAME'";
// $r = mysqli_query( $conn, $q );
// $t = mysqli_num_rows($r);
// $roww = $r->fetch_assoc();
// if ($t > 0 ) {
//   if ($roww['school']=='false') {
//     header('location:index.php');
//   }
// }
// // Query for Select Block
// if (isset($_POST['DIST'])) {
//   $Dis = $_POST['DIST'];
//   $sql2 = "SELECT DISTINCT `block` FROM `asset` WHERE `district`='$Dis' ORDER BY `asset`.`block` ASC;";
//   $result2 = mysqli_query($conn, $sql2);
//   $total2 = mysqli_num_rows($result2);
// }
// // Query for Select Village
// if (isset($_POST['DIST']) && isset($_POST['Block'])) {
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];
//   $sql3 = "SELECT  DISTINCT `village` FROM `asset` WHERE `block`='$Bl' AND `district`='$Dis'  ;";
//   $result3 = mysqli_query($conn, $sql3);
//   $total3 = mysqli_num_rows($result3);
// }
// Query for Select School
// if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
//   $village = $_POST['Village'];
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];
//   $sql4 = "SELECT  DISTINCT `school_name` FROM `asset` WHERE `block`='$Bl' AND `district`='$Dis' AND `village`='$village';";
//   $result4 = mysqli_query($conn, $sql4);
//   $total4 = mysqli_num_rows($result4);
// }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School</title>

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
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
            top: -500px;
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

<body class="hold-transition sidebar-mini layout-fixed " ng-app="myapp" ng-controller="useCtrl">

    <?php
  // Include Sidebar File
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
                            <h1 class="m-0 text-dark">School</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">School</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- general form elements -->
            <section class="content">
                <div class="card mx-2 shadow">
                    <div class="card-header" style="border:0px;">
                        <h3 class="card-title">School report</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="school.php" role="form" id="myform" name="myForm">
                        <div class="card-body row">
                            <div class="form-group col-lg-2">
                                <label for="school">District</label>
                                <select name="District" ng-model="District" style="width:100%;" class="form-control">
                                <option value="">Please Select</option>
                                    <option ng-repeat="users in users" value="{{users.district}}">{{users.district}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Block</label>
                                <select class="form-control " style="width: 100%" name='Block' ng-model="Block">
                                    <option value="">Please Select</option>
                                    <option ng-repeat="users in users | filter: {district : District}" ng-show="District!=''" value="{{users.block}}">{{users.block}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Village</label>
                                <select class="form-control " style="width: 100%" name='Village' ng-model="Village">
                                    <option value="">Please Select</option>
                                    <option ng-repeat="users in users| filter: {district : District} | filter: {block: Block} " value="{{users.village}}">{{users.village}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Select School </label>
                                <select class="form-control " style="width: 100%" name='school' ng-model="school">
                                    <option value="">Please Select </option>
                                    <option  ng-repeat="users in users| filter: {district : District} | filter: {block: Block} | filter: {village: Village} "  value="{{users.school_name}}">{{users.school_name}}</option>
                                </select>
                            </div>
                            <form action="#" method="get">
                                <div class="form-group col-lg-1 my-4 w-100">
                                    <button type="submit" name="Search" value="Search" class="btn "
                                        style="margin-top:8px; width:100%; background:#6f42c1; color:white;">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- </div> -->
                <!-- /.card-header -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mx-2">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <h4 class="card-title">Data</h4>
                                <table id="example2" class=" table-striped table-bordered table-hover" style="top:0; width:100%;">
                                    <thead style="height:50px;">
                                    <tr style="height:20px; font-size:16px;text-align:center;">
                                    <th>SR</th>
                                    <th>School name</th>
                                    <th>District</th>
                                    <th>Block</th>
                                    <th>Village</th>
                                    <th>Pincode</th>
                                    </tr>
                                    </thead>
                                    <tbody ng-controller="useCtrl">
                                    <tr ng-repeat="users in users | filter: {district : District} | filter: {block: Block} | filter: {village: Village} | filter:{school_name:school} " style=" height:40px; font-size:14px;text-align:center;">
                                   <td style="margin:10px;">{{users.Sr}}</td>
                                   <td>{{users.school_name}}</td>
                                   <td>{{users.district}}</td>
                                   <td>{{users.block}}</td>
                                   <td>{{users.village}}</td>
                                   <td>{{users.pincode}}</td>
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
    <script src="plugins/select2/js/select2.full.min.js"></script>
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
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });
    });
    </script>

</body>

</html>