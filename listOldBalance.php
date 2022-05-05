<?php include('header.php'); 
include('workers/getters/functions.php');
?>
<!-- End Sidebar -->


<script type="text/javascript">
    function checkAll(checkname, bx) {
        for (i = 0; i < checkname.length; i++){
            checkname[i].checked = bx.checked? true:false;
        }
    }
    function checkPage(bx){


        var bxs = document.getElementByTagName ( "table" ).getElementsByTagName ( "link" ); 

        for(i = 0; i < bxs.length; i++){
            bxs[i].checked = bx.checked? true:false;
        }
    }
</script>
<?php
include("database/db_conection.php");//make connection here
$message ='';
//$admnoFound ='';
	if (isset($_POST["submit"])) {
    
	// $fileName = $_FILES["file"]["tmp_name"];
	 
	 if ($_FILES['file']['name']) {
		 
		 $filename = explode(".",$_FILES['file']['name']);
		 
		if(end($filename)=='csv'){
			 $handle = fopen($_FILES['file']['tmp_name'],"r");
				 while($data = fgetcsv($handle)){
					 
					 $academic =mysqli_real_escape_string($dbcon,$data[0]);
					 $admissionno =mysqli_real_escape_string($dbcon,$data[1]);
					 $firstname =mysqli_real_escape_string($dbcon,$data[2]);
					 $lastname =mysqli_real_escape_string($dbcon,$data[3]);
					 $class =mysqli_real_escape_string($dbcon,$data[4]);
					 $feesBalance =mysqli_real_escape_string($dbcon,$data[5]);
					
					
				 $query = "INSERT INTO  oldbalstudents( 
				  academic,
					 admissionno,
					 firstname,
					 lastname,
					 class ,
					 fees_balance				
					 )
					 VALUES('$academic','$admissionno','$firstname','$lastname','$class','$feesBalance')";
					   mysqli_query($dbcon,$query);
					   
				 }
				
					fclose($handle) ;
			
			$message = " Old Balance Students List Imported Successfully";
		 }
	 }
	 
 }
 ?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Students Discount List</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Students Fees Discount List/li>
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
										<a href="assignOldBalance.php" class="btn btn-success btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Assaign Old Balance</a></span>
									<h3<i class="fa fa-file-text-o bigfonts" aria-hidden="true"></i> List Discount </h3>
								</div>
								
								<div class="card-body">
                                    
                                   
										
									<form action=""  enctype="multipart/form-data" method="post" accept-charset="utf-8">

								
<div class="form-row">                                 
<div class="form-group">
		<label>
			<div class="fa-hover col-md-12 col-sm-8">
				<i class="fa fa-folder-open bigfonts" aria-hidden="true"></i>UPLOAD OLD BALANCE STUDENTS</div></label> 
	
		
	<p>Upload CSV <input type='file' name='file'></p>
	
	</div>
	</div>

	<div class="form-row">
	<div class="form-group text-right m-b-8">
					   &nbsp;<button class="fa fa-download bigfonts btn btn-success btn-sm" name="submit" type="submit" value="Import">
							IMPORT OLD BALANCE STUDENTS
						</button>
						<button type="button" name="cancel" class="btn btn-secondary btn-sm" onclick="window.history.back();">Cancel
						</button>
						<br> <a href='download/oldbalstudents.csv'>Download Sample Old Balance Students File Format</a>
		</div>
		</div>		
