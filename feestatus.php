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
                                       <?php 
												   include("database/db_conection.php");//make connection here

												  
												   ?>
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
												<th>term1 Total Fees</th>
                                                <th>term1 Fees Paid</th>
                                                <th>term1 Fees balance</th>
                                                <th>term2 Total Fees</th>
                                                <th>term2 Fees Paid</th>
                                                <th>term2 Fees balance</th>
                                                <th>term3 Total Fees</th>
                                                <th>term3 Fees Paid</th>
                                                <th>term3 Fees Paid</th>
                                                <th>van Total Fees</th>
                                                <th>van Fees Paid</th>
                                                <th>van Fees balance</th>
												<th>other fees name </th>
                                                <th>other fees price</th>
											</tr>
										</thead>										
										<tbody>
																				
											<?php
												
													include("database/db_conection.php");//make connection here
													
                                                    //$sql = mysqli_query($dbcon, "SELECT * FROM fee_status where fee_status_id = 2");
                                                    $sql = "SELECT * FROM fee_status";
                                                    //while ($row = $sql->fetch_assoc()){	
													// $date=$row['fee_bal_status'];	
                                                    // echo $date;
                                                    // $s = json_decode($date,true);
                                                    // echo 'red';
                                                    // print_r($s,true);
                                                //  echo $s["Termfees"]["Term1"]["TotalFees"];
                                                    // if((isset($_GET['classwise']) && $_GET['classwise']!=='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!='')||(isset($_GET['castewise'])&&$_GET['castewise']!='')){
													// 	$classwise = $_GET['classwise'];
													// 	$studentwise = $_GET['studentwise'];
													// 	$datewise = $_GET['datewise'];	                                                        
													// 	$sql = "SELECT * FROM `fees_management` s where 1=1";										                                            
													//  if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
													// 	$sql.=" and s.fee_class='".$_GET['classwise']."'";    
													// }
													// if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){
	
													// 	$sql.=" and s.fee_student_id='".$_GET['studentwise']."'";    
													// }
													// if(isset($_GET['datewise'])&&$_GET['datewise']!=''){
	
													// 	$sql.=" and s.collected_date='".$_GET['datewise']."'";    
													// }                                                    
													// }else{
													// $sql = "SELECT * FROM fees_management";
													// }							
                                                    						                                                                                                        
                                                    $result = mysqli_query($dbcon,$sql);													
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){	
                                                        $date=$row['fee_bal_status'];	
                                                    //echo $date;
                                                    $s = json_decode($date,true);
                                                    print_r($s,true);																			
													echo "<tr>";
													echo '<td>' .$row['fee_status_id'] . '</td>';
													echo '<td>'.$row['fee_class'].' </td>';
													echo '<td>'.$row['fee_acadamic_year'].' </td>';
													 echo '<td>row[fee_admission_no] </td>';
													echo '<td>'.$s["Termfees"]["Term1"]["TotalFees"].' </td>';
													echo '<td>'.$s["Termfees"]["Term1"]["Feescollected"].' </td>';
                                                    echo '<td>'.$s["Termfees"]["Term1"]["Balancetopay"].' </td>';
                                                    echo '<td>'.$s["Termfees"]["Term2"]["TotalFees"].' </td>';
													echo '<td>'.$s["Termfees"]["Term2"]["Feescollected"].' </td>';
                                                    echo '<td>'.$s["Termfees"]["Term2"]["Balancetopay"].' </td>';
                                                    echo '<td>'.$s["Termfees"]["Term3"]["TotalFees"].' </td>';
													echo '<td>'.$s["Termfees"]["Term3"]["Feescollected"].' </td>';
                                                    echo '<td>'.$s["Termfees"]["Term3"]["Balancetopay"].' </td>';
                                                    echo '<td>'.$s["Vanfees"]["TotalFees"].' </td>';
													echo '<td>'.$s["Vanfees"]["Feescollected"].' </td>';
                                                    echo '<td>'.$s["Vanfees"]["Balancetopay"].' </td>';
                                                    echo '<td>'.$s["Otherfees"]["itemname"].' </td>';
                                                    echo '<td>'.$s["Otherfees"]["price"].' </td>';                                        
                                        											//	}
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
			var classwise = $('#classwise').val();
			var studentwise = $('#studentwise').val() ? $('#studentwise').val() : "";
            var datewise = $('#datewise').val() ? $('#datewise').val() : "";
			location.href="listcollectedfees.php?classwise="+classwise+"&studentwise="+studentwise+"&datewise="+datewise;								
			}											
</script>

														
									</tbody>
														
									</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->			
							</div>





<?php include('footer.php'); ?>
						
						


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

