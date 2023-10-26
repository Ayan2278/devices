<?php
session_start();
// include 'authentication.php';
include '_db_Connect.php';
$alert = false;

//create connection
$conn = mysqli_connect("localhost", "root", "", "system");
if (isset($_POST["submit"])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['Password'];
    $cpass=$_POST['cPassword'];
    $pos=$_POST['Position'];
    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
    }
    elseif($pass==$cpass){
       $qry="INSERT INTO `login`(`UserName`,`email`, `Password`, `roll`) VALUES ('$username','$email','$pass','$pos')";
       $res=mysqli_query($conn, $qry);
    //    $tot=mysqli_num_rows($res);
    }
}
$sql = "SELECT  DISTINCT `roll` FROM  `login` ORDER BY `login`.`roll` ASC";
$result1 = mysqli_query($conn, $sql);
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
</head>

<body class="hold-transition register-page">
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
                        <input type="password" class="form-control" name="cPassword" placeholder="Retype password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control " name="Position" required>
                            <option value="Please Select" class="brown">Select Position</option>
                            <?php
                                            // options for School Name
                                            if ($result1) {
                                                $total1 = mysqli_num_rows($result1);
                                                if ($total1 != 0) {
                                                    while ($row = $result1->fetch_assoc()) {

                                                        echo "<option value='" . $row['roll'] . "'  class='Black'";
                                                        echo isset($_POST["Position"]) && $_POST["Position"] == $row['roll'] ? "selected " : "";
                                                        echo ">" . $row['roll'] . "</option>";
                                                    }
                                                }
                                            }
                                            ?>

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

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>