</form>
</br></div>
								
																															
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
                                        
                                         <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic  order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>
										
										<div class="form-group col-md-3">                                        
										<select id="studentwise" data-parsley-trigger="change"  class="form-control select2"  name="student">
											<option value="">-Select Student-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here

												   $sql = mysqli_query($dbcon, "SELECT concat(firstname,' ',lastname) as firstname,admissionno
                                                   FROM oldbalstudents order by id asc");
												   while ($row = $sql->fetch_assoc()){	
													echo $admissionno=$row['admissionno'];
													 echo $firstname=$row['firstname'];
                                                    echo '<option onchange="'.$row[''].'" value="'.$admissionno.'" >'.$admissionno.' '.$firstname.'</option>';
                                                   
													//   echo '<option onchange="'.$row[''].'" value="'.$admissionno.'" >'.$admissionno.'" >'.$firstname.'</option>';
												   }
												   ?>
											   </select>
											   
									   </div>
										
											<div class="form-group col-md-3">
											<input type="button" class="btn btn-primary btn-sm" name="search" value="Search" onclick="search_filter();">
								
                                        </div>
										</div>
										
										
                                    </form>
                                    
									<div class="col-md-12 table-responsive">
                                    <span id="po_reports_div"></span>
									<table id="po_reports" class="table table-bordered table-hover display" style="overflow-x:hidden;">
										<thead>
											<tr>
													<th style="width:30px">#</th>	
                                                    <th style="width:40px">Academic</th>
                                                    <th style="width:40px">Admission No</th>													<th style="width:30px">Student Name</th>
                                                    <th style="width:20px">Class</th>                                                  
                                                    <th style="width:20px">Fee Balance</th>
                                                    <th style="width:20px">Created By</th> 	
                                                    <th style="width:20px">Status</th> 		
                                                    <th style="width:20px">Actions</th> 												
											</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here																									
													if((isset($_GET['classwise']) && $_GET['classwise']!=='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!='')
                                                    ||(isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
														$classwise = $_GET['classwise'];
														$academicwise = $_GET['academicwise'];
														$studentwise = $_GET['studentwise'];	
														$sql = "SELECT academic,admissionno,firstname,concat(firstname,' ',lastname) as studentname,class,
														fees_balance,status, createdby,id
                                                        FROM  `oldbalstudents` o
                                                        WHERE 1=1  ";										                                            
													 if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
														$sql.=" and o.class='".$_GET['classwise']."'";    
													}
													if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){
	
														$sql.=" and o.admissionno='".$_GET['studentwise']."'";    
													}
													if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
														$sql.=" and o.academic='".$_GET['academicwise']."'";    
													}
	
													}else{
														$sql = "SELECT academic,admissionno,concat(firstname,' ',lastname) as studentname,class,
														fees_balance,status, createdby,id
                                                        FROM  `oldbalstudents` o                                         
														ORDER BY id ASC";													}
																											
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
													
													//echo '<td>'.$row['discid'].'<br><a href="approveStudentDiscount.php?id=' . $row['id'] . '">Approve</a>&nbsp;|&nbsp;<a href=approveStudentDiscount.php>Reject</a></td>';
													
                                                    echo '<td>'.$row['academic'].'</td>';
                                                    echo '<td>'.$row['admissionno'].'<br /></td>';																							
													echo '<td>'.$row['studentname'].'</td>';                                               
													echo '<td>'.$row['class'].'</td>';                                                 
													echo '<td>'.$row['fees_balance'].'</td>';											    
                                                    echo '<td>'.$row['createdby'].'</td>';	
                                                    ?>
													<td><?php if($row['status']=='Y'){
																	echo '<span style="background-color:green;text-align:center;">
																	<span style="color:white;text-align:center;">Active';
																}else if($row['status']=='N'){
																	echo '<span style="background-color:orange;text-align:center;">
																	<span style="color:white;text-align:center;">  Inactive';
																}else{
																	echo "";
																}	 ?>
													</td>
												  
													<?php
													echo '<td><a href="editOldBalance.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
													
													<a onclick="delete_record(this);" id="deleteCustomerProfile" data-id="' . $row_id . '" class="btn btn-danger btn-sm"  data-title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                
														<!--a onclick="print_record(this);" id="printStudentProfile" data-id="' . $row_id . '" class="btn btn-secondary btn-sm"  data-title="Print">
													<i class="fa fa-print" aria-hidden="true"></i></a></td-->';                                               
														
														echo "</tr>";
                                            }
                                        }
                                        ?>	
												 </script>
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
	var page_studentwise = "<?php if(isset($_GET['studentwise'])){ echo $_GET['studentwise']; } ?>";
    var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";
		                                            
    function delete_record(x){     
            var row_id = $(x).attr('data-id');
            alert(row_id);
            if (confirm('Confirm delete')) {
            window.location.href = 'deleteOldBalStudents.php?id='+row_id;
                    }
            }

    $(document).ready(function() {
        $('#partywise').val(page_partywise);
        $("#reset-date").hide();
        $('#classwise').val(page_classwise);
       $('#studentwise').val(page_studentwise);
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
        var printhead = party_var!=''?'<p><b> : </b>'+party_var+'</p>':'';
        printhead+= date_range!=''?'<p><b>Date : </b>'+date_range+'</p>':'';
        var excel_printhead = party_var!=''?' : '+party_var:'';
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
                            '<p><img src="<?php echo $baseurl;?>assets/images/logo/logo@0,25x.png" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>Academic Wise Old Balance Student List</b><br/></p>'+printhead+'</div>'
                        );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }, 
                {
                    extend: 'excel',
                    text:'<span class="fa fa-file-excel-o"></span>',
                    title:'Archived Students Report', footer: true ,
                    messageTop: excel_printhead   

                },
                {
                    extend: 'pdf',
                    text:'<span class="fa fa-file-pdf-o"></span>',
                    title:'Archived Students Report', footer: true ,
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
												var studentwise = $('#studentwise').val();
												var academicwise = $('#academicwise').val();
												location.href="listOldBalance.php?classwise="+classwise+"&academicwise="+academicwise+"&studentwise="+studentwise;
											}																		
														



    

</script>
<?php
?>
