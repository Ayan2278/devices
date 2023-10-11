<?php

include "_db_Connect.php";
// session_start();
if (isset($_SESSION['login_id']) && $_SESSION['login_id'] != '') {
  $id = $_SESSION['login_id'];
  // echo $id;
}
$url_parts = explode("/", $_SERVER['REQUEST_URI']);
$current_url = end($url_parts);



// if(isset($_SESSION['auth'])){

// $EMP_NAME=$_POST['UserName'];



//  $_SESSION['UserName']=$EMP_NAME;
//  $query="SELECT * FROM `Login` WHERE `UserName` = '$EMP_NAME'";
//  echo $query;
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
  </ul>


  <!-- Right navbar links -->


</nav>
<aside class="main-sidebar sidebar-light-purple elevation-4">
  <script src="https://kit.fontawesome.com/1c4021e600.js" crossorigin="anonymous"></script>
  <!-- Brand Logo -->
  <div class="info">
  <?php

if (!isset($_SESSION['login_id'])) {
  if (isset($_SESSION['auth'])) {
    $_SESSION['auth_user'] = ['UserName'];
  } else {
    echo "Not logged in dashboard ";
  }

  $EMP_NAME = $_SESSION['UserName'];
  $queryy = "SELECT * FROM `Login` WHERE `UserName`='$EMP_NAME'";
  // echo $queryy;
  $resultt = mysqli_query($conn, $queryy);
  // // }
  $row = $resultt->fetch_assoc();
  $una = $row['UserName'];
  echo '
  <div class="d-flex" style="text-align:center; justify-content:center;">
  <i class="bx bxs-user-circle mx-1 my-2" style="font-size:35px;"></i>
  <h4 class="mx-1 my-3">'. $una .'</h4>
  </div>
    <form action="logout.php" method="POST">


      <button type="submit" name="logout_btn" style="margin-left:195px;margin-top:7px;color:black;" class="btn ">
        <i class="fa-solid fa-right-from-bracket" style="font-size:25px;color:black;"></i></button>
    </form>

  </div>

  <center><img src="Ciencias logo.png" style="width:80px;" alt="Logo" class="  my-4" style="opacity: .8"></center>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview ">
          <a href="index.php" class="nav-link'; 
          $EMP_NAME = $_SESSION['UserName'];
          if ($current_url == 'index.php') {
            echo ' active style="background-color:#0471a4"';
          } echo'">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>';
        


          // for Live status page showing
          if ($row['live_status'] == "true") {
            echo '
          <li class="nav-item has-treeview">
            <a href="live_status.php" class="nav-link';
            if ($current_url == 'live_status.php') {
              echo ' active ';
            }
            echo '">
              <i class="nav-icon fas fa-toggle-on"></i>
              <p>
                Live Status
  
              </p>
            </a>
  
          </li>
          ';
          }


          // for Asset page showing
          if ($row['asset'] == "true") {
            echo '
          <li class="nav-item has-treeview">
          <a href="assets.php" class="nav-link';
            if ($current_url == "assets.php") {
              echo " active ";
            }
            echo '">
            <i class="nav-icon fas fa-cubes"></i>
              <p>
                Assets
                
                </p>
            </a>
            
            </li>';
          }

          // for Timings page showing
          if ($row['timming'] == "true") {
            echo '
          <li class="nav-item has-treeview">
            <a href="device.php" class="nav-link';
            if ($current_url == 'device.php' || $current_url == 'application.php' || $current_url == 'applogin.php' || $current_url == 'forgetP.php') {
              echo ' active ';
            }
            echo '">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Timings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item ">
                <a href="device.php" class="nav-link">
                  <i class="nav-icon  fa-circle';
            if ($current_url == 'device.php') {
              echo ' fas text-purple';
            } else {
              echo " far";
            }
            echo '"></i>
                  <p class="';
            if ($current_url == 'device.php') {
              echo ' text-purple';
            }
            echo '">Device timing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="applogin.php" class="nav-link">
                  <i class="nav-icon far fa-circle';
            if ($current_url == 'applogin.php' || $current_url == 'forgetP.php') {
              echo ' fas text-purple';
            } else {
              echo " far";
            }
            echo '"></i>
                  <p class="';
            if ($current_url == 'applogin.php' || $current_url == 'forgetP.php') {
              echo ' text-purple';
            }
            echo '">Application timing</p>
                </a>
              </li>
              
            </ul>
          </li>';
          }

          // for Add page showing
        
          if ($row['add'] == "true") {
            echo '
              <li class="nav-item ">
            <a href="addAssets.php" class="nav-link';
            if ($current_url == 'addAssets.php' || $current_url == 'addSchool.php' || $current_url == 'adduser.php') {
              echo ' active ';
            }
            echo '">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add
  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addSchool.php" class="nav-link">
                  <i class="nav-icon far fa-circle';
            if ($current_url == "addSchool.php") {
              echo " fas text-purple";
            } else {
              echo " far";
            }
            echo '"></i>
                  <p class="';
            if ($current_url == "addSchool.php") {
              echo " text-purple";
            }
            echo '">Add School</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="addAssets.php" class="nav-link">
                  <i class="nav-icon far fa-circle';
            if ($current_url == "addAssets.php") {
              echo " fas text-purple";
            } else {
              echo " far";
            }
            echo '"></i>
                  <p class="';
            if ($current_url == "addAssets.php") {
              echo " text-purple";
            }
            echo '">Add Assets</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="adduser.php" class="nav-link">
                  <i class="nav-icon far fa-circle';
            if ($current_url == "adduser.php") {
              echo " fas text-purple";
            } else {
              echo " far";
            }
            echo '"></i>
                  <p class="';
            if ($current_url == "adduser.php") {
              echo " text-purple";
            }
            echo '">Add User</p>
                </a>
              </li>
            </ul>
          </li>
              ';
          }


          //for school page
          if ($row['school'] == "true") {
            echo '
          <li class="nav-item has-treeview">
            <a href="school.php" class="nav-link';
            if ($current_url == 'school.php') {
              echo ' active ';
            }
            echo '">
              <i class=" nav-icon fas fa-calendar-alt"></i>
              <p>
                Schools
              </p>
            </a>
  
          </li>';
          }

          //for controls page
          if ($row['UserName'] == "Nilesh") {
            echo '
          <li class="nav-item has-treeview">
            <a href="Controls.php" class="nav-link';
            if ($current_url == 'Controls.php') {
              echo ' active ';
            }
            echo '">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Controls
            </p>
          </a>
          
        </li>';
          }
        }

        ?>
      </ul>



    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- jQuery -->