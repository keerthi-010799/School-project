<?php 
include("database/db_conection.php");//make connection here

if(isset($_POST['locEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
    $updateAreaname = "UPDATE `areamaster` SET `areaname` = '".$areaname."',`amount` = '".$amount."' WHERE `id` =".$locID;
    
	echo "$updateAreaname";
	
	
	if(mysqli_query($dbcon,$updateAreaname))
    {
		echo "<script>alert('class Details Successfully updated')</script>";
		header("location:listAreanames.php");
    } else { echo 'Failed to update Academic';
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
                                    <h1 class="main-title float-left">Edit Areaname</h1>
                                    <ol class="breadcrumb float-right">
										<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Areaname </li>
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
								 <h3><div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-calendar-o bigfonts" aria-hidden="true">
								 </i> Edit Areaname</div></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="editAreaNames.php" class="validation fv-form fv-form-bootstrap" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>

								<?php
											include("database/db_conection.php");//make connection here
 
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM areamaster WHERE id=$id");
									 
												while($res = mysqli_fetch_array($result))
												{
													//$areacode = $res['id'];
													$areaname = $res['areaname'];
													$amount = $res['amount'];
													
												}
											}
												
											?>			
								
									
									<div class="form-row">							
									<!--div class="form-group col-md-12">
									  <label >Areacode<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="areacode" readonly value="<?php echo $areacode;?>" />
										</div-->
										
										<div class="form-group col-md-12">
									  <label >Areaname<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="areaname" value="<?php echo $areaname;?>" />
										</div>
									</div>	
									<div class="form-row">
									<div class="form-group col-md-12">
									  <label >Amount<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="amount" value="<?php echo $amount;?>" />
										</div>
									</div>	

								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
												<input type="hidden" name="locID" value="<?=$_GET['id']?>">
                                                       &nbsp;<button class="btn btn-primary" name="locEdit" type="submit">
                                                            Update
                                                        </button>
                                                        
                                                    </div>
													
													
									</div>
								</form>
								</div>
								</div>
							
								
			<!-- END container-fluid -->

		
		<!-- END content -->

    
	<!-- END content-page -->
    

<?php include('footer.php'); ?>
		
