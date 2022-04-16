
<?php
include("database/db_conection.php");
if(isset($_POST['submit'])){
  $academic=$_POST['academic'];
  $class=$_POST['class'];
  $student = $_POST['student'];
  $admno = $_POST['admno'];
  $itemname ='';
  $price = '';
  $feestype=$_POST['FeesType'];
	$stdid = $_POST['std_id'];
  $total1 = $_POST['term1total'];
  $total2 = $_POST['term2total'];
  $total3 = $_POST['term3total'];
  $total_amount;
  $amount;
  $fees_id;
  $fee_id;
  $term1total= '';
  $term2total= '';
  $term3total= '';
  $vantotal= '';
  $term1feescollected = '';
  $term2feescollected = '';
  $term3feescollected= '';
  $vanfeescollected= '';  
  $term1balance= '';
  $term2balance= '';
  $term3balance= '';
  $vanbalance= '';
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
  $feestype = "OtherFees(".$_POST['itemname'].")";
  $amount=$_POST['price'];
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
 }elseif(substr($feestype,0,9) === "OtherFees"){
  $total_amount=$amount;
 }
 $sql="SELECT MAX(fee_id) as id FROM fees_management ORDER BY id DESC";
  if($result = mysqli_query($dbcon,$sql)){
 	$row   = mysqli_fetch_assoc($result);
 	if(mysqli_num_rows($result)>0){
		 	$maxid = $row['id'];
 	 	$maxid += 1;
 	$fees_id= $maxid;
   $rec = 'INV-'.$maxid;
 	 }
	 else{
		$maxid = 0;
		$maxid += 1;
		 $fees_id = $maxid;
     $rec = 'INV-'.$maxid;
	}
 }
$date = date("m/d/Y");
$sql0 = "INSERT INTO `fees_management`(`fee_id`,`fee_class`,`fee_type`,`fee_student_id`,`fee_total_amt`,`fee_academic_year`, `fees_paid`,`fee_status`,`fee_admission_no`,`reciept_no`,`collected_date`) 
VALUES ('$fees_id','$class','$feestype','$stdid','$total_amount','$academic','$amount','Created','$admno','$rec','$date')";
if(mysqli_query($dbcon,$sql0)){
 echo 'success1';
}
$sqll = "SELECT * FROM fee_status where fee_student_id = $stdid";						                                                                                                        
  if ($result = mysqli_query($dbcon,$sqll)){
  $row = mysqli_fetch_assoc($result);	
  if(mysqli_num_rows($result)>0){
  $date=$row['fee_bal_status'];	
  $s = json_decode($date,true);
  print_r($s,true);
  $term1feestotal = $s["Termfees"]["Term1"]["TotalFees"];
  $term1feescollected = $s["Termfees"]["Term1"]["Feescollected"];
  $term1balance = $s["Termfees"]["Term1"]["Balancetopay"];
  $term2feestotal = $s["Termfees"]["Term2"]["TotalFees"];
  $term2feescollected = $s["Termfees"]["Term2"]["Feescollected"];
  $term2balance = $s["Termfees"]["Term2"]["Balancetopay"];
  $term3feestotal = $s["Termfees"]["Term3"]["TotalFees"];
  $term3feescollected = $s["Termfees"]["Term3"]["Feescollected"];
  $term3balance = $s["Termfees"]["Term3"]["Balancetopay"];
  $vanfeestotal = $s["Vanfees"]["TotalFees"];
  $vanfeescollected = $s["Vanfees"]["Feescollected"];
  $vanbalance = $s["Vanfees"]["Balancetopay"];
  $itemname =  $s["Otherfees"]["itemname"];
  $price =  $s["Otherfees"]["price"];            
} 
}
  $sq = "SELECT SUM(fees_paid) AS Totalcollected,fee_type,fee_total_amt FROM fees_management WHERE fee_student_id = '$stdid' AND fee_type = '$feestype'";
