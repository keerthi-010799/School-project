<?php
include_once('../../database/db_conection.php');
    if (isset($_GET['admissionno'])) {
    $admissionno = $_GET['admissionno'];

    $return=array();
    $values=array();
    $sql = "SELECT * FROM studentprofile WHERE admissionno = '$admissionno'";
    $result = mysqli_query($dbcon, $sql);
    $values = sql_fetch_all($result);
    if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['values']=$values;        
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