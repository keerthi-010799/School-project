<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['feesname']))
{
	
   $feesname=$_POST['feesname'];//same
   $description=$_POST['description'];//same
	
	//echo "$insert_feesname";
   $check_feesname_query="select feesname from feeshead WHERE feesname='$feesname'";
    $run_query=mysqli_query($dbcon,$check_feesname_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   $insert_feesname="INSERT INTO feeshead(`feesname`,`description`)  
					 VALUES ('$feesname','$description')";													    
	echo "$insert_areaname";
	
	if(mysqli_query($dbcon,$insert_feesname))
	{
		echo 	$feesname;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>