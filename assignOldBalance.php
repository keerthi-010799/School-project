<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $academic =$_POST['academic'];
    $admissionno =$_POST['admissionno'];
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $class =$_POST['class'];
    $fees_balance =$_POST['fees_balance'];   
    $createdby =$_POST['createdby'];
    

   //$image =base64_encode($image);														
	$insert_oldbalstudents="INSERT into oldbalstudents(`academic`,`admissionno`,`firstname`,`lastname`,`class`,fees_balance,createdby)
    VALUES ('$academic','$admissionno','$firstname','$lastname','$class','$fees_balance','$createdby')";

// Inserting Log details into log table
   // echo "$sql";											    

	//echo "$insert_oldbalstudents";
	
	if(mysqli_query($dbcon,$insert_oldbalstudents))
	{
		echo "<script>alert('academic creation Successful ')</script>";
		header("location:listOldBalance.php");
    } else {  die('Error: ' . mysqli_error($dbcon));
		exit; echo "<script>alert('Designation creation  unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Old Balance Student Data Form</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Archived Students</li>
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
								 Old Balance Student Data Form
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                               
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="inputState">Handler</label>
                                        <input type="text" class="form-control form-control-sm"  
                                        id="createdby" name="createdby" readonly 
                                        class="form-control form-control-sm" 
                                        value="<?php echo $session_user; ?>" required />

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-10 ">
                                    <label for="inputState"><span class="">Academic</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic order by academic DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-10">
                                        <label><span class="">Admission No.</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="admissionno" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">First Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First Name" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><span class="">Last Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="lastname" placeholder="Initial"   autocomplete="off" />
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="inputState"><span class="">Class/Course</span><span class="text-danger">*</span></label>
                                                <select required id="class" onchange="onlocode(this)"  class="form-control select2" name="class">
                                                    <option value="">-Select Class/Course-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ORDER BY id ASC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                    
                                                </select>
												
                                    </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-10">	
												<form class="form-inline">
												<label class="sr-only" for="inlineFormInputGroupUsername2">Enter Old Balance</label>
													<div class="input-group mb-2 mr-sm-2">
													<div class="input-group-prepend">
													<div class="input-group-text">₹</div>
													</div>												
													<input type="text" name="fees_balance" class="form-control" id="fees_balance" placeholder="Enter Old Balance Due Amount" required  />
												</div>
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