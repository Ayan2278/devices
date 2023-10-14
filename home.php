<?php
require 'config.php';
include '_db_Connect.php';
if (isset($_SESSION['login_id'])) {
    header('Location: setPass.php');
    exit;
}


require 'google-api\google-api\vendor\autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('954283802476-ubj0ahmfdd8khhtpsp87d4sb7p5sr2tg.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/Devices/devices/login.php');

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
        $full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
        $email = mysqli_real_escape_string($conn, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($conn, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            $_SESSION['email'] = $email;
            header('Location: setPass.php');
            exit;

        } else {

            // if user not exists we will insert the user
            $insert = mysqli_query($conn, "INSERT INTO `users`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");
            $insert2 = mysqli_query($conn, "INSERT INTO `login`(`UserName`,`profile_image`) VALUES('$email','$profile_pic')");

            if ($insert) {
                $_SESSION['login_id'] = $id;
                $_SESSION['email'] = $email;
                header('Location: setPass.php');
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
   <?php endif; ?>