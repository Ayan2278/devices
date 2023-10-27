<?php
session_start();
// include 'authentication.php';
include '_db_Connect.php';
$alert = false;

//create connection
$conn = mysqli_connect("localhost", "root", "", "system");
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['Password'];
    $cpass = $_POST['cPassword'];
    $pos = $_POST['Position'];

    $q="SELECT * FROM `user` WHERE `UserName`='$username' ";
    $r=mysqli_query($conn, $q);
    $n=mysqli_num_rows($r);
    if($n > 0){
            $alert="Username is Already Taken";
    }
    else{
    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
    } elseif ($pass == $cpass) {
        $qry = "INSERT INTO `login`(`UserName`,`email`, `Password`, `roll`) VALUES ('$username','$email','$pass','$pos')";
        $res = mysqli_query($conn, $qry);
        //    $tot=mysqli_num_rows($res);
        if ($res) {
            $alert = true;
        }

    }
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>
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

<body class="hold-transition register-page">
    <?php
    if (isset($_POST["submit"]) && $n !=0) {
        echo '<div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #D80032;">INVALID</h2>
            <p style="color: #D80032;">Please Check Your Username. This Username Already Taken</p>
            <button style="background: #D80032;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
    }
    elseif (isset($_POST["submit"])) {
        echo '<div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #D80032;">INVALID</h2>
            <p style="color: #D80032;">Please Check Your Username And Password Again .</p>
            <button style="background: #D80032;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
    }
    elseif ($alert && $res) {
        echo '
    <div class="popup-container" id="popupp">
        <div class="popupp">
            <h2 style="color: #6f42c1;">Successfully Register</h2>
            <p style="color: #6f42c1;">Your data is Registerd successfully.
             Now You Can Login</p>
            <button style="background: #6f42c1;" type="button" onClick="closePopup()">Close</button>
        </div>
    </div>';
    
    
    $alert = false;
    session_destroy();
    }
    ?>
    <div class="register-box">

        <div class="login-logo">
            <a href=""><b>Sign-Up</b>here</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg"><b>Register a new membership</b></p>

                <form action="#" method="post">

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="cPassword" placeholder="Retype password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control " name="Position" required>
                            <option value="Please Select" class="brown">Select Position</option>
                            <option value="CEO" class="brown">CEO</option>
                            <option value="HOD" class="brown">HOD</option>
                            <option value="Employee" class="brown">Employee</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-"></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
                    <!-- /.col -->
                    <div class="col-14">
                        <button type="submit" style="background:#6f42c1;color:white; " name="submit"
                            class="btn btn-block">Register</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>


            <a href="login.php" class="text-center" style="margin-bottom:20px;">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <script>
        function closePopup() {
            var popup = document.getElementById('popupp');
            popup.style.display = 'none';

        }
    </script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>