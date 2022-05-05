<?php
include("database/db_conection.php");//make connection here
//$payeeid = '';
//$payee = '';
//$payeetype = '';
//$description ='';
//$amount ='';
//$mobile ='';
//$location ='';


if(isset($_POST['submit'])){	
	$createdon=$_POST['createdon'];//same
    $category=$_POST['category'];//same
	$payee=$_POST['payee'];//same
	$voucherid=$_POST['voucherid'];//same
	$paymentmode=$_POST['paymentmode'];//same
	//$notes=$_POST['notes'];//same
	//$image=$_POST['image'];//same
	$createdby = $_POST['createdby'];
	$amount = $_POST['amount'];//same
	$reference = $_POST['reference'];//same
	$payeeid = $_POST['payeeid'];
	$payeetype = $_POST['payeetype'];
	$description = $_POST['description'];//same
	//$payeename = $_POST['payeename'];//same
	//$id = $_POST['id'];
			
			
//$image = file_get_contents($image
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		//echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

} else {
	echo "File is not an image.";
	$uploadOk = 0;
}
$voucherid ='';
$prefix = "";
	//Generating VoucherIDS
	$sql="SELECT MAX(id) as latest_id FROM recordexpense ORDER BY id DESC";
	if($result = mysqli_query($dbcon,$sql)){
		$row   = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)>0){
		$maxid = $row['latest_id'];
			$maxid+=1;			
			$voucherid = $prefix.$maxid;
		}else{
		$maxid = 0;
			$maxid+=1;
			$voucherid = $prefix.$maxid;
		}
	}

	$sql="INSERT INTO recordexpense(`voucherid`, 
									`createdon`, 	
									`category`, 
									`description`,					
									`payee`, 	
									`payeetype`, 
									`amount`,	
									`reference`,
									`paymentmode`,							
									`createdby`,
									`image`)
							VALUES ('$voucherid',								
									'$createdon',
									'$category',
									'$description',
									'$payee',
									'$payeetype',
									'$amount',
									'$reference',
									'$paymentmode',								
									'$createdby',
									'$target_file')";		

		
//$sql3 = "UPDATE payeemaster set amount = amount- $amount  WHERE payeeid = $payeeid";
//echo $sql3;			
			
	
	//echo "$insert_recordexpense";
	// Inserting Log details into ExpenseNoteslog
	 $sql1= "INSERT into expensenoteslog(`voucherid`,
										`payeeid`,
										`payee`,
										`amount`,
										`reason`,
										`createdby`,
										`createdon`)
								  VALUES('$voucherid',
										  '$payeeid',
										  '$payee',
										  '$amount',
								          '$notes',
										  '$createdby',
										  '$createdon')";
										  
	//Updating paymaster table's amount 								  
	 $updateamount = "UPDATE payeemaster SET amount = amount - '".$amount."' WHERE payeeid='$payeeid'";
		//echo $updateamount;
		$result=mysqli_query($dbcon,$updateamount);
		if (!$result)
		{
			die('Error: '. mysqli_error($dbcon));

		}
       								
	if(mysqli_query($dbcon,$sql)&& mysqli_query($dbcon,$sql1))
	{
		echo "<script>alert('Expense Master creation Successful ')</script>";
		
				header("location:listVouchers.php");
    } else {
		die('Error: ' . mysqli_error($dbcon));
		exit;
		echo "<script>alert('Transport Master creation  unsuccessful ')</script>";
	}
	
}
?>

<?php include('header.php'); ?>

