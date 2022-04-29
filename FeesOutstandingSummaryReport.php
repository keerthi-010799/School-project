<?php
include('header.php');
include('workers/getters/functions.php');

?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"> Fees Status</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Fees Status</li>
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


                            <h3><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i><b>&nbsp;Fees Status</b></h3>
                        </div>
                        <div class="form-group row">
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
                        
                                <div class="form-group row">
                        <div class="form-group col-md-6">
                        <select id="studentwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="student">
                                             <option value="">-Select Student-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT id,firstname FROM studentprofile  order by firstname asc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $student=$row['firstname'];
														echo $id=$row['id'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$student.'" >'.$student.'</option>';
                                                    }
                                                    ?>
                                                </select>

                                </div>
                               <div class="form-group col-md-4">
                               <select id="academicwise" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic">
										 <option selected value="">-Select Academic-</option>
                                          <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT * FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>										 
                            		</select>

                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="search_filter();">Search</button>
                                </div>
 
                                    </div>

                        <div class="card-body">

                            <!-- Start coding here -->
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="po_reports_div"></span>
                                    <table id="po_reports" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>#</th>												
												<th>Class</th>
												<th>ADMIN# </th>
                                                <th>Academic</th>
                                                <th>Student</th>
												<th id='term1feestotal' style="display:">Total Fees</th>
                                                <th id='term1feespaid' style="display:">Fees Paid</th>
                                                <th id='term1feesbalance' style="display:">Fees balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        include("database/db_conection.php");//make connection here                                                                                    
                                        $termfee = '';
                                        $vanfee = '';
                                        $s = '';
                                        $total = '';
                                        $feespaid='';
                                        $feesblance='';                    
                                        $term1col ='';
                                        $term2col ='';
                                        $term3col='';
                                        $vancol  ='';
                                        $term1pid ='';
                                        $term2pid ='';
                                        $term3pid ='';
                                        $vanpid   ='';                  
                                        
                                        if((isset($_GET['st'])&&$_GET['st']!='')||
                                                (isset($_GET['end'])&&$_GET['end']!='')||
                                                (isset($_GET['classwise']) && $_GET['classwise']!=='')||
                                                (isset($_GET['studentwise'])&&$_GET['studentwise']!='')||
                                                (isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
                                                    $classwise = $_GET['classwise'];
                                                    $academicwise = $_GET['academicwise'];
                                                    $studentwise = $_GET['studentwise'];
                                                    $sql = "SELECT * FROM `studentprofile` s where 1=1";										                                            
                                             if(isset($_GET['classwise'])&&$_GET['classwise']!=''){

                                                    $sql.=" and s.class='".$_GET['classwise']."'";    
                                                }
                                                if(isset($_GET['studentwise'])&&$_GET['studentwise']!=''){

                                                    $sql.=" and s.firstname='".$_GET['studentwise']."'";    
                                                }
                                                if(isset($_GET['academicwise'])&&$_GET['academicwise']!=''){

                                                    $sql.=" and s.academic='".$_GET['academicwise']."'";    
                                                }
                                                if(isset($_GET['datewise'])&&$_GET['datewise']!=''){

                                                    $sql.=" and s.collected_date='".$_GET['datewise']."'";    
                                                }                                             
                                                }else{
                                                    $sql = "SELECT * FROM studentprofile";
                                                    }							
                                                                                                                                                                                
                                                    $result = mysqli_query($dbcon,$sql);													
                                                if ($result->num_rows > 0){
                                                while ($row =$result-> fetch_assoc()){	
                                                    $sid = $row['id'];
                                                    $class = $row['class'];
                                                    $name = $row['firstname'];                                                    
                                $term = "SELECT * FROM feesconfig WHERE fee_config_class = '$class'";                                                   
                                if($result1 = mysqli_query($dbcon,$term)){
                                     $row1   = mysqli_fetch_assoc($result1);
                                    if(mysqli_num_rows($result1)>0){
                                         $termfee = $row1['fee_config_amount'];
                                    }
                                }

                                    $van ="SELECT * FROM vanstudents WHERE studentname = '$name'";
                                if($result2 = mysqli_query($dbcon,$van)){
                                    $row2   = mysqli_fetch_assoc($result2);
                                    if(mysqli_num_rows($result2)>0){
                                        $vanfee = $row2['amount'];
                                    }
                                }
                                $all ="SELECT * FROM fee_status WHERE fee_student_id = '$sid'";                                
                                if($result3 = mysqli_query($dbcon,$all)){
                                    $row3   = mysqli_fetch_assoc($result3);
                                    if(mysqli_num_rows($result3)>0){
                                        $dat=$row3['fee_bal_status'];	
                                        echo " ";
                                        $s = json_decode($dat,true);
                                        print_r($s,true);

                                        $term1col = $s["Termfees"]["Term1"]["Feescollected"];
                                        $term2col =$s["Termfees"]["Term2"]["Feescollected"];
                                        $term3col =$s["Termfees"]["Term3"]["Feescollected"];
                                        $vancol   = $s["Vanfees"]["Feescollected"];
                                        $term1pid = $s["Termfees"]["Term1"]["Balancetopay"];
                                        $term2pid = $s["Termfees"]["Term2"]["Balancetopay"];
                                        $term3pid = $s["Termfees"]["Term3"]["Balancetopay"];
                                        $vanpid = $s["Vanfees"]["Balancetopay"];
                                        }
                                }  
                                 $total = (int)$termfee+(int)$vanfee;                                			
                                 $feespaid = (int)$term1col+(int)$term2col+(int)$term3col+(int)$vancol;																	
                                 $feesblance = $total - $feespaid;																	

                                                echo "<tr>";
                                                echo '<td>' .$sid . '</td>';
                                                echo '<td>'.$class.' </td>';
                                                 echo '<td>'.$row['admissionno'].'</td>';
                                                 echo '<td>'.$row['academic'].'</td>';
                                                 echo '<td>'.$name.'</td>';        
                                                 echo '<td class="term1feestotalval" style="display:">'.$total.' </td>';                                                       
                                echo '<td class="term1feespaidval" style="display:">'.$feespaid.' </td>';
                                echo '<td class="term1feesbalanceval" style="display:">'.$feesblance.' </td>';                                                                         

                  
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
                                                <th class = "tf1" style="display:"></th>
                                                <th class = "tf1" style="display:"></th>
                                                <th class = "tf1" style="display:"></th>                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div><!-- end card-->

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
    var page_academicwise = "<?php if(isset($_GET['academicwise'])){ echo $_GET['academicwise']; } ?>";


    $(document).ready(function() {
        $('#classwise').val(page_classwise);
        $('#studentwise').val(page_studentwise);
        $('#academicwise').val(page_academicwise);

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
            var feesType = $('#feesname').val();
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
                var term1feespaid = api
                .column( 5 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term1feesbalance = api
                .column( 6 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term1feestotal = api
                .column( 7 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                
                $( api.column( 0 ).footer() ).html('Total');
                $( api.column( 7 ).footer() ).html(term1feestotal);
                $( api.column( 5 ).footer() ).html(term1feespaid);
                $( api.column( 6 ).footer() ).html(term1feesbalance);
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
                            '<p><img src="assets/images/schoollogo.jpeg" style="width:50px;height:50px;" /></p><p class="lead text-center"><b>Fees Status</b><br/></p></div>'
                        );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }, 
                {
                    extend: 'excel',
                    text:'<span class="fa fa-file-excel-o"></span>',
                    title:'Fees Status', footer: true,
                    messageTop: ''   

                },
                {
                    extend: 'pdf',
                    text:'<span class="fa fa-file-pdf-o"></span>',
                    title:'Fees Status', footer: true,
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
			var classwise = $('#classwise').val();
			var studentwise = $('#studentwise').val();
            var academicwise = $('#academicwise').val();
			location.href="FeesOutstandingSummaryReport.php?classwise="+classwise+"&studentwise="+studentwise+"&academicwise="+academicwise;								
		}  
</script>
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>                                
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->
<?php
include('footer.php');
?>
