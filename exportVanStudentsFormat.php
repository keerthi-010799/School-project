<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["exportVan"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
 
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data.csv');
 
 $output = fopen("php://output","w");
 fputcsv($output,array('academic','admissionno','firstname', 'routeno','areaname','vanflag'));
 $query = "SELECT academic,admissionno,concat(firstname,' ',lastname) as name, routeno,areaname,vanflag
 FROM studentprofile WHERE vanflag = 'N' ORDER BY admissionno ASC";
 $result = mysqli_query($dbcon,$query);
 while($row = mysqli_fetch_assoc($result))
 {
  fputcsv($output,$row);
 }
 fclose($output);
}
?>