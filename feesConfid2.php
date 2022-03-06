<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $class=$_POST['section'];//same
    $desc=$_POST['description'];//same
	


   //$image =base64_encode($image);														
	$insert_class="INSERT INTO section(`section`,`description`) 
	VALUES ('$class','$desc')";													    

	echo "$insert_class";
	
	if(mysqli_query($dbcon,$insert_class))
	{
		echo "<script>alert('section creation Successful ')</script>";
		header("location:listSection.php");
    } else {
		exit; echo "<script>alert('section creation  unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Fees Configuration</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Fees Configuration </li>
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
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><i class="fa fa-rupee bigfonts" aria-hidden="true"></i> 
								 Fees Configuration
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
							<div class="form-row">
                                    <div class="form-group col-md-4 ">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									<div class="form-group col-md-4">
                                    <label>Select Class<span class="text-danger">*</span></label>
                                         <select class="form-control form-control-sm"  name="class" required >       
											 <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									</div>

									
								<div class="form-row">
									<div class="form-group col-md-4">
                                    <label>Select Fees Name<span class="text-danger">*</span></label>
                                         <select class="form-control form-control-sm" name="feesname" required>        
											 <option value="">-Select Feesname-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feeshead");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $feesname=$row['feesname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$feesname.'" >'.$feesname.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									<div class="form-group col-md-4">
										<label >Fees Amount</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="amount" placeholder=""  >
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
								</div>
								
						
								
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	
 <?php include('footer.php');?>