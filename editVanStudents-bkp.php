<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['stuProfEdit']))
{ 
    //var_dump($_POST);
    extract($_POST);
    
	$target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);

   // $title ="";

    if (!empty($_FILES["image"]["name"])){

        if($check !== false) {


            if (move_uploaded_file($_FILES['image']['tmp_name'], __DIR__.'/'.$target_dir.$_FILES['image']['name'])) {
                //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                
    $updateStudentProfile = "UPDATE `studentprofile` SET `academic`= '".$academic."',	
                                                        `admissionno`= '".$admissionno."',
                                                            `firstname`= '".$firstname."',
                                                            `lastname`= '".$lastname."',
                                                            `gender`= '".$gender."',
                                                            `dob`= '".$dob."',
                                                            `doa`= '".$doa."',
                                                            `class`= '".$class."',
                                                            `section`= '".$section."',    
                                                            `bloodgroup`= '".$bloodgroup."',
                                                            `nationality`= '".$nationality."',
                                                            `religion`= '".$religion."',
                                                            `community`= '".$community."',
                                                            `caste`= '".$caste."',
                                                            `fathername`= '".$fathername."',
                                                            `mothername`= '".$mothername."',                      
                                                            `aadhaar`= '".$aadhaar."',
                                                            `emis`= '".$emis."',
															 `category`= '".$category."',
                                                            `occupation`= '".$occupation."',
                                                            `address`= '".$address."',
                                                            `city`= '".$city."',
                                                            `zip`= '".$zip."',
                                                            `email`= '".$email."',
                                                            `mobile`= '".$mobile."',
                                                            `altmobno`= '".$altmobno."',
                                                            `vanflag`= '".$vanflag."',
                                                            `routeno`= '".$routeno."',
                                                            `areaname`= '".$areaname."',
                                                            `vanfees`= '".$vanfees."',
                                                            `status`='".$status."',
                                                            `image`  = '".$target_file."'	
                                        WHERE `id` =".$stuId;
                } else {
                echo "Sorry, there was an error uploading your image file.".$updateStudentProfile;
            }

        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }else{
        
        $updateStudentProfile = "UPDATE `studentprofile` SET `academic`= '".$academic."',	
                                                        `admissionno`= '".$admissionno."',
                                                            `firstname`= '".$firstname."',
                                                            `lastname`= '".$lastname."',
                                                            `gender`= '".$gender."',
                                                            `dob`= '".$dob."',
                                                            `doa`= '".$doa."',
                                                            `class`= '".$class."',
                                                            `section`= '".$section."',    
                                                            `bloodgroup`= '".$bloodgroup."',
                                                            `nationality`= '".$nationality."',
                                                            `religion`= '".$religion."',
                                                            `community`= '".$community."',
                                                            `caste`= '".$caste."',
                                                            `fathername`= '".$fathername."',
                                                            `mothername`= '".$mothername."',                      
                                                            `aadhaar`= '".$aadhaar."',
                                                            `emis`= '".$emis."',
															 `category`= '".$category."',
                                                            `occupation`= '".$occupation."',
                                                            `address`= '".$address."',
                                                            `city`= '".$city."',
                                                            `zip`= '".$zip."',
                                                            `email`= '".$email."',
                                                            `mobile`= '".$mobile."',
                                                            `altmobno`= '".$altmobno."',
                                                            `vanflag`= '".$vanflag."',
                                                            `routeno`= '".$routeno."',
                                                            `areaname`= '".$areaname."',
                                                            `vanfees`= '".$vanfees."',
                                                            `status`='".$status."'
                                        WHERE `id` =".$stuId;
     //echo $updateStudentProfile;
    }
	if(mysqli_query($dbcon,$updateStudentProfile))
    {
        
           // $image=$_POST['image'];//same

    //$image = file_get_contents($image);

   
       // echo "<script>alert('Profile Successfully updated')</script>";
        header("location:listStudentProfile.php");
    } else { echo die('Error: ' . mysqli_error($dbcon).$updateStudentProfile );
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
                                    <h1 class="main-title float-left">Edit Student Profile </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Student Profile</li>
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
								<h5><div class="text-muted font-light">
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Student Profile<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editStudentProfile.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT academic,admissionno,firstname,lastname,gender,dob,doa,class,section,
                                            bloodgroup,nationality,religion,community,caste,fathername,mothername,
                                            aadhaar,emis,category,occupation,address,city,zip,email,mobile,altmobno,vanflag,routeno,areaname,vanfees,status,
                                            image FROM studentprofile WHERE id=$id");
                                            while($res = mysqli_fetch_array($result))
                                            {
												$academic =	$res['academic'];
												$admissionno = $res['admissionno'];
												$firstname 	 =	$res['firstname'];
												$lastname  =	$res['lastname'];
												$gender  =	$res['gender'];		
												$dob	 =	$res['dob'];	
												$doa  =	$res['doa'];		
												$class  =	$res['class'];		
												$section  =	$res['section'];		
												$bloodgroup 	 =	$res['bloodgroup'];	
												$nationality 	 =	$res['nationality'];	
												$religion 	 =	$res['religion'];	
												$community 	 =	$res['community'];	
												$caste 	 =	$res['caste'];	
												$fathername = $res['fathername'];
												$mothername = $res['mothername'];
                                                $aadhaar 	 =	$res['aadhaar'];	
												$emis 	 =	$res['emis'];
												$category 	 =	$res['category'];
												$occupation 	 =	$res['occupation'];
                                                $address 	 =	$res['address'];	
												$city 	 =	$res['city'];
                                                $zip 	 =	$res['zip'];	
												$email 	 =	$res['email'];
												$mobile 	 =	$res['mobile'];
                                                $altmobno 	 =	$res['altmobno'];
                                                $vanflag 	 =	$res['vanflag'];
                                                $routeno 	 =	$res['routeno'];
                                                $areaname 	 =	$res['areaname'];
                                                $vanfees 	 =	$res['vanfees'];
												$status 	 =	$res['status'];
												$image 	 =	$res['image'];

                                            }
                                        }

                                        ?>	
                                    
									<div class="form-row">
                                    <div class="form-group col-md-7">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                                <select  id="academic" onchange="onlocode(this)"  class="form-control form-control-sm" name="academic">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic_get=$row['academic'];
                                                        if($academic_get==$academic){
                                                            echo '<option value="'.$academic_get.'" selected>'.$academic_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$academic_get.'" >'.$academic_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>

                                    <div class="form-group col-md-5">
                                        <label>Admission No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="admissionno"   class="form-control" autocomplete="off" value="<?php echo $admissionno;?>" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="firstname" class="form-control" value="<?php echo $firstname;?>" />        
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Last Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="lastname" value="<?php echo $lastname;?>" /> 
                                    </div>                                    
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label >Gender<span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control form-control-sm">
                                                    <option <?php if ($gender == "M" ) echo 'selected="selected"' ; ?> value="M">Male</option>
                                                    <option <?php if ($gender == "F" ) echo 'selected="selected"' ; ?> value="F">Female</option>
                                                </select>   
                                    </div>
                                <div class="form-group col-md-4">
                                        <label>DOB<span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="dob"  value="<?php echo $dob;?>" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Date of Admission<span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="doa"  value="<?php echo $doa;?>" />
                                    </div>
                                    </div>
                                    
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inputState">Class/Course<span class="text-danger">*</span></label>
                                                <select id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
                                                    <?php 
                                                    include("database/db_conection.php");//make db connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class_get=$row['class'];
                                                        if($class_get==$class){
                                                            echo '<option value="'.$class_get.'" selected>'.$class_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$class_get.'" >'.$class_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        
                                <div class="form-group col-md-6">
                                        <label for="inputState">Section</label>
                                                <select id="section" onchange="onlocode(this)"  class="form-control form-control-sm" name="section">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $sec_get=$row['section'];
                                                        if($sec_get==$class){
                                                            echo '<option value="'.$sec_get.'" selected>'.$sec_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$sec_get.'" >'.$sec_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>

                                                </select>
                                </div>
								</div>
								 
                                <div class="form-row">
									<div class="form-group col-md-6">
                                       <label for="inputState">Bloodgroup<span class="text-danger">*</span></label>
                                                <select id="bloodgroup" onchange="onlocode(this)"  class="form-control form-control-sm" name="bloodgroup">
                                                    <?php 
                                                    include("database/db_conection.php");//make db connection here

                                                    $sql = mysqli_query($dbcon, "SELECT bloodgroup FROM bloodgroup");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $bgrp_get=$row['bloodgroup'];
                                                        if($bgrp_get==$bloodgroup){
                                                            echo '<option value="'.$bgrp_get.'" selected>'.$bgrp_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$bgrp_get.'" >'.$bgrp_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
									
                                </div>
								<div class="form-group col-md-6">
                                       <label for="inputState">Category<span class="text-danger">*</span></label>
                                                <select id="category" onchange="onlocode(this)"  class="form-control form-control-sm" name="category">
                                                    <?php 
                                                    include("database/db_conection.php");//make db connection here

                                                    $sql = mysqli_query($dbcon, "SELECT category FROM category");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $cat_get=$row['category'];
                                                        if($cat_get==$category){
                                                            echo '<option value="'.$cat_get.'" selected>'.$cat_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$cat_get.'" >'.$cat_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
								</div>
								
                                
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label >Nationality<span class="text-danger"></span></label>
                                    <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="nationality" >
                                        <option <?php if ($nationality == "1" ) echo 'selected="selected"' ; ?> value="1">Indian</option>
                                        <option <?php if ($nationality == "2" ) echo 'selected="selected"' ; ?> value="2">NRI</option>
                                        <option <?php if ($nationality == "3" ) echo 'selected="selected"' ; ?> value="2">Others</option>
                                        </select>   
                                    </div>
                                <div class="form-group col-md-3">
                                        <label>Religion<span class="text-danger"></span></label>
                                        <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="religion" >
                                            <option <?php if ($religion == "Hindu" ) echo 'selected="selected"' ; ?> value="Hindu">Hindu</option>
                                            <option <?php if ($religion == "Muslim" ) echo 'selected="selected"' ; ?> value="Muslim">Muslim</option>
                                        <option <?php if ($religion == "Christian" ) echo 'selected="selected"' ; ?> value="3">Christian</option>
                                        <option <?php if ($religion == "Jain" ) echo 'selected="selected"' ; ?> value="Jain">Jain</option>
                                        <option <?php if ($religion == "Others" ) echo 'selected="selected"' ; ?> value="Others">Others</option>
                                    </select>   
                                    </div>
                                        <div class="form-group col-md-3">
                                        <label>Community<span class="text-danger"></span></label>
                                        <select  id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="community" >
                                            <option <?php if ($community == "BC" ) echo 'selected="selected"' ; ?> value="BC">BC</option>
                                            <option <?php if ($community == "MBC" ) echo 'selected="selected"' ; ?> value="MBC">MBC</option>
                                            <option <?php if ($community == "BCM" ) echo 'selected="selected"' ; ?> value="BCM">BCM</option>
                                            <option <?php if ($community == "SC" ) echo 'selected="selected"' ; ?> value="SC">SC</option>
                                            <option <?php if ($community == "ST" ) echo 'selected="selected"' ; ?> value="ST">ST</option>
                                            <option <?php if ($community == "FC" ) echo 'selected="selected"' ; ?> value="FC">FC</option>
                                            <option <?php if ($community == "OC" ) echo 'selected="selected"' ; ?> value="OC">OC</option>
                                        </select>
                                </div>
                                    <div class="form-group col-md-3">
                                        <label>Caste<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="caste" value="<?php echo $caste;?>" />
                                    </div> 
                                </div>

                                <div class="form-row">
                                
                                    <h4 class="col-md-12 text-muted">Parents Contact Details &nbsp;</h4>
                                </div>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Father Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="fathername" placeholder=""  class="form-control" value="<?php echo $fathername;?>" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mother Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="mothername" value="<?php echo $mothername;?>" />
                                    </div>                                     
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Mobile<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="mobile"  class="form-control" value="<?php echo $mobile;?>" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Alternate Mobile<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="altmobno" value="<?php echo $altmobno;?>" />
                                    </div>                                     
                                </div>
                                
                                <div class="form-row">
                                
                                    <h5 class="col-md-12 text-muted">AADHAR & EMIS Details &nbsp;</h5>
                                </div>
                            
                                
                                 <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>Aadhaar#<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="aadhaar" value="<?php echo $aadhaar;?>" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Emis#<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="emis" value="<?php echo $emis;?>" />
                                    </div>                                    
                                </div>
                               <div class="form-row">
                                   <h4 class="col-md-12 text-muted">Address Details &nbsp;</h4>
                                   
                                    <div class="form-group col-md-7">
                                        <label>Address<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="address" value="<?php echo $address;?>" />
                                    </div>
                                    
                                    <div class="form-group col-md-5">
                                        <label>City<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="city" value="<?php echo $city;?>" />
                                    </div>  
                                </div>
                                
                                 <div class="form-row">
                                   <div class="form-group col-md-3">
                                        <label>Postal Code<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="zip" value="<?php echo $zip;?>" />                                
                                    </div>
                                      <div class="form-group col-md-5">
                                        <label>Email<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="email" value="<?php echo $email;?>" />
                                        </div>
                                     <div class="form-group col-md-4">
                                        <label>occupation<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="occupation" value="<?php echo $occupation;?>" />
                                     </div>
                                </div>
                                    
                                    
									
                                    <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Edit Van Details&nbsp;</h5>
                                </div>
                                    
                                     
                                    
                                    <div class="form-row">
								<div class="form-group col-md-12">
								<div class="checkbox"><label> Student's Current Van Status</label>&nbsp;&nbsp;
									Continue Van <input type="radio" name="vanflag" value="Y"  <?php echo ($vanflag=='Y')?"checked":"";?> />	
									&nbsp;&nbsp;Discontinue Van <input type="radio" name="vanflag" value="N"  <?php echo ($vanflag=='N')?"checked":"";?> />
								</div>
								 </div>
								 </div>
                                    
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Route#<span class="text-danger"></span></label>
                                                <select  id="academic" onchange="onlocode(this)"  class="form-control form-control-sm" name="routeno">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT routeno FROM route");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $route_get=$row['routeno'];
                                                        if($route_get==$routeno){
                                                            echo '<option value="'.$route_get.'" selected>'.$route_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$route_get.'" >'.$route_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                        
                                    <div class="form-group col-md-8">
                                    <label for="inputState">Areaname<span class="text-danger"></span></label>
                                                <select  id="areaname" onchange="onlocode(this)" 
                                                        class="form-control form-control-sm" name="areaname">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT areaname FROM areamaster");
                                                    while ($row = $sql->fetch_assoc()){	
                                                       // echo $area_get=$row['areacode'];
                                                        echo $areaname_get=$row['areaname'];
                                                        if($areaname_get==$areaname){
                                                            echo '<option value="'.$areaname_get.'" selected>'.$areaname_get.'</option>';
                                                        } else {
                                                           // echo '<option value="'.$area_get.'" >'value="'.$area_get.'" //>'.$areaname_get.'</option>';
                                                            
                                                            echo '<option  value="'.$areaname_get.'" >'.$areaname_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                    </div> 
                                    
                                    <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label><span class="text-secondary">Van Fees</span></label>
                                        <input type="text" class="form-control form-control-sm" name="vanfees"  readonly value="<?php echo $vanfees;?>" />                               
                                    </div>
                                </div>
                                    
                                    <!--div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control form-control-sm" required>
                                                    <option <?php if ($status == "Y" ) echo 'selected="selected"' ; ?> value="Y">Active</option>
                                                    <option <?php if ($status == "N" ) echo 'selected="selected"' ; ?> value="N">Inactive</option>
                                                    
                                                </select>
                                            </div>
											</div-->
                                    
                                    
                                    <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Edit Student Status Active/Inactive&nbsp;</h5>
                                </div>
                                    
                                    <div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>Student's Current Status</label>&nbsp;&nbsp;
									Active <input type="radio" name="status" value="Y"  <?php echo ($status=='Y')?"checked":"";?> />	
				&nbsp;&nbsp;Inactive <input type="radio" name="status" value="N" <?php echo ($status=='N')?"checked":"";?> />
								</div>
								 </div>
								 </div>
                                    <br>
                                    
                                    <div class="form-row">
                                   <div class="form-group col-md-12">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Change Picture</div>
                                        </label> 
                                        <img src="<?php echo $image;?>" width="75px" class="rounded float-left" alt="...">

                                        &nbsp;&nbsp;<input type="file" name="image" class="form-control form-control-sm">
                                    </div>
                                </div>
                                    							
								    <div class="form-row">
                                    <div class="form-group text-right m-b-10">
                                        <input type="hidden" name="stuId" value="<?=$_GET['id']?>">
                                        &nbsp;<button class="btn btn-primary" name="stuProfEdit" type="submit">
                                        Update
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
        </div>
</div>
</div>
								
								
								
								
		      
			<!-- END container-fluid -->

		
		<!-- END content -->


    
	<!-- END content-page -->

    
	<!--?php include('footer.php'); ?-->

<!-- END main -->


</body>
</html>