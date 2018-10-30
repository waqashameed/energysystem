<?php
//Testing
require 'session.php';
	$id = $_GET['id'];
if ($_SESSION['isadmin']!=1) {
    if ($id != $_SESSION['analyzerid']) {
            header('Location: bill.php?id='.$_SESSION['analyzerid']);
        }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>ESMS | Bill</title>
	<link rel="stylesheet" type="text/css" href="styles.css">

  	<style>
		.vl {
		    border-left: 1px solid grey;
		    height: auto;
		}
		label{
			font-size: 14px;
		}
		input[type="date"],
		select.form-control {
		  background: transparent;
		  border: none;
		  border-left: 1px solid #000000;
		  border-bottom: 1px solid #000000;
		  border-top: 1px solid #000000;
		  border-right: 1px solid #000000;
		  -webkit-box-shadow: none;
		  box-shadow: none;
		  border-radius: 0;
		  border-radius: 25px;


		    border: 1px solid black;
		    padding: 10px; 
		    width: 280px;
		    height: 27px;
		}

		input[type="date"]:focus,
		select.form-control:focus {
		  -webkit-box-shadow: none;
		  box-shadow: none;
		  border: 1px solid blue;
		}
		#activeColumn{
			color: blue;
		}
		a:hover {
    		background-color: white;
		}
		
		.liStyle{
			
			
			font-size: 18px;
		}
		table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    text-align: center;
}
	</style>
	<!--Googleapis StyleSheet-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


	<!--Font-awesome StyleSheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body style="margin-top: 20px;" onload="window.print();">
	<div class="container" style="background-color: #d6d8db;">
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8">
				<h1 >Crest Pak Electrionics</h1>
			</div>
		</div>
		<hr  style="height: 1px; background-color: #abafaa;">
		<div class="row">
			<div class="col-md-2">
				<label>Connection Date</label>
				<h4>2018-07-29</h4>
			</div>
			<div class="col-md-2">
				<label>Bill Month</label>
				<h4>Sep 18</h4>
			</div>
			<div class="col-md-2">
				<label>Issue Date</label>
				<h4><?php echo date("d/m/Y");?></h4>
			</div>
			<div class="col-md-2">
				<label>Due Date</label>
				<h4><?php echo date('d/m/Y', strtotime("+10 days")); ?></h4>
			</div>
			<div class="col-md-2">
				<label for="txtDateFrom" class="control-label">Consumer ID</label>
				<h4>34</h4>
			</div>
		</div>
			
			
		
		<hr  style="height: 1px; background-color: #abafaa;">
		<div class="row">
			<div class="col-md-4" style="float: left;">
				<table class="table table-bordered table-striped table-hover" style="display:block;">
					<thead>
		                <tr class="table-light">
		                  <th scope="col">Month</th>
		                  <th scope="col">Units</th>
		                  <th scope="col">Bill</th>
		                  <th scope="col">Payment</th>
		                </tr>
		            </thead>
		            <tbody>
			            <tr class="table-light">
			            	<th scope="row">SEP 17</th>
					    	<td>232</td>
					    	<td>21333</td>
					    	<td>21333</td>
			            </tr>
			            
			        </tbody>
				</table>
			</div>
			<div class="col-md-1 vl">
				
			</div>
			<div class="col-md-7">
				<b style="color: blue;">Name & Address:</b><br>
				<b style="background-color: #d6d8db;">Waqas Hameed</b>
				<br>
				<b style="background-color: #d6d8db;">Address</b>
				
				<br><br>
				
				<br>
				
				<br>
				
				
			</div>
		</div>
		<hr style="height: 1px; background-color: #abafaa;">
		<div class="row">
			<div class="col-md-2">
				<label>Previous Reading</label>
				<h4>2018</h4>
			</div>
			<div class="col-md-2">
				<label>Present Reading</label>
				<h4>2019</h4>
			</div>
			<div class="col-md-2">
				<label>Units</label>
				<h4>1</h4>
			</div>
			
		</div>
		<hr style="height: 1px; background-color: #abafaa;">
		<br>
		<div class="row">
			<div class="col-md-2">
				<table>
					<thead>
						<tr class="table-light">
				                  <th scope="col"><u>Charges</u></th>
				                  
				        </tr>
					</thead>
					<tbody>
					            <tr class="table-light">
					            	<th scope="row">Units Consumed:&nbsp;</th>
							    	<td>232</td>
							    	
					            </tr>
					            <tr class="table-light">
					            	<th scope="row">Cost of Electricity:&nbsp;</th>
							    	<td>232</td>
							    	
					            </tr>
					            <tr class="table-light">
					            	<th scope="row">Total:&nbsp;</th>
							    	<td>232</td>
							    	
					            </tr>
					            
					        </tbody>
				</table>
			</div>
			<div class="col-md-1 vl">
				
			
			</div>
			<div class="col-md-7">
				<b style="color: blue;">Payable within Due Date:&nbsp;</b>
				<b style="background-color: #d6d8db;">232</b>
				<br>
				<b style="color: blue;">Payable within Due Date:&nbsp;</b>
				<b style="background-color: #d6d8db;">252</b>
				
				<br><br>
				
				<br>
				
				<br>
				
				
			</div>
		</div>
		<hr style="height: 1px; background-color: #abafaa;">
		<br>
		<p>---------------------------------------------<sub>OFFICE COPY</sub>-----------------------------------------------------------CUT HERE ----------------------------------------------------------------------</p>
		<br>
		<h4 style="text-align: center;"><b>Crest Pak Electronics</b></h4>
		<br>
		<table style="width: 100%;">
			<thead>
				<tr>
					<td>
						Bill Month
					</td>
					<td>
						Due Date
					</td>
					<td>
						Refrence Number
					</td>
					<td>
						<b>
							Payable Within due date
						</b>
					</td>
					<td>
						232 (Amount Payable with due date)
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Sep 18
					</td>
					<td>
						15 OCT 18
					</td>
					<td>
						213213131
					</td>
					<td>
						<b>
							Payable after due date
						</b>
					</td>
					<td>
						252 (Amount Payable after due date)
					</td>
				</tr>
			</tbody>
		</table>

			
							
		</div>
	</div>
	<script language="VBScript">
		// THIS VB SCRIP REMOVES THE PRINT DIALOG BOX AND PRINTS TO YOUR DEFAULT PRINTER
		Sub window_onload()
		On Error Resume Next
		Set WB = nothing
		On Error Goto 0
		End Sub

		Sub Print()
		OLECMDID_PRINT = 6
		OLECMDEXECOPT_DONTPROMPTUSER = 2
		OLECMDEXECOPT_PROMPTUSER = 1


		On Error Resume Next

		If DA Then
		call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)

		Else
		call WB.IOleCommandTarget.Exec(OLECMDID_PRINT ,OLECMDEXECOPT_DONTPROMPTUSER,"","","")

		End If

		If Err.Number <> 0 Then
		If DA Then 
		Alert("Nothing Printed :" & err.number & " : " & err.description)
		Else
		HandleError()
		End if
		End If
		On Error Goto 0
		End Sub

		If DA Then
		wbvers="8856F961-340A-11D0-A96B-00C04FD705A2"
		Else
		wbvers="EAB22AC3-30C1-11CF-A7EB-0000C05BAE0B"
		End If

		document.write "<object ID=""WB"" WIDTH=0 HEIGHT=0 CLASSID=""CLSID:"
		document.write wbvers & """> </object>"
</script>
</body>
</html>