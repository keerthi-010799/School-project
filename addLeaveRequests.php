<?php
include("database/db_conection.php");//make connection here

$ref_id ='';

if(isset($_POST['submit']))
{

$empName =$_POST['empName'];
$year 	 =	$_POST['year'];
$leaveType 	 =	$_POST['leaveType'];
$fromDate 	 =	$_POST['fromDate'];
$toDate 	 =	$_POST['toDate'];
$reason 	 =	$_POST['reason'];
$createdon 	 =	$_POST['createdon'];
$createdby 	 =	$_POST['createdby'];

 

  	
    $insertLeaveRequest="INSERT INTO leaverequest(year,
                                                	empName,
                                                    leaveType,
                                                    fromDate,
                                                    toDate,	
                                                    reason,											
													createdon,
													createdby) 
											VALUES(
													'$year',
													'$empName',											
													'$leaveType',											
													'$fromDate',
													'$toDate',	
													'$reason',																				
													'$createdon',
													'$createdby')";
	
	echo "$insertLeaveRequest";

	if(mysqli_query($dbcon,$insertLeaveRequest))
	{
   
		echo "<script>alert('insertEntitlement created Successfully ')</script>";
		//exit;
		header("location:listLeaveRequests.php");
    } else { die('Error: ' . mysqli_error($dbcon));
		exit; 
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
                                    <h1 class="main-title float-left">Leave Request</h1>
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
								<h5><div class="text-muted font-light"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>&nbsp;Leave Request<span class="text-muted"></span></div></h5>
								
								<!--div class="text-muted font-light">Tell us a bit about yourself.</div-->
								<!--p class="text-danger"><?php echo $empAssignedFound;?></p-->
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
								
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
								
								 <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="datepicker1">Requested Date</label><span class="text-danger">*</span>
                                            <!--input type="date" class="form-control" name="date" value="<?php echo date("d/m/Y") ?>"/-->
                                            <input type="date" class="form-control form-control-sm"  name="createdon" value="<?php echo date("Y-m-d");?>">									
                                        </div>
                                    </div>
									
									
									
								
								<div class="form-row">
									  <div class="form-group col-md-6">
                                                <label for="example1"> Year<span class="text-danger">*</span></label>
                                                <select required id="example1"  required class="form-control select2" name="year">
												<!--option value="">-Select- </option-->
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
									 
                                             <label for="empName"> Employee<span class="text-danger">*</span></label>
                                                <select required  id="empName" onchange="onleavepolicy(this);" required class="form-control select2" name="empName">
												<!--option value="">-Select- </option-->
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
                                                        window.location.href = 'addLeaveRequests.php?referance_id='+referance_id;
                                                    }
                                                </script>									
											</div>
                                                </div>
												
									
									  
									
                                            
                                     

									  <div class="form-row">
                                            <div class="form-group col-md-14">
                                                <label ><span class="text-danger">Available Leave Day[s]:<br></span> 
												<?php $ref_id = $_GET['referance_id'];
                                                    $sql = mysqli_query($dbcon,"SELECT empName,leaveType,concat(setDays-spent) as DaysAvailable from entitlement ");
											        while ($row = $sql->fetch_assoc()){	
                                                     if($ref_id==$row['empName']){	
													//	$referance_id =  $row['referance_id'];													
                                                       // echo $row['leaveType']; echo "<br>";echo "<br>";
													//	echo '<span class="text-danger">Days</span>&nbsp;'; 
														echo $row['leaveType']; echo '<span class="text-danger">&nbsp;-</span>&nbsp;'; echo $row['DaysAvailable'];echo "<br>";
														//echo '<span class="text-danger">Days Spent:</span>&nbsp;';  $row['spent'];
											         }
													}
											
											?></label>
                                            </div>
                                        </div>
                                        <label> <span class="text-info">Apply Leave[s] </label></span>
                                        <div class="form-row">											
											<div class="form-group col-md-6">
											 <label for="referance_id">Select Leave Type<span class="text-danger">*</span></label>
											<?php 
                                                    include("database/db_conection.php");//make connection here
													$ref_id = $_GET['referance_id'];
													$query2 = "SELECT leaveType FROM entitlement WHERE empName=?";
													if($stmt=$dbcon->prepare($query2)){
														$stmt -> bind_param('s',$ref_id);
														$stmt -> execute();
														$r_set = $stmt-> get_result();
                                                       
														echo "<select  id='referance_id' name='leaveType' required class='form-control select2' >";
                                                       // echo   "<option value=''>-Select-</option>";
													while($row=$r_set->fetch_assoc()){
														 echo $leavetype=$row['leaveType'];
														// echo $ref_id=$row['referance_id'];
														// echo $leavetype=$row['leaveType'];
														//echo "<option value=$row[ename] > $row[ename] </option>";
														 echo '<option onchange="'.$row['setDays'].'" value="'.$leavetype.'" >'.$leavetype.'</option>';
													}
													echo "</select>";
													} else {
														echo $dbcon->error;
													}
													?>
													 
												
									 </div>                                     
									  </div>
                                                        <label> <span class="text-info">Request Leave Date(s) </label></span>

                                      <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="datepicker1"> Date From</label><span class="text-danger">*</span>
                                            <!--input type="date" class="form-control" name="date" value="<?php echo date("d/m/Y") ?>"/-->
                                            <input type="date" class="form-control form-control-sm"  name="fromDate" value="<?php echo date("Y-m-d");?>">									
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="datepicker1">Date To</label><span class="text-danger">*</span>
                                            <!--input type="date" class="form-control" name="date" value="<?php echo date("d/m/Y") ?>"/-->
                                            <input type="date" class="form-control form-control-sm"  name="toDate" value="<?php echo date("Y-m-d");?>">									
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
												<label>Reason</label><span class="text-danger">*</span><br />
												<!--textarea rows="3" class="form-control  form-control-sm" name="notes" placeholder="Add  Notes like 1> Document file details 2> Payment Details"></textarea-->
                                                <input type="text" required name="reason" class="form-control" placeholder="">
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
                                                            Submit Request
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