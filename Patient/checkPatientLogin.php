<?php 
	session_start();
	include "db_connect.php";
	$db=new DB_connect();
	$con=$db->connect();
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$qry="select count(*) as Cnt from hd_patient_details where Email='".$username."' and Password='".$password."' ";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	if($row["Cnt"]==1){
			
			$qry1="select count(*) as Cnt from hd_patient_details where Email='".$username."' and Password='".$password."' and Status='On' ";
			//echo $qry1;
			$run1=mysqli_query($con,$qry1);
			$row1=mysqli_fetch_array($run1);
			
			if($row1["Cnt"]==1){
				$_SESSION["hdusername"]=$username;
				echo "Success";
			}
			else{
				echo "Off";
			}
			
		}
	else{
		echo "Error";
	}
	
	
?>