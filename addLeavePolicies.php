<?php
include("database/db_conection.php");//make connection here
$leaveTypeFound = '';

if(isset($_POST['submit']))
{
//here getting result from the post array after submitting the form.
	
$year 	 =	$_POST['year'];
$leaveType 	 =	$_POST['leaveType'];
$empType 	 =	$_POST['empType'];
$setDays 	 =	$_POST['setDays'];
$applicableAfter 	 =	$_POST['applicableAfter'];
$newEmpEntitle 	 =	$_POST['newEmpEntitle'];
$existEmpEntitle 	 =	$_POST['existEmpEntitle'];
$designation 	 =	$_POST['designation'];
$deptName 	 =	$_POST['deptName'];
$location 	 =	$_POST['location'];
$gender 	 =	$_POST['gender'];
$maritalStatus 	 =	$_POST['maritalStatus'];
$createdon 	 =	$_POST['createdon'];
$createdby 	 =	$_POST['createdby'];

 //$primaryflag 	 =	$_POST['primaryflag'];
  //  $image 	 =	$_POST['image'];

    //flag for all correspeondance radio button implementation for assigning entitlements
    $field = isset($_POST['newEmpEntitle']) ? $_POST['newEmpEntitle'] : false;
    $dbFlag = $field ? 'Yes' : 'No';
	
	$field = isset($_POST['existEmpEntitle']) ? $_POST['existEmpEntitle'] : false;
    $dbFlag = $field ? 'Yes' : 'No';
	
	

//Generating Vendor ID
$policyID ="";
$prefix ="";
 $sql="SELECT MAX(id) as latest_id FROM leavepolicies ORDER BY id DESC";
	if($result = mysqli_query($dbcon,$sql)){
		$row   = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result)>0){
			$maxid = $row['latest_id'];
			$maxid+=1;
			
			$policyID = $prefix.$maxid;
		}else{
			$maxid = 0;
			
			$maxid+=1;
			$policyID = $prefix.$policyID;
		}
	}	
												    
	$checkLeaveTypeQuery="SELECT leaveType FROM leavePolicies WHERE leaveType='$leaveType' AND year = '$year' ";
    $run_query=mysqli_query($dbcon,$checkLeaveTypeQuery);
	if(mysqli_num_rows($run_query)>0)
    {
        $leaveTypeFound = "Leave Type: '$leaveType' for the year $year is already been assigned to the Leave Policy, Please try another one!";
        //exit;
    }
    else{
    $insertLeavePolicies="INSERT INTO leavepolicies(year,
													policyID,													
													leaveType,
													empType,
													setDays,
													applicableAfter,
													newEmpEntitle,
													existEmpEntitle,
													designation,
													deptName,
													location,
													gender,
													maritalStatus,
													createdon,
													createdby) 
											VALUES('$year',
											'$policyID',
											'$leaveType',
											'$empType',
											'$setDays',
											'$applicableAfter',
											'$newEmpEntitle',
											'$existEmpEntitle',
											'$designation',
											'$deptName',
											'$location',
											'$gender',
											'$maritalStatus',
											'$createdon',
											'$createdby')";
	
	echo "$insertLeavePolicies";
	
	if(mysqli_query($dbcon,$insertLeavePolicies))
	{
   
		echo "<script>alert('Leave Policy created Successfully ')</script>";
		header("location:listLeavePolicies.php");
    } else { die('Error: ' . mysqli_error($dbcon));
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Leave Policies</h1>
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
								<h5><div class="text-muted font-light"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>&nbsp;Add Leave Policies<span class="text-muted"></span></div></h5>
								
								<!--div class="text-muted font-light">Tell us a bit about yourself.</div-->
								<p class="text-danger"><?php echo $leaveTypeFound;?></p>
								
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
                                                <label for="example1">Select Year<span class="text-danger">*</span></label>
                                                <select required id="example1"  required class="form-control select2" name="year">
												<option value="">-Select Year- </option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic where status='Y' order by id asc");
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
                                                <label for="example2">Leave Type<span class="text-danger">*</span></label>
                                                <select required id="example2"  required class="form-control select2" name="leaveType">
												<option value="">-Select Leave Type-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT leavetype FROM leavetypes order by id asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $leavetype=$row['leavetype'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$leavetype.'" >'.$leavetype.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
											</div>												
																
								    <div class="form-row">
									  <div class="form-group col-md-6">
                                                <label for="example3">Employee Type<span class="text-danger">*</span></label>
                                                <select required id="example3"  required class="form-control select2" name="empType">
												<option value="">--Select Employee Type--</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT type FROM emptype order by id ASC");
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
                                     <label for="example7">
												Gender 
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
																	
								    <div class="form-row">
									  <div class="form-group col-md-6">
									  <label>Set Days<span class="text-danger">*</span></label>
								<input type="text" placeholder="20" name="setDays" required class="form-control form-control-sm"> 
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