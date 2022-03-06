<?php 
include("database/db_conection.php");
$output ='';
$sql = "SELECT * FROM language WHERE cid ='".$_POST['courseID']."' ORDER BY p_lang";
$result =mysqli_query($dbcon,$sql);

$output .='<option value="" disabled selected>-Select Language-</option>';
while($row=mysqli_fetch_array($result)){
	$output .='<option value="'.$row["id"].'">'.$row["p_lang"].'</option>';
	}
echo $output;
?>
