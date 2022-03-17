<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['academic']))
{
	
   $academic=$_POST['academic'];//same
   $description=$_POST['description'];//same
	
	//echo "$insert_feesname";
   $check_academic_query="select academic from academic WHERE academic='$academic'";
    $run_query=mysqli_query($dbcon,$check_academic_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   $insert_academic="INSERT INTO academic(`academic`,`description`)  
					 VALUES ('$academic','$description')";													    
	echo "$insert_academic";
	
	if(mysqli_query($dbcon,$insert_academic))
	{
		echo 	$academic;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>