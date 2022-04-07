<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left"><i class="fa fa-calendar-o bigfonts" aria-hidden="true"></i>List Fees Collected</h1>
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
										<a href="FeesCollection.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Fees Collection</a></span>
								
									</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#</th>												
												<th>Class</th>
												<th>Academic Year</th>
												<th>Admission No </th>
												<th>Fees Name</th>
												<th>Total Fees</th>
                                                <th>Fees Paid</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>										
										<tbody>
																				
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT * FROM fees_management";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){																				
													echo "<tr>";
													echo '<td>' .$row['fee_id'] . '</td>';
													echo '<td>'.$row['fee_class'].' </td>';
													echo '<td>'.$row['fee_academic_year'].' </td>';
													echo '<td>'.$row['fee_admission_no'].' </td>';
													echo '<td>'.$row['fee_type'].' </td>';
													echo '<td>'.$row['fee_total_amt'].' </td>';
													echo '<td>'.$row['fees_paid'].' </td>';
													echo '<td> '.$row['fee_status'].' </td>';													 												
													echo '<td>';
													echo '    <div class="dropdown">
					  <button type="button" class="btn btn-light btn-xs dropdown-toggle" data-toggle="dropdown">
					  </button>
	  					<div class="dropdown-menu">
	  						<a class="dropdown-item"  href="#" onclick="ToPrint(this);" data-template="printreciept" data-code="'.$row['fee_id'].'" data-img="assets/images/logo.png"  data-id="po_print"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>  ';
	
													if($row['fee_status']=="Created"){
														echo ' <a class="dropdown-item" href="addInvoice.php?inv_code=' . $row['fee_id'] . '&action=edit&type=invoices" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Edit</a>';   
														echo '
															<a class="dropdown-item"  href="#" onclick="deleteRecord_8(this);" data-id="'.$row['fee_id'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Delete</a>';
	
														echo '
															<a class="dropdown-item"  href="workers/setters/invconverter.php?fee_id='.$row['fee_id'].'&fee_status=Verified" data-id="'.$row['fee_id'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Verified</a>';
	
													}
	
													if($row['fee_status']=="Verified"){
															echo '
															<a class="dropdown-item"  href="#" onclick="deleteRecord_8(this);" data-id="'.$row['fee_id'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Delete</a>';
														}
													echo '    </div></div>';	
													echo ' </td>';
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
					function ToPrint(el){
                        var code= $(el).attr('data-code');
                        var template= $(el).attr('data-template');
                                window.location.href = template+'.php?fees_id='+code;

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