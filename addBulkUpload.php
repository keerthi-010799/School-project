<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["submit"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES['file']['name']) {
        
        $filename = explode(".",$_FILES['file']['name']);
        
        if($filename[1]=='csv'){
            $handle = fopen($_FILES['file']['tmp_name'],"r");
                while($data = fgetcsv($handle)){
                    $item1 =mysqli_real_escape_string($dbcon,$data[0]);
                    $item2 =mysqli_real_escape_string($dbcon,$data[1]);
					$item3 =mysqli_real_escape_string($dbcon,$data[2]);
					$item4 =mysqli_real_escape_string($dbcon,$data[3]);
					$item5 =mysqli_real_escape_string($dbcon,$data[4]);
					$item6 =mysqli_real_escape_string($dbcon,$data[5]);
					$item7 =mysqli_real_escape_string($dbcon,$data[6]);
					$item8 =mysqli_real_escape_string($dbcon,$data[7]);
					$item9 =mysqli_real_escape_string($dbcon,$data[8]);
					$item10 =mysqli_real_escape_string($dbcon,$data[9]);
					$item11 =mysqli_real_escape_string($dbcon,$data[10]);
                    $item12 =mysqli_real_escape_string($dbcon,$data[11]);
					$item13 =mysqli_real_escape_string($dbcon,$data[12]);
					$item14 =mysqli_real_escape_string($dbcon,$data[13]);
					
                    $item15 =mysqli_real_escape_string($dbcon,$data[14]);
                    $item16 =mysqli_real_escape_string($dbcon,$data[15]);
                    $item17 =mysqli_real_escape_string($dbcon,$data[16]);
                    $item18 =mysqli_real_escape_string($dbcon,$data[17]);
                    $item19 =mysqli_real_escape_string($dbcon,$data[18]);
                    $item20 =mysqli_real_escape_string($dbcon,$data[19]);
					$item21 =mysqli_real_escape_string($dbcon,$data[20]); 
					$item22 =mysqli_real_escape_string($dbcon,$data[21]);
					$item23 =mysqli_real_escape_string($dbcon,$data[22]);
					$item24 =mysqli_real_escape_string($dbcon,$data[23]);
					$item25 =mysqli_real_escape_string($dbcon,$data[24]);
					$item26 =mysqli_real_escape_string($dbcon,$data[25]);
					$item27 =mysqli_real_escape_string($dbcon,$data[26]);
                    $sql = "INSERT into studentprofile(academic,admissionno,
														firstname,lastname,
														gender,dob,doa,batch,oldschoolname,discount,category,class,
														section,fathername,
														mothername,aadhaar,
														emis,community,caste,address,city,
														email,mobile,vanflag,
														routeno,areaname,image) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13',
														'$item14','$item15','$item16','$item17','$item18','$item19','$item20','$item21','$item22','$item23','$item24','$item25','$item26','$item27')";
                    mysqli_query($dbcon,$sql);
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
                                                <i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>Upload Student Details</div></label> 
                                    
                                        <!--input type="file" name="file" id="file" class="form-control" width="80" height="60"-->
									<p>Upload CSV <input type='file' name='file'></p>
									<!--p><button input type='submit'  name='submit' value='Import' class="fa fa-upload bigfonts" >Import</button></p-->
                                    </div>
                                </div>
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="fa fa-upload bigfonts btn btn-primary btn-lg" name="submit" type="submit" value="Import">
                                                            Upload
                                                        </button>
                                                        <button type="button" name="cancel" class="btn btn-primary btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
														<br> <a href='download/StudentsSampleFileFormat.csv'>Download Sample Students File</a>
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