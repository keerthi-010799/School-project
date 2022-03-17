<?php
include("database/db_conection.php");//make connection here
 
if (isset($_POST["submit"])) {
    
   // $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES['file']['name']) {
        
        $filename = explode(".",$_FILES['file']['name']);
        
        if($filename[1]=='csv'){
            $handle = fopen($_FILES['file']['tmp_name'],"r");
                while($data = fgetcsv($handle)){
                    
                    $item1 =mysqli_real_escape_string($dbcon,$data[0]);
                    $item2 =mysqli_real_escape_string($dbcon,$data[1]);
					$item3 =mysqli_real_escape_string($dbcon,$data[2]);
					$item4 =mysqli_real_escape_string($dbcon,$data[3]);
					$item5 =mysqli_real_escape_string($dbcon,$data[4]);
					$item6 =mysqli_real_escape_string($dbcon,$data[5]);
					$item7 =mysqli_real_escape_string($dbcon,$data[6]);
					$item8 =mysqli_real_escape_string($dbcon,$data[7]);
					$item9 =mysqli_real_escape_string($dbcon,$data[8]);
					$item10 =mysqli_real_escape_string($dbcon,$data[9]);
					$item11 =mysqli_real_escape_string($dbcon,$data[10]);
                    $item12 =mysqli_real_escape_string($dbcon,$data[11]);
                    $item13 =mysqli_real_escape_string($dbcon,$data[12]);
                    $item14 =mysqli_real_escape_string($dbcon,$data[13]);
                    $item15 =mysqli_real_escape_string($dbcon,$data[14]);
                    $item16 =mysqli_real_escape_string($dbcon,$data[15]);
                    $item17 =mysqli_real_escape_string($dbcon,$data[16]);
                    $item18 =mysqli_real_escape_string($dbcon,$data[17]);
					$item19 =mysqli_real_escape_string($dbcon,$data[18]);
                    $item20 =mysqli_real_escape_string($dbcon,$data[19]);
                    $item21 =mysqli_real_escape_string($dbcon,$data[20]);
                    $item22 =mysqli_real_escape_string($dbcon,$data[21]);
                    $item23 =mysqli_real_escape_string($dbcon,$data[22]);
                    $item24 =mysqli_real_escape_string($dbcon,$data[23]);
                    $item25 =mysqli_real_escape_string($dbcon,$data[24]);
                    $sql = "INSERT into studentprofile(academic,admissionno,
					firstname,lastname,
					gender,dob,doa,class,
					section,bloodgroup,nationality,
					religion,community,caste,fathername,
					mothername,aadhaar,emis,address,city,
					email,mobile,altmobno,routeno,areacode) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$item17','$item18','$item19','$item20','$item21',
                    '$item22','$item23','$item24','$item25')";
                    mysqli_query($dbcon,$sql);
                }
                   fclose($handle) ;
            print "Import Done";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head><title>Import</title></head>
    <body>
    <form  method="post" enctype="multipart/form-data">
        <div align="center">
        <p>Upload CSV <input type='file' name='file'></p>
        <p><input type='submit'  name='submit' value='Import'></p>
    </div>
</form>
</body>
</html>
