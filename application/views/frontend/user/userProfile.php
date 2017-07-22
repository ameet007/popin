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
                        <img src="<?php echo base_url('uploads/user/').(!empty($userProfileInfo->avatar)?$userProfileInfo->avatar:'user_pic-225x225.png');?>" alt="" />
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default verified-info">
                            <div class="panel-heading">Verified info</div>
                            <div class="panel-body clearfix">
                                <ul>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p title="Verified info" >Government ID</p>
                                        </div>
                                        <div class="pull-right">
                                            <img title="Verified info" src="<?php echo base_url('theme/front/img'); ?>/right-singh.png" alt="" />
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p title="Verified info" >Email address</p>
                                        </div>
                                        <div class="pull-right">
                                            <img title="Verified info" src="<?php echo base_url('theme/front/img'); ?>/right-singh.png" alt="" />
                                            <!-- <span class="screen-reader-only">Verified</span> -->
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <p>Phone number</p>
                                        </div>
                                        <div class="pull-right">
                                            <img src="<?php echo base_url('theme/front/img'); ?>/right-singh.png" alt="" />
                                        </div>
                                    </li>
                                    <?php if (!empty($checkProfile)) {?>
                                    <li><a href="<?= base_url()?>user/profile">Learn more >></a></li>
                                    <?php } ?>
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
                                             <p>
                                            <?php
                                            $language = explode(",",$userProfileInfo->languages);
                                            $count = 1;
                                                $languagesList = unserialize(LANGUAGES);
                                                foreach ($languagesList as $k => $v) {
                                                    if (in_array($k, $language)){
                                                         echo $v;
                                                           if (count($language) != $count) {
                                                                echo ', ';
                                                                $count++;
                                                           }
                                                      }
                                                  }
                                             ?>
                                           </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($spaceList)) { ?>
                    <div class="listin-g">
                        <h3>Listings <span>(<?= count($spaceList);?>)</span></h3>
                        <?php
                         $count = 0;
                          foreach ($spaceList as $key => $space) {
                                if ($count == 3) {
                                    break;
                                }
                                $image = getSingleRecord('space_gallery','space',$space->id);
                            echo '<div class="box">
                                 <img src="'.base_url('uploads/user/gallery').'/'.(!empty($image->image)?$image->image:'').'" alt="" />
                                    <div class="text"><b>'.$space->spaceTitle.'<span>'.$space->establishmentName.'/'.$space->spaceName.'</spna></b></div>
                                 </div>';     
                                $count++;
                          }
                          if (!empty($checkProfile)) {
                        ?>
                        <a href="<?= base_url()?>listing" class="view_all">View all listings&nbsp;»</a>
                    </div><?php } } ?>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="pro-con">
                        <h2>Hey, I’m <?= $userProfileInfo->firstName.' '.$userProfileInfo->lastName; ?>!</h2>
                        <p><strong><?= ucfirst((!empty($userProfileInfo->countryResidence)?$userProfileInfo->countryResidence:'Us'));?> . Joined in <?= date('M,Y',$userProfileInfo->createdDate);?></strong></p>
                        <p><?= $userProfileInfo->aboutYou; ?></p>
                        <?php $reviewsList = getMultiRecord('space_ratings','reviewOnId',$userProfileInfo->id);?>
                        <ul class="superhost">
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15"><?= count($reviewsList)?></span></div></span> Reviews</li>
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15"><?php echo count(getMultiRecord('join_account_master','provide_link_userID',$userProfileInfo->id)) ?></span></div></span> References</li>
                            <li><span><img src="<?php echo base_url('theme/front/img'); ?>/ver.png" alt="" /></span> Verified</li>
                        </ul>
                    <?php if (!empty($reviewsList)) {
                        foreach ($reviewsList as $key => $value) {
                            $userList = getSingleRecord('user','id',$value['reviewerId']);
                         ?>
                         <?php if ($value['reviewBy'] == 'Professional') { ?>
                        <div class="review-sec">
                            <h3>Reviews <span>(<?= count($reviewsList)?>)</span></h3>
                            <h4>Reviews From Professional</h4>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img style="width:58%;" src="<?php echo base_url('uploads/user/thumb/').(!empty($userList->avatar)?$userList->avatar:'user_pic-225x225.png');?>" class="media-object img-circle" />
                                        <p><?= $userList->firstName.' '.$userList->lastName;?></p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p><?= $value['review'];?></p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>Review date • <?= date('M,Y',$value['createdDate']);?></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <?php } if ($value['reviewBy'] == 'Partner') { ?>
                        <div class="review-sec">
                            <h4>Reviews Form Partner</h4>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img style="width:58%;" src="<?php echo base_url('uploads/user/thumb/').(!empty($userList->avatar)?$userList->avatar:'user_pic-225x225.png');?>" class="media-object img-circle" />
                                       <p><?= $userList->firstName.' '.$userList->lastName;?></p>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p><?= $value['review'];?></p>
                                    <footer class="clearfix">
                                        <div class="pull-left">
                                            <span>Review date • <?= date('M,Y',$value['createdDate']);?></span>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    <?php } } } 
                          ?>
                       <!--  <div class="review-sec">
                            <h3>References <span>(2)</span></h3>
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="<?php echo base_url('theme/front/img'); ?>/avatar-pic.png" class="media-object img-circle" />
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
                        </div> -->
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>