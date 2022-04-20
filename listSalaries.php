<?php include('header.php');?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Salaries</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Salaries</li>
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
										<a href="assignSalary.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Assign Salary </a></span>
										
									<h3><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>&nbsp;List Salaries</h3>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
											
											       <th style="width:50px">#</th>>											       																								
													<th style="width:50px">Emp ID</th>
													<th style="width:230px">Full Name</th>													
													<th style="width:40px">Type</th>													
													<th style="width:40px">Gross Salary</th>
													<th style="width:20px">PF(%)</th>	
                                                    <th style="width:20px">Professional Tax</th>													
													<th style="width:20px">Status</th>													
													<th style="width:20px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT s.empid, concat(e.firstname,' ',e.lastname) as fullname ,e.type,
													s.grosssal,s.PF,s.PT,s.status,s.id FROM salrystructure s,employees e
													WHERE  s.status ='Y' AND s.empid = e.empid
													order by s.id asc";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
													echo "<tr>";
													echo '<td>' . $row['id'] . '</td>';
												//	echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													echo '<td>'.$row['empid'] .'</td>';
													echo '<td>'.$row['fullname'].'<br /></td>';
													echo '<td>'.$row['type'].'</td>';
													echo '<td>'.$row['grosssal'].'</td>';
													echo '<td>'.$row['PF'].'</td>';
													//echo '<td>'.$row['deptMgr'].'</td>';
													echo '<td>'.$row['PT'].'</td>';
												//	echo '<td>'.$row['mobile'].'</td>';																								
													//echo '<td>'.$row['handler'].'</td>';													
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
													
													
													echo '<td><a href="editEmployeeProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a onclick="delete_record(this);" id="vendorProfDelete" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
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
                                                  window.location.href = 'deleteEmployees.php?id='+row_id;
                                               }
                                            }
											 </script>
									</tbody>
									</table>
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>

<?php include('footer.php');?>