<!--<?php 
include('header.php');
//include('workers/getters/functions.php');
function get_users_count(){
    global $dbcon;
    $sql_q = "select id from userprofile where status=1";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}
function get_student_count(){
    global $dbcon;
    $sql_q = "select id from studentprofile where status='Y'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}
function get_student_gendercountm(){
    global $dbcon;
    $sql_q = "select id from studentprofile where status='Y' and gender='M'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}

function get_student_gendercountf(){
    global $dbcon;
    $sql_q = "select id from studentprofile where status='Y' and gender = 'F'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}

function get_grn_count(){
    global $dbcon;
    $sql_q = "select id from grn_notes where grn_status='Recorded'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}

function get_so_count(){
    global $dbcon;
    $sql_q = "select id from salesorders where so_status='Created'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}

function get_inv_count(){
    global $dbcon;
    $sql_q = "select id from invoices where inv_payment_status='Unpaid'";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
    return mysqli_num_rows($exc_q);
}

function get_payables(){
    global $dbcon;

    $sql_q = "select SUM(grn_balance) as payables from grn_notes where grn_payment_status!='Paid' and grn_status='Approved' ";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");

    $row=mysqli_fetch_assoc($exc_q);
    echo $row['payables']?$row['payables']:0;

}

function get_payables_overdue(){
    global $dbcon;

    $sql_q = "select SUM(grn_balance) as payables from grn_notes
where grn_payment_status!='Paid' and grn_status='Approved' and DATE_ADD(grn_date, INTERVAL grn_po_payterm DAY) < CURDATE()";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");

    $row=mysqli_fetch_assoc($exc_q);
    echo $row['payables']?$row['payables']:0;

}

function get_recievables(){
    global $dbcon;
    $sql_q = "select SUM(inv_balance_amt) as recievables from invoices where inv_payment_status!='Paid' and inv_status='Approved' ";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");

    $row=mysqli_fetch_assoc($exc_q);
    echo $row['recievables']?$row['recievables']:0;
}

function get_recievables_overdue(){
    global $dbcon;
    $sql_q = "select SUM(inv_balance_amt) as recievables from invoices
where inv_payment_status!='Paid' and inv_status='Approved' and DATE_ADD(inv_date, INTERVAL inv_payterm DAY) < CURDATE()";
    $exc_q = mysqli_query($dbcon,$sql_q)or die("Error");

    $row=mysqli_fetch_assoc($exc_q);
    echo $row['recievables']?$row['recievables']:0;
}

//function get_vendor_openbalance(){
//global $dbcon;
//$sql_q = "select sum(openbalance) from vendorprofile";
//$exc_q = mysqli_query($dbcon,$sql_q)or die("Error");
//	return array_sum($exc_q);
//}


?>
-->
<!-- End Sidebar -->


<div class="content-page">

    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<!--h1 class="main-title float-left">Dashboard</h1-->
											<!--img src="assets/images/avatars/logo.png" alt="Profile image" width="80" height="80" class="avatar-rounded"-->
											<!--img src="assets/images/avatars/logo.png" alt="Profile image" width="80" height="80" class="avatar-rounded"-->
											<!--img src="assets/images/avatars/dhirajLogo.jpg" alt="Profile image" width="180" height="60" -->    
                                                <img src="assets/images/schoollogo.jpeg" alt="Profile image" width="100" height="80">  
											<!--<!--?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?--><font face="Hemi Head Rg" color="Apple Red"></font>
										    
                                                <?php if(isset($_SESSION['groupname'])){ echo $_SESSION['groupname']; } ?>
                                                
                                                <font face="Hemi Head Rg" color="Apple Red">logged in</font>
									
                                                </div>
    
									</div>
						</div>
        

        <div class="container">
            <br/>
			<!--a href="listNewAdmissions.php" style="font-size:25px"><b><i>View Online Admissions - 2021</i></a><br><br-->
		

            <div class="row"> 			
                <!-- <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">				
                        <div class="card-box noradius noborder bg-default">
				            i class="fa fa-file-text-o float-right text-white"></i
							<h6 class="text-white text-uppercase m-b-20 float-left"> Students</h6>
							h6 class="text-white text-uppercase m-b-20 float-left">Absent Students,Birthdays,Staff on leave,Finance Tot Income,Expense,Events,News </h6
                            <h4 class="m-b-20 text-white counter">Total Students:<php echo get_student_count();?></h4>
                            <span class="m-b-20 text-white counter">Boys: <php echo get_student_gendercountm();?></span><br>
                            <span class="text-white">Girls: <php echo get_student_gendercountf();?></span>
                        </div>
                    </div> -->

                	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-default">
													<i class="fa fa-file-text-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Total Students : <?php echo get_student_count();?></h6>
													<h6 class="m-b-20 text-white counter">Boys : <?php echo get_student_gendercountm();?></h6>
													<h6 class="text-white">Girls : <?php echo get_student_gendercountf();?></h6>
											</div>
									</div>

               	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				    <div class="card-box noradius noborder bg-warning">
                    <i class="fa fa-file-text-o float-right text-white"></i>
								<h4 class="m-b-20 text-white counter">Total Staff:<?php echo get_student_count();?></h4>
                            <h6 class="m-b-20 text-white counter">Male: <?php echo get_student_gendercountm();?></h6>
                            <span class="text-white">Female: <?php echo get_student_gendercountf();?></span><br/>
				    </div>
				</div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				   <div class="card-box noradius noborder bg-info">
                       <h1> <i class="fa fa-user-o float-right text-white"></i></h1>
				         <h6 class="text-white text-uppercase m-b-20">Users : </h6>
                       <h6 class="text-white"><?php  print_r(get_users_count());?></h6>
				            <span class="text-white"> New Users : <?php  print_r(get_users_count());?></span>
				      </div>
				 </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				    <div class="card-box noradius noborder bg-danger">
				        <h6> <i class="fa fa-send-o bigfonts float-right text-white"></i></h6>
				        <h4 class="text-white text-uppercase m-b-20">SMS Available</h4>
                         <h6 class="text-white"><?php  print_r(get_users_count());?></h6>
				         <!--span class="text-white">Credits Available:<?php  print_r(get_users_count());?></span-->
				     </div>
				     </div>
				</div>
				<!-- end row -->   
            <hr>
            <div class="row">
             <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				   <div class="card-box noradius noborder bg-danger">
                       <h1> <i class="fa fa-bell-o float-right text-white"></i></h1>
				         <h5 class="text-white text-uppercase m-b-20">Today's Absentees</h5>
                       <h6 class="text-white"><?php  print_r(get_users_count());?></h6>
				            <!--span class="text-white"><?php  print_r(get_users_count());?> New Users</span-->
				      </div>
                </div>
				  
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				    <div class="card-box noradius noborder bg-info">
								<h4 class="m-b-20 text-white counter">Topper:<?php echo get_student_count();?></h4>
                            <span class="m-b-20 text-white counter">Name: <?php echo get_student_gendercountm();?></span><br>
                            <span class="text-white">Class: <?php echo get_student_gendercountf();?></span>&nbsp;&nbsp;<br>
                        <span class="text-white">Exam: <?php echo get_student_gendercountf();?></span>
				    </div>
				</div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
				    <div class="card-box noradius noborder bg-warning">
                    <h6 class="m-b-20 text-white counter text-white"><a href="PaymentsRecievedReports.php" style="color:white">Receipts:&nbsp;&nbsp;</a><?php echo get_users_count();?></h6>
                        <h6 class="m-b-20 text-white counter">Expenses:&nbsp;<?php echo get_users_count();?></h6>
                            <h6 class="m-b-20 text-white counter">Bank Deposit:&nbsp;<?php echo get_users_count();?></h6>
                            <h6 class="text-white">Cash on Hand:&nbsp;<?php echo get_users_count();?></h6>
				    </div>
				</div>
                
                </div>
            </div>
               


    <?php include('footer.php');?>