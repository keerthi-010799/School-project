<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["exportStudents"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
 
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data.csv');
 
 $output = fopen("php://output","w");
 fputcsv($output,array('admissionid', 'studentname', 'class', 'fathername', 'fmobile', 'mothername', 'mmobile', 'gender', 'dob','address', 'city', 'aadharnumber','admission_date'));
 $query = "SELECT admissionid,studentname,class,fathername,fmobile,mothername,mmobile,gender,dob,address,city,`aadharnumber`,`admission_date` FROM new_admission WHERE status=1 ORDER BY class DESC ";
 $result = mysqli_query($dbcon,$query);
 while($row = mysqli_fetch_assoc($result))
 {
  fputcsv($output,$row);
 }
 fclose($output);
}
?>

