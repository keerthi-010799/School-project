
<?php
include("database/db_conection.php");
if(isset($_POST['submit']))
{
  $academic=$_POST['academic'];
  $class=$_POST['class'];
  $student = $_POST['student'];
	$feestype=$_POST['FeesType'];
	$stdid = $_POST['std_id'];
  $total1 =$_POST['term1total'];
  $total2 =$_POST['term2total'];
  $total3 =$_POST['term3total'];
  $total_amount;
  $amount;
  $fees_id;
  $term1feescollected;
  $term2feescollected;
  $term3feescollected;
  $vanfeescollected;
  $othercollected;
  $term1balance;
  $term2balance;
  $term3balance;
  $vanbalance;
  $otherbalance;

 if($feestype == 'TermFees'){
  if(isset($_POST['term1'])&& $_POST['term1'] != null){
    $feestype = 'Term1Fees'; 
    $amount=$_POST['term1'];  
   }
   if(isset($_POST['term2'])&& $_POST['term2'] != null){
    $feestype = 'Term2Fees';
    $amount=$_POST['term2'];
   }
   if(isset($_POST['term3'])&& $_POST['term3'] != null){
    $feestype = 'Term3Fees';
    $amount=$_POST['term3'];
   }
 }elseif($feestype == 'VanFees'){
  $amount=$_POST['van_fee'];
 }elseif($feestype == 'OtherFees'){
  $amount=$_POST['other_fee'];
 }

 if($feestype == 'Term1Fees' && isset($_POST['term1total']) && $_POST['term1total'] != null){
    $total_amount=$total1;
   }
   if($feestype == 'Term2Fees' && isset($_POST['term2total'])&& $_POST['term2total'] != null){
    $total_amount=$total2;
   }
   if($feestype == 'Term3Fees' && isset($_POST['term3total'])&& $_POST['term3total'] != null){
    $total_amount=$total3;
 }elseif($feestype == 'VanFees'){
  $total_amount=$_POST['van_fee_total'];
 }elseif($feestype == 'OtherFees'){
  $total_amount=$_POST['other_fee_total'];
 }

 $sql="SELECT MAX(fee_id) as id FROM fees_management ORDER BY id DESC";
  if($result = mysqli_query($dbcon,$sql)){
 	$row   = mysqli_fetch_assoc($result);
 	if(mysqli_num_rows($result)>0){
		 	$maxid = $row['id'];
 	 	$maxid += 1;
 	$fees_id= $maxid;
 	 }
	 else{
		$maxid = 0;
		$maxid += 1;
		 $fees_id = $maxid;
	}
 }


$sql = "INSERT INTO `fees_management`(`fee_id`,`fee_class`,`fee_type`,`fee_student_id`,`fee_total_amt`,`fee_academic_year`, `fees_paid`) 
VALUES ('$fees_id','$class','$feestype','$stdid','$total_amount','$academic','$amount')";
if(mysqli_query($dbcon,$sql))
	{

		// header("location:listFeesConfig.php");
    //  } else 
    //  { echo die('Error: ' . mysqli_error($dbcon).$sql );
		// exit; 
	}
	//  die;

$sq = "SELECT SUM(fees_paid) AS Totalcollected,fee_type FROM fees_management WHERE fee_student_id = '$stdid' AND fee_type = '$feestype'";
if($result = mysqli_query($dbcon,$sq)){
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0){
    $feetype = $row['fee_type'];
    $totalcollected = $row['Totalcollected'];
   if($feetype == 'Term1Fees'){
    $term1feescollected=$totalcollected;
    $term1balance = $total_amount - $term1feescollected;
   }elseif($feetype == 'Term2Fees'){
    $term2feescollected=$totalcollected;
    $term2balance = $total_amount - $term2feescollected;
   }elseif($feetype == 'Term3Fees'){
    $term3feescollected=$totalcollected;
    $term3balance = $total_amount - $term3feescollected;
   }elseif($feetype == 'VanFees'){
    $vanfeescollected=$totalcollected;
    $vanbalance = $total_amount - $vanfeescollected;
   }elseif($feetype == 'OtherFees'){
    $othercollected=$totalcollected;
    $otherbalance = $total_amount - $otherfeescollected;
   }
  }
}

