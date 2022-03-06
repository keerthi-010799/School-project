
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<!-- end row -->
						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
								
										
											<span class="pull-right">
										<a href="addAcademic.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Academic</a></span>
								
									</div>
								
								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>#</th>												
												<th>Name</th>
													<th>Name</th>
														
												
												
											</tr>
										</thead>										
										<tbody>
										
											<?php
												
											
												
													include("database/db_conection.php");//make connection here
													$sql = "SELECT programmer_name,programmer_skill, id FROM programmer ";
													$result = mysqli_query($dbcon,$sql);
													
													
													
													while ($row =$result-> fetch_assoc()){
														$programmer_skill = $row['programmer_skill']; //get value of marks from the database   
														$exp = explode(',', $programmer_skill); // should contain the comma separated values
													//print_r($exp);
													//echo $exp[0].'<br/>';
													//echo $exp[1].'<br/>';
													foreach($exp as $out) {
        echo $out;
    }
													echo "<tr>";
													 echo '<td>' .$row['id'] . '</td>';
													echo '<td>'.$row['programmer_name'].' </td>';
												    	
													  echo '<td>' .$p1 = $exp[0]; '</td>'; 
													   echo '<td>' .$p2 = $exp[1]; '</td>'; 
													    echo '<td>' .$p3 = $exp[2]; '</td>';
													  // echo '<td>' .$row['id'] . '</td>';
												//	echo '<td>'.$row['programmer_name'].' </td>';
													 
													  	echo "</tr>";
													
													}
													
													?>
		
	


