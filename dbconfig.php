<?php


	$db_host = "localhost";
	$db_name = "voter";
	$db_user = "root";
	$db_pass = "root";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8mb4", $db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


?>