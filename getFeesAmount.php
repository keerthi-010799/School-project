<?php 
include("database/db_conection.php");//make connection here

$result = "";
$feesamount ='';
//$tablename = 'feesconfig';
if (isset($_POST)) {


// Successfull conection
$sql = "SELECT amount FROM feesconfig WHERE `feesname`= ".$_POST['value']." LIMIT 1";

        $records = $dbcon->query($sql);

        // Check if records are available
if ($records->num_rows > 0) {

// Loop through all the records
while($data = $records->fetch_assoc()) {
$result = $data['feesamount'];
}
} else {
$result = "No Record Found!";
}
}
}

    // Return the value in json format with three parameter
    $returnValue = json_encode(array('result' => $result));

    // Setting the value to json format
    header('Content-Type: application/json');
    echo $returnValue;
?>