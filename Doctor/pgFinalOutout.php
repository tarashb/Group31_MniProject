<!DOCTYPE html>
<?php
session_start();
	if(!isset($_SESSION["hdusername"])){
		header("Location:index.php");
	}
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	$number="Select * from hd_check_output where Case_ID='". $_REQUEST["caseid"]."' ";
	$rnumber=mysqli_query($con,$number);
	$rownumber=mysqli_fetch_array($rnumber);
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heart Disease Detection System</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    
    <link href="../css/clean-blog.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	  <link rel="stylesheet" href="../graph/morris.css">
		
	  <link rel="stylesheet" href="../graph/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="../graph/ionicons.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 12.5%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
}

.btn:hover {
    background-color: #ddd;
}

.btn.active {
    background-color: #666;
    color: white;
}


</style>
  </head>

  <body>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="pgAdminPanel.php">Heart Disease Detection System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="pgAdminPanel.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgCustomerInfo.php">Patient Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgChangePassword.php">Change Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgLogout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

     <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>Final Output</h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto" style=" border:2px solid black;  border-radius: 25px;"><br>

			
			<div class="control-group">
				  <div class="form-group  controls">
					<label>Age</label>
					<input type="text" class="form-control" placeholder="Age" value="<?php echo is_null($rownumber) ? "": $rownumber["Age"]; ?>" id="txtAge" required data-validation-required-message="Please enter your name."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			<div class="control-group">
				  <div class="form-group  controls">
					<label>Gender</label>
					<input type="text" class="form-control" placeholder="gender" value="<?php echo is_null($rownumber) ? "": $rownumber["Gender"]; ?>" id="txtGender" required data-validation-required-message="Please enter your name."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group  controls">
					<label>Lower Blood pressure </label>
					<input type="text" class="form-control" placeholder="Lower Blood pressure" value="<?php echo is_null($rownumber) ? "": $rownumber["LowBP"]; ?>" id="txtlowbp" required data-validation-required-message="Please enter your email address.">
					<p class="help-block text-danger"></p>
				  </div>
			</div>
			
           
			
			<div class="control-group">
				  <div class="form-group  controls">
					<label>Higher Blood pressure </label>
					<input type="tel" class="form-control" placeholder="Higher Blood pressure" value="<?php echo is_null($rownumber) ? "": $rownumber["HighBP"]; ?>" id="txthighbp" required data-validation-required-message="Please enter your mobile number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			<div class="control-group">
				  <div class="form-group  controls">
					<label>Total Cholesterol (mg/dL) </label>
					<input type="tel" class="form-control" placeholder="Total Cholesterol (mg/dL)" value="<?php echo is_null($rownumber) ? "": $rownumber["TChol"]; ?>" id="txtTotalCholesterol" required data-validation-required-message="Please enter your mobile number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			<div class="control-group">
				  <div class="form-group  controls">
					<label>LDL Cholesterol (mg/dL) </label>
					<input type="tel" class="form-control" placeholder="LDL Cholesterol (mg/dL)" value="<?php echo is_null($rownumber) ? "": $rownumber["LDLChol"]; ?>" id="txtLDLCholesterol" required data-validation-required-message="Please enter your mobile number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
          <br>
			<div class="control-group">
			  <div class="form-group  controls">
				<label>HDL Cholesterol (mg/dL) </label>
				<input type="tel" class="form-control" placeholder="HDL Cholesterol (mg/dL)" value="<?php echo is_null($rownumber) ? "": $rownumber["HDLChol"]; ?>" id="txtHDLCholesterol" required data-validation-required-message="Please enter your adhar card number.">			
				<p class="help-block text-danger"></p>
				 </div>
            </div>
			<br>
			<div class="control-group">
			  <div class="form-group  controls">
				<label>Triglycerides (mg/dL) </label>
				<input type="tel" class="form-control" placeholder="Triglycerides (mg/dL)" value="<?php echo is_null($rownumber) ? "":$rownumber["Triglycerides"]; ?>" id="txtTriglycerides" required data-validation-required-message="Please enter your adhar card number.">			
				<p class="help-block text-danger"></p>
				 </div>
            </div>
			<br>
			<div class="control-group">
			  <div class="form-group  controls">
				<label>Non-HDL-C (mg/dL) </label>
				<input type="tel" class="form-control" placeholder="Non-HDL-C (mg/dL)" value="<?php echo is_null($rownumber) ? "": $rownumber["NonHDLC"]; ?>" id="txtNonHDLC" required data-validation-required-message="Please enter your adhar card number.">			
				<p class="help-block text-danger"></p>
				 </div>
            </div>
			<br>
			<div class="control-group">
			  <div class="form-group  controls">
				<label>TG to HDL ration (mg/dL) </label>
				<input type="tel" class="form-control" placeholder="TG to HDL ration (mg/dL)" value="<?php echo is_null($rownumber) ? "": $rownumber["TGtoHDL"]; ?>" id="txtTGtoHDL" required data-validation-required-message="Please enter your adhar card number.">			
				<p class="help-block text-danger"></p>
				 </div>
            </div>
			<br>
			
			<input type="hidden" id="hdnID" value="<?php echo $_REQUEST["caseid"]; ?>">
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="saveOutPutDetails();" style="background-color: #0085a1;;">Save</button></center>
            </div><br>
		</div>
		
		
		</div>
		<div class="row" style="display:none;" id="divper">
			<div class="col-lg-3 col-md-3 mx-auto">
			</div>
			<div class="col-lg-6 col-md-6 mx-auto" style="text-align:center;">
				<label id="txtper"></label>
			</div>
			
			<div class="col-lg-3 col-md-3 mx-auto">
			</div>
		</div>
			
		
    </div>
	<div id="print" style="display:none">
		<center><span>
			<input class="btn gradient-bg" 
			type="Submit" value="Print" onclick="printDiv('printableArea')"
			style="margin-top: 60px;">
		</span></center>
	</div>
    <hr>

     <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2023</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../css/jquery/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>
	<!-- Morris.js charts -->
	<script src="../graph/raphael.min.js"></script>
	<script src="../graph/morris.min.js"></script>
	<script src="../graph/jquery.flot.js"></script>
	<script src="../graph/jquery.flot.resize.js"></script>
	<script src="../graph/jquery.flot.categories.js"></script>
