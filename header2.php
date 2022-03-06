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

        <title>e-Schoolz - an Online School/College Management Software</title>
        <meta name="description" content="Online School/College Management Software">
        <meta name="author" content="">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/logo3.png">

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        
        

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css"/>
        
        <!-- Select 2 -->
         <link href="select2.css" rel="stylesheet"/>
    


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

                        <!--h5 class="modal-title"><font color="grey">Quick Create</font></h5-->
                        <h5 class="text-overflow"><small><?php if(isset($_SESSION['login_email'])){ echo $_SESSION['login_email']; } ?>&nbsp;Logged In</small> </h5>

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
                                                        <td>
                                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;Purchases
                                                        </td>
                                                        <td class="text-right"><i class="fa fa-shopping-cart"></i>&nbsp;Sales
                                                        </td>
                                                        <td class="text-center"><i class="fa fa-truck smallfonts" aria-hidden="true"></i>&nbsp;Inventory/Stock Transfers</td>
                                                        <td class="text-right"><i class="fa fa-th-large bigfonts" aria-hidden="true"></i>&nbsp;General
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="listPurchaseOrders.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Purchase Order</i></a></td>
                                                        <td class="text-right"><a href="listEstimates.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Estimates</i></a></td>
                                                        <td class="text-left"><a  href="listPurchaseItemMaster.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Inventory/ Inward</i></a></td>
                                                        <td class="text-right"><a  href="listCustomerProfile.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Customer</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a  href="listGoodsReceiptNote.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Goods Received Note</i></a></td>
                                                        <td class="text-right"><a href="listSalesOrders.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Sales Order</i></a></td>
                                                        <td class="text-left"><a  href="listPurchaseItemMaster.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;
                                                              Adjust Qty and Price(Inward)</i></a></td>
                                                        <td class="text-right"><a href="listVendorProfile.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Vendor</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="addVendorPayments.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Make Vendor Payments </i></a></td>  

                                                        <td class="text-right"><a href="listInvoices.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Invoices</i></a></td>
                                                        <td class="text-left"><a  href="listSalesItemMaster.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Inventory / Outward</i></a></td>
                                                        <td class="text-right"><a href="addSupplierBankDetails.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true"></i>&nbsp;Vendor Bank</a>
                                                        </td>
                                                    </tr>
                                                    <tr>


                                                        <td><a  href="listVendorCredits.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Vendor Credits</i></a></td>
                                                       <!-- <td class="text-right"><a  href="listInvoices.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Print Delivery Challan</i></a></td>-->
                                                        
                                                        <td class="text-right"><a  href="addCustomerReceipts.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Receive Cust Payments</i></a></td>
                                                        
                                                        
                                                        

                                                        <td class="text-left"><a  href="listSalesItemMaster.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Adjust Qty/Price(Outward Items)</i></a></td>
                                                        <td class="text-right"><a  href="addCreditNotes.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;add Credit Notes</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a  href="listDebitNotes.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Print Debit Note</i></a></td>
                                                        <td class="text-right"><a  href="addCashMemo.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Cash Memo/Retail Invoice</i></a></td>
                                                        <td class="text-left"><a href="listtransferProductInward.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Stock Transfers(Inward to Locations)</i></a></td>
                                                        <td class="text-right"><a  href="listofrecordExpenses.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Record Expenses</i></a></td>



                                                        <!--td class="text-right"><a  href="Reports.php">
<i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Reports</i></a></td-->

                                                    </tr>
                                                    <tr>
                                                        <td><a href="listPaymentsMade.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Vendor Payments Made</i></a></td> 
                                                        <!--td class="text-right"><a  href="listCustomerPayments.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Customer Payments Made</i></a></td-->
                                                        <!--td class="text-left"><a href="transferProductInward.php">
                                                            <i class="fa fa-plus bigfonts" aria-hidden="true">&nbsp;Stock Transfers(Inward to Outward)</i></a></td-->
                                                        <td class="text-right"></td>
                                                    </tr>

                                                    <!--tr>
