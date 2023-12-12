<?php
session_start();
include 'authentication.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Controls</title>
    <!-- Font Awesome -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
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
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
                top: -500px;
            }
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
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">

    <?php
    // Include Sidebar File
    include 'sidebar.php'
        ?>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Admin Controls</h1>
                            </div>
                            <div class="col-md-12">
                                <div class="card my-4" style="overflow:hidden; overflow-x:scroll;">

                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link " aria-current="page"
                                                    href="Controls.php">Controls</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active"  aria-current="page" href="Category.php">Category</a>
                                            </li>
                                        </ul>
                                        <table class="table table-bordered">
                                            <center>
                                                <?php
                                                echo '
                                            <thead>
                                                <tr style="text-align:center;">
                                                    
                                                    <th>Position</th>
                                                    <th>Live Status</th>
                                                    <th>Assets</th>
                                                    <th>Timing</th>
                                                    <th>Add</th>
                                                    <th>Schools</th>
                                                </tr>
                                            </thead>';

                                                include '_db_Connect.php';
                                                $count = 1;
                                                $query = "SELECT DISTINCT `roll` FROM `login`;";
                                                $result = mysqli_query($conn, $query);
                                                $total = mysqli_num_rows($result);
                                                if ($result) {
                                                    if ($total != 0) {
                                                        // Fetching All recods
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '
                                                  <form action="CatSwitch.php" method="post">
                                                            <tbody>
                                                              <tr style="text-align:center;   ">
                                                                  
                                                                  <td>' . $row['roll'] . '</td>
                                                                  <td  class="ColWidth">
                                                                  <div>                                                                  
                                                                  <button type="submit" name="LSE" value="' . $row['roll'] . '" class="btn btn-success">Enable</button>
                                                                  <button type="submit" name="LSD" value="' . $row['roll'] . '" class="btn btn-danger my-2">Disable</button>
                                                                  </div>

                                                                  </td>

                                                                  <td class="ColWidth">
                                                                    <center>
                                                                    <div>                                                                  
                                                                    <button type="submit" name="AssetE" value="' . $row['roll'] . '" class="btn btn-success">Enable</button>
                                                                  <button type="submit" name="AssetD" value="' . $row['roll'] . '" class="btn btn-danger my-2">Disable</button>
                                                                    </div>
                                                                    </center>
                                                              </td>
                                                              <td class="ColWidth">
                                                                  <center>
                                                                  <div>                                                                  
                                                                  <button type="submit" name="TimingE" value="' . $row['roll'] . '" class="btn btn-success">Enable</button>
                                                                  <button type="submit" name="TimingD" value="' . $row['roll'] . '" class="btn btn-danger my-2">Disable</button>
                                                                  </div>
                                                                  </center>
                                                            </td>
                                                            <td class="ColWidth">
                                                                  <center>
                                                                  <div>                                                                  
                                                                  <button type="submit" name="AddE" value="' . $row['roll'] . '" class="btn btn-success">Enable</button>
                                                                  <button type="submit" name="AddD" value="' . $row['roll'] . '" class="btn btn-danger my-2">Disable</button>
                                                                  </div>
                                                                  </center>
                                                            </td>
                                                            <td class="ColWidth">
                                                                    <center>
                                                                    <div>                                                                  
                                                                    <button type="submit" name="SchoolE" value="' . $row['roll'] . '" class="btn btn-success">Enable</button>
                                                                  <button type="submit" name="SchoolD" value="' . $row['roll'] . '" class="btn btn-danger my-2">Disable</button>
                                                                    </div>
                                                                  </center>
                                                            </td>
                                                          </tr>
                                                        </tbody></form>';
                                                            $count++;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </center>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->


                                </div>
                            </div>
                            <!-- /.card -->


                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->

                    <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
    </div>
    <?php
     //include footer file
    include  'footer.php';
    ?>
    <script>
        function change() {
            document.getElementById("myform").click();

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script>
        function printTable() {
            window.print();
        }
    </script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements


            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

</body>

</html>