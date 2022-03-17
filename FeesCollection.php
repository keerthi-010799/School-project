
<?php include('header.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-user-plus bigfonts text-primary" aria-hidden="true" >Fees Payment</i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Fees Payment</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">					
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">					
                    <div class="card mb-3">
                           <div class="card-header">
                            
                        </div>
               


<div class="card-body">
<?php
  include("database/db_conection.php");//make connection here
  $query = "SELECT * FROM class Order by class";
  $result = $dbcon->query($query);
?>
  <div class="row">
    <div class="col-md-8 col-md-offset-8">
    <form>
        <div class="form-group ">
          <label for="class">Class</label>
          <select name="class" id="class" class="form-control" onchange="FetchStudents(this.value)"  required>
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
          <select name="students" id="students" class="form-control" onchange="onFeesPayment(this);" required>
            <option>-Select Students-</option>
          </select>
          <script>
                                                    function onFeesPayment(x) 
                                                    {    
                                                        var student_id=x.value;
                                                        window.location.href = 'makeFeesPayment.php?student_id='+student_id;
                                                    }
                                                </script>									
											</div>
                                               
        </div>
                                                  </div>

        <!--div class="form-group">
          <label for="pwd">Fees Heads</label>
          <select name="city" id="city" class="form-control">
            <option>Select City</option>
          </select>
        </div-->
      </form>
      <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                        <input type="hidden" name="id" >
                                        <a href="makeFeesPayment.php?class_id=' . $row['class'] . '" class="btn btn-primary btn-sm" >
														            Make Fees Payment</i></a>
                                        <button type="button" name="cancel" class="btn btn-warning btn-sm" onclick="window.history.back();">Cancel
                                                        </button>
                                        
                                    </div>
                                </div>
  </div>
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
<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>								
$(document).ready(function() {
    $('.select2').select2();
});
</script>
<!-- END Java Script for this page -->
</div>
</div>
<?php include('footer.php');?>
</html>
