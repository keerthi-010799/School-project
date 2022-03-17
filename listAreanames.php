
<?php
include("database/db_conection.php");//make connection here
 $message = '';
if (isset($_POST["submit"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES['file']['name']) {
        
        $filename = explode(".",$_FILES['file']['name']);
        
        if($filename[1]=='csv'){
            $handle = fopen($_FILES['file']['tmp_name'],"r");
                while($data = fgetcsv($handle)){
                    $item1 =mysqli_real_escape_string($dbcon,$data[0]);
                    $item2 =mysqli_real_escape_string($dbcon,$data[1]);
				//	$item3 =mysqli_real_escape_string($dbcon,$data[2]);
					$sql = "INSERT into areamaster(areaname,amount) values('$item1','$item2')";
                    mysqli_query($dbcon,$sql);
                }
                   fclose($handle) ;
            //print "Import Done";
		 //  echo "<script>alert('Import done');<script>";
		 $message = "Area Names add succusfully";
        }
    }
}
?>
<?php include('header.php'); ?>


	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left fa fa-th-list bigfonts alert-info">List Areanames</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Areaname List</li>
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
										<a href="addAreaMaster.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Areaname</a></span>
								
									<!--h3><i class="fa fa-bus bigfonts" aria-hidden="true fa-th-list bigfonts"></i><b> List Areanames </b></h3-->
								</div>
										
								<div class="card-body">
								
								<form autocomplete="off" action="exportArea.php"  method="post">
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-outline-secondary btn-sm"  name="exportArea" value="CSV Export"/>
										</div>
									</div>
								</form>
								
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">

								
								<div class="form-row">                                 
                                <div class="form-group">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                <i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Area Details(csv)</div></label> 
                                    
                                        <!--input type="file" name="file" id="file" class="form-control" width="80" height="60"-->
									<p>Upload CSV <input type='file' name='file'></p>
									<!--p><button input type='submit'  name='submit' value='Import' class="fa fa-upload bigfonts" >Import</button></p-->
                                    </div>
                                </div>
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="fa fa-download bigfonts btn btn-success btn-sm" name="submit" type="submit" value="Import">
													   IMPORT AREA LIST
                                                        </button>
                                                        <button type="button" name="cancel" class="btn btn-secondary btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
										</div>
										</div>		
								</form>


								
						
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
																						
												<th>ID</th>
												<th>Areaname</th>
												<th>Fees</th>
												<th>Actions</th>
											</tr>
										</thead>										
										<tbody>
										
											<?php
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT id,areaname,amount FROM areamaster";
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
													echo "<tr>";
													echo '<td>'.$row['id'].' </td>';
													echo '<td>'.$row['areaname'].' </td>';
													echo '<td>'.$row['amount'].' </td>';
													
													
													echo '<td><a href="editAreaNames.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
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
																	window.location.href = 'deleteAreaname.php?id='+RecordId;
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