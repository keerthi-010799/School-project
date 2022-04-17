<?php include('header.php'); ?>
	<!-- End Sidebar -->
    <style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}
</style>


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left"><i class="fa fa-calendar-o bigfonts" aria-hidden="true"></i>List Fees Collected</h1>
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
                                    Opening Balance:<input/>											
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
								
									<div class="col-md-12 table-responsive">
								<span id="po_reports_div"></span>
									<div class="table-responsive row">
                                        <div class="column">
									<table id="po_reports" class="table table-bordered table-hover display" style="overflow-x:hidden;">
									<tr>	
                                    <thead>
											<tr>
												<th>#</th>												
												<th>Feesname</th>
												<th>Date</th>
												<th>Credit</th>												
											</tr>
										</thead>										
										<tbody>																				
											<?php
												
													include("database/db_conection.php");//make connection here
												// 	if((isset($_GET['st'])&&$_GET['st']!='')||
												// 	(isset($_GET['end'])&&$_GET['end']!='')||
												// 	(isset($_GET['classwise']) && $_GET['classwise']!=='')||
												// 	(isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
												// $timestamp = strtotime($_GET['st']);
                                                // $st = date('m/d/Y', $timestamp);
                                                // $timestamp = strtotime($_GET['end']);
                                                // $end = date('m/d/Y', $timestamp);
												// 		$classwise = $_GET['classwise'];
												// 		$studentwise = $_GET['studentwise'];
												// 		$sql = "SELECT sum(fees_paid) as totalfee,fee_id,fee_type,collected_date,fees_paid FROM fees_management";										                                            
												// 		if($_GET['st']!=''){
												// 			if($st==$end){
												// 				$sql.= " and s.collected_date='$st' ";   
												// 			}else{
												// 				$sql.=" and (s.collected_date BETWEEN '$st' AND '$end') ";   
												// 			}
												// 		}
												// 		if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
												// 		$sql.=" and s.fee_class='".$_GET['classwise']."'";    
												// 	}
												// 	if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){
	
												// 		$sql.=" and s.fee_student_id='$studentwise'";    
												// 	}													                                                   
												// 	}else{
													$sql = "SELECT fee_id,fee_type,collected_date,fees_paid FROM fees_management";
													//}
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){																				
														echo "<tr>";
                                                        echo '<td>' .$row['fee_id'] . '</td>';
													echo '<td>' .$row['fee_type'] . '</td>';
													echo '<td>'.$row['collected_date'].' </td>';
													echo '<td>'.$row['fees_paid'].' </td>';													
													echo "</tr>";
													}
													}
                                                    $sq = "SELECT sum(fees_paid) as totalfee from fees_management";
                                                    $resul = mysqli_query($dbcon,$sq);													
													if ($resul->num_rows > 0){
													while ($ro =$resul-> fetch_assoc()){
                                        echo "<input type='hidden' id='totfe' value=".$ro['totalfee']."/>";																				
                                                    }
                                                }
													?>																																										
														</tbody>
														<tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
											</tr>
                                        </tfoot>
                                        </table>
                                                </div>
                                                <div class="column">
                                            <table class="table table-bordered table-hover display" style="overflow-x:hidden;">
                                            <thead>
											<tr>
												<th>Payee</th>												
												<th>Date</th>
												<th>Debit</th>																								
											</tr>
										</thead>										
										<tbody>
																				
											<?php
												
													include("database/db_conection.php");//make connection here
												// 	if((isset($_GET['st'])&&$_GET['st']!='')||
												// 	(isset($_GET['end'])&&$_GET['end']!='')||
												// 	(isset($_GET['classwise']) && $_GET['classwise']!=='')||
												// 	(isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
												// $timestamp = strtotime($_GET['st']);
                                                // $st = date('m/d/Y', $timestamp);
                                                // $timestamp = strtotime($_GET['end']);
                                                // $end = date('m/d/Y', $timestamp);
												// 		$classwise = $_GET['classwise'];
												// 		$studentwise = $_GET['studentwise'];
												// 		$sql = "SELECT sum(amount) as totalexpense,payee,amount,createdon FROM recordexpense";										                                            
												// 		if($_GET['st']!=''){
												// 			if($st==$end){
												// 				$sql.= " and s.collected_date='$st' ";   
												// 			}else{
												// 				$sql.=" and (s.collected_date BETWEEN '$st' AND '$end') ";   
												// 			}
												// 		}
												// 		if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
												// 		$sql.=" and s.fee_class='".$_GET['classwise']."'";    
												// 	}
												// 	if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){
	
												// 		$sql.=" and s.fee_student_id='$studentwise'";    
												// 	}													                                                   
												// 	}else{
													$sql = "SELECT payee,amount,createdon FROM recordexpense";
													//}
													$result = mysqli_query($dbcon,$sql);													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){																				
														echo "<tr>";
													echo '<td>' .$row['payee'] . '</td>';
													echo '<td>'.$row['amount'].' </td>';
													echo '<td>'.$row['createdon'].' </td>';
                                                    echo "</tr>";
                                                    
                                                    }
                                                }
                                                $sq1 = "SELECT sum(amount) as totalexpense from recordexpense";
                                                $resul1 = mysqli_query($dbcon,$sq1);													
                                                if ($resul1->num_rows > 0){
                                                while ($ro1 =$resul1-> fetch_assoc()){
                                                    echo '<input type="hidden" id="totex" value='.$ro1['totalexpense'].'/>';                                                }
                                            }
												?>
														</tbody>
														<tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>                                        
											</tr>
                                        </tfoot>                                                
														</table>
														</div>

                                                        <div class="card-header">
                                <span class="pull-right">
                                    Closing Balance:<input id="closingbalance"/>											
										</span>
								
									</div>
                                            </div>
                                            </div>
														
													</div>														
												</div><!-- end card-->			
												</div>
																			
															<script>
															function deleteRecord_8(RecordId)
															{
																if (confirm('Confirm delete')) {
																	window.location.href = 'deleteFeesConfig.php?id='+RecordId;
																}
															}
					function ToPrint(el){
                        var code= $(el).attr('data-code');
                        var template= $(el).attr('data-template');
                                window.location.href = template+'.php?fees_id='+code;

                     }					
													</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
													<script>
    var page_partywise = "<?php if(isset($_GET['partywise'])){ echo $_GET['partywise']; } ?>";
    var page_st = "<?php if(isset($_GET['st'])){ echo $_GET['st']; } ?>";
    var page_end = "<?php if(isset($_GET['end'])){ echo $_GET['end']; } ?>";
    var page_classwise = "<?php if(isset($_GET['classwise'])){ echo $_GET['classwise']; } ?>";
    var page_studentwise = "<?php if(isset($_GET['studentwise'])){ echo $_GET['studentwise']; } ?>";
		                                            
    function delete_record(x){     
            var row_id = $(x).attr('data-id');
            alert(row_id);
            if (confirm('Confirm delete')) {
            window.location.href = 'deleteStudentProfile.php?id='+row_id;
                    }
            }
											
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
			location.href="listcollectedfees.php?st="+st+"&end="+end+"&classwise="+classwise+"&studentwise="+studentwise;								
			}	
			function cb(start, end) {
        $('#daterange').val(start+ ' - ' + end);
        $('#daterange').attr('readonly',true); 
        $("#reset-date").show();
    }
			
