<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['purItmCateEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
	$List = implode(', ', $pickuppoints);	
	
    $updateCategory= "UPDATE `route` SET `routeno` = '".$routeno."',`driverName` = '".$driverName."',`mobile` = '".$mobile."',`pickuppoints` = '".$List."'
										WHERE `id` =".$itemcatID;
	//echo $updatePurItmCtgry;
    if(mysqli_query($dbcon,$updateCategory))
    {
		echo "<script>alert('User Group Successfully updated')</script>";
     header("location:listRoute.php");
    } else { echo 'Failed to update user group';
	exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
}
?>


<?php include('header.php');?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Edit Route</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Edit Route</li>
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
							<h3> <div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i> Edit Route 
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<form method="post" action="editRoute.php"  enctype="multipart/form-data">
											<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM route WHERE id=$id");
												while($res = mysqli_fetch_array($result))
												{
													$routeno = $res['routeno'];
													$driverName = $res['driverName'];
													$mobile = $res['mobile'];
													$pickuppoints = $res['pickuppoints'];
													
													// $description= $res['description'];
													
												}
											}
											?>
									
									<div class="form-row">
									<div class="form-group col-md-10">
									  <label >Route<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="routeno" value="<?php echo $routeno;?>"/>
									  </div>
									  <div class="form-group col-md-10">
									  <label >Driver Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="driverName" value="<?php echo $driverName;?>"/>
									  </div>
									  <div class="form-group col-md-10">
									  <label >Mobile<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="mobile" value="<?php echo $mobile;?>"/>
									  </div>
									  
									  <div class="form-group col-md-12">									
									<label for="example90">
												Assign Pickup Point(s) <span class="text-danger">*</span>
												</label>
												<select class="form-control  select2" id="example90" name="pickuppoints[]" multiple required>   	
												 <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT areaname FROM areamaster where status = 'Y'");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $pickuppoint=$row['areaname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$pickuppoint.'" >'.$pickuppoint.'</option>';
                                                    }
                                                    ?>
                                                </select>
									</div>
									</div>
 										
								    <div class="modal-footer">
										<input type="hidden" name="itemcatID" value="<?=$_GET['id']?>">
										<button type="submit" name="purItmCateEdit" value="userEdit" class="btn btn-primary">Update</button>
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
	
    
<?php include('footer.php'); ?>