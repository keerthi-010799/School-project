<?php
include("../../database/db_conection.php");

if(isset($_POST['array'])){
    $array = $_POST['array'];
    $data = json_decode($array,true);
    $return = array();
    $academic=$data['academic'];
    $class=$data['class'];
    $student =$data['student'];
    $admno = $data['admno'];
    $itemname ='';
    $price = '';
    $feestype=$data['FeesType'];
  	$stdid = $data['std_id'];
    $total1 = $data['term1total'];
    $total2 = $data['term2total'];
    $total3 = $data['term3total'];
    $total_amount;
    $amount;
    $fees_id= $data['id'];
    $fee_id ;
    $term1feestotal= '';
    $term2feestotal= '';
    $term3feestotal= '';
    $vanfeestotal= '';
    $term1feescollected = '';
    $term2feescollected = '';
    $term3feescollected= '';
    $vanfeescollected= '';  
    $term1balance= '';
    $term2balance= '';
    $term3balance= '';
    $vanbalance= '';


   if($feestype == 'TermFees'){
    if(isset($data['term1'])&& $data['term1'] != null){
      $feestype = 'Term1Fees'; 
      $amount=$data['term1'];  
     }
     if(isset($data['term2'])&& $data['term2'] != null){
      $feestype = 'Term2Fees';
      $amount=$data['term2'];
     }
     if(isset($data['term3'])&& $data['term3'] != null){
      $feestype = 'Term3Fees';
      $amount=$data['term3'];
     }
   }elseif($feestype == 'VanFees'){
    $amount=$data['van_fee'];
   }elseif($feestype == 'OtherFees'){
     $d = json_decode($data['inv_items'],true);
     echo 'datta';
     print_r($d);
     foreach($d as $value){
      echo $value['itemname'];      
    }

$sum = 0;
foreach($d as $value){
     $sum += $value['rwprice'];
}
echo 'test1',$sum;
$isbnList = [];
foreach ($d as $item) {
        $isbnList[] = $item['itemname']; 
}
$isbn = implode(",", $isbnList);
echo 'test2',$isbn;
echo 'test3',$sum;
    $feestype = "OtherFees(".$isbn.")";
    $amount=$sum;
  }
  
   if($feestype == 'Term1Fees' && isset($data['term1total']) && $data['term1total'] != null){
      $total_amount=$total1;
     }
     if($feestype == 'Term2Fees' && isset($data['term2total'])&& $data['term2total'] != null){
      $total_amount=$total2;
     }
     if($feestype == 'Term3Fees' && isset($data['term3total'])&& $data['term3total'] != null){
      $total_amount=$total3;
   }elseif($feestype == 'VanFees'){
    $total_amount=$data['van_fee_total'];
   }elseif(substr($feestype,0,9) === "OtherFees"){
    $total_amount=$amount;
   }

  $sql0 = "UPDATE `fees_management` SET `fee_type`='$feestype',`fees_paid` ='$amount',`fee_total_amt`='$total_amount' WHERE fee_id = $fees_id";
  
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
  }
  if (mysqli_query($dbcon,$sql1)) {
    echo 'success2';
    $return['status']=true;
       } else { 
        $return['status']=false;
        $return['error']=mysqli_error($dbcon);  		
  	}

}
  echo json_encode($return);
  
?>