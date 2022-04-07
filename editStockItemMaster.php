<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['purchaseItemMasterEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
	
	//Updating Purcahse Item Details to purchaseitemaster table
    $sql = "UPDATE `stockitemmaster` 
			SET `itemname` = '".$itemname."',
                `class` = '".$class."',
				`category` =  '".$category."',
				`description` = '".$description."',
				`vendor` = '".$vendor."',
				`status` = '".$status."',
				`price` = '".$price."',
				`uom`= '".$uom."',				
				`stockinqty`='".$stockinqty."',	
				`createdon`='".$updatedon."', 
				`handler`='".$handler."'				
			WHERE `id` =".$purchaseItmMasterID;										
										
	//echo $sql;		
	
	if($adjstockinqty !== '') {
	
	$sql1="INSERT into purchaseitemlog(`itemcode`,
										`itemname`,
										`qtyonhand`,
										`qtyadjusted`,
										`uom`,
										`adjustedon`,
										`handler`,
										`notes`)
										VALUES('$itemcode',
											   '$itemname',
											   '$stockinqty',
											   '$adjstockinqty',
											   '$uom',
											   '$updatedon',
											   '$handler',
											   '$notes')";
	
	//echo $sql1;
	}else{
		header("location:listStockItemMaster.php");
	}
	
	
    if(mysqli_query($dbcon,$sql) && (mysqli_query($dbcon,$sql1)))
    {
		mysqli_commit($dbcon);
		echo "<script>alert('Purchase Item Edit Successfully updated')</script>";
		header("location:listStockItemMaster.php");
    } else {
		die('Error: ' . mysqli_error($dbcon));
		
	    //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
if(isset($_POST['exit']))
{ 
	var_dump($_POST);
	extract($_POST);
	header("location:listStockItemMaster.php");
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
                                    <h1 class="main-title float-left">Edit Purchase Stock Item Master</h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Purchase Stock  Item Master</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>			
			<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><div class="fa-hover col-md-8 col-sm-8">
								 <i class="fa fa-tag bigfonts" aria-hidden="true"></i>&nbsp;Edit Purchase Stock Item Master </div></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
																
									<form method="post" action="editStockItemMaster.php"  enctype="multipart/form-data">
									<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT *
																				FROM stockitemmaster WHERE id = $id");
												while($res = mysqli_fetch_array($result))
												{
													
                                                    $updatedon = $res['createdon'];
                                                    $academic = $res['academic'];
                                                    $itemcode = $res['itemcode'];
													$itemname = $res['itemname'];
                                                    $class = $res['class'];
													$category = $res['category'];
                                                    $description= $res['description'];
													$vendor= $res['Vendor'];
													$status =$res['status'];
													$price =$res['price'];
													$uom 		=$res['uom'];												;
													$stockinqty 	=$res['stockinqty'];
													$handler 	=$res['handler'];
												//	$notes = $res['notes'];
																									
												}
											}
											?>
											
                                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label> Date</label>
                                        <input type="date" class="form-control form-control-sm" id="web" name="updatedon"  value="<?php echo $updatedon;?>" />
                                    </div>
                                </div>

								<div class="form-row">
									<div class="form-group col-md-6">
									  <label></i>Item Code</label>
									  <input type="text" class="form-control form-control-sm" name="itemcode" readonly value="<?php echo $itemcode;?>" />
									  </div>
									  </div>
																		  
									 <div class="form-row">
									<div class="form-group col-md-6">
									  <label></i>Item Name</label>
									  <input type="text" class="form-control form-control-sm" name="itemname" value="<?php echo $itemname;?>" />
									  </div>
									  </div>

                                      <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputState">Class<span class="text-danger">*</span></label>
                                                <select  id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class_get=$row['class'];
                                                        if($class_get==$class){
                                                            echo '<option value="'.$class_get.'" selected>'.$class_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$class_get.'" >'.$class_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                                    </div>
									  
									  <div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputState">Category</label>
											<select id="category" onchange="onvendor(this);" class="form-control form-control-sm"  required name="category" >
											<?php 
												include("database/db_conection.php");//make connection here
												$sql = mysqli_query($dbcon,"SELECT code,category FROM itemcategory
																			ORDER BY id ASC
																			");
												  while ($row = $sql->fetch_assoc()){	
													echo $code=$row['code'];
													echo $category_get=$row['category'];
													if($code==$category){
																echo '<option value="'.$code.'" selected>'.$category_get.'</option>';
															}else{
																echo '<option value="'.$code.'" >'.$category_get.'</option>';

															}
                                                    }
												?>
											</select>
										</div>
									</div>
                            
                            
									 <div class="form-row">
									<div class="form-group col-md-6">
									 <label>Description</label></span>
									  <input type="textarea" rows="2" class="form-control" name="description" value="<?php echo $description;?>" />
									  </div>
									  </div>
									  
									  <div class="form-row">
									<div class="form-group col-md-6">
									 <label for="inputState">Vendor Name</label>
                                                <select id="compcode" onchange="onvendor(this);" class="form-control form-control-sm"  name="vendor" >
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon,"SELECT vendorid,concat(title,' ',supname,blocation) as vendorname FROM vendorprofile
																			ORDER BY id ASC
																				");
                                                      while ($row = $sql->fetch_assoc()){	
                                                   // echo $vendor_get=$row['vendorname'];														
													echo $vendorid=$row['vendorid'];
													echo $vendorname=$row['vendorname'];
                                                       if($vendorid==$vendor){
																echo '<option value="'.$vendorid.'" selected>'.$vendorname.'</option>';
															}else{
																echo '<option value="'.$vendorid.'" >'.$vendorname.'</option>';

															}
                                                    }
                                                    ?>
                                                </select>
												</div>
									  </div>
								
									<div class="form-row">
									<div class="form-group col-md-6">
									 <label for="inputState">Product Status</label>
									  <select id="inputState" class="form-control form-control-sm" name="status">
										<option <?php if ($status == "Y" ) echo 'selected="selected"' ; ?> value="Y">Active</option>
										<option <?php if ($status == "N" ) echo 'selected="selected"' ; ?> value="N">Deactivate</option>
									</select>
									</div>
									  </div>
								
									
									
									<div class="form-row">
									<div class="form-group col-md-6">
									  <h5>Price Information</h5>
									  </div>
									</div>
									
									
									 
									<div class="form-row">
									<div class="form-group col-md-2">
									<i class="fa fa-rupee fonts" aria-hidden="true"></i>
									 <label>Price/Qty </label>
									<input type="number" step="any" id="price" name="price" class="form-control form-control-sm" readonly  value="<?php echo $price;?>" />
									 </div>
									 
									 <div class="form-group col-md-2">
									<i class="fa fa-rupee fonts" aria-hidden="true"></i>
									 <label>Adjust Price</label>
									<input type="number" step="any" onkeypress="update_math_vals1();"   onkeyup="update_math_vals1();" id="adjpriceperqty" name="adjpriceperqty" class="form-control form-control-sm"   />
									 </div>
									 
									 <script>
									 function update_math_vals1(){
										$('#price').val(<?php echo $price;?>);

										 var adj = $('#adjpriceperqty').val();

										 var pri = $('#price').val();
                                          var fin = +adj + +pri;
											$('#price').val(fin);
								
										 $('#final_price').val(fin);
										 //$('#product_price').val();										 
									 }
									 </script>
									 
									
									  
									  <div class="form-group col-md-2">
									            <label>UOM&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
										  data-trigger="focus" data-placement="top" title="The Item will be measured in terms of this UNIT(e.g.:Kgs,dozen,box"></i>
											<span class="text-danger"></label>
                                                <select id="uom"  required class="form-control form-control-sm" name="uom">
                                                    <option value="0" selected>Select UOM</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT code,description FROM uom_lookups ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                         $description=$row['description'];
														 $code=$row['code'];
                                                      if($code==$uom){
																echo '<option value="'.$code.'" selected>'.$description.'</option>';
															}else{
																echo '<option value="'.$code.'" >'.$description.'</option>';

															}
                                                    }
													  
													  
                                                    ?>
                                                </select>	
									</div>							
									</div>
								

														   
								
								 <div class="form-row">
									<div class="form-group col-md-6">
									  <h5>Edit Stock Information</h5>
									  </div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-3">
									 <label>Stock On Hand</label>
									 <input type="number" step="any" class="form-control form-control-sm" id="stockinqty" name="stockinqty" readonly />
									
									</div>
									
									  <div class="form-group col-md-3">									
									 <label>Adj Stock</label>
									<!--input type="text" id="adjstock" name="adjstock" class="form-control form-control-sm"   /-->
									<input type="number" step="any" onkeypress="update_math_valsAdjStock();"   onkeyup="update_math_valsAdjStock();" id="adjstockinqty" name="adjstockinqty" class="form-control form-control-sm"   />
									 </div>
									 
									 <script>
									 function update_math_valsAdjStock(){
										  $('#stockinqty').val(<?php echo $stockinqty;?>);

										 var adj = $('#adjstockinqty').val();
										// alert(adj);
										 var pri = $('#stockinqty').val();
                                          var fin = +adj + +pri;
										//  alert(pri);
								
										 $('#stockinqty').val(fin);
									 }
									 </script>
									 </div>
									 
									
									  
									
									  
									  
								
									 
									 <div class="form-row">
									  <div class="form-group col-md-6">
									  <label for="inputState">Handler</label>
									  <?php 
														//session_start();
														include("database/db_conection.php");
														$userid = $_SESSION['userid'];
														$sq = "select username from userprofile where id='$userid'";
														$result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
														//$count = mysqli_num_rows($result);
														$rs = mysqli_fetch_assoc($result);
													?>
									   <input type="text" class="form-control form-control-sm" name="handler" readonly class="form-control form-control-sm" value="<?php echo $rs['username']; ?>" required />
									
									 </div>
									 </div>
									 
									<div class="form-group col-md-6">
									  <h5>Notes Information</h5>
									  </div>
									
									
									<div class="form-row">
									<div class="form-group col-md-6">
									 <label> Add Notes</label></span>									
									 <textarea rows="2" class="form-control" id="notes" name="notes" placeholder="write updated notes here"></textarea>
																 
									</div> 
								</div>
								</div>									
									<div class="form-row">
								     <div class="modal-footer">
										<input type="hidden" name="purchaseItmMasterID" value="<?=$_GET['id']?>">
										<button type="submit" name="purchaseItemMasterEdit" value="purchaseItemMasterEdit" class="btn btn-primary">Update</button>
                                        <button type="button" name="cancel" class="btn btn-secondary" onclick="window.history.back();">Cancel
                                                        </button>
                                                                         </div>   
									</div>	
									</div>
								</form>
							
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	

<script>
	function gettaxrateEdit(){
            //var taxrate = document.getElementById('taxname').value;
            var taxmethod = document.getElementById('taxmethod').value;
            var price   = document.getElementsByName('priceperqty')[0].value;
            var taxtype = $('#taxid option:selected').attr('data-type');
            var taxrate = $('#taxid option:selected').attr('data-rate');
            var taxname = $('#taxid option:selected').attr('data-name');

           // var taxname = document.getElementById('taxname').value;

            var product_price = 0;

            //alert(taxrate+"---"+price);
            if(taxrate == "" || taxrate == null){
                taxrate = 0;
            }
            if(price == "" || price == null ){
                price = 0;
            }
            calcPrice   = (price - ( price * taxrate / 100 )).toFixed(2);
            percentagedval = (parseFloat(price)-parseFloat(calcPrice)).toFixed(2);

            if(taxmethod=='1'){
                product_price = price-percentagedval;

            }else{
                product_price = price;
                price = parseFloat(price)+parseFloat(percentagedval);
            }
            $('#taxname').val(taxname);
            $('#taxtype').val(taxtype);

            $('#disptaxrate').val(taxrate);
            $('#disptax').val(percentagedval);

            $('#final_price').val(price);
            $('#product_price').val(product_price);
	}
	$('document').ready(function(){
		$('#stockinqty').val(<?php echo $stockinqty;?>);

	});
</script>

	<!--footer class="footer">
		<span class="text-right">
		Copyright@<a target="_blank" href="#">Dhiraj Agro Products Pvt. Ltd.,</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href=""><span>e-Schoolz</span> </a>
		</span>
	</footer>

</div>
<!-- END main -->

<!--script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script-->

<!-- App js -->
<!--script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->


<!--/body>
</html-->
<?php include('footer.php');?>