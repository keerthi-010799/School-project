<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $class=$_POST['class'];//same
    $desc=$_POST['description'];//same
	


   //$image =base64_encode($image);														
	$insert_class="INSERT INTO class(`class`,`description`) 
	VALUES ('$class','$desc')";													    

	echo "$insert_class";
	
	if(mysqli_query($dbcon,$insert_class))
	{
		echo "<script>alert('class creation Successful ')</script>";
		header("location:listClass.php");
    } else {
		exit; echo "<script>alert('class creation  unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Bus Students </h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Bus Students </li>
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
								 <h3><i class="fa fa-building-o bigfonts" aria-hidden="true"></i> 
								 Add Bus Students
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
							
                                <div class="form-row">
                                <div class="form-group col-md-12">									
									<label for="route">
												Select Route <span class="text-danger">*</span>
												</label>
												<select class="form-control  select2" id="route" name="routeno" required>   	
												 
												<option value="">-Select Route-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT routeno FROM route ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $busno=$row['routeno'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$busno.'" >'.$busno.'</option>';
                                                    }
                                                    ?>
                                                </select>
									</div>	
									</div>
									
								<div class="form-row">
                                <div class="form-group col-md-12">									
									<label for="pickuppoints">
												Select Pickup Point <span class="text-danger">*</span>
												</label>
												<select class="form-control select2" id="pickuppoints" name="pickuppoints" required>   	
												 
												<option value="">-Select Pickuppoint-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT pickuppoints FROM route ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $pickuppoint=$row['pickuppoints'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$pickuppoint.'" >'.$pickuppoint.'</option>';
                                                    }
                                                    ?>
                                                </select>
									</div>	
									</div>

                                    <div class="form-row">
                                <div class="form-group col-md-12">									
									<label for="students">
												Assign Student(s) <span class="text-danger">*</span>
												</label>
												<select class="form-control select2" id="students" name="studentName[]" multiple required>   	
												 
												<option value="">-Select Student(s)-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT admissionno,concat(firstname,' ',lastname) as name FROM studentprofile ");
                                                  
                                                    while ($row = $sql->fetch_assoc()){	
                                                        $admissionno=$row['admissionno'];
                                                        $stuName=$row['name'];
                                                        echo '<option  value="'.$admissionno.'" >'.$admissionno.' '.$stuName.'</option>';
        
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