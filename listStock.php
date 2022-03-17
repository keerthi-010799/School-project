<?php include('header.php'); ?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Stock</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">list Stock</li>
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
										<a href="addStockItemMaster.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Item</a></span>
								
									</div>

                                 
                                    <form autocomplete="off" action="exportStudents.php"  method="post">
										
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                    </div>
                                        </div>
                                    
                                                                                                                                
                                        <div class="form-row">

                                        <div class="form-group col-md-3">
                                        
                                         <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic where status = 'Y' order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                    
                                            </div>
                                            
                                                <div class="form-group col-md-3">
                                                <input type="button" class="btn btn-success btn-sm" name="search" value="Search" onclick="search_filter();">
                                    
                                            </div>
                                            </div>
                                            
                                            
                                        </form>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
											<th style="width:30px">#</th>													
													<th style="width:30px">Academic</th>                                                      
                                                    <th style="width:30px">Itemcode</th>
													<th style="width:40px">Item Name</th>
													
                                                   										
													<th style="width:20px">Price</th>
                                                    <th style="width:20px">UOM</th>
													<th style="width:20px">Stock Qty</th>
													<th style="width:20px">Stock Value</th>
                                                    <th style="width:20px">As On</th>		
													<th style="width:20px">Created By</th>																							   											  
													<th style="width:230px">Status</th>
                                                    <th style="width:230px">Actions</th>
											</tr>
										</thead>										
										<tbody>
										
											<?php
												
													include("database/db_conection.php");//make connection here

                                                    if((isset($_GET['academicwise']) && $_GET['academicwise']!=='')){
														
														$academicwise = $_GET['academicwise'];
														
														$sql = "SELECT id,itemcode,academic,category,itemname,description,price,stockinqty,price*stockinqty as stockvalue,
                                                        handler,uom,createdon,status 
                                                        FROM stockItemMaster s
                                                        WHERE 1=1";										                                            
													
													if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
														$sql.=" AND s.academic ='".$_GET['academicwise']."'";    
													}
	
													}else{

													$sql = "SELECT id,itemcode,academic,category,itemname,description,price,stockinqty,price*stockinqty as stockvalue,
                                                    handler,uom,createdon,status 
                                                    FROM stockItemMaster 
                                                    ORDER BY id ASC";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
													echo "<tr>";
                                                    echo '<td>'.$row['id'].' </td>';
													echo '<td>'.$row['academic'].' </td>';													
                                                    echo '<td>'.$row['itemcode'].' </td>';
													echo '<td>'.$row['itemname'].' </td>';
												
                                                  
													echo '<td>'.$row['price'].' </td>';
													echo '<td>'.$row['uom'].' </td>';
													echo '<td>'.$row['stockinqty'].' </td>';
                                                    echo '<td>'.$row['stockvalue'].' </td>';
                                                    echo '<td>'.$row['createdon'].' </td>';
                                                    echo '<td>'.$row['handler'].' </td>';
													echo '<td>'.$row['status'].' </td>';
													
													echo '<td><a href="editClass.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a href="javascript:deleteRecord_8(' . $row['id'] . ');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
													echo "</tr>";
													}
													}
                                                }
													?>						
															<script>
										
											var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";

                                            function delete_record(x)
                                            {
     
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                  window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                               }
                                            }
											$(document).ready(function () {
											
												$('#academicwise').val(page_academicwise);
												$("#ckbCheckAll").click(function () {											
													$(".checkBoxClass").attr('checked', this.checked);
													
													$('input[name="selectedCheckbox"]:checked').each(function() {
											   console.log(this.value);
											});
												});
											});
											function search_filter(){
											
												var academicwise = $('#academicwise').val();
												location.href="listStock.php?academicwise="+academicwise;
											}
											
											 </script>
														
									</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->			
							</div>

<?php include('footer.php'); ?>