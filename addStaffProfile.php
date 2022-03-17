<?php
include("database/db_conection.php");//make connection here
$admnoFound ='';

  
if(isset($_POST['submit']))
{	
    
//$admnoFound ='';
// $prefix = "";
 //$postfix = "/";
 //$today = date("dmy");
 
 $firstname =$_POST['firstname'];
 $lastname =$_POST['lastname'];
 $gender =$_POST['gender'];
 $dob =$_POST['dob'];
 $doj =$_POST['doj'];
 $bloodgroup =$_POST['bloodgroup'];
 $nationality =$_POST['nationality'];
 $religion =$_POST['religion'];
 $designation =$_POST['designation'];
 $aadhaar =$_POST['aadhaar'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $altmobno =$_POST['altmobno'];
 $address =$_POST['address'];
 $city =$_POST['city'];
 $zip =$_POST['zip'];
 $pfno =$_POST['pfno'];
 $bankname =$_POST['bankname'];
 $acctno =$_POST['acctno'];
 $ifsc =$_POST['ifsc'];
 $image =$_POST['image'];

    //Primaryflag for all correspeondance radio button implementation
  //  $field = isset($_POST['primaryflag']) ? $_POST['primaryflag'] : false;
  //  $dbFlag = $field ? 'Yes' : 'No';


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

 
 
 $check_admno_query="select admissionno from studentprofile WHERE admissionno='$admissionno'";
    $run_query=mysqli_query($dbcon,$check_admno_query);
	if(mysqli_num_rows($run_query)>0)
    {
		//echo '0';
       // echo "<script>alert('Item Name: $itemname is already exist in our database, Please try another one!')</script>";
        //$fmsg= "Email already exists";   
       $admnoFound = "Admission no: '$admissionno''already exist in our database, Please try another one!";
       //exit();
        // header("location:addPurchaseItemMaster.php");
    }
//    else{	$sql = 'Insert....
 
 else{ $sql = "INSERT into staffprofile(`academic`,`admissionno`,`firstname`,`lastname`,`gender`,`dob`,`doa`,`class`,`section`,
                                    `bloodgroup`,`nationality`,`religion`,`community`,`caste`,`fathername`,`mothername`,
                                    `aadhaar`,`emis`,`occupation`,`address`,`city`,`zip`,`email`,`mobile`,`altmobno`,`routeno`,`areaname`,`vanfees`,`vanflag`,
                                    `image`                                      
								    )
				VALUES ('$academic','$admissionno','$firstname','$lastname','$gender','$dob','$doa','$class','$section','$bloodgroup',
                '$nationality','$religion','$community','$caste','$fathername','$mothername','$aadhaar','$emis','$occupation',
                '$address','$city','$zip','$email','$mobile','$altmobno','$routeno','$areaname','$vanfees','$vanflag','$target_file')";

 // Inserting Log details into log table
echo "$sql";
        
  
 if(mysqli_query($dbcon,$sql))
 {
     header("location:listStudentProfile.php");
 }   else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('Student creation unsuccessful ')</script>";
 }
}
}
?>
<?php include('header.php');?>
<!-- End Sidebar -->

<!-- Modal Academic-->
								<div class="modal fade custom-modal" id="customModalAcademic" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Academic</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addacademic"  id="addacademic"  placeholder="ex. 2020-21">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitacademic" id="submitacademic" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	


		
