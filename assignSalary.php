<?php
include("database/db_conection.php");//make connection here
$empIDFound ='';
if(isset($_POST['submit']))
{
 
 $academic=$_POST['academic'];
 $empid=$_POST['empid']; 
 $grosssal = $_POST['grosssal'];
 $basicsal=$_POST['basicsal'];
 $HRA=$_POST['HRA'];
 $MA=$_POST['MA'];
 $CA=$_POST['CA'];
 $PF=$_POST['PF'];
 $PT=$_POST['PT'];
 $createdon=$_POST['createdon'];
 $createdby=$_POST['createdby'];

 


 $empidExists="select empid from salrystructure WHERE empid='$empid'";
 $run_query=mysqli_query($dbcon,$empidExists);
 if(mysqli_num_rows($run_query)>0)
 {
    
     $empIDFound = "Employee ID: '$empid'' salary has already been assigned, Please try another one!";
    
 }else{	
 $sql = "INSERT into salrystructure( `empid`,
                                        `createdby`,
										`academic`,
										`grosssal`,										
										`basicsal`,
										`HRA`,
										`MA`,
                                        `CA`,
                                        `PF`,
                                        `PT`,                                       
                                        `createdon`								
										)
								VALUES ('$empid',
                                        '$createdby',
                                        '$academic',
								        '$grosssal',
                                        '$basicsal',
										'$HRA',										
										'$MA',
										'$CA',	
                                        '$PF',	
                                        '$PT'	,
                                        '$createdon'												
										)";
										
	echo $sql;
	 if(mysqli_query($dbcon,$sql))
 {
    header("location:listSalaries.php");
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
                                    <h1 class="main-title float-left">Assign Salary</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Assign Salary</li>
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
                            <p class="text-danger"><?php echo $empIDFound;?></p> 
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
							<h3> <div class="fa-hover col-md-8 col-sm-8">
							<i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i>Assign Salary Form
							<span class="text-muted"></span></div></h3>
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" >
								
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="inputState">Handler</label>
                                        <input type="text" class="form-control form-control-sm"  
                                        id="createdby" name="createdby" readonly 
                                        class="form-control form-control-sm" 
                                        value="<?php echo $session_user; ?>" required />

                                    </div>
                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label>Date<span class="text-danger">*</span></label>
                                            <i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                               data-trigger="focus" data-placement="top" title="Discount Creation Date"></i>
                                            <input type="date" class="form-control form-control-sm"  name="createdon" id="createdon" value="<?php echo date("Y-m-d");?>">					  
                                        </div>
                                    </div>

                                <div class="form-row">
                                    <div class="form-group col-md-10 ">
                                    <label for="inputState"><span class="">Academic</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                             
                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic WHERE status ='Y' order by academic DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												</div>
                                </div>
								
								

                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label for="empid">Select Employee </label>
                                        <select id="empid"  class="form-control select2"  required name="empid" autocomplete="off">
                                            <option selected>-Select student -</option>
                                            <?php 
                                            include("database/db_conection.php");//make connection here
                                            $sql = mysqli_query($dbcon,"SELECT empid,concat(firstname,'',lastname) as empName,type from employees 
                                            ORDER BY id ASC");
                                            while ($row = $sql->fetch_assoc()){	
                                                echo $empid=$row['empid'];
                                                echo $name=$row['empName'];
                                                echo $type=$row['type'];
                                              //  echo '<option onchange="'.$row[''].'" value="'.$admissionno.'" >'.$name.'</option>';
                                              echo '<option  value="'.$empid.'" >['.$empid.'] '.$name.' ['.$type.']</option>';
                                               
                                            }
                                            ?>
                                        </select>                                        
                                    </div>	
                                    </div>  
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                        <label >Gross Salary<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm"  placeholder="Enter Total CTC" name="grosssal" required/>
                                    </div>
                                        </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                        <label >Basic Salary<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="50% of Gross Salary" name="basicsal" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label >Medical Allowances</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="As per guidelines" name="MA" />
                                    </div>
                                     </div>  
                                     <div class="form-row">
                                        <div class="form-group col-md-5">
                                        <label >Conveyance Allowance(CA) </label>
                                        <input type="text" class="form-control form-control-sm" placeholder="As per guidelines" name="CA" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label >House Rent Allowance(HRA)</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="As per guidelines" name="HRA" />
                                    </div>
                                     </div>  
                                     <div class="form-row">
                                        <div class="form-group col-md-5">
                                        <h5 ><span class="text-info">Deducations</span></h5>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-5">
                                        <label >Provident Fund(PF) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" requied placeholder="12% of Basic Salary" name="PF" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label >Professtional Tax(PT)</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="As per guidelines" name="PT" />
                                    </div>
                                     </div>  
                                                		
								  
										
								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
                                                       &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
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

    <!--script>
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
</script-->
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