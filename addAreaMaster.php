<?php
include("database/db_conection.php");//make connection here
$AreanameFound = '';

if(isset($_POST['submit']))
{
	//$areacode ="";
	//$prefix = "";
	
	//$areacode=$_POST['areacode'];
    $areaname=$_POST['areaname'];//here getting result from the post array after submitting the form.
    $amount=$_POST['amount'];


	$check_areaname_query="select areaname from areamaster WHERE areaname='$areaname'";
    $run_query=mysqli_query($dbcon,$check_areaname_query);
	if(mysqli_num_rows($run_query)>0)
    {
		//echo '0';
       // echo "<script>alert('Item Name: $itemname is already exist in our database, Please try another one!')</script>";
        //$fmsg= "Email already exists";   
        $AreanameFound = "Area Name: '$AreanameFound'' already exist in our database, Please try another one!";
       //exit();
        // header("location:addPurchaseItemMaster.php");
    }
    else{	
	
	
    $insert_area="insert into areamaster(`areaname`,`amount`) 
	VALUES ('$areaname','$amount')";
	
	//echo $insert_area;
	
	if(mysqli_query($dbcon,$insert_area))
	{
   
		echo "<script>alert('Route created Successfully ')</script>";
		header("location:listAreanames.php");
    } else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('Location creation unsuccessful ')</script>";
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
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
                                    <h1 class="main-title float-left fa fa-bus bigfonts alert-warning">&nbsp;Add Areanames</h1>
                                    <ol class="breadcrumb float-right">
										<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Area Details </li>
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
	
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><!--div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-truck bigfonts" aria-hidden="true">
								 </i> Add Location Details</div--></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								 <p class="text-danger"><?php echo $AreanameFound;?></p> 
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" 	accept-charset="utf-8" >

								
								<div class="form-row">
								<div class="form-group col-md-8">
								
								
									
									<div class="form-row">							
									<!--div class="form-group col-md-4">
									  <label >Areacode<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="areacode" required placeholder="area lists serial nos 1,2,..." autocomplete="off" required>
										</div-->
										<div class="form-group col-md-8">
									  <label >Areaname<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="areaname" required placeholder="enter Area Name" autocomplete="off" required>
									</div>
											
										<div class="form-group col-md-8">
									  <label >Amount<span class="text-danger">*</span></label>
									  <input type="textarea" class="form-control" name="amount"  required placeholder="enter annual fees" autocomplete="off">
								</div>
								</div>	
								
									
									
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="reset" name="cancel" class="btn btn-secondary m-l-5">
                                                            Cancel
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
    
<?php include('footer.php'); ?>