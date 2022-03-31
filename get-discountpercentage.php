<?php include("database/db_conection.php");?>
<?php
if(isset($_POST['c_id'])) {
  $sql = "select * from `category` where `id`=".mysqli_real_escape_string($dbcon, $_POST['c_id']);
  $res = mysqli_query($dbcon, $sql);
  if(mysqli_num_rows($res) > 0) {
 //   echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->id."'>".$row->discountpercentage."</option>";
    }
  }
} else {
  header('location: ./');
}
?>