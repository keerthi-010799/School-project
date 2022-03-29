<?php include('header.php'); ?>
<!-- End Sidebar -->


<div class="content-page">



    <!-- Start content -->
    <div class="content">



        <div class="card-header">
            <h3><i class="fa fa-line-chart bigfonts" aria-hidden="true"></i><b> Reports List</b></h3>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td>
                                    <i class="fa fa-money bigfonts" aria-hidden="true"></i>&nbsp;Expenses
                                    </td>
                                    <!--td class="text-left"><i class="fa fa-rupee bigfonts"></i>&nbsp;Fees Collections
                                    </td-->
                                    <td class="text-center"><i class="fa fa-truck smallfonts" aria-hidden="true"></i>&nbsp;Inventory(Uniform Materials & Accessaries)</td>
                                    <td class="text-right"><i class="fa fa-mortar-board bigfonts" aria-hidden="true"></i>&nbsp;Students & Van
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td><a href="expensesReport.php">
                                        <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> Expenses Report&nbsp;</a></td>
                                    <!--td class="text-left"><a  href="SalesOrderReports.php">
                                        <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Fees Collection Report</a>
                                    </td-->

                                    <td class="text-center"><a  href="StockInwardReports.php">
                                        <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Inventory(Inward) Stock Report</a> &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Raw Material Purchase Item Master/Stock Inward Report."></i>
                                    </td>

                                    <td class="text-right">  <a  href="studentsReport.php">
                                        <i class="fa fa-angle-right bigfonts" aria-hidden="true">&nbsp;</i>Student's Community & Caste wise Report</a>
                                        &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="You can get communitywise,classwise,gender & caste wise report"></i>
                                    </td>
                                </tr> 


                                <tr>
                                    <td>
                                        <a href="expenseTransactionHistory.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses Transaction Log Report</a>
                                    </td>  
                                        
                                    
                                    


                                    <td class="text-left">
                                        <!--a href="listInvoices.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Sales by Sales Person</a-->
                                    </td>

                                    <td class="text-center">
                                        <a href="StudentAttendanceReport.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Students Attendance Report</a>
                                    </td>                                                 

                                </tr>  
                                

                                <tr>
                                    <td> 
                                        
                                    </td>
                                    
                                    

                                    <td class="text-left">
                                        <!--a href="listExpenses.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses by Payee c</a-->
                                    </td>

                                    <!--td class="text-center">
                                        <a href="StockOutwardReports.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Inventory(Outward) Stock Report</a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Sales Item Master/Stock Outward Report."></i>
                                    </td>
                                </tr-->
                                
                                <tr>
                                    <td> 
                                        
                                    </td>
                                    
                                    

                                    <td class="text-left">
                                        <!--a href="listExpenses.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses by Payee c</a-->
                                    </td>

                                    <!--td class="text-center">
                                        <a href="inventAdjInwardReport.php">
                                             <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Inventory Adjustment (Inward) Log Report</a> &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="As and when Inward qty is added or updated manually or through GRN, the transaction log report is generated."></i>
                                        
                                        
                                        
                                    </td-->
                                    
                                   
                                </tr>
                                <tr>
                                    <td> 
                                        
                                    </td>
                                    
                                    

                                    <td class="text-left">
                                        <!--a href="listExpenses.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses by Payee c</a-->
                                    </td>

                                    <!--td class="text-center">
                                        <a href="inventAdjOutwardReport.php">
                                             <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Inventory Adjustment (Outward) Log Report</a> &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="As and when Inward qty is added or updated manually or through GRN, the transaction log report is generated."></i>
                                    </td-->
                                    
                                    <td class="text-left">
                                        <!--a href="listExpenses.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses by Payee c</a-->
                                    </td>                                   
                                    
                                    
                                   
                                </tr>
 
                                      <tr>
                                    <td> 
                                        
                                    </td> 
                                          
                                          <td class="text-left">
                                        <!--a href="listExpenses.php">
<i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Expenses by Payee c</a-->
                                    </td>

                                    <!--td class="text-center">
                                        <a href="VendorItemWise.php">
                                             <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Vendor Wise Inventory(Inward) Report</a> &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="As and when Inward qty is added through GRN, vendor wise Item purchased Report is generated."></i>
                                    </td-->


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">       
                                <thead>
                                    <tr>
                                        <td >
                                            <i class="fa fa-rupee bigfonts" aria-hidden="true"></i>&nbsp;Income & Expenditure Balance Sheet
                                        </td>


                                        <td class="text-left">
                                            <i class="fa fa-money bigfonts" aria-hidden="true"></i>&nbsp;Receivables & Fee Payments Made
                                        </td>
                                        <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;</td>
                                        <td class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                                </thead>

                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td><a href="VendorPayablesReports.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Vendor Balances Report
                                            </a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Vendor/Supplier Payments Outstanding Report."></i>
                                        </td>

                                        <td>
                                            <a href="CustomerReceivablesReports.php">
                                                <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Customer Balances Report                                        
                                            </a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Customer Outstanding Report."></i>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <a href="VendorPaymentsReports.php">
                                                <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Payments Made Report</a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Vendor/Suplier Payments Paid Report."></i>
                                            </a>
                                        </td>

                                        <td class="text-left">
                                            <a href="PaymentsRecievedReports.php">
                                                <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i>&nbsp;Sales By Customer </a>
                                        </td>



                                    </tr>

                                    <tr>
                                        <td><a href="listDebitNotes.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Debit Notes</td>

                                        <td class="text-left"><a href="listCreditNotes.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Credit Notes Deatils</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a href="VendorCreditsReports.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Vendor Credits
                                            History</a> &nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Vendor Advance Credits Transaction History Report."></i></td>
                                        <td><a href="PaymentsRecievedReports.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Customer Payments Made</a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Customer Payments Received Report."></i></td>
                                    </tr>

                                    <tr>
                                        <td><a href="listVendorRefunds.php">
                                            <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Refund History</td>
                                            
                                            <td>
                                            <a href="salesItemwiseReport.php">
                                                <i class="fa fa-angle-right bigfonts" aria-hidden="true"></i> &nbsp;Sales Itemwise Report                                        
                                            </a>&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" data-trigger="focus" data-placement="top" title="Customer Outstanding Report."></i>
                                        </td>

                                    </tr>






                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <?php include('footer.php'); ?>