<script>
$(document).ready(function(){
	
});
function graph(){
		//alert("n");
	$.ajax({
		type:"POST",
		url:"getSearchReportSalebygraph.php",
		dataType:"JSON",
		data:{caseid:$("#hdnID").val(),age:$("#txtAge").val(),gender:$("#txtGender").val(),lowbp:$("#txtlowbp").val(),highbp:$("#txthighbp").val(),totalchol:$("#txtTotalCholesterol").val(),ldl:$("#txtLDLCholesterol").val(),hdl:$("#txtHDLCholesterol").val(),triglycerides:$("#txtTriglycerides").val(),nonhdlc:$("#txtNonHDLC").val(),tgtohdl:$("#txtTGtoHDL").val()},
		success:function(response){
				//$("#print").css({'display':'block'});
				console.log(response);
				//alert(response);
				var bar = new Morris.Bar({
				  element: 'bar-chart',
				  resize: true,
				  data: response,
				  barColors: ['#454140', '#bd5734'],
				  xkey: 'y',
				  ykeys: ['a','b'],
				  labels: ['Avg','My Value'],
				  hideHover: 'auto'
				});
		}
	});	

}
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}
	
	$("#txtName").blur(function(){
	var val=$("#txtName").val();
	if(val!=""){
		if (/^[a-zA-Z ]{2,30}$/.test(val)) {

		} 
		else {
		$("#txtName").val("");
		alert("name must have alphabates");
		console.log("Wrong");
		$("#txtName").focus();

	}
}
});//name validate

// email valid
$("#txtEmail").blur(function(){ 
	var val=$("#txtEmail").val();
	if(val!=""){
		if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)) {

		} else {
			$("#txtEmail").val("");
			alert("email must be proper");
			console.log("Wrong");
			$("#txtEmail").focus();

		}
	}
});// email valid

