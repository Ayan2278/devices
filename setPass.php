<?php
    session_start();
    
    //create connection
    include '_db_Connect.php';
    if (isset($_POST["submitt"])) {
        $passd=$_POST['Passwordd'];
        $cpassd=$_POST['cPasswordd'];
        $poss=$_POST['Positionn'];
        $full_name = $_SESSION['name'];
        // echo $email;
        if ($conn->connect_error) {
            die("Connection failed: "
                . $conn->connect_error);
        }
        elseif($passd==$cpassd){
           $qry="UPDATE `login` SET `Password` = '$passd', `roll` = '$poss' WHERE `UserName` = '$full_name'";
           $res=mysqli_query($conn, $qry);
           echo $qry;
           header('Location: login.php');
        //    $tot=mysqli_num_rows($res);
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login For Application</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>application</title>
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
        .focus:focus {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }

        .Black {
            color: black;
        }
    </style>
</head>

<body class="sidebar-mini layout-fixed">

    <?php
    if (isset($_SESSION['status'])) {
        // echo $_SESSION['status'];
        ?>
        <div class="alert  alert-primary alert-dismissible fade show" role="alert">
            <strong></strong>
            <?php echo $_SESSION['status']; ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="home_content wrapper">

        <center>
            <div class="card col-lg-3 shadow my-5">


                <div class="card-header" style="border:0px;">
                    <h4 style="float:left; margin-top:10px;">Set Password and post </h4>
                </div>
                <form action="#" method="POST" width="40px">
                    <div class="card-body ">
                        <div class="row">



                            <div class="form-group col-lg-12">
                                <label for="device" style="float:left; margin-left:10px;">Password</label>

                                <div class="col-lg-12">
                                    <input type="password" class="form-control focus" name="Passwordd"
                                        placeholder="Enter Password" style="height:45px;" required>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="device" style="float:left; margin-left:10px;">Confirm-Password</label>

                                <div class="col-lg-12">
                                    <input type="password" class="form-control focus" name="cPasswordd"
                                        placeholder="Enter Confirm-Password" style="height:45px;" required>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="device" style="float:left; margin-left:10px;">Position</label>
                                <div class="col-lg-12">
                                    <select class="form-control focus" name="Positionn" style="height:45px;" required>
                                        <option value="" class="Black">Please Select</option>
                                        <option value="CEO" class="Black">CEO</option>
                                        <option value="HOD" class="Black">HOD</option>
                                        <option value="Employee" class="Black">Employee</option>


                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-lg-12">
                                <button class="btn " type="submit" name="submitt" value="submitt"
                                    style="background:#6f42c1;color:white; height:45px; width:98%;">Sign-Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </center>

    </div>




    </div>


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

    <!-- Bootstrap 4 -->
    <!-- DataTables -->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- page script -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>