
<?php include('header.php');?>
<!-- End Sidebar -->

<!-- Modal 1 starts here-->
 <!--div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Numbers SMS Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" enctype="multipart/form-data" method="post">							
                                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Numbers<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="type numbers with comma seperated"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="Type message here"></textarea>
                                    </div>
                                </div>                                                </form>
                                                    </div>

                                                <div class="modal-footer-center">
                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="submitgroup" id="submitgroup" class="btn btn-primary">Send SMS</button>
                                                    
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
            </div-->
<!--Modal 1 ends-->


<!-- Modal2 starts -->
 <!--div class="modal fade custom-modal" id="customModal2" tabindex="-1" role="dialog" aria-labelledby="customModal2" aria-hidden="true"-->
 <div class="modal fade bd-example-modal-lg fade custom-modal" id="customModal2" tabindex="-1" role="dialog" aria-labelledby="customModal2" aria-hidden="true">
                                    <!--div class="modal-dialog" role="document"-->
									<div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Homework SMS Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" enctype="multipart/form-data" method="post">							
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>Class/Course<span class="text-danger">*</span></label>
                                         <select class="form-control select" id="example2" name="class">        <!--option value="">-Select Group-</option-->
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
                                    
                                    <div class="form-group col-md-4">
                                    <label for="inputState">Section<span class="text-danger"></span></label>
                                         <select class="form-control select" id="example2" name="section" >    
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
                                    <div class="form-group col-md-12">
                                        <label>To Receipients<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="receipient"  rows="3" placeholder=""></textarea>
                                    </div>
                                </div>
								 
								 <div class="form-row">
								 <label>Choose SMS to Management<span class="text-danger"></span><input type="checkbox" style="width:20px" id="ckbCheckAll"></label>
								 </div>
                                
								
								<div class="form-row">
                                    <div class="form-group col-md-3">
                                    <label><span class="text-danger"><i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                                                                            data-trigger="focus" data-placement="top" title="Message Text - by default sends English SMS if u want to send Language messagea like Tamil  - message type Unicode has to be selected
                                           "></i>
                                            </span>Message Type</label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <!--option value="">-Select Method-</option-->
                                        <option value="1">Text</option>
                                        <option value="2">Unicode</option>
                                        </select>   
                                </div>   
                                </div>
								
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="3" placeholder="Type message here"></textarea>
                                    </div>
                                </div>


                                                                  </form>
                                                    </div>

                                                <div class="modal-footer-center">
                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<button type="button" name="submitgroup" id="submitgroup" class="btn btn-success">Send SMS</button>
                                                    
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
            </div>
<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-envelope-o bigfonts" aria-hidden="true">&nbsp;SMS Form</i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Publish Announcements</li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">					
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
                                    <div class="form-group col-md-10">
                                        
                                        <!--button type=button class="btn btn-primary btn-sm "><a href="addComposeSMS.php.php" class="text-warning"> Group</a></button-->
                                        
                                        <a role="button" href="#custom-modal" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customModal">Numbers</a>
                                        
                                        <a role="button" href="#custom-modal2" class="btn btn-success btn-sm" data-toggle="modal" data-target="#customModal2">Home Works</a>
                                        
                                        <!--button type=button class="btn btn-success btn-sm "><a href="addStudentProfile.php" class="text-warning"><b>Home Work</b></a></button-->
                                        
                                        
                                        <button type=button class="btn btn-danger btn-sm "><a href="listCustomSMS.php" class="text-warning"><b>Custom SMS</b></a></button>
                                        
                                        <button type=button class="btn btn-primary btn-sm "><a href="listBirthdaySMS.php" class="text-warning"><b>Birthday</b></a></button>
                                        
                                        <button type=button class="btn btn-warning btn-sm"><a href="listRouteSMS.php" class="text-danger"><b>Route/Van# SMS</b></a></button>
										
										<button type=button class="btn btn-danger btn-sm"><a href="listAttendanceSMS.php" class="text-warning"><b>Attendance</b></a></button>
                                </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Numbers<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="4" placeholder="Enter numbers with space and newline. Please do not use comma(,)"></textarea>
                                    </div>
                                

                                </div>   
                                    
								 <div class="form-row">
								 <label>Choose SMS to Management<span class="text-danger"></span><input type="checkbox" style="width:20px" id="ckbCheckAll"></label>
								 </div>
                                
								
								<div class="form-row">
                                    <div class="form-group col-md-3">
                                    <label><span class="text-danger"><i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                                                                            data-trigger="focus" data-placement="top" title="Message Text - by default sends English SMS if u want to send Language messagea like Tamil  - message type Unicode has to be selected
                                           "></i>
                                            </span>Message Type</label>
                                    <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="gender" >
                                        <!--option value="">-Select Method-</option-->
                                        <option value="1">Text</option>
                                        <option value="2">Unicode</option>
                                        </select>   
                                </div>   
                                </div>
								
                                <!--div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label>Numbers<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="5" placeholder="type numbers with comma seperated"></textarea>
                                    </div>
                                </div-->
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Message Box<span class="text-danger"></span></label>
                                        <textarea class="form-control" name="number"  rows="4" placeholder="Type message here"></textarea>
                                    </div>
                                </div>


                                
                                    <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                       
                                        <input type="hidden" name="id" >
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;
										<button class="btn btn-success btn-sm" name="submit" type="submit">Send SMS</button>
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
   
<script src="select2.js"></script>
    <script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>

                

    <?php include('footer.php');?>