if($result = mysqli_query($dbcon,$sq)){
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0){
    $totalfeess =$row['fee_total_amt'];
    $feetype = $row['fee_type'];
    $totalcollected = $row['Totalcollected'];
   if($feetype == 'Term1Fees'){
    $term1feestotal = $totalfeess; 
    $term1feescollected=$totalcollected;
    $term1balance = $total_amount - $term1feescollected;        
  }elseif($feetype == 'Term2Fees'){
    $term2feestotal = $totalfeess;
    $term2feescollected=$totalcollected;
    $term2balance = $total_amount - $term2feescollected;
   }elseif($feetype == 'Term3Fees'){
    $term3feestotal = $totalfeess;
    $term3feescollected=$totalcollected;
    $term3balance = $total_amount - $term3feescollected;    
   }elseif($feetype == 'VanFees'){
    $vanfeestotal = $totalfeess;                                                                                                                                 
    $vanfeescollected = $totalcollected;
    $vanbalance = $total_amount - $vanfeescollected;
  }elseif(substr($feetype,0,9) === "OtherFees"){
    $length = strlen($feetype);
    $r = $length-11;
    $item = substr($feetype,10,$r);
    $itemname = $item;
    $price =  $totalcollected;
  }
}
}
$sq0="SELECT MAX(fee_status_id) as id FROM fee_status ORDER BY fee_status_id DESC";
if($result3 = mysqli_query($dbcon,$sq0)){
 $row3   = mysqli_fetch_assoc($result3);
 if(mysqli_num_rows($result3)>0){
     $maxid = $row3['id'];
    $maxid += 1;
 $fee_id= $maxid;
  }
 else{
  $maxid = 0;
  $maxid += 1;
   $fee_id = $maxid;
}
}

$stats = array("Termfees"=>array("Term1"=>array("TotalFees"=>$term1feestotal,"Feescollected"=>$term1feescollected,"Balancetopay"=>"$term1balance"),
"Term2"=>array("TotalFees"=>$term2feestotal,"Feescollected"=>$term2feescollected,"Balancetopay"=>"$term2balance"),
"Term3"=>array("TotalFees"=>$term3feestotal,"Feescollected"=>$term3feescollected,"Balancetopay"=>"$term3balance")),
"Vanfees"=>array("TotalFees"=>$vanfeestotal,"Feescollected"=>$vanfeescollected,"Balancetopay"=>"$vanbalance"),"Otherfees"=>array("itemname"=>"$itemname","price"=>"$price"));
$status = json_encode($stats);


