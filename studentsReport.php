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

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Students Report</h1>
													<ol class="breadcrumb float-right">
														<li class="breadcrumb-item">Home</li>
														<li class="breadcrumb-item active">Students Report</li>
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
										<a href="addStudentProfile.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
										Add Student Profile</a></span>
									<i class="" aria-hidden="">Students Reports</i>
								</div>
								
								<div class="card-body">
                                    
                                    <form autocomplete="off" action="exportStudents.php"  method="post">
										
									<div class="form-row">
										<div class="form-group col-md-8">
								<input type="submit" class="btn btn-primary btn-sm"  name="exportStudents" value="Export Students"/>
										</div>
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
                                        
                                         <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
                                             <option value="">-Select Academic-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic where status = 'Y' order by academic asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
												
                                        </div>
										<div class="form-group col-md-3">
                                        
										<select id="Communitywise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Community-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here

												   $sql = mysqli_query($dbcon, "SELECT distinct community FROM studentprofile where status = 'Y' order by community asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $community=$row['community'];
													   echo '<option onchange="'.$row[''].'" value="'.$community.'" >'.$community.'</option>';
												   }
												   ?>
											   </select>
											   
									   </div>
                                       <div class="form-group col-md-3">
                                        
										<select id="genderwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Gender-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here

												   $sql = mysqli_query($dbcon, "SELECT distinct gender FROM studentprofile where status = 'Y' order by community asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $gender=$row['gender'];
													   echo '<option onchange="'.$row[''].'" value="'.$gender.'" >'.$gender.'</option>';
												   }
												   ?>
											   </select>
											   
									   </div>
                                       <div class="form-group col-md-3">
                                        
										<select id="castewise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
											<option value="">-Select Caste-</option>
												   <?php 
												   include("database/db_conection.php");//make connection here

												   $sql = mysqli_query($dbcon, "SELECT distinct caste FROM studentprofile where status = 'Y' order by community asc");
												   while ($row = $sql->fetch_assoc()){	
													   echo $Caste=$row['caste'];
													   echo '<option onchange="'.$row[''].'" value="'.$Caste.'" >'.$Caste.'</option>';
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
													  <th style="width:30px">Picture</th>
													<th style="width:40px">Academic</th>
													<th style="width:30px">Admn#</th>
													<th style="width:40px">Name</th>
													<th style="width:20px">Class/Course</th>
													<th style="width:20px">Batch</th>
													<th style="width:20px">Parent</th>
												    <th style="width:20px">Mobile</th>
													<!--th style="width:20px">Academic</th-->												  
													<th style="width:230px">Status</th>
													<th style="width:20px">Actions</th>
													</tr>
										</thead>										
										<tbody>
											<?php
													include("database/db_conection.php");//make connection here																									
													if((isset($_GET['classwise']) && $_GET['classwise']!=='')||(isset($_GET['academicwise'])&&$_GET['academicwise']!='')||(isset($_GET['castewise'])&&$_GET['castewise']!='')||(isset($_GET['Communitywise'])&&$_GET['Communitywise']!='')||(isset($_GET['genderwise'])&&$_GET['genderwise']!='')){
														$classwise = $_GET['classwise'];
														$academicwise = $_GET['academicwise'];
														$Communitywise = $_GET['Communitywise'];	
                                                        $castewise = $_GET['castewise'];	
														$genderwise = $_GET['genderwise'];	
														$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) 
														as name,concat(class,' / ',section) as classsec,
														fathername,mobile,batch,academic,status FROM `studentprofile` s where 1=1";										                                            
													 if(isset($_GET['classwise'])&&$_GET['classwise']!=''){
	
														$sql.=" and s.class='".$_GET['classwise']."'";    
													}
													if(isset($_GET['Communitywise'])&&$_GET['Communitywise']!=''){
	
														$sql.=" and s.community='".$_GET['Communitywise']."'";    
													}
													if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){
	
														$sql.=" and s.academic='".$_GET['academicwise']."'";    
													}
                                                    if(isset($_GET['castewise'])&&$_GET['castewise']!=''){
	
														$sql.=" and s.caste='".$_GET['castewise']."'";    
													}
                                                    if(isset($_GET['genderwise'])&&$_GET['genderwise']!=''){
	
														$sql.=" and s.gender='".$_GET['genderwise']."'";    
													}
	
													}else{
													
														$sql = "SELECT id,image,admissionno,concat(firstname,' ',lastname) 
														as name,concat(class,' / ',section) as classsec,
														fathername,mobile,batch,academic,status FROM `studentprofile` 
														ORDER BY id ASC";													}
																											
													$result = mysqli_query($dbcon,$sql);
													if ($result->num_rows > 0){
													while ($row =$result-> fetch_assoc()){
														$row_id=$row['id'];
														echo "<tr>";
														echo '<td>'.$row['id'].'<br /></td>';
													// echo '<td><input type="checkbox" class="checkBoxClass" name="selectedCheckbox[]" value='.$row['id'].'/></td>';
												//	echo '<td>'.$row['id'].'<br /></td>';
													
													//echo '<td><a href="editCustomerProfile.php?id='.$row_id.'" >'.$row['custid'] .'</a></td>';
													echo '<td><img style="max-width:50px; height:35px;" src="'.$row['image'].'"/>';
													echo '<td>'.$row['academic'].'<br /></td>';
													echo '<td>'.$row['admissionno'].'<br /></td>';
													//echo '<td>'.$row['custype'].'</td>';
													echo '<td>'.$row['name'].'</td>';
													echo '<td>'.$row['classsec'].'</td>';
													echo '<td>'.$row['batch'].'</td>';
													echo '<td>'.$row['fathername'].'</td>';
													echo '<td>'.$row['mobile'].'</td>';
													//echo '<td>'.$row['academic'].'</td>';
													
													
														?>
													<td><?php if($row['status']=='Y'){
																	echo 'Active';
																}else if($row['status']=='N'){
																	echo 'Inactive';
																}else{
																	echo "";
																}	 ?>
													</td>
												  
													<?php
													echo '<td><a href="editStudentProfile.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">
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
        var printhead = party_var!=''?'<p><b>Vendor : </b>'+party_var+'</p>':'';
        printhead+= date_range!=''?'<p><b>Date : </b>'+date_range+'</p>':'';
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
                            '<p><img src="<?php echo $baseurl;?>assets/images/logo/logo@0,25x.png" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>Payee Transactions</b><br/></p>'+printhead+'</div>'
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
											function search_filter(){
												var classwise = $('#classwise').val();
												var Communitywise = $('#Communitywise').val() ? $('#Communitywise').val() : "";
                                                var genderwise = $('#genderwise').val() ? $('#genderwise').val() : "";
												var castewise = $('#castewise').val() ? $('#castewise').val() : "";                                            
												var academicwise = $('#academicwise').val();
												location.href="studentsReport.php?classwise="+classwise+"&Communitywise="+Communitywise+"&academicwise="+academicwise+"&genderwise="+genderwise+"&castewise="+castewise;
											}																				
														



    

</script>
<?php
?>
