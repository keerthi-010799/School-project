<?php
include("../../database/db_conection.php");//make connection here
session_start();

$sql = "UPDATE fees_management SET fee_status = '".$_GET['fee_status']."' WHERE fee_id='".$_GET['fee_id']."' ";
$id = $_GET['fee_id'];
$result = mysqli_query($dbcon, "SELECT * FROM fees_management WHERE fee_id = $id");								 
while($res = mysqli_fetch_array($result))
{
    $academic1 = $res['fee_academic_year'];													
    $class1 = $res['fee_class'];
    $feestype1 = $res['fee_type'];													
    $amount = $res['fees_paid'];													
$sid = $res['fee_student_id'];																										
$fid = $res['fee_id'];																										

}


if ($dbcon->query($sql) === TRUE) {
    $sq3="SELECT closingbalance FROM `instprofile`";
    if($resul = mysqli_query($dbcon,$sq3)){
     $ro4   = mysqli_fetch_assoc($resul);
     if(mysqli_num_rows($resul)>0){
     $csbal = $ro4['closingbalance'];
    }
    }
    $closingbal = $csbal + $amount;

    $userid = $_SESSION['userid'];
                              $sq1 = "select username from userprofile where id='$userid'";
                              $resut = mysqli_query($dbcon, $sq1);
                              $rs = mysqli_fetch_assoc($resut);
    $handler = $rs['username'];

$sql3="SELECT MAX(trans_id) as id FROM `transactions` ORDER BY trans_id DESC";
if($result4 = mysqli_query($dbcon,$sql3)){
$row4   = mysqli_fetch_assoc($result4);
if(mysqli_num_rows($result4)>0){
$prefix = "TRN-";   
$maxid = intval(substr($row4['id'],4));
$maxid += 1;
$tnsid = $maxid;
$tranid= $prefix.$maxid;
}
else{
$prefix = "TRN-";
$maxid = 0;
$maxid += 1;
$tnsid = $maxid;
$tranid = $prefix.$maxid;
}
}
$date1 = date("Y-m-d");

$sql2 = "INSERT into `transactions`(id,trans_id,trans_details,trans_type,trans_amt,trans_date,total_closing_bal,trans_handler) 
VALUES ('$tnsid','$tranid','$feestype1','Credit','$amount','$date1','$closingbal','$handler')";
if (mysqli_query($dbcon,$sql2)) {
echo 'success33';
}else{
echo mysqli_error($dbcon);

}

$sql02 = "UPDATE `instprofile` set closingbalance = $closingbal";
if (mysqli_query($dbcon,$sql02)) {
echo 'success cls bal';

}else{
echo mysqli_error($dbcon);
}
   header("Location: ../../listcollectedfees.php");
} else {
    echo "Error converting record: " . $dbcon->error;
}
$dbcon->close();
?>