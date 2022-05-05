
<?php
include("database/db_conection.php");//make connection here
$statusApproved = '';
if(isset($_POST['stuProfEdit']))
{ 
    var_dump($_POST);
    extract($_POST);   

   
        
        $updateStudentProfile = "UPDATE `oldbalstudents` SET `academic`= '".$academic."',	
                                                              `admissionno`= '".$admissionno."',   
                                                              `class`= '".$class."',   
                                                              `firstname`= '".$firstname."',                                                          
                                                            `lastname`= '".$lastname."',                                                          									
                                                             `fees_balance` ='".$feesBalance."',
                                                            `status`= '".$status."',
                                                            `createdon`= '".$createdon."'
                                                                                                                 
                                        WHERE `id` =".$stuId;
     //echo $updateStudentProfile;
    
        if(mysqli_query($dbcon,$updateStudentProfile))
    {
        
        header("location:listOldBalance.php");
    } else { echo die('Error: ' . mysqli_error($dbcon).$updateStudentProfile );
	  
            exit; //echo "<script>alert('Company Profile creation unsuccessful ')</script>";
           }
   
	die;
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
                                    <h1 class="main-title float-left">Edit Student OldBalance </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit OldBalance</li>
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
                            <p class="text-danger"><?php echo $statusApproved;?></p>
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								<h5><div class="text-muted font-light">
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Student OldBalance<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editOldBalance.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT academic,id,admissionno,firstname,lastname,class,fees_balance,status,createdon,
                                            createdby
                                            FROM  `oldbalstudents`                                            
                                            WHERE id = $id");
                                            while($res = mysqli_fetch_array($result))
                                            {
												$academic =	$res['academic'];
                                                $admissionno = $res['admissionno'];			
                                                $firstname =	$res['firstname'];
                                                $lastname =	$res['lastname'];
                                                $class =	$res['class'];
                                                $feesBalance =	$res['fees_balance'];
                                                $status 	 =	$res['status'];
                                                $createdon =  $res['createdon'];
                                                $createdby =  $res['createdby'];
                                            }
                                        }

                                        ?>	
                                    <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Createdon<span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm"  name="createdon" value="<?php echo $createdon;?>" /> 
                                    </div>  
                                    </div>
                                    
									<div class="form-row">
                                    <div class="form-group col-md-8">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                                <select  id="academic" onchange="onlocode(this)"   class="form-control form-control-sm" name="academic">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic_get=$row['academic'];
                                                        if($academic_get==$academic){
                                                            echo '<option value="'.$academic_get.'" selected>'.$academic_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$academic_get.'" >'.$academic_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                                    </div>
                                                    <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Admission No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm"  name="admissionno"   class="form-control" autocomplete="off" value="<?php echo $admissionno;?>" />
                                    </div>
                                                    </div>
                                                              
                                                    <div class="form-row">
                                    <div class="form-group col-md-8">
                                       <label for="inputState">Class/Course<span class="text-danger">*</span></label>
                                                <select id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
                                                    <?php 
                                                    include("database/db_conection.php");//make db connection here

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
                                <div class="form-group col-md-5">
                                        <label>First Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm"  name="firstname" value="<?php echo $firstname;?>" /> 
                                    </div>   
                                    <div class="form-group col-md-3">
                                        <label>Last Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm"  name="lastname" value="<?php echo $lastname;?>" /> 
                                    </div>                                   
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Fees Balance<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm"  name="feesBalance" value="<?php echo $feesBalance;?>" /> 
                                    </div>                                  
                                </div>                                
                                   
                                    							
								    <div class="form-row">
                                    <div class="form-group text-right m-b-10">
                                        <input type="hidden" name="stuId" value="<?=$_GET['id']?>">
                                        &nbsp;<button class="btn btn-primary" name="stuProfEdit" type="submit">
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

    
	<!--?php include('footer.php'); ?-->

<!-- END main -->
<script>
    function getpercentage(){
        var category = $('#category').val();
        console.log('cat',category);
        $.ajax ({
                    url: "workers/setters/discount.php?category=" +category,
                    type: 'post',
                    success:function(res){
                      var output = JSON.parse(res);
                          if(output.status){
                              var vals = output.values;
                              console.log(vals[0]);
                             $('#discountpercentage').val(vals[0].discountpercentage);      
                            }                                          
                    
                  }
                });
    }
    </script>

</body>
</html>