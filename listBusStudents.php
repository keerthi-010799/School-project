<?php include('header.php'); ?>
	<!-- End Sidebar -->
	
	<?php
include("database/db_conection.php");//make connection here
$message ='';
	if (isset($_POST["submit"])) {
    
	// $fileName = $_FILES["file"]["tmp_name"];
	 
	 if ($_FILES['file']['name']) {
		 
		 $filename = explode(".",$_FILES['file']['name']);
		 
		if(end($filename)=='csv'){
			 $handle = fopen($_FILES['file']['tmp_name'],"r");
				 while($data = fgetcsv($handle)){
					 
					 $academic =mysqli_real_escape_string($dbcon,$data[0]);
					 $admissionno =mysqli_real_escape_string($dbcon,$data[1]);
					 $firstname =mysqli_real_escape_string($dbcon,$data[2]);
					 $routeno =mysqli_real_escape_string($dbcon,$data[3]);
					 $areaname =mysqli_real_escape_string($dbcon,$data[4]);
					 $vanflag =mysqli_real_escape_string($dbcon,$data[5]);
					 //$vanfees =mysqli_real_escape_string($dbcon,$data[5]);
				 
				 $query = "UPDATE studentprofile 
				 set academic='$academic',
					 admissionno = '$admissionno',
					 firstname ='$firstname',
					 routeno = '$routeno',
					 areaname = '$areaname',
					 vanflag = '$vanflag'
					 WHERE admissionno ='$admissionno' ";
					  mysqli_query($dbcon,$query);
				 }
					fclose($handle) ;
			 //print "Import Done";
			//  echo "<script>alert('Import done');</script>";
			$message = "Routewise Van Students Imported Successfully";
		 }
	 }
 }
 ?>

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

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Bus Students</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Bus Students</li>
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

								<h3><p class="text-success"><?php echo $message;?></p> </h3>
								
										<!--span class="pull-right">
										<a href="addBusStudents.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Bus Students</a></span>
									<i class="" aria-hidden="">List Bus Students</i-->
								</div>
								
								<div class="card-body">

								<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">

								
								<div class="form-row">                                 
                                <div class="form-group">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-8">
                                                <i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>IMPORT Van Students</div></label> 
                                    
                                        <!--input type="file" name="file" id="file" class="form-control" width="80" height="60"-->
									<p>Upload CSV <input type='file' name='file'></p>
									<!--p><button input type='submit'  name='submit' value='Import' class="fa fa-upload bigfonts" >Import</button></p-->
                                    </div>
									</div>
                                
								    <div class="form-row">
								    <div class="form-group text-right m-b-8">
                                                       &nbsp;<button class="fa fa-download bigfonts btn btn-success btn-sm" name="submit" type="submit" value="Import">
                                                            IMPORT VAN STUDENTS
                                                        </button>
                                                        <button type="button" name="cancel" class="btn btn-secondary btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
														<br> <a href='download/vanstudents.csv'>Download Sample Van Students File Format</a>
										</div>
										</div>		
								</form>
