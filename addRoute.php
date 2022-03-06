<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	//$prefix = "DAP/LOC/";
    $pickuppoints = array();
	$routeno=$_POST['routeno'];//here getting result from the post array after submitting the form.
	 $driverName=$_POST['driverName'];
	  $mobile=$_POST['mobile'];
    $pickuppoints=$_POST['pickuppoints'];

   //$image =base64_encode($image);														
		echo $pickuppoints;	
  
        // echo $item."<br>";
      //  $query = "INSERT INTO demo (name) VALUES ('$item')";
      //  $query_run = mysqli_query($con, $query);
	$insert_route="insert into route(`pickuppoints`,`routeno`,`driverName`,`mobile`) 
	VALUES ('$pickuppoints','$routeno','$driverName','$mobile')";
	
	if(mysqli_query($dbcon,$insert_route))
	{
   
		echo "<script>alert('Route  created Successfully ')</script>";
		header("location:listRoute.php");
    } else { die('Error: ' . mysqli_error($dbcon));
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
	
}


?>

	
<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left fa fa-bus bigfonts alert-warning">&nbsp;Add Route Details</h1>
                                    <ol class="breadcrumb float-right">
										<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Route Details </li>
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
								 <h3><!--div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-truck bigfonts" aria-hidden="true">
								 </i> Add Location Details</div--></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" 	accept-charset="utf-8" >

								
								<div class="form-row">
								<div class="form-group col-md-8">
								
								
									
									<div class="form-row">							
									<div class="form-group col-md-12">
									  <label >Route#<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="routeno" required placeholder="enter van/bus route no" autocomplete="off" required>
									</div>
									<div class="form-group col-md-12">
									  <label >Driver Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="driverName" required placeholder="Driver Name for this Route" autocomplete="off" required>
									</div>
									<div class="form-group col-md-12">
									  <label >Mobile<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="mobile" required placeholder="Enter Driver's Mobile Number " autocomplete="off" required>
									</div>
										
									<div class="form-group col-md-12">									
									<label for="example90">
												Assign Pickup Point(s) <span class="text-danger">*</span>
												</label>
												<select class="form-control  select2" id="example90" name="pickuppoints[]" multiple required>   	
												 
												<!--option value="">-Open Areanames-</option-->
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
									
									
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
														<button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
                                                    </div>
													</div>
													</div>
									</div>
								
			<!-- END container-fluid -->
		
		<!-- END content -->
</form>
								
							</div>
						</div>
			</div>
						
						
	<!-- END content-page -->
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>								
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->

    
<?php include('footer.php'); ?>