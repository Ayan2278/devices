

<?php
session_start();

if (!isset($_SESSION['ict'])) {
    header("Location: login.php"); // replace with the URL of your dashboard page
    exit;
}


include 'apis/dbcred.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize Variables 
// $count = 1;
// // Query To fetch Schools Related Data From the Database
// $query = mysqli_query($conn, "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP'");
// $data = array();
// while ($asset = mysqli_fetch_array($query)) {
//     // Prepare data to be added to the array
//     $data[] = array(
//         "Sr" => $count,
//         "dise_code" => $asset['dise_code'],
//         "school_name" => $asset['school_name'],
//         "lab" => $asset['lab'],
//         "pc" => $asset['pc'],
//         "serial_number" => $asset['serial_number'],
//         "TFT" => $asset['TFT'],
//         "WEBCAM" => $asset['WEBCAM'],
//         "HEADPHONE" => $asset['HEADPHONE'],
//         "SWITCH" => $asset['SWITCH'],

//     );
//     $count++; // Increment count
// }

// echo json_encode($data);


// $stmt = $conn->prepare("SELECT district FROM `schools` GROUP BY district");
// $stmt->execute();
// $result = $stmt->get_result();

// $all_districts = array();

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         array_push($all_districts, $row['district']);
//     }
// }

// if (isset($_POST["district"]) && $_POST["district"] != "") {
//     $stmt = $conn->prepare("SELECT block FROM `schools` WHERE district=? GROUP BY block");
//     $stmt->bind_param('s', $_POST["district"]);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $all_blocks = array();

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             array_push($all_blocks, $row['block']);
//         }
//     }
// }

// if (isset($_POST["block"]) && $_POST["block"] != "") {
//     $stmt = $conn->prepare("SELECT village FROM `schools` WHERE block=? GROUP BY village");
//     $stmt->bind_param('s', $_POST["block"]);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $all_villages = array();

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             array_push($all_villages, $row['village']);
//         }
//     }
// }

// if (isset($_POST["village"]) && $_POST["village"] != "") {
//     $stmt = $conn->prepare("SELECT dise_code, school_name FROM `schools` WHERE village=? GROUP BY school_name");
//     $stmt->bind_param('s', $_POST["village"]);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $all_schools = array();

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             array_push($all_schools, $row['dise_code'] . ' ' . $row['school_name']);
//         }
//     }
// }

// if (isset($_POST['generate'])) {
//     if (isset($_POST['school']) && $_POST['school'] != "Please Select" && $_POST['school'] != "") {
//         $sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP' AND d.dise_code=?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('s', explode(" ", $_POST["school"])[0]);
//     } else if (isset($_POST['village']) && $_POST['village'] != "Please Select" && $_POST['village'] != "") {
//         $sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP' AND s.village='" . $_POST["village"] . "'";
//         $stmt = $conn->prepare($sql);
//     } else if (isset($_POST['block']) && $_POST['block'] != "Please Select" && $_POST['block'] != "") {
//         $sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP' AND s.block='" . $_POST["block"] . "'";
//         $stmt = $conn->prepare($sql);
//     } else if (isset($_POST['district']) && $_POST['district'] != "Please Select" && $_POST['district'] != "") {
//         $sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP' AND s.district='" . $_POST["district"] . "'";
//         $stmt = $conn->prepare($sql);
//     } else {
//         $sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP'";
//         $stmt = $conn->prepare($sql);
//     }

