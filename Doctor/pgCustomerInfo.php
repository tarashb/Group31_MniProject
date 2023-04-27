<?php
	session_start();
	if(!isset($_SESSION["hdusername"])){
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heart Disease Detection System</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <h2>Patient Info</h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">

			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Name</label>
					<input type="text" class="form-control" placeholder="Name" id="txtName" required data-validation-required-message="Please enter your name."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email ID" id="txtEmail" required data-validation-required-message="Please enter your email address.">
					<p class="help-block text-danger"></p>
				  </div>
			</div>
			
            <div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Mobile Number</label>
					<input type="tel" class="form-control" placeholder="Mobile Number" id="txtMobile" required data-validation-required-message="Please enter your mobile number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Address</label>
					<textarea rows="3" class="form-control" placeholder="Address" id="txtAddress" required data-validation-required-message="Please enter a message."></textarea>
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			
			<label>Gender</label>
			<input type="radio" name="Gender" id="male" value="Male">Male &nbsp;&nbsp;
			<input type="radio" name="Gender" id="female" value="Female">Female<br>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Date Of Birth</label>
					<input type="date" class="form-control" placeholder="Date Of Birth" id="txtDOB" required data-validation-required-message="Please enter your phone number.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>
          <br>
			<div class="control-group">
			  <div class="form-group floating-label-form-group controls">
				<label>Aadhar Card</label>
				<input type="tel" class="form-control" placeholder="Aadhar Card" id="txtAadharCard" required data-validation-required-message="Please enter your adhar card number.">			
				<p class="help-block text-danger"></p>
				 </div>
            </div>
			<br>
			<label>Status</label>	
			<select id="selStatus">
				<option value="On">On</option>
				<option value="Off">Off</option>
			</select>
				  <br>
				  <input type="tel" class="form-control" id="pTxt" hidden>
			<!--<p id="pTxt" class="txt"></p>-->
	<p id="counted"></p>
			</div>
				  
				  
			</div><br>
			
			<input type="hidden" id="hdnID">
			
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="saveCustomerInfo();" style="background-color: #0085a1;;">Save</button></center>
            </div>
			
			<table id="tableData" border="1" width="100%">
			</table>
			
          <!-- Pager -->
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

<script>
$(document).ready(function(){
	showData();
});

 
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
	function saveCustomerInfo(){
	var Gender=$('input[name=Gender]:checked').val();
	if($("#txtName").val()==""){
		alert("Enter Name");
		$("#txtName").focus();
	}
	else if($("#txtEmail").val()==""){
		alert("Enter Email ID");
		$(txtEmail).focus();
	}
	else if($("#txtMobile").val()==""){
		alert("Enter Mobile Number");
		$("#txtMobile").focus();
	}
	else if($("#txtAddress").val()==""){
		alert("Enter Address");
		$(txtAddress).focus();
	}
	else if($('input[name=Gender]:checked').length <= 0){
		alert("Select Gender");
	}
	else if($("#txtDOB").val()==""){
		alert("Enter DOB");
		$("#txtDOB").focus();
	}
	else if($("#txtAadharCard").val()==""){
		alert("Enter Aadhar Card Number");
		$("#txtAadharCard").focus();
	}
	else{ 
	
	//console.log("val");
		if($("#btnSubmit").html()=="Save"){
		
			if(flag==0){
				//name:$("#txtName").val()
				//key :value
				//$_POST["name"];
				$.ajax({
				type:"POST",
				url:"saveCustomerDetails.php",
				data:{name:$("#txtName").val(),email:$("#txtEmail").val(),mobile:$("#txtMobile").val(),address:$("#txtAddress").val(),gender:Gender,dob:$("#txtDOB").val(),aadharcard:$("#txtAadharCard").val(),status:$("#selStatus").val()},
				success:function(response){
					},
					complete:function(response){
						var resp=response.responseText;
						if($.trim(resp)=="Success"){
							alert("Details Saved Successfully");
							$("#txtName").val("");
							$("#txtAddress").val("");
							$("#txtMobile").val("");
							$("#txtEmail").val("");
							$("#txtDOB").val("");
							$("#txtAadharCard").val("");
							$('input[name=Gender]:checked').prop('checked', false);
							//$('input[name=Gender]:checked').val("");
							window.location.reload();
							showData();
							
						}
						else if($.trim(response)=="Exist"){
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
							
						}
					}
				});			
			}

		}
		else{
			$.ajax({
				type:"POST",
				url:"editCustomerDetails.php",
				data:{id:$("#hdnID").val(),name:$("#txtName").val(),email:$("#txtEmail").val(),mobile:$("#txtMobile").val(),address:$("#txtAddress").val(),gender:Gender,dob:$("#txtDOB").val(),aadharcard:$("#txtAadharCard").val(),status:$("#selStatus").val()},
				success:function(response){
					console.log(response);
					var resp=response;
					console.log(resp);
					if($.trim(resp)=="Success"){
						alert("Details Updated Successfully");
						$("#txtName").val("");
						$("#txtAddress").val("");
						$("#txtMobile").val("");
						$("#txtEmail").val("");
						$("#txtDOB").val("");
						$("#txtAadharCard").val("");
						$('input[name=Gender]:checked').prop('checked', false);
						//$('input[name=Gender]:checked').val("");
						$("#btnSubmit").html("Save");
						showData();
						 flag = 0;
					}
					else if($.trim(resp)=="email"){
						alert("Email ID is already exist");
						$("#txtEmail").focus();
					}
					else if($.trim(resp)=="number"){
						alert("Mobile Number is already exist");
						$("#txtEmail").focus();
					}
					else{
					//window.location.reload();
						alert("Details Not Update");
						$("#txtName").val("");
						$("#txtAddress").val("");
						$("#txtMobile").val("");
						$("#txtEmail").val("");
						$("#txtDOB").val("");
						$("#txtAadharCard").val("");
						//$('input[name=Gender]:checked').val("");
						$('input[name=Gender]:checked').prop('checked', false);
						$("#btnSubmit").html("Save");
						flag = 0;
					}
				}
			});
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