$("#txtMobile").blur(function(){
	var val=$("#txtMobile").val();
	if(val!=""){
		if (/^\d{10}$/.test(val)) {

		} else{
			$("#txtMobile").val("");
			alert("Mobile must be ten digits");
			console.log("Wrong");
			$("#txtMobile").focus();

		}
	}
});// Mobile validate

	var flag = 0;
	//alert(flag);
	function saveOutPutDetails(){
	
	if($("#txtAge").val()==""){
		alert("Enter Age");
		$("#txtAge").focus();
	}
	else if($("#txtGender").val()==""){
		alert("Enter Gender");
		$("#txtGender").focus();
	}
	else if($("#txtlowbp").val()==""){
		alert("Enter Low BP");
		$("#txtlowbp").focus();
	}
	else if($("#txthighbp").val()==""){
		alert("Enter High BP");
		$("#txthighbp").focus();
	}
	else if($("#txtTotalCholesterol").val()==""){
		alert("Enter Total Cholesterol");
		$("#txtTotalCholesterol").focus();
	}
	else if($("#txtLDLCholesterol").val()==""){
		alert("Enter LDL Cholesterol");
		$("#txtLDLCholesterol").focus();
	}
	else if($("#txtHDLCholesterol").val()==""){
		alert("Enter HDL Cholesterol");
		$("#txtHDLCholesterol").focus();
	}
	else if($("#txtTriglycerides").val()==""){
		alert("Enter Triglycerides");
		$("#txtTriglycerides").focus();
	}
	else if($("#txtNonHDLC").val()==""){
		alert("Enter Non-HDL-C");
		$("#txtNonHDLC").focus();
	}
	else if($("#txtTGtoHDL").val()==""){
		alert("Enter TG to HDL Ration");
		$("#txtTGtoHDL").focus();
	}
	else{  
	
	//console.log("val");
		if($("#btnSubmit").html()=="Save"){
		
			if(flag==0){
	
				$.ajax({
				type:"POST",
				url:"saveOutPutDetails.php",
					data:{caseid:$("#hdnID").val(),age:$("#txtAge").val(),gender:$("#txtGender").val(),lowbp:$("#txtlowbp").val(),highbp:$("#txthighbp").val(),totalchol:$("#txtTotalCholesterol").val(),ldl:$("#txtLDLCholesterol").val(),hdl:$("#txtHDLCholesterol").val(),triglycerides:$("#txtTriglycerides").val(),nonhdlc:$("#txtNonHDLC").val(),tgtohdl:$("#txtTGtoHDL").val()},
					success:function(response){
					},
					complete:function(response){
					//console.log(response);
					var resp=response.responseText;
					console.log(resp);
					$("#divper").show();
					$("#txtper").html(resp);
					
					
					graph();
						/* if($.trim(resp)=="Success"){
							alert("Details Saved Successfully");
							$("#txtAge").val("");
							$("#txtGender").val("");
							$("#txtlowbp").val("");
							$("#txthighbp").val("");
							$("#txtTotalCholesterol").val("");
							$("#txtLDLCholesterol").val("");
							$("#txtHDLCholesterol").val("");
							$("#txtTriglycerides").val("");
							$("#txtNonHDLC").val("");
							$("#txtTGtoHDL").val("");
							
							
							//window.location.reload();
							showData();
							
						}
						else if($.trim(resp)=="Exist"){
							alert("Email ID / Mobile Number is already exist");
							$("#txtEmail").focus();
							//window.location.reload();

						}
						else{
							alert("Details Not Saved");
							window.location.reload();
							$("#txtName").val("");
							$("#txtAddress").val("");
							$("#txtMobile").val("");
							$("#txtEmail").val("");
							$("#txtDOB").val("");
							$("#txtAadharCard").val("");
							$('input[name=Gender]:checked').val("");
							
						} */
					}
				});			
			}

		}
		
	}
		
	 }
	
	// Read a page's GET URL variables and return them as an associative array.
	function getUrlVars()
	{
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}

	
	function showData(){
	var id = getUrlVars()["id"];
		$.ajax({
			type:"POST",
			url:"getCustomerDetails.php",
			data:{ID:id},
			success:function(response){
				$("#tableData").html(response);
			}
		});
	}
	
	function editRecord(id){
	flag=1;
	//alert(flag);
		$("#hdnID").val(id);
		$("#txtName").val($("#Name"+id).html());
		$("#txtMobile").val($("#Mobile"+id).html());
		$("#txtEmail").val($("#Email"+id).html());
		$("#txtAddress").val($("#Address"+id).html());
		$("input[name=Gender][value=" + $("#Gender"+id).html()+ "]").attr('checked', 'checked');
		$("#txtDOB").val($("#DOB"+id).html());
		$("#txtAadharCard").val($("#AadharCard"+id).html());
		$("#selStatus").val($("#Status"+id).html());
		$("#btnSubmit").html("Edit");
	}
	function deleteRecord(id){
		var ans= confirm("are you sure to delete file");
		if(ans==true){
		$.ajax({
			type:"POST",
			url:"deleteCustomerDetails.php",
			data:{id:id},
			success:function(response){
			if($.trim(response)=="Success"){
				alert("delete successfully");
				showData();
			}
			}
		});
	}
	}
	
</script>	
	
  </body>
</html>