<?php
// include authenticatine file 
include 'authentication.php';

// includeing connection file
include '_db_Connect.php';
// $sql = "SELECT DISTINCT `district` FROM `asset`;";
// $PASSWORD=$_SESSION['Password'];

//select user-name according to login users
$EMP_NAME=$_SESSION['username'];
$queryy = "SELECT * FROM `user` WHERE `username`='$EMP_NAME'";
$resultt = mysqli_query($conn, $queryy);

//select all districts
$id=$_SESSION['pc_sr'];
$sql = "SELECT DISTINCT `district` FROM `user` WHERE  `username`='$EMP_NAME'";
$result = mysqli_query($conn, $sql);

//fetch block for select box
if (isset($_POST['DIST'])) {
  $Dis = $_POST['DIST'];
  $sql2 = "SELECT DISTINCT `block` FROM `asset` WHERE `district`='$Dis' ORDER BY `asset`.`block` ASC;";
  $result2 = mysqli_query($conn, $sql2);
  $total2 = mysqli_num_rows($result2);
}

//fetch village according to district
if (isset($_POST['DIST']) && isset($_POST['Block'])) {
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql3 = "SELECT DISTINCT `village` FROM `asset` WHERE `block`='$Bl' AND `district`='$Dis';";
  $result3 = mysqli_query($conn, $sql3);
  $total3 = mysqli_num_rows($result3);
}

//fetch school-name According to the district , block and village
if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
  $village = $_POST['Village'];
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql4 = "SELECT  DISTINCT `school_name` FROM `user` WHERE `district`='$Dis' AND `username`='$EMP_NAME'";
  $result4 = mysqli_query($conn, $sql4);
  $total4 = mysqli_num_rows($result4);
}

//fetch PC-Serial number According to school-name
if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village']) && isset($_POST['school'])) {
  $village = $_POST['Village'];
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $schl = $_POST['school'];
  $sql8 = "SELECT  DISTINCT `pc_sr` FROM `user` WHERE `district`='$Dis' AND `username`='$EMP_NAME' AND `school_name`='$schl'";
  $result8 = mysqli_query($conn, $sql8);
  $total8 = mysqli_num_rows($result8);
}

