<?php
include("database/db_conection.php");//make connection here
$admissionnoFound ='';
if(isset($_POST['submit']))
{
 $approvedby =$_POST['approvedby'];
 $academic=$_POST['academic'];
 $admissionno=$_POST['admissionno']; 
 $status = $_POST['status'];
 $category=$_POST['category'];
 $createdon=$_POST['createdon'];
 $createdby=$_POST['createdby'];
 $discountpercentage=$_POST['discountpercentage'];
 

$discid ='';
$prefix = "DID-";
$sql="SELECT MAX(id) as latest_id FROM studentsdiscount ORDER BY id DESC";
 if($result = mysqli_query($dbcon,$sql)){
     $row   = mysqli_fetch_assoc($result);
     if(mysqli_num_rows($result)>0){
         $maxid = $row['latest_id'];
         $maxid+=1;

         $discid = $prefix.$maxid;
     }else{
         $maxid = 0;
         $maxid+=1;
         $discid = $prefix.$maxid;
     }
 }
 $admissionExistsQuery="select admissionno from studentsdiscount WHERE admissionno='$admissionno'";
 $run_query=mysqli_query($dbcon,$admissionExistsQuery);
 if(mysqli_num_rows($run_query)>0)
 {
    
     $admissionnoFound = "Admission#: '$admissionno'' Discount has already been assigned, Please try another one!";
    
 }else{	
 $sql = "INSERT into studentsdiscount( `discid`,
                                        `approvedby`,
										`academic`,
										`admissionno`,										
										`status`,
										`category`,
										`createdon`	,
                                        `createdby`	,
                                        `discountpercentage`								
										)
								VALUES ('$discid',
                                        '$approvedby',
								        '$academic',
                                        '$admissionno',
										'$status',										
										'$category',
										'$createdon',	
                                        '$createdby',	
                                        '$discountpercentage'										
										)";
										
	//echo $sql;
	 if(mysqli_query($dbcon,$sql))
 {
    header("location:discReport.php");
    echo "<script>alert('Discount creation Successful ')</script>";
 }   else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('User creation unsuccessful ')</script>";
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
                                    <h1 class="main-title float-left">Discount Students Form</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Discount Students Form/li>
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
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
                            <p class="text-danger"><?php echo $admissionnoFound;?></p> 
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
							<h3> <div class="fa-hover col-md-8 col-sm-8">
							<i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i>Discount Students Form
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" >
								
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputState">Handler</label>
                                        <input type="text" class="form-control form-control-sm"  
                                        id="createdby" name="createdby" readonly 
                                        class="form-control form-control-sm" 
                                        value="<?php echo $session_user; ?>" required />

                                    </div>
                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Date<span class="text-danger">*</span></label>
                                            <i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                               data-trigger="focus" data-placement="top" title="Discount Creation Date"></i>
                                            <input type="date" class="form-control form-control-sm"  name="createdon" id="createdon" value="<?php echo date("Y-m-d");?>">					  
                                        </div>
                                    </div>

                                <div class="form-row">
                                    <div class="form-group col-md-8 ">
                                    <label for="inputState"><span class="">Academic</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic order by academic DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
                                </div>
								
								

                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="admissionno">Select Student </label>
                                        <select id="admissionno"  class="form-control select2"  required name="admissionno" autocomplete="off">
                                            <option selected>-Select student -</option>
                                            <?php 
                                            include("database/db_conection.php");//make connection here
                                            $sql = mysqli_query($dbcon,"SELECT class,admissionno,concat(firstname,'',lastname) as stuname FROM studentprofile
                                            ORDER BY id ASC");
                                            while ($row = $sql->fetch_assoc()){	
                                                echo $admissionno=$row['admissionno'];
                                                echo $name=$row['stuname'];
                                                echo $class=$row['class'];
                                              //  echo '<option onchange="'.$row[''].'" value="'.$admissionno.'" >'.$name.'</option>';
                                              echo '<option  value="'.$admissionno.'" >'.$admissionno.' '.$name.' '.$class.'</option>';
                                               
                                            }
                                            ?>
                                        </select>                                        
                                    </div>						
									
                           
                                    </div>

                                    <div class="form-row">                                
                                    <h5 class="col-md-12 text-muted text-warning">Discount Details&nbsp;</h5>
                                </div>
                                
                                 <div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Assign Discount &nbsp;&nbsp;</label>
                                        Yes <input type="radio" name="status" value="Y" class=class="fa fa-check-square-o"  >	
                                       &nbsp;&nbsp; No <input type="radio" name="status" value="N" class=class="fa fa-check-square-o" checked >	
                                    </div>
                                </div-->
                            
                            <div class="form-group col-md-8">
                                    <label for="category"><span class="">Discount Category</span></label>
                                                <select id="category"  class="form-control form-control-sm" name="category">
                                                    <option value="">-Select Discount Category-</option>
                                                    <?php 
                                                    $sql = "select * from `category`";
                                                    $res = mysqli_query($dbcon, $sql);
                                                    if(mysqli_num_rows($res) > 0) {
                                                        while($row = mysqli_fetch_object($res)) {
                                                        echo "<option value='".$row->id."'>".$row->category."</option>";
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
                                            
                                                		
								    <div class="form-row">
                                                <div class="form-group col-md-8">
									  <label >Approved by<span class="text-danger">*</span></label>
									  <input type="text" class="form-control form-control-sm" placeholder="Enter Name of the person" name="approvedby" required/>
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

    <script>
$(document).ready(function() {
  $("#category").change(function() {
    var category_id = $(this).val();
    if(category_id != "") {
      $.ajax({
        url:"get-discountpercentage.php",
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
	<!-- END content-page -->
	<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>                                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->
    
  <?php include('footer.php'); ?>