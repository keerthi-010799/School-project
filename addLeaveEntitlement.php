<?php
include("database/db_conection.php");//make connection here
$empAssignedFound = '';
$setDays='';
$cat='';
$fgender = '';
$leavetype = '';

if(isset($_POST['submit']))
{
//here getting result from the post array after submitting the form.

$empName =$_POST['empName'];

$year 	 =	$_POST['year'];
$empType 	 =	$_POST['empType'];
$leaveType 	 =	$_POST['leaveType'];



$designation 	 =	$_POST['designation'];
$deptName 	 =	$_POST['deptName'];
$location 	 =	$_POST['location'];
$gender 	 =	$_POST['gender'];
$maritalStatus 	 =	$_POST['maritalStatus'];
$setDays 	 =	$_POST['setDays'];


$createdon 	 =	$_POST['createdon'];
$createdby 	 =	$_POST['createdby'];

 //$primaryflag 	 =	$_POST['primaryflag'];
  //  $image 	 =	$_POST['image'];

    //flag for all correspeondance radio button implementation for assigning entitlements
 //   $field = isset($_POST['newEmpEntitle']) ? $_POST['newEmpEntitle'] : false;
  //  $dbFlag = $field ? 'Yes' : 'No';
	
	//$field = isset($_POST['existEmpEntitle']) ? $_POST['existEmpEntitle'] : false;
   // $dbFlag = $field ? 'Yes' : 'No';

	//$checkLeaveTypeQuery="SELECT leaveType,empName FROM entitlement WHERE leaveType='$leaveType' AND empName = '$empName' ";
	//$run_query=mysqli_query($dbcon,$checkLeaveTypeQuery);
	//if(mysqli_num_rows($run_query)>0)
	//{
	//	$empAssignedFound = "Leave Type: '$leaveType' for the employee $empName is already been Entitled, Please try another one!";
	//	echo $empAssignedFound;
	//	exit;
	//} else {
		
		$sql = "SELECT leaveType,empName FROM entitlement WHERE leaveType='$leaveType' AND empName = '$empName'";
  	$results = mysqli_query($dbcon, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	 $empAssignedFound = "Leave Type: '$leaveType' for the employee $empName is already been Entitled, Please try another one!";
  	//  exit();
  	}else{
   foreach($empName as $names)
	{	
		
    $insertEntitlement="INSERT INTO entitlement(empName,
													year,														
													empType,																									
													designation,
													deptName,
													location,
													gender,
													maritalStatus,
													leaveType,
													setDays,													
													createdon,
													createdby) 
											VALUES('$names',
											      '$year',											
											'$empType',											
											'$designation',
											'$deptName',
											'$location',
											'$gender',
											'$maritalStatus',
											'$leaveType',
											'$setDays',											
											'$createdon',
											'$createdby')";
	
	//echo "$insertEntitlement";
	if(mysqli_query($dbcon,$insertEntitlement))
	{
   
		echo "<script>alert('Leave Policy created Successfully ')</script>";
		header("location:listLeaveEntitlement.php");
    } else { die('Error: ' . mysqli_error($dbcon));
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
	
}
}
	}


?>

		<!-- BEGIN CSS for this page -->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
		<!-- END CSS for this page -->

