<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['cusTypeEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
	
    $updateLeaveType= "UPDATE `leavetypes` SET `leavetype` = '".$leavetype."',`description` = '".$description."'
										WHERE `id` =".$cusTypeID;
	echo $updateLeaveType;
    if(mysqli_query($dbcon,$updateLeaveType))
    {
		echo "<script>alert('Leave Type Successfully updated')</script>";
     header("location:listLeaveType.php");
    } else { echo 'Failed to update user group';
	exit; //echo "<script>alert('User creation unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Edit Leave Type</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Edit Leave Type</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<!--div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Company Registrtion Form</h4>
					  <p></a></p>
			</div-->

			
			<div class="row">

					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
							<h3> <div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i> Add Purchase Item Category 
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<form method="post" action="editLeaveType.php"  enctype="multipart/form-data">
											<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM leavetypes WHERE id=$id");
												while($res = mysqli_fetch_array($result))
												{
													$leavetype = $res['leavetype'];
													$description= $res['description'];
													
												}
											}
											?>
									
									<div class="form-row">
									<div class="form-group col-md-10">
									  <label >Leave Type</label>
									  <input type="text" class="form-control" name="leavetype" value="<?php echo $leavetype;?>"/>
									  </div>

								
									
												<div class="form-group col-md-10">
												<textarea name="description" cols="68" rows="10" id="description">
												<?php echo $description; ?>
												</textarea>
										</div>	
									</div>
										
								    <div class="modal-footer">
										<input type="hidden" name="cusTypeID" value="<?=$_GET['id']?>">
										<button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
										<button type="submit" name="cusTypeEdit" value="userEdit" class="btn btn-primary">Update</button>
									</div>
									</div>
													
								</form>
								</div>
								</div>
								</div>
								
								
								
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	
    


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

<!-- END Java Script for this page -->
<?php include('footer.php');?>
</body>
</html>