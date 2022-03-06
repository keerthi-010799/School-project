<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['designation']))
{
	
   $designation=$_POST['designation'];//same
   $description=$_POST['description'];//same
	
	//echo "$insert_feesname";
   $check_designation_query="select designation from designation WHERE designation='$designation'";
    $run_query=mysqli_query($dbcon,$check_designation_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   $insert_designation="INSERT INTO designation(`designation`,`description`)  
					 VALUES ('$designation','$description')";													    
	echo "$insert_academic";
	
	if(mysqli_query($dbcon,$insert_designation))
	{
		echo 	$designation;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>