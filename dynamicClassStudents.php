<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dynamic Dependent Select Box using jQuery, Ajax and PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  include("database/db_conection.php");//make connection here
  $query = "SELECT * FROM class Order by class";
  $result = $dbcon->query($query);
?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <form>
        <div class="form-group">
          <label for="email">Class</label>
          <select name="country" id="class" class="form-control" onchange="FetchStudents(this.value)"  required>
            <option value="">-Select class-</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['id'].'>'.$row['class'].'</option>';
               }
            }
          ?> 
          </select>
        </div>
        <div class="form-group">
          <label for="pwd">Students</label>
          <select name="students" id="students" class="form-control"  required>
            <option>-Select Students-</option>
          </select>
        </div>

        <!--div class="form-group">
          <label for="pwd">Fees Heads</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div-->
      </form>
  </div>
  </div>
</div>
<script type="text/javascript">
  function FetchStudents(id){
    $('#students').html('');
   // $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'fetchDynamicClassAjax.php',
      data : { class_id : id},
      success : function(data){
         $('#students').html(data);
      }

    })
  }

  


  
</script>
</body>
</html>
