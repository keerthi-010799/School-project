<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["exportArea"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
 
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data.csv');
 
 $output = fopen("php://output","w");
 fputcsv($output,array('areaname','amount'));
 $query = "SELECT areaname,amount from areamaster ORDER BY areaname ASC";
 $result = mysqli_query($dbcon,$query);
 while($row = mysqli_fetch_assoc($result))
 {
  fputcsv($output,$row);
 }
 fclose($output);
}
?>
