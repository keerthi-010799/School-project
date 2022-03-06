<?php include('header.php'); ?>
	<!-- End Sidebar -->


<script type="text/javascript">
    function checkAll(checkname, bx) {
        for (i = 0; i < checkname.length; i++){
            checkname[i].checked = bx.checked? true:false;
        }
    }
    function checkPage(bx){


        var bxs = document.getElementByTagName ( "table" ).getElementsByTagName ( "link" ); 

        for(i = 0; i < bxs.length; i++){
            bxs[i].checked = bx.checked? true:false;
        }
    }
</script>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List New Admissions-2020-21</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List  New Admissions 2020-21</li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->
						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
								
										<span class="pull-right">
										<a href="addStudentProfile.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Student Profile</a></span>
									<i class="" aria-hidden="">List Students</i>
								</div>
								
								<div class="card-body">
                                    
                                    <form autocomplete="off" action="exportNewAdmissions2021.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-secondary btn-sm"  name="exportStudents" value="CSV Export"/>
										</div>
									</div>
								
																															
                                    <!--div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class">
                                             <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT DISTINCT class FROM studentprofile order by class asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
										<div class="form-group col-md-3">
                                        
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic where status = 'Y' order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>
											<div class="form-group col-md-3">
											<input type="submit" class="btn btn-secondary btn-sm" name="search" value="Search">
								
                                        </div>
										</div-->
										
										
                                    </form>
                                    
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  	<!--th style="width:20px">Logo</th-->
													<th style="width:10px">Mark All&nbsp;<input type="checkbox" id="ckbCheckAll"></th>
													<th style="width:30px">#</th>													
													  <!--th style="width:30px">Picture</th-->
													<!--th style="width:40px">Academic</th-->
													<th style="width:30px">Temp Admn#</th>
													<th style="width:40px">Name</th>
													<th style="width:20px">Class</th>
													<th style="width:20px">DOB</th>
													<th style="width:20px">Parent</th>
												    <th style="width:20px">Mobile</th>
													<th style="width:20px">Registred On</th>
													<!--th style="width:20px">Academic</th-->												  
													<!--th style="width:230px">Status</th-->
													<!--th style="width:20px">Actions</th-->
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT id,admissionid,studentname,class,dob,
													fathername,concat(fmobile,',',mmobile) as mobile,admission_date,status FROM new_admission WHERE status = 1 order by id asc";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td><input type="checkbox" class="checkBoxClass" name="selectedCheckbox[]" value='.$row['id'].'/></td>';	
echo '<td>'.$row['id'].'<br /></td>';
													 														
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													//echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													echo '<td>'.$row['admissionid'].'<br /></td>';
													echo '<td>'.$row['studentname'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['class'].'</td>';
													echo '<td>'.$row['dob'].'</td>';
													echo '<td>'.$row['fathername'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													echo '<td>'.$row['admission_date'].'</td>';
													//echo '<td>'.$row['status'].'</td>';
												?>
													<!--td><?php if($row['status']=='1'){
																	echo 'Active';
																}else if($row['status']==''){
																	echo 'Inactive';
																}else{
																	echo "";
																}	 ?>
													</td-->
												  
													<?php
													//echo '<td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
													//	<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													//<a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													//<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
													//	<!--a onclick="print_record(this);" id="printStudentProfile" data-id="' . $row_id . '" class="btn btn-secondary btn-sm"  data-title="Print">
												//	<i class="fa fa-print" aria-hidden="true"></i></a></td-->';                                               
														
													//	echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
                                            function delete_record(x)
                                            {
     
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                  window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                               }
                                            }
											$(document).ready(function () {

												$("#ckbCheckAll").click(function () {											
													$(".checkBoxClass").attr('checked', this.checked);
													
													$('input[name="selectedCheckbox"]:checked').each(function() {
											   console.log(this.value);
											});
												});
											});
											
											
											 </script>
									</tbody>
									</table>
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>
							
							

<?php include('footer.php'); ?>
							
							