<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">

			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Dignostic</label>
					<input type="text" class="form-control" placeholder="Dignostic" id="txtDignostic" required data-validation-required-message="Please enter Dignostic."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			
			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Remark</label>
					<input type="text" class="form-control" placeholder="Remark" id="txtRemark" required data-validation-required-message="Please enter Remark">
					<p class="help-block text-danger"></p>
				  </div>
			</div>
			
			<div class="control-group">
				  <div class="form-group col-xs-12 floating-label-form-group controls">
					<label>Date Of Birth</label>
					<input type="date" class="form-control" placeholder="Date Of Birth" id="txtDOB" required data-validation-required-message="Please enter your DOB.">
					<p class="help-block text-danger"></p>
				  </div>
            </div>

			<div class="control-group">
				  <div class="form-group floating-label-form-group controls">
					<label>Prescription</label>
					<textarea rows="3" class="form-control" placeholder="Prescription" id="txtPrescription" required data-validation-required-message="Please enter Prescription."></textarea>
					<p class="help-block text-danger"></p>
				  </div>
            </div><br>
			
			<input type="hidden" id="hdnID">
			<div class="form-group">
              <center><button type="submit" id="btnSubmit" class="btn btn-primary" onclick="save();" style="background-color: #0085a1;;">Save</button></center>
            </div>





<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <table id="tableData" border="1" width="100%">
	        </table>
        </div>
    </div>
</div>


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
</body>
<script src="../css/jquery/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>


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
	
	$("#txtDignostic").blur(function(){
	var val=$("#txtDignostic").val();
	if(val!=""){
		if (/^[a-zA-Z ]{2,30}$/.test(val)) {
		} 
		else {
		$("#txtDignostic").val("");
		alert("Dignostic must have alphabates");
		console.log("Wrong");
		$("#txtDignostic").focus();

	}
}
});//Dignostic validate

$("#txtRemark").blur(function(){
	var val=$("#txtRemark").val();
	if(val!=""){
		if (/^[a-zA-Z ]{2,30}$/.test(val)) {
		} 
		else {
		$("#txtRemark").val("");
		alert("Remark must have alphabates");
		console.log("Wrong");
		$("#txtRemark").focus();

	}
}
});//Remark validate

$("#txtPrescription").blur(function(){
	var val=$("#txtPrescription").val();
	if(val!=""){
		if (/^[a-zA-Z ]{2,30}$/.test(val)) {
		} 
		else {
		$("#txtPrescription").val("");
		alert("Prescription must have alphabates");
		console.log("Wrong");
		$("#txtPrescription").focus();

	}
}
});//Prescription validate




	var flag = 0;
	//alert(flag);
	function save(){

	if($("#txtDignostic").val()==""){
		alert("Enter Dignostic");
		$("#txtDignostic").focus();
	}
	else if($("#txtDOB").val()==""){
		alert("Enter DOB");
		$("#txtDOB").focus();
	}
	else if($("#txtRemark").val()==""){
		alert("Enter Remark");
		$("#txtRemark").focus();
	}
	else if($("#txtPrescription").val()==""){
		alert("Enter Prescription");
		$(txtAddress).focus();
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
				url:"saveMedicalInfoview.php",
				data:{dignostic:$("#txtDignostic").val(),remark:$("#txtRemark").val(),prescription:$("#txtPrescription").val(),date:$("#txtDOB").val()},
				success:function(response){
					},
					complete:function(response){
						var resp=response.responseText;
						if($.trim(resp)=="Success"){
							alert("Details Saved Successfully");
							$("#txtDignostic").val("");
							$("#txtRemark").val("");
							$("#txtPrescription").val("");
							$("#txtDOB").val("");
							//$('input[name=Gender]:checked').val("");
							window.location.reload();
							showData();
							
						}
						else{
							alert("Details Not Saved");
							window.location.reload();
							$("#txtDignostic").val("");
							$("#txtRemark").val("");
							$("#txtPrescription").val("");
							$("#txtDOB").val("");
						}
					}
				});			
			}

		}
		else{
			$.ajax({
				type:"POST",
				url:"editMedicalInfoview.php",
				data:{id:$("#hdnID").val(),dignostic:$("#txtDignostic").val(),remark:$("#txtRemark").val(),prescription:$("#txtPrescription").val(),date:$("#txtDOB").val()},
				success:function(response){
					console.log(response);
					var resp=response;
					console.log(resp);
					if($.trim(resp)=="Success"){
						alert("Details Updated Successfully");
						$("#txtDignostic").val("");
							$("#txtRemark").val("");
							$("#txtPrescription").val("");
							$("#txtDOB").val("");
						//$('input[name=Gender]:checked').val("");
						$("#btnSubmit").html("Save");
						showData();
						 flag = 0;
					}
					else{
					//window.location.reload();
						alert("Details Not Update");
						$("#txtDignostic").val("");
							$("#txtRemark").val("");
							$("#txtPrescription").val("");
							$("#txtDOB").val("");
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
			url:"getMedicalInfoDetails.php",
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
		$("#txtDignostic").val($("#Dignostic"+id).html());
		$("#txtRemark").val($("#Remark"+id).html());
		$("#txtPrescription").val($("#Prescription"+id).html());
		$("#txtDOB").val($("#Date"+id).html());
		$("#btnSubmit").html("Edit");
	}
	function deleteRecord(id){
		var ans= confirm("are you sure to delete file");
		if(ans==true){
		$.ajax({
			type:"POST",
			url:"deleteMedicalInfoDetails.php",
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
</html>