<?php include('header.php');?>
	<!-- End Sidebar -->

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Leave Entitlement</h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active"><a href="leaveNavBar.php">Back to Menu Bar</li></a>
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
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								<h5><div class="text-muted font-light"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>&nbsp;Add New Entitlement<span class="text-muted"></span></div></h5>
								
								<!--div class="text-muted font-light">Tell us a bit about yourself.</div-->
								<p class="text-danger"><?php echo $empAssignedFound;?></p>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
								
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
								
								 <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="datepicker1">Date</label><span class="text-danger">*</span>
                                            <!--input type="date" class="form-control" name="date" value="<?php echo date("d/m/Y") ?>"/-->
                                            <input type="date" class="form-control form-control-sm"  name="createdon" value="<?php echo date("Y-m-d");?>">									
                                        </div>
                                    </div>
									
								<div class="form-row">
									  <div class="form-group col-md-6">
                                                <label for="year">Select Year<span class="text-danger">*</span></label>
                                                <select required id="year"  required class="form-control select2" name="year">
												<!--option value="">-Select Year- </option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic order by id asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $year=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$year.'" >'.$year.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
											</div>		
	
																				
																
								    <div class="form-row">
									  <div class="form-group col-md-6">
                                                <label for="example3">Employee Type<span class="text-danger">*</span></label>
                                                <select required id="example3"  required class="form-control select2" name="empType">
												<!--option value="">--Select Employee Type--</option-->
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
									   <label for="example4">Designation</label>
                                                <select required id="example4" class="form-control select2" name="designation">
                                                  
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT designation FROM designation order by id ASC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $desig=$row['designation'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$desig.'" >'.$desig.'</option>';
                                                    }
                                                    ?>
                                                </select>	
									</div>		
								</div>									
                                          
										
											
											
						
								<div class="form-row">
									<div class="form-group col-md-6">
                                     <label for="example8">
												 Marital Status 
												</label>
                                    <select name="maritalStatus" id="example8"class="form-control select2" required>
                                       
										<option  value="1">All</option>
                                        <option  value="2">Single</option>
                                        <option  value="3">Married</option>
										<option  value="4">widowed</option>
                                    </select>
                                </div>
								</div>
										
											
									<!--div class="form-row">											
									  <div class="form-group col-md-6">
									 <label for="inputState">Gender<span class="text-danger"></span></label>
                                         <select id="referance_id" onchange="ongender(this);" class="form-control form-control select2"  name="gender" >
                                             <option value="">-Select Gender -</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT gender from leavepolicies");
                                                   while ($row = $sql->fetch_assoc()){	
                                                        echo $refid_get=$row['gender'];
                                                        if($refid_get==$_GET['referance_id']){
                                                                echo '<option value="'.$refid_get.'"  selected>'.$refid_get.'</option>';  
                                                        }else{
                                                            echo '<option value="'.$refid_get.'" >'.$refid_get.'</option>';      
                                                        }
													  }
                                                    ?>
                                                </select>
                                                <script>
                                                    function ongender(x) 
                                                    {    
                                                        var referance_id=x.value;
                                                        window.location.href = 'addLeaveEntitlement.php?referance_id='+referance_id;
                                                    }
                                                </script>									
											</div>
									
									
									  </div-->

									  
									  		<!--div class="form-row">											
											<div class="form-group col-md-6">
											 <label for="referance_id">Leave Policies<span class="text-danger">*</span></label>
											<?php 
                                                    include("database/db_conection.php");//make connection here
													$ref_id = $_GET['referance_id'];
													$query2 = "SELECT leaveType FROM entitlement WHERE empName=?";
													if($stmt=$dbcon->prepare($query2)){
														$stmt -> bind_param('s',$ref_id);
														$stmt -> execute();
														$r_set = $stmt-> get_result();
														
														echo "<select id=ename  name='leaveType' required class='form-control select2' >";
													
													while($row=$r_set->fetch_assoc()){
														 echo $leavetype=$row['leaveType'];
														//echo "<option value=$row[ename] > $row[ename] </option>";
														 echo '<option onchange="'.$row[''].'" value="'.$leavetype.'" >'.$leavetype.'</option>';
													}
													echo "</select>";
													} else {
														echo $dbcon->error;
													}
													?>
												
									 </div>
									  </div-->
									  
									  <!--div class="form-row">											
									  <div class="form-group col-md-6">
									 <label for="inputState">Employee<span class="text-danger"></span></label>
                                         <select id="referance_id" onchange="onleavepolicy(this);" class="form-control form-control select2"  name="empName" >
                                             <option value="">-Select Gender -</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT empName from entitlement");
                                                   while ($row = $sql->fetch_assoc()){	
                                                        echo $refid_get=$row['empName'];
                                                        if($refid_get==$_GET['referance_id']){
                                                                echo '<option value="'.$refid_get.'"  selected>'.$refid_get.'</option>';  
                                                        }else{
                                                            echo '<option value="'.$refid_get.'" >'.$refid_get.'</option>';      
                                                        }
													  }
                                                    ?>
                                                </select>
                                                <script>
                                                    function onleavepolicy(x) 
                                                    {    
                                                        var referance_id=x.value;
                                                        window.location.href = 'addLeaveRequest.php?referance_id='+referance_id;
                                                    }
                                                </script>									
											</div>
									
									
									  </div-->

									  
									  		<!--div class="form-row">											
											<div class="form-group col-md-6">
											 <label for="ename">Assign Employee(s)<span class="text-danger">*</span></label>
											<?php 
                                                    include("database/db_conection.php");//make connection here
													$ref_id = $_GET['referance_id'];
													$query2 = "SELECT id,concat(firstname,' ',lastname) as ename FROM employees WHERE gender=?";
													if($stmt=$dbcon->prepare($query2)){
														$stmt -> bind_param('s',$ref_id);
														$stmt -> execute();
														$r_set = $stmt-> get_result();
														
														echo "<select id=ename  name='empName[]' required class='form-control select2' multiple>";
													
													while($row=$r_set->fetch_assoc()){
														 echo $ename=$row['ename'];
														//echo "<option value=$row[ename] > $row[ename] </option>";
														 echo '<option onchange="'.$row[''].'" value="'.$ename.'" >'.$ename.'</option>';
													}
													echo "</select>";
													} else {
														echo $dbcon->error;
													}
													?>
												
									 </div>
									  </div-->
									  
											<div class="row">										
											<div class="form-group col-md-6">										
											<label for="inputState">Leave Policies<span class="text-danger">*</span></label>
											<select id="referance_id" onchange="onleavetype(this);" class="form-control form-control select2"  name="leaveType" required >
                                             <option value="">-Select Leave Policy -</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT leaveType FROM leavepolicies WHERE status='Y'");
                                                   while ($row = $sql->fetch_assoc()){	
                                                        echo $refid_get=$row['leaveType'];
                                                        if($refid_get==$_GET['referance_id']){
                                                                echo '<option value="'.$refid_get.'"  selected>'.$refid_get.'</option>';  
                                                        }else{
                                                            echo '<option value="'.$refid_get.'" >'.$refid_get.'</option>';      
                                                        }
													  }
                                                    ?>
                                                </select>
												<!--?php
                                            $sql = mysqli_query($dbcon,"SELECT * FROM `payment_voucher_request` WHERE status = '0'");
                                            while ($row = $sql->fetch_assoc()){	
                                                $acctcode=$row['referance_id'];
                                                $acctname=$row['payee'];
                                                echo '<option  value="'.$acctcode.'" >'.$acctname.' - '.$acctcode.'</option>';
                                            }
                                            ?-->
                                        </select>
                                                <script>
                                                    function onleavetype(x) 
                                                    {    
                                                        var referance_id=x.value;
                                                        window.location.href = 'addLeaveEntitlement.php?referance_id='+referance_id;
                                                    }
                                                </script>									
											</div>
											<div class="form-group">	
											<!--label for="inputState">Payee Name<span class="text-danger"></span></label-->
                                         										
											<?php if (isset($_GET["referance_id"])) {
                                                    $leavetype_id= $_GET["referance_id"];
                                                    $sql = mysqli_query($dbcon,"SELECT * FROM leavepolicies ");
											        while ($row = $sql->fetch_assoc()){	
                                                     if($leavetype_id ==$row['leaveType']){
														 $id =  $row['id']; 														
														$setDays =  $row['setDays'];
														$leavetype =  $row['leaveType'];
														$fgender =  $row['gender'];
														}
												}
												}
														?>
														
												<label></label><input type="hidden" class="form-control form-control-sm" name="setDays"   value="<?php echo $setDays;?>" />
												<!--input type="text" class="form-control form-control-sm" name="leavetype"   value="<?php echo $leavetype;?>" />
												<label>Gender</label><input type="text" class="form-control form-control-sm" name="fgender"   value="<?php echo $fgender;?>" /-->
									
												</div>
												</div>
												
														<div class="form-row">
									<div class="form-group col-md-6">
                                     <label for="example7">
												Gender <span class="text-danger">*</span>
												</label>
                                    <select name="gender" id="example7"class="form-control select2" required>
									     <option  value="A">All</option>                                        
                                        <option  value="M">Male</option>
                                        <option  value="F">Female</option>
                                    </select>
                                </div>
								</div>
												
										<div class="form-row">
											<div class="form-group col-md-6">
                                                <label for="example90">
												Assign Employee(s) <span class="text-danger">*</span>
												</label>
												<select class="form-control  select2" id="example90" name="empName[]" multiple required>   		
																					
												<?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT gender,concat(firstname,' ',lastname) as ename 
													FROM employees where status = 'Y'
													 ORDER BY gender ASC");
                                                    while ($row = $sql->fetch_assoc()){	
														$gender=$row['gender'];
														$ename=$row['ename'];
														echo '<option  value="'.$ename.'" >'.$gender.' - '.$ename.'</option>';
															}
															?>
                                                </select>
												</div>
												</div>
												
												

								<div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Created By</label>
                                        <?php 
                                        //session_start();
                                        include("database/db_conection.php");
                                        $userid = $_SESSION['userid'];
                                        $sq = "select username from userprofile where id='$userid'";
                                        $result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
                                        //$count = mysqli_num_rows($result);
                                        $rs = mysqli_fetch_assoc($result);
                                        ?>
                                        <input type="text" class="form-control form-control-sm" name="createdby" readonly class="form-control form-control-sm" value="<?php echo $rs['username']; ?>" />

                                    </div>
                                </div>			
												
												
																
								    <div class="form-row">
								    <div class="form-group text-right m-b-12">
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
<!--script>
function reload(){
	var v1=document.getElementById('genderID').value;
	//document.write(v1);
	self.location='addLeaveEntitlement.php?cat=' + v1;
}
</script-->
<!--script>
function reload(){
	var v1=document.getElementById('genderID').value;
	//document.write(v1);
	self.location='addLeaveEntitlement.php?cat=' + v1;
}
</script-->
 
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
			
</script>			
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
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>								
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->


</body>
</html>