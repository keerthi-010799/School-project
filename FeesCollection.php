
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
    <form>
    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Class</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class" >
                                         <option value="0" selected>Select Class</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>                        

                                                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Students</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class" >
                                         <option value="0" selected>Select Student</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here
                                                    $sql = mysqli_query($dbcon, "SELECT firstname FROM studentprofile ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $name=$row['firstname'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$name.'" >'.$name.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                                </div>  
                                                <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputState"><span class="">Fees Type</span><span class="text-danger">*</span></label>
                                                <select id="feesType" data-parsley-trigger="change"  class="form-control form-control-sm"  name="FeesType">
                                             <option value="">-Select Fees Type-</option>
                                                <option value="Term1" >Term Fees</option>
                                                <option value="VanFees" >Van Fees</option>
                                                <option value="OtherFees" >Other Fees</option>
                                            </select>
                                                  </div>
                                                  </div>
                                                </div>                                               
                                                  </div>
                                                  <form>
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Term Fees</span><span class="text-danger">*</span></label>
                                                  <div><label>Term 1</label><input/></div>
                                                  <div><label>Term 2</label><input/></div>
                                                  <div><label>Term 3</label><input/></div>                                            
                                                  </div>
                                                  </div>
                                                  </form>
                                                  <form>
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Van Fees</span><span class="text-danger">*</span></label>
                                                  </div>
                                                  </div>
                                                  </form>
                                                  <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                  <label for="inputState"><span class="">Other Fees</span><span class="text-danger">*</span></label>
                                                  </div>
                                                  </div>
                                                  </form>
                              <div class="form-row">
                                    <div class="form-group col-md-6">
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
</div>
        </form>
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
                                                    function onFeesPayment(x) 
                                                    {    
                                                        var student_id=x.value;
                                                        window.location.href = 'makeFeesPayment.php?student_id='+student_id;
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
