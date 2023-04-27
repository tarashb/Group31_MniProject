<?php
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
		 //echo $_SESSION["hduid"];
			$qry="insert into hd_medical_view(User_ID,Date,Dignostic,Remark,Prescription) values('".$_SESSION["hduid"]."','".$_POST["date"]."','".$_POST["dignostic"]."','".$_POST["remark"]."','".$_POST["prescription"]."')";
			//echo $qry;
			
			if(mysqli_query($con,$qry)){
				//echo "Success";
				$id = $con->insert_id;
				$date=date("Y-m-d h:i:sa");
				$qry="insert into hd_check_output(Case_ID,Patient_ID,Date,Age,Gender,LowBP,HighBP,TChol,LDLChol,HDLChol,Triglycerides,NonHDLC,TGtoHDL) values('".$id."','".$_SESSION["hduid"]."','".$date."','0','0','0','0','0','0','0','0','0','0')";
				//echo $qry;
				
				if(mysqli_query($con,$qry)){
					echo "Success";
				}
				else{
					echo "Error";
				}
				
			}
			else{
				echo "Error";
			}
		
	
?>