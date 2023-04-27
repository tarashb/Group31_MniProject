<?php
	session_start();
	//$pd=$_SESSION["userpassword"];
	//echo $pd;
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	//$_SESSION["ecasusername"]=$username;
	
	$pwd=$_REQUEST["pwd"];
	$password=$_REQUEST["oldpwd"];
	$DataBaseUserName = $_SESSION["hdusername"];
	
	$qry="Update hd_patient_details set Password='".$pwd."' where Password='".$password."' AND Email='".$DataBaseUserName."'";
	//echo $qry;
	if(mysqli_query($con,$qry)){
		session_destroy();
		echo "success";
	}
	else{
		echo "error";
	}
?>

