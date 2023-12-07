<?php
session_start();
include("_db_Connect.php");
$alert = false;
if (isset($_POST["submit"])) {
    $us = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $query = "SELECT * FROM `login` WHERE `UserName`='$us'";
    $result = mysqli_query($conn, $query);
    $total = mysqli_num_rows($result);

    if ($total != 0 && $pass == $cpass) {
        $query = "UPDATE `login` SET `Password`='$pass' WHERE  `UserName` ='$us'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $alert = true;
        }
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
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
    <!-- angulur-min-JS  -->
    <script src="Angular\angular.min.js"></script>

    <style>
        .focus:focus {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }

        .Black {
            color: black;
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
</head>


<body class="hold-transition login-page" ng-app>
    <?php
    if ($alert && isset($_POST["submit"])) {
        echo '<div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #6f42c1;">Successfully Recover</h2>
            <p style="color: #6f42c1;">Your Password is Updated successfully.</p>
            <button style="background: #6f42c1;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
    }
    elseif (isset($_POST["submit"])) {
        echo '<div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #D80032;">INVALID</h2>
            <p style="color: #D80032;">Your Data in Invalid . Check Your Username And Password Again .</p>
            <button style="background: #D80032;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
    
    $alert = false;
     session_destroy();
    }

    ?>
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Recover</b>Password</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><b>You are only one step a way from your new password, recover your password
                        now.
                    </b></p>

                <form action="#" method="post" name="myform" novalidate>
                    <span ng-show="myform.$submitted || myform.username.$dirty" style="color:red;">
                        <span class="error" ng-show="myform.username.$error.required"><i class="fa fa-exclamation-circle"></i> Name Reqiured</span><br>
                        <span class="error" ng-show="myform.username.$error.pattern"><i class="fa fa-exclamation-circle"></i> Name cannot be a number</span>
                </span>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" pattern="[a-zA-z,' ']{1,}" placeholder="Username" ng-model="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span ng-show="myform.$submitted || myform.password.$dirty" style="color:red;">
                        <span class="error" ng-show="myform.password.$error.required"><i class="fa fa-exclamation-circle"></i> password must be reqiured</span>
                    </span>
                    <div class="input-group mb-3">
                        <input type="password" name="password" ng-model="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span ng-show="myform.$submitted || myform.cpassword.$dirty" style="color:red;">
                        <span class="error" ng-show="password != cpassword"><i class="fa fa-exclamation-circle"></i> password doesn't match</span>
                        <span class="error" ng-show="myform.cpassword.$error.required"><i class="fa fa-exclamation-circle"></i> password must be reqiured</span>
                    </span>
                    <div class="input-group mb-3">
                        <input type="password" name="cpassword" ng-model="cpassword" class="form-control" placeholder="Confirm Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" style="background:#6f42c1;color:white; "
                                class="btn btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="login.php">Login again?</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <script>
        function closePopup() {
            var popup = document.getElementById('popupp');
            popup.style.display = 'none';
        }
    </script>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>