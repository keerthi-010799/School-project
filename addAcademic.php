<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $academic=$_POST['academic'];//same
    $desc=$_POST['description'];//same
	


   //$image =base64_encode($image);														
	$insert_academic="INSERT INTO academic(`academic`,`description`) 
	VALUES ('$academic','$desc')";													    

	echo "$insert_academic";
	
	if(mysqli_query($dbcon,$insert_academic))
	{
		echo "<script>alert('academic creation Successful ')</script>";
		header("location:listAcademic.php");
    } else {
		exit; echo "<script>alert('academic creation  unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">academic Master</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">academic Master </li>
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
								 <h3><i class="fa fa-calendar bigfonts" aria-hidden="true"></i> 
								 academic Master
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-row">
									<div class="form-group col-md-12">
									  <label >Academic<span class="text-danger">&nbsp;*</span></label>
									  <input type="text" class="form-control"  name="academic" placeholder="ex.2019-20" autocomplete="off" required>
									</div>
									</div>
									
								    <div class="form-row">
									<div class="form-group col-md-12">
									  <label >Description</label>
									  <input type="text" class="form-control" name="desc" placeholder="Description" autocomplete="off" >
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
	
 <?php include('footer.php');?>