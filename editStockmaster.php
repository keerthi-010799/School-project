<?php
include("database/db_conection.php");//make connection here
if(isset($_POST['editStock']))
{	
 extract($_POST);
	 
 $editstock = "UPDATE `stockitemmaster` SET `academic` = '$academic',`itemname` = '$itemname',`description` = '$description',`description` = '$description',`category` = '$category',
 `uom` = '$uom', WHERE `id` =" .$stkid ;
 if(mysqli_query($dbcon,$editstock))
 {
    echo "<script>alert('User edited successful ')</script>";
    header("location:listStockItemMaster.php");
}   else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('User edit unsuccessful ')</script>";
 }
}
?>
<?php include('header.php');?>
<!-- End Sidebar -->

<!-- Item Category Modal -->
<div class="modal fade custom-modal" id="customModalCategory" tabindex="-1" role="dialog" aria-labelledby="customModalCategory" aria-hidden="true">
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
</div>
<!-- Category Modal Ends-->

<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i>Stock Item Master</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Stock Item Master</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">					
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">					
                    <div class="card mb-3">
                           <div class="card-header">
                            <p class="text-danger"><?php echo $ItemFound;?></p> 
                        </div>                                                                 
                        <div class="card-body">

                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">
                            
                            <?php
                                        include("database/db_conection.php");//make connection here

                                        if(isset($_GET['id']))
                                        {
                                            $id=$_GET['id'];
                                            $result = mysqli_query($dbcon, "SELECT * from stockitemmaster where id = $id");
                                            while($res = mysqli_fetch_array($result))
                                            {   $academic = $res['academic'];
                                                $itemcode =$res['itemcode'];
                                                $itemname =$res['itemname'];
                                                $vendor =$res['Vendor'];
                                                $class = $res['class'];
                                                $description =$res['description'];
                                                $category =$res['category'];
                                                $priceperqty=$res['price'];
                                                $uom =		$res['uom']	;							
                                                $stockinqty =$res['stockinqty'];
                                                $lowstockalert =$res['lowstockalert'];
                                                $handler =$res['handler'];
                                            }
                                        }
                                        ?>
                                                        <div class="form-row">
                                                        <div class="form-group col-md-7">
                                    <label for="inputState">Academic<span class="text-danger">*</span></label>
                                                <select  id="academic" onchange="onlocode(this)"  class="form-control form-control-sm" name="academic">
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic_get=$row['academic'];
                                                        if($academic_get==$academic){
                                                            echo '<option value="'.$academic_get.'" selected>'.$academic_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$academic_get.'" >'.$academic_get.'</option>';
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                </div>
                                                </div>
                                                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Class</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class" >
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT class FROM class ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $class_get=$row['class'];
                                                        if($class_get==$class){
                                                        echo '<option  value="'.$class_get.'" selected>'.$class_get.'</option>';
                                                    }
                                                    else{
                                                        echo '<option value="'.$class_get.'" >'.$class_get.'</option>';
                                                    }
                                                }
                                                    ?>
                                                </select>
                                </div>
                                                </div>                        


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Item Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="itemname" value="<?php echo $itemname;?>"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Description</label>
                                        <input type="text"  class="form-control form-control-sm" name="description" placeholder="add product description" value="<?php echo $description?>"/>
                                    </div>
                                </div>

                                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Category</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="category" >
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT category FROM itemcategory ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $cat_get=$row['category'];
                                                        if($cat_get==$category){
                                                            echo '<option value="'.$cat_get.'" selected>'.$cat_get.'</option>';
                                                        } else {
                                                            echo '<option value="'.$cat_get.'" >'.$cat_get.'</option>';
                                                            
                                                            }
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>                        

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Vendor</label>
                                        <input type="text"  class="form-control form-control-sm" name="vendor" placeholder="Add Supplier Name" value="<?php echo $vendor?>"/>
                                    </div>
                                </div>

                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5>Sales Price Details</h5>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <i class="fa fa-rupee fonts" aria-hidden="true"></i>
                                        <label>Price/Qty<span class="text-danger">*</span></label>
                                        <input type="text" onchange="gettaxrate()" name="priceperqty" id="priceperqty" class="form-control form-control-sm"  required placeholder="Price Per Qty" autocomplete="off" value="<?php echo $priceperqty?>"/>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>UOM
                                            <span class="text-danger">*</span></label>
                                        <select id="uom" class="form-control form-control-sm" name="uom">
                                            <?php 
                                            include("database/db_conection.php");//make connection here

                                            $sql = mysqli_query($dbcon, "SELECT code,description FROM uom_lookups ");
                                            while ($row = $sql->fetch_assoc()){	
                                                $description_get=$row['description'];
                                                $code_get=$row['code'];
                                                if($description_get == $description && $code_get == $code ){
                                                echo '<option  value="'.$code_get.'" >'.$description_get.'</option>';
                                            }else{
                                                echo '<option  value="'.$code_get.'" >'.$description_get.'</option>';
                                            }
                                            }
                                            ?>
                                        </select>	
                                    </div>							
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>As of Date<span class="text-danger">*</span></label>
                                        <i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                           data-trigger="focus" data-placement="top" title="As of Date is price as on date"></i>
                                        <input type="date" class="form-control form-control-sm"  name="pricedatefrom" value="<?php echo date("Y-m-d");?>">					  
                                    </div>
                                </div>											
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5>Stock Information</h5>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Stock Qty on Hand<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="stockinqty" placeholder="Current Stock in quantity" required autocomplete="off" value="<?php echo $stockinqty?>">
                                    </div>
                                

                          
                                    <div class="form-group col-md-3">									  
                                        <label>Low Stock Alert</label>
                                        <input type="text" class="form-control form-control-sm" name="lowstockalert" placeholder="eg., 5  or 10 " value="<?php echo $lowstockalert;?>"/>
                                    </div>
                                        </div>
                                        
                                        <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">As of Date</label>									
                                        <input type="date" class="form-control form-control-sm"  name="stockasofdate" value="<?php echo date("Y-m-d");?>">		
                                    </div>
                                </div>

                              
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Handler</label>
                                        <?php 
                                        //session_start();
                                        include("database/db_conection.php");
                                        $userid = $_SESSION['userid'];
                                        $sq = "select username from userprofile where id='$userid'";
                                        $result = mysqli_query($dbcon, $sq) or die(mysqli_error($dbcon));
                                        //$count = mysqli_num_rows($result);
                                        $rs = mysqli_fetch_assoc($result);
                                        ?>
                                        <input type="text" class="form-control form-control-sm" name="handler" readonly class="form-control form-control-sm" value="<?php echo $rs['username']; ?>" required />

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group text-right m-b-12">
                                        <input type="hidden" name="stkid" value="<?php $_GET['id']?>">
                                        &nbsp;<button class="btn btn-primary" name="editStock" type="submit">
                                        Update
                                        </button>
<button type="button" name="cancel" class="btn btn-secondary m-l-5" onclick="window.history.back();">Cancel
                                                        </button>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- BEGIN Java Script for this page -->
    <script>
        $('document').ready(function(){	
            $('#submitcategory').click(function(){
                var category = $('#addcategory').val();
                $.ajax ({
                    url: 'addItemCategoryModal.php',
                    type: 'post',
                    data: {
                        category:category,
                    },
                    success:function(response){
                        if(response!=0 || response!=""){
                            var new_option ="<option>"+response+"</option>";
                            $('#category').append(new_option);
                            $('#customModalCategory').modal('toggle');
                        }else{
                            alert('Error in inserting new Category,try another unique category');
                        }
                    }

                });

            });
        });

    </script>			