<td><a  href="addExpenses.php"></a></td>
<td class="text-right"><a href="addCreditNotes.php">
<i class="fa fa-plus bigfonts" aria-hidden="true"></i>&nbsp;Credit Notes</a></td>
<td class="text-center"></td>
<td class="text-right"></td>
</tr-->

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
                                                        <!--td class="text-center"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i><strong>&nbsp;Lists</strong>
</td>
<td class="text-right"><i class="fa fa-wrench bigfonts" aria-hidden="true"></i><strong>&nbsp;Tools</strong>
</td-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a  href="listInstituteProfile.php">
                                                            Institute Profile</a></td>
                                                        <td class="text-center"><a  href="listFeesConfig.php">
                                                            Fees Configuration</a></td>
                                                        <!--td class="text-center"><a href="listEstimates.php">list Estimates</a></td-->	
                                                        <td class="text-center"><a  href="">
                                                            some links here..</i></a></td>

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
                                            <td><a href="listUserGroups.php">																		add Roles/Group</a></td>
                                            <td class="text-center"><a  href="">
                                                some links here...</a></td>
                                            <!--td class="text-center"><a  href="listInvoices.php">list Invoices</a>


</td-->				  
                                        <td class="text-center"><a  href="">
                                                            &nbsp;some links here...</i></a></td>														
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
                                            <td>
                                                <a href="listCompanyBankDetails.php">Institute Bank Details</a></td>

                                            <!--td class="text-center"><a href="PaymentsRecievedReportsacc.php">
                                                Manual Inv Payments Made Report</a>
                                            </td-->
                                            <!--td class="text-center">
<a  href="listCustomerPayments.php">list Customer Payments Made</a>
</td>							
<td class="text-right">
<a href=""></a>
</td-->
                                        </tr>

                                         <tr>
                                            <td><a  href="listTaxMaster.php">
                                                </a></td>
                                            <!--td class="text-center"><a href="listWarehouse.php">Warehouse List</a></td>
                                            <td class="text-center"></td-->
                                            <td class="text-center"><a href="">Some links here...</a></td>
                                        </tr>
                                        <tr>


                                            <!--td><a  href="listlocation">list Delivery Location</a></td>
<td class="text-center"><a  href="listTransportMaster.php">list Transporters</a></td>																		
<td class="text-center"></td>
<td class="text-right"></td-->
                                        </tr>

                                        <!--tr>
<!--td class="text-center"><a href="listCustomerType.php">list Customer Type</a>
</td>																			
<td class="text-center"></td>
<td class="text-right"></td>
</tr-->

                                        <!--tr>

<td class="text-center"><a href="listSupplierCode.php">list Supplier Type</a></td>																			

</tr-->



                                        <!--tr>
<td class="text-center"><a  href=""></a></td>
<td class="text-center"><a  href="listPaymentsMade.php">list Vendor Payments Made</a></td>	



<td class="text-center"></td>
<td class="text-right"></td>
</tr-->

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
            <a href="index.php" class="logo"><img alt="Logo" class="alert-info" src="assets/images/logo3.png"> 
                
                <font color="yellow"><small>School ERP<b>  
                  </b></small></font></a>
        </div>



        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0 ">                        


                <!--li class="list-inline-item dropdown notif">

                    <a class="nav-link dropdown-toggle arrow-none" data-target=".bd-example-modal-lg2"  data-toggle='modal' href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-plus-circle bigfonts" aria-hidden="false"></i></a>

                    <!--a href="#custom-modal" data-target=".bd-example-modal-lg" data-toggle="modal"> 
