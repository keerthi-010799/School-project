insertSectionMasterModal.php
<?php
include("database/db_conection.php");//make connection here

if(isset($_POST['section']))
{
	
    $section=$_POST['section'];//same
    $description = $_POST['description'];//same
	//$compcode=$_POST['compcode'];

   $check_section_query="select section from section WHERE section='$section'";
    $run_query=mysqli_query($dbcon,$check_section_query);
	if(mysqli_num_rows($run_query)>0)
    {
		echo '0';
      
        exit();
    }
   //$image =base64_encode($image);														
	$insert_section="INSERT INTO section(`section`,`description`) 
	VALUES ('$section','$description')";													    
	//echo "$insert_paymenterm";
	
	if(mysqli_query($dbcon,$insert_section))
	{
		echo 	$section;
		//echo "<script>alert('User Group creation Successful ')</script>";
		//header("location:addUsers.php");
    } else {
		echo '0';
		exit; //echo "<script>alert('User creation unsuccessful ')</script>";
	}
	
}
?>