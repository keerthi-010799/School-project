<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
    //here getting result from the post array after submitting the form.
    $orgid ="";
    $prefix = "INST-";

    $instname 	 =	$_POST['instname'];	
    $instype  =	$_POST['instype'];    	
    $address  =	$_POST['address'];		
    $city 	 =	$_POST['city'];	
    $country  =	$_POST['country'];		
    $state  =	$_POST['state'];		
    $zip  =	$_POST['zip'];		
    $workphone 	 =	$_POST['workphone'];	
    $mobile 	 =	$_POST['mobile'];	
    $email 	 =	$_POST['email'];	
    $web 	 =	$_POST['web'];	
    $regno	 =	$_POST['regno'];	
    $regdon 	 =	$_POST['regdon']; 
    $signature 	 =	$_POST['signature'];
    $primaryflag 	 =	$_POST['primaryflag'];
    $image 	 =	$_POST['image'];
    $openingbalance 	 =	$_POST['openingbalance'];

    //Primaryflag for all correspeondance radio button implementation
    $field = isset($_POST['primaryflag']) ? $_POST['primaryflag'] : false;
    $dbFlag = $field ? 'Yes' : 'No';


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

    $sql="SELECT MAX(id) as latest_id FROM instprofile ORDER BY id DESC";
    if($result = mysqli_query($dbcon,$sql)){
        $row   = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            $maxid = $row['latest_id'];
            $maxid+=1;

            $orgid = $prefix.$maxid;
        }else{
            $maxid = 0;
            $maxid+=1;
            $orgid = $prefix.$maxid;
        }
    }	

    $insert_instprofile="INSERT INTO instprofile(orgid,instname,instype,address,city,state,country,zip,workphone,mobile,email,web,regno,regdon,signature,
    primaryflag,openingbalance,image) 
	VALUES('$orgid','$instname','$instype','$address','$city','$state','$country','$zip','$workphone','$mobile','$email','$web','$regno','$regdon','$signature','$primaryflag','$openingbalance','$target_file')";

    echo "$insert_instprofile";

    if(mysqli_query($dbcon,$insert_instprofile))
    {

        echo "<script>alert('Institute creation Successful ')</script>";
        header("location:listInstituteProfile.php");
    } else {  die('Error: ' . mysqli_error($dbcon));
    
        exit; //echo "<script>alert('User creation unsuccessful ')</script>";
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
                        <h1 class="main-title float-left">Institute Profile</h1>
                        <ol class="breadcrumb float-right">
                            <a  href="index.php"><li class="breadcrumb-item">Home</a></li>
                        <li class="breadcrumb-item active">Institute Profile</li>
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
                            </i>&nbsp;Add Institute Details<span class="text-muted"></span></div></h5>

                        <div class="text-muted font-light">Tell us a bit about your Institute.</div>

                        <!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
</i>Add Transport Master Details
</h3-->

                    </div>

                    <div class="card-body"> 

                        <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                           
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label >Institute Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="instname" placeholder="Full Name of the Institute" required class="form-control" autocomplete="off">
                                </div>
                            </div>

                            
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label >Institite Type<span class="text-danger">*</span></label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="instype" >
                                        <option value="">Open Institute Type</option>
                                        <option value="1">School</option>
                                        <option value="2">College</option>
                                    </select>
                                </div>
                            </div>


                            
                            
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <h4 class="col-md-12 text-muted">Institute Address Details &nbsp;</h4>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-11"> 
                                    <input type="text" placeholder="Street *" required name="address" class="form-control form-control-sm"> 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <input type="text" class="form-control form-control-sm" required name="city"  placeholder="City *">
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select required id="inputState" onchange="onlocode(this)"  class="form-control form-control-sm" name="state">
                                        <span class="text-muted">  <option value="">State/Union Territory *</option> </span>
                                        <?php 
                                        include("database/db_conection.php");//make connection here

                                        $sql = mysqli_query($dbcon, "SELECT code,description FROM state_lookups");
                                        while ($row = $sql->fetch_assoc()){	
                                            $code=$row['code'];
                                            $description=$row['description'];
                                            echo '<option  value="'.$code.'" >'.$description.'</option>';                                                      
                                        }
                                        ?>
                                    </select>
                                </div>	

                                <div class="form-group col-md-4">
                                    <select required id="inputState" onchange="onlocode(this)"  class="form-control form-control-sm" name="country">
                                        <span class="text-muted"> <option value="">Country *</option> </span>
                                        <?php 
                                        include("database/db_conection.php");//make connection here

                                        $sql = mysqli_query($dbcon, "SELECT code,description FROM country_lookups");
                                        while ($row = $sql->fetch_assoc()){	
                                            $code=$row['code'];
                                            $description=$row['description'];
                                            echo '<option  value="'.$code.'" >'.$description.'</option>';        
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control form-control-sm" required name="zip"  placeholder="Zip/Postal Code *">
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
                                    <input type="text" class="form-control form-control-sm" name="workphone"  placeholder="land line">
                                </div>

                                <div class="form-group col-md-3">
                                    <label> Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="mobile"  required placeholder="do not prefix 0">
                                </div>

                                <div class="form-group col-md-5">
                                    <label> Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm"  name="email"  required placeholder=" " autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-11">									
                                    <input type="text" class="form-control form-control-sm" name="web"  placeholder="Institute Website">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <h4 class="col-md-12 text-muted">Institute Registeration Details</h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Registered#</label>
                                    <input type="text" class="form-control form-control-sm"  name="regno" placeholder="Institute Registered No.">
                                </div>

                                <div class="form-group col-md-5">
                                    <label>Registred on <span class="text-danger"> </span></label>
                                    <input type="date" class="form-control form-control-sm" name="regdon"  >
                                </div>
                            </div>
							
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>Signature *</label>
                                    <input type="text" class="form-control form-control-sm"  name="signature" required placeholder=" intitute's short form" >
                                </div>
                            </div>

                            
							<!--div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>Pan#</label>
                                    <input type="text" class="form-control form-control-sm"  name="panno"  placeholder="">
                                </div>
								</div-->
								
								<!--div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Open Balance</label>
                                    <input type="text" class="form-control form-control-sm"  name="openbalance"  placeholder="">
                                </div-->

								 <!--div class="form-group col-md-5">
                                        <label for="inputState">As of Date</label>									
                                        <input type="date" class="form-control form-control-sm"  name="balasofdate" value="<?php echo date("Y-m-d");?>">		
                                    </div>
                                </div-->

                                <div class="form-row">
                                <div class="form-group col-md-9">
                                    <h4 class="col-md-12 text-muted"> Institutes's Opening Balance</h4>
                                </div>
                            </div>

								<div class="form-group row">
                                <div class="col-md-11"> 
                                    <input type="text" placeholder="Enter openingbalance" required name="openingbalance" class="form-control form-control-sm"> 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <h4 class="col-md-12 text-muted">Institute Logo</h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>
                                        <div class="fa-hover col-md-12 col-sm-12">
                                            &nbsp;<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload image like JPG,GIF,PNG..</div>
                                    </label> 
                                    &nbsp;&nbsp;<input type="file" name="image" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Make this profile as primary for all correspondence</label>
                                        Yes <input type="radio" name="primaryflag" value="1" class=class="fa fa-check-square-o" checked >	
                                        No <input type="radio" name="primaryflag" value="0" class=class="fa fa-check-square-o">	
                                    </div>
                                </div>
                            </div>

                            <!--div class="col-md-12 col-md-offset-12">
<div class="checkbox"><label>
<input type="hidden" name="primaryflag" value="0" class="ember-checkbox ember-view">
<input type="checkbox" name="primaryflag" value="1" class="ember-checkbox ember-view">Make this profile as primary for all correspondence</label>

</div>
</div>
</div-->		


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

