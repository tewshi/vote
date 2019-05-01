<?php
session_start();
require 'dbconfig.php';
ini_set('display_error', '1');
error_reporting(E_ALL);
// check if login take to vote
$_SESSION["email"] ? header('Location: /contestant.php') : header('Location: /login.php');



// make call to get all conntestant data

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    if (empty($email)) {
        $error = "Please your email is required";
    }

    try {

        $stmt = $db_con->prepare("SELECT email FROM valvoters WHERE email='$email'");
        $stmt->execute();
        // $result = $stmt->get_result();
        $count = $stmt->rowCount();
        if ($count === 0) {

            $stmt = $db_con->prepare("INSERT INTO  valvoters (email) VALUE('$email')");
            $result = $stmt->execute();
            if ($result) {
                // set the user to the session
                $_SESSION["email"] = $email;
                // redirect to the voting page
                header('Location: /contestant.php');
            } else {
                $error = 'Something went wrong!';
            }

        } else {
            $error = 'Email already exist!';
        }
        // print_r($stmt->fetchAll());
        // // echo $count;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

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
    <div class="card container h-100 p-0" style="width: 20rem;">
        <div class="card-header">
            Sigup
        </div>
        <form class=" p-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-danger"><?php echo $error ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="card-footer">
            <a href="/login.php">Login</a>
        </div>
    </div>
    <script src="jquery-2.1.4.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>