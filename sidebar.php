<?php
include "_db_Connect.php";
$url_parts = explode("/", $_SERVER['REQUEST_URI']);
$current_url = end($url_parts);
?>



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
  <!-- Brand Logo -->
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
          <a href="index.php" class="nav-link <?php if ($current_url == 'index.php') {
            echo 'active style="background-color:#0471a4"';
          } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>



        <li class="nav-item has-treeview">
          <a href="device.php" class="nav-link <?php if ($current_url == 'device.php' || $current_url == 'application.php') {
            echo 'active';
          } ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Timings

            </p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="device.php" class="nav-link">
                <i class="nav-icon far fa-circle  <?php if ($current_url == 'device.php') {
                  echo ' text-purple';
                } ?>"></i>
                <p class="<?php if ($current_url == 'device.php') {
                  echo ' text-purple';
                } ?>">Device timing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="application.php" class="nav-link">
                <i class="nav-icon far fa-circle  <?php if ($current_url == 'application.php') {
                  echo ' text-purple';
                } ?>"></i>
                <p class="<?php if ($current_url == 'application.php') {
                  echo ' text-purple';
                } ?>">Application timing</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="assets.php" class="nav-link <?php if ($current_url == 'assets.php') {
            echo 'active';
          } ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Assets

            </p>
          </a>

        </li>
        <li class="nav-item has-treeview">
          <a href="school.php" class="nav-link <?php if ($current_url == 'school.php') {
            echo 'active';
          } ?>"">
                <i class=" nav-icon fas fa-calendar-alt"></i>
            <p>
              Schools

            </p>
          </a>

        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- jQuery -->