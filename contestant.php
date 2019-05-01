<?php
session_start();
ini_set('display_error', '1');
error_reporting(E_ALL);
require_once 'dbconfig.php';

$email = $_SESSION['email'];

$email = $_SESSION['email'];
try {

    $stmt = $db_con->prepare("SELECT * FROM students");
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
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
    <?php require_once 'nav.php';?>
    <div class="mt-5">
        <h1></h1>
    </div>
    <div class="row p-md-4 ml-3">
    <?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="card m-md-2 mt-4" style="width: 18rem;">';
    echo "<img class=\"card-img-top\" src=\"$row[image_url]\" alt=\"Card image cap\" style=\"height: 14rem;\">";
    echo '<div class="card-body">';
    echo "<h5 class=\"card-title\">$row[name]</h5>";
    echo '<p class="card-text"> </p>';
    echo "<form method='POST' action='votes.php'>
        <input type='text' value='$row[id]' name='id' style='display:none'>
        <input class='btn btn-primary' id='voteNow' type='submit' value='vote'/>
    </form>";
    echo "<span class=\"btn btn-default\">$row[vote]</span>";
    echo ' </div>';
    echo ' </div>';
}
?>
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