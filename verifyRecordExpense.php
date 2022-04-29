<?php
include("database/db_conection.php");//make connection here
$statusVerified ='';
if(isset($_POST['expenseEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
	
// 	$target_dir = "upload/";
//     $target_file = $target_dir . basename($_FILES["image"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//    // Check if image file is a actual image or fake image
//     $check = getimagesize($_FILES["image"]["tmp_name"]);
//     if($check !== false) {
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//             //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }

//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
	$checkStatus="SELECT status  FROM  recordexpense WHERE status='2' and id = '$expID'";
    $run_query=mysqli_query($dbcon,$checkStatus);
	if(mysqli_num_rows($run_query)>0)
    {	
		$statusVerified = "Voucher Number - '$voucherid'' is already been verififed hence you cannot verify anymore";
		
	 }
    else{	
	
    $sql = "UPDATE `recordexpense` set 	`voucherid` = '".$voucherid."',
										`updatedon` = '".$createdon."',
	                                    `payee` = '".$payee."',
										`payeetype` = '".$payeetype."',
			     						 `category` = '".$category."',
										 `reference`= '".$reference."',
										 `amount` = '".$amount."',
										 `paymentmode` = '".$paymentmode."',
										 `updatedby` = '".$updatedby."',
										 `status` = '".$status."',
										 `reference` = '".$reference."',
										 `notes` = '".$reason."'	
				         				WHERE `id` =".$expID;
										//echo  $sql;
										
// Inserting Log details into ExpenseNoteslog
	$sql1= "INSERT into expensenoteslog(`voucherid`,
										`payee`,										
										`amount`,
										`reason`,										
										`amtadjusted`,
										`updatedby`,
										`updatedon`)
								  VALUES('$voucherid',
								         '$payee',
										 '$amount',
										 '$reason',
										 '$adjust_amount',
										 '$createdby',
										 '$createdon')";		
										 
	//echo $sql1 ;
	// Updating Payemster tables Amount
	 $updateamount = "UPDATE payeemaster SET amount = amount -'".$adjust_amount."' WHERE payeeid ='$payeeid'";
		//echo $updateamount;
		$result=mysqli_query($dbcon,$updateamount);
		if (!$result)
		{
			die('Error: '. mysqli_error($dbcon));

		}
   if(mysqli_query($dbcon,$sql)&& mysqli_query($dbcon,$sql1))
	{
		$sq3="SELECT closingbalance FROM `instprofile`";
		if($resul = mysqli_query($dbcon,$sq3)){
		 $ro4   = mysqli_fetch_assoc($resul);
		 if(mysqli_num_rows($resul)>0){
		 $csbal = $ro4['closingbalance'];
		}
		}
		$closingbal = (+$csbal)-(+$amount);

		$sql3="SELECT MAX(trans_id) as id FROM `transactions` ORDER BY trans_id DESC";
		if($result4 = mysqli_query($dbcon,$sql3)){
		 $row4   = mysqli_fetch_assoc($result4);
		 if(mysqli_num_rows($result4)>0){
		   $prefix = "TRN-";
			 $maxid = intval(substr($row4['id'],4));
			$maxid+= 1;
			$tnsid = $maxid;
		 $tranid = $prefix.$maxid;
		  }
		 else{
			$prefix = "TRN-";
		  $maxid = 0;
		  $maxid+= 1;
		  $tnsid = $maxid;
		   $tranid = $prefix.$maxid;
		}
		}  
	$sql2 = "INSERT into `transactions`(id,trans_id,trans_details,trans_type,trans_amt,trans_date,total_closing_bal,trans_handler) values('$tnsid','$tranid','$description','Debit','$amount','$createdon','$closingbal','$updatedby')";
	if (mysqli_query($dbcon,$sql2)) {
	  echo 'success33';

	}else{
	  echo mysqli_error($dbcon);
	}

	$sql02 = "UPDATE `instprofile`set closingbalance = $closingbal";
	if (mysqli_query($dbcon,$sql02)) {
	  echo 'success cls bal';
	  
	}else{
	  echo mysqli_error($dbcon);
	}

		echo "<script>alert('Expense Successfully updated')</script>";
		header("location:listVouchers.php");
    } else { 
	die('Error: ' . mysqli_error($dbcon));
		exit;
	echo 'Failed to update user group';
	exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
}
}
?>
<?php include('header.php');?>
	<!-- End Sidebar -->

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Edit Expense</h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Expense</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>


			
			<div class="row">
			
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
							<p class="text-danger"><?php echo $statusVerified;?></p>
								 <h3><div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-inr bigfonts" aria-hidden="true">
								 </i>Edit Expense </div></h3>
								
							
								
							</div>
								
							<div class="card-body">
								
																
									<form method="post" action="verifyRecordExpense.php"  enctype="multipart/form-data">
											<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM recordexpense  WHERE id=$id");
												while($res = mysqli_fetch_array($result))
												{
													$voucherid = $res['voucherid'];
													$createdon = $res['createdon'];
													$category= $res['category'];
													$description = $res['description'];													
													$payee = $res['payee'];													
													$paymentmode= $res['paymentmode'];
													$amount = $res['amount'];
													$reference = $res['reference'];													
													$payeeid= $res['payeeid'];
													$reference= $res['reference'];
													$payeetype= $res['payeetype'];
													$image= $res['image'];
													$status= $res['status'];
													$notes= $res['notes'];
													$updatedby = $res['createdby'];
													
													
												}
											}
											?>

<div class="form-row">
									<div class="form-group col-md-4">
									  <label></i>Voucher ID</label>
									  <input type="text" readonly class="form-control form-control-sm" name="voucherid"  value="<?php echo $voucherid;?>" />
									  </div>
									  </div>

								<div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label>Update Verification Status</label><span class="text-danger">*<span class="text-danger">
                                        <select name="status" class="form-control form-control-sm" required>
                                        <option <?php if ($status == "1" ) echo 'selected="selected"' ; ?> value="1">Created</option>
                                        <option <?php if ($status == "2" ) echo 'selected="selected"' ; ?> value="2">Verified</option>
                                        <option <?php if ($status == "3" ) echo 'selected="selected"' ; ?> value="3">Pending for Verification</option>
                                        </select>
                                     </div>
                                    </div>

									<div class="form-row">
									  <div class="form-group col-md-4">
									  <label for="inputState">Updated By</label>
									  <?php 
														//session_start();
														include("database/db_conection.php");
														$userid = $_SESSION['userid'];
														$sq = "select username from userprofile where id='$userid'";
														$result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
														//$count = mysqli_num_rows($result);
														$rs = mysqli_fetch_assoc($result);
													?>
									   <input type="text" class="form-control form-control-sm" name="updatedby" readonly class="form-control form-control-sm" value="<?php echo $rs['username']; ?>" />
									
									 </div>
									 </div>	
									 <div class="form-row">
								     <div class="modal-footer">
										<input type="hidden" name="expID" value="<?=$_GET['id']?>">
										<button type="submit" name="expenseEdit" value="expenseEdit" class="btn btn-primary">Update</button>
										<button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
									</div>
									</div>
								
									  
											<div class="form-row">
									<div class="form-group col-md-4">
									  
									  <!--input type="date" class="form-control" name="date" value="<?php echo date("d/m/Y") ?>"/-->
									  <input type="date" hidden class="form-control form-control-sm"  name="createdon" value="<?php echo $createdon;?>"/>								
									</div>
									</div>
									
								
								<div class="form-row">
									       <div class="form-group col-md-4">
                                               
                                                <select id="category" hidden onchange="onload(this)" class="form-control form-control-sm" name="category" required>
                                                 <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT accountname FROM expenseacctmaster");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $acctname_get=$row['accountname'];
                                                         if($acctname_get==$category){
                                                            echo '<option value="'.$acctname_get.'" selected>'.$acctname_get.'</option>';

                                                        }else{
                                                            echo '<option value="'.$acctname_get.'" >'.$acctname_get.'</option>';

                                                        }
													}
													?>
                                                </select>
                                            </div>
                                        </div>								  
									 
								    <div class="form-row">
									<!--div class="form-group col-md-3">
									Payee ID<label ></label><span class="text-danger">*</span>
									  
									  <input type="text" class="form-control form-control-sm" readonly name="payeeid"  value="<?php echo $payeeid;?>"/>	
									</div-->
									<div class="form-group col-md-4">
									
									  <input type="text" hidden class="form-control form-control-sm"  name="payee"  value="<?php echo $payee;?>"/>	
									</div>
									</div>
									<div class="form-group col-md-4">		
                                  
                                    <select required id="inputState" data-parsley-trigger="change"  hidden class="form-control form-control-sm"  name="payeetype" >
                                       	<option <?php if ($payeetype == "Contractor" ) echo 'selected="selected"' ; ?> value="Contractor">Contractor</option>
										<option <?php if ($payeetype == "Supplier" ) echo 'selected="selected"' ; ?> value="Supplier">Supplier</option>
										<option <?php if ($payeetype == "Employee" ) echo 'selected="selected"' ; ?> value="Employee">Employee</option>
									</select>
                                </div>

									  <div class="form-row">
									<div class="form-group col-md-4">
									
									  <input type="text" hidden class="form-control form-control-sm" name="description" value="<?php echo $description;?>"/>	
									</div>
									</div>
									
									
									
									
								<div class="form-row">
                                	<div class="form-group col-md-4">	
										<form class="form-inline">
                                        <!--abel class="sr-only" for="inlineFormInputGroupUsername2">Amount</labe-->
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <!--div class="input-group-text">₹</div-->
											</div>			
											
											 <input type="text" hidden name="amount" class="form-control" id="amount"  readonly value="<?php echo $amount;?>" data-default="<?php echo $amount;?>" />
										</div>
										</div>
										<div class="form-group col-md-4" >
														
									 <input type="number" hidden step="any" onkeypress="update_math_vals1();"   onkeyup="update_math_vals1();"   id="adjust_amount" name="adjust_amount" class="form-control" placeholder="Adjust Amount" />
									<!--span class="text-danger">you can deduct or add amount using - and + e.g -100 for deducting and for adding +not required</span></label--> 
									</div>										
								</div>

								
								 <script>
									 function update_math_vals1(){
										
										 var adj = $('#adjust_amount').val();

										 var amt = $('#amount').attr("data-default");
                                          var fin = +adj + +amt;
										 // console.log(fin,adj,amt,"test")
											$('#amount').val(fin);
								
										// $('#amount').val(fin);
										 //$('#product_price').val();										 
									 }
									</script>
								
								
								 <div class="form-row">
                                <div class="form-group col-md-8">
                                   
                                    <select id="inputState" data-parsley-trigger="change" hidden  class="form-control select2"  name="reason" >
													<option value="">-Select Reason for Adjusting Amount-</option>
														<option value="Data Entry Mistake">Data Entry Mistake</option>
														<option value="Bill Adjustment">Bill Adjustment</option>
														<option value="Others">Others</option>
													</select>	
										</select>
                                </div>
                            </div>
									<div class="form-row">
									<div class="form-group col-md-4">
									
									 <select required id="paymentmode" name="paymentmode" hidden data-parsley-trigger="change"  class="form-control form-control-sm" >	
										<option <?php if ($paymentmode == "Cash" ) echo 'selected="selected"' ; ?> value="Cash">Cash</option>
										<option <?php if ($paymentmode == "Cheque" ) echo 'selected="selected"' ; ?> value="Cheque">Cheque</option>
										<option <?php if ($paymentmode == "Bank Transfer" ) echo 'selected="selected"' ; ?> value="Bank Transfer">Bank Transfer</option>
										<option <?php if ($paymentmode == "PhonePe" ) echo 'selected="selected"' ; ?> value="PhonePe">PhonePe</option>
										<option <?php if ($paymentmode == "Gpay" ) echo 'selected="selected"' ; ?> value="Gpay">Gpay</option>
									
									</select>
									</div>
									</div>	
									<div class="form-row">
									<div class="form-group col-md-8">
									
									  <input type="text" class="form-control form-control-sm" hidden name="reference" value="<?php echo $reference;?>"/>	
									</div>
									</div>

									<div class="form-row">
                                   <div class="form-group col-md-11">
                                       
                                        <img hidden src="<?php echo $image;?>" width="350px" class="rounded float-left" alt="...">

                                        &nbsp;&nbsp;<input type="file" hidden name="image" class="form-control form-control-sm">
                                    </div>
                                </div>

																
																		
																	
									
								  <!--div class="form-row">
									<div class="form-group col-md-8">
									 <label>Notes</label></span>
									  <!--textarea cols="20" rows="2" class="form-control tip redactor" name="notes" placeholder="Max 200 Characters "><?php echo $rs['notes']; ?></textarea-->
									 <textarea rows="2" hidden class="form-control" name="note" hidden="true"><?php echo $notes;?></textarea>
									</div> 
								</div-->
									
								<!--div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                           <span class="text-danger"><i class="fa fa-paperclip bigfonts" aria-hidden="true"></span></i>&nbsp;Attach updated Receipt<span class="text-danger">(not more than 1MB)</span></div>
                                        </label> 
                                        &nbsp;&nbsp;<input type="file" name="image" class="form-control">
                                    </div>
								</div-->
								
								<!--div class="form-row">
                                   <div class="form-group col-md-8">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                              <span class="text-danger"><i class="fa fa-paperclip bigfonts" aria-hidden="true"></span></i>&nbsp;Attach updated Receipt<span class="text-danger">(not more than 1MB)</span></div>
                                        </label> 
                                        <img src="<?php echo $image;?>" width="75px" class="rounded float-left" alt="...">

                                        &nbsp;&nbsp;<input type="file" name="image" class="form-control form-control-sm">
                                    </div>
                                </div-->
								
								
										
													
								</form>
							
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	
    
	
	<?php include('footer.php'); ?>

</div>
<!-- END main -->

<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
<script>
                function onlocode(){

                    console.log(this);
                }
            </script>
<!-- END Java Script for this page -->

</body>
</html>