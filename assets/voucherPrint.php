
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Payment Voucher Receipt</title>
        <style type="text/css">
            .p_table{
                border:1px soid #000;
            }

        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    </head>
    <body onload="printInit();">

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										
			</div>
            <!-- end row -->

            
			<!--div class="alert alert-success" role="alert">
			
					  <h3 class="alert-heading"></h3>
					  <p></a></p>
			</div-->
	
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
						<div class="card mb-3">
							
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="voucherPrint.php"  method="post" accept-charset="utf-8" novalidate="novalidate">
								

								<?php
											include("../database/db_conection.php");//make connection here
 
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM recordexpense WHERE id=$id");
									 
												while($res = mysqli_fetch_array($result))
												{
													$voucherid= $res['voucherid'];
													$createdon= $res['createdon'];
													$payee= $res['payee'];
													$payeetype= $res['payeetype'];
													$category= $res['category'];
													$description= $res['description'];
													$paymentmode= $res['paymentmode'];
												//	$paymentmethod= $res['paymentmethod'];
													$amount= $res['amount'];
													//$campaigns = $res['campaigns'];
													//$date = $res['createdon'];
													$reference = $res['reference'];		
												//	$eventtitle = $res['eventtitle'];	
													$createdby = $res['createdby'];		
													//$qty = $res['qty'];
													
												}
											}
												
											?>	
												<div class="row">
												<div class="invoice-title text-left mb-12">
													<img src="../assets/images/logo3.png">
												</div>
													<div class="col-md-12">
														<div class="invoice-title text-center mb-8">
														<h2>Jayavasavi Matriculation Hr. Sec. School</h2>
														<p>Alangayam-635701,Vaniyambadi-District
														<b> <br>Mobile:&nbsp;91- 7010439399 &nbsp;Email:&nbsp;jvms4education@gmail.com</small></b></p>
															<h3>Payment Voucher Receipt</h3>
															<!--strong>Receipt Date:</strong> <?php echo $date;?>-->
														</div>
														<hr>
												<div class="row">
															<div class="col-md-6">					
																<address>											
																<h5>Payee Details:</h5>
																	<b>Name:&nbsp;&nbsp;</b><?php echo $payee;?><br>
																	<b>Payee Type:&nbsp;&nbsp;</b><?php echo $payeetype;?><br>
																																
																</address>
															</div>
															<div class="col-md-6 float-right text-right">																
																<h5>Voucher Details</h5>
																<address>
																<b>Voucher#:</b> &nbsp;<?php echo $voucherid;?><br>
																<b>Receipt Date:</b>&nbsp;&nbsp;<?php echo $createdon;?><br>
																<b>Created By:</b>&nbsp;<?php echo $createdby;?><br><br>
																
																
																</address>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<h5>Payment Details</h5>
																<address>
																<b>Payment Mode:</b> &nbsp;&nbsp;<?php echo $paymentmode;?><br>
																
													
																<b>Reference#:</b> &nbsp;&nbsp;<?php echo $reference;?><br>


																</address>
															</div>
															</div>
															<div class="row">
													<div class="col-md-12">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h3 class="panel-title"><strong>Expense Details</strong></h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<td><strong>Expense Category</strong></td>
																				<td class="text-center"><strong>Description</strong></td>
																				<!--td class="text-center"><strong>Quantity</strong></td-->
																				<td class="text-right"><strong>Amount</strong></td>
																			</tr>
																		</thead>
												<tbody>
																			<!-- foreach ($order->lineItems as $line) or some such thing here -->
																			<tr>
																				<td><?php echo $category;?></td>
																				<td class="text-center"><?php echo $description;?></td>
																				<!--td class="text-center">1</td-->
																				<td class="text-right"><?php echo $amount;?></td>
																			</tr>
																			
																			
																			<tr>
																				<td class="no-line"></td>
																				<td class="no-line"></td>
																				<td class="no-line text-center"><small><b>&nbsp;&nbsp;&nbsp;<br><br><br></b></small></td>
																				<td class="no-line text-right"></td>
																			</tr>
																		
																			<tr>
																				<td class="no-line"></td>
																				<td class="no-line"></td>
																				<td class="no-line text-left"><small>Accountant's's Signature</small></td>
																				
																				<td class="no-line text-left"><small>Receiver's Signature</small></td>
																				<td class="text-right"></td>
																			</tr>
																			<!--tr>
																				<td>BS-1000</td>
																				<td class="text-center">$600.00</td>
																				<td class="text-center">1</td>
																				<td class="text-right">$600.00</td>
																			</tr-->

																			
																			<!--tr>
																				<td class="thick-line"></td>
																				<td class="thick-line"></td>
																				<td class="thick-line text-center"><strong>Subtotal</strong></td>
																				<td class="thick-line text-right"><?php echo $amount;?></td>
																			</tr>
																			<tr>
																				<td class="no-line"></td>
																				<td class="no-line"></td>
																				<td class="no-line text-center"><strong>Shipping</strong></td>
																				<td class="no-line text-right">$15</td>
																			</tr>
																			<!--tr>
																				<td class="no-line"></td>
																				<td class="no-line"></td>
																				<td class="no-line text-center"><strong>Total</strong></td>
																				<td class="no-line text-right"><?php echo $id;?></td>
																			</tr-->
																		</tbody>
																	</table>

																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
															

											


								    				</div>
												
													
												
								</form>
																
											
								</div>
								</div>
							
								
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	
	<script>

function printInit(){
window.print();
window.onbeforeprint = beforePrint;
window.onafterprint = afterPrint;

}

         
    var beforePrint = function () {
        // alert('start');
     };

     var afterPrint = function () {
         window.history.back();
     };
</script> 
</body>
</html>