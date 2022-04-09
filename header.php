<?php
include("database/db_conection.php");//make connection here
$baseurl =  "http://" . $_SERVER['SERVER_NAME'] ."/"; //Outputs www.example.com

session_start();
//include('login.php'); // Includes Login Script

// This Code will not allow user without login 
if($_SESSION['userid']==""){
    header('Location:login.php');
}
// Login Check end

if(isset($_SESSION['login_email'])){
    $userid = $_SESSION['userid'];
    $sq = "select username from userprofile where id='$userid'";
    $result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
    //$count = mysqli_num_rows($result);
    $rs = mysqli_fetch_assoc($result);
    $session_user = $rs['username'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Online e-Schoolz ERP Software</title>
        <meta name="description" content="Online GST POS Software">
        <meta name="author" content="">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/avatars/ssj-favicon.png">
		

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css"/>
		
		


        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/main.js"></script>

        <?php include('assets/datatables.php'); ?>


        <!-- BEGIN CSS for this page -->
        <style>
            .parsley-error {
                border-color: #ff5d48 !important;
            }
            .parsley-errors-list.filled {
                display: block;
            }
            .parsley-errors-list {
                display: none;
                margin: 0;
                padding: 0;
            }
            .parsley-errors-list > li {
                font-size: 12px;
                list-style: none;
                color: #ff5d48;
                margin-top: 5px;
            }
            .form-section {
                padding-left: 15px;
                border-left: 2px solid #FF851B;
                display: none;
            }
            .form-section.current {
                display: inherit;
            }
        </style>
        <!-- END CSS for this page -->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>	
        <style>	
            td.details-control {
                background: url('assets/plugins/datatables/img/details_open.png') no-repeat center center;
                cursor: pointer;
            }
            tr.shown td.details-control {
                background: url('assets/plugins/datatables/img/details_close.png') no-repeat center center;
            }
        </style>		
		
		<!-- Select 2 searchable Drop down -->
		<!-- Switchery css -->
		<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
		
		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		
		<!-- BEGIN CSS for this page -->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
		<!-- END CSS for this page -->
<!-- END Select 2 searchable Drop down -->

    </head>
	
	<body class="adminbody">
        <!-- Large modal for Quick Create -->
        <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="text-overflow"><small><?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?>&nbsp;Logged In</small> </h5>

                    </div>
                    <div class="modal-body">
                        <div class="row">						
							<div class="fa fa-calendar bigfonts">Academics &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
							<a href="listStudentProfile.php"><class="col">Students</a><br><br>
							<a href=""><class="col">Attendance</a><br><br>
							<a href=""><class="col">Exams</a><br><br>
							<a href="listVendorCredits.php"><i class="fa fa-file-archive-o bigfonts">&nbsp;Student Records </i></a><br>						
						</div>
						
						<div class="fa fa-rupee bigfonts">Administration &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
							<a href="listFeesConfig.php"><i class="fa fa-chevron-right bigfonts">Fee Structure</i></a><br><br>
							<a href="listVanFeesConfig.php"><class="col">Assign Transport</a><br><br>
							<a href=""><class="col">Create Discount</a><br>		<br>				
							<a href=""><class="col">View Discounts</a><br>	<br>									
							<a href=""><class="col">Create Category</a><br><br>
							<a href="dynamicClassStudents.php"><class="col">Collect Fees</a><br><br>
							<a href=""><class="col">Fees Defaulters</a><br><br><br>
						</div>
						<div class="fa fa-line-chart bigfonts">Reports<br><br>
							<a href=""><class="col-md5">Student Report</a><br><br>
							<a href=""><class="col">Fees Outstanding</a><br><br>
							<a href=""><class="col">Dicount Reports</a><br>
						</div>
												  
                        </div>
                    </div>

                </div>
            </div>
        </div>
	
 
<!-- Large modal for Settings -->
        <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-overflow"><small><?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } 
                            ?>&nbsp;logged In</small> </h5>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <td><i class="fa fa-cog bigfonts" aria-hidden="true"></i><strong>&nbsp;Settings</strong>
                                                        </td>
                                                        <td class="text-center"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i><strong>&nbsp;Configuration</strong>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    <tr>
                                                        <td><a  href="listInstituteProfile.php">
                                                            Institute Profile</a></td>
                                                        <td class="text-center"><a  href="listFeesConfig.php">
                                                            Fees Configuration</a></td>
                                                        <td class="text-center"><a  href="">
                                                            some links here..</a></td>
                                            <td class="text-right"><a href="myProfile.php">
                                                Your Account</a></td>
                                    </tr>
                                        <tr>
                                            <td><a href="listUserProfile.php">
                                                Manage Users</a></td>
                                            <td class="text-center"><a href="listVanStudents.php">
                                                Van Configuration</a></td>																			
                                            <td class="text-center"><a  href="addStudentDiscount.php">Some links here...</a></td>																			
                                            <td class="text-right"><a href="#">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><a  href="">
                                                some links here...</a></td>
                                            <td class="text-right"><a href="logout.php" class="dropdown-item notify-item">
                                                <i class="fa fa-power-off"></i><span>&nbsp;Sign Out</span> </a></td>
                                        </tr>                                     
                                        <tr>

                                            <td><a  href="listUsers.php">
                                                Edit to Inactive User</a></td>
                                            <td class="text-center"><a href="">some links here...</a></td>																			
                                            <td class="text-center"></td>
                                            <td class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td><a href="listCompanyBankDetails.php">Institute Bank Details</a></td>
                                        </tr>
                                         <tr>
                                            <td><a  href="listTaxMaster.php">
                                                </a></td>
                                            <td class="text-center"><a href="">Some links here...</a></td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>


<div id="main">


    <!-- top bar navigation -->
    <div class="headerbar">

        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="index.php" class="logo"><img alt="Logo" class="alert-info" src="assets/images/schoollogo.jpeg"> 
                
                <Span style="color:yellow;"><small>JVMHSS<b>  
                  </b></small></span></a>
        </div>



        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">                        


                <li class="list-inline-item dropdown notif">

                    <a class="nav-link dropdown-toggle arrow-none" data-target=".bd-example-modal-lg2"  data-toggle='modal' href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-plus-circle bigfonts" aria-hidden="false"><small>&nbsp;</small></i></a>

                </li>
                <?php 
                if($_SESSION['groupname']=='Admin'){
                    echo '<li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-target=".bd-example-modal-lg3" data-toggle="modal" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-cog bigfonts" aria-hidden="true"></i></a>
                </li>';
                }
                ?>

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-question-circle"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small>Help and Support</small></h5>
                        </div>
                       
                        <a target="_blank" href="" class="dropdown-item notify-item">                                    
                            <p class="notify-details ml-0">
                                <b> Need Help? Reach us</b><br>
                                Mobile: +91 9677573737<br>
                                Email: saravanas.office@gmail.com<br>
                                <small class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mon-Sat 9:00AM-6:00PM</small>
                            </p>
                        </a>                               

                        <!-- All-->
                        <a  href="http://eschoolserp.com" class="dropdown-item notify-item notify-all">
                            <i class="fa fa-link"></i> Visit our website e-Schoolz
                        </a>

                    </div>
                </li>

                <li class="list-inline-item dropdown notif">						
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" 
                       role="button" aria-haspopup="false" aria-expanded="false">
                        
                        <small> <span><font face="Hemi Head Rg" color="orange"><b>
                            <?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?></b>
                           </font></span></small>
                        
                        <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded"></a>



                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small><?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?></small> </h5>
                        </div>

                        <!-- item-->
                        <a href="myProfile.php" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>My Profile</span>
                        </a>

                        <a href="changePassword.php" class="dropdown-item notify-item">
                            <i class="fa fa-unlock" aria-hidden="true"></i><span>Change PWD</span>
                        </a>

                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i><span>Logout</span>  
                        </a>


                        <!-- item-->
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left pt-2">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>                        
            </ul>

        </nav>

    </div>
    <!-- End Navigation -->
        <!-- Left Sidebar -->
    <div class="left main-sidebar">

        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">

                <ul>

                    <li class="submenu">
                        <a class="active" href="index.php"><i class="fa fa-dashboard"></i><span> Dashboard </span> </a>
                    </li>            

                    <li class="submenu">
                        <a href="#"><i class="fa fa-mortar-board bigfonts" aria-hidden="true"></i> Students Management<span class="menu-arrow"></span></a>						
                        <ul class="list-unstyled">  
                            <li><a href="listStudentProfile.php"><i class="fa fa-server bigfonts"></i>List Students</a> </li>
                            <li><a href="listBusStudents.php"><i class="fa fa-bus bigfonts"></i>Routewise Van Students</a> </li>
                            <li><a href="listVanStudents.php"><i class="fa fa-download bigfonts"></i>Import/Edit-Van Students</a> </li>
                                <li><a href="addBulkUpload.php"><i class="fa fa-upload bigfonts"></i>Students Bulk Upload</a> </li>
                                    <li><a href="importArea.php"><i class="fa fa-upload bigfonts"></i>Area Bulk Upload</a> </li>  
                                    <li><a href="assignClasswiseSection.php"><i class="fa fa-download bigfonts"></i>Assign/Import Classwise Section</a> </li>  
									<li><a href="studentsReport.php"><i class="fa fa-line-chart bigfonts" aria-hidden="true"></i>StudentsReport</a> </li> 									
                        </ul>
                        </li>

					<li class="submenu">
                        <a href="#"><i class="fa fa-calendar bigfonts" aria-hidden="true"></i>Attendance Management<span class="menu-arrow"></span></a>						
                        <ul class="list-unstyled">  
                            <!--li><a href="addStudentProfile.php"><i class="fa fa-user-plus bigfonts" aria-hidden="true"></i>add Students</a> <li-->	
                            <li><a href="addStudentsAttendance.php"><i class="fa fa-calendar-check-o bigfonts" aria-hidden="true"></i>Daily Attendance</a> </li>                                                
                                <li><a href="StudentAttendanceReport.php"><i class="fa fa-bar-chart bigfonts" aria-hidden="true"></i> Attendance Report</a> </li>
                                    <!--li><a href="importArea.php"><i class="fa fa-upload bigfonts"></i>Area Upload</a-->                                                                                     
                        </ul></li>

                        <li class="submenu">
                                <a href="#"> <i class="fa fa-calendar bigfonts" aria-hidden="true"></i> Leave Manegemet<span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">								
                                    <li><a href="leaveNavBar.php"><i class="fa fa-user"> </i>HR</a></li>	
                                    <li><a href="leaveSettings.php"><i class="fa fa-cog bigfonts" aria-hidden="true"></i>Leave Settings</a></li>								
                                    <!--li><a href="recordExpenses.php"><i class="fa fa-plus-circle"></i>add Expense</a></li-->								
                                    <!--li><a href=""><i class="fa fa-circle-o"></i>list Accounts</a></li-->
                                </ul>
                            </li>	
                        
						
                    <li class="submenu">
                        <!--a href="#"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i><span>Books/Resources</span></a-->
                        <a href="#"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>Masters<span class="menu-arrow"></span></a>	                        
                        <ul class="list-unstyled">	
                            <li><a href="listClass.php"><i class="fa fa-building-o bigfonts"></i>Class</a></li>
                            <li><a href="listSection.php"><i class="fa fa-folder-o bigfonts"></i>Section</a></li>
                                <li><a href="listAcademic.php"><i class="fa fa-calendar bigfonts"></i>Academic</a></li>
                            <li><a href="listRoute.php"><i class="fa fa-bus bigfonts"></i>Route</a></li>
                            <li><a href="listAreanames.php"><i class="fa fa-location-arrow bigfonts"></i>Areanames</a></li>
                            <li><a href="listFeesHead.php"><i class="fa fa-rupee bigfonts"></i>Fees Heads</a></li>
							 <li><a href="listDesignation.php"><i class="fa fa-user-circle-o bigfonts" aria-hidden="true"></i>Designation</a></li>
							 <li><a href="listCategory.php"><i class="fa fa-minus-square bigfonts" aria-hidden="true"></i>Discount Category</a></li>
                             <li><a href="listLeaveType.php"><i class=""></i>List Leave Types</a></li-->                                                        
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="addComposeSMS.php"><i class="fa fa-envelope bigfonts" aria-hidden="true"></i>Compose SMS<span class="menu-arrow"></span></a>                                      
                    </li>

                    <!--li class="submenu">                  
                        <a href="feesNavBar.php"> <i class="fa fa-money bigfonts" aria-hidden="true"></i>Fees Management</span></a>
                 
                    </li-->   

                    <li class="submenu">
                                <a href="#"> <i class="fa fa-money bigfonts" aria-hidden="true"></i> Fees Manegemet<span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">								
                                    <li><a href="feesNavBar.php"><i class="fa fa-institution bigfonts" aria-hidden="true"></i>Manage Fees</a></li>	
                                    <li><a href="listStockItemMaster.php"><i class="fa fa-building-o bigfonts" aria-hidden="true"></i>Manage Other Fees</a></li>								
                                    <!--li><a href="recordExpenses.php"><i class="fa fa-plus-circle"></i>add Expense</a></li-->								
                                    <!--li><a href=""><i class="fa fa-circle-o"></i>list Accounts</a></li-->
                                </ul>
                            </li>

                    <li class="submenu">
                        <a><i class="fa fa-credit-card bigfonts" aria-hidden="true"></i>Expense Management<span class="menu-arrow"></span></a>	                        
                        <ul class="list-unstyled">	                            
							<!--li><a href="listPayeeMaster.php"><i class="fa fa-user-md bigfonts" aria-hidden="true"></i>Record Payee</a></li-->
                            <li><a href="listVouchers.php"><i class="fa fa-money bigfonts" aria-hidden="true"></i> Record Expenses</a></li>
                            <li><a href="expenseReport.php"><i class="fa fa-fw fa-table"></i> <span> Expenses Report</span></a></li>
							<li><a href="expenseTransactionHistory.php"><i class="fa fa-fw fa-table"></i> <span> Expenses Transaction History log Report</span></a></li>
                        </ul>
                </li>

                <?php 
                    if($_SESSION['groupname']=="Admin"){
                        echo '<li class="submenu"><a href="Reports.php"><i class="fa fa-line-chart bigfonts" aria-hidden="true"></i><span>Reports</span></a></li>';
                    }
                    ?>
                
            <!--li class="submenu">
                        <a href="#"><i class="fa fa-bar-chart-o"></i>Reports<span class="menu-arrow"></span></a>	                        
                        <ul class="list-unstyled">	
							<!--li><a href="collectionReport.php"><i class="fa fa-fw fa-table"></i> <span> Collection Report</span></a></li>
							<li><a href="payeeMasterReport.php"><i class="fa fa-fw fa-table"></i> <span> Payee Reports</span></a></li>
							<li><a href="payeeTransactionHistory.php"><i class="fa fa-fw fa-table"></i> <span> Payee Transaction History log Report</span></a></li-->
							
                            </ul-->
                    </li-->            
                    </ul-->
                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
</div>
    <!-- End Sidebar -->
            </body>
            </html>



