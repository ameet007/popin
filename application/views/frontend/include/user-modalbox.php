<?php 
include_once APPPATH."libraries/google-api-php-client/user_register.php";
?>

<!--User Initial Modal Box Start-->
<div id="becomePartner" class="modal fade new-partner-model" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Become a Partner</h4>
        </div>
        <div class="modal-body">
            <a class="btn2 google-btn btn-block" href="<?php echo $userAuthUrl; ?>">Sign up with Google</a>
            <div class="signup-or-separator">
                <span class="separator-text">or</span>
                <hr>
            </div>
            <button class="btn-red btn-block openSignUpBox">Sign up with Email</button>
            <span class="trams">By signing up, I agree to Popln’s Terms of Service, <a href="#">Nondiscrimination Policy</a>, <a href="#">Payment Terms of Services</a>, <a href="#">Privacy Policy</a>, <a href="#">Professional Refund Policy</a>, <a href="#">Owner Gurantee Terms</a>.</span>
            <div class="modal-footer clearfix">
                <div class="pull-left">
                    Alerady have a <?= SITE_DISPNAME; ?> account?
                </div>
                <button type="button" class="btn btn-red openSignInBox">Log In</button>
            </div>
        </div>
    </div>

  </div>
</div>
<!--User Initial Modal Box End-->



