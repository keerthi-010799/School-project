
<?php

include_once('../../database/db_conection.php');
include('functions.php');

if (isset($_GET['itemcodeId'])) {
    if (isset($_GET['student'])) {
        if (isset($_GET['class'])) {
            $itemcodeId = $_GET['itemcodeId'];
        $student = $_GET['student'];
        $class = $_GET['class'];
        $academic;
      $sql1 = mysqli_query($dbcon, "SELECT * FROM studentprofile WHERE firstname = '$student' and class = '$class'");
      while ($row = $sql1->fetch_assoc()){
            $academic = $row['academic'];
            $std_id = $row['id'];
            $admno = $row['admissionno'];
        }
    }
    


    $return=array();
    $values=array();

            $sql = "SELECT * FROM stockitemmaster where  itemname='$itemcodeId' ;";

    $result = mysqli_query($dbcon, $sql);
    $values = sql_fetch_all($result);

    if (mysqli_num_rows($result) > 0) {
        $return['status']=true;
        $return['values']=$values;
        $return['admissionno'] = $admno;
        $return['std_id'] = $std_id;


    }else{
        $return['status']=false;
        $return['error']=mysqli_error($dbcon);
    }


}
}
echo json_encode($return);


?>