</script>
<script>
			$(document).ready(function () {

$('.edit').on('click', function () {

	console.log('red');

	$tr = $(this).closest('tr');

	var data = $tr.children("td").map(function () {
		return $(this).text();
	}).get();

	console.log(data);

	$('#update_id').val(data[0]);
	$('#section1').val(data[1]);
	$('#description').val(data[2]);
   
});
});
</script>

<?php include('footer.php'); ?>
						
						
<script>
    var page_partywise = "<?php if(isset($_GET['partywise'])){ echo $_GET['partywise']; } ?>";
    var page_st = "<?php if(isset($_GET['st'])){ echo $_GET['st']; } ?>";
    var page_end = "<?php if(isset($_GET['end'])){ echo $_GET['end']; } ?>";
    var page_classwise = "<?php if(isset($_GET['classwise'])){ echo $_GET['classwise']; } ?>";
    var page_Communitywise = "<?php if(isset($_GET['Communitywise'])){ echo $_GET['Communitywise']; } ?>";
    var page_castewise = "<?php if(isset($_GET['castewise'])){ echo $_GET['castewise']; } ?>";
    var page_genderwise = "<?php if(isset($_GET['genderwise'])){ echo $_GET['genderwise']; } ?>";
    var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";
		                                            
    function delete_record(x){     
            var row_id = $(x).attr('data-id');
            alert(row_id);
            if (confirm('Confirm delete')) {
            window.location.href = 'deleteStudentProfile.php?id='+row_id;
                    }
            }

    $(document).ready(function() {
        var ex = $('#totex').val();
        var fe = $('#totfe').val();
        let totalex = ex.slice(0, ex.length-1);
        let totalfe = fe.slice(0, fe.length-1);
        var closingbal = totalfe-totalex;
        $('#closingbalance').val(closingbal);
        console.log("res",totalex,totalfe,closingbal);
        
        $('#partywise').val(page_partywise);
        $("#reset-date").hide();
        $('#classwise').val(page_classwise);
        $('#Communitywise').val(page_Communitywise);
        $('#genderwise').val(page_genderwise);
        $('#castewise').val(page_castewise);
        $('#academicwise').val(page_academicwise);

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
        var party_var = $('#partywise').val(); 
        //var printhead = party_var!=''?'<p><b>Vendor : </b>'+party_var+'</p>':'';
        var printhead = date_range!=''?'<p><b>Date : </b>'+date_range+'</p>':'';
        var excel_printhead = '  ';
        excel_printhead+= date_range!=''?'Date : '+date_range:'';

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

				var grossval = api
			.column( 6 )
			.data()
			.reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 ).toFixed(2);

			var grossval1 = api
			.column( 7 )
			.data()
			.reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 ).toFixed(2);



			$( api.column( 0 ).footer() ).html('Total');
			$( api.column( 6 ).footer() ).html(grossval);                
			$( api.column( 7 ).footer() ).html(grossval1);                            },
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
                            '<p><img src="<?php echo $baseurl;?>assets/images/logo/logo@0,25x.png" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>List Fees Collected</b><br/></p>'+printhead+'</div>'
                        );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }, 
                {
                    extend: 'excel',
                    text:'<span class="fa fa-file-excel-o"></span>',
                    title:'List Fees Collected', footer: true ,
                    messageTop: excel_printhead   

                },
                {
                    extend: 'pdf',
                    text:'<span class="fa fa-file-pdf-o"></span>',
                    title:'List Fees Collected', footer: true ,
                    messageTop: excel_printhead   

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
														
</script>
<?php
?>