<?php
include_once('../../database/db_conection.php');


if (isset($_GET['student'])) {
    if (isset($_GET['class'])) {
    $student = $_GET['student'];
    $class = $_GET['class'];
    $areaname1;
  $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE firstname = '$student' and class = '$class'");
  while ($row = $sql1->fetch_assoc()){
        $areaname1 = $row['areaname'];
        $academic = $row['academic'];
        $std_id = $row['id'];
        $admno = $row['admissionno'];
    }
}
    $return=array();
    $values=array();
            $sql = "SELECT id,areaname,amount FROM areamaster where  areaname = '$areaname1'";
    $result = mysqli_query($dbcon, $sql);
    $values = sql_fetch_all($result);

    if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['values']=$values;
        $return['class'] = $class;
        $return['std'] = $student;
        $return['academicyear'] = $academic;
        $return['std_id'] = $std_id;
        $return['admissionno'] = $admno;

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
