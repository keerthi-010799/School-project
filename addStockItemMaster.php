<?php
include("database/db_conection.php");//make connection here

$ItemFound ='';



if(isset($_POST['submit']))
{	

 $itemcode ="";
 $prefix = "";

 $academic=$_POST['academic'];
 $itemname=$_POST['itemname'];
 $category=$_POST['category'];
 $description=$_POST['description'];//same
 $priceperqty 	=$_POST['priceperqty'];
 $uom 		=$_POST['uom'];
 $stockinqty 	=$_POST['stockinqty'];
 $vendor=$_POST['vendor'];//same
 $lowstockalert =$_POST['lowstockalert'];//same
 $stockasofdate  =$_POST['stockasofdate'];//same
 $handler  =$_POST['handler'];//same
 




 




 $sql="SELECT MAX(id) as latest_id FROM stockitemmaster ORDER BY id DESC";
 if($result = mysqli_query($dbcon,$sql)){
     $row   = mysqli_fetch_assoc($result);
     if(mysqli_num_rows($result)>0){
         $maxid = $row['latest_id'];
         $maxid+=1;

         $itemcode = $prefix.$maxid;
     }else{
         $maxid = 0;
         $maxid+=1;
         $itemcode = $prefix.$maxid;
     }
 }
 $check_itemname_query="select itemname from stockitemmaster WHERE itemname='$itemname'";
    $run_query=mysqli_query($dbcon,$check_itemname_query);
	if(mysqli_num_rows($run_query)>0)
    {
		
        $ItemFound = "Item Name: '$itemname'' is already exist in our database, Please try another one!";
      
    }
    else{	
 
 $sql = "INSERT into stockitemmaster(  `academic`,
                                        `itemcode`,
										`itemname`,
										`vendor`,
										`description`,
										`category`,
										`price`,
										`uom`,									
										`stockinqty`,
                                        `lowstockalert`,
										`createdon`,
										`handler`
										)
								VALUES ('$academic',
                                        '$itemcode',
								        '$itemname',
										'$vendor',
										'$description',
										'$category',
										'$priceperqty',
										'$uom',		
										'$stockinqty',
                                        '$lowstockalert',
										'$stockasofdate',
						                '$handler'
									)";

 

 if(mysqli_query($dbcon,$sql))
 {
     header("location:listStockItemMaster.php");
 }   else {
     die('Error: ' . mysqli_error($dbcon));
     echo "<script>alert('User creation unsuccessful ')</script>";
 }
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


            <!--div class="alert alert-success" role="alert">
<h4 class="alert-heading">Company Registrtion Form</h4>
<p></a></p>
</div-->


            <div class="row">					
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">					
                    <div class="card mb-3">
                           <div class="card-header">
                            <!--h3><i class="fa fa-check-square-o"></i>Create Company </h3-->
                            <!--h3 class="fa-hover col-md-12 col-sm-12">
                                 Purchase Item Master
                            </h3-->
                            <p class="text-danger"><?php echo $ItemFound;?></p> 
                        </div>
                        
                     
                        
                        <div class="card-body">

                            <!--form autocomplete="off" action="#"-->
                            <form autocomplete="off" action="#" enctype="multipart/form-data" method="post">

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Academic Year</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="academic" >
                                         <option value="0" selected>Select Academic Year</option>

                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT academic FROM academic WHERE status='Y'order by id DESC");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $academic=$row['academic'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$academic.'" >'.$academic.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>
                                                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Class</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="class" >
                                         <option value="0" selected>Select Class</option>

                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
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
                                        <label>Item Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="itemname" placeholder="Product Name" required class="form-control" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Description</label>
                                        <input type="text"  class="form-control form-control-sm" name="description" placeholder="add product description" />
                                    </div>
                                </div>

                                <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputState"><span class="">Category</span><span class="text-danger">*</span></label>
                                         <select required id="inputState" data-parsley-trigger="change"  class="form-control form-control-sm"  name="category" >
                                         <option value="0" selected>Select Category</option>

                                             <!--select multiple name="academic" class="form-control form-control-sm" -->
                                                    <!--option value="">-Select Academic-</option-->
                                                    <?php 
                                                    include("database/db_conection.php");//make connection here

                                                    $sql = mysqli_query($dbcon, "SELECT category FROM itemcategory ");
                                                    while ($row = $sql->fetch_assoc()){	
                                                        echo $category=$row['category'];
                                                        echo '<option onchange="'.$row[''].'" value="'.$category.'" >'.$category.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                </div>
                                                </div>                        

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Vendor</label>
                                        <input type="text"  class="form-control form-control-sm" name="vendor" placeholder="Add Supplier Name" />
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
                                        <input type="text" onchange="gettaxrate()" name="priceperqty" id="priceperqty" class="form-control form-control-sm"  required placeholder="Price Per Qty" autocomplete="off" />
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>UOM&nbsp;<i class="fa fa-question-circle-o bigfonts" aria-hidden="true" data-toggle="popover" 
                                                           data-trigger="focus" data-placement="top" title="The Item will be measured in terms of this UNIT(e.g.:Kgs,dozen,box"></i>
                                            <span class="text-danger">*</span></label>
                                        <select id="uom" onchange="gettaxrate()" required class="form-control form-control-sm" name="uom">
                                            <option value="0" selected>Select UOM</option>
                                            <?php 
                                            include("database/db_conection.php");//make connection here

                                            $sql = mysqli_query($dbcon, "SELECT code,description FROM uom_lookups ");
                                            while ($row = $sql->fetch_assoc()){	
                                                $description=$row['description'];
                                                $code=$row['code'];
                                                echo '<option  value="'.$code.'" >'.$description.'</option>';
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
                                        <input type="text" class="form-control form-control-sm" name="stockinqty" placeholder="Current Stock in quantity" required autocomplete="off">
                                    </div>
                                

                          
                                    <div class="form-group col-md-3">									  
                                        <label>Low Stock Alert</label>
                                        <input type="text" class="form-control form-control-sm" name="lowstockalert" placeholder="eg., 5  or 10 "   >
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
                                        <input type="hidden" name="id" >
                                        &nbsp;<button class="btn btn-primary" name="submit" type="submit">
                                        Submit
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
                //var suptype = $('#addsupptype').val();
                //alert(groupname+description);
                $.ajax ({
                    url: 'addItemCategoryModal.php',
                    type: 'post',
                    data: {
                        category:category,
                        // description:description
                    },
                    //dataType: 'json',
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