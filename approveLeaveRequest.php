<?php
include("database/db_conection.php");//make connection here
$statusApproved ='';
$leaveType ='';
$empName ='';
if(isset($_POST['approveLeaveRequest']))
{ 
	var_dump($_POST);
	extract($_POST);

$statusApproved="SELECT status ,id FROM leaverequest WHERE status = 'Y' and id =".$approveLeaveID;
  $run_query=mysqli_query($dbcon,$statusApproved);
	if(mysqli_num_rows($run_query)>0)
  {
     $statusApproved = "Leave Request is already been Approved. You are not allowed to Update!";
      // exit;
	//echo "<script>alert('Leave Request  '$leaveType' is already been Approved Cannot be updated ')</script>";
   }
  else{
	
    $updateLeaveRequest= "UPDATE `leaverequest` 
                        SET `fromDate` = '".$fromDate."',						   
							`empName` = '".$empName."',
							`leaveType` = '".$leaveType."',						   
							`empName` = '".$empName."',
                            `toDate` = '".$toDate."',
                            `toDate` = '".$toDate."',
                            `daysRequested` = '".$requestedDays."',   
							`availableDays` = '".$daysAvailable."',                           
                            `updatedby` = '".$createdby."',
                            `status` = '".$status."' ,
							`notes` = '".$notes."' 
                        WHERE `id` =".$approveLeaveID;
	//echo $updateLeaveType;
	//$updateApprovedDays = "UPDATE entitlement SET spent = spent + '".$requestedDays."' WHERE leaveType= $_POST[leaveType]
	//AND empName =$_POST[empName]";

	$updateApprovedDays = "UPDATE entitlement SET spent = spent + $requestedDays WHERE empName = '$empName' AND
	leaveType = '".$leaveType."'";
	

				$result=mysqli_query($dbcon,$updateApprovedDays);
				if (!$result)
				{
				die('Error: '. mysqli_error($dbcon));
				}
				//echo $updateApprovedDays;
				//exit;

	if(mysqli_query($dbcon,$updateLeaveRequest))
    {
		echo "<script>alert('Leave Type Successfully updated')</script>";
     header("location:listLeaveRequests.php");
    } else { echo 'Failed to update user group';
	exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
}
	//echo $updateLeaveType;

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
                                    <h1 class="main-title float-left">Approve Leave Request</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
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

					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<p class="text-danger"><?php echo $statusApproved;?></p>
							<h3> <div class="fa-hover col-md-8 col-sm-8">Approve Leave Request 
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<form method="post" action="approveLeaveRequest.php"  enctype="multipart/form-data">
											<?php
											include("database/db_conection.php");//make connection here
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT l.id,l.notes,l.year,l.empName,l.leaveType,l.fromDate,l.toDate,
												((DATEDIFF(l.toDate,l.fromDate)) -
												((WEEK(l.toDate) - WEEK(l.fromDate)) * 2) -
												(case when weekday('l.toDate') = 6 then 1 else 0 end) -
												(case when weekday('l.fromDate') = 5 then 1 else 0 end)) as requestedDays,
												l.status,e.setDays-e.spent as daysAvailable,l.reason,l.createdon,l.createdby,l.updatedby
												FROM leaverequest l, entitlement e											
											     WHERE l.id =$id 	
												 ORDER BY l.id asc");
												while($res = mysqli_fetch_array($result))
												{
                                                    $year = $res['year'];
													$empName = $res['empName'];
													$leaveType= $res['leaveType'];
                                                    $fromDate= $res['fromDate'];
                                                    $toDate= $res['toDate'];
                                                    $requestedDays= $res['requestedDays'];
													$daysAvailable= $res['daysAvailable'];
                                                    $reason= $res['reason'];
                                                    $createdon= $res['createdon'];
                                                    $createdby= $res['createdby'];
                                                    $status= $res['status'];  
													$notes=$res['notes'];                                                
													
												}
											}
											?>


                                    <div class="form-row">
                                    <div class="form-group col-md-5">
									<label> Requested On</label>
									  <input type="date" class="form-control form-control-sm" readonly name="createdon" value="<?php echo $createdon;?>">		
									</div>
								   
									<div class="form-group col-md-5">
									  <label >Year</label>
									  <input type="text" class="form-control form-control-sm" name="year" readonly value="<?php echo $year;?>"/>
									  </div>
                                    </div>
									  
									<div class="form-row">
									<div class="form-group col-md-5">
									  <label >Employee</label>
									  <input type="text" class="form-control form-control-sm" name="empName" readonly value="<?php echo $empName;?>"/>
									  </div>
										

																	
									  <div class="form-group col-md-5">
                                                <label for="inputState">Leave Type</label><span class="text-danger"></span>
                                                <select id="leaveType" onchange="onload(this)" class="form-control form-control-sm select2" readonly name="leaveType" >
                                                 <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT leaveType FROM leaverequest WHERE id=$id");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $chai_get=$row['leaveType'];
                                                         if($chai_get==$leaveType){
                                                            echo '<option value="'.$chai_get.'" selected>'.$chai_get.'</option>';

                                                        }else{
                                                            echo '<option value="'.$chai_get.'" >'.$chai_get.'</option>';

                                                        }
													}
													?>
                                                </select>
									</div>
												</div>
												
									    
									<div class="form-row">
									 <div class="form-group col-md-5">
									<label> Requested From</label>
									  <input type="date" class="form-control form-control-sm"  name="fromDate"  value="<?php echo $fromDate;?>">		
									</div>
                                    <div class="form-group col-md-5">
									<label> Requested To</label>
									  <input  type="date" class="form-control form-control-sm"  name="toDate" value="<?php echo $toDate;?>">		
									</div>
												</div>
                                     
									<div class="form-row">
                                    <div class="form-group col-md-5">
									  <label >Edit Days Requested[Optional]</label>
									  <input type="text" class="form-control-control-sm" name="requestedDays" value="<?php echo $requestedDays;?>"/>
									</div>
									
									
									<div class="form-group col-md-5">
									  <label >Days Avaialble</label>									 								 
									   <input type="text" class="form-control form-control-sm" name="daysAvailable" readonly value="<?php echo $daysAvailable;?>"/>
									  </div></div>

									  <div class="form-row">
                                    <div class="form-group col-md-10">
									  <label >Reason</label>
									  <input type="text" class="form-control form-control-sm" name="reason" readonly value="<?php echo $reason;?>"/>
									  </div>
                                    </div>
                                    
                                   
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                        <label>Update Approval Status</label><span class="text-danger">*<span class="text-danger">
                                        <select name="status" class="form-control form-control-sm" required>
                                        <option <?php if ($status == "N" ) echo 'selected="selected"' ; ?> value="N">Pending</option>
                                        <option <?php if ($status == "Y" ) echo 'selected="selected"' ; ?> value="Y">Approved</option>
                                        <option <?php if ($status == "R" ) echo 'selected="selected"' ; ?> value="R">Rejected</option>
                                        </select>
                                     </div>
                                    </div>
                                    <div class="form-row">
									<div class="form-group col-md-10">
											<label >Approval Notes<span class="text-danger"></span></label>
											<input type="text" class="form-control form-control-lg" name="notes" value="<?php echo $notes;?>"/>
											
									 </div>	
									</div> 

                                    
                                    <div class="form-row">
									  <div class="form-group col-md-10">
									  <label for="inputState">Approved By</label>
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
								    <div class="modal-footer">
										<input type="hidden" name="approveLeaveID" value="<?=$_GET['id']?>">
										<button type="submit" name="approveLeaveRequest" value="approveLeave" class="btn btn-primary">Approve</button>
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
<?php include('footer.php');?>
</body>
</html>