<i class="fa fa-plus-circle bigfonts" aria-hidden="false"></i></a>
                </li-->

                <?php 
                if($_SESSION['groupname']=='Admin'){
                    echo '<li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-target=".bd-example-modal-lg3" data-toggle="modal" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-cog bigfonts" aria-hidden="true"></i></a>
                </li>';
                }
                ?>
               <!--li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-target=".bd-example-modal-lg3" data-toggle='modal' href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-cog bigfonts" aria-hidden="true"></i></a>
                </li-->

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-question-circle"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small>Help and Support</small></h5>
                        </div>

                        <!-- item-->
                        <!--a target="_blank" href="" class="dropdown-item notify-item">                                    
                            <p class="notify-details ml-0">
                                Have Questions? Refer Help Documentaion here
                                <a title="" target="_blank" href="helpDocs.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visit Help Documentation
                                </a>

                                <span></span>
                            </p>
                        </a-->

                        <!-- item-->
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

                <!--li class="list-inline-item dropdown notif">
<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<i class="fa fa-fw fa-envelope-o"></i><span class="notif-bullet"></span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">

<div class="dropdown-item noti-title">
<h5><small><span class="label label-danger pull-xs-right">12</span>Contact Messages</small></h5>
</div>


<a href="#" class="dropdown-item notify-item">                                    
<p class="notify-details ml-0">
<b>Jokn Doe</b>
<span>New message received</span>
<small class="text-muted">2 minutes ago</small>
</p>
</a>


<a href="#" class="dropdown-item notify-item">                                    
<p class="notify-details ml-0">
<b>Michael Jackson</b>
<span>New message received</span>
<small class="text-muted">15 minutes ago</small>
</p>
</a>


<a href="#" class="dropdown-item notify-item">                                    
<p class="notify-details ml-0">
<b>Foxy Johnes</b>
<span>New message received</span>
<small class="text-muted">Yesterday, 13:30</small>
</p>
</a>


<a href="#" class="dropdown-item notify-item notify-all">
View All
</a>

</div>
</li>

<li class="list-inline-item dropdown notif">
<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">

<div class="dropdown-item noti-title">
<h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>
</div>


<a href="#" class="dropdown-item notify-item">
<div class="notify-icon bg-faded">
<img src="assets/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
</div>
<p class="notify-details">
<b>John Doe</b>
<span>User registration</span>
<small class="text-muted">3 minutes ago</small>
</p>
</a>
</div>
</li-->
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

            <ul class="list-inline menu-left mb-0">
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
                        <a  href="index.php"><i class="fa fa-dashboard"></i><span> Dashboard </span> </a>
                        <!--i class="fa fa-fw fa-bars"></i-->
                    </li>

                    <!--li class="submenu">