//     echo explode(" ", $_POST["school"])[0];
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $assetListt = array();
//     $count = 1;
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {

//             $sql1 = "SELECT serial_number, type FROM devices WHERE relatedPC = '" . $row['serial_number'] . "'";
//             $stmt1 = $conn->prepare($sql1);
//             $stmt1->execute();
//             $result1 = $stmt1->get_result();

//             if ($result1->num_rows > 0) {
//                 while ($row1 = $result1->fetch_assoc()) {
//                     $row[$row1['type']] = $row1['serial_number'];
//                 }
//             }

//             // array_push($assetList, $row);
//             foreach ($assetList as $asset) {
//                 $assetListt[] = array(
//                     "Sr" => $count,
//                     "dise_code" => $asset['dise_code'],
//                     "school_name" => $asset['school_name'],
//                     "lab" => $asset['lab'],
//                     "pc" => $asset['pc'],
//                     "serial_number" => $asset['serial_number'],
//                     "TFT" => $asset['TFT'],
//                     "WEBCAM" => $asset['WEBCAM'],
//                     "HEADPHONE" => $asset['HEADPHONE'],
//                     "SWITCH" => $asset['SWITCH'],

//                 );
//                 $count++; // Increment count
//                             }

//         }
//     }
// } else {
$sql = "SELECT d.*, s.school_name FROM devices d INNER JOIN schools s ON d.dise_code = s.dise_code WHERE d.type='DESKTOP'";
$stmt = $conn->prepare($sql);
$dist;
$stmt->execute();
$result = $stmt->get_result();

$assetList = array();
$count = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        while($count!=50){
            $sql1 = "SELECT serial_number, type FROM devices WHERE relatedPC = '" . $row['serial_number'] . "'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        $sql2 = "SELECT distinct `district`,`block`,`village` FROM ict75k_dtd.schools WHERE `dise_code`=". $row['dise_code'] .";";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc();
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $row[$row1['type']] = $row1['serial_number'];
            }
        }
        $assetList[] = array(
            "Sr" => $count,
            "dise_code" => $row['dise_code'],
            "school_name" => $row['school_name'],
            "lab" => $row['lab'],
            "pc" => $row['pc'],
            "serial_number" => $row['serial_number'],
            "TFT" => $row['TFT'],
            "WEBCAM" => $row['WEBCAM'],
            "HEADPHONE" => $row['HEADPHONE'],
            "SWITCH" => $row['SWITCH'],
            "district" => $row2['district'],
            "block" => $row2['block'],
            "village" => $row2['village'],
        );
        $count++;
        }
        // array_push($assetList, $row);
    }
}

$qyD = mysqli_query($conn, "SELECT DISTINCT district FROM schools");
$dataD = array();
while ($row = mysqli_fetch_array($qyD)) {
    $dataD[] = array(
        "district" => $row['district'],
    );
}



