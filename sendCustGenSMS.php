<?php include('header.php'); ?>
	<!-- End Sidebar -->


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
										<a href="" class="btn btn-primary btn-sm"><i class="fa fa-send-o bigfonts" aria-hidden="true"></i>
										Send SMS</a></span>
										
									<h3><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>&nbsp;List Students</h3>
								</div>
								
								<div class="card-body">
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
													<th style="width:20px">Parent</th>
												    <th style="width:20px">Mobile</th>
													<!--th style="width:20px">Academic</th-->
												    <!--th style="width:20px">Status</th-->
													<th style="width:20px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) as name,concat(class,' / ',section) as classsec,
													fathername,mobile,academic,status FROM `studentprofile`where status='1' order by id asc";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
													
													//echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
													echo '<td>'.$row['fathername'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													//echo '<td>'.$row['academic'].'</td>';
														?>
													<!--td><?php if($row['status']==1){
																	echo 'Active';
																}else if($row['status']==0){
																	echo 'Inactive';
																}else{
																	echo "";
																}	 ?>
													</td-->
													
													<?php
													echo '<td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-send-o bigfonts" aria-hidden="true"></i>SMS&nbsp;</a>
													
													<!--a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
														<a onclick="print_record(this);" id="printStudentProfile" data-id="' . $row_id . '" class="btn btn-secondary btn-sm"  data-title="Print">
													<i class="fa fa-print" aria-hidden="true"></i></a--></td>';                                               
														
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
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>
							

<?php include('footer.php'); ?>
							
							