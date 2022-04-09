<?php include('header.php'); ?>
	<!-- End Sidebar -->


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
										<a href="FeesCollection.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Fees Collection</a></span>
								
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
                                        
                                         <select id="studentwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="student">
                                             <option value="">-Select Student-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT id,firstname FROM studentprofile  order by firstname asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $student=$row['firstname'];
														echo $id=$row['id'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$id.'" >'.$student.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>
																			   <div class="form-group col-md-3">
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Search" onclick="search_filter();">
									</div>
								
									<div class="col-md-12 table-responsive">
								<span id="po_reports_div"></span>
									<div class="table-responsive">
									<table id="po_reports" class="table table-bordered table-hover display" style="overflow-x:hidden;">
										<thead>
											<tr>
												<th>#</th>												
												<th>Class</th>
												<th>Academic Year</th>
												<th>Admission No </th>
												<th>Student</th>
												<th>Fees Name</th>
												<th>Total Fees</th>
                                                <th>Fees Paid</th>
												<th>Status</th>
												<th>Collected Date</th>
												<th>Action</th>
											</tr>
										</thead>										
										<tbody>
																				
											<?php
												
													include("database/db_conection.php");//make connection here
													if((isset($_GET['st'])&&$_GET['st']!='')||
													(isset($_GET['end'])&&$_GET['end']!='')||
													(isset($_GET['classwise']) && $_GET['classwise']!=='')||
													(isset($_GET['academicwise'])&&$_GET['academicwise']!='')||
													(isset($_GET['castewise'])&&$_GET['castewise']!='')){
														$timestamp = strtotime($_GET['st']);
                                                $st = date('m/d/Y', $timestamp);
                                                $timestamp = strtotime($_GET['end']);
                                                $end = date('m/d/Y', $timestamp);
														$classwise = $_GET['classwise'];
														$studentwise = $_GET['studentwise'];
														$datewise = $_GET['datewise'];	                                                        
														$sql = "SELECT * FROM `fees_management` s where 1=1";										                                            
														if($_GET['st']!=''){
															if($st==$end){
																$sql.= " and s.collected_date='$st' ";   
															}else{
																$sql.=" and (s.collected_date BETWEEN '$st' AND '$end') ";   
															}
														}
														if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
														$sql.=" and s.fee_class='".$_GET['classwise']."'";    
													}
													if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){
	
														$sql.=" and s.fee_student_id='".$_GET['studentwise']."'";    
													}
													if(isset($_GET['datewise'])&&$_GET['datewise']!=''){
	
														$sql.=" and s.collected_date='".$_GET['datewise']."'";    
													}                                                    
													}else{
													$sql = "SELECT * FROM fees_management";
													}
													$result = mysqli_query($dbcon,$sql);
													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){																				
													$adno = $row['fee_admission_no'];
														echo "<tr>";
													echo '<td>' .$row['fee_id'] . '</td>';
													echo '<td>'.$row['fee_class'].' </td>';
													echo '<td>'.$row['fee_academic_year'].' </td>';
													echo '<td>'.$row['fee_admission_no'].' </td>';

													$sql1 = "SELECT * FROM studentprofile where admissionno = '$adno'";
													if($result1 = mysqli_query($dbcon,$sql1)){
														$row1   = mysqli_fetch_assoc($result1);
														if(mysqli_num_rows($result1)>0){												
													echo '<td>'.$row1['firstname'].' </td>';
												}
											}
													echo '<td>'.$row['fee_type'].' </td>';
													echo '<td>'.$row['fee_total_amt'].' </td>';
													echo '<td>'.$row['fees_paid'].' </td>';
													echo '<td> '.$row['fee_status'].' </td>';
													echo '<td> '.$row['collected_date'].' </td>';													 																									 												
													echo '<td>';
													echo '    <div class="dropdown">
					  <button type="button" class="btn btn-light btn-xs dropdown-toggle" data-toggle="dropdown">
					  </button>
	  					<div class="dropdown-menu">
	  						<a class="dropdown-item"  href="#" onclick="ToPrint(this);" data-template="printreciept" data-code="'.$row['fee_id'].'" data-img="assets/images/logo.png"  data-id="po_print"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>  ';
	
													if($row['fee_status']=="Created"){
														 echo ' <a class="dropdown-item" href ="editfeescollection.php?id = "'.$row['fee_id'].'" class="btn btn-primary btn-sm editbtn" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Edit</a>';   														
														echo '
															<a class="dropdown-item"  href="workers/setters/invconverter.php?fee_id='.$row['fee_id'].'&fee_status=Verified" data-id="'.$row['fee_id'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete">&nbsp; Verified</a>';
	
													}
	
													if($row['fee_status']=="Verified"){
															echo '
															<a class="dropdown-item"  href="#" onclick="deleteRecord_8(this);" data-id="'.$row['fee_id'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Delete</a>';
														}
													echo '    </div></div>';	
													echo ' </td>';
													echo "</tr>";
													}
													}
													?>															
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
    var page_datewise = "<?php if(isset($_GET['datewise'])){ echo $_GET['datewise']; } ?>";
		                                            
    function delete_record(x){     
            var row_id = $(x).attr('data-id');
            alert(row_id);
            if (confirm('Confirm delete')) {
            window.location.href = 'deleteStudentProfile.php?id='+row_id;
                    }
            }

    $(document).ready(function() {
        $('#partywise').val(page_partywise);
        $("#reset-date").hide();
        $('#classwise').val(page_classwise);
        $('#datewise').val(page_datewise);
        $('#studentwise').val(page_studentwise);
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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);


                $( api.column( 0 ).footer() ).html('Total');
                $( api.column( 4 ).footer() ).html(grossval);                
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
                            '<p><img src="<?php echo $baseurl;?>assets/images/logo/logo@0,25x.png" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>List collected fees</b><br/></p>'+printhead+'</div>'
                        );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }, 
                {
                    extend: 'excel',
                    text:'<span class="fa fa-file-excel-o"></span>',
                    title:'list Collected Fees', footer: true ,
                    messageTop: excel_printhead   

                },
                {
                    extend: 'pdf',
                    text:'<span class="fa fa-file-pdf-o"></span>',
                    title:'list Collected Fees', footer: true ,
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
			function search_filter(){
				var st = '';
        var end = '';
        var date_range_val = $('#daterange').val();
        if(date_range_val!=''){
            var date_range = date_range_val.replace(" ","").split('-');
            //var filter = $('#filterby').val();
            st = date_range[0].replace(" ","");
            end = date_range[1].replace(" ","");
        }		
        
			var classwise = $('#classwise').val();
			var studentwise = $('#studentwise').val() ? $('#studentwise').val() : "";
            var datewise = $('#datewise').val() ? $('#datewise').val() : "";
			location.href="listcollectedfees.php?st="+st+"&end="+end+"&classwise="+classwise+"&studentwise="+studentwise+"&datewise="+datewise;								
			}	
			function cb(start, end) {
        $('#daterange').val(start+ ' - ' + end);
        $('#daterange').attr('readonly',true); 
        $("#reset-date").show();
    }
			
</script>
<script>
			$(document).ready(function () {

$('.editbtn').on('click', function () {

	//$('#editmodal').modal('show');
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

														
									</tbody>
														
									</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->			
							</div>





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

	var party_var = $('#partywise').val(); 
	var printhead = party_var!=''?'<p><b> </b></p>':'';
	printhead+= date_range!=''?'<p><b> </b></p>':'';
	var excel_printhead = party_var!=''?'Vendor : '+party_var:'';
	excel_printhead+= '  ';
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
			.column( 4 )
			.data()
			.reduce( function (a, b) {
				return intVal(a) + intVal(b);
			}, 0 ).toFixed(2);


			$( api.column( 0 ).footer() ).html('Total');
			$( api.column( 4 ).footer() ).html(grossval);                
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
						'<p><img src="<?php echo $baseurl;?>assets/images/logo/logo@0,25x.png" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>List collected fees</b><br/></p>'+printhead+'</div>'
					);

					$(win.document.body).find( 'table' )
						.addClass( 'compact' )
						.css( 'font-size', 'inherit' );
				}
			}, 
			{
				extend: 'excel',
				text:'<span class="fa fa-file-excel-o"></span>',
				title:'Students Report', footer: true ,
				messageTop: excel_printhead   

			},
			{
				extend: 'pdf',
				text:'<span class="fa fa-file-pdf-o"></span>',
				title:'Students Report', footer: true ,
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

<?php include('footer.php'); ?>

