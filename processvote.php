<?php
    session_start(); //start the session
    require_once 'dbconfig.php'; // include the db connection for easy of db communication

    $contestant_id = $_POST['id']; // constestant id
    
    // check to see if user is login then allow to vote
    if (!isset($_SESSION['email'])) { //check if user email is set to the page
        http_response_code(401);
        echo json_encode(["message" => "Please Signup or login to vote!"]);
        exit();
    }

    $session_var = $_SESSION['email']; // user email


    $stmt = $db_con->prepare("SELECT * FROM valvoters WHERE email='$session_var' LIMIT 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    
    if ($count == 1) {
        if ($row["vote"] == 0) {
            $stmt = $db_con->prepare("SELECT * FROM students WHERE id='$contestant_id' LIMIT 1");
            $stmt->execute();
            $studentCount	= $stmt->rowCount();
            if ($studentCount == 1) {
                $stmt = $db_con->prepare("UPDATE students SET vote = vote + 1 WHERE id='$contestant_id'");
                $stmt->execute();
                if ($stmt) {
                    $stmt = $db_con->prepare("UPDATE valvoters SET vote = 1 WHERE email='$session_var'");
                    $stmt->execute();
                    if ($stmt) {
                        $stmt = $db_con->prepare("SELECT * FROM students WHERE id='$contestant_id' LIMIT 1");
                        $stmt->execute();
                        $student = $stmt->fetch(PDO::FETCH_ASSOC);
                        http_response_code(200);
                        echo json_encode(["message" => "You have voted successfully for $student[name]!", "votes" => $student['vote']]);
                        exit();
                    } else {
                        http_response_code(500);
                        echo json_encode(["message" => "An unexpected error occurred!"]);
                        exit();
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "An error occurred while voting!"]);
                    exit();
                }
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Student not found!"]);
                exit();
            }
        } else {
            http_response_code(409);
            echo json_encode(["message" => "You have already voted!"]);
            exit();
        }
    } else {
        http_response_code(404);
        echo json_encode(["message" => "User not found!"]);
        exit();
    }
