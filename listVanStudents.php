<?php include('header.php');?>

<?php include("database/db_conection.php");//make connection here
 
$message = '';

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
					$vanfees =mysqli_real_escape_string($dbcon,$data[5]);
					$vanflag =mysqli_real_escape_string($dbcon,$data[6]);
				
				$query = "UPDATE studentprofile set academic='$academic',
					admissionno = '$admissionno',
					firstname ='$firstname',
					routeno = '$routeno',
					areaname = '$areaname',
					vanfees = '$vanfees',
					vanflag = '$vanflag'
					WHERE admissionno ='$admissionno' ";
					 mysqli_query($dbcon,$query);
                }
                   fclose($handle) ;
			 echo "<script>alert('Import done');</script>";
        }
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
								
										<!--span class="pull-right">
										<a href="addInstituteProfile.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Institute Profile</a></span-->
									<!--h3>Upload Van Students</h3--> 
									
							
									
									<!--form autocomplete="off" action="#"-->
								<form action="uploadVanStudents.php"  enctype="multipart/form-data" method="post" accept-charset="utf-8">

								
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
                                                       &nbsp;<button class="fa fa-download bigfonts btn btn-primary btn-sm" name="submit" type="submit" value="Import">
                                                            IMPORT VAN STUDENTS
                                                        </button>
                                                        <!--button type="button" name="cancel" class="btn btn-primary btn-sm" onclick="window.history.back();">Cancel
                                                        </button-->
										</div>
										</div>		
								</form>
								</div>
										<form autocomplete="off" action="exportVanStudentsFormat.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-primary btn-sm"  name="exportVan" value="Export Van Students"/>
										</div>
									</div>
								</form>
								
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
													
													//$sql = "select image,compcode,concat(title,name) as name,
													//ctype,location,email,mobile,id from comprofile";
													$sql = "SELECT s.id,s.status,s.academic,s.admissionno,s.firstname,
													s.class,s.routeno,s.areaname,a.amount
													FROM studentprofile s,areamaster a
                                                    where a.areaname = s.areaname
													and s.vanflag = 'Y'  AND s.status = 'Y' ";
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
													echo "<tr>";
													echo '<td>'.$row['id'].' </td>';
													echo '<td>'.$row['academic'].' </td>';
													echo '<td>'.$row['admissionno'].' </td>';
													echo '<td>'.$row['firstname'].' </td>';
													echo '<td>'.$row['class'].' </td>';
													echo '<td>'.$row['routeno'].' </td>';
													echo '<td>'.$row['areaname'].' </td>';
													echo '<td>'.$row['amount'].' </td>';
													echo '<td>'.$row['status'].' </td>';
													
													
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