<!-- Modal Designation-->
								<div class="modal fade custom-modal" id="customModalDesignation" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Designation</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="adddesignation"  id="adddesignation"  placeholder="Truste member,partner,office assistant">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitdesignation" id="submitdesignation" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>	<!-- Modal Ends	-->

	<!-- Modal Class/Course-->
								<div class="modal fade custom-modal" id="customModalClass" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Class/Course</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addclass"  id="addclass"  placeholder="ex. LKG,UKG,X,XI,B.Sc.">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitclass" id="submitclass" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	

	

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-user-plus bigfonts text-primary" aria-hidden="true" >Add Saff Profile</i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Staff Profile</li>
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
                            <h3><!--i class="fa fa-user"></i>&nbsp;&nbsp;Student Profile Details</h3-->
                            <!--h3 class="fa-hover col-md-12 col-sm-12">
                                 Purchase Item Master
                            </h3-->
                                <p class="text-danger"><?php echo $admnoFound;?></p> </h3>
                        </div>
                                         
                        
                        
                        <div class="card-body">
                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    
                                <div class="form-row">
								   <h4 class="col-md-12 text-muted text-info">Staff Personel Details &nbsp;</h4>
                                
                                    <div class="form-group col-md-7">
                                        <label><span class="">First Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First Name" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><span class="">Last Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="lastname" placeholder="Initial/Father's name"   autocomplete="off" />
                                    </div>                                    
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label ><span class="">Gender</span><span class="text-danger">*</span></label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <option value="">-Select Gender-</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>   
                                    </div>
                                <div class="form-group col-md-4">
                                    <label><span class="">DOB</span><span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="dob"  value="<?php echo date("Y-m-d");?>" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><span class="">Date of Join</span><span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="doj"  value="<?php echo date("Y-m-d");?>" />
                                    </div>
                                    </div>
                                    
                                    
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>Blood Group<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="bloodgroup" placeholder="ex. o+ve,b+ve,ab-ve..."   autocomplete="off" />
                                    </div> 
									
                                    <div class="form-group col-md-3">
                                        <label><span class="">Nationality</span><span class="text-danger"></span></label>
                                    <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="nationality" >
                                        <option value="Indian">Indian</option>
                                        <option value="NRI">NRI</option>
                                        <option value="Others">Others</option>
                                    </select>   
                                    </div>
                                <div class="form-group col-md-3">
                                    <label>Religion<span class="text-danger"></span></label>
                                        <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="religion" >
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Christian">Christian</option>
                                            <option value="Jain">Jain</option>
                                            <option value="Others">Others</option>
                                    </select>   
                                    </div>
									
									 <div class="form-group col-md-4">
                                    <label for="inputState"><span class="">Designation</span></label>
                                                <select id="section" onchange="onlocode(this)"  class="form-control form-control-sm" name="designation">
                                                    <option value="">-Open Designation-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT designation FROM designation where status = 'Y'");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $designation=$row['designation'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$designation.'" >'.$designation.'</option>';
                                                    }
                                                    ?>
                                                </select>
													<a href="#custom-modal" data-target="#customModalDesignation" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Designation</a><br>
												</div>
											
								
									
									</div> 
                                

                                <div class="form-row">
                                
                                    <h4 class="col-md-12 text-muted text-info">Contact Details &nbsp;</h4>
                                </div>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">Aadhaar#</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="aadhaar" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><span class="">Email</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="email" placeholder="email"  required autocomplete="off" />
                                    </div>                                     
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">Mobile</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="mobile" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><span class="">Alternate Mobile</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="altmobno" placeholder=""   autocomplete="off" />
                                    </div>                                     
                                </div>
                                
                                <div class="form-row">
                                   <h4 class="col-md-12 text-muted text-info">Address Details &nbsp;</h4>
                                   
                                    <div class="form-group col-md-7">
                                        <label><span class="text-secondary">Address</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="address" required placeholder="No,street..."  class="form-control" autocomplete="off" />
                                    </div>
                                    
                                    <div class="form-group col-md-5">
                                        <label><span class="text-secondary">City</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="city" placeholder="City/Town/Village"   autocomplete="off" />
                                    </div>  
                                </div>
                                
                                 <div class="form-row">
                                   <div class="form-group col-md-7">
                                       <label><span class="text-secondary">Postal Code</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="zip" placeholder=""   autocomplete="off" />                                 
                                    </div>
                                   </div>
                               
                                <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Bank/PF Account Details&nbsp;</h5>
                                </div>
                                
                                 
                                 <div class="form-row">
                                   <div class="form-group col-md-6">
                                       <label><span class="">PF# </span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="pfno" placeholder="PF Account No"   autocomplete="off" />                                 
                                    </div>
									 <div class="form-group col-md-6">
                                       <label><span class="">Bank </span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="bankname" placeholder="Bank name"   autocomplete="off" />    
                                   </div>
								   </div>
                                
                            
                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">A/C No </span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="acctno" placeholder="Bank Account No"   autocomplete="off" />    
    
                                    </div>
									<div class="form-group col-md-6">
                                        <label><span class="">IFSC CODE </span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="ifsc" placeholder="IFSC Code"   autocomplete="off" />    
									</div>
									</div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                <i class="fa fa-folder-open bigfonts text-danger" aria-hidden="true"><b>Upload Staff Photo</b></i></div></label> 
                                    
                                        <input type="file" name="image" id="fileinput" class="form-control text-warning" width="80" height="60">
                                    </div>
                                </div>
                                </div>




                                <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                        <input type="hidden" name="id" >
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
   


    <!--script>
        $('document').ready(function(){	
            $('#submitcategory').click(function(){
                var category = $('#addcategory').val();
                //var suptype = $('#addsupptype').val();
                //alert(groupname+description);
                $.ajax ({
                    url: 'addCategoryModal.php',
                    type: 'post',
                    data: {
                        category:category,
                        // description:description
                    },
                    //dataType: 'json',
                    success:function(response){
                        if(response!=0 || response!=""){
                            var new_option ="<option>"+response+"</option>";
                            $('#category').append(new_option);
                            $('#customModal').modal('toggle');
                        }else{
                            alert('Error in inserting new Category,try another unique category');
                        }
                    }

                });

            });
        });

    </script-->			

		<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitareaname').click(function(){
		var areaname = $('#addareaname').val();
		var amount = $('#addamount').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addAreaNameModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  areaname:areaname,
				  amount:amount
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#areaname').append(new_option);
					 $('#customModalAreaname').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Areaname,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	


		<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitdesignation').click(function(){
		var designation = $('#adddesignation').val();
		var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addDesignationModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  designation:designation,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#designation').append(new_option);
					 $('#customModalDesignation').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Designation,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	

<script>
$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitclass').click(function(){
		var class = $('#addclass').val();
		var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addClassModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  class:class,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#class').append(new_option);
					 $('#customModalClass').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Class,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	
    <?php include('footer.php');?>