$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Asset</title>
    <link rel="icon" type="image/png" href="./cvrlogo.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700&display=swap" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons 
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />-->
    <!-- Tempusdominus Bootstrap 4 
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />-->
    <!-- iCheck 
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />-->
    <!-- JQVMap 
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />-->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars 
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />-->
    <!-- Daterange picker 
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />-->
    <!-- summernote 
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />-->
    <!-- Apex chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <!-- =============== Form ============ -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        .card-body {
            padding: 0.6rem;
        }

        .card-header {
            padding: 0.5rem 1rem;
        }

        .content-header {
            padding: 6px 0.5rem;
        }

        .main-footer {
            padding: 0.5rem 1rem;
        }

        .navbar {
            padding: 2px 2px !important;
        }

        table,
        td,
        th {
            font-size: 13.9px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 200;
            font-size: 14px;
        }

        /*scrollbar*/
        .scrollbar {
            height: 300px;
            overflow-y: auto;
        }

        /* Set the width and color of the scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
            background-color: #ADB5BD;
            border-radius: 5px;
        }

        /* Add the thumb (the part you drag) */
        ::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background: linear-gradient(to bottom, #B8B8B8 0%, #8F8F8F 100%);
        }

        /* Change the color of the thumb on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #8F8F8F 0%, #B8B8B8 100%);
        }

        /* Add the track (the empty space around the thumb) */
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

        /* .hidden{
       display: none; 
      } */
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
                top: 0;
            }
        }

        .table td,
        .table th {
            padding: 0.3rem;
            vertical-align: center;
            border-top: 1px solid #dee2e6;
        }
    </style>
    <!-- AngularJS Script File  -->
    <script src="Angular/angular.min.js"></script>
    <!-- AngularJS Function  -->
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope) {
            $scope.users = <?php echo json_encode($assetList); ?>;
            $scope.districts = <?php echo json_encode($dataD); ?>;
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed" ng-app="myApp" ng-controller="customersCtrl">
    <div class="wrapper">
        <!-- Preloader 
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./cienciaslogo (2).png" alt="AdminLTELogo" height="100" width="100" />
        </div>-->
        <?php include './navbar.php' ?>
        <!-- ============Content Wrapper. Contains page content========= -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Assets</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6" style="padding-top: 5px;">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index">Home</a></li>
                                <!--<li class="breadcrumb-item">Activity</li>-->
                                <li class="breadcrumb-item active">Assets</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- =====Form===== -->

                    <div class="card card-default  shadow">
                        <div class="card-body">
                            <form id="myform" method="POST" action="#">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control " style="width: 100%" ng-model="astDistrict" name="astDistrict">
                                                <option value="">Please Select</option>
                                                <option ng-repeat="dist in districts" value="{{dist.district}}">
                                                    {{dist.district}}</option>
                                                <?php
                                                // foreach ($all_districts as $district) {
                                                //     echo "<option ";
                                                //     echo isset($_POST["district"]) && $_POST["district"] == $district ? "selected " : "";
                                                //     echo "value='" . $district . "'>" . $district . "</option>";
                                                // }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Block</label>
                                            <select class="form-control select2bs4" style="width: 100%" name="block"
                                                onchange="change()">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($all_blocks as $block) {
                                                    echo "<option ";
                                                    echo isset($_POST["block"]) && $_POST["block"] == $block ? "selected " : "";
                                                    echo "value='" . $block . "'>" . $block . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Village</label>
                                            <select class="form-control select2bs4" style="width: 100%" name="village"
                                                onchange="change()">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($all_villages as $village) {
                                                    echo "<option ";
                                                    echo isset($_POST["village"]) && $_POST["village"] == $village ? "selected " : "";
                                                    echo "value='" . $village . "'>" . $village . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>School Name</label>
                                            <select class="form-control select2bs4" style="width: 100%" name="school">
                                                <option value="">Please Select</option>
                                                <?php
                                                foreach ($all_schools as $school) {
                                                    echo "<option ";
                                                    echo isset($_POST["school"]) && $_POST["school"] == $school ? "selected " : "";
                                                    echo "value='" . $school . "'>" . $school . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mt-4 pt-2">
                                            <input type="submit" class="btn bg rounded-1 btn-primary btn-md w-50"
                                                name="generate" id="toggleButton" value="Search">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-olive">
                                    <!-- <div class="row"> -->
                                    <!-- <div class="col-lg-2 col-md-2 col-sm-6"> -->
                                    <h3 class="card-title pt-1"><i class="fas fa-list mr-3"></i>List Of Assets</h3>
                                    <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                                <div class="card-body shadow">
                                    <div class="table-responsive p-0 ">


                                        <table class="table table-head-fixed table-striped table-bordered text-nowrap"
                                            id="myTable" style="height: 490px">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Sr</th>
                                                    <th class="text-center">DISE Code</th>
                                                    <th class="text-center">School Name</th>
                                                    <th class="text-center">Lab</th>
                                                    <th class="text-center">Computer Number</th>
                                                    <th class="text-center">Desktop Serial</th>
                                                    <th class="text-center">TFT Serial</th>
                                                    <th class="text-center">Webcam Serial</th>
                                                    <th class="text-center">Headphone Serial</th>
                                                    <th class="text-center">Switch Serial</th>
                                                    <!-- <th class="text-center">Division</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="user in users | filter: {district : astDistrict}">
                                                    <td class="text-center">{{user.Sr}}</td>
                                                    <td class="text-center">{{user.dise_code}}</td>
                                                    <td class="text-center">{{user.school_name}}</td>
                                                    <td class="text-center">{{user.lab}}</td>
                                                    <td class="text-center">{{user.pc}}</td>
                                                    <td class="text-center">{{user.serial_number}}</td>
                                                    <td class="text-center">{{user.TFT}}</td>
                                                    <td class="text-center">{{user.WEBCAM}}</td>
                                                    <td class="text-center">{{user.HEADPHONE}}</td>
                                                    <td class="text-center">{{user.SWITCH}}</td>
                                                </tr>
                                                    <?php
                                                    // $count = 1;
                                                    // foreach ($assetList as $asset) {
                                                    //     echo '<tr>';
                                                    //     echo '<td class="text-center">' . $count . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['dise_code'] . '</td>';
                                                    //     echo '<td class="">' . $asset['school_name'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['lab'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['pc'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['serial_number'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['TFT'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['WEBCAM'] . '</td>';
                                                    //     echo '<td class="text-center">' . $asset['HEADPHONE'] . '</td>';
                                                    //     echo '<td class="text-center">';
                                                    //     echo $asset['SWITCH'] != "" ? $asset['SWITCH'] : "-";
                                                    //     echo '</td>';
                                                    //     echo '</tr>';
                                                    //     $count++;
                                                    // }
                                                    ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <!-- =====Footer===== -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023-2025
            <a href="https://cienciasvr.com/" target="_blank">Ciencias IN VR</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.0.1
        </div>
    </footer>

    <!-- Control Sidebar 
        <aside class="control-sidebar control-sidebar-dark">-->
    <!-- Control sidebar content goes here 
        </aside>-->
    <!-- /.control-sidebar -->
    </div>
    <script>
        function change() {
            document.getElementById("myform").submit();
        }
    </script>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        //  $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS 
    <script src="plugins/chart.js/Chart.min.js"></script>-->
    <!-- Sparkline 
    <script src="plugins/sparklines/sparkline.js"></script>-->
    <!-- JQVMap 
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
    <!-- jQuery Knob Chart 
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>-->
    <!-- daterangepicker 
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>-->
    <!-- Tempusdominus Bootstrap 4 
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>-->
    <!-- Summernote 
    <script src="plugins/summernote/summernote-bs4.min.js"></script>-->
    <!-- overlayScrollbars 
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes 
    <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- ======================== FORM ====================== -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "pageLength": 15,
                "lengthMenu": [15, 25, 50, 75, 100], // Optional: To include different page lengths in the dropdown
                "paging": true, // Enable pagination
                "ordering": false, // Enable sorting
                "searching": true, // Enable search box
                "info": true, // Show information
                //"scrollX": true, // Enable horizontal scrolling
                "responsive": true,
            });
        });
    </script>
    <script>
        function printTable() {
            window.print();
        }

        function exportTableToCSV(filename) {
            // Get the table data as an array
            var rows = document.querySelectorAll('table tr');
            var data = [];
            for (var i = 0; i < rows.length; i++) {
                var row = [],
                    cols = rows[i].querySelectorAll('td, th');
                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }
                data.push(row.join(','));
            }

            // Create a CSV string
            var csvString = data.join('\n');

            // Create a download link and click it to download the CSV file
            var link = document.createElement('a');
            link.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvString);
            link.download = filename;
            link.style.display = 'none';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
    <script>
        // document.getElementById('toggleButton').addEventListener('click', function() {
        // var row = document.getElementById('hiddenRow');
        // var table = document.getElementById('hiddenTable');
        // if (row.style.display === 'none') {
        //     row.style.display = 'block';
        //     table.style.display = 'block';
        // } else {
        //     row.style.display = 'none';
        //     table.style.display = 'none';
        // }
        // });
    </script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: 'Please Select'
        });
    </script>
</body>

</html>