<?php 
    session_start(); //start the session 
    require_once './includes/dbconfig.php'; // include the db connection for easy of db communication

    $session_var = $_SESSION['email']; // user email 
    $contestant_id = $_POST['id']; // constestant id
    
    // check to see if user is login then allow to vote 
    if(!$session_var){ //check if user email is set to the page
        echo "Please Signup to vote!";
        return;
    }


    $stmt = $db_con->prepare("SELECT * FROM voters WHERE email='$session_var' AND vote='0'");  
	$stmt->execute();	
    $count	= $stmt->rowCount();
    
    if($count >= 1){
        echo "User exist";  
        $stmt = $db_con->prepare("SELECT * FROM students WHERE id='$contestant_id'");  
	    $stmt->execute();	
        $count	= $stmt->rowCount();
        if($count >= 1){
            $stmt = $db_con->prepare("UPDATE students SET number_of_vote= number_of_vote + 1 WHERE id='$contestant_id'");  
            $stmt->execute();	
            if($stmt){
                $stmt = $db_con->prepare("UPDATE voters SET vote='1' WHERE email='$session_var'");  
                $stmt->execute();
                if($stmt){
                    echo "increase the vote by 1";
                }
            }
        } else {
            echo "do nothing";
        }

    } else {
        echo "User not found or already vote"; 
    }


?>