<?php
// connetion file
include '_db_Connect.php';

$sql = "SELECT DISTINCT `district` FROM `school`;";
$result = mysqli_query($conn, $sql);

if (isset($_POST['DIST'])) {
  $Dis = $_POST['DIST'];
  $sql2 = "SELECT * FROM `school` WHERE `district`='$Dis' ORDER BY `school`.`block` ASC;";
  $result2 = mysqli_query($conn, $sql2);
  $total2 = mysqli_num_rows($result2);
}
if (isset($_POST['DIST']) && isset($_POST['Block'])) {
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql3 = "SELECT * FROM `school` WHERE `block`='$Bl' AND `district`='$Dis'  ;";
  $result3 = mysqli_query($conn, $sql3);
  $total3 = mysqli_num_rows($result3);
}
if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
  $village = $_POST['Village'];
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql4 = "SELECT * FROM `school` WHERE `block`='$Bl' AND `district`='$Dis' AND `village`='$village';";
  $result4 = mysqli_query($conn, $sql4);
  $total4 = mysqli_num_rows($result4);
}
if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
  $village = $_POST['Village'];
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql44 = "SELECT * from `school` WHERE `village`='$village' AND `district`='$Dis' AND `block`='$Bl' ";
  $result44 = mysqli_query($conn, $sql44);
  $row = $result44->fetch_assoc();
  $tot44 = mysqli_num_rows($result44);
  if ($tot44 != 0 && $_POST['school'] != 'Please Select') {
    $schl = $row['school_name'];
    $sql5 = "SELECT * FROM `asset` WHERE `school_name`='$schl';";
    $result5 = mysqli_query($conn, $sql5);
    $total5 = mysqli_num_rows($result5);
  }
}




// display all districts
// $sql0 = "SELECT DISTINCT `school_name` FROM `asset`";
// $result0 = mysqli_query($conn, $sql0);

// //select districts
// if (isset($_POST['School'])) {
//   $school = $_POST['School'];
//   $sql2 = "SELECT * FROM `asset` WHERE `school_name`='$school';";
//   $result2 = mysqli_query($conn, $sql2);
//   $total2 = mysqli_num_rows($result2);
// }


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
                <label for="school">District</label>
                <select class="form-control select2bs4" style="width: 100%" name="DIST" onchange="change()">
                  <option value="Please Select">Please Select</option>
                  <?php
                  if ($result) {
                    $total = mysqli_num_rows($result);
                    if ($total != 0) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" . $row['district'] . "'";

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
                <select class="form-control select2bs4" style="width: 100%" name='Block' onchange="change()">
                  <option selected="selected">Please Select</option>
                  <?php
                  if ($result2) {

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
                <select class="form-control select2bs4" style="width: 100%" name='Village' onchange="change()">
                  <option selected="selected">Please Select</option>
                  <?php
                  if ($result3) {

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
                <label for="exampleInputPassword1">Select School </label>
                <select class="form-control select2bs4" style="width: 100%" name='school' onchange="change()">
                  <option selected="selected">Please Select</option>
                  <?php
                  if ($result3) {

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
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">PC serial no.</label>
                <select class="form-control select2bs4" style="width: 100%" name='PC'>
                  <option selected="selected">Please Select</option>
                  <?php
                  // select pc serial number
                  if ($result5) {

                    if ($total5 != 0) {
                      while ($row6 = $result5->fetch_assoc()) {
                        echo "<option ";
                        echo isset($_POST["PC"]) && $_POST["PC"] == $row6["pc_sr"] ? "selected " : "";
                        echo "value='" . $row6["pc_sr"] . "'>" . $row6["pc_sr"] . "</option>";

                      }
                    }
                  }
                  ?>
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
              echo '<thead>
                        <tr>
                          <th>SR</th>
                          <th>District</th>
                          <th>Block</th>
                          <th>Village</th>
                          <th>School name</th>
                          <th>PC sr</th>
                          <th>Status</th>
                          </tr>
                      </thead>
              <tbody>';
              if (isset($_POST['Status']) && $_POST['Status'] == "Status") {

                $PC = $_POST['PC'];
                $school = $_POST['school'];
                $count = 1;
                if ($_POST['DIST'] == "Please Select") {
                  $query1 = "SELECT  * FROM `asset` ";


                } elseif ($_POST['PC'] == "Please Select" && $_POST['school'] != "Please Select") {
                  $query1 = "SELECT  * FROM `asset`WHERE `school_name`='$school' ";

                } elseif ($_POST['DIST'] != "Please Select" && $_POST['Block'] != "Please Select" && $_POST['Village'] != "Please Select" && $_POST['school'] != "Please Select" && $_POST['PC'] != "Please Select") {
                  $query1 = "SELECT * FROM `asset` WHERE `school_name`= '$school' AND `pc_sr`='$PC'";

                }
                if (isset($query1)) {
                  $result1 = mysqli_query($conn, $query1);
                  $total1 = mysqli_num_rows($result1);

                }
                if (isset($result1) && $result1) {
                  $c = 1;
                  $pcCount = 1;
                  $directory = getcwd() . "/JSON PC//";
                  $filecount = 0;
                  $files2 = glob($directory . "*");
                  if ($files2) {
                    $filecount = count($files2);
                  }
                  while ($c <= $filecount) {
                    while ($row = $result1->fetch_assoc()) {
                      $file = "JSON PC/PC0" . $c . ".json";
                      $data = file_get_contents($file);
                      $data = json_decode($data, true);

                      echo '
                    <tr>
                    <td>' . $count . '</td>
                    <td>' . $row['district'] . '</td>
                    <td>' . $row['block'] . '</td>
                    <td>' . $row['village'] . '</td>
                    <td>' . $row['school_name'] . '</td>
                    <td>' . $row['pc_sr'] . '</td>';
                      echo "<td>";
                      date_default_timezone_set('Asia/Kolkata');
                      $date = date('h:i:s');
                      $datee = date("d/m/Y");
                      $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
                      foreach ($data as $rw) {
                        if ($newDate < $rw['End time'] && $datee == $rw['Date']) {
                          echo '<small class="badge badge-success">Active</small>';
                          break;
                        } else {
                          echo '<small class="badge badge-danger">Inactive</small>';
                        }
                      }

                      echo "</td>";
                      echo "</tr>";

                      $c++;

                    }
                    $count += 1;
                  }
                } else
                  echo "<tr><td colspan='9'>No data found</td></tr>";




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