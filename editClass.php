<?php 
include("database/db_conection.php");//make connection here

if(isset($_POST['locEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
    $updateclass = "UPDATE `class` SET `class` = '".$class."',`description` = '".$desc."' WHERE `id` =".$locID;
    if(mysqli_query($dbcon,$updateclass))
    {
		echo "<script>alert('class Details Successfully updated')</script>";
		header("location:listClass.php");
    } else { echo 'Failed to update user';
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
                                    <h1 class="main-title float-left">Edit Class</h1>
                                    <ol class="breadcrumb float-right">
										<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Class </li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<!--div class="alert alert-success" role="alert">
			
					  <h3 class="alert-heading"></h3>
					  <p></a></p>
			</div-->
	
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-truck bigfonts" aria-hidden="true">
								 </i> Edit Class</div></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="editClass.php" class="validation fv-form fv-form-bootstrap" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

								<?php
											include("database/db_conection.php");//make connection here
 
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM class WHERE id=$id");
									 
												while($res = mysqli_fetch_array($result))
												{
													$class = $res['class'];
													$description = $res['description'];
													
												}
											}
												
											?>			
								
									
									<div class="form-row">							
									<div class="form-group col-md-12">
									  <label >Class<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="class" value="<?php echo $class;?>" />
										</div>
										<div class="form-group col-md-12">
									  <label >Description<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="desc" value="<?php echo $description;?>" />
										</div>
									</div>	

								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
												<input type="hidden" name="locID" value="<?=$_GET['id']?>">
                                                       &nbsp;<button class="btn btn-primary" name="locEdit" type="submit">
                                                            Update
                                                        </button>
                                                        
                                                    </div>
													
													
															
								</form>
								</div>
								</div>
							
								
			<!-- END container-fluid -->

		
		<!-- END content -->

    
	<!-- END content-page -->
    

<?php include('footer.php'); ?>
		
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

</body>
</html>