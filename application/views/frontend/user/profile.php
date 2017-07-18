<?php if($message_notification = $this->session->flashdata('message_notification')) { ?>
    <!-- Message Notification Start -->
    <div id="message_notification">
    <div class="alert alert-<?= $this->session->flashdata('class'); ?>">    
            <button class="close" data-dismiss="alert" type="button">×</button>
            <center><strong><?= $this->session->flashdata('message_notification'); ?></strong></center>
    </div>
    </div>
    <!-- Message Notification End -->
<?php } ?>
<div id="message_notification">

</div>
<div class="loader" style="display:none;"></div>
<section class="middle-container account-section profile-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
                        <ul>
                            <li class="active"><a href="<?php echo base_url('user/profile')?>">Edit Profile</a></li>
                            <li><a href="<?php echo base_url('user/photo');?>">Photos</a></li>
                            <li><a href="<?php echo base_url('user/trust')?>">Trust and Verification</a></li>
                            <li><a href="<?php echo base_url('user/reviews')?>">Reviews</a></li>
                            <li><a href="<?php echo base_url('user/references')?>">References</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-default btn-block" href="<?php echo base_url('home/viewProfile')?>">View Profile</a>
                </aside>
				<form name="editBasicProfile" id="editBasicProfile" method="post" action="<?= base_url('user/submit_basic'); ?>">
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default required">
                            <div class="panel-heading">Required</div>
                            <div class="panel-body">
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">First Name</label>
                                        <div class="col-sm-9"><input onchange="autoSave(this.id,this.value)" name="firstName" id="firstName" class="textbox" type="text" value="<?= $userProfileInfo->firstName; ?>"/></div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Last Name</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" name="lastName" id="lastName" onchange="autoSave(this.id,this.value)" value="<?= $userProfileInfo->lastName; ?>" type="text" />
                                            <p>Your public profile only shows your first name. When you request a booking, Our partner will see your first and last name.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Gender <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9">
                                            <select class="selectbox" name="gender" id="gender" onchange="autoSave(this.id,this.value)">
                                                <option value="">Gender</option>
                                                <option value="Male" <?= ($userProfileInfo->gender=='Male')?'selected':''; ?>>Male</option>
                                                <option value="Female" <?= ($userProfileInfo->gender=='Female')?'selected':''; ?>>Female</option>
                                            </select>
											<p class="genderError"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Date of Birth <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9">
                                            <select class="selectbox" name="dobMonth" id="dobMonth" onchange="autoSave(this.id,this.value)">
                                                <?php $all_months = unserialize(MONTHS); 
												foreach($all_months as $k=>$v){ ?>
												<option value="<?= $k; ?>" <?= ($k==$userProfileInfo->dobMonth)?'selected':''; ?>><?= $v; ?></option>
												<?php } ?>
                                            </select>
                                             <select class="selectbox" name="dobDay" id="dobDay" onchange="autoSave(this.id,this.value)">
												<option value="">Day</option>
												<?php for($i=1;$i<=31;$i++) { ?>
												<option value="<?php echo $i; ?>" <?= ($userProfileInfo->dobDay==$i)?'selected':''; ?>><?php echo $i; ?></option>
												<?php } ?>
											</select>
                                            <select class="selectbox" name="dobYear" id="dobYear" onchange="autoSave(this.id,this.value)">
												<option value="">Year</option>
												<?php for($i=date('Y');$i>=(date('Y')-100);$i--) { ?>
												<option value="<?php echo $i; ?>" <?= ($userProfileInfo->dobYear==$i)?'selected':''; ?>><?php echo $i; ?></option>
												<?php } ?>
											</select>
											<p class="birthError"></p>
                                            <p>We use this data for analysis and never share it with other users.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Email Address <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9">
                                            <input class="textbox" type="text" readonly placeholder="abc@gmail.com" name="email" id="email" value="<?= $userProfileInfo->email; ?>" />
                                            <p>We won’t share your personal email address with other Pooln users.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Phone Number <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9 number-add">
                                            <input class="textbox" type="text" placeholder="(+1)123-456-789" name="phone" id="phone" onchange="autoSave(this.id,this.value)" value="<?= $userProfileInfo->phone; ?>" />
                                            <p>This is only shared once you have a confirmed booking with another <?= SITE_DISPNAME; ?> user. This is how we can all get in touch.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Preferred Language</label>
                                        <div class="col-sm-9">
                                            <select class="selectbox" name="language" id="language" onchange="autoSave(this.id,this.value)">
                                               <?php $all_languages = unserialize(LANGUAGES); 
											   foreach($all_languages as $k=>$v)
											   { ?>
												   <option value="<?= $k; ?>" <?= ($userProfileInfo->language==$k)?'selected':''; ?>><?= $v; ?></option>
											  <?php }
											   ?>
                                            </select>
											<p class="languageError"></p>
                                            <p>We'll send you messages in this language.</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Preferred Currency</label>
                                        <div class="col-sm-9">
                                            <select class="selectbox" name="currency" id="currency" onchange="autoSave(this.id,this.value)">
                                            <?php $all_currency = unserialize(CURRENCIES);
											foreach($all_currency as $k=>$v) { ?>
											<option value="<?= $v; ?>" <?= ($userProfileInfo->currency==$k)?'selected':''; ?>><?= $v; ?></option>
											<?php } ?>
											</select>
											<p class="currencyError"></p>
                                            <p>We’ll show you prices in this currency.</p>
                                        </div>
                                    </div>
                                </div>
								<div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Business Name</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" value="<?= $userProfileInfo->businessName; ?>" onchange="autoSave(this.id,this.value)" name="businessName" id="businessName" type="text" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default required optional">
                            <div class="panel-heading">Optional</div>
                            <div class="panel-body">
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Business Number</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" value="<?= $userProfileInfo->businessNumber ?>" onchange="autoSave(this.id,this.value)" name="businessNumber" id="businessNumber" type="text" placeholder="" />
                                        </div>
                                    </div>
                                </div>
								<div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Where You Live</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" value="<?= $userProfileInfo->address ?>" onchange="autoSave(this.id,this.value)" name="address" id="address" type="text" placeholder="" />
                                            <p>We won’t share your personal address with other <?= SITE_DISPNAME; ?> users.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Describe Yourself</label>
                                        <div class="col-sm-9 number-add">
                                            <textarea class="textarea" name="aboutYou" onchange="autoSave(this.id,this.value)" id="aboutYou"><?= $userProfileInfo->aboutYou; ?></textarea>
                                            <p>Help other people get to know you.</p>
                                            <p>Tell them what it’s like to have you as a renter or partner: What’s your style of doing business? how long have you been in the industry? What are your specialities?</p>
                                        </div>
                                    </div>
                                </div>
								<div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">School/Institution Attended</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" name="schoolInstitution" id="schoolInstitution" onchange="autoSave(this.id,this.value)" value="<?= $userProfileInfo->schoolInstitution; ?>" type="text" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">License/Certificate Received</label>
                                        <div class="col-sm-9">
                                            <input class="textbox" type="text" name="licenceCertificate" id="licenceCertificate" onchange="autoSave(this.id,this.value)" value="<?= $userProfileInfo->licenceCertificate; ?>" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Time Zone</label>
                                        <div class="col-sm-9">
                                            <select class="selectbox" name="timeZone" id="timeZone" onchange="autoSave(this.id,this.value)">
                                             <?php 
											 $all_timezone = unserialize(TIMEZONE);
											 foreach($all_timezone as $k=>$v) { ?>
												<option value="<?= $k; ?>" <?= ($userProfileInfo->timeZone==$k)?'selected':''; ?>><?= $v; ?></option>
											<?php } ?>
                                            </select>
                                            <p>Your home time zone.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Languages</label>
                                        <div class="col-sm-9 number-add">
                                        <select data-placeholder="Please Select Languages" name="languages[]" id="languages" onChange="getSelectedOptions(this)"  multiple class="selectbox chosen-select" tabindex="8">
										  <?php
												 $language_arr = explode(',',$userProfileInfo->languages);
											   foreach($all_languages as $k=>$v)
											   { ?>
												   <option value="<?= $k; ?>" <?= (in_array($k,$language_arr)==true and $language_arr[0]!='')?'selected':''; ?>><?= $v; ?></option>
											  <?php }
											   ?>
										</select>


                                            <p>Add any languages that others can use to speak with you on <?= SITE_DISPNAME; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Emergency contact <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9 number-add">
                                            <input class="textbox" name="emergencyContacts" id="emergencyContacts" onchange="autoSave(this.id,this.value)" value="<?= $userProfileInfo->emergencyContacts; ?>" type="text" placeholder="" />
                                            <p>Give our Customer Experience team a trusted contact we can alert in an urgent situation.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-input">
                                    <div class="row">
                                        <label class="align-right col-sm-3">Shipping Address <i class="fa fa-lock" aria-hidden="true"></i></label>
                                        <div class="col-sm-9 number-add">
                                            <textarea class="textarea" name="shippingAddress" id="shippingAddress" onchange="autoSave(this.id,this.value)"><?= $userProfileInfo->shippingAddress; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <button class="btn-red">Save</button>-->
                    </div>
                </article>
				</form>
		</div>
        </div>
    </div>