<a href="charts.html"><i class="fa fa-fw fa-area-chart"></i><span> Charts </span> </a>
</li-->

                    <li class="submenu">
                        <a href="#"><i class="fa fa-users"></i>Students<span class="menu-arrow"></span></a>						
                        <ul class="list-unstyled">  
                            <!--li><a href="addStudentProfile.php"><i class="fa fa-user-plus bigfonts" aria-hidden="true"></i>add Students</a> <li-->	
                            <li><a href="listStudentProfile.php"><i class="fa fa-server bigfonts"></i>Students</a> 
                                
                            <!--li class="submenu">
                                </ul-->
                                <li><a href="addBulkUpload.php"><i class="fa fa-upload bigfonts"></i>Students Upload</a> 
                                    <li><a href="importArea.php"><i class="fa fa-upload bigfonts"></i>Area Upload</a> 
                            
                            
                            </li>
                        </ul>
					<li class="submenu">
                        <a href="#"><i class="fa fa-users"></i>Staff<span class="menu-arrow"></span></a>						
                        <ul class="list-unstyled">  
                            <!--li><a href="addStudentProfile.php"><i class="fa fa-user-plus bigfonts" aria-hidden="true"></i>add Students</a> <li-->	
                            <li><a href="addStaffProfile.php"><i class="fa fa-server bigfonts"></i>Staff Profiles</a> 
                                
                            <!--li class="submenu">
                                </ul-->
                                <li><a href="addBulkUpload.php"><i class="fa fa-upload bigfonts"></i>Staff Upload</a> 
                                    <!--li><a href="importArea.php"><i class="fa fa-upload bigfonts"></i>Area Upload</a--> 
                            
                            
                            </li>
                        </ul>
						
                    <li class="submenu">
                        <!--a href="#"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i><span>Books/Resources</span></a-->
                        <a href="#"><i class="fa fa-th-list bigfonts" aria-hidden="true"></i>Masters<span class="menu-arrow"></span></a>	                        
                        <ul class="list-unstyled">	
                            <li><a href="listClass.php"><i class="fa fa-building-o bigfonts"></i>Class</a></li>
                            <li><a href="listSection.php"><i class="fa fa-folder-o bigfonts"></i>Section</a></li>
                                <li><a href="listAcademic.php"><i class="fa fa-calendar bigfonts"></i>Academic</a></li>
                            <li><a href="addRoute.php"><i class="fa fa-bus bigfonts"></i>Route</a></li>
                            <li><a href="listAreanames.php"><i class="fa fa-location-arrow bigfonts"></i>Areanames</a></li>
                            <li><a href="listFeesHead.php"><i class="fa fa-rupee bigfonts"></i>Fees Heads</a></li>
							 <li><a href="listDesignation.php"><i class="fa fa-rupee bigfonts"></i>Designation</a></li>
                            
                            
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="addComposeSMS.php"><i class="fa fa-envelope bigfonts" aria-hidden="true"></i>Compose SMS<span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">								
                                    <!--li><a href="addComposeSMS.php"><i class="fa fa-envelope-o bigfonts"></i>Custom Messages</a></li>	
<li><a href="addAttendance.php"><i class="fa fa-check-square-o bigfonts"></i>Attendance</a></li-->                                </ul>
                        
                    </li>

                    <li class="submenu">
<a href="#"><i class="fa fa-building-o bigfonts" aria-hidden="true"></i>Expenses <span class="menu-arrow"></span></a>
<ul class="list-unstyled">	
    <!--li><a href="recordExpenses.php"><i class="fa fa-rupee bigfonts"></i>Record Expenses</a></li-->
<li> <a href="addBankDeposit.php"><i class="fa fa-bank bigfonts"></i>Bank Deposit</a></li>
<li><a href="listBankDeposit.php"><i class="fa fa-th-list "></i>List Bank deposit</a></li>

</ul>
</li>
                    <?php 
                        if($_SESSION['groupname']=="Admin"){
                        echo 

                    '<li class="submenu">
                        <a href="#"><i class="fa fa-user-secret bigfonts" aria-hidden="true"></i>Users[Admin]<span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">								
                            <li><a href="addUsers.php"><i class="fa fa-user-plus bigfonts"></i>Create User</a></li>
                            <li><a href="addUserGroup.php"><i class="fa fa-user-circle bigfonts"></i>Create Usergroup</a></li>
                            <li><a href="listUserProfile.php"><i class="fa fa-lock bigfonts"></i>Lock User</a></li>
                            

                            <!--li class="submenu">
                                <a href="#"><i class="fa fa-rupee bigfonts" aria-hidden="true"></i><span>Expenses</span><span class="menu-arrow"></span></a-->
                                
                                <ul class="list-unstyled">								
                                    						
                                    <!--li><a href=""><i class="fa fa-circle-o"></i>list Accounts</a></li-->
                                </ul>
                            </li>		
                        </ul>';
                            }
                    ?>

                   
                    <!--li class="submenu">
