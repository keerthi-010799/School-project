<?php
include("database/db_conection.php");//make connection here
$feesConfig = '';
$feesFound ='';

if(isset($_POST['submit']))
{
	$feescode ="";
  
	$academic=$_POST['academic'];//same
    $class=$_POST['class'];//same
	$gender=$_POST['gender'];//same
	$feesname=$_POST['feesname'];//same
	$amount=$_POST['amount'];//same
    $duedate=$_POST['duedate'];
	$feeprefix = $_POST['class'];

	$sql="SELECT MAX(fee_config_id) as id FROM feesconfig ORDER BY id DESC";
  if($result = mysqli_query($dbcon,$sql)){
 	$row   = mysqli_fetch_assoc($result);
 	if(mysqli_num_rows($result)>0){
 	  echo $row['id'];
		 	$maxid = $row['id'];
 	 	$maxid += 1;
 	$feescode = $feeprefix.$maxid;
 	 }
	 else{
		$maxid = 0;
		$maxid += 1;
		 $feescode = $feeprefix.$maxid;
	}
 }
//   echo $feescode;

$CheckFeesConfig="SELECT fee_config_name FROM  feesconfig WHERE fee_config_class='$class'";
    $run_query=mysqli_query($dbcon,$CheckFeesConfig);
	if(mysqli_num_rows($run_query)>0)
    {	
		$feesFound = "'$feesname'' is already been assigned to the class $class, Please try another class!";
		
	 }
    else{	

	$insert_feesconfig="INSERT INTO feesconfig (`fee_config_code`,`fee_config_academic_year`,`fee_config_class`,`fee_config_gender`,`fee_config_name`,`fee_config_amount`,`fee_config_duedate`) 
	VALUES ('$feescode','$academic','$class','$gender','$feesname','$amount','$duedate')";													    
	
	if(mysqli_query($dbcon,$insert_feesconfig))
	{
		header("location:listFeesConfig.php");
     } else { echo die('Error: ' . mysqli_error($dbcon).$insert_feesconfig );
		exit; 
	}
	die;
}
}
?>
<?php include('header.php');?>

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
			
			<div class="row">
			                    					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								 <h3><i class="fa fa-calendar bigfonts" aria-hidden="true"></i> 
								 Fees Configuration
                                 <p class="text-danger"><?php echo $feesFound;?></p> </h3>
									 </div>									 
								
							<div class="card-body">
								
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
											 <option value="termfees">Term Fees</option>


								<!-- <php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feeshead");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $feesname=$row['feesname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$feesname.'" >'.$feesname.'</option>';
                                                    }
                                                    ?> -->
                                                </select>
                                                </div>
                                                </div>
												<div class="form-row">
                                                <div class="form-group col-md-10">
										<label >Amount</label><span class="text-danger">*</span>
									<input type="text" id="amount" class="form-control form-control-sm" name="amount" placeholder="Enter Fee Amount" onblur="addfees()">
									</div>
                                    </div>
												<div class="form-group col-md-4">
										<label >Term 1</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term1" name="term-1" placeholder="Term1 Fee" readonly >
									</div>
									<div class="form-group col-md-4">
										<label >Term 2</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term2" name="term-2" placeholder="Term2 Fee"  readonly>
									</div>
									<div class="form-group col-md-4">
										<label >Term 3</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term3" name="term-3" placeholder="Term3 Fee"  readonly>
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
function addfees(){
	var total = $('#amount').val();
	var term = Math.ceil(total/3);
	$('#term1').val(term);
	$('#term2').val(term);
	$('#term3').val(term);
}
			
</script>	
	
 <?php include('footer.php');?>