<?php include('header.php'); ?>

<script type="text/javascript">
            $(document).ready(function(){
				//alert("HEllo");
				$("#course").change(function(){
					var course_id =$(this).val();
					$.ajax({
						url:"action.php",
						method:"POST",
						data:{courseID:course_id),
						success:function(data){
							$("#language").html(data);
						}
												
					});
			});
		});
 </script>

  <div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Bank Credits/Deposit</h1>
                        <ol class="breadcrumb float-right">
                            <a  href="index.php"><li class="breadcrumb-item">Home</a></li>
                        <li class="breadcrumb-item active">Bank Credits/Deposit</li>
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




            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
                <div class="card mb-3">
                    <div class="card-header">
                        <!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
                        <h3><div class="fa-hover col-md-8 col-sm-8">
                            <i class="fa fa-bank bigfonts" aria-hidden="true"></i> <h3>
                            </div>


                            <div class="card-body">
							 <form action="" method="post" >
							  <div class="form-row">
						      <div class="col-md-4">                                
                                <select name="course" id="course" class="form-control">
                                    <option value="" disabled selected>-Select Course-</option>
									<?php 
									include("database/db_conection.php");
									$sql = "SELECT * FROM `course` order by c_name";
									$result =mysqli_query($dbcon,$sql);
									while($row=mysqli_fetch_array($result)){
									?>
									<option value="<?=$row['id'];?>"><?=$row['c_name'];?></option>
									<?php } ?>
                                </select>
                            </div>

                            <div class="col-md-4">                                
                                <select name="language" id="language" class="form-control">
                                    <option value="" disabled selected>-Select Language-</option>
                                </select>
								</div>
						
                            </div>                           
                        </div>
	</form>
                        </div>
                 
				
            </div>
        </div>
		</div>
		</div>
      
        
    </body>
</html>