<a href="#"><i class="fa fa-rupee bigfonts" aria-hidden="true"></i><span>Accounts Receivables<span class="menu-arrow"></span></a>
<ul class="list-unstyled">								
<li><a href="addCustomerBankDetails.html"><i class="fa fa-circle-o"></i>add Bank Details</a></li>								
<li><a href=""><i class="fa fa-circle-o"></i>list Bank Details</a></li>
<li><a href="addCustomerAccounts.html"><i class="fa fa-circle-o"></i>Customer Accounts</a> <li>
<li><a href=""><i class="fa fa-circle-o"></i>list Accounts</a></li>
</ul>
</li-->	
                    <!--?php 
                    if($_SESSION['groupname']=="Admin"){
                        echo '<li class="submenu"><a href="Reports.php"><i class="fa fa-bar-chart-o"></i><span>Reports</span></a></li>';
                    }
                    ?-->

                    
<!--li class="submenu">
<a href="Reports.php"><i class="fa fa-bar-chart-o"></i><span>Reports</span></a>	
/li-->
                    <!--ul class="list-unstyled">								
<li><a href="VendorPayablesReports.php"><i class="fa fa-circle-o"></i><b>Vendor Payables</b></a></li>						
<li><a href="PurchaseOrderReports.php"><i class="fa fa-circle-o"></i><b>Purchase Order</b></a></li>
<li><a href="SalesOrderReports.php"><i class="fa fa-circle-o"></i>Sales Order</a> <li>
<li><a href="VendorPaymentsReports.php"><i class="fa fa-circle-o"></i>Vendor Payments</a></li>
<li><a href="PaymentsRecievedReports.php"><i class="fa fa-circle-o"></i>Payments Recieved</a></li>
<li><a href="CustomerReceivablesReports.php"><i class="fa fa-circle-o"></i>Customer Receivables</a></li>

</ul-->
                    <!--
</li>	
-->
 <!--?php 
                    if($_SESSION['groupname']=="Admin"){
                        echo '<li class="submenu"><a href="Reports.php"><i class="fa fa-bar-chart-o"></i><span>Reports</span></a></li>';
                    }
                    ?-->

                    <li class="submenu">
                        <!--a class="pro" href="#"><i class="fa fa-user bigfonts" aria-hidden="true"></i><span>Users & Controls</span> <span class="menu-arrow"></span></a-->
                        <!--a class="pro" href="#"><span></span> </a-->
                        <!--ul class="list-unstyled">								
                            <li><a style="color:orange" href="listUsers.php"><i class="fa fa-circle-o"></i>list Users</a></li>
                            <li><a style="color:orange" href="addUsers.php"><i class="fa fa-user-plus bigfonts" aria-hidden="true"></i>add Users</a></li>
                            <li><a style="color:orange"  href="addUserGroup.php"><i class="fa fa-chain"></i>add User Groups</a></li>
                            <li><a style="color:orange" href="listUserGroups.php"><i class="fa fa-circle-o"></i><b>list User Groups</b></a></li>        
                            <li><a style="color:orange" href="myProfile.php"><i class="fa fa-user-circle-o bigfonts" aria-hidden="true"></i>My Profile</a></li>	
                            <li><a style="color:orange" href="pro-settings.html"><i class="fa fa-cogs"></i>Settings</a></li-->										
                            <!--li class="submenu">
                                <a style="color:orange" href="#"><i class="fa fa-bank bigfonts" aria-hidden="true"></i> <span>Org Profile</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">								
                                    <li><a a style="color:orange" href="listCompanyProfile.php"><i class="fa fa-circle-o"></i>list Profile</a></li>
                                    <li><a a style="color:orange" href="addCompanyProfile.php"><i class="fa fa-plus-circle"></i>Company Profile</a></li>	
                                    <li><a a style="color:orange" href="listCompanyBankDetails.php"><i class="fa fa-circle-o"></i>list Bank</a></li>
                                    <li><a style="color:orange" href="addCompanyBankDetails.php"><i class="fa fa-plus-circle"></i>Company Bank</a></li>

                                </ul>
                        </ul>
                    </li>

                </ul-->




                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- End Sidebar -->

    <!-- END main -->



