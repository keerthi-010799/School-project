<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['class']))
{
	
   $class=$_POST['class'];//same
   $description=$_POST['description'];//same
	
	//echo "$insert_feesname";
   $check_class_query="SELECT class from class WHERE class='$class'";
    $run_query=mysqli_query($dbcon,$check_class_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   $insert_class="INSERT INTO class(`class`,`description`)  
					 VALUES ('$class','$description')";													    
	echo "$insert_class";
	
	if(mysqli_query($dbcon,$insert_class))
	{
		echo 	$class;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>