<!--Modal catogrey-->
<!-- Modal Academic-->
<div class="modal fade custom-modal" id="customModalAcademic" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Academic</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control select2" name="addacademic"  id="addacademic"  placeholder="Example Diesel, Advances, Food">
											</div>
										 								
											
										 
											<!--div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div-->
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitacademic" id="submitacademic" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	
<!-- Category Modal Ends -->

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
						<div class="row">
							<div class="col-xl-12">
								<div class="breadcrumb-holder">
									<h1 class="main-title float-left">Add Expenses</h1>
									<ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item">Expenses</li>
									<li class="breadcrumb-item active">Add Expenses</li>
									</ol>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<!-- end row -->

							
							
							
						<div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
								
								<div class="card mb-3">
										
									<div class="card-body">
								
										<form action="#" method="post" enctype="multipart/form-data">					
										
										<div class="row">
											<div class="form-group col-xl-7 col-md-6 col-sm-9">
												<div class="form-row">
												
													<label >Expense Date<span class="text-danger"></span></label>
													<input type="date" class="form-control form-control-sm" name="createdon"  value="<?php print(date("Y-m-d")); ?>"/>
												</div>

												<div class="form-group">	
													<label >Enter Voucher Number<span class="text-danger"></span></label>
												<input type="text" class="form-control form-control-sm" name="voucherid"  placeholder="Voucher Number[OPTIONAL]"  />
												</div>

												<div class="form-group">	
													<label >Enter Payee Name<span class="text-danger"></span></label>
												<input type="text" class="form-control form-control-sm" name="payee"  placeholder="Enter Payee Name"  />
												</div>
												

											

								<div class="form-group">		
                                    <label >Payee Type<span class="text-danger">*</span></label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="payeetype" >
                                        <option value="">-Select Payee Type</option>
                                        <option value="Contractor">Contractor</option>
                                        <option value="Supplier">Supplier</option>
										<option value="Employee">Employee</option>
										</select>
                                </div>
										
												
												<div class="form-group">
												<label for="category1">Expense Category<span class="text-danger">*</span></label>
												<select required id="category1"   class="form-control select2"  name="category" >
												<option value="">-Select Category-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT accountname FROM expenseacctmaster");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $expensename=$row['accountname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$expensename.'" >'.$expensename.'</option>';
                                                    }
                                                    ?>
                                                </select>
												<a href="#custom-modal" data-target="#customModalAcademic" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Expense Category</a><br>
											</div>
									<div class="form-group">	
												<form class="form-inline">
												<label class="sr-only" for="inlineFormInputGroupUsername2">Enter Amount</label>
													<div class="input-group mb-2 mr-sm-2">
													<div class="input-group-prepend">
													<div class="input-group-text">₹</div>
													</div>												
													<input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  />
												</div>
											</div>
									
												<div class="form-group">
												<label>Description</label>
												<input type="text" name="description" class="form-control form-control-sm " placeholder="Enter Expense Detaiails"  />
												</div>					
                            								
										
											
											 <div class="form-group">								
												<label >Payment Mode<span class="text-danger">*</span></label>
												<select required id="inputState" data-parsley-trigger="change"  class="form-control select2"  name="paymentmode" >
													<!--option value="">-Select Payment Mode-</option-->
														<option value="Cash">Cash</option>
														<option value="Cheque">Cheque</option>
														<option value="Credit Card">Credit Card</option>
														<option value="Bank Transfer">Bank Transfer</option>
														<option value="PhonePe">PhonePe</option>
														<option value="GPay">GPay</option>

												</select>
											</div>      
											
								        <div class="form-group">
												<label>Reference</label><br />
												<input type="text" name="reference" class="form-control form-control-sm " placeholder="Cheque No/Payment Transaction Ref No..">
												</div>
											
								
										<!--div class="form-group">
												<label>Notes</label><br />
												<textarea rows="2" class="form-control  form-control-sm" name="notes" placeholder="Add Expense Notes"></textarea>
										</div-->
												<!--div class="form-group">
													<label>Upload Bills </label><br />
													<input type="file" name="image" class="form-control">
												</div-->
												
												 <div class="form-group">
													<label for="inputState">Created By</label>
													<?php 
													//session_start();
													include("database/db_conection.php");
													$userid = $_SESSION['userid'];
													$sq = "select username from userprofile where id='$userid'";
													$result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
													//$count = mysqli_num_rows($result);
													$rs = mysqli_fetch_assoc($result);
													?>
													<input type="text" class="form-control form-control-sm" name="createdby" readonly class="form-control form-control-sm" value="<?php echo $rs['username']; ?>" />

												</div>
													
												<div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4 class="col-md-12 text-muted">Attach Bill</h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>
                                        <div class="fa-hover col-md-12 col-sm-12">
                                            &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload image like JPG,GIF,PNG..</div>
                                    </label> 
                                    &nbsp;&nbsp;<input type="file" name="image" class="form-control"  >
                                </div>
                            </div>
												
												<div class="form-group">
												&nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                        </button>
															<button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
                                                    </div>
												</div>
											
											<!--div class="form-group col-xl-4 col-md-4 col-sm-12 border-left">
											
                                                <label ><span class="text-danger"></label>
												<b>Payeename:</b>&nbsp; <?php echo $payee; ?>  <br><br>
												<b>Payee Type:</b>&nbsp; <?php echo $payeetype; ?>  <br><br>
												<b>Description:</b>&nbsp;<?php echo $description; ?><br><br>
												<b>Mobile:</b>&nbsp;<?php echo $mobile; ?><br><br>
												<b>Location:</b>&nbsp;<?php echo $location; ?><br><br>
												
												<b>Payable Amount:</b>&nbsp;<?php echo $amount; ?><br>
												
												
														
											        
                                            </div-->
                                        </div>
                                        
											
											
											
											
												
												
											</div>
									
											</div><!-- end row -->	
										</form>
								
									</div>	
									<!-- end card-body -->								
								
								</div>
							<!-- end card -->					

							</div>
							<!-- end col -->	
														
						</div>
						<!-- end row -->	



            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitacademic').click(function(){
		var academic = $('#addacademic').val();
	//	var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addCategoryModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  academic:academic,
				//  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#academic').append(new_option);
					 $('#customModalAcademic').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Academic,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	

</script>	
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>                                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->
    
	<?php include('footer.php'); ?>
</div>


</body>
</html>