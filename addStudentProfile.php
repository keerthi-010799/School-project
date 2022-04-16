<?php
include("database/db_conection.php");//make connection here
$admnoFound ='';

/*$con = mysqli_connect("localhost","root","root","dhirajpro");
	// Check connection
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/
//$academics = "SELECT CONCAT( YEAR(CURDATE()) , '-', YEAR( CURDATE()) +1 )as Academic";
  
if(isset($_POST['submit']))
{	
    
//$admnoFound ='';
// $prefix = "";
 //$postfix = "/";
 //$today = date("dmy");
 
 $academic =$_POST['academic'];
 $admissionno =$_POST['admissionno'];
 $firstname =$_POST['firstname'];
 $lastname =$_POST['lastname'];
 $gender =$_POST['gender'];
 $dob =$_POST['dob'];
 $doa =$_POST['doa'];
 $batch =$_POST['batch'];
 $class =$_POST['class'];
 $section =$_POST['section'];
 $bloodgroup =$_POST['bloodgroup'];
 $nationality =$_POST['nationality'];
 $religion =$_POST['religion'];
 $community =$_POST['community'];
 $caste =$_POST['caste'];
 $fathername =$_POST['fathername'];
 $mothername =$_POST['mothername'];
 $aadhaar =$_POST['aadhaar'];
 $emis =$_POST['emis'];
 $oldschoolname =$_POST['oldschoolname'];
$category =$_POST['category'];
 $occupation =$_POST['occupation'];
 $address =$_POST['address'];
 $city =$_POST['city'];
 $zip =$_POST['zip'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $altmobno =$_POST['altmobno'];
 $routeno =$_POST['routeno'];
 $areaname =$_POST['areaname'];
    $vanfees =$_POST['vanfees'];
 $vanflag =$_POST['vanflag'];
 $discount =$_POST['discount'];
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
 
 else{ $sql = "INSERT into studentprofile(`academic`,`admissionno`,`firstname`,`lastname`,`gender`,`dob`,`doa`,`batch`,`class`,`section`,
                                    `bloodgroup`,`nationality`,`religion`,`community`,`caste`,`fathername`,`mothername`,
                                    `aadhaar`,`emis`,`oldschoolname`,`category`,`occupation`,`address`,`city`,`zip`,`email`,`mobile`,`altmobno`,`routeno`,`areaname`,`vanfees`,`vanflag`,
                                    `discount`,
                                    `image`                                      
								    )
				VALUES ('$academic','$admissionno','$firstname','$lastname','$gender','$dob','$doa','$batch','$class','$section','$bloodgroup',
                '$nationality','$religion','$community','$caste','$fathername','$mothername','$aadhaar','$emis','$oldschoolname','$category','$occupation',
                '$address','$city','$zip','$email','$mobile','$altmobno','$routeno','$areaname','$vanfees','$vanflag','$discount','$target_file')";

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


		
<!-- Modal Areaname-->
								<div class="modal fade custom-modal" id="customModalAreaname" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Areaname</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addareaname"  id="addareaname"  placeholder="Enter Areaname">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="addamount" id="addamount"  placeholder="Fees Amount">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitareaname" id="submitareaname" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	

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
                        <h1 class="main-title float-left">Student Profile </h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Student Profile</li>
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
                            <!--h3><i class="fa fa-user-plus bigfonts" aria-hidden="true" ></i>&nbsp;&nbsp;<small>You are currently adding student profile details<small></h3>
                            <!--h3 class="fa-hover col-md-12 col-sm-12">
                                 Purchase Item Master
                            </h3-->
                                <p class="text-danger"><?php echo $admnoFound;?></p> </h3>
                        </div>
						
                                         
                        
                        
                        <div class="card-body">
                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    
							<div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-warning">Personel Details&nbsp;</h5><br>
                               </div>
									
                                <div class="form-row">
                                    <div class="form-group col-md-7 ">
                                    <label for="inputState"><span class="">Academic</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic WHERE status='Y' order by id DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
												<a href="#custom-modal" data-target="#customModalAcademic" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Academic</a><br>
								
												
                                </div>
								
							
									
                                    <div class="form-group col-md-5">
                                        <label><span class="">Admission No.</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="admissionno" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label><span class="">First Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First Name" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><span class="">Last Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="lastname" placeholder="Initial"   autocomplete="off" />
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState"><span class="">Class/Course</span><span class="text-danger">*</span></label>
                                                <select required id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
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
												<a href="#custom-modal" data-target="#customModalClass" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Class/Course</a><br>
												
    
                                    </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Section</span></label>
                                                <select id="section" onchange="onlocode(this)"  class="form-control form-control-sm" name="section">
                                                    <option value="">-Open Section-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $section=$row['section'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$section.'" >'.$section.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
								</div>
                                
                                <div class="form-row">
                              
                                <div class="form-group col-md-4">
                                    <label><span class="">DOB</span><span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="dob"  value="<?php echo date("Y-m-d");?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><span class="">Date of Admission</span><span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="doa"  value="<?php echo date("Y-m-d");?>" />
                                    </div>

                                    <div class="form-group col-md-4 ">
                                    <label for="inputState"><span class="">Batch</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="batch" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic order by id desc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
												<a href="#custom-modal" data-target="#customModalAcademic" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>Add New Batch</a><br>
								
												
                                </div>
                                    </div>
                                    
                                    
								
								 <div class="form-row">
                                       <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Bloodgroup</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="bloodgroup" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <option value="">-Select Bloodgroup-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT bloodgroup FROM bloodgroup order by id desc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $bloodgroup=$row['bloodgroup'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$bloodgroup.'" >'.$bloodgroup.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
									
                                                <div class="form-group col-md-6">
                                        <label ><span class="">Gender</span><span class="text-danger">*</span></label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <option value="">-Select Gender-</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>   
                                    </div>
                                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label><span class="">Nationality</span><span class="text-danger"></span></label>
                                    <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="nationality" >
                                        <option value="Indian">Indian</option>
                                        <option value="NRI">NRI</option>
                                        <option value="Others">Others</option>
                                    </select>   
                                    </div>
                                <div class="form-group col-md-3">
                                    <label><span class="">Religion</span><span class="text-danger"></span></label>
                                        <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="religion" >
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Christian">Christian</option>
                                            <option value="Jain">Jain</option>
                                            <option value="Others">Others</option>
                                    </select>   
                                    </div>
                                        <div class="form-group col-md-3">
                                            <label><span class="">Community</span><span class="text-danger"></span></label>
                                        <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="community" >
                                        <option value="BC">BC</option>
                                        <option value="MBC">MBC</option>
                                        <option value="BCM">BCM</option>
                                            <option value="SC">SC</option>
                                            <option value="ST">ST</option>
                                            <option value="FC">FC</option>
                                            <option value="OC">OC</option>
                                            </select>
                                </div>
                                    <div class="form-group col-md-3">
                                        <label><span class="">Caste</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="caste" placeholder=""   autocomplete="off" />
                                    </div> 
                                </div>

                                <div class="form-row">
                                
                                    <h4 class="col-md-12 text-muted text-warning">Parents Details &nbsp;</h4>
                                </div>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">Father Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="fathername" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><span class="">Mother Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="mothername" placeholder=""   autocomplete="off" />
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
                                
                                    <h5 class="col-md-12 text-muted text-warning">AADHAR & EMIS Details &nbsp;</h5>
                                </div>
                            
                                
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label><span class="">Aadhaar#</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="aadhaar" placeholder=""  class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><span class="">Emis#</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="emis" placeholder=""   autocomplete="off" />
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <label><span class="">Previous School Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="oldschoolname" placeholder=""   autocomplete="off" />
                                    </div>                                    
                                </div>
                               <div class="form-row">
                                   <h5 class="col-md-12 text-muted text-warning">Contact Details &nbsp;</h5>
                                   
                                    <div class="form-group col-md-7">
                                        <label><span class="">Address</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="address" required placeholder="No,street..."  class="form-control" autocomplete="off" />
                                    </div>
                                    
                                    <div class="form-group col-md-5">
                                        <label><span class="">City</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="city" placeholder="City/Town/Village"   autocomplete="off" />
                                    </div>  
                                </div>
                                
                                 <div class="form-row">
                                   <div class="form-group col-md-3">
                                       <label><span class="">Postal Code</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="zip" placeholder=""   autocomplete="off" />                                 
                                    </div>
                                      <div class="form-group col-md-5">
                                          <label><span class="">Email</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="email" placeholder=""   autocomplete="off" />                                 
                                                                        </div>
                                     <div class="form-group col-md-4">
                                         <label><span class="">occupation</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="occupation" placeholder="parent's occupation"   autocomplete="off" />
                                     </div>
                                </div>
                               
                                <!--div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-warning">Transport Details&nbsp;</h5>
                                </div>
                                
                                 <div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Assign Transport&nbsp;&nbsp;</label>
                                        Yes <input type="radio" name="vanflag" value="Y" class=class="fa fa-check-square-o"  >	
                                       &nbsp;&nbsp; No <input type="radio" name="vanflag" value="N" class=class="fa fa-check-square-o" checked >	
                                    </div>
                                </div>
                            </div>
                                
                            
                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState"><span class="">Pickup Route</span><span class="text-danger"></span></label>
                                                <select  id="routeno" onchange="onlocode(this)"  class="form-control form-control-sm" name="routeno">
                                                    <option value="">-Select Route#-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT routeno FROM route");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $routeno=$row['routeno'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$routeno.'" >'.$routeno.'</option>';
                                                    }
                                                    ?>
                                                </select>
    
                                    </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Areaname</span></label>
                                                <select id="areaname" onchange="onlocode(this)" 
                                                        class="form-control form-control-sm" name="areaname">
                                                    <option value="">-Assign Area-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT areaname FROM areamaster");
                                                    while ($row = $sql->fetch_assoc()){	
                                                       // echo $areacode=$row['areacode'];
                                                        echo $areaname=$row['areaname'];
                                                        echo '<option  value="'.$areaname.'" >'.$areaname.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
								<a href="#custom-modal" data-target="#customModalAreaname" data-toggle="modal">
								<i class="fa fa-user-plus" aria-hidden="true"></i>New Areaname</a><br>
								
						
								
                                </div>
                                </div-->
                                
                                <!--div class="form-row">
                                   <div class="form-group col-md-3">
                                       <label><span class="text-secondary">Van Fees</span></label>
                                        <input type="text" class="form-control form-control-sm" name="vanfees" autocomplete="off" />                                 
                                    </div>
                                </div-->
                                
                                <!--div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Student Active Status?&nbsp;&nbsp;</label>
                                        Yes <input type="radio" name="vanflag" value="Y" class=class="fa fa-check-square-o" checked >	
                                       &nbsp;&nbsp; No <input type="radio" name="vanflag" value="N" class=class="fa fa-check-square-o"  >	
                                    </div>
                                </div>
                            </div-->
                                
                            <!--div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-warning">Discount Details&nbsp;</h5>
                                </div>
                                
                                 <div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Assign Discount &nbsp;&nbsp;</label>
                                        Yes <input type="radio" name="discount" value="Y" class=class="fa fa-check-square-o"  >	
                                       &nbsp;&nbsp; No <input type="radio" name="discount" value="N" class=class="fa fa-check-square-o" checked >	
                                    </div>
                                </div>
                            
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Category</span></label>
                                                <select id="section" onchange="onlocode(this)"  class="form-control form-control-sm" name="category">
                                                    <option value="">-Select Discount Category-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT id,category FROM category ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $category_id=$row['id'];
                                                        echo $category=$row['category'];
                                                        echo '<option onchange="'.$row['category_id'].'" value="'.$category_id.'" >'.$category.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
												</div>
                                </div-->
                                                
                                                
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                <i class="fa fa-folder-open bigfonts text-danger" aria-hidden="true"><b>Upload Student Photo</b></i></div></label> 
                                    
                                        <input type="file" name="image" id="fileinput" class="form-control text-warning" width="80" height="60">
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
	$('#submitacademic').click(function(){
		var academic = $('#addacademic').val();
		var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addAcademicModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  academic:academic,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#academic').append(new_option);
					 $('#customModalAcademic').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Academic,try another one');
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

