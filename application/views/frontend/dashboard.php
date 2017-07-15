<?php
	$this->load->view('frontend/include/user-header');
?>
<section class="middle-container">
    <div class="container">
        <div class="alert alert-info fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt=""></a>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="<?= base_url('theme/front/assests/img/doller-icon.png'); ?>" alt="">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Earn $5 rental credit</h4>
                    <p>Give your colleagues $5 off their first rental on Popln and you’ll get up to $20 rental credit.</p>
                    <a href="<?= site_url('invite'); ?>"><button class="btn2">Invite Colleagues</button></a>
                    <button class="btn btn-default" data-dismiss="alert" aria-label="close">Later</button>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-sm-3 left-sidebar">
                    <div class="profile">
                        <div class="pro-img" style="text-align: center;">
                            <?php
                                $avatar = ($userProfileInfo->avatar!='' && file_exists('uploads/user/thumb/' . $userProfileInfo->avatar))?$userProfileInfo->avatar:'user_pic-225x225.png';
                            ?>
                            <img src="<?= base_url('uploads/user/thumb/'.$avatar); ?>" alt="">
                        </div>
                        <div class="pro-content">
                            <h3><?= ucfirst($userProfileInfo->firstName); ?></h3>
                            <a href="<?= base_url('user/profile'); ?>">Edit Profile</a>
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Verified info</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><span class="pull-left">Personal info</span> <span class="pull-right"><img src="<?= base_url('theme/front/assests/img/right-singh.png'); ?>" alt=""></span></li>
                                    <li class="clearfix"><span class="pull-left">Email address</span> <span class="pull-right"><img src="<?= base_url('theme/front/assests/img/right-singh.png'); ?>" alt=""></span></li>
                                    <li class="clearfix"><span class="pull-left">Phone number</span> <span class="pull-right"><img src="<?= base_url('theme/front/assests/img/right-singh.png'); ?>" alt=""></span></li>
                                    <li class="clearfix"><span class="pull-left">Work email</span> <span class="pull-right"><img src="<?= base_url('theme/front/assests/img/right-singh.png'); ?>" alt=""></span></li>
                                    <li class="clearfix"><a href="<?= site_url('user/trust'); ?>">Verify more info</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Connected accounts</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><span class="pull-left">Google</span> <span class="pull-right"><img src="" alt=""></span></li>
                                    <li class="clearfix"><a href="<?= site_url('user/trust'); ?>">Verify more info</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Quick Links</div>
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Upcoming Rentals</a></li>
                                    <li><a href="<?= site_url('listing'); ?>">Listing on Popln</a></li>
                                    <li><a href="#">Renting on Popln</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <article class="col-sm-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default notification">
                            <div class="panel-heading">Notifications</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><a href="<?= site_url('spaces'); ?>"><?= ucfirst($userProfileInfo->firstName); ?>, new spaces have arrived! Book now before they run out.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
                                    <li class="clearfix"><a href="<?= site_url('spaces'); ?>">Book workspaces. led by experienced business owners. Now over, 51 to choose form.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
                                    <li class="clearfix"><a href="<?= site_url('invite'); ?>">Invite your friend to join Popln and you’ll get $10 after their first rental.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel panel-default notification messages">
                            <div class="panel-heading">Messages <?php if($userMessages['newCount']){ echo "({$userMessages['newCount']} New)"; }?></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed message-table">
                                        <tbody>
                                            <?php if(!empty($userMessages['messages'])):
                                                foreach($userMessages['messages'] as $messages):?>
                                            <tr>
                                                <td width="50"><center><img class="user-pic" src="<?= base_url('uploads/user/thumb/'.$messages['userInfo']['picture']); ?>" alt="" width="50" height="50"></center></td>
                                                <td width="100"><span class="dark-gery"><?= $messages['userInfo']['fname']; ?> <br/><?= date("d/m/Y",$messages['createdDate']); ?></span></td>
                                                <td width="500"><?php if(isset($messages['spaceInfo'])):?><?= $messages['spaceInfo']['title'].", ".$messages['spaceInfo']['country']; ?> <br/><?php endif;?><?= word_limiter(nl2br($messages['message']),20); ?></td>
                                                <?php if($messages['booking']): ?>
                                                <td width="100">
                                                    <h4>Accepted</h4>
                                                    <span class="price">&amp;40</span>
                                                </td>
                                                <?php endif;?>
                                            </tr>
                                            <?php endforeach;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if(!empty($userMessages['messages'])): ?>
                                <a class="link" href="<?= site_url('inbox'); ?>">All messages</a>
                                <?php else: ?>
                                <a class="link" href="<?= site_url('inbox'); ?>">No messages</a>
                                <?php endif;?>
                            </div>
                        </div>
												<!-- Display upload docuemnt file -->
                       <div class="panel panel-default profile-photo verified-info">
                            <div class="panel-heading">Documents</div>
                            <div class="panel-body">
                                <div class="row mr15">
                                    <div class="col-md-9">
                                            <?php
                                            if($userProfileInfo->licenceCopy!='')
                                            {
                                                $licenceLink = base_url('uploads/user/document/'.$userProfileInfo->licenceCopy);
                                            }
                                            else{
                                                $licenceLink = 'javascript:void(0);';
                                            }
                                            if($userProfileInfo->establishmentLicence!='')
                                            {
                                                $establishmentLicenceLink = base_url('uploads/user/document/'.$userProfileInfo->establishmentLicence);
                                            }
                                            else{
                                                $establishmentLicenceLink = 'javascript:void(0);';
                                            }
                                            if($userProfileInfo->liabilityInsurance!='')
                                            {
                                                $liabilityInsuranceLink = base_url('uploads/user/document/'.$userProfileInfo->liabilityInsurance);
                                            }
                                            else{
                                                $liabilityInsuranceLink = 'javascript:void(0);';
                                            }
                                            ?>
                                        <h4>License / Certificate Copy <small><?= ($userProfileInfo->licenceCopy!='')?'(Verified)':'<a href="'.base_url('user/trust').'">Click on the link upload license</a>'; ?></small></h4>
                                        Upload a copy of your license or certificate to avoid the hassle later.<p class="licenceCopyError"></p>
                                    </div>
                                    <div class="col-md-3 align-center">
                                     <?php
                                      if (!empty($userProfileInfo->licenceCopy)) {
                                        $licenceCopy  = explode(".",$userProfileInfo->licenceCopy);
                                            if ($licenceCopy[1] == 'pdf') { ?>
                                             <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                           <?php }else if ($licenceCopy[1] == 'doc' || $licenceCopy[1] == 'docx') { ?>
                                               <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-word-o" aria-hidden="true"></i></a>
                                          <?php  }else{ ?>
                                           <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $licenceLink; ?>" style="height:100px;" ></a>
                                         <?php   }
                                     }
                                       ?>
                                    </div>
                                </div>
                                <div class="row mr15">
                                    <div class="col-md-9">
                                        <h4>Establishment license <small><?= ($userProfileInfo->establishmentLicence!='')?'(Verified)':'<a href="'.base_url('user/trust').'">Click on the link upload license</a>'; ?></small></h4>
                                        If you are listing your space, verify ownership by providing us with your license<p class="establishmentLicenceError"></p>
                                    </div>
                                    <div class="col-md-3 align-center">
                                        <?php
                                          if (!empty($userProfileInfo->establishmentLicence)) {
                                         $establishmentLicence  = explode(".",$userProfileInfo->establishmentLicence);
                                            if ($establishmentLicence[1] == 'pdf') { ?>
                                             <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                           <?php }else if ($establishmentLicence[1] == 'doc' || $establishmentLicence[1] == 'docx') { ?>
                                               <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-word-o" aria-hidden="true"></i></a>
                                          <?php  }else{ ?>
                                           <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $establishmentLicenceLink; ?>" style="height:100px;" ></a>
                                         <?php   }
                                     }
                                       ?>
                                    </div>
                                </div>
                                <div class="row mr15">
                                    <div class="col-md-9">
                                        <h4>Liabilty insurance <small><?= ($userProfileInfo->liabilityInsurance!='')?'(Verified)':'<a href="'.base_url('user/trust').'">Click on the link upload insurance</a>'; ?></small></h4>
                                        Upload a copy of your liability insurance.<p class="liabilityInsuranceError"></p>
                                    </div>
                                    <div class="col-md-3 align-center">
                                       <?php
                                        if (!empty($userProfileInfo->liabilityInsurance)) {
                                          $liabilityInsurance  = explode(".",$userProfileInfo->liabilityInsurance);
                                            if ($liabilityInsurance[1] == 'pdf') { ?>
                                             <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                           <?php }else if ($liabilityInsurance[1] == 'doc' || $liabilityInsurance[1] == 'docx') { ?>
                                               <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-word-o" aria-hidden="true"></i></a>
                                          <?php  }else{ ?>
                                           <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $liabilityInsuranceLink; ?>" style="height:100px;" ></a>
                                         <?php   }
                                          }
                                       ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- close here -->
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php
	$this->load->view('frontend/include/user-footer');
?>
