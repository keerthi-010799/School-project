<?php

$conn = new mysqli("localhost","root","","eschoolz");

//session_start();
//code to save department
if (isset($_POST['save'])){
    if(!empty($_POST["name"])){
        $name = $_POST["name"];
        $description = $_POST["desc"];

        $iQuery = "INSERT department(name,description) VALUES(?,?)";

        $stmt = $conn->prepare($iQuery);
        $stmt -> bind_param("ss",$name,$description);#ss String variables for name & description
        if ($stmt->execute()){
           $_SESSION['msg'] = "Department Record Successfully Inserted. ";
           $_SESSION['alert'] = "alert alert-success";
        }
        $stmt -> close;
        $conn -> close;

    } else{
        $_SESSION['msg'] = "Department Name Should Not be Empty. ";
           $_SESSION['alert'] = "alert alert-warning";
    }
    header("location: addDepartment.php");
}

#Delete Functionality
if(isset($_POST['delete'])){
    $id = $_POST['delete'];

    $dQuery = "DELETE from department WHERE id=?";
    $stmt = $conn->prepare($dQuery);
    $stmt->bind_param('i',$id); #i is integer parameter as id is ineteger
    if ($stmt->execute()){
        $_SESSION['msg'] = "Selected  Record  Successfully Deleted. ";
        $_SESSION['alert'] = "alert alert-danger";
     }
     $stmt -> close;
     $conn -> close;
     header("location: addDepartment.php");
    }


?>
