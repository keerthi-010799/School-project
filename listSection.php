listSectionMaster.php
<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">List Section</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li   class="breadcrumb-item active" ><a href="index.php">Home</li></a>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
								<!-- Modal 1 sarts here -->
                               <!-- Modal -->
									<div class="modal fade custom-modal" id="customModalSection" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel2">Add Section Details</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											<form action="#" enctype="multipart/form-data" method="post">
										  
												<div class="form-group">
													<input type="text" class="form-control" name="addSection"  id="addSection"  placeholder="A,B,C,D,E....">
												</div>
												<div class="form-group">
													<input type="text" class="form-control" name="adddescription" id="adddescription"  placeholder="description">
												</div>
											</div>
											
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" name="submitSection" id="submitSection" class="btn btn-primary">Save</button>
										  </div>
										</div>
									  </div>
									</div>
									</div>
									</div>
								
								<!-- Modal Ends-->	

								   <!-- VIEW Modal Starts Here) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Section Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="viewSection.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="view_id" id="view_id">

                        <!-- <p id="fname"> </p> -->
                        <h4 id="section"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>
								
	 <!-- EDIT Modal starts here -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Section </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

				<form action="updateSection.php" method="POST">
					<div class="modal-body">

					<input type="hidden" name="update_id" id="update_id">

					<div class="form-group">
						<label> Section </label>
						<input type="text" name="section1" id="section1" class="form-control"
							placeholder="Enter Section">
					</div>

					<div class="form-group">
						<label> Description</label>
						<input type="text" name="description" id="description" class="form-control"
							placeholder="Enter description">
					</div>
					</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


			
			<div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
                            <div class="card mb-3">
                                <div class="card-header">
											<span class="pull-right">
									
                                        
                                <a role="button" href="#custom-modal" class="btn btn-info" data-target="#customModalSection" data-toggle="modal">
								<i class="fa fa-user-plus" aria-hidden="true"></i>Add New Section</a><br>

                               
                        </div> <!--Card Header-->


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Section</th>	                                            										
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>										
                                    <tbody>

                                        <?php												
                                        include("database/db_conection.php");//make connection here
                                        $sql = "SELECT section,description,id from section order by id asc";
                                        		$result = mysqli_query($dbcon,$sql);
												if ($result->num_rows > 0){
												while ($row =$result-> fetch_assoc()){
													$row_id=$row['id'];
												echo "<tr>";
												echo '<td>' .$row['id']. '</td>';											
												echo '<td>' .$row['section'].'</td>';                                               
                                                echo '<td>' .$row['description'].'</td>';
                                                

                                             //   echo '<td><a href="updateSection.php?id=' . $row['id'] . '" class="btn btn-primary editbtn" data-target="#editmodal" data-toggle="modal">
												//		<i class="fa fa-pencil" aria-hidden="true"></i></a>

														
														echo '<td>
														<button type="button" class="btn btn-secondary btn-sm viewbtn">
														 <i class="fa fa-search" aria-hidden="true"></i>  </button>

														<button type="button" class="btn btn-primary btn-sm editbtn">
														 <i class="fa fa-pencil" aria-hidden="true"></i>  </button>

														 
														 

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
                                                  window.location.href = 'deleteSection.php?id='+row_id;
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
	$('#submitSection').click(function(){
		var description = $('#adddescription').val();
		var section = $('#addSection').val();
		//alert(custype+description);
		$.ajax ({
           url: 'insertSectionMasterModal.php',
		   type: 'post',
		   data: {
				  section:section,
				  description:description
				},
		   //dataType: 'json',
           success:function(response){
				if(response!=0 || response!=""){
					// var new_option ="<option>"+response+"</option>";
					// $('#section').append(new_option);
					//  $('#customModalSection').modal('toggle');
					  window.location.reload(true);
				
				}else{
					alert('Error in inserting customer type,try another one');
				}
			}
        
         });
		 
		 });
});
			
</script>	

<script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "viewSection.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#section1').val(data[1]);
                $('#description').val(data[2]);
               
            });
        });
    </script>
<?php include('footer.php');?>		

			
