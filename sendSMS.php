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
                                    <h1 class="main-title float-left">SMS Form</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">General SMS Form </li>
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
								 <h3><i class="fa fa-envelope bigfonts" aria-hidden="true"></i> 
								 SMS Form
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>To Receipients<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="receipient"  rows="6" placeholder=""></textarea>
                                    </div>
                                </div>
								 
								 <div class="form-row">
								 <label>Choose SMS to Management<span class="text-danger"></span><input type="checkbox" style="width:20px" id="ckbCheckAll"></label>
								 </div>
                                
								
								<div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label><span class="text-danger"><i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                                                                            data-trigger="focus" data-placement="top" title="Message Text - by default sends English SMS if u want to send Language messagea like Tamil  - message type Unicode has to be selected
                                           "></i>
                                            </span>Message Type</label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <!--option value="">-Select Method-</option-->
                                        <option value="1">Text/English</option>
                                        <option value="2">Unicode</option>
                                        </select>   
                                </div>   
                                </div>
								
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="Type message here"></textarea>
                                    </div>
                                </div>
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Send SMS
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