$stats = array("Termfees"=>array("Term1"=>array("TotalFees"=>$_POST['term1total'],"Feescollected"=>$term1feescollected,"Balancetopay"=>"$term1balance"),
"Term2"=>array("TotalFees"=>$_POST['term2total'],"Feescollected"=>$term2feescollected,"Balancetopay"=>"$term2balance"),
"Term3"=>array("TotalFees"=>$_POST['term3total'],"Feescollected"=>$term3feescollected,"Balancetopay"=>"$term3balance")),
"Vanfees"=>array("TotalFees"=>$_POST['van_fee_total'],"Feescollected"=>$vanfeescollected,"Balancetopay"=>"$vanbalance"),"Otherfees"=>array());
$status = json_encode($stats);

$checkstatus = "SELECT * from fee_status WHERE Fee_student_id = $stdid";
if($result = mysqli_query($dbcon,$checkstatus)){
  $row   = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0){
  $sql1 = "UPDATE fee_status set `fee_status_id` = '$fees_id',`Fee_student_id`='$stdid',`fee_class`='$class',`fee_acadamic_year`='$academic',`fee_bal_status`='$status' WHERE Fee_student_id = '$stdid'";
}else{
    $sql1 = "INSERT into fee_status(`fee_status_id`,`Fee_student_id`,`fee_class`,`fee_acadamic_year`,`fee_bal_status`)
    values('$fees_id','$stdid','$class','$academic','$status')";
}
}
if(mysqli_query($dbcon,$sql1))
	{
		header("location:listcollectedfees.php");
     } else 
     { echo die('Error: ' . mysqli_error($dbcon).$sql );
		exit; 
	}
	die;
}


