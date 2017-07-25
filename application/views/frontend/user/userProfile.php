<style type="text/css">

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
                        <?php if(!empty($userProfileInfo->schoolInstitution)&&!empty($userProfileInfo->businessName)&&!empty($userProfileInfo->language)&&!empty($userProfileInfo->languages)): ?>
                        <?php $languagesList = unserialize(LANGUAGES); ?>
                        <div class="panel panel-default verified-info">
                            <div class="panel-heading">About me</div>
                            <div class="panel-body clearfix">
                                <ul>
                                    <?php if(!empty($userProfileInfo->schoolInstitution)): ?>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <strong>School/Institution</strong>
                                            <p><?= $userProfileInfo->schoolInstitution; ?></p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($userProfileInfo->businessName)): ?>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <strong>Business Name</strong>
                                            <p><?= $userProfileInfo->businessName; ?></p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($userProfileInfo->language)): ?>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <strong>Preferred Language</strong>
                                            <p><?php
                                            foreach ($languagesList as $k => $v) {
                                                if ($k == $userProfileInfo->language){
                                                    echo $v;
                                                }
                                            }
                                            ?></p>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($userProfileInfo->languages)): ?>
                                    <li class="clearfix">
                                        <div class="pull-left">
                                            <strong>Languages</strong>
                                             <p>
                                            <?php
                                            $language = explode(",",$userProfileInfo->languages);
                                            $count = 1;
                                                
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
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($spaceList)) { ?>
                    <div class="listin-g">
                        <h3>Listings <small>(<?= count($spaceList);?>)</small></h3>
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
                <article class="col-lg-9 main-right wish-lists profile-wish-lists">
                    <div class="pro-con">
                        <h2>Hey, I’m <?= $userProfileInfo->firstName.' '.$userProfileInfo->lastName; ?>!</h2>
                        <p><strong><?= strtoupper((!empty($userProfileInfo->countryResidence)?$userProfileInfo->countryResidence:'Us'));?> • Joined in <?= date('M,Y',$userProfileInfo->createdDate);?></strong></p>
                        <p><?= $userProfileInfo->aboutYou; ?></p>
                        <?php $reviewsList = getMultiRecord('space_ratings','reviewOnId',$userProfileInfo->id);?>
                        <ul class="superhost">
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15"><?= count($reviewsList); ?></span></div></span> Reviews</li>
                            <li><span><div id="undefined_count" class="badgePill_186vx4j" data-reactid="14"><span class="badgePillCount_e296pg" data-reactid="15"><?php echo count(getMultiRecord('join_account_master','provide_link_userID',$userProfileInfo->id)) ?></span></div></span> References</li>
                            <li><span><img src="<?php echo base_url('theme/front/img'); ?>/ver.png" alt="" /></span> Verified</li>
                        </ul>
                        <div class="wishlist-list">
                            <h2>Wish Lists <small>(<?= count($userWishLists); ?>)</small><?php if (!empty($checkProfile)) {?><a href="<?= site_url('wishlists');?>" class="view_all pull-right font12">View all &nbsp;»</a><?php }?></h2>
                            <ul class="clearfix">
                                <?php $wishCount = 1; foreach($userWishLists as $wishlists): if (!empty($checkProfile) && $wishCount == 4) break; ?>
                                <li<?php if(isset($wishlists['userLists'])){ ?> style="background-image: url(<?= $wishlists['userLists'][0]['image'];?>);"<?php }?>>
                                    <div class="content">
                                        <h4><?= $wishlists['name']; ?></h4>
                                        <?php if(isset($wishlists['userLists'])){ ?><a href="<?= site_url('wishlists/'.$wishlists['id']); ?>" class="
                                           btn2"><?= count($wishlists['userLists']);?> Listings</a><?php }?>
                                    </div>
                                </li>
                                <?php $wishCount++; endforeach; ?>
                            </ul>
                        </div>
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
                                        <a href="<?= site_url('home/viewProfile/'.$userList->id); ?>">
                                            <img style="width:58%;" src="<?php echo base_url('uploads/user/thumb/').(!empty($userList->avatar)?$userList->avatar:'user_pic-225x225.png');?>" class="media-object img-circle" />
                                            <p><?= $userList->firstName?></p>
                                        </a>                                        
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
                                        <a href="<?= site_url('home/viewProfile/'.$userList->id); ?>">
                                            <img style="width:58%;" src="<?php echo base_url('uploads/user/thumb/').(!empty($userList->avatar)?$userList->avatar:'user_pic-225x225.png');?>" class="media-object img-circle" />
                                            <p><?= $userList->firstName;?></p>
                                        </a>
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