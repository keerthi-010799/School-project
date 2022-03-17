<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	$feescode ="";
    $prefix = "FC-";
  
	$academic=$_POST['academic'];//same
    $class=$_POST['class'];//same
	$feesname=$_POST['feesname'];//same
	$amount=$_POST['amount'];//same
    $duedate=$_POST['duedate'];

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
   //$image =base64_encode($image);														
	$insert_feesconfig="INSERT INTO feesconfig(`feescode`,`academic`,`class`,`feesname`,`amount`,`duedate`) 
	VALUES ('$feescode','$academic','$class','$feesname','$amount','$duedate')";													    

	//echo "$insert_feesconfig";
	
	if(mysqli_query($dbcon,$insert_feesconfig))
	{
		echo "<script>alert('Fees Configuration Successful ')</script>";
		header("location:listFeesConfig.php");
    } else {
		exit; echo "<script>alert('section creation  unsuccessful ')</script>";
	}
	
}
?>
<?php include('header.php');?>
	<!-- End Sidebar -->
	
	<!-- Modal Feename-->
								<div class="modal fade custom-modal" id="customModalFeesname" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
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
												<input type="text" class="form-control" name="addfeesname"  id="addfeesname"  placeholder="Enter Feeas Head" required >
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="addescription" id="addescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitfeesname" id="submitfeesname" class="btn btn-primary">Save and Associate</button>
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
                                    <h1 class="main-title float-left">Fees Configuration</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Fees Configuration </li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
                
                
<div class="row">
			
                    

					
					
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><i class="fa fa-rupee bigfonts" aria-hidden="true"></i> 
								 Fees Configuration
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
</h3--></h3></div>
									 
									 
								
							<div class="card-body">
							<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<div class="form-row">
                                    <div class="form-group col-md-4 ">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									<div class="form-group col-md-4">
                                    <label>Select Class<span class="text-danger">*</span></label>
                                         <select class="form-control form-control-sm"  name="class" required >       
											 <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
									</div>

									
								<div class="form-row">
									<div class="form-group col-md-4">
                                    <label>Select Fees Name<span class="text-danger">*</span></label>
                                         <select class="form-control form-control-sm" name="feesname" required>        
											 <option value="">-Select Feesname-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feeshead");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $feesname=$row['feesname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$feesname.'" >'.$feesname.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
												<a href="#custom-modal" data-target="#customModalFeesname" data-toggle="modal">
								<i class="fa fa-user-plus" aria-hidden="true"></i>New Fees Head</a><br>
                                </div>
									<div class="form-group col-md-4">
										<label >Fees Amount</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" name="amount" placeholder=""  >
									</div>
                                    </div>
                                <div class="form-row">
									<div class="form-group col-md-8">
										<label >Due Date</label><span class="text-danger">*</span>
									  <input type="date" class="form-control form-control-sm" name="duedate" placeholder=""  >
									</div>
                                    </div>
									
									 
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="reset" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">
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
	
	<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitfeesname').click(function(){
		var feesname = $('#addfeesname').val();
		var description = $('#addescription').val();
		
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
					 $('#customModalFeesname').modal('toggle');
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