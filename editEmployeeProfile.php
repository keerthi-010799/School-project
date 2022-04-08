<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['empProfileEdit']))
{ 
    //var_dump($_POST);
    extract($_POST);
    
	$target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["profileimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profileimage"]["tmp_name"]);

   // $title ="";

    if (!empty($_FILES["profileimage"]["name"])){

        if($check !== false) {


            if (move_uploaded_file($_FILES['profileimage']['tmp_name'], __DIR__.'/'.$target_dir.$_FILES['profileimage']['name'])) {
                //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";

                $updateEmpProfile = "UPDATE `employees` SET `empid` = '".$empid."', 
												 `firstname`  = '".$firstname."',
												 `lastname`  = '".$lastname."',
												 `gender`  = '".$gender."',
												 `dob`   = '".$dob."',
                                                 `designation`   = '".$designation."',
                                                 `deptName`   = '".$deptName."',
                                                 `deptMgr`   = '".$deptMgr."',
												 `hiredate`   = '".$hiredate."',
                                                 `type`   = '".$type."',
                                             	 `address`    = '".$address."',
												 `city`     = '".$city."',
												 `state`    = '".$state."',
												 `country`  = '".$country."',
												 `zip`      = '".$zip."',
												 `phone`  = '".$phone."',
												 `mobile`  = '".$mobile."',
												 `taxPin`  = '".$taxpin."',
                                                 `status`  = '".$status."',
												 `image`  = '".$target_file."'												
								WHERE `id` =".$empEditID;

            } else {
                echo "Sorry, there was an error uploading your image file.".$updateEmpProfile;
            }

        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }else{

        $updateEmpProfile = "UPDATE `employees` SET `empid` = '".$empid."', 
                                    `firstname`  = '".$firstname."',
                                    `lastname`  = '".$lastname."',
                                    `gender`  = '".$gender."',
                                    `dob`   = '".$dob."',
                                    `designation`   = '".$designation."',
                                    `deptName`   = '".$deptName."',
                                    `deptMgr`   = '".$deptMgr."',
									`hiredate`   = '".$hiredate."',
                                    `type`   = '".$type."',
                                    `address`    = '".$address."',
                                    `city`     = '".$city."',
                                    `state`    = '".$state."',
                                    `country`  = '".$country."',
                                    `zip`      = '".$zip."',
                                    `phone`  = '".$phone."',
                                    `mobile`  = '".$mobile."',
                                    `status`  = '".$status."',
									`marital_status` = '$maritalstatus',
                                    `taxPin`  = '".$taxpin."'
                                  										
                WHERE `id` =".$empEditID;
				// echo $updateComprofile;
    }
	if(mysqli_query($dbcon,$updateEmpProfile))
    {
        
           // $image=$_POST['image'];//same

    //$image = file_get_contents($image);

   
       // echo "<script>alert('Profile Successfully updated')</script>";
        header("location:listEmployees.php");
    } else { echo die('Error: ' . mysqli_error($dbcon).$updateEmpProfile );
	    //'Failed to update user';
            exit; //echo "<script>alert('Company Profile creation unsuccessful ')</script>";
           }
   
	die;
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
                                    <h1 class="main-title float-left">Edit Employee Profile</h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Employee Profile</li>
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
								<h5><div class="text-muted font-light"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>&nbsp;Edit Employee Profile<span class="text-muted"></span></div></h5>
								
								<!--div class="text-muted font-light">Tell us a bit about yourself.</div-->
								<!--p class="text-danger"><?php echo $emailFound;?></p-->
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
								
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="editEmployeeProfile.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT empid,firstname,lastname,gender,dob,hiredate,type,designation,hiredate,deptName,
                                            deptMgr,address,city,country,state,zip,phone,mobile,email,taxPin,status,marital_status,image
											FROM employees WHERE id=$id");
                                            while($res = mysqli_fetch_array($result))
                                            {
                                                $empid = $res['empid'];
												$firstname =	$res['firstname'];
												$lastname 	 =	$res['lastname'];	
												//$portal 	 =	$res['portal'];
												$gender  =	$res['gender'];	
												$dob 	 =	$res['dob'];
												$type 	 =	$res['type'];	
												$designation  =	$res['designation'];		
												$dob 	 =	$res['dob'];	
												$hiredate 	 =	$res['hiredate'];	
												$deptName  =	$res['deptName'];		
												$deptMgr  =	$res['deptMgr'];		
												$address  =	$res['address'];		
												$city 	 =	$res['city'];	
												$country 	 =	$res['country'];	
												$state 	 =	$res['state'];	
												$zip 	 =	$res['zip'];	
												$phone 	 =	$res['phone'];	
												$mobile 	 =	$res['mobile'];	
												$email 	 =	$res['email'];
                                                $taxpin	 =	$res['taxPin'];
                                                $status 	 =	$res['status'];
												$maritalstatus 	 =	$res['marital_status'];
												$image 	 =	$res['image'];

                                            }
                                        }

                                        ?>	
									<div class="form-row">
									<div class="form-group col-md-12">
									  <label for="inputZip">Employee ID/Code</label>
									  <input type="text" class="form-control form-control-sm"  name="empid"  readonly  value="<?php echo $empid;?>" />
									</div>
									</div>
														
																
								    <div class="form-row">
									<div class="form-group col-md-6">
									  <label >First Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" name="firstname" value="<?php echo $firstname;?>" />
									</div>
									
									<div class="form-group col-md-5">
									  <label >Last Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" name="lastname" value="<?php echo $lastname;?>" />
									</div>
									</div>
									
									<div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                        <option <?php if ($gender == "Male" ) echo 'selected="selected"' ; ?> value="Male">Male</option>
                                        <option <?php if ($gender == "Female" ) echo 'selected="selected"' ; ?> value="Female">Female</option>
                                        </select>
                                     </div>
									
									
								<div class="form-group col-md-6">
									<label> Date of Birth</label>
									  <input type="date" class="form-control form-control-sm"  name="dob" value="<?php echo $hiredate;?>">		
									</div>
								</div>

								<div class="form-row">
								<div class="form-group col-md-6">								
									   <label for="designation">Designation</label>
                                                <select required id="designation" onchange="onlocode(this)"  class="form-control form-control-sm select2" name="designation">
                                                    
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT designation FROM designation");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        $desig_get=$row['designation'];
                                                       // $ename_desc=$row['ename'];
                                                        if($desig_get==$designation){
                                                           echo '<option value="'.$desig_get.'" selected>'.$desig_get.'</option>';

                                                       }else{
                                                           echo '<option value="'.$desig_get.'" >'.$desig_get.'</option>';

                                                       }
                                                   }
                                                   ?>
                                                </select>	
									</div>							
                                            <div class="form-group col-md-6">
                                                <label for="type">Employee Type</label>
                                                <select required id="type" onchange="onlocode(this)"  class="form-control form-control-sm select2" name="type">
                                                   
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT type FROM emptype");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        $emptype_get=$row['type'];
                                                       // $ename_desc=$row['ename'];
                                                        if($emptype_get==$type){
                                                           echo '<option value="'.$emptype_get.'" selected>'.$emptype_get.'</option>';

                                                       }else{
                                                           echo '<option value="'.$emptype_get.'" >'.$emptype_get.'</option>';

                                                       }
                                                   }
                                                   ?>
                                                </select>	
												</div>
											</div>
											<div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>Marital Status</label>
                                        <select name="maritalstatus" class="form-control" required>
                                        <option <?php if ($maritalstatus == "M" ) echo 'selected="selected"' ; ?> value="M">Married</option>
                                        <option <?php if ($maritalstatus == "U" ) echo 'selected="selected"' ; ?> value="U">Un Married</option>
                                        </select>
                                     </div>
                                    </div>
											<div class="form-row">
												<div class="form-group col-md-6">
									<label> Hiredate</label>
									  <input type="date" class="form-control form-control-sm"  name="hiredate" value="<?php echo $hiredate;?>">		
									</div>
								</div>
												
									<div class="form-row">
									<div class="form-group col-md-6">
									  <h4 class="col-md-12 text-muted">Address &nbsp;</h4>
									  </div>
									</div>

									<div class="form-row">
									<div class="form-group col-md-6">									
									<input type="text"  name="address" class="form-control form-control-sm" value="<?php echo $address;?>" />
									</div>							
									
								
									<div class="form-group col-md-6">
									  <input type="text" class="form-control form-control-sm" required name="city"  value="<?php echo $city;?>" />
									</div>
									</div>
									

									
									<div class="form-row">
									
									
											
											
									
									
									  <div class="form-group col-md-3">
									  <input type="text" class="form-control form-control-sm" name="zip"  value="<?php echo $zip;?>" />
									  </div>
									
									</div>
									
									
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Contact Details</h4>
									  </div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-3">
									<label> Work Phone</label>
									  <input type="text" class="form-control form-control-sm" name="phone"  value="<?php echo $phone;?>" />
									</div>
									
									<div class="form-group col-md-3">
									<label> Mobile <span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" name="mobile"  value="<?php echo $mobile;?>" />
									</div>
									
									<div class="form-group col-md-5">
									<label> Email<span class="text-danger">*</span></label>
									  <input type="email" class="form-control form-control-sm" name="email"   value="<?php echo $email;?>" />
									</div>
									</div>
									
									<div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>status</label>
                                        <select name="status" class="form-control" required>
                                        <option <?php if ($status == "Y" ) echo 'selected="selected"' ; ?> value="Y">Active</option>
                                        <option <?php if ($status == "N" ) echo 'selected="selected"' ; ?> value="N">Female</option>
                                        </select>
                                     </div>
                                    </div>
									
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Tax Details</h4>
									  </div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-11">
									<label>Edit Tax Pin<span class="text-danger"></span></label>
									  <input type="text" class="form-control form-control-sm" name="taxpin"  value="<?php echo $taxpin;?>" />
									</div>
									</div>

									<div class="form-row">
                                    <div class="form-group col-md-11">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Profile Image like JPG,JPEG,GIF,PNG..</div>
                                        </label> 
                                        <img src="<?php echo $image;?>" width="75px" class="rounded float-left" alt="...">

                                        &nbsp;&nbsp;<input type="file" name="iamge" class="form-control form-control-sm">
                                       
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
                                             <input type="hidden" name="empEditID" value="<?=$_GET['id']?>" />
                                                       &nbsp;
                                                        <button type="submit" name="empProfileEdit" value="empProfileEdit" class="btn btn-primary">Update</button>
                                    
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
	
 <footer class="footer">
		<span class="text-right">
		Copyright@<a target="_blank" href="#"></a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href=""><span>e-Schoolz</span> </a>
		</span>
	</footer>

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