?>
<?php include('header.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-user-plus bigfonts text-primary" aria-hidden="true" >Fees Payment</i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Fees Payment</li>
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
                            
                        </div>
<div class="card-body">
    <form action="" method="post">
    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="class"><span class="">Class</span><span class="text-danger">*</span></label>
                                         <select required id="class" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class" >
                                         <option value="0" selected>Select Class</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>    
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                    <label for="class"><span class="">Academic Year</span><span class="text-danger">*</span></label>
                                         <select required id="academic" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                         <option value="0" selected>Select Academic Year</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT DISTINCT academic FROM academic order by 1 desc");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academicyear=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academicyear.'" >'.$academicyear.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>                        
                    

                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="student"><span class="">Students</span><span class="text-danger">*</span></label>
                                         <select required id="student" data-parsley-trigger="change"  class="form-control form-control-sm"  name="student" >
                                         <option value="0" selected>Select Student</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT firstname,id FROM studentprofile ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $name=$row['firstname'];
                                                        echo $std_id = $row['id'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$name.'" >'.$name.'</option>';                                                        
                                                      }                                                    
                                                    ?>
                                                </select>
                                            </div>
                                                </div>  


                                                <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputState"><span class="">Fees Type</span><span class="text-danger">*</span></label>
                                                <select id="feesType" data-parsley-trigger="change"  class="form-control form-control-sm" onchange="feesfunc()"  name="FeesType">
                                             <option value="">-Select Fees Type-</option>
                                                <option value="TermFees" >Term Fees</option>
                                                <option value="VanFees" >Van Fees</option>
                                                <option value="OtherFees" >Other Fees</option>
                                            </select>
                                                  </div>
                                                  </div>
                                                </div>                                               
                                                </div>                                               
                                                <div id="termfeesform" style="display:none">  
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputState"><span class="">Term Fees</span></label>
                                                </div>
                                                </div>
                                                <div class="form-row">  
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Total Amount</span><span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control form-control-sm" readonly id="termtotal" name="termtotal"/>
                                                </div>
                                                </div>
                                                  <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 1</span><span class="text-danger">*</span></label>                                        
                                                  <input type="text" class="form-control form-control-sm" name="term1total" id="term1total" readonly placeholder=""  class="form-control" autocomplete="off" />
                                                  <input type="text" class="form-control form-control-sm" name="term1" placeholder=""  class="form-control" autocomplete="off" />
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 2</span><span class="text-danger">*</span></label>                                 
                                                  <input type="text" class="form-control form-control-sm" name="term2total" id="term2total" readonly placeholder=""  class="form-control" autocomplete="off" />       
                                                  <input type="text" class="form-control form-control-sm" name="term2" placeholder=""  class="form-control" autocomplete="off" />
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 3</span><span class="text-danger">*</span></label>                                 
                                                  <input type="text" class="form-control form-control-sm" name="term3total" id="term3total" readonly placeholder=""  class="form-control" autocomplete="off" />       
                                                  <input type="text" class="form-control form-control-sm" name="term3" placeholder=""  class="form-control" autocomplete="off" />
                                                </div>                                            
                                                  </div>
                                                </div>
                                                </div>
                                                <div id="vanfeesform" style="display:none">  
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Van Fees</span><span class="text-danger">*</span></label>
                                                  
                                                  <table  class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th width="20%">Class</th>
                                        <th width="11%">Student</th>
                                        <th width="25%">Academic Year</th>
                                        <th width="12%">Area</th>
                                        <th width="20%">Total Fees</th>
                                        <th width="25%" >Fees collected</th>
                                    </tr>  
                                    <tr>                                                                                                                                                    
                                       <td id="stclass"></td>
                                       <td id="stname"></td>
                                       <td id="stacademic"></td>
                                       <td id="starea"></td>
                                       <td> <input type="text" style="border:none;overflow:none;outline:none;" id="sttotal" name="van_fee_total" /></td>
                                       <td><input id="van_fee" name="van_fee"/></td>                                                            
                                    </tr>
                                                </table>
                                                </div>
                                                  </div>
                                                </div>
                                                  <div id="otherfeesform" style="display:none">  
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Other Fees</span><span class="text-danger">*</span></label>
                                                 
                                                  <table  class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th width="20%">Class</th>
                                        <th width="11%">Student</th>
                                        <th width="25%">Academic Year</th>
                                        <th width="12%">Item Code</th>
                                        <th width="25%">Item Name</th>
                                        <th width="25%">Total fees</th>
                                        <th width="25%" >Fees collected</th>
                                    </tr>  
                                    <tr id="table">
                                      <!-- <td id = "ofstclass"></td>
                                      <td id = "ofstname"></td>
                                      <td id = "ofstitemcode"></td>
                                      <td id = "ofstitemname"></td>
                                      <td id = "ofstacademic"></td> -->
                                      <!-- <td> <input type="hidden" id = "ofsttotal" name="other_fee_total"/></td>
                                      <td><input id="other_fee" name="other_fee"/></td> -->
                                    </tr>
                                                </table>  
                                                </div>
                                                  </div>
                                                </div>
                              <div class="form-row">
                                    <div class="form-group  text-right m-b-12">
                                    <input type="hidden" id="std_id" name="std_id"/>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm" >
														            Make Fees Payment
                                                    </button>
                                        <button type="button" name="cancel" class="btn btn-warning btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
                                        
                                    </div>
                                </div>
  </div>
  </div>
</div>
</div>
</div>
        </form>
        <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/switchery/switchery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
<script type="text/javascript">
  function FetchStudents(id){
    $('#students').html('');
    $.ajax({
      type:'post',
      url: 'fetchDynamicClassAjax.php',
      data : { class_id : id},
      success : function(data){
         $('#students').html(data);
      }

    })
  }
  function onFeesPayment(x) 
     {    
         var student_id=x.value;
         window.location.href = 'makeFeesPayment.php?student_id='+student_id;
     }
     
     $('document').ready(function(){
        	
    })
	function feesfunc(){
    console.log("red");
        var feesType = $('#feesType').val();        
        if(feesType == "TermFees"){
            $("#termfeesform").css('display','block');
            $("#vanfeesform").css('display','none');
            $("#otherfeesform").css('display','none');
            changeTermFees();          
        }
        else if(feesType == "VanFees"){
            $("#termfeesform").css('display','none');
            $("#vanfeesform").css('display','block');
            $("#otherfeesform").css('display','none');
              changevanFees();             
        }
        else if(feesType == "OtherFees"){
            $("#otherfeesform").css('display','block');
            $("#termfeesform").css('display','none');
            $("#vanfeesform").css('display','none');
            changeOtherFees();
            


        }
    }

      function changevanFees(){
        var stname = $('#student').val();
        var stclass = $('#class').val();
       $.ajax({
      url: "workers/getters/vanfees.php?student=" + stname+"&class="+stclass,
                type: "post",
                //async: false,
                success: function(x) {
                    var output = JSON.parse(x);
                    if (output.status) {
                      console.log("test")                  
                      var cls = output.class;
                      var std = output.std;
                      var academic = output.academicyear;
                      var area = output.values[0].areaname;
                      var total = output.values[0].amount;
                      var id = output.std_id;
                      console.log(cls,std,total,area);
                       $('#stclass').html(cls);
                       $('#stname').html(std);
                       $('#stacademic').html(academic);
                       $('#starea').html(area);
                       $('#sttotal').val(total);                       
                       $('#std_id').val(id);                       

                    } 
                }
            });
         }
         function changeOtherFees(){
        var ofstname = $('#student').val();
        var ofstclass = $('#class').val();
       $.ajax({
      url: "workers/getters/otherfees.php?student=" + ofstname+"&class="+ofstclass,
                type: "post",
                //async: false,
                success: function(x) {
                    var output = JSON.parse(x);
                    if (output.status) {
                      console.log("test")                  
                      var cls = output.class;
                      var std = output.std;
                      var id = output.std_id;
                      var academic = output.academicyear
                      console.log(cls,std,academic,output.values);
                      for(var i=0;i<output.values.length;i++){                
                      //  $('#ofstclass').html(cls);
                      //  $('#ofstname').html(std);
                      //  $('#ofstacademic').html(academic);
                      //  $('#ofstitemcode').html(vals.itemcode);
                      //  $('#ofstitemname').html(vals.itemname);
                      //  $('#ofsttotal').val(vals.price);                      
                      //  $('#std_id').val(id);                       
                       var tbl = '<div><td>'+cls+'</td><td>'+std+'</td><td>'+academic+'</td><td>'+output.values[i].itemcode+'</td><td>'+output.values[i].itemname+'</td><td>'+output.values[i].price+'</td></div>';
                       $('#table').append(tbl);
                    } 
                  }
                }
            });
         }
         function changeTermFees(){
        var tfstclass = $('#class').val();
        var tfstname = $('#student').val();
       $.ajax({
      url: "workers/getters/termfees.php?student=" + tfstname+"&class="+tfstclass,
                type: "post",
                //async: false,
                success: function(x) {
                    var output = JSON.parse(x);
                    if (output.status) {
                      console.log("test")                  
                      console.log(output.values[0].fee_config_amount);
                      var vals = output.values[0];
                      var id = output.std_id;
                       $('#termtotal').val(vals.fee_config_amount);    
                        var total = $("#termtotal").val();
                        var term = (total/3);
                        console.log("term",total);
                       $("#term1total").val(term);
                       $("#term2total").val(term);
                       $("#term3total").val(term);     
                       $('#std_id').val(id);                                                        
                  }
                }
            });
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
</div>
</div>
<?php include('footer.php');?>
</body>
</html>