</section>

<script>
function getSelectedOptions(sel) {
   var opts = [],
    opt;
  var len = sel.options.length;
 // alert(len+1);
  for (var i = 0; i < len; i++) {
    opt = sel.options[i];

    if (opt.selected) {
      opts.push(opt.value);
     // alert(opt.value);
    }
  }
  autoSave('languages',opts);
}
function autoSave(fieldId,value)
	{	
		var field = fieldId;
		$.ajax({
							url: '<?= base_url('user/ajax_submit_basic'); ?>',
							type: 'POST',
							dataType: "json",
							data: {col:field,val:value},
							beforeSend: function(){
								$(".loader").show();
							},
							complete: function(){
								$('.loader').hide();
							},
							success: function(response) {
								if(response['class']=='<?= A_FAIL ?>')
								{
									$('#message_notification').html('<div class="alert alert-<?= A_FAIL; ?>"><button class="close" data-dismiss="alert" type="button">×</button><strong>'+response['message']+'</strong></div>');
									//alert(response['message']);
								}
								else{
									//$('#message_notification').html('<div class="alert alert-<?= A_SUC; ?>"><button class="close" data-dismiss="alert" type="button">×</button><strong>'+response['message']+'</strong></div>');
								}
							}          
						});
	}
$(document).ready(function(e){	

	
	
	$('.chosen-select').chosen();
	
	$('#editBasicProfile').validate({
					rules: {
						firstName :{ required:true},
						lastName : { required:true},
						gender : { required:	true },
						dobMonth : {required:true},
						dobDay : {required:true},
						dobYear : {required:true},
						phone : {required:true},
						language : {required:true},
						currency : {required:true},
						businessName : {required:true},
						//aboutYou : {required:true}
						},
					groups :{
						DateOfBirth : "dobMonth dobDay dobYear"
					},
					messages : {
						firstName :{ required:"Please Enter First Name"},
						lastName : { required:"Please Enter Last Name"},
						gender : { required:"Please Select Gender" },
						dobMonth : {required:"Please Select Month"},
						dobDay : {required:"Please Select Day"},
						dobYear : {required:"Please Select Year"},
						phone : {required:"Please Enter Your Phone Number"},
						language : {required:"Please Select Your Language"},
						currency : {required:"Please Select Your Currency"},
						businessName : {required:"Please Enter Your Business Name"}
						//aboutYou : {required:"Please Enter About You"}
					},
					 errorPlacement: function(error, element) {
						   if (element.attr("name") == "dobMonth" || element.attr("name") == "dobDay" || element.attr("name") == "dobYear") 
						   {
								error.appendTo(".birthError");
						   }
						   else if(element.attr("name") == "language")
						   {
							   error.appendTo('.languageError');
						   }
						   else if(element.attr('name')=='currency')
						   {
							   error.appendTo('.currencyError');
						   }
						   else if(element.attr('name')=='gender')
						   {
							   error.appendTo('.genderError');
						   }
						   else 
						   {
								error.insertAfter(element);
						   }
					   }
				});
});
	  
    </script>