</br>
			<!-- END container-fluid -->
                                    
                                    <form autocomplete="off" action="exportVanStudents.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-info btn-sm"  name="exportVanStudents" value="Export Van Students"/>
										</div>
									</div>
								
																															
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="routewise"   class="form-control form-control-sm"  name="routeno">
                                             <option value="">-Select Route-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT distinct routeno FROM route order by id asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $routeno=$row['routeno'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$routeno.'" >'.$routeno.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
										
											<div class="form-group col-md-3">
											<input type="button" class="btn btn-warning btn-sm" name="search" value="Search" onclick="search_filter();">
								
                                        </div>
										</div>
										
										
                                    </form>
                                    
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												  	<!--th style="width:20px">Logo</th-->
													<!--th style="width:10px">Mark All&nbsp;<input type="checkbox" id="ckbCheckAll"></th-->
													<th style="width:30px">#</th>													
													  <th style="width:30px">Picture</th>
													<th style="width:40px">Admission#</th>
													<th style="width:30px">Student Name</th>
													<th style="width:40px">Class/Section</th>
													
													<th style="width:20px">Parent Mobile</th>
													<th style="width:20px">Route/Bus#</th>
													<th style="width:20px">Pickup Area</th>
												    <th style="width:20px">Driver Name</th>
                                                    <th style="width:20px">Driver Mobile</th>
                                                    <th style="width:20px">Pickup Points</th>
													<!--th style="width:20px">Academic</th-->												  
													<th style="width:230px">Status</th>
													
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here
													
													
													if((isset($_GET['routewise']) && $_GET['routewise']!=='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!='')||(isset($_GET['batchwise'])&&$_GET['batchwise']!='')){
														$routewise = $_GET['routewise'];
													//	$academicwise = $_GET['academicwise'];
													//	$batchwise = $_GET['batchwise'];	
														$sql = "SELECT s.id,s.image,s.admissionno,concat(s.firstname,' ',s.lastname) as name,
														concat(s.class,' / ',s.section) as classsec,s.areaname,s.mobile,s.routeno,s.status,
														r.drivername,r.mobile as dmobile,r.pickuppoints
														FROM studentprofile s, route r WHERE 1=1 AND s.vanflag='Y' AND s.routeno = r.routeno";										                                            
													 if(isset($_GET['routewise'])&&$_GET['routewise']!=''){
	
														$sql.=" and s.routeno='".$_GET['routewise']."'";    
												//	}
													//if(isset($_GET['batchwise'])&&$_GET['batchwise']!=''){
	
												//	//	$sql.=" and s.batch='".$_GET['batchwise']."'";    
													}
												////	if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
												//		$sql.=" and s.academic='".$_GET['academicwise']."'";    
												//	}
	
													}else{
													
														$sql = "SELECT s.id,s.image,s.admissionno,concat(s.firstname,' ',s.lastname) as name,
														 concat(s.class,' / ',s.section) as classsec,s.areaname, s.mobile,
														 s.routeno,s.status,r.drivername,r.mobile as dmobile,r.pickuppoints
														 FROM studentprofile s,route r 
														 WHERE s.vanflag = 'Y' 
														 AND r.routeno = s.routeno
														 ORDER BY routeno ASC";													}
																											
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
													// echo '<td><input type="checkbox" class="checkBoxClass" name="selectedCheckbox[]" value='.$row['id'].'/></td>';
												//	echo '<td>'.$row['id'].'<br /></td>';
													
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
												//	echo '<td>'.$row['academic'].'<br /></td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
                                                    echo '<td>'.$row['mobile'].'</td>';
													echo '<td>'.$row['routeno'].'</td>';
													echo '<td>'.$row['areaname'].'</td>';
													echo '<td>'.$row['drivername'].'</td>';
													echo '<td>'.$row['dmobile'].'</td>';
                                                    echo '<td>'.$row['pickuppoints'].'</td>';
													//echo '<td>'.$row['academic'].'</td>';
													
													
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
												//	echo '<td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
											///			<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
											//		<a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
											//		<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            //    
											//			<!--a onclick="print_record(this);" id="printStudentProfile" data-id="' . $row_id . '" class="btn btn-secondary btn-sm"  data-title="Print">
											//		<i class="fa fa-print" aria-hidden="true"></i></a></td-->';                                               
														
														echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
											var page_routewise = "<?php if(isset($_GET['routewise'])){ echo $_GET['routewise']; } ?>";
										//	var page_batchwise = "<?php if(isset($_GET['batchwise'])){ echo $_GET['batchwise']; } ?>";
										//	var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";

                                          //  function delete_record(x)
                                          //  {
     
                                          //       var row_id = $(x).attr('data-id');
                                           //    alert(row_id);
                                            //    if (confirm('Confirm delete')) {
                                           //       window.location.href = 'deleteStudentProfile.php?id='+row_id;
                                          //     }
                                          //  }
											$(document).ready(function () {
												$('#routewise').val(page_routewise);
											//	$('#batchwise').val(page_batchwise);
											//	$('#academicwise').val(page_academicwise);
												$("#ckbCheckAll").click(function () {											
													$(".checkBoxClass").attr('checked', this.checked);
													
													$('input[name="selectedCheckbox"]:checked').each(function() {
											   console.log(this.value);
											});
												});
											});
											function search_filter(){
												var routewise = $('#routewise').val();
												//var batchwise = $('#batchwise').val();
												//var academicwise = $('#academicwise').val();
												location.href="listBusStudents.php?routewise="+routewise;
											}
											
											 </script>
									</tbody>
									</table>
									
									</div>
									
								</div>		
							
							</div><!-- end card-->			
							</div>
							
							

<?php include('footer.php'); ?>
							
							