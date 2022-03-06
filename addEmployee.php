<?php include('header.php');?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Form validation</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Form validation</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			

			<div class="alert alert-success" role="alert">
                <h4 class="alert-heading"></h4>     
			</div>

			
			<div class="row">
			
                    <!--div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Form validator</h3>
								A simple demo form that uses most of supported Parsley elements to show how to bind, configure and validate them properly.
							</div>
								
							<div class="card-body">
																
										<form action="#" data-parsley-validate novalidate>
                                                    <div class="form-group">
                                                        <label for="userName">User Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="nick" data-parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="userName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                                        <input type="email" name="email" data-parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Password<span class="text-danger">*</span></label>
                                                        <input id="pass1" type="password" placeholder="Password" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                                        <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
                                                    </div>
													<div class="form-group">
                                                        <label>URL</label>
                                                        <div>
                                                            <input data-parsley-type="url" type="url" class="form-control" required placeholder="URL"/>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers"/>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Textarea</label>
                                                        <div>
                                                            <textarea required class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <input id="remember-1" type="checkbox">
                                                            <label for="remember-1"> Remember me </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                        </form>
										
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Employee Details</h3>
								</div>
								
							<div class="card-body">			<form class="demo-form" action="#">
									  <div class="form-section">
										<label for="firstname">Employee Name</label>
										<input type="text" class="form-control" name="firstname" id="firstname">
<br/>
										
										<input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname">
                                          
                                          <label for="firstname">Gender</label>
										<input type="text" class="form-control" name="gender" id="gender" >
									  
                                
                                <label for="firstname">Date of Joining</label>
										<input type="date" class="form-control" name="doj" id="doj" >
                                          
                                           <label for="firstname">Work Email</label>
										<input type="text" class="form-control" name="email" id="email" >
                                          
                                           <label for="firstname">Department</label>
										<input type="text" class="form-control" name="dept" id="dept">
                                          
                                          <label for="firstname">Work Location</label>
										<input type="text" class="form-control" name="location" id="location" >
									  </div>
                                
										
                        

									  <div class="form-section" >
                                         <h3>Salary Details</h3> 
								  <label class="sr-only" for="inlineFormInputGroupUsername2">Annual cTC</label>
								  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-5">
									<div class="input-group-addon">₹</div>
									<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter CTC">per year
                                      
                                      
                                      
                                          </div>
                                          <br/>
										  
										  <b>Earnings</b><br/><br/>
                                          
								  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									  <label>Basic&nbsp;&nbsp;</label><div class="input-group-addon">50% of CTC
(Monthly)</div>
									<input type="text" class="form-control" id="inlineFormInputGroupUsername2"  placeholder="">
									  
									  <label for="color">Annually</label>
										<input type="text" class="form-control" name="color" id="annually" >
									  		
										  </div>
								<br/>
								<div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									  <label>HRA&nbsp;&nbsp;</label><div class="input-group-addon">50% of Basic
(Monthly)</div>
									<input type="text" class="form-control" id="inlineFormInputGroupUsername2"  placeholder="">
									  
									  <label for="color">Annually</label>
										<input type="text" class="form-control" name="color" id="annually" >
									  		
										  </div>
										  
										  <br/>
								<div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									  <label>Conveyance&nbsp;&nbsp;</label><div class="input-group-addon">Fixed
