<?php
include_once('../../database/db_conection.php');


if (isset($_GET['student'])) {
    if (isset($_GET['class'])) {
    $student = $_GET['student'];
    $class = $_GET['class'];
    $areaname1;
  $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE firstname = '$student' and class = '$class'");
  while ($row = $sql1->fetch_assoc()){
        $std_id = $row['id'];        
    }
}
$sq1 ="SELECT sum(fees_paid) as feespaid FROM fees_management WHERE fee_student_id = $std_id and fee_type = 'VanFees'";
if($result1 = mysqli_query($dbcon,$sq1)){
    $ro1 = mysqli_fetch_assoc($result1);
    if(mysqli_num_rows($result1)>0){  
    $vanpaid = $ro1['feespaid'];
}
}

    $return=array();
    $values=array();
    $sql = "SELECT * FROM vanstudents where  studentname = '$student' and class = '$class'";
    if($result = mysqli_query($dbcon,$sql)){
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['areaname'] = $row['areaname'];
        $return['amount'] = $row['amount'];
        $return['class'] = $class;
        $return['std'] = $student;
        $return['academicyear'] = $row['academic'];
        $return['std_id'] = $std_id;
        $return['admissionno'] = $row['admissionno'];
        $return['vanpaid'] = $vanpaid;
}
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
