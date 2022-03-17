<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $class=$_POST['class'];//same
    $desc=$_POST['description'];//same
	


   //$image =base64_encode($image);														
	$insert_class="INSERT INTO class(`class`,`description`) 
	VALUES ('$class','$desc')";													    

	echo "$insert_class";
	
	if(mysqli_query($dbcon,$insert_class))
	{
		echo "<script>alert('class creation Successful ')</script>";
		header("location:sendSMS.php");
    } else {
		exit; echo "<script>alert('class creation  unsuccessful ')</script>";
	}
	
}
?>
<?php include('header.php');?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">General SMS</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">General SMS </li>
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
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3> <i class="fa fa-envelope bigfonts" aria-hidden="true"></i> 
								 General SMS Form
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">

                            <?php
                                include("database/db_conection.php");//make connection here
                                $query = "SELECT * FROM class Order by class";
                                $result = $dbcon->query($query);
                            ?>
                                                                
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
								
                                <div class="form-row">
									<div class="form-group col-md-12">                                    
                                <label for="email">Class</label>
                                <!--select  id="class" class="form-control select2"   name="country][]" multiple="multiple" onchange="FetchStudents(this.value)"  required-->
                                <select  id="class" class="form-control select2"   name="country][]" multiple="multiple" onchange="FetchStudents(this.value)"  required>
                                <option value="">-Select class-</option>
                                <?php
                                    if ($result->num_rows > 0 ) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value='.$row['id'].'>'.$row['class'].'</option>';
                                    }
                                    }
                                ?> 
                                </select>
                                </div>
        <div class="form-group col-md-12">
          <label for="pwd">Students</label>
          <select name="students" id="students" class="form-control"  required>
            <option>-Select Students-</option>
          </select>
        </div>
                                </div>
									 
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                    
                                                        <a  href="sendSMS.php" button type="button" name="submitgroup" id="submitgroup" class="btn btn-success">Send SMS</a></button>
                                                        <button type="reset" name="cancel" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>
													</div>
													
													
								</form>
								</div>
								</div>
								</div>
								
								
								
		      </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	<script type="text/javascript">
  function FetchStudents(id){
    $('#students').html('');
   // $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'fetchDynamicClassAjax.php',
      data : { class_id : id},
      success : function(data){
         $('#students').html(data);
      }

    })
  }  
</script>
 <?php include('footer.php');?>