<?php include('header.php');?>


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Customer Leads</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Customer Leads</li>
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
										<a href="" class="btn btn-primary btn-sm"></i>
										</a></span>
										
										
									<h3<i class="fa fa-bank smallfonts" aria-hidden="true"></i><b> List Leads </b></h3>
								</div>
								
										
								
								<div class="card-body">
								
								<form autocomplete="off" action="exportOnlineAdmissions.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-secondary btn-sm"  name="exportStudents" value="CSV Export"/>
										</div>
									</div>
									</form>
								
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  
												  	<th style="width:20px">#</th>
													<th style="width:60px">Logo</th>
													<th style="width:230px">Reference#</th>
													<th style="width:40px">Business Name</th>
													<th style="width:20px">Contact Name</th>
													<th style="width:20px">Country</th>
													<th style="width:20px">City</th>
													<th style="width:20px">Received On</th>
													<th style="width:20px">Mobile</th>
													<th style="width:20px">Email</th>
													<th style="width:40px">Actions</th>
													</tr>
												
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													
													$sql = "SELECT id,logoImage, referenceid,orgname,contactname,country,city,mobile,email,receivedon FROM sw_requirements ORDER by ID ASC";
															  
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
													
													echo "<tr>";
													echo '<td>'.$row['id'].'<br /></td>';
													echo '<td><img style="max-width:100px; height:65px;" src="../assets/logoImages/'.$row['logoImage'].'"/>';
													echo '<td>'.$row['referenceid'] .'</td>';
													echo '<td>'.$row['orgname'].'<br /></td>';
													echo '<td>'.$row['contactname'].'</td>';
													echo '<td>'.$row['country'].'</td>';
													echo '<td>'.$row['city'].'</td>';
													echo '<td>'.$row['receivedon'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													echo '<td>'.$row['email'].'</td>';
													?>
													<!--<td><?php if($row['instype']==1){
																	echo 'School';
																}else if($row['instype']==2){
																	echo 'College';
																}
																else{
																	echo "";
																}	 ?>
													</td-->
													
													<?php
													
													//echo '<td>'.$row['courseType'].'</td>';
													//echo '<td>'.$row['courseStudy'].'</td>';
													//echo '<td>'.$row['mobile'].'</td>';
													//echo '<td>'.$row['createdOn'].'</td>';
													
													
												echo '<td><a href="editInstituteProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
													<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a onclick="delete_record(this);" id="compProfDelete" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
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
                                                  window.location.href = 'deleteOnlineAdmission.php?id='+row_id;
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