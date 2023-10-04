<?php
require 'config.php';

if (isset($_SESSION['login_id'])) {
    header('Location: index.php');
    exit;
}

require 'google-api\google-api\vendor\autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('402201038344-l08vsoiqjnuoje4amh2ppbrkkjgb6slc.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/Devices/devices/index.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($conn, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            header('Location: home.php');
            exit;

        } else {

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");

            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: home.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }

        }

    } else {
        header('Location: login.php');
        exit;
    }

else:
    // Google Login Url = $client->createAuthUrl(); 
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

                <form action="loginuser.php" method="POST" width="40px">
                    <div class="card col-lg-3 shadow my-5">
                        <div class="card-header" style="border:0px;">
                            <h4 style="float:left; margin-top:10px;">Login Here</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row">


                                <div class="form-group col-lg-12">
                                    <label for="device" style="float:left; margin-left:10px;">Username</label>

                                    <div class="col-lg-12">
                                        <input type="text" class="form-control focus" name="username"
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
                                <div class="form-group col-lg-12">
                                    <div class="_container btn">

                                        <a type="button" class="login-with-google-btn"
                                            href="<?php echo $client->createAuthUrl(); ?>">
                                            Sign in with Google
                                        </a>

                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <button class="btn " type="submit" name="login_btn"
                                        style="background:#6f42c1;color:white; height:45px; width:98%; margin-top:30px;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
<?php endif; ?>