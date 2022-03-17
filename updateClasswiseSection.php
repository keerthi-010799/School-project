<?php
include("database/db_conection.php");//make connection here
 
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
                    $lastname =mysqli_real_escape_string($dbcon,$data[3]);
					$class =mysqli_real_escape_string($dbcon,$data[4]);
					$section =mysqli_real_escape_string($dbcon,$data[5]);
				//	$gender =mysqli_real_escape_string($dbcon,$data[5]);
					//$vanfees =mysqli_real_escape_string($dbcon,$data[5]);
				
				$query = "UPDATE studentprofile 
				set academic='$academic',
					admissionno = '$admissionno',
					firstname ='$firstname',
					lastname = '$lastname',
					class = '$class',
					section = '$section'
					WHERE admissionno ='$admissionno' ";
					 mysqli_query($dbcon,$query);
                }
                   fclose($handle) ;
            //print "Import Done";
			 echo "<script>alert('Import done');</script>";
        }
    }
}
?>

<?php include('header.php');?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left"><i class="fa fa-upload bigfonts" aria-hidden="true"></i> Students Bulk Upload</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Students Bulk Upload</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<!--div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Company Registrtion Form</h4>
					  <p></a></p>
			</div-->

			
			<div class="row">
			
                    

					
					<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								
								 <h5><div class="fa-hover col-md-6 col-sm-6">  
								  </div></h5>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">

								
								<div class="form-row">                                 
                                <div class="form-group">
                                        <label>
                                            <div class="fa-hover col-md-12 col-sm-12">
                                                <i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Section Details</div></label> 
                                    
                                        <!--input type="file" name="file" id="file" class="form-control" width="80" height="60"-->
									<p>Upload CSV <input type='file' name='file'></p>
									<!--p><button input type='submit'  name='submit' value='Import' class="fa fa-upload bigfonts" >Import</button></p-->
                                    </div>
                                </div>
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="fa fa-upload bigfonts btn btn-primary btn-sm" name="submit" type="submit" value="Import">
                                                            Upload
                                                        </button>
                                                        <button type="button" name="cancel" class="btn btn-primary btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
										</div>
										</div>		
								</form>
								</div>
							
								</div>
								</div>
								</div>
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
<?php include('footer.php');?>