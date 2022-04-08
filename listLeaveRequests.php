<?php include('header.php');?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Leave Requests</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active"><a href="leaveNavBar.php">Back to Menu Bar</li></a>
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
										<a href="addLeaveRequests.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add New Leave Request  </a></span>
										
									<h3><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>&nbsp;List Leave Requests</h3>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
											
											       <th style="width:50px">#</th>	
											       <th style="width:20px">Employee Name</th>																									
													<th style="width:50px">Leave Policy</th>
													<th style="width:230px">Requested Days</th>
													<th style="width:230px">Days Available</th>	
                                                    <th style="width:230px">Reason</th>													
																								
													<th style="width:20px">Created On</th>	
													<th style="width:20px">Requested By</th>
													<th style="width:20px">Approved By</th>
                                                    <th style="width:40px">Status</th>																														
													<th style="width:20px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT l.id,l.empName,l.leaveType,l.fromDate,
													l.toDate, ((DATEDIFF(l.toDate,l.fromDate)) - ((WEEK(l.toDate) - WEEK(l.fromDate)) * 2) - (case when weekday('l.toDate') = 6
													 then 1 else 0 end) - (case when weekday('l.fromDate') = 5 then 1 else 0 end)) as requestedDays, 
													 e.setDays-spent as availableDays,l.status,l.reason,l.createdon,l.createdby,l.updatedby 
													FROM leaverequest l, entitlement e WHERE l.leaveType = e.leaveType AND l.empName = e.empName
													ORDER BY l.id ASC";					
													
													
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
													echo "<tr>";
													echo '<td>' . $row['id'] . '</td>';
													//echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													//echo '<td>'.$row['year'] .'</td>';
													//echo '<td>'.$row['leaveType'].'<br /></td>';
													echo '<td>'.$row['empName'].'<br><a href="approveLeaveRequest.php?id=' . $row['id'] . '">Approve</a>&nbsp;|&nbsp;<a href=#>Reject</a></td>';
													echo '<td>'.$row['leaveType'].'</td>';
                                                    echo '<td>'.$row['fromDate'].'--'.$row['toDate'].'<br></b><span style="background-color:orange;text-align:center;">
																	<span style="color:white;text-align:center;">'.$row['requestedDays'].' <span style="background-color:orange;text-align:center;">
																	<span style="color:white;text-align:center;">[Days]</td>';
                                                  //  echo '<td>'.$row['toDate'].'</td>';
													echo '<td>'.$row['availableDays'].' Day[s]</td>';
													echo '<td>'.$row['reason'].'</td>';	
												
													
													echo '<td>'.$row['createdon'].'</td>';	
													echo '<td>'.$row['createdby'].'</td>';
													echo '<td>'.$row['updatedby'].'</td>';														
													
													//echo '<td>'.$row['handler'].'</td>';													
												?>
													
												
													</td>
														<td><?php if($row['status']=='Y'){
																	echo '<span style="background-color:green;text-align:center;">
																	<span style="color:white;text-align:center;">Approved';
																}else if($row['status']=='N'){
																	echo '<span style="background-color:orange;text-align:center;">
																	<span style="color:white;text-align:center;">Pending';
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
                                                  window.location.href = 'deleteLeaveRequest.php?id='+row_id;
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