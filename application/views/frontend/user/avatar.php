<?php if($message_notification = $this->session->flashdata('message_notification')) { ?>
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
<section class="middle-container account-section profile-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
											<ul>
													<li ><a href="<?php echo base_url('user/profile/')?>">Edit Profile</a></li>
													<li class="active"><a href="javascript:void(0);">Photos</a></li>
													<li><a href="<?php echo base_url('user/trust/')?>">Trust and Verification</a></li>
													<li><a href="<?php echo base_url('user/reviews/')?>">Reviews</a></li>
													<li><a href="<?php echo base_url('user/references/')?>">References</a></li>
											</ul>
                    </div>
                    <a class="btn btn-default btn-block" href="<?= base_url('user/profile/'); ?>">View Profile</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default profile-photo">
                            <div class="panel-heading">Profile Photo</div>
							<form name="avatarProfile" id="avatarProfile" method="post" action="<?= base_url('user/submit_avatar'); ?>" enctype="multipart/form-data">
								  <div class="panel-body">
										<div class="media">
										<div class="media-left">
												<?php 
												if($userProfileInfo->avatar=='')
												{
													$avatar = 'user_pic-225x225.png';
												}
												else
												{
													$avatar = $userProfileInfo->avatar;
												}
												?>
										
												<img class="media-object" id='userAvatar' src="<?php echo base_url('uploads/user/thumb/'.$avatar)?>" alt="<?= $userProfileInfo->firstName.'&nbsp;'.$userProfileInfo->lastName; ?>">
										</div>
										<div class="media-body">
											<p>Clear frontal face photos are an important way for Professionals and Partners to learn about each other. It’s not much fun to Partners a landscape! Please upload a photo that clearly shows your face.</p>
											 <input type="file" name='avatar' id="avatar"  onchange="readURL(this);">
										
										</div>
										<input type="hidden" name="oldAvatar" id="oldAvatar" value="<?= $userProfileInfo->avatar; ?>">
										<input type="submit" name="submit" id="submit" class="btn btn-red pull-right" value="Replace Photo">
									  </div>
								  </div>
								  
						  </form> 
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
 function readURL(input) {
		    if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#userAvatar')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
 $(document).ready(function(e) {
		$('#avatarProfile').validate({
					rules: {
						avatar	: 	{	
										<?php if($userProfileInfo->avatar==''){ ?>
										required: true,
										<?php } ?>
										accept	:	"jpg|png|jpeg|gif",
									}
						},
					messages : {
						avatar : { 
									<?php if($userProfileInfo->avatar==''){ ?>
									required: "Please Uplaod Your Avatar",
									<?php } ?>
									accept : "Allowed Image Types Are JPG, PNG, JPEG, GIF"
								 }
					}
				});		
    });
</script>