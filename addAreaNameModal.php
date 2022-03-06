<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['areaname']))
{
	
   // $custype=$_POST['custype'];//same
    $areaname = $_POST['areaname'];//same
	$amount=$_POST['amount'];

   $check_areaname_query="select areaname from areamaster WHERE areaname='$areaname'";
    $run_query=mysqli_query($dbcon,$check_areaname_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   //$image =base64_encode($image);														
	$insert_areaname="INSERT INTO areamaster(`areaname`,`amount`) 
	VALUES ('$areaname','$amount')";													    
	echo "$insert_areaname";
	
	if(mysqli_query($dbcon,$insert_areaname))
	{
		echo 	$areaname;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>