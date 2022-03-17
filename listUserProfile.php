<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Users</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Users</li>
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
										<a href="addUsers.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add User</a></span>
										
									<h3><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>&nbsp;List Users</h3>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											 <tr>   <th style="width:20px">User ID</th>
															<th>User Details</th>
													
													<!--th style="width:20px"> Username</th-->
													<th style="width:10px">Role</th>
													<th style="width:15px">Designation</th>
													<!--th style="width:10px">Org ID</th-->
													<th style="width:50px">Mobile</th>
													<th style="width:90px">Handled By</th>
													<th style="width:10px">Status</th>
													<th style="width:100px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT userid,image_name,username,groupname,designation,concat(firstname,' ',lastname) as fullname,mobile,
													useremail,compcode,status,id FROM userprofile";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
												    $row_id=$row['id'];
													echo "<tr>";
													
													echo '<td>' . $row['userid'] . '</td>';
													echo '<td><span style="float: left; margin-right:10px;"><img width="50px"  
													class="avatar-rounded" style="max-width:40px; height:auto;" src="'.$row['image_name'].'"/><strong>'.$row['fullname'].'<br/><small>'.$row['useremail'].'</small></td>';
													
													//echo '<td> <strong>' . $row['username'] . '</td>';													
													echo '<td>' . $row['groupname'] . '</td>';
													echo '<td>' . $row['designation'] . '</td>';
													//echo '<td>'.$row['fullname'].'<br /></td>';
													//echo '<td><small>'.$row['useremail'].'</td>';
													//echo '<td>'.$row['compcode'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													echo '<td>'.$row['username'].'</td>';
													?>
													<td><?php if($row['status']==1){
																	echo 'Active';
																}else if($row['status']==0){
																	echo 'Inactive';
																}
																else{
																	echo "";
																}	 ?>
													</td>
													
										<?php
													echo '<td><a href="myProfile.php" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="view">
													<i class="fa fa-eye" aria-hidden="true"></i></a>											
													
													<a href="editUser.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a onclick="delete_record(this);" id="deleteUsers" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
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
                                                  window.location.href = 'deleteUsers.php?id='+row_id;
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
							
							