<?php
//  login page for dashboard 
include 'home.php';
?>
<!DOCTYPE html >
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- angularJS -->
  <script src="Angular\angular.min.js"></script>
  <script src="Angular\angular_route.min.js"></script>
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

<body class="hold-transition login-page"  ng-app>
  <?php 
  if (isset($_SESSION['Status']) && $_SESSION['Status'] == "alert" && $alert= true) {
    echo '<div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #D80032;">INVALID</h2>
            <p style="color: #D80032;">Invalid Username And Password.</p>
            <button style="background: #D80032;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
     $alert = false;
     session_destroy();
  }

  ?>
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Login</b>here</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><b>Sign in to start your session</b></p>

        <form action="loginuser.php" method="post" name="myform" novalidate>
        <span ng-show="myform.$submitted || myform.UserName.$dirty" style="color:red;">
            <span class="error" ng-show="myform.UserName.$error.required"><i class="fa fa-exclamation-circle"></i> Name Required</span><br>
            <span class="error" ng-show="myform.UserName.$error.pattern"><i class="fa fa-exclamation-circle"></i> Name cannot be a number</span>
        </span> 
          <div class="input-group mb-3">
            <input type="text" name="UserName"  ng-model="UserName" pattern="[a-zA-Z,' ']{1,}" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span> 
              </div>
             
            </div>
          </div>

          <span ng-show="myform.$submitted || myform.Password.$dirty" style="color:red;">
            <span class="error" ng-show="myform.Password.$error.required"><i class="fa fa-exclamation-circle"></i> Password Required</span>
            <!-- <span class="error" ng-show="myform.Password.$error.pattern"><i class="fa fa-exclamation-circle"></i>Password should be atleast 8 characters long and should contain one number,one character and one special character</span> -->
        </span>
          <div class="input-group mb-3">
            <input type="password" class="form-control" ng-model="Password" name="Password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="login_btn" value="login_btn" class="btn btn-block"
                style="background:#6f42c1;color:white;">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p><b>- OR -</b></p>

          <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forpass.php">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="signup.php" class="text-center">Register a new user</a>
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
    </scrip>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>