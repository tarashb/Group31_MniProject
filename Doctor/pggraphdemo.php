<!DOCTYPE html>
<?php
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Intelligent Sale Recommendation</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Morris charts -->
	  <link rel="stylesheet" href="../graph/morris.css">
		<!-- Font Awesome -->
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
        <a class="navbar-brand" href="pgAdminPanel.php">Intelligent Sale Recommendation</a>
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
              <a class="nav-link" href="pgCustomerInfo.php">Customer</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="pgSupplierInfo.php">Supplier</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="pgCategoryInfo.php">Category</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="pgProductInfo.php">Product</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="pgProductSale.php">Product Sale</a>
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
    <header class="masthead"style="background-image: url('../img/ism.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>Sale</h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 mx-auto">

			<div class="control-group">
				  <div >
					<label>Start Date</label>
					<input type="date" class="form-control" placeholder="Start Date" id="txtStartDate" required data-validation-required-message="Please enter your start date."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			<div class="control-group">
				  <div >
					<label>End Date</label>
					<input type="date" class="form-control" placeholder="End Date" id="txtEndDate" required data-validation-required-message="Please enter your end date."/>
					<p class="help-block text-danger"></p>
				  </div>
            </div>
			<input type="hidden" id="hdnID">
			<div class="form-group">
              <center><input type="submit" id="btnSubmit" class="btn btn-primary" onclick="saveResultDetails();" style="background-color: #0085a1;" value="Save"></center>
            </div>
		</div>
		</div>
		<div class="row"  id="printableArea">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
						<div class="box-tools pull-right">
						</div>
					</div>
					<div class="box-body chart-responsive">
						 <div class="chart" id="bar-chart" style="height: 300px; position: relative;"></div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
				<br>
				<table id="tableData" border="1" width="100%"></table>
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
            <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../css/jquery/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="jquery.form.min.js"></script>
	
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
	graph();
});
function graph(){
		
	$.ajax({
		type:"POST",
		url:"getSearchReportSalebygraph.php",
		dataType:"JSON",
		data:{startdate:$("#txtStartDate").val(),enddate:$("#txtEndDate").val()},
		success:function(response){
				$("#print").css({'display':'block'});
				console.log(response);
				var bar = new Morris.Bar({
				  element: 'bar-chart',
				  resize: true,
				  data: response,
				  barColors: ['#454140', '#bd5734'],
				  xkey: 'y',
				  ykeys: ['a','b'],
				  labels: ['Quantity','Cost Price'],
				  hideHover: 'auto'
				});
		}
	});	

}
	
</script>	
	
  </body>
</html>