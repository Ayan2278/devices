<?php
include '_db_Connect.php';
$sql = "SELECT DISTINCT `District` FROM `assets`;";
$result = mysqli_query($conn, $sql);

if (isset($_POST['DIST'])) {
  $Dis = $_POST['DIST'];
  $sql2 = "SELECT * FROM `assets` WHERE `District`='$Dis';";
  $result2 = mysqli_query($conn, $sql2);
  $total2 = mysqli_num_rows($result2);
}
if (isset($_POST['DIST']) && isset($_POST['Block'])) {
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql3 = "SELECT * FROM `assets` WHERE `Block`='$Bl' AND `District`='$Dis';";
  $result3 = mysqli_query($conn, $sql3);
  $total3 = mysqli_num_rows($result3);
}
if (isset($_POST['DIST']) && isset($_POST['Block']) && isset($_POST['Village'])) {
  $village = $_POST['Village'];
  $Dis = $_POST['DIST'];
  $Bl = $_POST['Block'];
  $sql4 = "SELECT * FROM `assets` WHERE `Block`='$Bl' AND `District`='$Dis' AND `Village`='$village';";
  $result4 = mysqli_query($conn, $sql4);
  $total4 = mysqli_num_rows($result4);
}

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
        <div class="card ">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Devices</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="device.php" role="form" id="myform">
            <div class="card-body row">
              <div class="form-group col-lg-2">
                <label for="device">District</label>
                <select class="form-control select2bs4" style="width: 100%" name="DIST" onchange="change()">
                  <option value="">Please Select</option>
                  <?php
                  if ($result) {
                    $total = mysqli_num_rows($result);
                    if ($total != 0) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" . $row['District'] . "'";

                        echo isset($_POST["DIST"]) && $_POST["DIST"] == $row['District'] ? "selected " : "";
                        echo ">" . $row['District'] . "</option>";
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
                        echo isset($_POST["Block"]) && $_POST["Block"] == $row2["Block"] ? "selected " : "";
                        echo "value='" . $row2["Block"] . "'>" . $row2["Block"] . "</option>";

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
                        echo isset($_POST["Village"]) && $_POST["Village"] == $row3["Village"] ? "selected " : "";
                        echo "value='" . $row3["Village"] . "'>" . $row3["Village"] . "</option>";

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
                  if ($result3) {

                    if ($total4 != 0) {
                      while ($row4 = $result4->fetch_assoc()) {
                        echo "<option ";
                        echo isset($_POST["PC"]) && $_POST["PC"] == $row4["PC"] ? "selected " : "";
                        echo "value='" . $row4["PC"] . "'>" . $row4["PC"] . "</option>";

                      }
                    }
                  }
                  ?>
                </select>
              </div>


              <form action="#" method="post">
                <div class="form-group col-lg-1 my-4 w-100">
                  <button type="submit" name="Device" value="Device" class="btn  " style="margin-top:8px;width:100%; background:#5ba7ff; color:white;">Device</button>
                </div>
              </form>
              
            </div>
            <!-- /.card-body -->

          </form>
        </div>
        <div class="card" style="height:590px;">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Data</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body" style="overflow:hidden; overflow-x:scroll;overflow-y:scroll;">
            <table id="example1" class="table table-bordered table-striped">
              
                <?php



                // for add new employee in the repors
                if (isset($_POST['Device']) && $_POST['Device'] == "Device") {
                  echo '<thead>
                          <tr>
                            <th>SR</th>
                            <th>PC serial no.</th>
                            <th>Date</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>Duration</th>
                          </tr>
                        </thead>
                <tbody>';
                $directory = getcwd()."/JSON//";
  
                $filecount = 0;
                
                $files2 = glob( $directory ."*" );
                
                if( $files2 ) {
                    $filecount = count($files2);
                }
                
  
                  include '_db_Connect.php';
  
                  if ($_POST['DIST']=="" && $_POST["Device"]=="Device") {
                    $c=1;
                    $pcCount=1;
                    $count = 1;
                    while($c<= $filecount)
                    {
                      $file = "JSON/PC0". $c .".json";
                        $query4 = "SELECT * from `assets` where `PC`='PC0$c';";
                        $result4 = mysqli_query($conn, $query4);
                        $total4 = mysqli_num_rows($result4);
                        if ($total4 != 0) {
                          # code...
                          $row4 = $result4->fetch_assoc();
                          $block = $row4['Block'];
                          $village = $row4['Village'];
                        }
                        $query5 = "SELECT * FROM `assets` WHERE `PC`= 'PC0$c';";
                        $result5 = mysqli_query($conn, $query5);
                        $data = file_get_contents($file);
                      $data = json_decode($data, true);
                      if ($result5) {
  
                        $total5 = mysqli_num_rows($result5);
                        
                        if ($data != 0) {
                          foreach ($data as $row) {
                            echo '
                            <tr>
                              <td>' . $count . '</td>
                              <td>PC0' . $c . '</td>
                              <td>' . $row['Date'] . '</td>
                              <td>' . $row['Start_time'] . '</td>
                              <td>' . $row['End_time'] . '</td>
                              <td>' . $row['Duration'] . '</td>
                            </tr>
                          ';
                            $count += 1;
                          }
                        } else
                          echo "<tr><td colspan='9'>No data found</td></tr>";
                      }
                      $c++;$pcCount++;
                    }
              }

                 


                  
                  if (isset($_POST['PC'])) {
                    $file = "JSON/" . $_POST['PC'] . ".json";
                    $PC = $_POST['PC'];
                    if ($PC) {
                      $query4 = "SELECT * from `assets` where `PC`='$PC';";
                      $result4 = mysqli_query($conn, $query4);
                      $total4 = mysqli_num_rows($result4);
                      if ($total4 != 0) {
                        # code...
                        $row4 = $result4->fetch_assoc();
                        $block = $row4['Block'];
                        $village = $row4['Village'];
                      }
                    }
                    $query5 = "SELECT * FROM `assets` WHERE `PC`= '$PC';";
                    $result5 = mysqli_query($conn, $query5);
                    if ($_POST['PC'] != "Please Select") {
                      $data = file_get_contents($file);
                      $data = json_decode($data, true);
                      if ($result5) {

                        $total5 = mysqli_num_rows($result5);
                        $count = 1;
                        if ($data != 0) {
                          foreach ($data as $row) {
                            echo '
                            <tr>
                              <td>' . $count . '</td>
                              <td>' . $PC . '</td>
                              <td>' . $row['Date'] . '</td>
                              <td>' . $row['Start_time'] . '</td>
                              <td>' . $row['End_time'] . '</td>
                              <td>' . $row['Duration'] . '</td>
                            </tr>
                          ';
                            $count += 1;
                          }
                        } else
                          echo "<tr><td colspan='9'>No data found</td></tr>";
                      }
                    }
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