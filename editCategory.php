<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['purItmCateEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
	
    $updateCategory= "UPDATE `category` SET `category` = '".$category."',`description` = '".$description."'
										WHERE `id` =".$itemcatID;
	//echo $updatePurItmCtgry;
    if(mysqli_query($dbcon,$updateCategory))
    {
		echo "<script>alert('User Group Successfully updated')</script>";
     header("location:listCategory.php");
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
                                    <h1 class="main-title float-left">Edit Category</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Edit Category</li>
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
							<h3> <div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i> Edit Category 
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<form method="post" action="editCategory.php"  enctype="multipart/form-data">
											<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM category WHERE id=$id");
												while($res = mysqli_fetch_array($result))
												{
													$category = $res['category'];
													$description= $res['description'];
													
												}
											}
											?>
									
									<div class="form-row">
									<div class="form-group col-md-10">
									  <label >Categor<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="category" value="<?php echo $category;?>"/>
									  </div>
									  
									<div class="form-group col-md-10">
									  <label >Description</label>
									  <input type="text" class="form-control" name="description" value="<?php echo $description;?>"/>
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