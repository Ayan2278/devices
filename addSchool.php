<?php
// include authentication file 
session_start();
include 'authentication.php';
//include connection file
include '_db_Connect.php';
$alert = false;

//connetion
$conn = mysqli_connect("localhost", "root", "", "system");
if (isset($_POST["submit"])) {
    $school = $_POST["school_name"];
    $district = $_POST["district"];
    $block = $_POST["block"];
    $village = $_POST["village"];
    $pincode = $_POST["pincode"];

    // check connection and Die 
    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
    }
    if ($conn) {
        // Query for inserting value in database
        $query1 = "INSERT INTO `school`(`school_name`, `district`, `block`, `village`, `pincode`) VALUES ('$school','$district','$block','$village','$pincode')";
        $result = mysqli_query($conn, $query1);
    }
    if ($result) {
        $login = true;
    }
}

// display District Names in accending order
$sql = "SELECT * FROM `district` ORDER BY `district`.`name` ASC";
$result1 = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <!-- Theme style -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add School</title>
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

    .Black {
        color: black;
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

    .popup-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);

        /* display: none; */
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popupp {
        width: 400px;
        background: #fff;
        border-radius: 0.4rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .popupp img {
        width: 100px;
        margin-top: -50px;
        border-radius;
        0.4rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .popupp h2 {
        font-size: 38px;
        font-weight: 500;
        margin: 30px 0 10px;
        color: red;
    }

    .popupp button {
        width: 100%;
        margin-top: 50px;
        padding: 10px 0;
        background: #6f42c1;
        color: #fff;
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 0.4rem;
        cursor: pointer;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .close {
        visibility: hidden;
        display: none;
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
        border: 1px solid #6f42c1;
        color: #6f42c1;
    }
    </style>
</head>


<!-- Main Sidebar Container -->
<body class="hold-transition sidebar-mini layout-fixed ">
    <?php
    // include sidebar file
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
                            <h1 class="m-0 text-dark">Add School</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active"> Add School</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <?php
                // alert messages pop-up
                if (isset($result) && $result) {
                    echo '<div class="popup-container" id="popupp">
                    <div class="popupp">
                        <h2 style="color: #6f42c1;">Successfully Inserted</h2>
                        <p style="color: #6f42c1;">Your data is inserted successfully.</p>
                        <button style="background: #6f42c1;" type="button" onClick="closePopup()">Close</button>
                    </div>
                </div>';
                }
                ?>
                <center>
                    <div class="card col-lg-5 shadow">
                        <div class="card-header" style="border:0px;">
                            <h4 style="float:left; margin-top:10px;">Add School</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="device" style="float:left; margin-left:10px;">School</label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control focus" name="school_name"
                                            placeholder="Enter School name" style="height:45px;" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="device" style="float:left; margin-left:10px;">District</label>
                                    <div class="col-lg-12">
                                        <select class="form-control focus" name="district" style="height:45px;"
                                            required>
                                            <option value="" class="Black">Please Select</option>
                                            <?php
                                           // display all School-Name 
                                            if ($result1) {
                                                $total1 = mysqli_num_rows($result1);
                                                if ($total1 != 0) {
                                                    while ($row = $result1->fetch_assoc()) {

                                                        echo "<option value='" . $row['name'] . "'  class='Black'";

                                                        echo isset($_POST["district"]) && $_POST["district"] == $row['name'] ? "selected " : "";
                                                        echo ">" . $row['name'] . "</option>";
                                                    }

                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="device" style="float:left; margin-left:10px;">Block</label>

                                    <div class="col-lg-12">
                                        <input type="text" class="form-control focus" placeholder="Enter block"
                                            name="block" style="height:45px;" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="device" style="float:left; margin-left:10px;">Village</label>

                                    <div class="col-lg-12">
                                        <input type="text" class="form-control focus" placeholder="Enter Village"
                                            name="village" style="height:45px;" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="device" style="float:left; margin-left:10px;">Pincode</label>

                                    <div class="col-lg-12">
                                        <input type="text" class="form-control focus" placeholder="Enter Pincode"
                                            name="pincode" style="height:45px;" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button class="btn " type="submit" name="submit"
                                        style="background:#6f42c1;color:white; height:45px; width:98%; margin-top:30px;"
                                        onclick="clicked()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </form>
            <!-- /.content -->
            <button class="btn swalDefaultSuccess" id='alert' type="submit" name="submit"></button>
        </div>
<?php
    //include footer file
    include  'footer.php';
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
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
    function closePopup() {
        var popup = document.getElementById('popupp');
        popup.style.display = 'none';
    }
    </script>
    <!-- JQVMap -->
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
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
    <!-- Bootstrap 4 -->
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
</body>
</html>