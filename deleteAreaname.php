<?php
include("database/db_conection.php");//make connection here
    // sql to delete a record
	
    $sql = "DELETE FROM areamaster WHERE id='".$_GET['id']."' ";

    if ($dbcon->query($sql) === TRUE) {
       header("Location: listAreanames.php");
    } else {
        echo "Error deleting record: " . $dbcon->error;
    }
    $dbcon->close();
?>