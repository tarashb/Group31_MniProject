<?php
session_start();	
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	//$id=$_POST["ID"];
	$qry="Select * from hd_medical_view where User_ID='".$_SESSION["hduid"]."' ";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>SR.NO</th><th>Date</th><th>User ID</th><th>Dignostic</th><th>Remark</th><th>Prescription</th><th>Edit</th><th>Delete</th><th>Enter Test Values</th></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		
		$email="Select * from hd_patient_details where ID='".$_SESSION["hduid"]."'";
		//echo $email;
		$remail=mysqli_query($con,$email);
		$rowemail=mysqli_fetch_array($remail);
		
		$table.="<tr>";
		$table.="<td>".$i."</td>"; 
		$table.="<td id='Date".$row["ID"]."'>".$row["Date"]."</td>";
		$table.="<td id='User_ID".$rowemail["ID"]."'>".$rowemail["Name"]."</td>";
		$table.="<td id='Dignostic".$row["ID"]."'>".$row["Dignostic"]."</td>";
		$table.="<td id='Remark".$row["ID"]."'>".$row["Remark"]."</td>";
		$table.="<td id='Prescription".$row["ID"]."'>".$row["Prescription"]."</td>";
		$table.="<td><a href='javascript:void(0)' onclick='editRecord(".$row["ID"].")'>Edit</a></td>";
		$table.="<td><a href='javascript:void(0)' onclick='deleteRecord(".$row["ID"].")'>Delete</a></td>";
		$table.="<td><a href='pgFinalOutout.php?caseid=".$row["ID"]."' target='_self'>Enter Test Values</a></td>";
		
		$i++;
		$table.="</tr>";
	}
	$table.="</tbody>";
	echo $table;
?>