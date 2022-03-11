<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['updatedata']))
{   
    $id = $_POST['update_id'];
    
    $section = $_POST['section'];
    $description = $_POST['description'];
  

    $query = "UPDATE section SET section='$section', description='$description' WHERE id='$id'  ";
    $query_run = mysqli_query($dbcon, $query);

    if($query_run)
    {
        echo '<script> alert("Data Updated"); </script>';
        header("Location:listSection.php");
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
?>