<?php 
include("database/db_conection.php");//make connection here

if(isset($_POST['FeesConfigEdit']))
{ 
	var_dump($_POST);
	extract($_POST);
    $updatefeesconfig = "UPDATE `feesconfig` SET `class` = '".$class."',
											`feesname` = '".$feesname."',
											`amount` = '".$amount."',
											`duedate` = '".$duedate."',
											`status` = '".$status."'
										WHERE `id` = ".$feesId;

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
												$result = mysqli_query($dbcon, "SELECT * FROM feesconfig WHERE id=$id");
									 
												while($res = mysqli_fetch_array($result))
												{
													//$feescode = $res['feescode'];
													$academic = $res['academic'];													
													$class = $res['class'];
													$feesname = $res['feesname'];													
													$amount = $res['amount'];
													$duedate = $res['duedate'];
													$status = $res['status'];
													
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
                                    <label for="inputState">Fees Head<span class="text-danger"></span></label>
                                                <select  id="feesname" onchange="onlocode(this)"  class="form-control form-control-sm" name="feesname">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feesconfig");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $feesname_get=$row['feesname'];
                                                        if($feesname_get==$feesname){
                                                            echo '<option value="'.$feesname_get.'" selected>'.$feesname_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$feesname_get.'" >'.$feesname_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                    <div class="form-group col-md-5">
                                        <label>Amount<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="amount" value="<?php echo $amount;?>" /> 
                                    </div>         
									<div class="form-group col-md-5">
                                        <label>Duedate</label>
                                        <input type="date" class="form-control form-control-sm" name="duedate" value="<?php echo $duedate;?>" /> 
										</div>   									
									</div>
                                    
                                    
                                   
                                    <div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>Fees Status</label>&nbsp;&nbsp;
									Active <input type="radio" name="status" value="Y"  <?php echo ($status=='Y')?"checked":"";?> />	
				&nbsp;&nbsp;Inactive <input type="radio" name="status" value="N" <?php echo ($status=='N')?"checked":"";?> />
								</div>
								 </div>
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
								
								
								
								
		      
			<!-- END container-fluid -->

		
		<!-- END content -->


    
	<!-- END content-page -->

    
	<?php include('footer.php'); ?>

<!-- END main -->


</body>
</html>