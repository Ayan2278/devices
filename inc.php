<?php
// connection file
include '_db_Connect.php';
$qry = 'SELECT DISTINCT `school_name`,`district` FROM `asset`;';
$sql22 = "SELECT DISTINCT `school_name` FROM `school`";
$sqlIN = $qry;
$sqlDist = $qry;
$sqlDistt = $qry;
 $sql10 = "SELECT * FROM `asset`";
$sql11 = "SELECT * FROM `asset`";

//execute the query
$res22 = mysqli_query($conn, $sql22);
$resDist = mysqli_query($conn, $sqlDist);
$resIN = mysqli_query($conn, $sqlIN);
$resDistt = mysqli_query($conn, $sqlDistt);
$res10 = mysqli_query($conn, $sql10);
$res11 = mysqli_query($conn, $sql11);

//total number of rows
$tot22 = mysqli_num_rows($res22);
$totDist = mysqli_num_rows($resDist);
$totIN = mysqli_num_rows($resIN);
$totDistt = mysqli_num_rows($resDistt);
$tot10 = mysqli_num_rows($res10);
$tot11 = mysqli_num_rows($res11);

//select all districts
$sql11 = "SELECT DISTINCT `district` FROM `school`;";
$sql12 = "SELECT DISTINCT `block` FROM `school`;";
$sql13 = "SELECT DISTINCT `village` FROM `school`;";

$res1 = mysqli_query($conn, $sql11);
$res2 = mysqli_query($conn, $sql12);
$res3 = mysqli_query($conn, $sql13);

$tot1 = mysqli_num_rows($res1);
$tot2 = mysqli_num_rows($res2);
$tot3 = mysqli_num_rows($res3);

$row11 = $res1->fetch_assoc();
$row12 = $res2->fetch_assoc();
$row13 = $res3->fetch_assoc();

$data = file_get_contents("JSON PC\PC01.json");
$data = json_decode($data, true);
$act = 0;
$inact = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Nalanda School'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act++;
    } else {
      $inact++;
    }
  }


$act0 = 0;
$inact0 = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Asia pacific school'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act0++;
    } else {
      $inact0++;
    }
  }
$act1 = 0;
$inact1 = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Diwan ballu school'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act1++;
    } else {
      $inact1++;
    }
  }

$act2 = 0;
$inact2 = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Anand niketan school'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act2++;
    } else {
      $inact2++;
    }
  }


$act3 = 0;
$inact3 = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Delhi public school'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act3++;
    } else {
      $inact3++;
    }
  }


