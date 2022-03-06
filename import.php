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
                    $sql = "INSERT into studentprofile(academic,admissionno) values('$item1','$item2')";
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
