<?php
include("database/db_conection.php");//make connection here
$feesConfig = '';
if(isset($_POST['submit']))
{
	$feescode ="";
    $prefix = "";
  
	$academic=$_POST['academic'];//same
    $class=$_POST['class'];//same
	$gender=$_POST['gender'];//same
	$feesname=$_POST['feesname'];//same
	$amount=$_POST['amount'];//same
    $duedate=$_POST['duedate'];
	//$category=$_POST['category'];

$sql="SELECT MAX(id) as latest_id FROM feesconfig ORDER BY id DESC";
 if($result = mysqli_query($dbcon,$sql)){
     $row   = mysqli_fetch_assoc($result);
     if(mysqli_num_rows($result)>0){
         $maxid = $row['latest_id'];
         $maxid+=1;

         $feescode = $prefix.$maxid;
     }else{
         $maxid = 0;
         $maxid+=1;
         $feescode = $prefix.$maxid;
     }
 }
 $check_Config_alreadyDone="SELECT f.feesname,f.class FROM feesconfig f,class c WHERE f.feesname = '$feesname' AND c.class = '$class' '";
 
 $run_query=mysqli_query($dbcon,$check_Config_alreadyDone);
 if(mysqli_num_rows($run_query)>0)
 {
     //echo '0';
    // echo "<script>alert('Item Name: $itemname is already exist in our database, Please try another one!')</script>";
     //$fmsg= "Email already exists";   
    $feesConfig = "Fees Name: '$feesname''already Assigned to this class, Please try another class!";
    //exit();
     // header("location:addPurchaseItemMaster.php");
 }
//    else{	$sql = 'Insert....

else{
   //$image =base64_encode($image);														
	$insert_feesconfig="INSERT INTO feesconfig(`feescode`,`academic`,`class`,`gender`,`feesname`,`amount`,`duedate`) 
	VALUES ('$feescode','$academic','$class','$gender','$feesname','$amount','$duedate')";													    

	echo "$insert_feesconfig";
	//exit;
	
	if(mysqli_query($dbcon,$insert_feesconfig))
	{
		echo "<script>alert('Fees Configuration Successful ')</script>";
		header("location:listFeesConfig.php");
     } else { echo die('Error: ' . mysqli_error($dbcon).$insert_feesconfig );
		exit; //echo "<script>alert('section creation  unsuccessful ')</script>";
	}
	die;
}
}
?>
<?php include('header.php');?>
	<!-- End Sidebar -->

    <!-- Modal Feename-->
    <!--div class="modal fade custom-modal" id="customModalFeesname2" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Feesname</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addfeesname2" id="addfeesname2"  placeholder="Enter Feeas Head" required >
											</div>
										 
											<div class="form-group">
												<input type="text" class="form-control" name="addescription2" id="addescription2"  placeholder="Description">
											</div>
										</div>
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitfeesname2" id="submitfeesname2" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div-->
	<!-- Modal Ends-->	


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Fees Configuration</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active"><a href="feesNavBar.php">Fees Navigation Menu Bar</li></a></li>
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
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><i class="fa fa-calendar bigfonts" aria-hidden="true"></i> 
								 Fees Configuration
                                 <p class="text-danger"><?php echo $feesConfig;?></p> </h3>
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-row">
                                    <div class="form-group col-md-4 ">
                                    <label for="academic">Academic<span class="text-danger">*</span></label>
                                         <select required id="academic"  class="form-control form-control-sm"  name="academic" >                                           
                                            
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic where status='Y' ORDER BY academic DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									<div class="form-group col-md-6">
                                    <label for="class">Class/Course<span class="text-danger">*</span></label>
                                         <select id="class" class="form-control form-control-sm"  name="class" required >       
											 <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
														
														$sql = mysqli_query($dbcon, "SELECT class FROM class ORDER BY id ASC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                     }
                                                    ?>
                                                </select>
                                </div>
									</div>

									<div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label ><span class="">Gender</span><span class="text-danger">*</span></label>
                                    <select required id="gender" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <!--option value="">-Select Gender-</option-->
                                        <option value="A">All</option>
										<option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>   
                                    </div>

									
							
									<div class="form-group col-md-8">
									<label for="feesname">Fees Name<span class="text-danger">*</span></label>
                                         <select id="feesname" class="form-control form-control-sm" name="feesname" required>        
											 <option value="">-Select Particulars-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feeshead");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $feesname=$row['feesname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$feesname.'" >'.$feesname.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <!--a href="#custom-modal" data-target="#customModalFeesname2" data-toggle="modal">
								                <i class="fa fa-user-plus" aria-hidden="true"></i>New Fees Head</a><br-->                                            
                                                </div>
                                                </div>
												<div class="form-group col-md-4">
										<label >Term 1</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="term-1" placeholder="Enter Term1 Fee"  >
									</div>
									<div class="form-group col-md-4">
										<label >Term 2</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="term-2" placeholder="Enter Term2 Fee"  >
									</div>
									<div class="form-group col-md-4">
										<label >Term 3</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="term-3" placeholder="Enter Term3 Fee"  >
									</div>

                                                <div class="form-row">
                                                <div class="form-group col-md-10">
										<label >Amount</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="amount" placeholder="Enter Fee Amount"  >
									</div>
                                    </div>									
								<div class="form-row">
									<div class="form-group col-md-10">
										<label><h4>Other Fees</h4></label><span class="text-danger"></span>
									</div>                                
								</div>
                                <div class="form-row">
									<div class="form-group col-md-10">
										<label >Due Date</label><span class="text-danger">*</span>
									  <input type="date" class="form-control form-control-sm" name="duedate" placeholder=""  >
									</div>
                                    </div>
                                                
									
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

    <!-- Query for Student name wise fees structure 
select concat(s.firstname,'',s.lastname) as fullname,f.feesname,s.class from feesconfig f,studentprofile s
WHERE f.class = s.class ORDER BY s.ID -->
    <script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitfeesname2').click(function(){
		var feesname = $('#addfeesname2').val();
		var description = $('#addescription2').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addFeesHeadModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  feesname:feesname,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#feesname').append(new_option);
					 $('#customModalFeesname2').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Feesname,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	
	
 <?php include('footer.php');?>