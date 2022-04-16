<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['stuProfEdit']))
{ 
    //var_dump($_POST);
    extract($_POST);
    

    $updateStudentProfile = "UPDATE `studentsattendance` SET `academic`= '".$academic."',	
                                                        `admissionno`= '".$admissionno."',
                                                            `attendance`= '".$attendance."',
                                                            `createdon`= '".$createdon."'                                                           
                                        WHERE `id` =".$stuId;
              
    
	if(mysqli_query($dbcon,$updateStudentProfile))
    {
        
        header("location:listStudentsAttendance.php");
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
                                    <h1 class="main-title float-left">Edit Student Attendance </h1>
                                    <ol class="breadcrumb float-right">
									<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Students Attendance</li>
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
								<i class="fa fa-pencil-square-o bigfonts" aria-hidden="true"></i>&nbsp;Edit Students Attendance<span class="text-muted"></span></div></h5>						
							</div>
								
							<div class="card-body">
								<form autocomplete="off" action="editStudentsAttendance.php" enctype="multipart/form-data" method="post">
								<?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];

                                            //selecting data associated with this particular id
                                            $result = mysqli_query($dbcon, "SELECT concat(s.firstname,' ',s.lastname) name,
                                            s.class,v.academic,v.admissionno,
                                            v.attendance,v.createdon,v.createdby
                                            FROM studentsattendance v,studentprofile s WHERE v.id=$id");
                                            while($res = mysqli_fetch_array($result))
                                            {
												$academic =	$res['academic'];
                                              
                                                $createdon =	$res['createdon'];
												$admissionno = $res['admissionno'];                                                                                      
												$attendance 	 =	$res['attendance'];
                                                $name 	 =	$res['name'];
                                                $class 	 =	$res['class'];
											
                                            }
                                        }

                                        ?>	

                                    	<div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Date
                                            <span class="text-danger"></span></label>
                                        <input type="date" class="form-control form-control-sm" name="createdon"  value="<?php echo $createdon;?>" />
                                    </div>
                                    </div>

									<div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                                <select  id="academic" onchange="onlocode(this)"  class="form-control form-control-sm" name="academic">
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

                                    <div class="form-group col-md-4">
                                        <label>Admission No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="admissionno"   class="form-control" autocomplete="off" value="<?php echo $admissionno;?>" />
                                    </div>
                                </div>
                                
                                <div class="form-row">   
                                <div class="form-group col-md-4">
                                        <label>Student Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="name"   class="form-control" autocomplete="off" value="<?php echo $name;?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Class<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" readonly name="class"   class="form-control" autocomplete="off" value="<?php echo $class;?>" />
                                    </div>                                
                                </div>
                                
                                    
									
                                    <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-info">Edit Attendance&nbsp;</h5>
                                   
                                </div>
                                    
                                     
                                    
                                    <div class="form-row">
								<div class="form-group col-md-8">
								<div class="checkbox"><label> Student's Current Attendance Status</label>&nbsp;&nbsp;
									Present <input type="radio" name="attendance" value="P"  <?php echo ($attendance=='P')?"checked":"";?> />	
									&nbsp;&nbsp;Absent <input type="radio" name="attendance" value="A"  <?php echo ($attendance=='A')?"checked":"";?> />
								</div>
								 </div>
                                 
								 </div>

                                    
                                    
                                    
                                    <!--div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label><span class="text-secondary">Van Fees</span></label>
                                        <input type="text" class="form-control form-control-sm" name="vanfees"  readonly value="<?php echo $vanfees;?>" />                               
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


</body>
</html>