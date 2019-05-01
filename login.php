<?php
session_start();
require 'dbconfig.php';

ini_set('display_error', '1');
error_reporting(E_ALL);
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
        if ($count === 1) { 
            // create session for the user
            $_SESSION["email"] = $email;
            header('Location: http://localhost:8888/valleevote/contestant.php');
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
    <div class="">
        <div class="card container h-100 p-0" style="width: 20rem;">
            <div class="card-header">
                Login
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
            <a href="http://localhost:8888/valleevote/register.php">Signup</a>
        </div>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
    <script src="jquery-2.1.4.min.js"></script>
    <script>
        // function to vote for a contestant

        // first check if the person is login and if he/she has vote before
        function vote(id) {
            if (!id) {
                return alert("cant find ur ID");
            }
            //check if the person is log in
            $.ajax({
                url: "processvote.php",
                method: "POST",
                data: { "id": id }
            }).done(function (resp) {
                console.log(resp);
            }).fail(function (err) {
                alert(err);
            })
        }


    </script>
</body>

</html>