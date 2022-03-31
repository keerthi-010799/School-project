

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
  $query = "SELECT id,class FROM class Order by class";
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
                echo '<option value='.$row['class'].'>'.$row['class'].'</option>';
               }
            }
          ?> 
          </select>
        </div>
        <div class="form-group">
          <label for="pwd">Students</label>
          <select name="students" id="students" class="form-control"   onchange="FetchFeesHeads(this.value)" required>
            <option>-Select Students-</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pwd">Fees Heads</label>
          <select name="feesname" id="feesname" class="form-control">
            <option>Select feesname</option>
          </select>
        </div>
      </form>
      <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                        <input type="hidden" name="id" >
                                        &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                        Submit
                                        </button>
                                        <button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
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
    //$('#feesname').html('<option>Select feesname</option>');
    $.ajax({
      type:'post',
      url: 'fetchDynamicClassAjax.php',
      data : { class_id : class},
      success : function(data){
         $('#students').html(data);
      }

    })
  }
  function FetchFeesHeads(id){ 
    $('#feesname').html('');
    $.ajax({
      type:'post',
      url: 'fetchDynamicClassAjax.php',
      data : { fees_id : id},
      success : function(data){
         $('#feesname').html(data);
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
