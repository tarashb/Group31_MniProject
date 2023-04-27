<?php
session_start();	
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	//$id=$_POST["ID"];
	$qry="Select * from hd_patient_details";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>SR.NO</th><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Gender</th><th>DOB</th><th>Aadhar Card</th><th>Status</th><th>Edit</th><th>Delete</th><th>Medical Info</th></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		
		$table.="<tr>";
		$table.="<td>".$i."</td>"; 
		$table.="<td id='Name".$row["ID"]."'>".$row["Name"]."</td>";
		$table.="<td id='Email".$row["ID"]."'>".$row["Email"]."</td>";
		$table.="<td id='Mobile".$row["ID"]."'>".$row["Mobile"]."</td>";
		$table.="<td id='Address".$row["ID"]."'>".$row["Address"]."</td>";
		$table.="<td id='Gender".$row["ID"]."'>".$row["Gender"]."</td>";
		$table.="<td id='DOB".$row["ID"]."'>".$row["DOB"]."</td>";
		$table.="<td id='AadharCard".$row["ID"]."'>".$row["AadharCard"]."</td>";
		$table.="<td id='Status".$row["ID"]."'>".$row["Status"]."</td>";
		$table.="<td><a href='javascript:void(0)' onclick='editRecord(".$row["ID"].")'>Edit</a></td>";
		$table.="<td><a href='javascript:void(0)' onclick='deleteRecord(".$row["ID"].")'>Delete</a></td>";
		//$table.="<td><a href='pgMedicalRecord.php?id=".$row["ID"]." &&rentpermonthamount=".$row["Rent_Per_Month"]." &&propertynumber=".$rowi["Property_Number"]." ' target='_self'>Rent Payment</a></td>";
		$table.="<td><a href='pgMedicalRecord.php?userid=".$row["ID"]."' target='_self'>Medical Info</a></td>";
		
		//$table.="<td><a href='javascript:void(0)' onclick='MedicalRecord(".$row["ID"].")'>Medical Info</a></td>";
		$i++;
		$table.="</tr>";
	}
	$table.="</tbody>";
	echo $table;
?>