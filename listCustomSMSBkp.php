<?php include('header.php'); ?>
	<!-- End Sidebar -->


<!-- Modal 1 starts here-->
 <div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Route SMS Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" enctype="multipart/form-data" method="post">							
                                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Numbers<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="populate numbers with comma seperated"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="Type message here"></textarea>
                                    </div>
                                </div>                                                </form>
                                                    </div>

                                                <div class="modal-footer-center">
                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="submitgroup" id="submitgroup" class="btn btn-primary">Send SMS</button>
                                                    
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
            </div>
<!--Modal 1 ends-->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Custom Messages</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Custom Messages</li>
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
								
										<!--span class="pull-right">
										<a href="addStudentProfile.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Student Profile</a></span-->
										
									<h3>&nbsp;Custom Messages</h3>
								</div>
								
								<div class="card-body">
                                
                                    <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                         <label for="inputState">Class/Course<span class="text-danger"></span></label>
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class">
                                             <option value="">-Select Class/Course-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class order by class asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                         <label for="inputState">Route<span class="text-danger"></span></label>
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="section">
                                             <option value="">-Select Section-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section order by section asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $section=$row['section'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$section.'" >'.$section.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </form>

                                        
                                    
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  	<!--th style="width:20px">Logo</th-->
													<th style="width:50px"> ID</th>
													<!--th style="width:230px">Picture</th-->
													<!--th style="width:40px">Type</th-->
													<th style="width:30px">Admn#</th>
													<th style="width:40px">Name</th>
													<th style="width:20px">Class/Course</th>
													<th style="width:20px">Route#</th>
												    <th style="width:20px">Mobile</th>
													<th style="width:20px">Academic</th>
												    <th style="width:20px">Status</th>
													<th style="width:20px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) as name,concat(class,' / ',section) as classsec,
													fathername,mobile,academic,routeno,status FROM `studentprofile` order by id asc";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
                                                       // echo '<td>'.$row[''].'<br /></td>';
													

													
													//echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
													echo '<td>'.$row['routeno'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													echo '<td>'.$row['academic'].'</td>';
														?>
													<td><?php if($row['status']==1){
																	echo 'Active';
																}else if($row['status']==0){
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
                                                
														</td>';                                               
														
														echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
                                            function delete_record(x)
                                            {
                                                console.log(x);
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                  window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                               }
                                            }
											 </script>
									</tbody>
									</table>
									
                                        <!--form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    <!--div class="form-row">
                                    <div class="form-group col-md-8">
                                         
                                        <label>Numbers<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder=""></textarea>
                                    </div>
                                </div-->
                                
                                <!--div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="4" placeholder="Type message here"></textarea>
                                    </div>
                                </div-->
                                            
                                            
                                     
                            	
							
							</div><!-- end card-->			
							</div>
							
<?php include('footer.php'); ?>
							
							