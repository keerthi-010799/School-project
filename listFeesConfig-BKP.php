<?php include('header.php'); ?>
	<!-- End Sidebar -->
<?php $ums = 0; ?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Fees Configuration</h1>
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
								<form autocomplete="off" action="exportStudents.php"  method="post">
										
									<!--div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-secondary btn-sm"  name="exportStudents" value="CSV Export"/>
										</div>
									</div-->

									<!-- The below script is used to fectch class wise Data filter -->

									<script src="jquery.js"></script>
									<script>
										$(document).ready(function()
										{
											$("#fetchval").on('change',function()
											{
												var keyword = $(this).val();
												$.ajax(
												{
													url:'fetchFeeConfig.php',
													type:'POST',
													data:'request='+keyword,
													
													beforeSend:function()
													{
														$("#table-container").html('Working...');
														
													},
													success:function(data)
													{
														$("#table-container").html(data);
													},
												});
											});
										});
										
									</script>
								
																															
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="fetchval"  class="form-control form-control-sm"  name="fetchby">
                                             <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT distinct class FROM feesconfig order by class asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>

										<!-- The below script is used to fectch academic wise Data filter -->

									<script src="jquery.js"></script>
									<script>
										$(document).ready(function()
										{
											$("#fetchval2").on('change',function()
											{
												var keyword = $(this).val();
												$.ajax(
												{
													url:'fetchFeeConfig2.php',
													type:'POST',
													data:'request='+keyword,
													
													beforeSend:function()
													{
														$("#table-container").html('Working...');
														
													},
													success:function(data)
													{
														$("#table-container").html(data);
													},
												});
											});
										});
										
									</script>

										<div class="form-group col-md-3">                                        
                                         <select id="fetchval2"   class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT distinct academic FROM feesconfig where status = 'Y' order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>

										<!-- The below script is used to refresh the page and associated to button-->
										<script>
											$(document).ready(function(){
												$("button").click(function(){
													location.reload(true);
												});
											});
										</script>
											<div class="form-group col-md-3">
											<!--input type="submit" class="btn btn-secondary btn-sm" name="search" value="Search"-->
											<button type="button">Refresh </button>   
                                        </div>
										</div>

								
										
										
                                    </form>
                                    
								
									<div class="table-responsive">
									<table id="table-container" class="table table-bordered table-hover display">
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
										<tfoot>
            <tr>
		
               <td colspan = "5" >Total</td>
			   <td >0</td>
		</tr>
         </tfoot>
									
																		
										<tbody>
										
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT f.academic,f.feescode,c.class,f.feesname,f.amount,f.gender,f.duedate, 
													f.status,f.id FROM feesconfig f,class c
													WHERE f.class = c.id
													ORDER BY f.class";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
													echo "<tr>";
													echo '<td>' .$row['id'] . '</td>';
													echo '<td>'.$row['academic'].' </td>';
													echo '<td>'.$row['class'].' </td>';
													echo '<td>'.$row['gender'].' </td>';
													echo '<td>'.$row['feesname'].' </td>';
													echo '<td>'.$row['amount'].' </td>';
													echo '<td>'.$row['duedate'].' </td>';
													echo '<td>'.$row['status'].' </td>';
													
													echo '<td><a href="editFeesConfig.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
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
																	window.location.href = 'deleteFeesConfig.php?id='+RecordId;
																}
															}
													</script>
														
									</tbody>
									
  </tfoot>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->			
							</div>

<?php include('footer.php'); ?>