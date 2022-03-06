<?php 
include("database/db_conection.php");//make connection here

if (isset($_POST['class_id'])) {
	$query = "SELECT id,admissionno,concat(firstname,' ',lastname) as studentName 
	FROM studentprofile 
	WHERE class=".$_POST['class_id'];
	$result = $dbcon->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select State</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>[ADMN#:'.$row['admissionno'].']-'.$row['studentName'].'</option>';
		 }
	}else{

		echo '<option>No studentName Found!</option>';
	}

}elseif (isset($_POST['fees_id'])) {
	 

	$query2 = "SELECT id,class,feesname FROM `feesconfig` WHERE class=".$_POST['fees_id'];
	$result = $dbcon->query($query2);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select feesname</option>';
		 while ($row = $result->fetch_assoc()) {
			echo '<option value='.$row['id'].'>['.$row['class'].']-'.$row['feesname'].'</option>';
		 }
	}else{

		echo '<option>No Feesname Found!</option>';
	}

}


?>