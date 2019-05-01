<?php
session_start();
require_once "dbconfig.php";
$email = $_SESSION['email'];


$id = $_POST['id'];
echo $id;

if(!isset($_SESSION['email'])) {
    return 'alert("Kindly login to vote")';
}

try {

    $stmt = $db_con->prepare("SELECT vote FROM valvoters WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vote = $row['vote'];
        if($vote === 0) {
            $stmt = $db_con->prepare("UPDATE students SET vote = ? WHERE id = ?");
            $stmt->bindParam(1, ++$vote);
            $stmt->bindParam(2, $id);
            $result = $stmt->execute();
            if(!$result) { return  "Please try again later"; }
            else {
                $stmt = $db_con->prepare("UPDATE valvoters SET vote = ? WHERE email = ?");
                $stmt->bindParam(1, 1); 
                $stmt->bindParam(2, $email);
                $stmt->execute();
                if($stmt->execute()) {
                    echo "You successfully voted";
                }
                else {
                    echo "Not working";
                }
            }
            
        }
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}

