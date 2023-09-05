<?php
// include authentication file 
include 'authentication.php';

//include connection file
include '_db_Connect.php';

// total school
$sql = "SELECT  DISTINCT `school_name` FROM `school`;";
$result = mysqli_query($conn, $sql);

if (isset($_POST['school'])) {
  $school = $_POST['school'];
  $sql2 = "SELECT * FROM `asset` WHERE `school_name`='$school';";
  $result2 = mysqli_query($conn, $sql2);
  $total2 = mysqli_num_rows($result2);
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
              <h1 class="m-0 text-dark">Assets</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Assets</li>
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
            <h3 class="card-title ">Assets report</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="assets.php" role="form" id="myform">
            <div class="card-body row">
              <div class="form-group col-lg-2">
                <label for="device">School</label>
                <select class="form-control select2bs4" style="width: 100%" name="school" onchange="change()">
                  <option value="">Please Select</option>
                  <?php
                  // total school
                  if ($result) {
                    $total = mysqli_num_rows($result);
                    if ($total != 0) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" . $row['school_name'] . "'";

                        echo isset($_POST["school"]) && $_POST["school"] == $row['school_name'] ? "selected " : "";
                        echo ">" . $row['school_name'] . "</option>";
                      }
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">PC Id</label>
                <select class="form-control select2bs4" style="width: 100%" name='pc'>
                  <option selected="selected">Please Select</option>
                  <?php
                  // total pc ID
                  if ($result2) {

                    if ($total2 != 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                        echo "<option ";
                        echo isset($_POST["pc"]) && $_POST["pc"] == $row2["pc_sr"] ? "selected " : "";
                        echo "value='" . $row2["pc_sr"] . "'>" . $row2["pc_sr"] . "</option>";

                      }
                    }
                  }
                  ?>
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
        <div class="card mx-2 shadow" style="height:590px;">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Data</h3>
            <div class="col-lg-1 col-md-2 col-sm-2  " style="float:right;">
              <button type="submit" class="btn  w-100"  style="background-color:#ffc167;" onclick="printTable()">
                <i class="fas fa-download"></i> Print PDF
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body" style="overflow:hidden; overflow-x:scroll;overflow-y:scroll; padding:0;">
            <table id="example1" class="table table-bordered table-striped table-head-fixed">

              <?php
              
                  // displaying all data in table
                  echo '<thead>
                            <tr>
                              <th>SR</th>
                              <th>School name</th>
                              <th>PC Sr</th>
                              <th>TFT</th>
                              <th>Webcam</th>
                              <th>Headphone</th>
                            </tr>
                          </thead>
                  <tbody>';
              if (isset($_POST['Assets']) && $_POST['Assets'] == "Assets") {

                // connection file
                include '_db_Connect.php';

                $pc = $_POST['pc'];
                $school = $_POST['school'];
                $count = 1;
                if ($_POST['school'] == "" && isset($_POST["Assets"])) {
                  $query = "SELECT * FROM `asset` ORDER BY `asset`.`pc_sr` ASC";
                }
                elseif(isset($_POST['pc'])){
                  $query = "SELECT * FROM `asset` WHERE `pc_sr`= '$pc' ;";
                }
                $result = mysqli_query($conn, $query);
                $total = mysqli_num_rows($result);
                if ($total != 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '
                        <tr>
                          <td>' . $count . '</td>
                          <td>' . $row['school_name'] . '</td>
                          <td>' . $row['pc_sr'] . '</td>
                          <td>' . $row['TFT_id'] . '</td>
                          <td>' . $row['Webcam_id'] . '</td>
                          <td>' . $row['Headphone_id'] . '</td>
                          </tr>
                      ';
                      $count += 1;
                  }
                  if($total != 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo '
                        <tr>
                          <td>' . $count . '</td>
                          <td>' . $school . '</td>
                          <td>' . $pc . '</td>
                          <td>' . $row['TFT_id'] . '</td>
                          <td>' . $row['Webcam_id'] . '</td>
                          <td>' . $row['Headphone_id'] . '</td>
                        </tr>
                      ';
                      $count += 1;
                    }
                  } else
                    echo "<tr><td colspan='9'>No data found</td></tr>";
                }
              }


              //   if ($_POST['school'] == "" && isset($_POST["Assets"])) {
              //     $count = 1;
              //     $pc = $_POST['pc'];
              //     $school = $_POST['school'];
              //     $query5 = "SELECT * FROM `asset` ORDER BY `asset`.`pc_sr` ASC";
              //     $result5 = mysqli_query($conn, $query5);
              //     $total5 = mysqli_num_rows($result5);
              //     if ($result5) {
              //       $total5 = mysqli_num_rows($result5);


              //       if ($total5 != 0) {
              //         while ($row = $result5->fetch_assoc()) {
              //           echo '
              //               <tr>
              //                 <td>' . $count . '</td>
              //                 <td>' . $row['school_name'] . '</td>
              //                 <td>' . $row['pc_sr'] . '</td>
              //                 <td>' . $row['TFT_id'] . '</td>
              //                 <td>' . $row['Webcam_id'] . '</td>
              //                 <td>' . $row['Headphone_id'] . '</td>
              //                 </tr>
              //             ';
              //           $count += 1;
              //         }
              //       } else
              //         echo "<tr><td colspan='9'>No data found</td></tr>";
              //     }

              //   }
              //   if (isset($_POST['pc'])) {
              //     $pc = $_POST['pc'];
              //     $school = $_POST['school'];
              //     $query5 = "SELECT * FROM `asset` WHERE `pc_sr`= '$pc' ;";
              //     $result5 = mysqli_query($conn, $query5);
              //     if ($result5) {
              //       $total5 = mysqli_num_rows($result5);
              //     }
              //     if ($_POST['pc'] != "Please Select") {

              //       if ($result5) {

              //         $total5 = mysqli_num_rows($result5);
              //         $count = 1;
              //         if ($total5 != 0) {
              //           while ($row = $result5->fetch_assoc()) {
              //             echo '
              //               <tr>
              //                 <td>' . $count . '</td>
              //                 <td>' . $school . '</td>
              //                 <td>' . $pc . '</td>
              //                 <td>' . $row['TFT_id'] . '</td>
              //                 <td>' . $row['Webcam_id'] . '</td>
              //                 <td>' . $row['Headphone_id'] . '</td>
              //               </tr>
              //             ';
              //             $count += 1;
              //           }
              //         } else
              //           echo "<tr><td colspan='9'>No data found</td></tr>";
              //       }
              //     }
              //   }
              // }

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
  <script src="dist/js/adminlte.js"></script>
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
</body>

</html>