<!--User Signup Modal Box Start-->
<div id="signUpModel" class="modal fade new-partner-model new-signup" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Become a Partner</h4>
                <p>Sign up with <a href="<?php echo $userAuthUrl; ?>">Google</a></p>
            </div>
			<form name="signUpForm" id="signUpForm" method="post" action="<?= base_url('user/submit_register'); ?>">
            <div class="modal-body">
                <div class="signup-or-separator">
                    <span class="separator-text">or</span>
                    <hr>
                </div>
                <div class="felid">
                    <input placeholder="First name" value="" id="reg_firstName" name="reg_firstName" class="textbox" type="text" />
                </div>
                <div class="felid">
                    <input placeholder="Last name" value="" id="reg_lastName" name="reg_lastName" class="textbox" type="text" />
                </div>
                <div class="felid">
                    <input placeholder="Email address" value="" name="reg_email" id="reg_email" class="icon3 textbox" onkeyup="return forceLower(this);" />
                </div>
                <div class="felid">
                    <input placeholder="Password" value="" name="reg_password" id="reg_password" class="icon4 textbox" type="password" />
                </div>
                <div class="felid barthday">
                    <label>Birthday <i class="fa fa-question-circle" aria-hidden="true"></i></label>
                    <div class="row">
                        <div class="col-md-4">
                            <select class="selectbox" name="reg_dobMonth" id="reg_dobMonth">
                                <?php $all_months = unserialize(MONTHS); 
								foreach($all_months as $k=>$v){ ?>
								<option value="<?= $k; ?>"><?= $v; ?></option>
								<?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="selectbox" name="reg_dobDay" id="reg_dobDay">
                                <option value="">Day</option>
                                <?php for($i=1;$i<=31;$i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="selectbox" name="reg_dobYear" id="reg_dobYear">
								<option value="">Year</option>
								<?php for($i=date('Y');$i>=(date('Y')-100);$i--) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="check-right">
                    <label>
                        <input id="newsLetter" name="newsLetter" value="Yes" type="checkbox">
                        <span for="newsLetter">I would like to receive updates from Popin</span>
                    </label>
                </div>
                <button class="btn-red btn-block" type="submit">Sign up with Email</button>
                <span class="trams">By singing up, I agree to Popln’s Terms of Service, <a target="_blank" href="<?= site_url(); ?>">Non-discrimination Policy</a>, <a target="_blank" href="<?= site_url(); ?>">Payment Terms of Services</a>, <a target="_blank" href="<?= site_url(); ?>">Privacy Policy</a>, <a target="_blank" href="<?= site_url(); ?>">Professional Refund Policy</a>, <a target="_blank" href="<?= site_url(); ?>">Owner Guarantee Terms</a>.</span>
                <div class="modal-footer clearfix">
                    <div class="pull-left">Already have a Popln account?</div>
                    <button type="button" class="btn btn-red openSignInBox">Log In</button>
                </div>
            </div>
			</form>
	  </div>
    </div>
</div>
<!--User Signup Modal Box End-->


<!--User Sign In Model Start-->
<div id="signInModel" class="modal fade new-partner-model new-signup" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Partner</h4>
                <p>Sign In with <a href="<?= $userAuthUrl; ?>">Google</a></p>
            </div>
			<form name="signInForm" id="signInForm" method="post" action="<?= base_url('user/submit_login'); ?>">
            <div class="modal-body">
                <div class="signup-or-separator">
                    <span class="separator-text">or</span>
                    <hr>
                </div>
                <?php if ($message_notification = $this->session->flashdata('message_notification')) { ?>
                    <!-- Message Notification Start -->
                    <div id="message_notification">
                        <div class="alert alert-<?= $this->session->flashdata('class'); ?>">    
                            <button class="close" data-dismiss="alert" type="button">×</button>
                            <strong>
                                <?= $this->session->flashdata('message_notification'); ?> 
                            </strong>
                        </div>
                    </div>
                    <!-- Message Notification End -->
                <?php } ?>
                <div class="felid">
                    <input placeholder="Email Address" id="login_email" name="login_email" value="" class="textbox" type="text" />
                </div>
                <div class="felid">
                    <input placeholder="Password" value="" id="login_password" name="login_password" class="textbox" type="password" />
                </div>
				<div class="felid">
                    <a href="javascript:void(0);" class="pull-right openForgotPasswordBox" >Forgot Password ?</a>
                </div><br><br>
				<input type="submit" class="btn-red btn-block" name="login_submit" id="login_submit" value="Login">
                <div class="modal-footer clearfix">
                    <div class="pull-left">Don't have a Popln account?</div>
                    <button type="button" class="btn btn-red openSignUpBox">Sign Up</button>
                </div>
            </div>
			</form>
	   </div>
    </div>
</div>
<!--User Sign In Modal End-->


<!--Forgot Password Modal Box Start-->
<div id="forgotPasswordModel" class="modal fade new-partner-model new-signup" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Forgot Password</h4>
            </div>
			<form name="forgotPasswordForm" id="forgotPasswordForm" method="post" action="<?= base_url('user/forgot_password'); ?>">
            <div class="modal-body">
                <div class="felid">
                    <input placeholder="Email Address" id="forgot_email" name="forgot_email" value="" class="textbox" type="text" />
                </div>
                <input type="submit" class="btn-red btn-block" name="forgot_submit" id="forgot_submit" value="Forgot">
            </div>
			</form>
	   </div>
    </div>
</div>
<!--Forgot Password Modal Box End-->


<script type="text/javascript">    
function forceLower(strInput){
    strInput.value = strInput.value.toLowerCase();
}
$(document).ready(function(){
        <?php $message_notification = $this->session->flashdata('message_notification'); if (!empty($message_notification)) { ?>
            $('#signInModel').modal('show');
        <?php }?>
	$('#openBecomePartnerBox').click(function(){
		$('#signUpForm').data('validator').resetForm();
		$('#forgotPasswordModel').modal('hide');
		$('#signInModel').modal('hide');
		$('#becomePartner').modal('show');
	});
	
	$('.openSignUpBox').click(function(){
		$('#signUpForm').data('validator').resetForm();
		$('#forgotPasswordModel').modal('hide');
		$('#becomePartner').modal('hide');
		$('#signInModel').modal('hide');
		$('#signUpModel').modal('show');
	});
	
	$('.openSignInBox').click(function(){
		$('#signUpForm').data('validator').resetForm();
		$('#forgotPasswordModel').modal('hide');
		$('#becomePartner').modal('hide');
		$('#signUpModel').modal('hide');
		$('#signInModel').modal('show');
	});	
	$('.openForgotPasswordBox').click(function(){
		$('#signUpForm').data('validator').resetForm();
		$('#becomePartner').modal('hide');
		$('#signUpModel').modal('hide');
		$('#signInModel').modal('hide');
		$('#forgotPasswordModel').modal('show');
	});	
	
});
</script>
<script>
$(document).ready(function(e){
	$('#signUpForm').validate({
					rules: {
						reg_firstName :{ required:true},
						reg_lastName : { required:true},
						reg_email : { required:true,email:true,remote :  {
									  			url: "<?= base_url('user/check_exist_email'); ?>",
        										type: "post" 
											}},
						reg_password : { required:	true },
						reg_dobMonth : {required:true},
						reg_dobDay : {required:true},
						reg_dobYear : {required:true}
						},
					messages : {
						reg_firstName :{ required:"Please Enter First Name"},
						reg_lastName : { required:"Please Enter Last Name"},
						reg_email : { required:"Please Enter Email Address",email:"Please Enter Valid Email Address",remote:"This Email Address Is Already Exist, Please Use Another Email Address"},
						reg_password : { required:"Please Enter Password" },
						reg_dobMonth : {required:"Please Select Month"},
						reg_dobDay : {required:"Please Select Day"},
						reg_dobYear : {required:"Please Select Year"}
					}
				});	

	
	$('#signInForm').validate({
					rules: {
						login_email : { required:true,email:true},
						login_password : { required:	true },
					},
					messages : {
						login_email : { required:"Please Enter Email Address",email:"Please Enter Valid Email Address"},
						login_password : { required:"Please Enter Password" },
					}
				});
	$('#forgotPasswordForm').validate({
					rules: {
						forgot_email : { required:true,email:true}
					},
					messages : {
						forgot_email : { required:"Please Enter Email Address",email:"Please Enter Valid Email Address"}
					}
				});
});
</script>