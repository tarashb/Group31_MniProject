<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
		
	
	
		$qry="update hd_medical_view set Date='".$_POST["date"]."',Dignostic='".$_POST["dignostic"]."',Remark='".$_POST["remark"]."',Prescription='".$_POST["prescription"]."' where ID='".$_POST["id"]."'";
		//echo $qry;
		if(mysqli_query($con,$qry)){
			echo "Success";
		}
		else{
			echo "Error";
		}
	
?>