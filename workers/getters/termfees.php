<?php
include_once('../../database/db_conection.php');
$percent =null ;
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
$sql1 = mysqli_query($dbcon, "SELECT * FROM studentsdiscount WHERE admissionno = '$admno'");
while ($row = $sql1->fetch_assoc()){
      $percent = $row['discountpercentage'];      
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
