<?php
include_once('../../database/db_conection.php');
$percent =null ;
$name = null;
if (isset($_GET['student'])) {
    if (isset($_GET['class'])) {
    $student = $_GET['student'];
    $class = $_GET['class'];


    $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE firstname = '$student' and class = '$class'");
  while ($row = $sql1->fetch_assoc()){
        $std_id = $row['id'];
        $admno = $row['admissionno'];

    }
}

$sq1 = "SELECT sum(fees_paid) as feespaid1 FROM fees_management WHERE fee_student_id = $std_id and fee_type = 'Term1Fees'";
if($result1 = mysqli_query($dbcon,$sq1)){
    $ro1 = mysqli_fetch_assoc($result1);
    if(mysqli_num_rows($result1)>0){  
    $term1paid = $ro1['feespaid1'];
}
}
$sq2 = "SELECT sum(fees_paid) as feespaid2 FROM fees_management WHERE fee_student_id = $std_id and fee_type = 'Term2Fees'";
if($result2 = mysqli_query($dbcon,$sq2)){
    $ro2 = mysqli_fetch_assoc($result2);
    if(mysqli_num_rows($result2)>0){  
    $term2paid = $ro2['feespaid2'];
}
}
$sq3 = "SELECT sum(fees_paid) as feespaid3 FROM fees_management WHERE fee_student_id = $std_id and fee_type = 'Term3Fees'";
if($result3 = mysqli_query($dbcon,$sq3)){
    $ro3 = mysqli_fetch_assoc($result3);
    if(mysqli_num_rows($result3)>0){  
    $term3paid = $ro3['feespaid3'];
}
}

$sql1 = mysqli_query($dbcon, "SELECT * FROM studentsdiscount WHERE admissionno = '$admno' AND approvalStatus = 'Y'");
while ($row = $sql1->fetch_assoc()){
      $percent = $row['discountpercentage'];      
      $name = $row['category'];      

  }

    $return=array();
    $values=array();
            $sql = "SELECT * FROM feesconfig where fee_config_class = '$class'";
    $result = mysqli_query($dbcon, $sql);
    $values = sql_fetch_all($result);

    if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['values']=$values;
        $return['class'] = $class;
        $return['std_id'] = $std_id;
        $return['admissionno'] = $admno;
        $return['dispercent'] = $percent;
        $return['name'] = $name;
        $return['term1feespaid'] = $term1paid;
        $return['term2feespaid'] = $term2paid;
        $return['term3feespaid'] = $term3paid;

    }else{
        $return['status']=false;
        $return['error']=mysqli_error($dbcon);
    }
}
function sql_fetch_all($result){

    $results_array = array();
    while ($row = $result->fetch_assoc()) {
        $results_array[] = $row;
    }
    $values = $results_array;
    return $values;

}

echo json_encode($return);
?>
