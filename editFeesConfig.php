<?php 
include("database/db_conection.php");//make connection here

if(isset($_POST['FeesConfigEdit']))
{ 
    $feesId = $_POST['feesId'];
    $amount = $_POST['amount'];
	$term1  = $_POST['term1'];
	$term2  = $_POST['term2'];
	$term3  = $_POST['term3'];

    $updatefeesconfig = "UPDATE `feesconfig` SET `fee_config_amount` = $amount ,`term1` = $term1,`term2` = $term2,`term3` = $term3 WHERE fee_config_id = '$feesId'";

    if(mysqli_query($dbcon,$updatefeesconfig))
    {
		// echo "<script>alert('Profile Successfully updated')</script>";
        header("location:listFeesConfig.php");
    } else { echo die('Error: ' . mysqli_error($dbcon).$updatefeesconfig );
	    //'Failed to update user';
            exit; //echo "<script>alert('Company Profile creation unsuccessful ')</script>";
           }
   
	die;
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
                                    <h1 class="main-title float-left">Edit Fees Configuration </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Fees Configuration</li>
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
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Fees Configuration<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editFeesConfig.php" enctype="multipart/form-data" method="post">
								<?php
											include("database/db_conection.php");//make connection here
 
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT * FROM feesconfig WHERE fee_config_id = $id");								 
												while($res = mysqli_fetch_array($result))
												{
													//$feescode = $res['feescode'];
													$academic = $res['fee_config_academic_year'];													
													$class = $res['fee_config_class'];
													$feesname = $res['fee_config_name'];													
													$amount1 = $res['fee_config_amount'];
													$tterm1 = $res['term1'];
													$tterm2 = $res['term2'];
													$tterm3 = $res['term3'];
													$duedate = $res['fee_config_duedate'];
													$status = $res['fee_config_status'];
													
												}
											}
												
											?>			
                                    
									 <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>Academic</label>
                                        <input type="text" class="form-control form-control-sm" name="academic" readonly class="form-control" value="<?php echo $academic;?>" />        
                                    </div>

                                    
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Class</label>
                                                <select  id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

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
                                </div>

                                
                                 <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Fees Name<span class="text-danger"></span></label>
                                                <select  id="feesname" onchange="onlocode(this)"  class="form-control form-control-sm" name="feesname">
                                                    <?php 
                                                            echo '<option value="termfees" selected>termfees</option>';
                                                    ?>
                                                </select>
                                </div>
                                    <div class="form-group col-md-5">
                                        <label>Amount<span class="text-danger"></span></label>
                                        <input  type="text" class="form-control form-control-sm" id="amount" name="amount"  value="<?php echo $amount1;?>" /> 
                                    </div>         
									<div class="form-group col-md-5">
                                        <label>Duedate</label>
                                        <input type="date" class="form-control form-control-sm" name="duedate" value="<?php echo $duedate;?>" /> 
										</div>   									
									</div>
                                    <div class="form-group col-md-4">
										<label >Term 1</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term1" name="term1" placeholder="Term1 Fee" onblur="addfees()" value="<?php echo $tterm1;?>">
									</div>
									<div class="form-group col-md-4">
										<label >Term 2</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term2" name="term2" placeholder="Term2 Fee" onblur="addfees()" value="<?php echo $tterm2;?>">
									</div>
									<div class="form-group col-md-4">
										<label >Term 3</label><span class="text-danger">*</span>
									  <input type="text" class="form-control form-control-sm" id="term3" name="term3" placeholder="Term3 Fee" onblur="addfees()" value="<?php echo $tterm3;?>">
									</div>                                                                                                     
                                                                        
                                    							
								    <div class="form-row">
                                    <div class="form-group text-right m-b-10">
                                        <input type="hidden" name="feesId" value="<?=$_GET['id']?>">
                                        &nbsp;<button class="btn btn-primary" name="FeesConfigEdit" type="submit">
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
	var term1 = $('#term1').val();
	var term2 = $('#term2').val();
	var term3 = $('#term3').val();
	var total = Math.ceil((+term1)+(+term2)+(+term3));
	$('#amount').val(total);	
}

        </script>						
								
								
		      
			<!-- END container-fluid -->

		
		<!-- END content -->


    
	<!-- END content-page -->

    
	<?php include('footer.php'); ?>

<!-- END main -->


</body>
</html>