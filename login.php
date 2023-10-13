<?php

include 'home.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
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
        .focus:focus {
            border: 1px solid #6f42c1;
            color: #6f42c1;
        }

        .Black {
            color: black;
        }
    </style>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7ff;
            padding: 10px;
            margin: 0;
        }

        ._container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            border: 1px solid #cccccc;
            border-radius: 2px;
        }

        ._container.btn {
            text-align: center;
        }

        .heading {
            text-align: center;
            color: #4d4d4d;
            text-transform: uppercase;
        }

        .login-with-google-btn {
            transition: background-color 0.3s, box-shadow 0.3s;
            padding: 12px 16px 12px 42px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
            background-color: #4a4a4a;
            background-repeat: no-repeat;
            background-position: 12px 11px;
            text-decoration: none;
        }

        .login-with-google-btn:hover {
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
        }

        .login-with-google-btn:active {
            background-color: #000000;
        }

        .login-with-google-btn:focus {
            outline: none;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25), 0 0 0 3px #c8dafc;
        }

        .login-with-google-btn:disabled {
            filter: grayscale(100%);
            background-color: #ebebeb;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);
            cursor: not-allowed;
        }
    </style>
</head>

<body class="bg">
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
                <!-- <form action="signup.php" method="POST"> -->
                    <center>
                <div class="card-header " style="border:0px;">
                    <!-- </form> -->
                    <h4 style="margin-top:10px; float:left;">Login Here</h4>
                    
                    <a href="signup.php">
                        <button type="submit" name="" value="submit" class="btn "style="margin-top:8px; margin-left:250px; background:#6f42c1; color:white; float:right;">Sign-Up</button>
                    </a>
                </div>
                </center>

                <div class="card-body ">
                    <form action="loginuser.php" method="POST" width="40px">

                    <div class="row">


                        <div class="form-group col-lg-12">
                            <label for="device" style="float:left; margin-left:10px;">Username</label>

                            <div class="col-lg-12">
                                <input type="text" class="form-control focus" name="UserName"
                                    placeholder="Enter Username" style="height:45px;" required>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="device" style="float:left; margin-left:10px;">Password</label>

                            <div class="col-lg-12">
                                <input type="password" class="form-control focus" name="Password"
                                    placeholder="Enter Password" style="height:45px;" required>
                            </div>
                        </div>
                        <!-- <div class="_container btn"> -->


                        <!-- </div> -->

                        <div class="form-group col-lg-12">
                            <button class="btn " type="submit" name="login_btn" value="login_btn"
                                style="background:#6f42c1;color:white; height:45px; width:98%; margin-top:30px;">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
                <a type="button" class="login-with-google-btn col-lg-11 mx-3" style="margin-bottom:25px;"
                    href="<?php echo $client->createAuthUrl(); ?>">
                    Sign in with Google
                </a>
            </div>
        </center>
    </div>
    </div>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let dark = document.querySelector("#Dark");
        let bodi = document.querySelector(".bg");
        let offc = document.querySelector(".ab");
        let widthh = window.innerWidth;


        btn.onclick = function () {
            // sidebar.classList.toggle("active");
            offc.classList.add("offcanvas");
            offc.classList.add("offcanvas-start");
        }
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>