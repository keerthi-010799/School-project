<?php include('header.php');?>

<?php $fid='';
$feesamount ='';
?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Edit Class</h1>
                                    <ol class="breadcrumb float-right">
										<a  href="index.php"><li class="breadcrumb-item">Home</a></li>
										<li class="breadcrumb-item active">Edit Class </li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<!--div class="alert alert-success" role="alert">
			
					  <h3 class="alert-heading"></h3>
					  <p></a></p>
			</div-->
	
			
                    

					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								<!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
								 <h3><div class="fa-hover col-md-8 col-sm-8"><i class="fa fa-truck bigfonts" aria-hidden="true">
								 </i> Edit Class</div></h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
								
							</div>
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action="makeFeesPayment.php" class="validation fv-form fv-form-bootstrap" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                            
								<?php
											include("database/db_conection.php");//make connection here
 
											if(isset($_GET['student_id']))
											{
												$id=$_GET['student_id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT f.feesname,
                                                concat(s.firstname,' ',s.lastname) as studentname,s.admissionno,f.class,f.amount
                                                FROM `studentprofile` s , feesconfig f
                                                WHERE s.id = '$id'
                                                AND f.class = s.class");									 
												while($res = mysqli_fetch_array($result))
												{
													$feesname = $res['feesname'];
													$name = $res['studentname'];
                                                    $admissionno = $res['admissionno'];
                                                    $class = $res['class'];
													$amount = $res['amount'];
													
												}
											}
												
											?>			
						
									
									<div class="form-row">							
									<div class="form-group col-md-10">
									  <label >Student Name<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="name" value="<?php echo $name;?>" />
										</div>
									
									<div class="form-group col-md-10">
									  <label >Admission#<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="desc" value="<?php echo $admissionno;?>" />
										</div>

									  <div class="form-group col-md-10">                                    
									  <label >Class<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="desc" value="<?php echo $class;?>" />
									</div>
										</div>
									

                                    <div class="form-row">
                                    <div class="form-group col-md-10">
                                    <label for="feesname">Feesname<span class="text-danger">*</span></label>
                                                <select  id="feesname"   class="form-control form-control-sm" name="feesname">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT feesname FROM feesconfig where 
                                                    class=$class");
                                                    while ($row = $sql->fetch_assoc()){	
														
                                                        echo $feesname_get=$row['feesname'];
                                                        if($feesname_get==$feesname){
                                                            echo '<option value="'.$feesname_get.'" selected>'.$feesname_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$feesname_get.'" >'.$feesname_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
												<input type="text" class="form-control" id="feesamount" name="feesamount" />
												
                                </div>							
                                </div>
                                
                                <div class="form-row">
                                <div class="form-group col-md-10">
									  <label >Amount<span class="text-danger">*</span></label>
									  <input type="text" class="form-control" name="amount" value="<?php echo $feesamount;?>" />
                                      <div class="form-group col-md-10">
                                        </div>

								    <div class="form-row">
								    <div class="form-group text-right m-b-10">
												<input type="hidden" name="locID" value="<?=$_GET['id']?>">
                                                       &nbsp;<button class="btn btn-primary" name="locEdit" type="submit">
                                                            Update
                                                        </button>
                                                        
                                                    </div>
													
													
															
								</form>
								<script>
$("#feesname").change(function() {
    //get the selected value
    var val = this.value;
	alert ("hello");

    //make the ajax call
    $.ajax({
        url: 'getFeesAmount.php',
        type: 'POST',
        data: {field : 'feesname', value: val},
        success: function(data) {
document.getElementById("feesamount").value = data['result'];
        }
    });

});
</script>
							
</div>
								
</div>