//fetch all Activities According to users and pc-sr
 if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village']) && isset($_POST['school']) && isset($_POST['PC']) && $_POST['PC'] != "All" ) {
    $PC = $_POST['PC'];
    $EMP_NAME=$_POST['username'];
    $schl = $_POST['school'];
    $village = $_POST['Village'];
    $Dis = $_POST['DIST'];
    $Bl = $_POST['Block'];
    $sql4 = "SELECT * FROM `user` WHERE `username`='$EMP_NAME'";
    $result5 = mysqli_query($conn, $sql4);
    $total5 = mysqli_num_rows($result5);
  if (isset($_POST['PC']) && $_POST['PC'] != "All" ) {

  //fetch data from json file
    $cd = 1;
    $file = "JSON PC/" . $_POST['username'] . ".json";
    $data = file_get_contents($file);
    $data = json_decode($data, true);
    $cd++;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Application</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            top: -650px;
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
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
    <?php
  include 'sidebar.php'
    ?>
    <!-- Main Sidebar Container -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Application</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Application</li> -->

                                <div class="info">
                                    <form action="userout.php" method="POST">
                                        <button type="submit" name="logout_btn"
                                            style="margin-left:195px;margin-top:0px;color:solid black;" class="btn ">
                                            <i class="fa-solid fa-right-from-bracket"
                                                style="font-size:25px;color:black;"></i></button>
                                    </form>
                                </div>

                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->


            <!-- general form elements -->
            <section class="content">
                <div class="card mx-2" style="top:0;">
                    <!---card-header -->
                    <div class="card-header" style="border:0px;">
                        <h3 class="card-title">Application Timing</h3>
                    </div>
                    <!-- form start -->
                    <form method="POST" action="application.php" role="form" id="myform">
                        <div class="card-body row">
                            <div class="form-group col-lg-1">
                                <label for="exampleInputPassword1">User</label>
                                <select class="form-control select2bs4" style="width: 100%" name='username'>
                                    <?php
                                          if ($resultt) {
                                            // Selected option according to login users
                                            $totall = mysqli_num_rows($resultt);
                                            if ($totall != 0) {
                                              while ($row = $resultt->fetch_assoc()) {

                                                // fetch username 
                                                echo "<option value='" . $row['username'] . "' ";
                                                echo isset($_POST["username"]) && $_POST["username"] == $row['username'] ? "selected " : "";
                                                echo ">" . $row['username'] . "</option>";
                                              }
                                            }
                                          }
                                      ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="device">District</label>
                                <select class="form-control select2bs4" style="width: 100%" name="DIST"
                                    onchange="change()">
                                    <option value="All">All</option>
                                    <?php
                                            if ($result) {
                                              // options for district
                                              $total = mysqli_num_rows($result);
                                              if ($total != 0) {
                                                while ($row = $result->fetch_assoc()) {

                                                  echo "<option value='" . $row['district'] . "' ";
                                                  echo isset($_POST["DIST"]) && $_POST["DIST"] == $row['district'] ? "selected " : "";
                                                  echo ">" . $row['district'] . "</option>";
                                                }
                                              }
                                            }
                                     ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Block</label>
                                <select class="form-control select2bs4" style="width: 100%" name='Block'
                                    onchange="change()">
                                    <option value="All">All</option>
                                      <?php
                                            if ($result2) {
                                              // options for Block
                                              if ($total2 != 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                                  echo "<option ";
                                                  echo isset($_POST["Block"]) && $_POST["Block"] == $row2["block"] ? "selected " : "";
                                                  echo "value='" . $row2["block"] . "'>" . $row2["block"] . "</option>";
                                                }
                                              }
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Village</label>
                                <select class="form-control select2bs4" style="width: 100%" name='Village'
                                    onchange="change()">
                                    <option value="All">All</option>
                                      <?php
                                          if ($result3) {
                                            // options for Village
                                            if ($total3 != 0) {
                                              while ($row3 = $result3->fetch_assoc()) {
                                                echo "<option ";
                                                echo isset($_POST["Village"]) && $_POST["Village"] == $row3["village"] ? "selected " : "";
                                                echo "value='" . $row3["village"] . "'>" . $row3["village"] . "</option>";
                                              }
                                            }
                                          }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">School name</label>
                                <select class="form-control select2bs4" style="width: 100%" name='school'
                                    onchange="change()">
                                    <option value="All">All</option>
                                      <?php
                                          if ($result3) {
                                            // options for school Name
                                            if ($total4 != 0) {
                                              while ($row4 = $result4->fetch_assoc()) {
                                                echo "<option ";
                                                echo isset($_POST["school"]) && $_POST["school"] == $row4["school_name"] ? "selected " : "";
                                                echo "value='" . $row4["school_name"] . "'>" . $row4["school_name"] . "</option>";
                                              }
                                            }
                                          }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-1">
                                <label for="exampleInputPassword1">PC serial no.</label>
                                <select class="form-control select2bs4" style="width: 100%" name='PC'
                                    onchange="change()">
                                    <option value="All">All</option>
                                      <?php
                                          // select pc serial number
                                          if ($result8) {

                                            while ($row8 = $result8->fetch_assoc()) {
                                              echo "<option ";
                                              echo isset($_POST["PC"]) && $_POST["PC"] == $row8["pc_sr"] ? "selected " : "";
                                              echo "value='" . $row8["pc_sr"] . "'>" . $row8["pc_sr"] . "</option>";
                                            }
                                          }
                                        ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-1">
                                <label for="exampleInputPassword1">Activity</label>
                                <select class="form-control select2bs4" style="width: 100%" name='Activity'>
                                    <option value="All">All</option>
                                    <?php
                                          if ($result5) {

                                          // options for Activity Name
                                          foreach ($data as $row) {
                                            $arr[] = $row['Activity'];
                                            echo "<option ";
                                            echo isset($_POST["Activity"]) && $_POST["Activity"] == $row["Activity"] ? "selected " : "";
                                            echo "value='" . $row["Activity"] . "'>" . $row["Activity"] . "</option>";
                                          }
                                      }
                                      ?>
                                </select>
                            </div>
                            <form action="application.php" method="POST">
                                <div class="form-group col-lg-1 w-100 my-4">
                                    <button type="submit" name="Application" value="Application" class="btn"
                                        style="margin-top:8px;width:100%; background:#6f42c1; color:white;">Application</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.form end -->
                    </form>
                </div>
                <!--- section end ---->
            </section>
            <!--- section start ---->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mx-2">
                            <!---card-body -->
                            <div class="card-body">
                                <!---card-title -->
                                <h4 class="card-title">Data</h4>
                                <table id="example2" class=" table-striped table-bordered table-hover"
                                    style="top:0; width:100%;">

                                  <?php
                                  // include connection file
                                  include '_db_Connect.php';

                                          // table headings
                                          echo '<thead style="height:50px;">
                                                  <tr class:"p-2" style="height:20px; font-size:15px;text-align:center;">
                                                    <th>SR</th>
                                                    <th>PC</th>
                                                    <th>Application</th>
                                                    <th>Date</th>
                                                    <th>Start time</th>
                                                    <th>End time</th>
                                                    <th>Duration</th>
                                                    <th>user</th>
                                                  </tr>
                                                </thead>
                                          <tbody>';
                                  // counts the Activity serial number
                                  $count = 1;
                                  $EMP_NAME=$_SESSION['username'];
                                  
                                  // display data according to login user
                                  $qry6 = "SELECT * from `user` where `username` = '$EMP_NAME'";
                                  $res6 = mysqli_query($conn,$qry6);
                                  if($row5 = $res6->fetch_assoc()) {
                                    $pcsr = $row5['pc_sr'];

                                    if(isset($_POST['Activity'])  && $_POST['Activity'] == "All") {
                                    $EMP_NAME=$_SESSION['username'];
                                    $file = "JSON PC/" . $_POST['username'] . ".json";
                                   
                                      $data = file_get_contents($file);
                                      $data = json_decode($data, true);
                                        if ($data != 0) {
                                        foreach ($data as $row) {
                                          if ($row['username'] == $EMP_NAME) {
                                            # code... 
                                            // fetch data from json file 
                                            echo '
                                                <tr style=" height:40px; font-size:14px;text-align:center;">
                                                        <td style="margin:10px;">' . $count . '</td>
                                                        <td>' . $pcsr . '</td>
                                                        <td>' . $row['Activity'] . '</td>
                                                        <td>' . $row['Date'] . '</td>
                                                        <td>' . $row['Start time'] . '</td><td>';
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $date = date('H:i:s');
                                                        $datee = date("d/m/Y");
                                                        $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
                                                        if ($newDate < $row['End time'] && $datee == $row['Date']) {
                                                        echo '<small class="badge badge-success">Running</small>';
                                                        } else {
                                                        echo $row['End time'] . '</td>';
                                                        }
                                                        echo '
                                                        <td>' . $row['Duration'] . '</td>
                                                        <td>' . $row['username'] . '</td>
                                                </tr>';
                                            $count += 1;
                                        }
                                      }
                                    }
                                  }
                                // display seleceted filter data in table
                                if(isset($_POST['Activity'])  && $_POST['Activity'] != "All") {
                                  $file = "JSON PC/" . $_POST['username'] . ".json";
                                   $data = file_get_contents($file);
                                   $data = json_decode($data, true);
                                      $count = 1;
                                      if ($data != 0) {
                                        foreach ($data as $row) {
                                          if ($_POST['Activity'] == $row['Activity']) {
                                           // display Activity data from json file 
                                                echo '
                                                    <tr style=" height:40px; font-size:14px;text-align:center;">
                                                        <td>' . $count . '</td>
                                                        <td>' . $pcsr . '</td>
                                                        <td>' . $row['Activity'] . '</td>
                                                        <td>' . $row['Date'] . '</td>
                                                        <td>' . $row['Start time'] . '</td><td>';
                                                        date_default_timezone_set('Asia/Kolkata');
                                                        $date = date('H:i:s');
                                                        $datee = date("d/m/Y");
                                                        $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
                                                        if ($newDate < $row['End time'] && $datee == $row['Date']) {
                                                        echo '<small class="badge badge-success">Running</small>';
                                                        } else {
                                                        echo $row['End time'] . '</td>';
                                                        }
                                                        echo '
                                                        <td>' . $row['Duration'] . '</td>
                                                        <td>' . $row['username'] . '</td>
                                                    </tr>';
                                                    $count += 1;
                                                  }
                                                }
                                              }
                                            }
                                           }
                                        // }
                                      ?>
                                    <!-- /.table-body-->
                                    </tbody>
                                    <!-- /.table -->
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--/section end-->
            </section>
            <!-- /.card -->
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div> <!-- /.content-wrapper -->
    <?php
  //include footer file
  include 'footer.php';
  ?>
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
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
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
    <!-- Bootstrap 4 -->
    <!-- DataTables -->
    <!-- AdminLTE App -->
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