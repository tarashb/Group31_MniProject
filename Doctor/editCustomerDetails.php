<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
		
		
	$number="Select count(*) as number from hd_patient_details where Mobile='".$_POST["mobile"]."' and ID!='".$_POST["id"]."'";
	$rnumber=mysqli_query($con,$number);
	$rownumber=mysqli_fetch_array($rnumber);
	
	$email="Select count(*) as email from hd_patient_details where Email='".$_POST["email"]."' and ID!='".$_POST["id"]."'";
	//echo $email;
	$remail=mysqli_query($con,$email);
	$rowemail=mysqli_fetch_array($remail);
	
	 if($rownumber["number"]>0){
		echo "number";
	}else if($rowemail["email"]>0){
		echo "email";
	}
	else{
		$qry="update hd_patient_details set Name='".$_POST["name"]."',Email='".$_POST["email"]."',Mobile='".$_POST["mobile"]."',Address='".$_POST["address"]."',Gender='".$_POST["gender"]."',DOB='".$_POST["dob"]."',AadharCard='".$_POST["aadharcard"]."',Status='".$_POST["status"]."' where ID='".$_POST["id"]."'";
		//echo $qry;
		if(mysqli_query($con,$qry)){
			echo "Success";
		}
		else{
			echo "Error";
		}
	} 
?>