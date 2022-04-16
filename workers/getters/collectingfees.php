<?php
include("database/db_conection.php");
if(isset($_POST['data'])){
    $data = $_POST['data'];

print_r($data);




  $academic=$_GET['academic'];
  $class=$_GET['class'];
  $student = $_GET['student'];
  $admno = $_GET['admno'];
  $itemname ='';
  $itemname1 ='';
  $price = '';
  $feestype=$v['FeesType'];
  $stdid = $_GET['std_id'];
  $total1 =$_GET['term1total'];
  $total2 =$_GET['term2total'];
  $total3 =$_GET['term3total'];
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
  $itemname1 = $_POST['itemname'];
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
 }elseif($feestype == 'OtherFees'){
  $total_amount = $_POST['price']; 
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
   
  $sq = "SELECT SUM(fees_paid) AS Totalcollected,fee_type,fee_total_amount FROM fees_management WHERE fee_student_id = '$stdid' AND fee_type = '$feestype'";
if($result = mysqli_query($dbcon,$sq)){
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0){
    $feetype = $row['fee_type'];
    $totalcollected = $row['Totalcollected'];
    $total = $row['fee_total_amt'];
   if($feetype == 'Term1Fees'){
    $term1feestotal = $total; 
    $term1feescollected=$totalcollected;
    $term1balance = $total_amount - $term1feescollected;        
  }elseif($feetype == 'Term2Fees'){
    $term1feestotal = $total;
    $term2feescollected=$totalcollected;
    $term2balance = $total_amount - $term2feescollected;
   }elseif($feetype == 'Term3Fees'){
    $term1feestotal = $total;
    $term3feescollected=$totalcollected;
    $term3balance = $total_amount - $term3feescollected;    
   }elseif($feetype == 'VanFees'){
    $vanfeestotal = $total;                                                                                                                                 
    $vanfeescollected = $totalcollected;
    $vanbalance = $total_amount - $vanfeescollected;
  }elseif($feetype == 'OtherFees'){
    $itemname = $itemname1;
    $price =  $price1;
  }
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
}
?>