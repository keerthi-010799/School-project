<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["exportVanStudents"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
 
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data.csv');
 
 $output = fopen("php://output","w");
 fputcsv($output,array('academic',  'admissionno', 'firstname', 'lastname', 'class','section','gender', 'vanflag','routeno','areaname','image'));
 $query = "SELECT academic,  admissionno, firstname, lastname,class,section, gender,vanflag,routeno,areaname,image
           FROM studentprofile WHERE status='Y' and vanflag='Y' ORDER BY class ASC";
 $result = mysqli_query($dbcon,$query);
 while($row = mysqli_fetch_assoc($result))
 {
  fputcsv($output,$row);
 }
 fclose($output);
}
?>

