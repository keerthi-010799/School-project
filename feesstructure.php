<?php include('header.php'); ?>
<div class="content-page">
    <div class="content">
	    <div class="container-fluid">		
            <div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
				        <h1 class="main-title float-left">Fees collection</h1>
			    		<ol class="breadcrumb float-right">
						<li class="breadcrumb-item">Home</li>
			        	<li class="breadcrumb-item active">Fees collection</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
            <div class="form-row">
                                    <div class="form-group col-md-3">
                                         
                                         <select id="classwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class">
                                             <option value="">-Select Class-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT  class FROM class order by id asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                        </div>
										<div class="form-group col-md-3">
                                        
                                         <select id="feesTypewise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="FeesType">
                                             <option value="">-Select Fees Type-</option>
                                                <option value="Term1" >Term 1</option>
                                                <option value="Term2" >Term 2</option>
                                                <option value="Term3" >Term 3</option>
                                                <option value="VanFees" >Van Fees</option>
                                                <option value="OtherFees" >Other Fees</option>
                                            </select>
												
                                        </div>
										<div class="form-group col-md-3">
                                        
										<select id="batchwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Batch-</option>
												   <?php 
												   include("database/db_conection.php");

												   $sql = mysqli_query($dbcon, "SELECT distinct batch FROM studentprofile where status = 'Y' order by batch asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $batch=$row['batch'];
													   echo '<option onchange="'.$row[''].'" value="'.$batch.'" >'.$batch.'</option>';
												   }
												   ?>
											   </select>
											   
									   </div>
											<div class="form-group col-md-3">
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Search" onclick="search_filter();">
								
                                        </div>
										</div>
									
        </div>
    </div>    
</div>