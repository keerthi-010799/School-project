<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['stuProfEdit']))
{ 
	var_dump($_POST);
	extract($_POST);

 

   
    $sql1 =  "INSERT studentsattendance(`createdon`,
    `academic`,
        `admissionno`,
        `firstname`,										
        `lastname`,
        `class`,
        `section`,
        `fathername`,
        `mobile`,
        `status`,
        `attendance`        
        )
VALUES('".$createdon."',
 '".$academic."',
 '".$admissionno."',
'".$firstname."',
 '".$lastname."',
 '".$class."',
 '".$section."',
 '".$fathername."',
 '".$mobile."',
 '".$status."',
 '".$attendance."' )";	 

 $sql = "UPDATE `studentsattendance` 
 SET `createdon` = '".$createdon."', 
     `academic` = '".$academic."',                                                    
      `admissionno` = '".$admissionno."' ,
      `firstname` = '".$firstname."' ,
      `lastname` = '".$lastname."' ,
      `class` = '".$class."' ,
      `section` = '".$section."' ,
      `fathername` = '".$fathername."' ,
      `mobile` = '".$mobile."' ,
      `attendance` = '".$attendance."' ,
      `status` = '".$status."'                                                        
      WHERE `id` =".$stuId;
 
 
 if(mysqli_query($dbcon,$sql)&& mysqli_query($dbcon,$sql1))
 {
     echo "<script>alert('Expense Successfully updated')</script>";
     header("location:addStudentsAttendance.php");
 } else { 
 die('Error: ' . mysqli_error($dbcon));
     exit;
 echo 'Failed to update user group';
 exit; //echo "<script>alert('User creation unsuccessful ')</script>";
 }
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
                                    <h1 class="main-title float-left">Edit Attendance </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Attendance</li>
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
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Student Profile<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editAttendance.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT * FROM studentsattendance WHERE id=$id");
                                            while($res = mysqli_fetch_array($result))
                                            {
                                                $createdon =	$res['createdon'];
												$academic =	$res['academic'];
												$admissionno = $res['admissionno'];
												$firstname 	 =	$res['firstname'];
												$lastname  =	$res['lastname'];											
												$class  =	$res['class'];		
												$section  =	$res['section'];												
												$fathername = $res['fathername'];											
												$mobile 	 =	$res['mobile']; 
												$attendance 	 =	$res['attendance'];		
                                                $status 	 =	$res['status'];										

                                            }
                                        }

                                        ?>	

                                <div class="form-row">
									<div class="form-group col-md-12">
									   <label for="datepicker1">Attendance Date</label><span class="text-danger">*</span>
									  <input type="date" class="form-control form-control-sm"  readonly name="createdon" value="<?php echo date("Y-m-d");?>" >							
									</div>
									</div>
                                    
									<div class="form-row">
                                    <div class="form-group col-md-7">
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
                                    <div class="form-group col-md-7">
                                        <label>First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="firstname" class="form-control" value="<?php echo $firstname;?>" />        
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Last Name<span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="lastname" value="<?php echo $lastname;?>" /> 
                                    </div>                                    
                                </div>
                                
                               
                                    
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inputState">Class/Course<span class="text-danger">*</span></label>
                                                <select id="class" onchange="onlocode(this)" readonly class="form-control form-control-sm" name="class">
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
                                        
                                <div class="form-group col-md-6">
                                        <label for="inputState">Section</label>
                                                <select id="section" onchange="onlocode(this)"  readonly  class="form-control form-control-sm" name="section">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $sec_get=$row['section'];
                                                        if($sec_get==$class){
                                                            echo '<option value="'.$sec_get.'" selected>'.$sec_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$sec_get.'" >'.$sec_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>

                                                </select>
                                </div>
								</div>
								 
                               
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Father Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="fathername" placeholder=""  class="form-control" value="<?php echo $fathername;?>" />
                                    </div>
                                                
                                   
                               
                                    <div class="form-group col-md-6">
                                        <label>Mobile<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="mobile"  class="form-control" value="<?php echo $mobile;?>" />
                                    </div>                                                                     
                                </div>
									
                                <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Edit Attendance Present/Absent&nbsp;</h5>
                                </div>                                                 
                                    
                                     
                                    
                                    <!--div class="form-row">
								<div class="form-group col-md-12">
								<div class="checkbox"><label> Attendance </label>&nbsp;&nbsp;
									Present <input type="radio" name="attendance" value="P"  <?php echo ($attendance=='P')?"checked":"";?> />	
									&nbsp;&nbsp;Absent <input type="radio" name="attendance" value="A"  <?php echo ($attendance=='A')?"checked":"";?> />
								</div>
								 </div--> 
                                <div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><!--label>Change/Edit Attendnace&nbsp;&nbsp;-->
									Present <input type="radio" name="attendance" value="P"  <?php echo ($attendance=='P')?"checked":"";?> />	
				&nbsp;&nbsp;Absent <input type="radio" name="attendance" value="A" <?php echo ($attendance=='A')?"checked":"";?> />
								</div>
								 </div>
								 </div> </br>
                                                    </br>
                                  
                                 
                                 <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Edit Attendnace Record Active/Inactive&nbsp;</h5>
                                
                            </div>

                           
                                          
                            <div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>Edit Student's Current Status</label>&nbsp;&nbsp;
									Active <input type="radio" name="status" value="Y"  <?php echo ($status=='Y')?"checked":"";?> />	
								&nbsp;&nbsp;Inactive <input type="radio" name="status" value="N" <?php echo ($status=='N')?"checked":"";?> />
								</div>
								 </div>
								 </div>
                                    
                                    <!--div class="form-row">
								<div class="col-md-12 col-md-offset-12">
								<div class="checkbox"><label>Student's Current Status</label>&nbsp;&nbsp;
									Active <input type="radio" name="status" value="Y"  <?php echo ($status=='Y')?"checked":"";?> />	
				&nbsp;&nbsp;Inactive <input type="radio" name="status" value="N" <?php echo ($status=='N')?"checked":"";?> />
								</div>
								 </div-->
                                                  
                                    
                                                   
                                                    
                                    							
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