<?php
include '_db_Connect.php';
$sql = "SELECT DISTINCT `school` FROM `assets`;";
$result = mysqli_query($conn, $sql);

if (isset($_POST['school'])) {
  $school = $_POST['school'];
  $sql2 = "SELECT * FROM `assets` WHERE `school`='$school';";
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
        <div class="card ">
          <div class="card-header" style="border:0px;">
            <h3 class="card-title">Assets report</h3>
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
                  if ($result) {
                    $total = mysqli_num_rows($result);
                    if ($total != 0) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" . $row['school'] . "'";

                        echo isset($_POST["school"]) && $_POST["school"] == $row['school'] ? "selected " : "";
                        echo ">" . $row['school'] . "</option>";
                      }
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label for="exampleInputPassword1">PC sr</label>
                <select class="form-control select2bs4" style="width: 100%" name='pc' >
                  <option selected="selected">Please Select</option>
                  <?php
                  if ($result2) {

                    if ($total2 != 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                        echo "<option ";
                        echo isset($_POST["pc"]) && $_POST["pc"] == $row2["PC"] ? "selected " : "";
                        echo "value='" . $row2["PC"] . "'>" . $row2["PC"] . "</option>";

                      }
                    }
                  }
                  ?>
                </select>
              </div>
              
              


              <form action="#" method="get">
                <div class="form-group col-lg-1 my-4 w-100">
                  <button type="submit" name="Assets" value="Assets" class="btn " style="margin-top:8px; width:100%; background:#49ddc0; color:white;">Assets</button>
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
               
                
                 if(isset($_POST['Assets']) && $_POST['Assets'] == "Assets"){
                  echo '<thead>
                          <tr>
                            <th>SR</th>
                            <th>PC serial no.</th>
                            <th>PC ID</th>
                            <th>Device</th>
                          </tr>
                        </thead>
                <tbody>';
                
                
                  include '_db_Connect.php';
                   if ($_POST['pc']=="" && isset($_POST["Assets"])) {
                    $count = 1;
                    $pc = $_POST['pc'];
                    $pcId = $_POST['pc_id'];
                    $query5 = "SELECT * FROM `devices`;";
                    $result5 = mysqli_query($conn, $query5);
                    $total5 = mysqli_num_rows($result5);
                      if ($result5) {

                        $total5 = mysqli_num_rows($result5);
                        
                        if ($total5 != 0) {
                          while ($row = $result5->fetch_assoc()) {
                            echo '
                            <tr>
                              <td>' . $count . '</td>
                              <td>' . $row['pc'] . '</td>
                              <td>' . $row['pc_id'] . '</td>
                              <td>' . $row['device'] . '</td>
                              </tr>
                          ';
                            $count += 1;
                          }
                        } else
                          echo "<tr><td colspan='9'>No data found</td></tr>";
                      }
                    
                  }
                  if (isset($_POST['pc_id'])) {
                    $pc = $_POST['pc'];
                    $pcId = $_POST['pc_id'];
                    $query5 = "SELECT * FROM `devices` WHERE `pc`= '$pc' and `pc_id`='$pcId';";
                    $result5 = mysqli_query($conn, $query5);
                    if ($result5) {
                      $total5 = mysqli_num_rows($result5);
                    }
                    if ($_POST['pc_id'] != "Please Select") {
                     
                      if ($result5) {

                        $total5 = mysqli_num_rows($result5);
                        $count = 1;
                        if ($total5 != 0) {
                          while ($row = $result5->fetch_assoc()) {
                            echo '
                            <tr>
                              <td>' . $count . '</td>
                              <td>' . $row['pc'] . '</td>
                              <td>' . $row['pc_id'] . '</td>
                              <td>' . $row['device'] . '</td>
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