$checkstatus = "SELECT * from fee_status WHERE Fee_student_id = $stdid";
if($result = mysqli_query($dbcon,$checkstatus)){
  $row = mysqli_fetch_assoc($result);
  $sql1;
  if(mysqli_num_rows($result)>0){
  $sql1 = "UPDATE fee_status set  `fee_bal_status`='$status' WHERE Fee_student_id = '$stdid'";
}else{
    $sql1 = "INSERT into fee_status(`fee_status_id`,`Fee_student_id`,`fee_class`,`fee_acadamic_year`,`fee_bal_status`)
    values('$fee_id','$stdid','$class','$academic','$status')";
}
if(mysqli_query($dbcon,$sql1)){
		header("location:listcollectedfees.php");
    echo 'success2';
    echo $sql1;
     } else 
     { echo 'Error: ' . mysqli_error($dbcon).$sql1;
		exit; 
	}
	die;
}
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
                                    <label for="class"><span class="">Academic Year</span><span class="text-danger">*</span></label>
                                         <select required id="academic" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                         <!-- <option value="0" selected>Select Academic Year</option> -->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT DISTINCT academic FROM academic WHERE status='Y' order by 1 desc");
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
                                    <label for="class"><span class="">Class</span><span class="text-danger">*</span></label>
                                         <select required id="class" data-parsley-trigger="change"  class="form-control form-control-sm" onchange="classchange()"  name="class" >
                                         <option value="0" selected>Select Class</option>
                                                    <?php                                                     
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class1=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class1.'" >'.$class1.'</option>';
                                                    }

                                                    ?>
                                                </select>
                                </div>
                                                </div>                                                                
                    
                                                <?php 
                                                echo " <script>var r = $('#class').val();
                                                console.log('red');
                                                </script>";                                   
                              ?>
                <div class="form-row">
                            <div class="form-group col-md-6">
                             
                                    <label for="student"><span class="">Students</span><span class="text-danger">*</span></label>
                                         <select required id="student" data-parsley-trigger="change"  class="form-control form-control-sm"  name="student" >
                                         <option value="0" selected>Select Student</option>
                                                    <?php
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
                                                <div id="termfeesform" style="display:none">  
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                <label for="inputState"><span class="">Term Fees</span></label>
                                                </div>
                                                </div>
                                                <div class="form-row">  
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Total Amount</span><span class="text-danger">*</span></label>
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" readonly id="termamount" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class=""> Discount %</span><span class="text-danger">*</span></label>
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" readonly id="discount" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class=""> Discount Name</span><span class="text-danger">*</span></label>
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" readonly id="discountname" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Discounted Amount</span><span class="text-danger">*</span></label>
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" readonly id="termtotal" name="termtotal"/>
                                                </div>
                                                </div>
                                                  <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 1</span><span class="text-danger">*</span></label>                                        
                                                  <input type="text" style="width:300px" class="form-control form-control-sm" name="term1total" id="term1total" readonly placeholder=""  class="form-control" autocomplete="off" />
                                                  <input type="text" style="width:300px"class="form-control form-control-sm" name="term1" placeholder="Enter Amount"  class="form-control" autocomplete="off" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 1 paid</span><span class="text-danger">*</span></label>                                        
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" name="term1paid" id="term1paid" readonly placeholder=""  class="form-control" autocomplete="off" />
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 2</span><span class="text-danger">*</span></label>                                 
                                                  <input type="text" style="width:300px" class="form-control form-control-sm" name="term2total" id="term2total" readonly placeholder=""  class="form-control" autocomplete="off" />       
                                                  <input type="text" style="width:300px" class="form-control form-control-sm" name="term2" placeholder="Enter Amount"  class="form-control" autocomplete="off" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 2 paid</span><span class="text-danger">*</span></label>                                        
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" name="term2paid" id="term2paid" readonly placeholder=""   class="form-control" autocomplete="off" />
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 3</span><span class="text-danger">*</span></label>                                 
                                                  <input type="text" style="width:300px" class="form-control form-control-sm" name="term3total" id="term3total" readonly placeholder=""  class="form-control" autocomplete="off" />       
                                                  <input type="text" style="width:300px" class="form-control form-control-sm" name="term3" placeholder="Enter Amount"  class="form-control" autocomplete="off" />
                                                </div>                 
                                                <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term 3 paid</span><span class="text-danger">*</span></label>                                        
                                                  <input type="text" style="width:100px" class="form-control form-control-sm" name="term3paid" id="term3paid" readonly placeholder=""  class="form-control" autocomplete="off" />
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
                                        <th width="20%">Van Fees Paid</th>
                                        <th width="25%" >Fees collected</th>
                                    </tr>  
                                    <tr>                                                                                                                                                    
                                       <td id="stclass"></td>
                                       <td id="stname"></td>
                                       <td id="stacademic"></td>
                                       <td id="starea"></td>
                                       <td> <input type="text" style="border:none;overflow:none;outline:none;" id="sttotal" name="van_fee_total" /></td>
                                       <td> <input type="text" style="border:none;overflow:none;outline:none;" id="vanpaid" name="vanpaid" /></td>
                                       <td><input id="van_fee" placeholder="Enter Amount" name="van_fee"/></td>                                                            
                                    </tr>
                                                </table>
                                                </div>
                                                  </div>
                                                </div>
                                                  <div id="otherfeesform" style="display:none">  
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Other Fees</span><span class="text-danger">*</span></label>
                                                 
                                                  <table style="width: 1000px;" class="table table-hover small-text" id="tbl">
                                    <tr class="tr-header">
                                        <th width="12%">Item Name</th>
                                        <th width="12%">class</th>
                                        <th width="12%">Academic Year</th>
                                        <th width="12%">Catogery</th>
                                        <th width="12%">Amount</th>
                                        <th width="12%">Quantity</th>
                                        <th width="12%">Price</th>
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person">
                                            <span class="fa fa-plus-circle"></span></a></th>
                                    </tr>  
                                    <tr>
                                      <td>
                                    <select name="itemname"  class="form-control form-control-sm itemname" onchange="changeOtherFees();" id="itemname">
                                                <option value="" name="" selected>Item Code</option>
                                                <?php 
                                                include("database/db_conection.php");//make connection here
                                                $sql = mysqli_query($dbcon, "SELECT * from stockitemmaster");
                                                while ($row = $sql->fetch_assoc()){	
                                                    echo $name=$row['itemname'];                                                    
                                                    echo '<option onchange="'.$row[''].'" value="'.$name.'" >'.$name.'</option>';                                                        
                                                  }                                                                                                                                                                                   
                                               ?>
                                              </select>
                                              </td>                                                                                                                                        
                                                <td><input class="form-control form-control-sm" value="" id="cls"/></td>
                                                <td><input class="form-control form-control-sm" value="" id="acyear"/></td>
                                                <td><input class="form-control form-control-sm" value="" id="category"/></td>
                                                <td><input class="form-control form-control-sm" value="" id="amount"/></td>                                                                                                
                                                <td><input class="form-control form-control-sm" value="" id="qty" onkeyup="calcamt()" onkeypress="calcamt()"/></td>                                                                                                
                                                <td><input class="form-control form-control-sm" value="" name="price"id="price"/></td>                                                                                                
                                                <td><a href='javascript:void(0);'  class='remove'><span class='fa fa-trash'></span><b></b></a></td>
                                              </tr>                                    
                                                </table>  
                                                </div>
                                                  </div>
                                                </div>
                                                </div>                                               
                                                </div> 
                              <div class="form-row">
                                    <div class="form-group  text-right m-b-12">
                                    <input type="hidden" id="std_id" name="std_id"/>
                                    <input type="hidden" id="admno" name="admno"/>
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
      var clls = $('#class').val();
  $('#cls').val(clls);
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
                      var area = output.areaname;
                      var total = output.amount;
                      var id = output.std_id;
                      var vanpaid = output.vanpaid;
                      console.log(cls,std,total,area);
                       $('#stclass').html(cls);
                       $('#stname').html(std);
                       $('#stacademic').html(academic);
                       $('#starea').html(area);
                       $('#sttotal').val(total);                       
                       $('#std_id').val(id);
                       $('#admno').val(output.admissionno);                       
                       $('#vanpaid').val(vanpaid);
                    } 
                }
            });
         }
         function changeOtherFees(){
           console.log('otherfees')
        var ofstname = $('#student').val();
        var ofstclass = $('#class').val();  
        var itemna = $('#itemname').val();
       $.ajax({
      url: "workers/getters/otherfees.php?student=" + ofstname+"&class="+ofstclass+"&itemname="+itemna,
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
                      console.log(cls,std,academic,output.admissionno,output.values);
                      var vals = output.values[0];  
                      $('#cls').val(vals.class);
                      $('#acyear').val(academic);
                      $('#desc').val(vals.description);
                      $('#category').val(vals.category);
                      $('#amount').val(vals.price);   
                      $('#std_id').val(id);                
                      $('#admno').val(output.admissionno); 
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
                      var name = output.name;
                      var term1paid = output.term1feespaid;
                      var term2paid = output.term2feespaid;
                      var term3paid = output.term3feespaid;
                      var dic = output.dispercent != null ? output.dispercent : 0;
                      var discount = (dic / 100) * vals.fee_config_amount;
                      var totalfee = vals.fee_config_amount - discount;
                      $('#termtotal').val(totalfee);
                      $('#discount').val(dic); 
                      $('#discountname').val(name);
                      $('#termamount').val(vals.fee_config_amount);    
                        var total = $("#termtotal").val();
                        var term = (total/3);
                        console.log("term",total);
                       $("#term1total").val(term);
                       $("#term2total").val(term);
                       $("#term3total").val(term);     
                       $('#std_id').val(id);
                       $('#admno').val(output.admissionno);
                       $('#term1paid').val(term1paid);
                       $('#term2paid').val(term2paid);                                                        
                       $('#term3paid').val(term3paid);                                                                            
                  }
                }
            });
         }


         function classchange(){
   console.log("res");
           var class1 = $('#class').val();
    console.log(class1);
          $.ajax ({
                    url: "workers/setters/classwisestudent.php?cls=" +class1,
                    type: 'post',
                    success:function(res){
                      var output = JSON.parse(res);
                          if(output.status){
                              var vals = output.values;
                              console.log(vals[0]);
                              for(var i=0;i<vals.length;i++){
                                console.log(vals[i]);
                             var new_option ='<option value="'+vals[i]+'">'+vals[i]+'</option>';
                             $('#student').append(new_option);      
                            }                                          
                    }
                  }
                });
}


         $(function(){
         $('#addMore').on('click', function() {
           console.log('clicked');
                var data = $("#tbl tr:eq(1)").clone(true).appendTo("#tbl");
                data.attr("id",);
                data.find("input").val('');
            });

            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
            });
          });

          function calcamt(){
          var prc = $('#amount').val();
          var qty = $('#qty').val();
          var total = prc*qty;
           $('#price').val(total);       
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
