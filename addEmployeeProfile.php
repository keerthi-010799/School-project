<?php
include("database/db_conection.php");//make connection here
$emailFound = '';

if(isset($_POST['submit']))
{
//here getting result from the post array after submitting the form.
	
$firstname 	 =	$_POST['firstname'];
$lastname 	 =	$_POST['lastname'];
$type = $_POST['type'];
$hiredate = $_POST['hiredate'];
$designation = $_POST['designation'];
$address  =	$_POST['address'];		
$city 	 =	$_POST['city'];	
$country  =	$_POST['country'];		
$state  =	$_POST['state'];		
$zip  =	$_POST['zip'];		
$phone 	 =	$_POST['phone'];	
$mobile 	 =	$_POST['mobile'];	
$email 	 =	$_POST['email'];	
$gender 	 =	$_POST['gender'];	
$taxid 	 =	$_POST['taxid'];
$deptMgr = $_POST['deptMgr'];	
$deptName =$_POST['deptName'];
//$gstregdate 	 =	$_POST['gstregdate'];	
//$primaryflag 	 =	$_POST['primaryflag'];
$image 	 =	$_POST['image'];
//$openbalance = $_POST['openbalance'];
//$obasofdate = $_POST['obasofdate'];
	

	//$image = file_get_contents($image
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //$image =base64_encode($image);
  	

//Generating Vendor ID
$empid ="";
$prefix ="EMPID-";
 $sql="SELECT MAX(id) as latest_id FROM employees ORDER BY id DESC";
	if($result = mysqli_query($dbcon,$sql)){
		$row   = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)>0){
			$maxid = $row['latest_id'];
			$maxid+=1;
			
			$empid = $prefix.$maxid;
		}else{
			$maxid = 0;
			$maxid+=1;
			$empid = $prefix.$maxid;
		}
	}	
												    
	$check_vendor_query="select email from employees WHERE email='$email'";
    $run_query=mysqli_query($dbcon,$check_vendor_query);
	if(mysqli_num_rows($run_query)>0)
    {
        $emailFound = "Email: '$email' is already exist, Please try another one!";
        //exit;
    }
    else{
    $insert_employeeProfile="INSERT INTO employees(empid,firstname,lastname,gender,dob,designation,deptName,deptMgr,hiredate,type,marital_status,address,city,state,country,zip,phone,mobile,email,taxPin,image) 
	VALUES('$empid','$firstname','$lastname','$gender','$dob','$designation','$deptName','$deptMgr','$hiredate','$type','$maritalstatus','$address','$city','$state','$country','$zip','$phone','$mobile','$email','$taxPin','$target_file')";
	
	echo "$insert_employeeProfile";
	
	if(mysqli_query($dbcon,$insert_employeeProfile))
	{
   
		echo "<script>alert('Company Code/Type creation Successful ')</script>";
		header("location:listEmployees.php");
    } else { die('Error: ' . mysqli_error($dbcon));
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
}
?>
	
<?php include('header.php');?>
	<!-- End Sidebar -->
<!-- BEGIN CSS for this page -->
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
		<!-- END CSS for this page -->
    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Employee Profile</h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Employee Profile</li>
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
								<h5><div class="text-muted font-light"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>&nbsp;Add Employee Details<span class="text-muted"></span></div></h5>
													
								<p class="text-danger"><?php echo $emailFound;?></p>
								
								
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
																
								    <div class="form-row">
									<div class="form-group col-md-6">
									  <label >First Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" required name="firstname" placeholder="First Name" required class="form-control" autocomplete="off">
									</div>
									
									<div class="form-group col-md-5">
									  <label >Last Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" required name="lastname" placeholder="Last Name" class="form-control" autocomplete="off">
									</div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-6">
                                     <label for="one">
												Select Gender 
												</label>
                                    <select name="gender" id="one" class="form-control form-control-sm select2" required>
                                        
                                        <option  value="M">Male</option>
                                        <option  value="F">Female</option>
                                    </select>
                                </div>
									
									
								<div class="form-group col-md-6">
									<label> Date of Birth</label>
									  <input type="date" class="form-control form-control-sm" required name="dob" value="<?php echo date("Y-m-d");?>">		
									</div>
								</div>

								<div class="form-row">
								<div class="form-group col-md-6">								
									   <label for="designation">Designation</label>
                                                <select required id="designation"  class="form-control select2" name="designation" required>
                                                    
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT designation FROM designation");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $desig=$row['designation'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$desig.'" >'.$desig.'</option>';
                                                    }
                                                    ?>
                                                </select>	
									</div>							
                                            <div class="form-group col-md-6">
                                                <label for="type">Employee Type</label>
                                                <select required id="type" onchange="onlocode(this)"  class="form-control form-control-sm select2" name="type">
                                                    <!--option value="">-Select Type-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT type FROM emptype order by id desc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $emptype=$row['type'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$emptype.'" >'.$emptype.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
											</div>

											<div class="form-row">
									<div class="form-group col-md-6">
                                     <label for="one">
												 Marital Status 
												</label>
                                    <select name="maritalstatus" id="one" class="form-control form-control-sm select2" required>
                                          <option value="">-Select Marital Status-</option>
                                        <option  value="M">Married</option>
                                        <option  value="U">Un married</option>
										<option  value="S">Single</option>
                                    </select>
                                </div>
							</div>
										
							
												
									<div class="form-row">
									<div class="form-group col-md-6">
									  <h4 class="text-muted">Address &nbsp;</h4>
									  </div>
									</div>

									<div class="form-row">
									<div class="form-group col-md-6">									
									<input type="text" placeholder="Street *" name="address" required class="form-control form-control-sm"> 
									</div>							
									
								
									<div class="form-group col-md-6">
									  <input type="text" class="form-control form-control-sm" required name="city"  placeholder="City *">
									</div>
									</div>
									

									
									<div class="form-row">
									
									
											
											
									
									
									  <div class="form-group col-md-3">
									  <input type="text" class="form-control form-control-sm" name="zip"  required placeholder="Zip/Postal Code *">
									  </div>
									
									</div>
									
									
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Contact Details</h4>
									  </div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-3">
									<label> Phone</label>
									  <input type="text" class="form-control form-control-sm" name="phone"  placeholder="Landline">
									</div>
									
									<div class="form-group col-md-3">
									<label> Mobile <span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" name="mobile"  required placeholder="9677573737">
									</div>
									
									<div class="form-group col-md-5">
									<label> Email<span class="text-danger">*</span></label>
									  <input type="email" class="form-control form-control-sm" name="email"   required placeholder="" autocomplete="off">
									</div>
									</div>
									
								
									
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Tax Details</h4>
									  </div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-9">
									<label>Tax Pin Number<span class="text-danger"></span></label>
									  <input type="text" class="form-control form-control-sm" name="taxPin"  placeholder="">
									</div>
									</div>
									
								
									
									<div class="form-row">
									<div class="form-group col-md-9">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Profile Image like JPG,JPEG,GIF,PNG..</div>
                                        </label> 
                                        &nbsp;&nbsp;<input type="file" name="image" class="form-control">
                                    </div>
								</div>
								
								<!--div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>
								 <input type="checkbox" name="primaryflag" value="0" class="ember-checkbox ember-view">Make this profile as primary for all correspondence</label>
								 
								 </div>
								 </div>
								 </div-->		
								
																
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
	


</div>
<!-- END main -->

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

 
<script>
$(function(){
    $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
              data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});      
</script>



<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitsuptype').click(function(){
		var description = $('#adddescription').val();
		var suptype = $('#addsupptype').val();
		//alert(groupname+description);
		$.ajax ({
           url: 'addSuppTypeModal.php',
		   type: 'post',
		   data: {
				  suptype:suptype,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#suptype').append(new_option);
					 $('#customModal').modal('toggle');
				}else{
					alert('Error in inserting supplier type,try another one');
				}
			}
        
         });
		 
		 });
});
			
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>                                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->


</body>
</html>