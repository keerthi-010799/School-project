
<?php
include("database/db_conection.php");//make connection here
$statusApproved ='';
if(isset($_POST['stuProfEdit']))
{ 
    var_dump($_POST);
    extract($_POST);  
    
    $checkStatus="SELECT approvalStatus,id FROM studentsdiscount WHERE approvalStatus = 'Y' AND id =".$stuId;
  $run_query=mysqli_query($dbcon,$checkStatus);
	if(mysqli_num_rows($run_query)>0)
  {
     $statusApproved = "Discount is already been approved! You are not allowed to Change approval status anymore.";
    
   }
  else{        
        $updateStudentProfile = "UPDATE `studentsdiscount` SET `academic`= '".$academic."',	
                                                              `admissionno`= '".$admissionno."',    
                                                              `class`= '".$class."',    
                                                              `studentname`= '".$studentname."',                                                          
                                                           
                                                            `status`= '".$status."',
                                                            `approvalStatus`= '".$approvalStatus."',                                                           
                                                            `createdon`= '".$createdon."',
                                                            `approvedby`= '".$approvedby."'                                                           
                                        WHERE `id` =".$stuId;
     //echo $updateStudentProfile; exit;
    
      //  if(mysqli_query($dbcon,$updateStudentProfile))
    //{
        
      //  header("location:discReport.php");
    //} else { echo die('Error: ' . mysqli_error($dbcon).$updateStudentProfile );
	  
    //        exit; //echo "<script>alert('Company Profile creation unsuccessful ')</script>";
  //         }
        
   
//	die;

//}

if(mysqli_query($dbcon,$updateStudentProfile))
    {
		echo "<script>alert('Leave Type Successfully updated')</script>";
     header("location:discReport.php");
    } else { die('Error: ' . mysqli_error($dbcon).$updateStudentProfile );
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
                                    <h1 class="main-title float-left">Edit Student Profile </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Student Profile</li>
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
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Student Profile<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="approveStudentDiscount.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT discid,id,admissionno,approvalStatus,studentname,academic,class,category,
                                            discountpercentage,status,approvedby,createdon,
                                            createdby
                                            FROM  `studentsdiscount`                                            
                                            WHERE id = $id");
                                            while($res = mysqli_fetch_array($result))
                                            {
												$academic =	$res['academic'];
                                                $academic =	$res['discid'];
                                                $class =	$res['class'];
                                                $studentname =	$res['studentname'];
												$admissionno = $res['admissionno'];																				
											//	$category  =	$res['category'];												
                                             //   $discountpercentage =	$res['discountpercentage'];
                                                $status 	 =	$res['status'];
                                                $approvalStatus  =	$res['approvalStatus'];
                                                $approvedby =  $res['approvedby'];
                                                $createdon =  $res['createdon'];
                                                $createdby =  $res['createdby'];
                                               
                                               
                                            }
                                        }

                                        ?>	
                                    
									<div class="form-row">
                                    <div class="form-group col-md-5">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                                <select  id="academic" onchange="onlocode(this)"  readonly class="form-control form-control-sm" name="academic">
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

                                    <div class="form-group col-md-5">
                                        <label>Admission No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="admissionno"   class="form-control" autocomplete="off" value="<?php echo $admissionno;?>" />
                                    </div>
                                </div>                                
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label>Createdon<span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" readonly name="createdon" value="<?php echo $createdon;?>" /> 
                                    </div>     
                                    <div class="form-group col-md-5">
                                        <label>Class<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="class" value="<?php echo $class;?>" /> 
                                    </div>                                  
                                </div>
                                <div class="form-group col-md-5">
                                        <label>Student Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="studentname" value="<?php echo $studentname;?>" /> 
                                    </div>                                  
                                </div>

                                <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Change/Unchange Discount Status&nbsp;</h5>
                                </div>
                                                    

								<div class="form-group col-md-12">
								<div class="checkbox"><label> Assign/Unassign Discount</label>&nbsp;&nbsp;
									Assign Discount <input type="radio" name="status" value="Y"  <?php echo ($status=='Y')?"checked":"";?> />	
									&nbsp;&nbsp;Unassign Discount <input type="radio" name="status" value="N"  <?php echo ($status=='N')?"checked":"";?> />
								</div>

                               
                                                    
                                            
                                <div class="form-row">
                                        <div class="form-group col-md-7">
                                        <label>Approve / Reject Discount</label><span class="text-danger">*<span class="text-danger">
                                        <select  id="inputState" name="approvalStatus" class="form-control form-control-sm" required>
                                        <option <?php if ($approvalStatus == "N" ) echo 'selected="selected"' ; ?> value="N">Pending for Approval</option>
                                        <option <?php if ($approvalStatus == "Y" ) echo 'selected="selected"' ; ?> value="Y">Approved</option>
                                        <option <?php if ($approvalStatus == "R" ) echo 'selected="selected"' ; ?> value="R">Rejected</option>
                                        </select>
                                     </div>
                                    </div>

                                    

                               
                                    <div class="form-group col-md-7">
                                 
                                    <label for="inputState">Approved/Updated By<span class="text-danger">*</span></label>
                                                <select  id="approvedby" required onchange="onlocode(this)"   class="form-control form-control-sm" name="approvedby">
                                               
                                                   <?php 
                                                    include("database/db_conection.php");//make connection here


                                                    $sql = mysqli_query($dbcon, "SELECT concat(firstname,' ',lastname) as ename 
                                                     FROM employees where designation = 'Chairman' OR designation = 'Secretary'");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $enameget=$row['ename'];
                                                        if($enameget==$ename){
                                                            echo '<option value="'.$enameget.'" selected>'.$enameget.'</option>';
                                                        } else {
                                                            echo '<option value="'.$enameget.'" >'.$enameget.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
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