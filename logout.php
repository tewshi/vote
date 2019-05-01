<?php
session_start();
ini_set('display_error', '1');
error_reporting(E_ALL);
$error = '';
session_destroy();
session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vallecious Natural Hair</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body style="backgorund: white; overflow:none;">

   
    <!-- nav bar  -->
    <?php require 'nav.php';?>
    <div class="mt-5">
        <h1></h1>
    </div>
    <div class="">
        <div class="card container h-100 p-0" style="width: 20rem;">
            <div class="card-header">
                Logged out
            </div>
            <div class="card-body">
                <p>Logout succes...</p>
            </div>
            <div class="card-footer">
            <a class="btn btn-primary" href="/register.php">Signup</a>
            <a class="btn btn-info" href="/login.php">Login</a>
        </div>
        </div>
    </div>
    <script src="jquery-2.1.4.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>