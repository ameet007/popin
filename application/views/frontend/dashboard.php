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
                    <button class="btn2">Invite Colleagues</button>
                    <button class="btn btn-default">Later</button>
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
                            <h3><?= $userProfileInfo->firstName; ?></h3>
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
                                    <li class="clearfix"><a href="#"><?= $userProfileInfo->firstName; ?>, new spaces have arrived! Book now before they run out.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
                                    <li class="clearfix"><a href="#">Book workshops. led by experienced business owners. Now over, 51 to choose form.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
                                    <li class="clearfix"><a href="#">Invite your friend to join Popln and you’ll get $10 after their first rental.</a><span class="pull-right"><a href="#"><img src="<?= base_url('theme/front/assests/img/close-icon.png'); ?>" alt=""></a></span></li>
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
                        
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php
	$this->load->view('frontend/include/user-footer');
?>