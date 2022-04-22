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
													<h1 class="main-title float-left">List Students</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Students</li>
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
                                    
                                    <form autocomplete="off" action="exportStudents.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-primary btn-sm"  name="exportStudents" value="Export Students"/>
										</div>
									</div>
								
																															
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="classwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class">
                                             <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT  class FROM class order by id asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
										<div class="form-group col-md-3">
                                        
                                         <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
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
                                        
										<select id="batchwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Batch-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here

												   $sql = mysqli_query($dbcon, "SELECT distinct batch FROM studentprofile where status = 'Y' order by batch asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $batch=$row['batch'];
													   echo '<option onchange="'.$row[''].'" value="'.$batch.'" >'.$batch.'</option>';
												   }
												   ?>
											   </select>
											   
									   </div>
											<div class="form-group col-md-3">
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Search" onclick="search_filter();">
								
                                        </div>
										</div>
										
										
                                    </form>
                                    
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  	<!--th style="width:20px">Logo</th-->
													<!--th style="width:10px">Mark All&nbsp;<input type="checkbox" id="ckbCheckAll"></th-->
													<th style="width:30px">#</th>													
													  <th style="width:30px">Picture</th>
													<th style="width:40px">Academic</th>
													<th style="width:30px">Admn#</th>
													<th style="width:40px">Name</th>
													<th style="width:20px">Class/Course</th>
													<th style="width:20px">Batch</th>
													<th style="width:20px">Parent</th>
												    <th style="width:20px">Mobile</th>
													<!--th style="width:20px">Academic</th-->												  
													<th style="width:20px">Status</th>
													<th style="width:100px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													// $sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) 
													// as name,concat(class,' / ',section) as classsec,
													// fathername,mobile,batch,academic,status FROM `studentprofile` 
													// ORDER BY id ASC";
													if((isset($_GET['classwise']) && $_GET['classwise']!=='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!='')||(isset($_GET['batchwise'])&&$_GET['batchwise']!='')){
														$classwise = $_GET['classwise'];
														$academicwise = $_GET['academicwise'];
														$batchwise = $_GET['batchwise'];	
														$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) 
														as name,concat(class,' / ',section) as classsec,
														fathername,mobile,batch,academic,status FROM `studentprofile` s where 1=1";										                                            
													 if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
														$sql.=" and s.class='".$_GET['classwise']."'";    
													}
													if(isset($_GET['batchwise'])&&$_GET['batchwise']!=''){
	
														$sql.=" and s.batch='".$_GET['batchwise']."'";    
													}
													if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
														$sql.=" and s.academic='".$_GET['academicwise']."'";    
													}
	
													}else{
													
														$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) 
														as name,concat(class,' / ',section) as classsec,
														fathername,mobile,batch,academic,status FROM `studentprofile` 
														ORDER BY id ASC";													}
																											
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
													// echo '<td><input type="checkbox" class="checkBoxClass" name="selectedCheckbox[]" value='.$row['id'].'/></td>';
												//	echo '<td>'.$row['id'].'<br /></td>';
													
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													echo '<td>'.$row['academic'].'<br /></td>';
													//echo '<td>'.$row['admissionno'].'<br><a href="?id=' . $row['id'] . '">Bonafide</a>&nbsp;</td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
													echo '<td>'.$row['batch'].'</td>';
													echo '<td>'.$row['fathername'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													//echo '<td>'.$row['academic'].'</td>';
													
													
														?>
													<td><?php if($row['status']=='Y'){
																	echo 'Active';
																}else if($row['status']=='N'){
																	echo 'Inactive';
																}else{
																	echo "";
																}	 ?>
													</td>
												  
													<?php
													echo '<td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
													<a class="btn btn-info btn-sm" onclick="ToPrint(this);" data-code="'.$row['id'].'" data-img="assets/images/schoollogo.jpeg"  data-id="po_print">
													<i class="fa fa-print bigfonts" aria-hidden="true"></i></a></td>';
													 echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
											var page_classwise = "<?php if(isset($_GET['classwise'])){ echo $_GET['classwise']; } ?>";
											var page_batchwise = "<?php if(isset($_GET['batchwise'])){ echo $_GET['batchwise']; } ?>";
											var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";

											
										        function ToPrint(el){
												var code= $(el).attr('data-code');
												window.location.href = 'printBonafideCertificate.php?id='+code; 
                                              }
											function delete_record(x)
                                            {
     
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                  window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                               }
                                            }
											
											
											$(document).ready(function () {
												$('#classwise').val(page_classwise);
												$('#batchwise').val(page_batchwise);
												$('#academicwise').val(page_academicwise);
												$("#ckbCheckAll").click(function () {											
													$(".checkBoxClass").attr('checked', this.checked);
													
													$('input[name="selectedCheckbox"]:checked').each(function() {
											   console.log(this.value);
											});
												});
											});
											function search_filter(){
												var classwise = $('#classwise').val();
												var batchwise = $('#batchwise').val();
												var academicwise = $('#academicwise').val();
												location.href="listStudentProfile.php?classwise="+classwise+"&batchwise="+batchwise+"&academicwise="+academicwise;
											}
											
											 </script>
									</tbody>
									</table>
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>
							
							

<?php include('footer.php'); ?>
							
							