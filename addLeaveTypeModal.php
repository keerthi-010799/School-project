<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['type']))
{
	//$code ="";
	//$prefix = "CAT00";
	
    $type=$_POST['leavetype'];//same
	//$description=$_POST['description'];//same
//	$enddate=$_POST['enddate'];//same
   // $description = $_POST['description'];//same
	
    $check_leavetype_query="SELECT leavetype FROM leavetypes WHERE typeName='$typename'";
    $run_query=mysqli_query($dbcon,$check_leavetype_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   
	 $insert_leavetype="INSERT INTO leavetypes(`leavetype`) 
	VALUES ('$type')";													    
	echo "$insert_leavetype";
	
	if(mysqli_query($dbcon,$insert_leavetype))
	{
		echo 	$type;
		//echo "<script>alert('User Group creation Successful ')</script>";
		header("location:leaveSettings.php");
    } else {
		die(mysqli_error($dbcon)
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
