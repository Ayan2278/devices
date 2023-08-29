<?php
// connetion file
include '_db_Connect.php';

// display all districts
$sql0 = "SELECT `school_name` FROM `asset`";
$result0 = mysqli_query($conn, $sql0);

//select districts
if (isset($_POST['School'])) {
  $school = $_POST['School'];
  $sql2 = "SELECT * FROM `asset` WHERE `school_name`='$school';";
  $result2 = mysqli_query($conn, $sql2);
  $total2 = mysqli_num_rows($result2);
}


// // select district and block
// if (isset($_POST['DIST']) && isset($_POST['Block'])) {
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];
//   $sql3 = "SELECT * FROM `school` WHERE `block`='$Bl' AND `district`='$Dis';";
//   $result3 = mysqli_query($conn, $sql3);
//   $total3 = mysqli_num_rows($result3);
// }

// // select district ,block and village
// if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
//   $village = $_POST['Village'];
//   $Dis = $_POST['DIST'];
//   $Bl = $_POST['Block'];
//   $sql44 = "SELECT * from `school` WHERE `village`='$village' AND `district`='$Dis' AND `block`='$Bl'";
//   $result44 = mysqli_query($conn, $sql44);
//   $row = $result44->fetch_assoc();
//   $tot44 = mysqli_num_rows($result44);
//   if ($tot44 != 0) {
//     $schl = $row['school_name'];
//     $sql4 = "SELECT * FROM `asset` WHERE `school_name`='$schl';";
//     $result4 = mysqli_query($conn, $sql4);
//     $total4 = mysqli_num_rows($result4);
//   }
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
        top: -520px;
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
    .focus:focus{
      border: 1px solid purple;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
  <?php
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
          <form method="post" action="live_status.php" role="form" id="myform">
            <div class="card-body row">
              
              <div class="form-group col-lg-2">

                <label for="exampleInputPassword1">School</label>
                <select class="form-control select2bs4" style="width: 100%" name='School' onchange="change()">
                  <option selected="selected">Please Select</option>
                  <?php
                  // total school
                  if ($result0) {
                    $total0 = mysqli_num_rows($result0);
                    if ($total0 != 0) {
                      while ($row = $result0->fetch_assoc()) {

                        echo "<option value='" . $row['school_name'] . "'";

                        echo isset($_POST["School"]) && $_POST["School"] == $row['school_name'] ? "selected " : "";
                        echo ">" . $row['school_name'] . "</option>";
                      }
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">PC serial no.</label>
                <select class="form-control select2bs4" style="width: 100%" name='PC'>
                  <option selected="selected">Please Select</option>
                  <?php
                  // total pc ID
                  if ($result2) {

                    if ($total2 != 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                        echo "<option ";
                        echo isset($_POST["PC"]) && $_POST["PC"] == $row2["pc_sr"] ? "selected " : "";
                        echo "value='" . $row2["pc_sr"] . "'>" . $row2["pc_sr"] . "</option>";

                      }
                    }
                  }
                  ?>
                </select>
              </div>


              <form action="device.php" method="post">
                <div class="form-group col-lg-1 my-4 w-100">
                  <button type="submit" name="Status" value="Status" class="btn  "
                    style="margin-top:8px;width:100%;  background:#6f42c1; color:white;">Status</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->

          </form>
        </div>
        <div class="card mx-2 shadow" style="height:590px;">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Data</h3>
            <div class="col-lg-1 col-md-2 col-sm-2  " style="float:right;">
              <button type="submit" class="btn  w-100" style="background-color:#ffc167;" onclick="printTable()">
                <i class="fas fa-download"></i> Print PDF
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body" style="overflow:hidden; overflow-x:scroll;overflow-y:scroll; padding:0;">
            <table id="example1" class="table table-bordered table-striped table-head-fixed">

              <?php



              // displaying all devices data in table
              if (isset($_POST['Status']) && $_POST['Status'] == "Status") {
                echo '<thead>
                          <tr>
                            <th>SR</th>
                            <th>School name</th>
                            <th>PC sr</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                <tbody>';
                
                if (isset($_POST["PC"])) {
                  $school = $_POST['School'];
                  $count = 1;
                  $query1 = "SELECT  * FROM `asset` ";
                  $result1 = mysqli_query($conn, $query1);
                  $total1 = mysqli_num_rows($result1);

                  if ($result1) {
                    while ($row = $result1->fetch_assoc()) {
                    echo '
                    <td>' . $count . '</td>
                    <td>' . $row['school_name'] . '</td>
                    <td>' . $row['pc_sr'] . '</td>';
                    echo  "<td>";
                    if ($row["Status"] == "Active") {
                        echo "<span class='badge badge-success'>Active</span>";
                    } else {
                        echo "<span class='badge badge-danger'>Inactive</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                    
                    $count += 1;
                  }
                } else
                  echo "<tr><td colspan='9'>No data found</td></tr>";
              }

                if($_POST['School'] == "" && isset($_POST["Status"])){
                  $count=0;
                  $school = $_POST['School'];
                  $PC = $_POST['PC'];
                  $status = $_POST['Status'];
                  $query1 = "SELECT  * FROM `asset` ";
                  $result1 = mysqli_query($conn, $query1);
                  $total1 = mysqli_num_rows($result1);

                  if ($result1) {
                    while ($row = $result1->fetch_assoc()) {
                    echo '
                    <td>' . $count . '</td>
                    <td>' . $row['school_name'] . '</td>
                    <td>' . $row['pc_sr'] . '</td>';
                    echo  "<td>";
                    if ($row["Status"] == "Active") {
                        echo "<span class='badge badge-success'>Active</span>";
                    } else {
                        echo "<span class='badge badge-danger'>Inactive</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                    
                    $count += 1;
                  }
                } else
                  echo "<tr><td colspan='9'>No data found</td></tr>";
              }

                }
              
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
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="#">Ciencias</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1-pre
    </div>
  </footer>

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
  <script src="dist/js/adminlte.js"></script>
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

</body>

</html>