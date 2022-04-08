<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Leave Type List</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li   class="breadcrumb-item active" ><a href="leaveNavBar.php">Back to Menu Bar</li></a>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            <!-- Leave Type Modal starts here -->
								<!-- Modal -->
                               <!-- Modal -->
									<div class="modal fade custom-modal" id="customModalcustype1" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel2">Add Leave Type</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form action="#" enctype="multipart/form-data" method="post">
										  
												<div class="form-group">
													<input type="text" class="form-control" name="addcustype"  id="addcustype"  placeholder="Add Leave Type">
												</div>
												<div class="form-group">
												<textarea id="adddescription" name="adddescription" placeholder="add description" rows="4" cols="67">
												</textarea>

												<!--div class="form-group">
													<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="description">
												</div-->
											</div>
											
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" name="submitcustype" id="submitcustype" class="btn btn-primary">Save</button>
										  </div>
										</div>
									  </div>
									</div>
									</div>
									</div>
								
								<!-- Modal Ends-->	
								
								<!-- Modal Ends-->	
							<!-- Leave Type Modal Ends Here-->	

			
			<div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
                            <div class="card mb-3">
                                <div class="card-header">
											<span class="pull-right">
									
                                        
                                <a role="button" href="#custom-modal" class="btn btn-warning" data-target="#customModalcustype1" data-toggle="modal">
								<i class="fa fa-user-plus" aria-hidden="true"></i>Add New Leave Type</a><br>

                               
                        </div> <!--Card Header-->


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Leave Type</th>	                                            										
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>										
                                    <tbody>

                                        <?php												
                                        include("database/db_conection.php");//make connection here
                                        $sql = "SELECT leavetype,description,id from leavetypes order by id asc";
                                        		$result = mysqli_query($dbcon,$sql);
												if ($result->num_rows > 0){
												while ($row =$result-> fetch_assoc()){
													$row_id=$row['id'];
												echo "<tr>";
												echo '<td>' .$row['id']. '</td>';											
												echo '<td>' .$row['leavetype'].'</td>';                                               
                                                echo '<td>' .$row['description'].'</td>';
                                                

                                                echo '<td><a href="editLeaveType.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>

													<a onclick="delete_record(this);" id="deleteItemCategory" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
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
                                                  window.location.href = 'deleteLeaveType.php?id='+row_id;
                                               }
                                            }
											 </script>    </tbody>
                                </table>
                            </div>

                        </div>														
                    </div><!-- end card-->			
                </div>
                <script>

$('document').ready(function(){
	//addGroupnames_ajax.php
	$('#submitcustype').click(function(){
		var description = $('#adddescription').val();

		var leavetype = $('#addcustype').val();
		//alert(custype+description);
		$.ajax ({
           url: 'insertLeaveTypeModal.php',
		   type: 'post',
		   data: {
				  leavetype:leavetype,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					var new_option ="<option>"+response+"</option>";
					$('#leavetype').append(new_option);
					 $('#customModalcustype1').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting customer type,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	
<?php include('footer.php');?>		

			
