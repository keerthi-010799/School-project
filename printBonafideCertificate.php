
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Bonafide Certificate Receipt</title>
        <style type="text/css">
            .p_table{
                border:1px soid #000;
            }

        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    </head>
    <body onload="printInit();">

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
										
			</div>
            <!-- end row -->


<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">						
<div class="card mb-3">
    
        
    <div class="card-body">
        
        <!--form autocomplete="off" action="#"-->
        <form action="printBonafideCertificate.php"  method="post" accept-charset="utf-8" novalidate="novalidate">

						<?php					include("database/db_conection.php");//make connection here
 
											if(isset($_GET['id']))
											{
												$id=$_GET['id'];
											  
												//selecting data associated with this particular id
												$result = mysqli_query($dbcon, "SELECT concat(s.firstname,' ',s.lastname) as studentname,
                                                s. admissionno,s.dob,s.fathername,s.class,s.section,year(s.doa) as doa,
                                                 year(curdate()) as curyear,i.regno  FROM studentprofile s,instprofile i
                                                  WHERE s.id=$id");
									 
												while($res = mysqli_fetch_array($result))
												{
													$admissionno= $res['admissionno'];
													$firstname= $res['studentname'];
													$dob= $res['dob'];
													$doa= $res['doa'];
                                                    $class= $res['class'];
                                                    $section= $res['section'];
													$fathername= $res['fathername'];
                                                    $curyear= $res['curyear'];
                                                    $regno= $res['regno'];
                                                    
                                                    
													//$qty = $res['qty'];
													
												}
											}
											$sql3 = "SELECT * from instprofile";
											$result3 = mysqli_query($dbcon,$sql3);
											$row3 = $result3-> fetch_assoc();

                                            
                                            	
											?>	
												
                                                <div><h3 > 
        <div style="text-align:left"><img  style="position:absolute" src=<?php echo $row3['image'] ?> width="100px" height="100px"/>  </div>
       <div style="text-align:center;color:#8B008B"><?php echo $row3['instname'] ?> </h3>
       <div style="margin-top:-15px;margin-left:15px;text-align:center">
       <?php echo $row3['address']; ?><br/>
                        <?php echo $row3['city']; ?>-<?php echo $row3['zip']; ?>&nbsp;
                        <br/>
                        <b>Mob#:&nbsp;</b><?php echo $row3['mobile']; ?>,<?php echo $row3['workphone']; ?> <br/>
                        <b>E-mail:&nbsp;</b><?php echo $row3['email'];?><br/>
        </h3>
                                        <hr>
                                        <div> <span style="text-align:center;">	<h3>BONAFIDE CERTIFICATE</h3>
					</div>
										<hr>
					<br/>

                    <div class="col-md-6 float-right text-left">																
															
                                                            Date: <?php echo date("d-m-Y"); ?>
                                                            </div>
                                                            <br/>
                                                    
        <p> It is Certified that Mister / Miss <?php echo $firstname;?> </br> 
        Admission No <?php echo $admissionno;?> Date of Birth <?php echo $dob;?></br>
        Son/Daughter of Shri/Smt <?php echo $fathername;?> has </br>
        studied in class <?php echo $class;?> Section <?php echo $section;?> during the previous academic</br>
         year from <?php echo $doa;?> to <?php echo $curyear;?> in this School/Institution which is,<br>
         registered and affilated via Reg.No <?php echo $regno;?> </p>

        </div>
        
    


      		 <div class="col-md-12 float-right text-right"> Principal </div>																
					
				
								</form>
																
											
								</div>
								</div>
							
								
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
	
	<script>
               
        
function printInit(){
window.print();
window.onbeforeprint = beforePrint;
window.onafterprint = afterPrint;
}         
    var beforePrint = function () {       
     };
     var afterPrint = function () {
        if(window.location.pathname.includes("printBonafideCertificate")){
        window.history.back();
        }
         location.reload();
     };
</script>
    </body>
    </html>