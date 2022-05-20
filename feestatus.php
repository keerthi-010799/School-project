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
                                                        echo '<option onchange="'.$row[''].'" value="'.$id.'" >'.$student.'</option>';
                                                    }
                                                    ?>
                                                </select>

                                </div>
                               <div class="form-group col-md-4">
                               <select id="feesname" data-parsley-trigger="change" onchange="changefees();" class="form-control form-control-sm"  name="feesname">
										 <option value="Test">-Select Fees Name-</option>
										 <option value="Term1Fees">Term1 Fees</option>
											 <option value="Term2Fees">Term2 Fees</option>
											 <option value="Term3Fees">Term3 Fees</option>
											 <option value="VanFees">Van Fees</option>                                             
											 <option value="OtherFees">Other Fees</option>
											 <option value="oldBalanceFees">Old Balance Fees</option>
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
                                                <th>Student</th>
												<th id='term1feestotal' style="display:">term1 Total Fees</th>
                                                <th id='term1feespaid' style="display:">term1 Fees Paid</th>
                                                <th id='term1feesbalance' style="display:">term1 Fees balance</th>
                                                <th id='term2feestotal' style="display:none">term2 Total Fees</th>
                                                <th id='term2feespaid' style="display:none">term2 Fees Paid</th>
                                                <th id='term2feesbalance' style="display:none">term2 Fees balance</th>
                                                <th id='term3feestotal' style="display:none">term3 Total Fees</th>
                                                <th id='term3feespaid' style="display:none">term3 Fees Paid</th>
                                                <th id='term3feesbalance' style="display:none">term3 Fees Paid</th>
                                                <th id='vanfeestotal' style="display:none">van Total Fees</th>
                                                <th id='vanfeespaid' style="display:none">van Fees Paid</th>
                                                <th id='vanfeesbalance' style="display:none">van Fees balance</th>
												<th id='otherfeesitemname' style="display:none">other fees name </th>
                                                <th id='otherfeesprice' style="display:none">other fees price</th>								
                                                <th id='oldfeestotal' style="display:none">old Total Fees</th>
                                                <th id='oldfeespaid' style="display:none">old Fees Paid</th>
                                                <th id='oldfeesbalance' style="display:none">old Fees balance</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        include("database/db_conection.php");//make connection here
                                                
                                                if((isset($_GET['st'])&&$_GET['st']!='')||
                                                (isset($_GET['end'])&&$_GET['end']!='')||
                                                (isset($_GET['classwise']) && $_GET['classwise']!=='')||
                                                (isset($_GET['studentwise'])&&$_GET['studentwise']!='')){
                                                    $classwise = $_GET['classwise'];
                                                    $studentwise = $_GET['studentwise'];
                                                    $sql = "SELECT * FROM `fee_status` s where 1=1";										                                            
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
                                                    $sql = "SELECT * FROM fee_status";
                                                    }							
                                                                                                                                                                                
                                                $result = mysqli_query($dbcon,$sql);													
                                                if ($result->num_rows > 0){
                                                while ($row =$result-> fetch_assoc()){	
                                                    $sid = $row['fee_student_id'];
                                                    $date=$row['fee_bal_status'];	
                                                //echo $date;
                                                $s = json_decode($date,true);
                                                print_r($s,true);																			
                                                echo "<tr>";
                                                echo '<td>' .$row['fee_status_id'] . '</td>';
                                                echo '<td>'.$row['fee_class'].' </td>';
                                                $result1 = mysqli_query($dbcon,"SELECT * FROM studentprofile WHERE id = $sid");													
                                                if ($result1->num_rows > 0){
                                                while ($row1 =$result1-> fetch_assoc()){	
                                                 echo '<td>'.$row1['admissionno'].'</td>';
                                                 echo '<td>'.$row1['firstname'].'</td>';
                                                }
                                            }
                                                echo '<td class="term1feestotalval" style="display:">'.$s["Termfees"]["Term1"]["TotalFees"].' </td>';
                                                echo '<td class="term1feespaidval" style="display:">'.$s["Termfees"]["Term1"]["Feescollected"].' </td>';
                                                echo '<td class="term1feesbalanceval" style="display:">'.$s["Termfees"]["Term1"]["Balancetopay"].' </td>';
                                                echo '<td class="term2feestotalval" style="display:none">'.$s["Termfees"]["Term2"]["TotalFees"].' </td>';
                                                echo '<td class="term2feespaidval" style="display:none">'.$s["Termfees"]["Term2"]["Feescollected"].' </td>';
                                                echo '<td class="term2feesbalanceval" style="display:none">'.$s["Termfees"]["Term2"]["Balancetopay"].' </td>';
                                                echo '<td class="term3feestotalval" style="display:none">'.$s["Termfees"]["Term3"]["TotalFees"].' </td>';
                                                echo '<td class="term3feespaidval" style="display:none">'.$s["Termfees"]["Term3"]["Feescollected"].' </td>';
                                                echo '<td class="term3feesbalanceval" style="display:none">'.$s["Termfees"]["Term3"]["Balancetopay"].' </td>';
                                                echo '<td class="vanfeestotalval" style="display:none">'.$s["Vanfees"]["TotalFees"].' </td>';
                                                echo '<td class="vanfeespaidval" style="display:none">'.$s["Vanfees"]["Feescollected"].' </td>';
                                                echo '<td class="vanfeesbalanceval" style="display:none">'.$s["Vanfees"]["Balancetopay"].' </td>';
                                                echo '<td class="otherfeesitemnameval" style="display:none">'.$s["Otherfees"]["itemname"].' </td>';
                                                echo '<td class="otherfeespriceval" style="display:none">'.$s["Otherfees"]["price"].' </td>';                                        
                                                echo '<td class="oldfeestotalval" style="display:none">'.$s["oldfees"]["TotalFees"].' </td>';
                                                echo '<td class="oldfeespaidval" style="display:none">'.$s["oldfees"]["Feescollected"].' </td>';
                                                echo '<td class="oldfeesbalanceval" style="display:none">'.$s["oldfees"]["Balancetopay"].' </td>';
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
                                                <th class = "tf1" style="display:"></th>
                                                <th class = "tf1" style="display:"></th>
                                                <th class = "tf1" style="display:"></th>
                                                <th class = "tf2" style="display:none"></th>
                                                <th class = "tf2" style="display:none"></th>
                                                <th class = "tf2" style="display:none"></th>
                                                <th class = "tf3" style="display:none"></th>
                                                <th class = "tf3" style="display:none"></th>
                                                <th class = "tf3" style="display:none"></th>
                                                <th class = "vf" style="display:none"></th>
                                                <th class = "vf" style="display:none"></th>
                                                <th class = "vf" style="display:none"></th>  
                                                <th class = "of" style="display:none"></th>                                             
                                                <th class = "of" style="display:none"></th>
                                                <th class = "blf" style="display:none"></th>
                                                <th class = "blf" style="display:none"></th>
                                                <th class = "blf" style="display:none"></th>

                                            </tr>
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
                var term1feestotal = api
                .column( 4 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);

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
                var term2feestotal = api
                .column( 7 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term2feespaid = api
                .column( 8 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term2feesbalance = api
                .column( 9 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term3feestotal = api
                .column( 10 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term3feespaid = api
                .column( 11 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var term3feesbalance = api
                .column( 12 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var vanfeestotal = api
                .column( 13 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var vanfeespaid = api
                .column( 14 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
                var vanfeesbalance = api
                .column( 15 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);
              
                var otherfeestotal = api
                .column( 17 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);                

                var oldfeestotal = api
                .column( 18 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);                

                var oldfeespaid = api
                .column( 19 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);                

                var oldfeesbalance = api
                .column( 20 , { search: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ).toFixed(2);                

                $( api.column( 0 ).footer() ).html('Total');
                $( api.column( 4 ).footer() ).html(term1feestotal);
                $( api.column( 5 ).footer() ).html(term1feespaid);
                $( api.column( 6 ).footer() ).html(term1feesbalance);
                $( api.column( 7 ).footer() ).html(term2feestotal);
                $( api.column( 8 ).footer() ).html(term2feespaid);
                $( api.column( 9 ).footer() ).html(term2feesbalance);
                $( api.column( 10 ).footer() ).html(term3feestotal);
                $( api.column( 11 ).footer() ).html(term3feespaid);
                $( api.column( 12 ).footer() ).html(term3feesbalance);
                $( api.column( 13 ).footer() ).html(vanfeestotal);
                $( api.column( 14 ).footer() ).html(vanfeespaid);
                $( api.column( 15 ).footer() ).html(vanfeesbalance);
                $( api.column( 17 ).footer() ).html(otherfeestotal);
                $( api.column( 18 ).footer() ).html(oldfeestotal);
                $( api.column( 19 ).footer() ).html(oldfeespaid);
                $( api.column( 20 ).footer() ).html(oldfeesbalance);
                
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
			location.href="feestatus.php?classwise="+classwise+"&studentwise="+studentwise;								
		}
            function changefees(){
    console.log("red");
        var feesType = $('#feesname').val();
        console.log(feesType);        
        if(feesType == "Term1Fees"){
            $("#term1feestotal").css('display','revert');
			$("#term1feespaid").css('display','revert');
			$("#term1feesbalance").css('display','revert');
			$(".term1feestotalval").css('display','revert');
            $(".term1feespaidval").css('display','revert');
            $(".term1feesbalanceval").css('display','revert');
			$("#term2feestotal").css('display','none');
			$("#term2feespaid").css('display','none');
			$("#term2feesbalance").css('display','none');
			$(".term2feestotalval").css('display','none');
			$(".term2feespaidval").css('display','none');
			$(".term2feesbalanceval").css('display','none');
			$("#term3feestotal").css('display','none');
			$("#term3feespaid").css('display','none');
			$("#term3feesbalance").css('display','none');
			$(".term3feestotalval").css('display','none');
			$(".term3feespaidval").css('display','none');
			$(".term3feesbalanceval").css('display','none');
            $("#vanfeestotal").css('display','none');
			$("#vanfeespaid").css('display','none');
            $("#vanfeesbalance").css('display','none');
            $(".vanfeestotalval").css('display','none');
            $(".vanfeespaidval").css('display','none');
            $(".vanfeesbalanceval").css('display','none');
            $("#otherfeesitemname").css('display','none');
			$("#otherfeesprice").css('display','none');
			$(".otherfeesitemnameval").css('display','none');
			$(".otherfeespriceval").css('display','none');
            $("#oldfeestotal").css('display','none');
			$("#oldfeespaid").css('display','none');
			$("#oldfeesbalance").css('display','none');
			$(".oldfeestotalval").css('display','none');
            $(".oldfeespaidval").css('display','none');
            $(".oldfeesbalanceval").css('display','none');

            $(".tf1").css('display','revert');
            $(".tf2").css('display','none');
            $(".tf3").css('display','none');
            $(".vf").css('display','none');
            $(".of").css('display','none');
            $(".blf").css('display','none');


        }
		else if(feesType == "Term2Fees"){
			$("#term1feestotal").css('display','none');
			$("#term1feespaid").css('display','none');
			$("#term1feesbalance").css('display','none');
			$(".term1feestotalval").css('display','none');
            $(".term1feespaidval").css('display','none');
            $(".term1feesbalanceval").css('display','none');
			$("#term2feestotal").css('display','revert');
			$("#term2feespaid").css('display','revert');
			$("#term2feesbalance").css('display','revert');
			$(".term2feestotalval").css('display','revert');
			$(".term2feespaidval").css('display','revert');
			$(".term2feesbalanceval").css('display','revert');
			$("#term3feestotal").css('display','none');
			$("#term3feespaid").css('display','none');
			$("#term3feesbalance").css('display','none');
			$(".term3feestotalval").css('display','none');
			$(".term3feespaidval").css('display','none');
			$(".term3feesbalanceval").css('display','none');
            $("#vanfeestotal").css('display','none');
			$("#vanfeespaid").css('display','none');
            $("#vanfeesbalance").css('display','none');
            $(".vanfeestotalval").css('display','none');
            $(".vanfeespaidval").css('display','none');
            $(".vanfeesbalanceval").css('display','none');
            $("#otherfeesitemname").css('display','none');
			$("#otherfeesprice").css('display','none');
			$(".otherfeesitemnameval").css('display','none');
			$(".otherfeespriceval").css('display','none');
            $("#oldfeestotal").css('display','none');
			$("#oldfeespaid").css('display','none');
			$("#oldfeesbalance").css('display','none');
			$(".oldfeestotalval").css('display','none');
            $(".oldfeespaidval").css('display','none');
            $(".oldfeesbalanceval").css('display','none');

            $(".tf1").css('display','none');
            $(".tf2").css('display','revert');
            $(".tf3").css('display','none');
            $(".vf").css('display','none');
            $(".of").css('display','none');
            $(".blf").css('display','none');


        }
		else if(feesType == "Term3Fees"){
			$("#term1feestotal").css('display','none');
			$("#term1feespaid").css('display','none');
			$("#term1feesbalance").css('display','none');
			$(".term1feestotalval").css('display','none');
            $(".term1feespaidval").css('display','none');
            $(".term1feesbalanceval").css('display','none');
			$("#term2feestotal").css('display','none');
			$("#term2feespaid").css('display','none');
			$("#term2feesbalance").css('display','none');
			$(".term2feestotalval").css('display','none');
			$(".term2feespaidval").css('display','none');
			$(".term2feesbalanceval").css('display','none');
			$("#term3feestotal").css('display','revert');
			$("#term3feespaid").css('display','revert');
			$("#term3feesbalance").css('display','revert');
			$(".term3feestotalval").css('display','revert');
			$(".term3feespaidval").css('display','revert');
			$(".term3feesbalanceval").css('display','revert');
            $("#vanfeestotal").css('display','none');
			$("#vanfeespaid").css('display','none');
            $("#vanfeesbalance").css('display','none');
            $(".vanfeestotalval").css('display','none');
            $(".vanfeespaidval").css('display','none');
            $(".vanfeesbalanceval").css('display','none');
            $("#otherfeesitemname").css('display','none');
			$("#otherfeesprice").css('display','none');
			$(".otherfeesitemnameval").css('display','none');
			$(".otherfeespriceval").css('display','none');
            $("#oldfeestotal").css('display','none');
			$("#oldfeespaid").css('display','none');
			$("#oldfeesbalance").css('display','none');
			$(".oldfeestotalval").css('display','none');
            $(".oldfeespaidval").css('display','none');
            $(".oldfeesbalanceval").css('display','none');

            $(".tf1").css('display','none');
            $(".tf2").css('display','none');
            $(".tf3").css('display','revert');
            $(".vf").css('display','none');
            $(".of").css('display','none');
            $(".blf").css('display','none');


        }
        else if(feesType == "VanFees"){
			$("#term1feestotal").css('display','none');
			$("#term1feespaid").css('display','none');
			$("#term1feesbalance").css('display','none');
			$(".term1feestotalval").css('display','none');
            $(".term1feespaidval").css('display','none');
            $(".term1feesbalanceval").css('display','none');
			$("#term2feestotal").css('display','none');
			$("#term2feespaid").css('display','none');
			$("#term2feesbalance").css('display','none');
			$(".term2feestotalval").css('display','none');
			$(".term2feespaidval").css('display','none');
			$(".term2feesbalanceval").css('display','none');
			$("#term3feestotal").css('display','none');
			$("#term3feespaid").css('display','none');
			$("#term3feesbalance").css('display','none');
			$(".term3feestotalval").css('display','none');
			$(".term3feespaidval").css('display','none');
			$(".term3feesbalanceval").css('display','none');
            $("#vanfeestotal").css('display','revert');
			$("#vanfeespaid").css('display','revert');
            $("#vanfeesbalance").css('display','revert');
            $(".vanfeestotalval").css('display','revert');
            $(".vanfeespaidval").css('display','revert');
            $(".vanfeesbalanceval").css('display','revert');
            $("#otherfeesitemname").css('display','none');
			$("#otherfeesprice").css('display','none');
			$(".otherfeesitemnameval").css('display','none');
			$(".otherfeespriceval").css('display','none');  
            $("#oldfeestotal").css('display','none');
			$("#oldfeespaid").css('display','none');
			$("#oldfeesbalance").css('display','none');
			$(".oldfeestotalval").css('display','none');
            $(".oldfeespaidval").css('display','none');
            $(".oldfeesbalanceval").css('display','none');

            $(".tf1").css('display','none');
            $(".tf2").css('display','none');
            $(".tf3").css('display','none');
            $(".vf").css('display','revert');
            $(".of").css('display','none');
            $(".blf").css('display','none');

                         
        }
        else if(feesType == "OtherFees"){
			$("#term1feestotal").css('display','none');
			$("#term1feespaid").css('display','none');
			$("#term1feesbalance").css('display','none');
			$(".term1feestotalval").css('display','none');
            $(".term1feespaidval").css('display','none');
            $(".term1feesbalanceval").css('display','none');
			$("#term2feestotal").css('display','none');
			$("#term2feespaid").css('display','none');
			$("#term2feesbalance").css('display','none');
			$(".term2feestotalval").css('display','none');
			$(".term2feespaidval").css('display','none');
			$(".term2feesbalanceval").css('display','none');
			$("#term3feestotal").css('display','none');
			$("#term3feespaid").css('display','none');
			$("#term3feesbalance").css('display','none');
			$(".term3feestotalval").css('display','none');
			$(".term3feespaidval").css('display','none');
			$(".term3feesbalanceval").css('display','none');
            $("#vanfeestotal").css('display','none');
			$("#vanfeespaid").css('display','none');
            $("#vanfeesbalance").css('display','none');
            $(".vanfeestotalval").css('display','none');
            $(".vanfeespaidval").css('display','none');
            $(".vanfeesbalanceval").css('display','none');
            $("#otherfeesitemname").css('display','revert');
			$("#otherfeesprice").css('display','revert');
			$(".otherfeesitemnameval").css('display','revert');
			$(".otherfeespriceval").css('display','revert');
            $("#oldfeestotal").css('display','none');
			$("#oldfeespaid").css('display','none');
			$("#oldfeesbalance").css('display','none');
			$(".oldfeestotalval").css('display','none');
            $(".oldfeespaidval").css('display','none');
            $(".oldfeesbalanceval").css('display','none');

            $(".tf1").css('display','none');
            $(".tf2").css('display','none');
            $(".tf3").css('display','none');
            $(".vf").css('display','none');
            $(".of").css('display','revert');
            $(".blf").css('display','none');

       
        }
        else if(feesType == "oldBalanceFees"){
			$("#term1feestotal").css('display','none');
			$("#term1feespaid").css('display','none');
			$("#term1feesbalance").css('display','none');
			$(".term1feestotalval").css('display','none');
            $(".term1feespaidval").css('display','none');
            $(".term1feesbalanceval").css('display','none');
			$("#term2feestotal").css('display','none');
			$("#term2feespaid").css('display','none');
			$("#term2feesbalance").css('display','none');
			$(".term2feestotalval").css('display','none');
			$(".term2feespaidval").css('display','none');
			$(".term2feesbalanceval").css('display','none');
			$("#term3feestotal").css('display','none');
			$("#term3feespaid").css('display','none');
			$("#term3feesbalance").css('display','none');
			$(".term3feestotalval").css('display','none');
			$(".term3feespaidval").css('display','none');
			$(".term3feesbalanceval").css('display','none');
            $("#vanfeestotal").css('display','none');
			$("#vanfeespaid").css('display','none');
            $("#vanfeesbalance").css('display','none');
            $(".vanfeestotalval").css('display','none');
            $(".vanfeespaidval").css('display','none');
            $(".vanfeesbalanceval").css('display','none');
            $("#otherfeesitemname").css('display','none');
			$("#otherfeesprice").css('display','none');
			$(".otherfeesitemnameval").css('display','none');
			$(".otherfeespriceval").css('display','none');
            $("#oldfeestotal").css('display','revert');
			$("#oldfeespaid").css('display','revert');
			$("#oldfeesbalance").css('display','revert');
			$(".oldfeestotalval").css('display','revert');
            $(".oldfeespaidval").css('display','revert');
            $(".oldfeesbalanceval").css('display','revert');

            $(".tf1").css('display','none');
            $(".tf2").css('display','none');
            $(".tf3").css('display','none');
            $(".vf").css('display','none');
            $(".of").css('display','none');
            $(".blf").css('display','revert');

       
        }

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
