<?php include('header.php');?>
<?php
include("database/db_conection.php");//make connection here
$message ='';
//$admnoFound ='';
	if (isset($_POST["submit"])) {
    
	// $fileName = $_FILES["file"]["tmp_name"];
	 
	 if ($_FILES['file']['name']) {
		 
		 $filename = explode(".",$_FILES['file']['name']);
		 
		if(end($filename)=='csv'){
			 $handle = fopen($_FILES['file']['tmp_name'],"r");
				 while($data = fgetcsv($handle)){
					 
					 $academic =mysqli_real_escape_string($dbcon,$data[0]);
					 $admissionno =mysqli_real_escape_string($dbcon,$data[1]);
					 $studentname =mysqli_real_escape_string($dbcon,$data[2]);
					 $class =mysqli_real_escape_string($dbcon,$data[3]);
					 $routeno =mysqli_real_escape_string($dbcon,$data[4]);
					 $areaname =mysqli_real_escape_string($dbcon,$data[5]);
					 $amount =mysqli_real_escape_string($dbcon,$data[6]);
					
				 $query = "INSERT INTO  vanstudents( 
				  academic,
					 admissionno,
					 studentname,
					 class,
					 routeno ,
					 areaname,
					 amount 
					 )
					 VALUES('$academic','$admissionno','$studentname','$class','$routeno','$areaname','$amount')";
					   mysqli_query($dbcon,$query);
					   
				 }
				
					fclose($handle) ;
			
			$message = " Van Students Imported Successfully";
		 }
	 }
	 
 }

 if(isset($_POST["submit"]))
{
  $file =$_POST['file'];
 
 
echo $filename=$_FILES["file"]["name"];
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
 
//we check,file must be have csv extention
if($ext=="csv")
{
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT INTO  vanstudents( 
				academic,
				   admissionno,
				   studentname,
				   class,
				   routeno ,
				   areaname,
				   amount 
				   ) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
            mysqli_query($con, $sql);
         }
         fclose($file);
         echo "CSV File has been successfully Imported.";
}
else {
    echo "Error: Please Upload only CSV File";
}
 
 
}
 ?>




    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">List Van Students </h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">List Van Students</li>
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
						
								
								
										<span class="pull-right">
										<a href="assignVanStudents.php" class="btn btn-warning btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Assign Van students</a></span>
								

									
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
</br></div>
										<!--form autocomplete="off" action="exportVanStudentsFormat.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-primary btn-sm"  name="exportVan" value="Export Van Students"/>
										</div>
									</div>
								</form-->

								
									


								<div class="form-row">
							
										<div class="form-group col-md-3">  
									                      
										<select id="routewise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Routeno-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here
												   $sql = mysqli_query($dbcon, "SELECT  routeno FROM route ORDER by routeno  asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $route=$row['routeno'];
													   echo '<option onchange="'.$row[''].'" value="'.$route.'" >'.$route.'</option>';
												   }
												   ?>
											   </select>
												</div>
												
										<div class="form-group col-md-3">
                                        
                                         <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic WHERE status = 'Y' order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>
										<div class="form-group col-md-3">                                        
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Filter" onclick="search_filter();">								
                                        </div>
									</div>
												
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#</th>
												 <th>Academic</th>
												<th>Admission#</th>
												<th>Student Name</th>
												<th>Class</th>
												<th>Route#</th>
												<th>Areaname</th>
												<th>Amount</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>										
										<tbody>
										<?php
													include("database/db_conection.php");//make connection here
													
													if((isset($_GET['routewise'])&&$_GET['routewise']!='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!=''))
													{
													$routewise = $_GET['routewise'];

													$sql = "SELECT id,academic,admissionno,studentname,
													class,routeno,areaname,amount,vanflag
													FROM  vanstudents v WHERE 1=1 ";

													if(isset($_GET['routewise'])&&$_GET['routewise']!=''){
	
														$sql.=" and routeno='".$_GET['routewise']."'";    
													}
													if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
														$sql.=" and v.academic='".$_GET['academicwise']."'";    
													}
												}else{
													$sql = "SELECT id,academic,admissionno,studentname,
													class,routeno,areaname,amount,vanflag
													FROM  vanstudents v  WHERE academic = year(curdate())
													";

												}

													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
													echo "<tr>";
													echo '<td>'.$row['id'].' </td>';
													echo '<td>'.$row['academic'].' </td>';
													echo '<td>'.$row['admissionno'].' </td>';
													echo '<td>'.$row['studentname'].' </td>';
													echo '<td>'.$row['class'].' </td>';
													echo '<td>'.$row['routeno'].' </td>';
													echo '<td>'.$row['areaname'].' </td>';
													echo '<td>'.$row['amount'].' </td>';
												//	echo '<td>'.$row['vanflag'].' </td>';
													?>
													<td><?php if($row['vanflag']=='Y'){
																echo '<span style="background-color:green;text-align:center;">
																<span style="color:white;text-align:center;">Assigned';
																}else if($row['vanflag']=='N'){
																	echo '<span style="background-color:red;text-align:center;">
																	<span style="color:white;text-align:center;">Discontinued';
																}else{
																	echo "";
																}	 ?>
													</td>
													<?php
													
													echo '<td><a href="editVanStudents.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<!--a onclick="delete_record(this);" id="compProfDelete" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a-->
													</td>';
                                                echo "</tr>";
                                            }
                                        }
                                        ?>						
                                       <script>
					var page_routewise = "<?php if(isset($_GET['routewise'])){ echo $_GET['routewise']; } ?>";
					var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";


                    				$(document).ready(function () {
												$('#routewise').val(page_routewise);	
												$('#academicwise').val(page_academicwise);											
												});
											function search_filter(){
												var routewise = $('#routewise').val();
												var academicwise = $('#academicwise').val();												
												location.href="listVanStudents.php?routewise="+routewise+"&academicwise="+academicwise;
											}                        
										function delete_record(x)
                                            {
                                                console.log(x);
                                                 var row_id = $(x).attr('data-id');
                                               alert(row_id);
                                                if (confirm('Confirm delete')) {
                                                 // window.location.href = 'deleteInstituteProfile.php?id='+row_id;
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