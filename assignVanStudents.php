<?php
include("database/db_conection.php");//make connection here
$admnoFound ='';
if(isset($_POST['submit']))
{
	
    $createdby=$_POST['createdby'];//same
    $academic=$_POST['academic'];//same
    $admissionno=$_POST['admissionno'];//same
    $vanflag=$_POST['vanflag'];//same
    $routeno=$_POST['routeno'];//same
    $areaname=$_POST['areaname'];//same
	
    $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE admissionno = $admissionno");
    while ($row = $sql1->fetch_assoc()){
         echo $class = $row['class'];
         echo $studentname = $row['firstname'];        
      }
 $sq = mysqli_query($dbcon, "SELECT amount FROM areamaster WHERE areaname = '$areaname'");
while ($ro = $sq->fetch_assoc()){
     echo $amount = $ro['amount'];      
  }

    $check_admno_query="select vanflag from vanstudents WHERE admissionno='$admissionno'";
    $run_query=mysqli_query($dbcon,$check_admno_query);
	if(mysqli_num_rows($run_query)>0)
    {
		//echo '0';
       // echo "<script>alert('Item Name: $itemname is already exist in our database, Please try another one!')</script>";
        //$fmsg= "Email already exists";   
       $admnoFound = " Admission No '$admissionno''Van has already been assigned.   Please try another one!";
       //exit();
        // header("location:addPurchaseItemMaster.php");
    }
//    else{	$sql = 'Insert....
 
 else{

   //$image =base64_encode($image);														
	$insert_vanstudents="INSERT INTO vanstudents(`createdby`,`academic`,`admissionno`,`studentname`,`class`,`amount`,`vanflag`,`routeno`,`areaname`) 
	VALUES ('$createdby','$academic','$admissionno','$studentname','$class','$amount','$vanflag','$routeno','$areaname')";													    

	echo "$insert_vanstudents";
	
	if(mysqli_query($dbcon,$insert_vanstudents))
	{
		echo "<script>alert('class creation Successful ')</script>";
		header("location:listVanStudents.php");
    } else {
		exit; echo "<script>alert('class creation  unsuccessful ')</script>";
	}
	
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
                                    <h1 class="main-title float-left">Assign Vanstudents</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Assign Van Students </li>
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
								 Assign Van Students
                                 <p class="text-danger"><?php echo $admnoFound;?></p> </h3>
								
								<!--h3><class="fa-hover col-md-12 col-sm-12"><i class="fa fa-cart-plus smallfonts" aria-hidden="true">
								</i>Add Transport Master Details
								</h3-->
									 </div>
									 
								
							<div class="card-body">
								
								<!--form autocomplete="off" action="#"-->
								<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputState">Handler</label>
                                        <input type="text" class="form-control form-control-sm"  
                                        id="createdby" name="createdby" readonly 
                                        class="form-control form-control-sm" 
                                        value="<?php echo $session_user; ?>" required />

                                    </div>
                        </div>
                        <!--div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Date<span class="text-danger">*</span></label>
                                            <i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                               data-trigger="focus" data-placement="top" title="Discount Creation Date"></i>
                                            <input type="date" class="form-control form-control-sm"  name="createdon" id="createdon" value="<?php echo date("Y-m-d");?>">					  
                                        </div>
                                    </div-->

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
                                <div class="form-group col-md-8 ">                                   
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
                                    <h5 class="col-md-12 text-muted text-warning">Transport Details&nbsp;</h5>
                                </div>
                                
                                 <div class="form-row">
                                <div class="col-md-12 col-md-offset-12">
                                    <div class="checkbox"><label>Assign Transport&nbsp;&nbsp;</label>
                                        Yes <input type="radio" name="vanflag" value="Y" class=class="fa fa-check-square-o" checked >	
                                       &nbsp;&nbsp; No <input type="radio" name="vanflag" value="N" class=class="fa fa-check-square-o"  >	
                                    </div>
                                </div>
                            </div>
                            <br>
                                
                            
                               <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="inputState"><span class="">Pickup Route</span><span class="text-danger"></span></label>
                                                <select  id="routeno" onchange="onlocode(this)"  class="form-control select2" name="routeno">
                                                    <option value="">-Select Route#-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT routeno FROM route");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $routeno=$row['routeno'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$routeno.'" >'.$routeno.'</option>';
                                                    }
                                                    ?>
                                                </select>
    
                                    </div>
                                                </div>
                                                <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputState"><span class="">Areaname</span></label>
                                                <select id="areaname" onchange="onlocode(this)" 
                                                        class="form-control select2" name="areaname">
                                                    <option value="">-Assign Area-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT areaname FROM areamaster");
                                                    while ($row = $sql->fetch_assoc()){	
                                                       // echo $areacode=$row['areacode'];
                                                        echo $areaname=$row['areaname'];
                                                        echo '<option  value="'.$areaname.'" >'.$areaname.'</option>';
                                                    }
                                                    ?>
                                                </select>
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
	
   
 <?php include('footer.php');?>