$act4 = 0;
$inact4 = 0;
$query = "SELECT * FROM `asset` WHERE `school_name`='Ankur School'";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
if ($total != 0)
  while ($row2 = $result->fetch_assoc()) {
    if ($row2["Status"] == "Active") {
      $act4++;
    } else {
      $inact4++;
    }
  }
  function status($pcNo)
  {
      $file = "JSON PC/" . $pcNo . ".json";
      $data = file_get_contents($file);
      // echo $data(1);
      $data = json_decode($data, true);
      date_default_timezone_set('Asia/Kolkata');
      $date = date('h:i:s');
      $datee = date("d/m/Y");
      $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));
  
      foreach ($data as $row) {
          if ($newDate < $row['End time'] && $datee == $row['Date']) {
              return 'Active';
          }
      }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      margin-top: 0px;
      background: #FAFAFA;
    }

    .order-card {
      color: #fff;
    }

    .bg-c-blue {
      background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
      background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
      background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
      background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
      box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
      border: none;
      margin-bottom: 30px;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }

    .card .card-block {
      padding: 25px;
    }

    .order-card i {
      font-size: 26px;
    }

    .f-left {
      float: left;
    }

    .f-right {
      float: right;
    }
  </style>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-weight: 200;
      font-size: 16px;
    }

    .c3,
    .c3>a {
      color: #fff !important;
    }

    .c3 {
      background: #a37a00;
    }

    path:hover {
      fill: #ffc065;
    }

    polygon:hover {
      fill: #ffc065;
    }

    .redHighlight:hover {
      fill: #0000ff;
    }

    .blueHighlight:hover {
      fill: #0000ff;
    }

    #bx-title-1 {
      text-align: center;
      background-color: #34b8e5;
      color: #fff;
      padding: 10px;
    }

    .effect {

      box-shadow: 1px 5px 10px #949494;
    }

    .effect:hover {
      box-shadow: 0px 0px 0px #ffffff;
      transform: translateY(8px);
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  include 'sidebar.php'
    ?>
  <div class="wrapper">

    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item" style="color:purple;"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">


        <div class="row ">
          <div class="col-lg-3 col-6 ">

            <div class="card bg-c-pink effect order-card " style="color:black; height:135px;">
              <div class="card-block">
                <h4 class="m-b-20">Total School</h4>
                <h1 class="text-right" style="font-size:50px;"><i class='bx bxs-school f-left my-3'
                    style="font-size:40px;"></i><span>
                    <?php echo "<b>" . sprintf('%02u', $tot22) . "</b>"; ?>
                  </span></h1>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card bg-c-blue effect order-card" style="color:black; height:135px;">
              <div class="card-block">
                <h4 class="m-b-20">Total Districts</h4>
                <h1 class="text-right" style="font-size:50px;"><i class='bx bxs-city f-left my-3'
                    style="font-size:40px;"></i><span>
                    <?php echo "<b>" . sprintf('%02u', $tot1) . "</b>"; ?>

                  </span></h1>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="card bg-c-green effect order-card" style="color:black; height:135px;">
              <div class="card-block">
                <h4 class="m-b-20">Inactive PC</h4>
                <h1 class="text-right" style="font-size:50px;"><i class='bx bx-desktop f-left my-3'
                    style="font-size:40px;"></i><span>
                    <!-- <?php if (status($row['pc_sr']) == 'Active') {
                                            echo '<small class="badge badge-success">Active</small>';
                                        } else {
                                            echo '<small class="badge badge-danger">Inactive</small>';
                                        } ?> -->
                  </span></h1>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="card bg-c-yellow effect order-card" style="color:black; height:135px;">
              <div class="card-block">
                <h4 class="m-b-20">Total PC</h4>
                <h1 class="text-right" style="font-size:50px;"><i class='bx bxs-devices f-left my-3'
                    style="font-size:40px;"></i><span>
                    <?php echo "<b>" . sprintf('%02u', $tot11) . "</b>"; ?>
                  </span></h1>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div> -->
        </div>
        <div class="row">

          <!-- Chart 1 -->
          <section class="col-lg-6 ">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card shadow" style="min-height: 500px;">
              <div class="card-header" style="border:0px;">

                <h3 class="card-title"><i class='bx bxs-bar-chart-alt-2 mx-1 '
                    style=" font-size:25px;"></i>Active/Inactive Status</h3>

              </div>
              <div class="card-body">
                <div id="chartA" style="min-height: 100%; height: 350px; max-height: 500px; max-width: 100%;"></div>
              </div>

            </div>
            
          </section>
          <!-- Chart 2 -->
          <section class="col-lg-6 ">
            <!-- Custom tabs (Charts with tabs)-->





            <div class="container-fluid" style="height='450px';">


              <?php include 'map.php'; ?>

            </div>

          </section>
          
        </div>
        <!-- /.row (main row) -->
        </div3><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <section class="content">
        <!-- Chart -->

      </section>
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
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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
  <script>
    var options = {
      series: [{
        name: 'Active',
        data: [<?php
        if ($totDist != 0) {
          while ($rowDist = $resDist->fetch_assoc()) {
            $active = 0;
            $sqlAct = "SELECT * from `asset` where `district`='".$rowDist["district"]."';";
            $resultAct = mysqli_query($conn,$sqlAct);
            $totAct= mysqli_num_rows($resultAct);
            if ($totAct) {
              while ($rowAct = $resultAct->fetch_assoc()) {
                if ($rowAct['Status'] == 'Active') {
                  # code...
                  $active++;
                }
              }
              echo $active,",";
            }
          }
        }

        ?>],


      }, {
        name: 'Inactive',
        data: [<?php
        if ($totIN != 0) {
          while ($rowIN = $resIN->fetch_assoc()) {
            $inactive = 0;
            $sqlINA = "SELECT * from `asset` where `district`='".$rowIN["district"]."';";
            $resultINA = mysqli_query($conn,$sqlINA);
            $totINA= mysqli_num_rows($resultINA);
            if ($totINA) {
              while ($rowINA = $resultINA->fetch_assoc()) {
                if ($rowINA['Status'] == '') {
                  # code...
                  $inactive++;
                }
              }
              echo $inactive,",";
            }
          }
        }

        ?>]
      }],
      chart: {
        type: 'bar',
        height: 500,
        stacked: true,
        stackType: '100'
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: 10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: [<?php if ($totDistt != 0) {
          while ($rowDistt = $resDistt->fetch_assoc()) {
            echo "'" . $rowDistt['district'] . "',";
          }
        }
        ?>
        ],
      },
      fill: {
        colors: ['#5ba7ff', '#49ddc0', '#9C27B0']
      },
      legend: {
        position: 'right',
        offsetX: 0,
        offsetY: 50
      },
    };

    var chart = new ApexCharts(document.querySelector("#chartA"), options);
    chart.render();


  </script>





</body>

</html>