<?php
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	// $fqry="select Email from hd_medical_view where ID='".$_POST["id"]."'";
	// $fresult=mysqli_query($con,$fqry);
	// $frow=mysqli_fetch_array($fresult);
	
	$qry="delete from hd_medical_view where ID='".$_POST["id"]."'";	
			if(mysqli_query($con,$qry)){
					echo "Success";
				}
				else{
					echo "Error";
				}
?>