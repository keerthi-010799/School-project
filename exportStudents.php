<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["exportStudents"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
 
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data.csv');
 
 $output = fopen("php://output","w");
 fputcsv($output,array('academic',  'admissionno', 'firstname', 'lastname', 'gender', 'dob', 'doa','batch','oldschoolname','discount','category','class', 'section', 'fathername', 'mothername', 'aadhaar', 'emis','community','caste','address','city','email','mobile','vanflag','routeno','areaname','image'));
 $query = "SELECT academic,  admissionno, firstname, lastname, gender, dob, doa,batch,oldschoolname,discount,category,class, section, fathername, mothername, aadhaar, emis, community,caste,address,city,email,mobile,vanflag,routeno,areaname,image
           FROM studentprofile ORDER BY class ASC";
 $result = mysqli_query($dbcon,$query);
 while($row = mysqli_fetch_assoc($result))
 {
  fputcsv($output,$row);
 }
 fclose($output);
}
?>