(Monthly)</div>
									<input type="text" class="form-control" id="inlineFormInputGroupUsername2"  placeholder="">
									  
									  <label for="color">Annually</label>
										<input type="text" class="form-control" name="color" id="annually" >
									  		
										  </div>
										  
										  <br/>
								<div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Cost to Company</label>
									
									<input type="text" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2"  placeholder="" readonly>
									  
									  <label for="color">Annually</label>
										<input type="text" class="form-control" name="color" id="annually" readonly>
									  		
										  </div>
								
								</div>
                                          
                                          
										  
										  
								
								 <!--div class="form-group col-md-3"-->
                                        
									  <div class="form-section">
										  <h3>Personel Information</h3> 
										<div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Date of Birth</label>
									
									<input type="date" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2" name="date" placeholder="" >
									  
									  <label for="color">Age</label>
										<input type="text" class="form-control form-group col-md-6" name="age" id="age">
									  		
										  </div>
										  <br/>
										  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Mobile</label>
									
									<input type="date" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
									  
									  <label for="color">Father</label>
										<input type="text" class="form-control form-group col-md-6" name="father" id="age">
									  		
										  </div>
										  
										  <br/>
										  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Address</label>
									
									<input type="text" class="form-control form-group col-md-12" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
									  
								</div>
										<br/>
										  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>City</label>
									
									<input type="text" class="form-control form-group col-md-12" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
											  
										<label>Postal Code</label>
										  
									    <input type="text" class="form-control form-group col-md-12" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
									
										  
								</div>
								</div>
									  <div class="form-section">
										  <h3>Account Details</h3> 
										<div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Account Holder's Name</label>
									
									<input type="date" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2" name="date" placeholder="" >
									  
									  <label for="color">Account No</label>
										<input type="text" class="form-control form-group col-md-6" name="age" id="age">
									  		
										  </div>
										  <br/>
										  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>Re-Enter Account No</label>
									
									<input type="date" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
									  
									  <label for="color">Bank Name</label>
										<input type="text" class="form-control form-group col-md-6" name="father" id="age">
									  		
										  </div>
										  
										  <br/>
										  <div class="input-group mb-1 mr-sm-1 mb-sm-0 form-group col-md-12">
									
									<label>IFSC Code</label>
									
									<input type="text" class="form-control form-group col-md-6" id="inlineFormInputGroupUsername2" name="mobile" placeholder="" >
											  
											  <label>Account Type</label>
									
									<select id="accountype" name="accountype" class="form-control form-group col-md-6">
                                                <option selected>Select Tax Method</option>
                                                <option value="1">Inclusive</option>
                                                <option value="0">Exclusive</option>
                                            </select>
                                        </div>	  
									  
								</div>
									
								
								
								
								
									  <br /><br />
										
									  <div class="form-navigation">
										<button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
										<button type="button" class="next btn btn-info pull-right">Next &gt;</button>
										<input type="submit" class="btn btn-primary pull-right">
										<span class="clearfix"></span>
									  </div>

									</form>
									
									<script >$(function () {
									  var $sections = $('.form-section');

									  function navigateTo(index) {
										// Mark the current section with the class 'current'
										$sections
										  .removeClass('current')
										  .eq(index)
											.addClass('current');
										// Show only the navigation buttons that make sense for the current section:
										$('.form-navigation .previous').toggle(index > 0);
										var atTheEnd = index >= $sections.length - 1;
										$('.form-navigation .next').toggle(!atTheEnd);
										$('.form-navigation [type=submit]').toggle(atTheEnd);
									  }

									  function curIndex() {
										// Return the current index by looking at which section has the class 'current'
										return $sections.index($sections.filter('.current'));
									  }

									  // Previous button is easy, just go back
									  $('.form-navigation .previous').click(function() {
										navigateTo(curIndex() - 1);
									  });

									  // Next button goes forward iff current block validates
									  $('.form-navigation .next').click(function() {
										$('.demo-form').parsley().whenValidate({
										  group: 'block-' + curIndex()
										}).done(function() {
										  navigateTo(curIndex() + 1);
										});
									  });

									  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
									  $sections.each(function(index, section) {
										$(section).find(':input').attr('data-parsley-group', 'block-' + index);
									  });
									  navigateTo(0); // Start at the beginning
									});
									//# sourceURL=pen.js
									</script>

								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
			</div>





            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
<script src="assets/plugins/parsleyjs/parsley.min.js"></script>
<script>
  $('#form').parsley();
</script>
<!-- END Java Script for this page -->

</body>
</html>