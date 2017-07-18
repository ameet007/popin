<link href="<?php echo base_url('theme/front/userProfile/'); ?>css/nav.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('theme/front/userProfile/'); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('theme/front/userProfile/'); ?>css/main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('theme/front/userProfile/'); ?>js/html5.js"></script>
<link href="<?php echo base_url('theme/front/userProfile/'); ?>css/media.css" rel="stylesheet" type="text/css" />
<style type="text/css">
                    .badgePill_186vx4j {
    border-radius: 6px !important;
    color: #ffffff !important;
    font-weight: bold !important;
    font-size: 18px !important;
    display: inline-block !important;
    padding: 6px 9px !important;
    min-width: 28px !important;
    position: relative !important;
    overflow: hidden !important;
    vertical-align: middle !important;
    background: -webkit-linear-gradient(140deg, #ffc333 55%, #FFB400 55%, #FFB400 100%) !important;
    background: -moz-linear-gradient(140deg, #ffc333 55%, #FFB400 55%, #FFB400 100%) !important;
    background: linear-gradient(140deg, #ffc333 55%, #FFB400 55%, #FFB400 100%) !important;
    line-height: 1.1 !important;
    text-rendering: optimizelegibility !important;
    text-align: center !important;
}
.user-sh .pro-con span {
    margin-bottom: 2px;
    margin-top: 2px;
}
</style>
<section class="middle-container account-section profile-section user-sh">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="profile-pic">
                        <img src="<?php echo base_url('uploads/user/thumb/').(!empty($userProfileInfo->avatar)?$userProfileInfo->avatar:'user_pic-225x225.png');?>" alt="" />
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default verified-info">
                            <div class="panel-heading">Verified info</div>
                            <div class="panel-body clearfix">
                                <ul>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p>Government ID</p>
                                        </div>
                                        <div class="pull-right">
                                            <img src="<?php echo base_url('theme/front/profile'); ?>/right-singh.png" alt="" />
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p>Email address</p>
                                        </div>
                                        <div class="pull-right">
                                            <img src="<?php echo base_url('theme/front/profile'); ?>/right-singh.png" alt="" />
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p>Phone number</p>
                                        </div>
                                        <div class="pull-right">
                                            <img src="<?php echo base_url('theme/front/profile'); ?>/right-singh.png" alt="" />
                                        </div>
                                    </li>
                                    <li><a href="#">Learn more >></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default verified-info">
                            <div class="panel-heading">About me</div>
                            <div class="panel-body clearfix">
                                <ul>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <strong>Languages</strong>
                                            <?php
                                            //language = explode(",",$userProfileInfo->languages);
                                               //print_r($language);
                                                  // $languagesList = unserialize(LANGUAGES);
                                                  // foreach ($languagesList as $k => $v) {

                                                  // }
                                                  // print_r($languagesList);
                                                  // $result = array_diff($language,$languagesList);
                                                  // print_r($result);
                                             ?>
                                            <p>Dutesch, English, Italiano</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="listin-g">
                        <h3>Listings <span>(3)</span></h3>
                        <div class="box">
                            <img src="<?php echo base_url('theme/front/profile'); ?>/image8.jpg" alt="" />
                            <div class="text">I stte coni - Trullo Lavanda <span>Ostuni</spna></div>
                        </div>
                        <div class="box">
                            <img src="<?php echo base_url('theme/front/profile'); ?>/image8.jpg" alt="" />
                            <div class="text">I stte coni - Trullo Lavanda <span>Ostuni</spna></div>
                        </div>
                        <div class="box">
                            <img src="<?php echo base_url('theme/front/profile'); ?>/image8.jpg" alt="" />
                            <div class="text">I stte coni - Trullo Lavanda <span>Ostuni</spna></div>
                        </div>
                    </div>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="pro-con">
                        <h2>Hey, I’m <?= $userProfileInfo->firstName.' '.$userProfileInfo->lastName; ?>!</h2>
                        <p><strong>Us . Joined in <?= date('M,Y',$userProfileInfo->createdDate);?></strong></p>
                        <div class="report">
                            <span><img src="<?php echo base_url('theme/front/profile'); ?>/popin-flag.png" alt="" /> Report this user</span>
                        </div>
                        <p><?= $userProfileInfo->aboutYou; ?>.</p>
                        <ul class="superhost">
                            <li><span><img src="<?php echo base_url('theme/front/profile'); ?>/superhost.png" alt="" /></span> Superhost</li>
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15">132</span></div></span> Reviews</li>
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15">2</span></div></span> References</li>
                            <li><span><img src="<?php echo base_url('theme/front/profile'); ?>/ver.png" alt="" /></span> Verified</li>
                        </ul>
                        <div class="review-sec">
                            <h3>Reviews <span>(132)</span></h3>
                            <h4>Reviews From Guests</h4>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="pull-right">
                                            <span><i class="fa fa-home" aria-hidden="true"></i> <a href="#">I Sette Coni - Trullo Edera</a></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="pull-right">
                                            <span><i class="fa fa-home" aria-hidden="true"></i> <a href="#">I Sette Coni - Trullo Edera</a></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="pull-right">
                                            <span><i class="fa fa-home" aria-hidden="true"></i> <a href="#">I Sette Coni - Trullo Edera</a></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="pull-right">
                                            <span><i class="fa fa-home" aria-hidden="true"></i> <a href="#">I Sette Coni - Trullo Edera</a></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="pull-right">
                                            <span><i class="fa fa-home" aria-hidden="true"></i> <a href="#">I Sette Coni - Trullo Edera</a></span>
                                        </div>
                                    </footer>
                                    <a class="see-more" href="#">See more</a>
                                </div>
                            </div>
                        </div>
                        <div class="review-sec">
                            <h4>Reviews Form Hosts</h4>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>From Mumbai, India • June 2016 • <i class="fa fa-flag-o" aria-hidden="true"></i></span>
                                        </div>
                                    </footer>
                                    <a class="see-more" href="#">See more</a>
                                </div>
                            </div>
                        </div>
                        <div class="review-sec">
                            <h3>References <span>(2)</span></h3>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <p>June 2012</p>
                                        <div class="align-right">
                                            <p>Anna is a Friend</p>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/profile'); ?>/avatar-pic.png" class="media-object img-circle" />
                                        <p>Nishi</p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <footer class="clearfix">
                                        <p>June 2012</p>
                                        <div class="align-right">
                                            <p>Anna is a Friend</p>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>