<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left fa fa-th-list bigfonts alert-info">List Route</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Route List</li>
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
										<a href="addRoute.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Route</a></span>
								
									<h3><i class="fa fa-bus bigfonts" aria-hidden="true fa-th-list bigfonts"></i><b> List route </b></h3>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#</th>												
												<th>Route#</th>
													<th>Driver Name</th>
														<th>Mobile</th>
												<th>Pickup Points</th>
												<th>Actions</th>
											</tr>
										</thead>										
										<tbody>
										
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT routeno,driverName,mobile,pickuppoints, id FROM route";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
													echo "<tr>";
													echo '<td>' .$row['id'] . '</td>';
													echo '<td>'.$row['routeno'].' </td>';
													echo '<td>'.$row['driverName'].' </td>';
													echo '<td>'.$row['mobile'].' </td>';
													echo '<td>'.$row['pickuppoints'].' </td>';
													
													
													echo '<td><a href="editRoute.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a href="javascript:deleteRecord_8(' . $row['id'] . ');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
													echo "</tr>";
													}
													}
													?>						
															<script>
															function deleteRecord_8(RecordId)
															{
																if (confirm('Confirm delete')) {
																	window.location.href = 'deleteRoute.php?id='+RecordId;
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