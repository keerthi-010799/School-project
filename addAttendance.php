
<?php include('header.php');?>
<!-- End Sidebar -->

<!-- Modal -->
<!--div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" name="addcategory"  id="addcategory"  placeholder="Add Category">
                    </div>		
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="submitcategory" id="submitcategory" class="btn btn-primary">Save and Associate</button>
            </div>
        </div>
    </div>
</div-->
<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-check-square-o bigfonts text-primary" aria-hidden="true">Attendance Form</i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Attendnace</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <!--div class="alert alert-success" role="alert">
<h4 class="alert-heading">Company Registrtion Form</h4>
<p></a></p>
</div-->


            <div class="row">					
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">					
                    <div class="card mb-3">
                           <div class="card-header">
                            <!--h3>
                            <!--h3 class="fa-hover col-md-12 col-sm-12">
                                 Purchase Item Master
                            </h3-->
                               <h3> message notifications here</h3>  
                            <!--p class="text-danger"><?php echo $admnoFound;?>Message Sent Successfully</p--> 
                        </div>
                                         
                        
                        
                        <div class="card-body">
                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                                    
                                      
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Class/Course<span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" multiple>
                                             <option value="">-Select Group-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class=$row['class'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$class.'" >'.$class.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                    
                                    <div class="form-group col-md-3">
                                    <label for="inputState">Section<span class="text-danger"></span></label>
                                         <select id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="section">
                                             <option value="">-Select Section-</option>
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT section FROM section");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $section=$row['section'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$section.'" >'.$section.'</option>';
                                                    }
                                                    ?>
                                                </select>

                                </div>   
                                </div>
                                    <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                       
                                        <input type="hidden" name="id" >
                                        &nbsp;&nbsp;<button class="btn btn-primary btn-sm" name="submit" type="submit">
                                       Submit
                                        </button>
                                        <button type="button" name="cancel" class="btn btn-secondary btn-sm m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
                                        </div>
                                </div>
                                </form>
                                </div>

                            
                        </div>
                    </div>
                </div>



            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
   


    <?php include('footer.php');?>

