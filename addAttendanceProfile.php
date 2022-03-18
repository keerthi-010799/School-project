<?php
include("database/db_conection.php");//make connection here
$admnoFound ='';

/*$con = mysqli_connect("localhost","root","root","dhirajpro");
	// Check connection
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/
//$academics = "SELECT CONCAT( YEAR(CURDATE()) , '-', YEAR( CURDATE()) +1 )as Academic";
  
if(isset($_POST['submit']))
{	
    
//$admnoFound ='';
// $prefix = "";
 //$postfix = "/";
 //$today = date("dmy");
 
 $academic =$_POST['academic'];
 $admissionno =$_POST['admissionno'];
 $firstname =$_POST['firstname'];
 $lastname =$_POST['lastname'];
 
 $class =$_POST['class'];
 $section =$_POST['section'];
 
 $fathername =$_POST['fathername'];
 
 
 $mobile =$_POST['mobile'];
 

   		

 
 
 $check_admno_query="select admissionno from studentsattendance WHERE admissionno='$admissionno'";
    $run_query=mysqli_query($dbcon,$check_admno_query);
	if(mysqli_num_rows($run_query)>0)
    {
		
       $admnoFound = "Admission no: '$admissionno''already exist in our database, Please try another one!";
      
    }
//    else{	$sql = 'Insert....
 
 else{ $sql = "INSERT into studentsattendance(`academic`,`admissionno`,`firstname`,`lastname`,`class`,`section`,
                                    `fathername`,`mobile`                         
								    )
				VALUES ('$academic','$admissionno','$firstname','$lastname','$class','$section','$fathername','$mobile')";

 // Inserting Log details into log table
echo "$sql";
        
  
 if(mysqli_query($dbcon,$sql))
 {
     header("location:addStudentsAttendance.php");
 }   else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('Student creation unsuccessful ')</script>";
 }
}
}
?>
<?php include('header.php');?>
<!-- End Sidebar -->

<!-- Modal Academic-->
								<div class="modal fade custom-modal" id="customModalAcademic" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Academic</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addacademic"  id="addacademic"  placeholder="ex. 2020-21">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitacademic" id="submitacademic" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	


		
<!-- Modal Areaname-->
								<div class="modal fade custom-modal" id="customModalAreaname" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Areaname</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addareaname"  id="addareaname"  placeholder="Enter Areaname">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="addamount" id="addamount"  placeholder="Fees Amount">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitareaname" id="submitareaname" class="btn btn-primary">Save and Associate</button>
									  </div>
										   
								  </div>
										  
								</div>
								</div>
	<!-- Modal Ends-->	

	<!-- Modal Class/Course-->
								<div class="modal fade custom-modal" id="customModalClass" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Add Class/Course</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  	<form action="#" enctype="multipart/form-data" method="post">
									  
											<div class="form-group">
												<input type="text" class="form-control" name="addclass"  id="addclass"  placeholder="ex. LKG,UKG,X,XI,B.Sc.">
											</div>
										 
										
											
										 
											<div class="form-group">
												<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="Description">
											</div>
										</div>
										
										
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" name="submitclass" id="submitclass" class="btn btn-primary">Save and Associate</button>
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
                        <h1 class="main-title float-left">Attendance Profile </h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Attendance Profile</li>
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
                            <!--h3><i class="fa fa-user-plus bigfonts" aria-hidden="true" ></i>&nbsp;&nbsp;<small>You are currently adding student profile details<small></h3>
                            <!--h3 class="fa-hover col-md-12 col-sm-12">
                                 Purchase Item Master
                            </h3-->
                                <p class="text-danger"><?php echo $admnoFound;?></p> </h3>
                        </div>
						
                                         
                        
                        
                        <div class="card-body">
                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    
							<div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-warning">Add Attendance Details&nbsp;</h5><br>
                               </div>
									
                                <div class="form-row">
                                    <div class="form-group col-md-7 ">
                                    <label for="inputState"><span class="">Academic</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic order by id DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
												<!--a href="#custom-modal" data-target="#customModalAcademic" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Academic</a><br-->
								
												
                                </div>
								
							
									
                                    <div class="form-group col-md-5">
                                        <label><span class="">Admission No.</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="admissionno" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label><span class="">First Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="firstname" placeholder="First Name" required class="form-control" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><span class="">Last Name</span><span class="text-danger"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="lastname" placeholder="Initial"   autocomplete="off" />
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState"><span class="">Class</span><span class="text-danger">*</span></label>
                                                <select required id="class" onchange="onlocode(this)"  class="form-control form-control-sm" name="class">
                                                    <option value="">-Select Class/Course-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ORDER BY id ASC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                    
                                                </select>
												<!--a href="#custom-modal" data-target="#customModalClass" data-toggle="modal">
												<i class="fa fa-user-plus" aria-hidden="true"></i>New Class/Course</a><br-->
												
    
                                    </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Section</span></label>
                                                <select id="section" onchange="onlocode(this)"  class="form-control form-control-sm" name="section">
                                                    <option value="">-Open Section-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $section=$row['section'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$section.'" >'.$section.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
								</div>
                                
                               
                                
                               
                             
                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><span class="">Father Name</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="fathername" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                              
                                    <div class="form-group col-md-6">
                                        <label><span class="">Mobile</span><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="mobile" placeholder="" required class="form-control" autocomplete="off" />
                                    </div>
                                                </div>
                                
                               
                                




                                <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                        <input type="hidden" name="id" >
                                        &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                        Submit
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
   


    <!--script>
        $('document').ready(function(){	
            $('#submitcategory').click(function(){
                var category = $('#addcategory').val();
                //var suptype = $('#addsupptype').val();
                //alert(groupname+description);
                $.ajax ({
                    url: 'addCategoryModal.php',
                    type: 'post',
                    data: {
                        category:category,
                        // description:description
                    },
                    //dataType: 'json',
                    success:function(response){
                        if(response!=0 || response!=""){
                            var new_option ="<option>"+response+"</option>";
                            $('#category').append(new_option);
                            $('#customModal').modal('toggle');
                        }else{
                            alert('Error in inserting new Category,try another unique category');
                        }
                    }

                });

            });
        });

    </script-->			

		<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitareaname').click(function(){
		var areaname = $('#addareaname').val();
		var amount = $('#addamount').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addAreaNameModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  areaname:areaname,
				  amount:amount
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#areaname').append(new_option);
					 $('#customModalAreaname').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Areaname,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	


		<script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitacademic').click(function(){
		var academic = $('#addacademic').val();
		var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addAcademicModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  academic:academic,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#academic').append(new_option);
					 $('#customModalAcademic').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Academic,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	

<script>
$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitclass').click(function(){
		var class = $('#addclass').val();
		var description = $('#adddescription').val();
		
		//alert($partyname);
		$.ajax ({
           url: 'addClassModal.php',
		   type: 'post',
		   data: {
				  //custype:custype,
				  class:class,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#class').append(new_option);
					 $('#customModalClass').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting Class,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>                                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->
    <?php include('footer.php');?>

