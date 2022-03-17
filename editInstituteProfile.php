<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['compProfEdit']))
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

                $updateComprofile = "UPDATE `instprofile` SET  
												 `instname`  = '".$instname."',
												 `instype`  = '".$instype."',
												 `address`    = '".$address."',
												 `city`     = '".$city."',
												 `state`    = '".$state."',
												 `country`  = '".$country."',
												 `zip`      = '".$zip."',
												 `workphone`  = '".$workphone."',
												 `mobile`  = '".$mobile."',
												 `web`  = '".$web."',
												 `regno`  = '".$regno."',
												 `regdon`  = '".$regdon."',
												 `primaryflag`  = '".$primaryflag."',
												 `image`  = '".$target_file."'												
								WHERE `id` =".$compId;

            } else {
                echo "Sorry, there was an error uploading your image file.".$updateComprofile;
            }

        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }else{

        $updateComprofile = "UPDATE `instprofile` SET `instname`  = '".$instname."',
												 `instype`  = '".$instype."',
												 `address`  = '".$address."',
												 `city`  = '".$city."',
												 `state`  = '".$state."',
												 `country`  = '".$country."',
												 `zip`  = '".$zip."',
												 `workphone`  = '".$workphone."',
												 `mobile`  = '".$mobile."',
												 `web`  = '".$web."',
												 `regno`  = '".$regno."',
												 `regdon`  = '".$regdon."',
												 `primaryflag`  = '".$primaryflag."'												
								WHERE `id` =".$compId;
    }





			 
				// echo $updateComprofile;
    
	if(mysqli_query($dbcon,$updateComprofile))
    {
        
           // $image=$_POST['image'];//same

    //$image = file_get_contents($image);

   
       // echo "<script>alert('Profile Successfully updated')</script>";
        header("location:listInstituteProfile.php");
    } else { echo die('Error: ' . mysqli_error($dbcon).$updateComprofile );
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
                                    <h1 class="main-title float-left">Edit Institute Profile </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Institute Profile</li>
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
								<h5><div class="text-muted font-light"><i class="fa fa-bank smallfonts" aria-hidden="true">
								</i>&nbsp;Edit Institute Profile<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editInstituteProfile.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT orgid,instname,instype,address,city,state,country,zip,workphone,mobile,email,web,regno,regdon,signature,primaryflag,image
											FROM instprofile WHERE id=$id");
                                            while($res = mysqli_fetch_array($result))
                                            {
                                                $orgid = $res['orgid'];
												$instname 	 =	$res['instname'];	
												$instype  =	$res['instype'];	
												$address  =	$res['address'];		
												$city 	 =	$res['city'];	
												$country  =	$res['country'];		
												$state  =	$res['state'];		
												$zip  =	$res['zip'];		
												$workphone 	 =	$res['workphone'];	
												$mobile 	 =	$res['mobile'];	
												$email 	 =	$res['email'];	
												$web 	 =	$res['web'];	
												$regno	 =	$res['regno'];	
												$regdon 	 =	$res['regdon'];	
												$signature 	 =	$res['signature'];	
												$primaryflag 	 =	$res['primaryflag'];
												$image 	 =	$res['image'];

                                            }
                                        }

                                        ?>	
										    <div class="form-row">
									<div class="form-group col-md-3">
									  <label for="inputZip">Organization ID</label>
									  <input type="text" class="form-control form-control-sm"  name="orgid"  readonly  value="<?php echo $orgid;?>" />
									</div>
									</div>
																
								    <div class="form-row">
                                       <div class="form-group col-md-8">
									  <label >Institue Name</span></label>
									  <input type="text" class="form-control form-control-sm" name="instname" value="<?php echo $instname;?>" />
									</div>
									</div>
									
									 						
								    <div class="form-row">
									<div class="form-group col-md-11">
									  <label >Institute Type</label>
									 <select id="inputState" class="form-control form-control-sm" name="instype">
									 <span class="text-muted"> <option selected>Select Institute Type</option></span>
										 <option <?php if ($instype == "1" ) echo 'selected="selected"' ; ?> value="1">School</option>
										<option <?php if ($instype == "2" ) echo 'selected="selected"' ; ?> value="2">College</option>
									</select>
									</div>
									</div>
									
									
										
										<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Institute Address &nbsp;</h4>
									  </div>
									</div>
									
									<div class="form-group row">
									<div class="col-md-11"> 
									<input type="text" placeholder="Street *" name="address" class="form-control ember-text-field ember-view" value="<?php echo $address;?>" /> 
									</div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-11">
									  <input type="text" class="form-control form-control-sm" name="city"  value="<?php echo $city;?>" />
									</div>
									</div>
									
								
										<div class="form-row">
									<div class="form-group col-md-4">									 
                                                <select id="inputstate" onchange="onlocode(this)" class="form-control form-control-sm" name="state">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT code,description FROM state_lookups");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $state_get=$row['code'];
                                                        echo $state_desc=$row['description'];
                                                         if($state_get==$state){
                                                            echo '<option value="'.$state_get.'" selected>'.$state_desc.'</option>';

                                                        }else{
                                                            echo '<option value="'.$state_get.'" >'.$state_desc.'</option>';

                                                        }
													}
													?>
                                                 </select>	
									
									</div>
									<div class="form-group col-md-4">
									          <select id="inputstate" onchange="onlocode(this)" class="form-control form-control-sm" name="country">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT code,description FROM country_lookups");
                                                    while ($row = $sql->fetch_assoc()){	
                                                         $country_get=$row['code'];
                                                         $country_desc=$row['description'];
                                                         if($country_get==$country){
                                                            echo '<option value="'.$country_get.'" selected>'.$country_desc.'</option>';

                                                        }else{
                                                            echo '<option value="'.$country_get.'" >'.$country_desc.'</option>';

                                                        }
													}
													?>
                                                 </select>	
									
									</div>

										
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
									  <input type="text" class="form-control form-control-sm" name="workphone"  value="<?php echo $workphone;?>" />
									</div>
									
									<div class="form-group col-md-3">
									<label> Mobile <span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" name="mobile"  value="<?php echo $mobile;?>" />
									</div>
									
									<div class="form-group col-md-5">
									<label> Email</label>
									  <input type="text" class="form-control form-control-sm" name="email"  value="<?php echo $email;?>" />
									</div>
									</div>
									
									<div class="form-row">
									<div class="form-group col-md-11">	
									<label> Website</label>										
									  <input type="text" class="form-control form-control-sm" name="web"  value="<?php echo $web;?>" />
									</div>
									</div>
									
									
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Tax Details</h4>
									  </div>
									</div>
									
									<div class="form-row">
                                <div class="form-group col-md-9">
                                    <h4 class="col-md-12 text-muted">Edit Institute Registeration Details</h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Registered#</label>
                                    <input type="text" class="form-control form-control-sm"  name="regno" value="<?php echo $regno;?>" />
                                </div>

                                <div class="form-group col-md-5">
                                    <label>Registred on <span class="text-danger"> </span></label>
                                    <input type="date" class="form-control form-control-sm" name="regdon" value="<?php echo $regdon;?>" /> 
                                </div>
                            </div>
							
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>Signature *</label>
                                    <input type="text" class="form-control form-control-sm"  name="signature" value="<?php echo $signature;?>" />
                                </div>
                            </div>

                            
							
									<div class="form-row">
									<div class="form-group col-md-9">
									  <h4 class="col-md-12 text-muted">Edit Institute Logo</h4>
									  </div>
									</div>
									
									   <div class="form-row">
                                   <div class="form-group col-md-11">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Company Logo</div>
                                        </label> 
                                        <img src="<?php echo $image;?>" width="75px" class="rounded float-left" alt="...">

                                        &nbsp;&nbsp;<input type="file" name="profileimage" class="form-control form-control-sm">
                                    </div>
                                </div>
								
								<div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>Make this profile as primary for all correspondence</label>
									Yes <input type="radio" name="primaryflag" value="1"  <?php echo ($primaryflag==1)?"checked":"";?> />	
									No <input type="radio" name="primaryflag" value="0"  <?php echo ($primaryflag==0)?"checked":"";?> />
								</div>
								 </div>
								 </div>
																
								    <div class="form-row">
                                    <div class="form-group text-right m-b-10">
									<input type="hidden" name="compId" value="<?=$_GET['id']?>" />
                                      <button type="submit" name="compProfEdit" value="compProfEdit" class="btn btn-primary">Update</button>
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
		Copyright@<a target="_blank" href="#">Dhiraj Agro Products Pvt. Ltd.,</a>
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

</body>
</html>