<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left"><i class="fa fa-calendar-o bigfonts" aria-hidden="true"></i>List Fees Configuration</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active"><a href="feesNavBar.php">Fees Navigation Menu Bar</li></a></li>
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
										<a href="configFees.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Fees Configuration</a></span>
								
									</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#</th>												
												<th>Academic</th>
												<th>Class</th>
												<th>Gender</th>
												<th>Fees Name</th>
												<th>Amount</th>
												<th>Due Date</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>										
										<tbody>
										
										
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT * FROM feesconfig";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
													echo "<tr>";
													echo '<td>' .$row['fee_config_id'] . '</td>';
													echo '<td>'.$row['fee_config_academic_year'].' </td>';
													echo '<td>'.$row['fee_config_class'].' </td>';
													echo '<td>'.$row['fee_config_gender'].' </td>';
													echo '<td>'.$row['fee_config_name'].' </td>';
													echo '<td>'.$row['fee_config_amount'].' </td>';
													echo '<td>'.$row['fee_config_duedate'].' </td>';
													echo '<td>'.$row['fee_config_status'].' </td>';
													
													echo '<td><a href="editFeesConfig.php?id=' . $row['fee_config_id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a href="javascript:deleteRecord_8(' . $row['fee_config_id'] . ');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
													echo "</tr>";
													}
													}
													?>															
															<script>
															function deleteRecord_8(RecordId)
															{
																if (confirm('Confirm delete')) {
																	window.location.href = 'deleteFeesConfig.php?id='+RecordId;
																}
															}
													</script>
														
									</tbody>
														
									</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->			
							</div>

<?php include('footer.php'); ?>