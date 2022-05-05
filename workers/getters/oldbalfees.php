<?php
include_once('../../database/db_conection.php');


if (isset($_GET['student'])) {
    if (isset($_GET['class'])) {
    $student = $_GET['student'];
    $class = $_GET['class'];
    $adminno;
  $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE firstname = '$student' and class = '$class'");
  while ($row = $sql1->fetch_assoc()){
        $std_id = $row['id'];        
        $adminno = $row['admissionno'];
    }
} 
    $return=array();
    $values=array();
    $sql = "SELECT * FROM oldbalstudents where  firstname = '$student' and admissionno = '$adminno'";
    if($result = mysqli_query($dbcon,$sql)){
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['values'] = $values;    
        $return['admissionno'] = $row['admissionno'];
        $return['stdid'] =  $std_id;
        $return['balance'] = $row['fees_balance'];
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
