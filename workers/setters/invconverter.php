<?php
include("../../database/db_conection.php");//make connection here

$sql = "UPDATE fees_management SET fee_status = '".$_GET['fee_status']."' WHERE fee_id='".$_GET['fee_id']."' ";

if ($dbcon->query($sql) === TRUE) {
    header("Location: ../../listcollectedfees.php");
} else {
    echo "Error converting record: " . $dbcon->error;
}
$dbcon->close();
?>