
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>

<body class="bg">
    <?php
            if(isset( $_SESSION['status'])){
               // echo $_SESSION['status'];
                ?>
    <div class="alert  alert-primary alert-dismissible fade show" role="alert">
        <strong></strong>
        <?php  echo $_SESSION['status']; ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
                unset($_SESSION['status']);
            }
    ?>


    <div class="home_content wrapper">

        <center>
            <div class="col-lg-3 col-11 mx-1" style="margin-top: 100px;">
                <div class="card">
                    <div class="card-header bg-primary" style=" color:white;">
                        <h4 style="float:center;">login here</h4>
                    </div>
                    <div class="card-body">
                        <form action="loginuser.php" method="POST" width="40px">
                            <div class="col-lg-12 col-12  my-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="float: left;">Username</label>
                                <input type="text" name="UserName" class="form-control shadow" id="username" required
                                    style="border:0px; background-color:#ffffff;" placeholder="Enter username">

                            </div>
                            <div class="col-lg-12 col-12  my-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="float: left;">Password</label>
                                <input type="password" name="Password" class="form-control shadow" id="username"
                                    required style="border:0px; background-color:#ffffff;" placeholder="Enter password">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-12 " style="margin-top: 40px;">
                                <button type="submit" class="btn btn-primary" name="login_btn"
                                    style="color:white;width: 100%;width: 100%;" value="submit">Login</button>

                            </div>
                        </form>
                    </div>
                </div>
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