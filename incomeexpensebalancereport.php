<?php include('header.php'); ?>
	<!-- End Sidebar -->
   

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left"><i class="fa fa-calendar-o bigfonts" aria-hidden="true"></i>Income Expense Balance Report</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active"><a href="feesNavBar.php">Fees Navigation Menu Bar</li></a></li>
													</ol>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->
						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
                                <span class="pull-right">
                                    Opening Balance:<input value="<?php
                                    include("database/db_conection.php");
                                    $sq3="SELECT closingbalance FROM `instprofile`";
                                    if($resul = mysqli_query($dbcon,$sq3)){
                                     $ro4   = mysqli_fetch_assoc($resul);
                                     if(mysqli_num_rows($resul)>0){
                                     $csbal = $ro4['closingbalance'];
                                    }
                                    }
                                    echo $csbal;
                                    ?>"/>											
									 </span>
								
									</div>
									<div class="form-row">
									<div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" id="daterange" class="form-control-sm" placeholder="Select Date Range">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" id="reset-date">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                
                                  
									<div class="form-group col-md-3">
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Search" onclick="search_filter();">
									</div>
                                    </div>
								
									<div class="col-md-12 table-responsive">
								<span id="po_reports_div"></span>
									<div class="table-responsive row">
									<table id="po_reports" class="table table-bordered table-hover display" style="overflow-x:hidden;">
                                    <thead>
											<tr>
												<th>Id</th>												
												<th>TransId</th>
												<th>Date</th>
												<th>Details</th>
                                                <th>Credit</th>
                                                <th>Debit</th>	
                                                <th>Closing Balance</th>	
											</tr>
										</thead>										
										<tbody>																				
											<?php
												
													include("database/db_conection.php");//make connection here
													if((isset($_GET['st'])&&$_GET['st']!='')||
													(isset($_GET['end'])&&$_GET['end']!='')||
													(isset($_GET['classwise']) && $_GET['classwise']!=='')||
													(isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
												$timestamp = strtotime($_GET['st']);
                                                $st = date('Y-m-d', $timestamp);
                                                $timestamp = strtotime($_GET['end']);
                                                $end = date('Y-m-d', $timestamp);
														$classwise = $_GET['classwise'];
														$studentwise = $_GET['studentwise'];
														$sql = "SELECT * FROM transactions s WHERE 1=1";										                                            
														if($_GET['st']!=''){
															if($st==$end){
																$sql.= " and s.trans_date='$st' ";   
															}else{
																$sql.=" and (s.trans_date BETWEEN '$st' AND '$end') ";   
															}
                                                        }
													}else{
													$sql = "SELECT * FROM transactions";
													}
													$result = mysqli_query($dbcon,$sql);	
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){																				
														echo "<tr>";
                                                        echo '<td>' .$row['id'] . '</td>';
													echo '<td>' .$row['trans_id'] . '</td>';
													echo '<td>'.$row['trans_date'].' </td>';
                                                    echo '<td>'.$row['trans_details'].' </td>';																										                                                   
                                                    if($row['trans_type']==="Credit"){
                                                        echo '  <td>'.$row['trans_amt'] .'</td>
                                                             <td>0</td> ';
                                                      }else{
                                                          echo '  <td>0</td>
                                                          <td>'.$row['trans_amt'] .'</td> ';
                                                      }                                                    													
													echo '<td>'.$row['total_closing_bal'].' </td>';													
													echo "</tr>";
													}
													}                                                                                            
													?>																																																																												
														</tbody>
														<tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th> 
                                                <th></th>
                                                <th></th>
                                                <th></th>  
                                                <th></th>
											</tr>
                                        </tfoot>                                                
														</table>
														</div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>													
													</div>														
												</div>		
												
																			
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    var page_classwise = "<?php if(isset($_GET['classwise'])){ echo $_GET['classwise']; } ?>";
    var page_studentwise = "<?php if(isset($_GET['studentwise'])){ echo $_GET['studentwise']; } ?>";
    var page_st = "<?php if(isset($_GET['st'])){ echo $_GET['st']; } ?>";
    var page_end = "<?php if(isset($_GET['end'])){ echo $_GET['end']; } ?>";


    $(document).ready(function() {
        $('#classwise').val(page_classwise);
        $('#studentwise').val(page_studentwise);
        $("#reset-date").hide();
        $('#daterange').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'This Quarter': [moment().startOf('quarter'), moment().endOf('quarter')],
                'Last Quarter': [moment().subtract(1, 'quarter').startOf('quarter'), moment().subtract(1, 'quarter').endOf('quarter')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            $('#daterange').attr('readonly',true); 
            $("#reset-date").show();
        });
        if(page_end!=''){
            cb(page_st,page_end);
        }else{
            $('#daterange').val(''); 
        }
        $("#reset-date").click(function(){
            $('#daterange').val('');
            $('#daterange').attr('readonly',false); 
            $("#reset-date").hide();
        });
        var date_range = $('#daterange').val(); 
    });   

        $(document).ready(function() {
        var table = $('#po_reports').DataTable( {
            lengthChange: false,
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
                };
                var stockOnHanda = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);

                var stockOnHandb = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                

                var stockOnHandc = 
                stockOnHanda - stockOnHandb;
                // api
                // .column( 6 )
                // .data()
                // .reduce( function (a, b) {
                //     return intVal(a) + intVal(b);
                // }, 0 ).toFixed(2);

                
                $( api.column( 0 ).footer() ).html('Total');                
                 $( api.column( 4 ).footer() ).html(stockOnHanda);
                $( api.column( 5 ).footer() ).html(stockOnHandb);
                 $( api.column( 6 ).footer() ).html(stockOnHandc);


            },
            buttons: [
                {
                    extend: 'print',
                    title: '',
                    text: '<span class="fa fa-print"></span>',
                    footer: true ,
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .prepend(
                            '<p><img src="assets/images/schoollogo.jpeg" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>Income Expense Balance Report</b><br/></p></div>'
                        );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }, 
                {
                    extend: 'excel',
                    text:'<span class="fa fa-file-excel-o"></span>',
                    title:'Income Expense Balance Report', footer: true,
                    messageTop: ''   

                },
                {
                    extend: 'pdf',
                    text:'<span class="fa fa-file-pdf-o"></span>',
                    title:'Income Expense Balance Report', footer: true,
                    messageTop: ''   

                },
                {
                    extend: 'colvis',
                    text:'Show/Hide', footer: true 
                }
            ]
        } );

        table.buttons().container()
            .appendTo( '#po_reports_div');
    });

        function search_filter(){
		var st = '';
        var end = '';
        var date_range_val = $('#daterange').val();
        if(date_range_val!=''){
            var date_range = date_range_val.replace(" ","").split('-');
            st = date_range[0].replace(" ","");
            end = date_range[1].replace(" ","");
        }		
			var classwise = $('#classwise').val();
			var studentwise = $('#studentwise').val();
			location.href="incomeexpensebalancereport.php?st="+st+"&end="+end+"&classwise="+classwise+"&studentwise="+studentwise;								
			}	
			
            function cb(start, end) {
        $('#daterange').val(start+ ' - ' + end);
        $('#daterange').attr('readonly',true); 
        $("#reset-date").show();
    }		
</script>
<?php include('footer.php'); ?>