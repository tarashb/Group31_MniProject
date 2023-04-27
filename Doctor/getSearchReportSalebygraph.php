<?php 
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
			
	 $age = $_POST["age"];
	 $gender = $_POST["gender"];
	 $lowbp = $_POST["lowbp"];
	 $highbp = $_POST["highbp"];
	 $totalchol = $_POST["totalchol"];
	 $ldl = $_POST["ldl"];
	 $hdl = $_POST["hdl"];
	 $triglycerides = $_POST["triglycerides"];
	 $nonhdlc = $_POST["nonhdlc"];
	 $tgtohdl = $_POST["tgtohdl"];
	
	$lowbpnew = 0;
	$highbpnew = 0;
	$totalcholnew = 0;
	$ldlcholnew = 0;
	$hdlcholnew = 0;
	$triglynew = 0;
	$nonhdlcnew = 0;
	$tgtohdlnew = 0;
	$count = 0;
	$totalval = 0;
	$totalper = 0;
	$totalagemin = 0;
	$totalagemax = 0;
	$gendercount = 0;
	
	$lowbpnewpoint = 0;
	$highbpnewpoint = 0;
	$totalcholnewpoint = 0;
	$ldlcholnewpoint = 0;
	$hdlcholnewpoint = 0;
	$triglynewpoint = 0;
	$nonhdlcnewpoint = 0;
	$tgtohdlnewpoint = 0;
	
	$lowbpnewrangemin = 0;
	$highbpnewrangemin = 0;
	$totalcholnewrangemin = 0;
	$ldlcholnewrangemin = 0;
	$hdlcholnewrangemin = 0;
	$triglynewrangemin = 0;
	$nonhdlcnewrangemin = 0;
	$tgtohdlnewrangemin = 0;
	
	$lowbpnewrangemax = 0;
	$highbpnewrangemax = 0;
	$totalcholnewrangemax = 0;
	$ldlcholnewrangemax = 0;
	$hdlcholnewrangemax = 0;
	$triglynewrangemax = 0;
	$nonhdlcnewrangemax = 0;
	$tgtohdlnewrangemax = 0;
	
	 if(($age > 11)&&($age < 20)){
		$totalagemin = 11;
		$totalagemax = 20;
	}
	else if(($age > 21)&&($age < 30)){
		$totalagemin = 21;
		$totalagemax = 30;
	}
	else if(($age > 31)&&($age < 40)){
		$totalagemin = 31;
		$totalagemax = 40;
	}
	else if(($age > 41)&&($age < 50)){
		$totalagemin = 41;
		$totalagemax = 50;
	}
	else if(($age > 51)&&($age < 60)){
		$totalagemin = 51;
		$totalagemax = 60;
	}
	else if(($age > 61)&&($age < 70)){
		$totalagemin = 61;
		$totalagemax = 70;
	}
	else if(($age > 71)&&($age < 80)){
		$totalagemin = 71;
		$totalagemax = 80;
	}
	else if(($age > 81)&&($age < 90)){
		$totalagemin = 81;
		$totalagemax = 90;
	}
	else if(($age > 91)&&($age < 100)){
		$totalagemin = 91;
		$totalagemax = 100;
	}
	
	if($gender == "Male"){
		$gendercount=0;
	}else{
		$gendercount=1;
	}
	
	 $number="Select * from hd_algo where gender='".$gendercount."' and age BETWEEN '".$totalagemin."' AND '".$totalagemax."';";
	$rnumber=mysqli_query($con,$number);
	while($rownumber=mysqli_fetch_array($rnumber)){
		
		$lowbpnew=$lowbpnew+$rownumber["lowbp"];
		$highbpnew=$highbpnew+$rownumber["highbp"];
		$totalcholnew=$totalcholnew+$rownumber["totalchol"];
		$ldlcholnew=$ldlcholnew+$rownumber["ldlchol"];
		$hdlcholnew=$hdlcholnew+$rownumber["hdlchol"];
		$triglynew=$triglynew+$rownumber["trigly"];
		$nonhdlcnew=$nonhdlcnew+$rownumber["nonhdlc"];
		$tgtohdlnew=$tgtohdlnew+$rownumber["tgtohdl"];
		$count = $count+1;
	}
	//Average start
	  $lowbpnew = $lowbpnew/$count;
	  $highbpnew = $highbpnew/$count;
	  $totalcholnew = $totalcholnew/$count;
	  $ldlcholnew = $ldlcholnew/$count;
	  $hdlcholnew = $hdlcholnew/$count;
	  $triglynew = $triglynew/$count;
	  $nonhdlcnew = $nonhdlcnew/$count;
	  $tgtohdlnew = $tgtohdlnew/$count;
	 //Average end
	 //Range start
	 $lowbpnewrangemin = $lowbpnew-5;
	 $lowbpnewrangemax = $lowbpnew+5;
	 $highbpnewrangemin = $highbpnew-5;
	 $highbpnewrangemax = $highbpnew+5;
	 $totalcholnewrangemin = $totalcholnew-5;
	 $totalcholnewrangemax = $totalcholnew+5;
	 $ldlcholnewrangemin = $ldlcholnew-5;
	 $ldlcholnewrangemax = $ldlcholnew+5;
	 $hdlcholnewrangemin = $hdlcholnew-5;
	 $hdlcholnewrangemax = $hdlcholnew+5;
	 $triglynewrangemin = $triglynew-5;
	 $triglynewrangemax = $triglynew+5;
	 $nonhdlcnewrangemin = $nonhdlcnew-5;
	 $nonhdlcnewrangemax = $nonhdlcnew+5;
	 $tgtohdlnewrangemin = $tgtohdlnew-5;
	 $tgtohdlnewrangemax = $tgtohdlnew+5;
	  //Range end
	 if(($lowbp > $lowbpnewrangemin)&&($lowbp < $lowbpnewrangemax)){
		$lowbpnewpoint=1;
	 }else if($lowbp>=$lowbpnewrangemax){
		 $lowbpnewpoint=2;
	 }else{
		 $lowbpnewpoint=0;
	 }
	
	 if(($highbp > $highbpnewrangemin)&&($highbp < $highbpnewrangemax)){
		$highbpnewpoint=1;
	 }else if($highbp>=$highbpnewrangemax){
		 $highbpnewpoint=2;
	 }else{
		 $highbpnewpoint=0;
	 }
		
	if(($totalchol > $totalcholnewrangemin)&&($totalchol < $totalcholnewrangemax)){
		$totalcholnewpoint=1;
	 }else if($totalchol>=$totalcholnewrangemax){
		 $totalcholnewpoint=2;
	 }else{
		 $totalcholnewpoint=0;
	 }

	if(($ldl > $ldlcholnewrangemin)&&($ldl < $ldlcholnewrangemax)){
		$ldlcholnewpoint=1;
	 }else if($ldl>=$ldlcholnewrangemax){
		 $ldlcholnewpoint=2;
	 }else{
		 $ldlcholnewpoint=0;
	 }
	 
	 if(($hdl > $hdlcholnewrangemin)&&($hdl < $hdlcholnewrangemax)){
		$hdlcholnewpoint=1;
	 }else if($hdl>=$hdlcholnewrangemax){
		 $hdlcholnewpoint=2;
	 }else{
		 $hdlcholnewpoint=0;
	 }
	 
	 if(($triglycerides > $triglynewrangemin)&&($triglycerides < $triglynewrangemax)){
		$triglynewpoint=1;
	 }else if($triglycerides>=$triglynewrangemax){
		 $triglynewpoint=2;
	 }else{
		 $triglynewpoint=0;
	 }
	 
	 if(($nonhdlc > $nonhdlcnewrangemin)&&($nonhdlc < $nonhdlcnewrangemax)){
		$nonhdlcnewpoint=1;
	 }else if($nonhdlc>=$nonhdlcnewrangemax){
		 $nonhdlcnewpoint=2;
	 }else{
		 $nonhdlcnewpoint=0;
	 }
	 
	 if(($tgtohdl > $tgtohdlnewrangemin)&&($tgtohdl < $tgtohdlnewrangemax)){
		$tgtohdlnewpoint=1;
	 }else if($tgtohdl>=$tgtohdlnewrangemax){
		 $tgtohdlnewpoint=2;
	 }else{
		 $tgtohdlnewpoint=0;
	 }
	  $totalval = $lowbpnewpoint+$highbpnewpoint+$totalcholnewpoint+$ldlcholnewpoint+$hdlcholnewpoint+$triglynewpoint+$nonhdlcnewpoint+$tgtohdlnewpoint;
	 
	  $totalper = ($totalval/16)*100;
		$response=array();
		$name="sid";
		$name1="Total Cholesterol";
		$name2="LDL Cholesterol";
		$name3="HDL Cholesterol";
		$name4="Triglycerides";
		$name5="Non-HDL-C";
		$name6="TG to HDL ration";
		
		$Quantity=12;
		$Cost_Price=1323;
		$Total=123;	
		array_push($response,array('y'=>'Low BP','a'=>$lowbpnew,'b'=>$lowbp));
		array_push($response,array('y'=>'High BP','a'=>$highbpnew,'b'=>$highbp));
		array_push($response,array('y'=>$name1,'a'=>$totalcholnew,'b'=>$totalchol));
		array_push($response,array('y'=>$name2,'a'=>$ldlcholnew,'b'=>$ldl));
		array_push($response,array('y'=>$name3,'a'=>$hdlcholnew,'b'=>$hdl));
		array_push($response,array('y'=>$name4,'a'=>$triglynew,'b'=>$triglycerides));
		array_push($response,array('y'=>$name5,'a'=>$nonhdlcnew,'b'=>$nonhdlc));
		array_push($response,array('y'=>$name6,'a'=>$tgtohdlnew,'b'=>$tgtohdl));
		echo json_encode($response);
	
	
	
	

?>