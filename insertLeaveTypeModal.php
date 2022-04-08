<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['leavetype']))
{
	
    $leavetype=$_POST['leavetype'];//same
    $description = $_POST['description'];//same
	//$compcode=$_POST['compcode'];

   $check_custype_query="select leavetype from leavetypes WHERE leavetype='$leavetype'";
    $run_query=mysqli_query($dbcon,$check_custype_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   //$image =base64_encode($image);														
	$insert_custype="INSERT INTO leavetypes(`leavetype`,`description`) 
	VALUES ('$leavetype','$description')";													    
	//echo "$insert_paymenterm";
	
	if(mysqli_query($dbcon,$insert_custype))
	{
		echo 	$leavetype;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>