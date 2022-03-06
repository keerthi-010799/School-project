<?php include('header.php'); ?>
	<!-- End Sidebar -->


<script type="text/javascript">
    function checkAll(checkname, bx) {
        for (i = 0; i < checkname.length; i++){
            checkname[i].checked = bx.checked? true:false;
        }
    }
    function checkPage(bx){


        var bxs = document.getElementByTagName ( "table" ).getElementsByTagName ( "link" ); 

        for(i = 0; i < bxs.length; i++){
            bxs[i].checked = bx.checked? true:false;
        }
    }
</script>

<!-- Modal 1 starts here-->
 <div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Custom SMS Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" enctype="multipart/form-data" method="post">							
                                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>To Receipients<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="populate numbers "></textarea>
                                    </div>
                                </div>
								 <div class="form-row">
								 <label>Choose SMS to Management<span class="text-danger"></span><input type="checkbox" style="width:20px" id="ckbCheckAll"></label>
								 </div>
                                
								
								<div class="form-row">
                                    <div class="form-group col-md-3">
                                    <label><span class="text-danger"><i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                                                                            data-trigger="focus" data-placement="top" title="Message Text - by default sends English SMS if u want to send Language messagea like Tamil  - message type Unicode has to be selected
                                           "></i>
                                            </span>Message Type</label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <!--option value="">-Select Method-</option-->
                                        <option value="1">Text</option>
                                        <option value="2">Unicode</option>
                                        </select>   
                                </div>   
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="Type message here"></textarea>
                                    </div>
                                </div>                                                </form>
                                                    </div>

                                                <div class="modal-footer-center">
                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="submitgroup" id="submitgroup" class="btn btn-primary">Send SMS</button>
                                                    
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
            </div>
<!--Modal 1 ends-->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Students for Sending Custom Messages</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Students for Sending Custom Messages</li>
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
								
										<!--span class="pull-right">
										<a href="addStudentProfile.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Student Profile</a></span-->
									<i class="" aria-hidden="">List Students for Custom Messages</i>
								</div>
								
								<div class="card-body">
                                    
                                    <form autocomplete="off" action="exportStudents.php"  method="post">
										
									<!--div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-secondary btn-sm"  name="exportStudents" value="CSV Export"/>
										</div>
									</div-->
								
																															
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class">
                                             <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT DISTINCT class FROM studentprofile order by class asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
										<!--div class="form-group col-md-3">
                                        
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT DISTINCT academic FROM studentprofile order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div-->
										
										<div class="form-group col-md-3">
											<input type="submit" class="btn btn-secondary btn-sm" name="search" value="Search">
								
                                        </div>
										
                                        </div>
										
                                    </form>
                                    
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  	<!--th style="width:20px">Logo</th-->
													<th style="width:10px">Mark All&nbsp;<input type="checkbox" id="ckbCheckAll"></th>
													
													<th style="width:40px">Academic</th>
													<th style="width:30px">Admn#</th>
													<th style="width:40px">Name</th>
													<th style="width:20px">Class/Course</th>
													<th style="width:20px">Parent</th>
												    <th style="width:20px">Mobile</th>
													<!--th style="width:20px">Academic</th-->
												    <!--th style="width:20px">Picture</th-->
													<th style="width:23px">Status</th>
													<!--th style="width:20px">Actions</th-->
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) as name,concat(class,' / ',section) as classsec,
													fathername,mobile,academic,status FROM `studentprofile` order by id asc";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														//echo '<td>'.$row['id'].'<br /></td>';
													 echo '<td><input type="checkbox" class="checkBoxClass" name="selectedCheckbox[]" value='.$row['id'].'/></td>';
													
													
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td>'.$row['academic'].'<br /></td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
													echo '<td>'.$row['fathername'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													//echo '<td>'.$row['academic'].'</td>';
												//	echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													
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
													echo '<!--td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a-->
													
													<!--a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a-->
                                                
														<!--a onclick="print_record(this);" id="printStudentProfile" data-id="' . $row_id . '" class="btn btn-secondary btn-sm"  data-title="Print">
													<i class="fa fa-print" aria-hidden="true"></i></a></td-->';                                               
														
														echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
                                            function delete_record(x)
                                            {
     
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                  window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                               }
                                            }>
											<script>
											$(document).ready(function () {

												$("#ckbCheckAll").click(function () {											
													$(".checkBoxClass").attr('checked', this.checked);
													
													$('input[name="selectedCheckbox"]:checked').each(function() {
											   console.log(this.value);
											});
												});
											});
											
											
											 </script>
									</tbody>
									</table>
									 <a role="button" href="#custom-modal" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customModal">Get SMS Form</a>
                                        
                                        <button type="button" name="cancel" class="btn btn-secondary btn-sm m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>
							
							

<?php include('footer.php'); ?>
							
							