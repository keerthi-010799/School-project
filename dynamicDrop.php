<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['submit']))
{
	
    $class=$_POST['class'];//same
    $desc=$_POST['description'];//same
	$discountpercentage=$_POST['discountpercentage'];


   //$image =base64_encode($image);														
	$insert_class="INSERT INTO class(`class`,`description`) 
	VALUES ('$class','$desc')";													    

	echo "$insert_class";
	
	if(mysqli_query($dbcon,$insert_class))
	{
		echo "<script>alert('class creation Successful ')</script>";
		header("location:listClass.php");
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
                                    <h1 class="main-title float-left">Class Master</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Class Master </li>
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
								 <h3><i class="fa fa-building-o bigfonts" aria-hidden="true"></i> 
								 Class Master
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="category"><span class="">Discount Category</span></label>
                                                <select id="category"  class="form-control form-control-sm" name="category">
                                                    <option value="">-Select Discount Category-</option>
                                                    <?php 
                                                    $sql = "select * from `gender`";
                                                    $res = mysqli_query($dbcon, $sql);
                                                    if(mysqli_num_rows($res) > 0) {
                                                        while($row = mysqli_fetch_object($res)) {
                                                        echo "<option value='".$row->id."'>".$row->gender."</option>";
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                              
												
												</div>
												
												
                                

                                <div class="form-group col-md-8">
                                <label>Discount Percentage :</label>
                                <select name="discountpercentage" id="discountpercentage">
                                    <option>------- Select --------</option></select>
                                 </div>
									</div>
									 
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
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
    <script>
$(document).ready(function() {
  $("#category").change(function() {
    var category_id = $(this).val();
    if(category_id != "") {
      $.ajax({
        url:"get-employees.php",
        data:{c_id:category_id},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#discountpercentage").html(resp);
        }
      });
    } else {
      $("#discountpercentage").html("<option value=''>------- Select --------</option>");
    }
  });
});
</script>
 <?php include('footer.php');?>