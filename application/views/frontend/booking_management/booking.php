<?php
if(!empty($hostProfileInfo->avatar)){
    $profile_photo = base_url('uploads/user/'.$hostProfileInfo->avatar);
}else{
    $profile_photo = base_url('uploads/user/user_pic-225x225.png');
}
if(!empty($userProfileInfo->avatar)){
    $user_profile_photo = base_url('uploads/user/'.$userProfileInfo->avatar);
}else{
    $user_profile_photo = base_url('uploads/user/user_pic-225x225.png');
}
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog host-popup">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact host</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="left-sidebar pull-left">
                    <div class="profile-pic">
                        <img src="<?= $profile_photo; ?>" alt="" />
                        <h4><?= $hostProfileInfo->firstName;?></h4>
                    </div>
                    <div class="make-sure">
                        <p>Make sure you share the following:</p>
                        <ul>
                            <li>Tell <?= $hostProfileInfo->firstName;?> a little about yourself</li> 
                            <li>What brings you to <?= $preview['spaceTitle']; ?>? Who’s joining you?</li> 
                            <li>What do you love about this listing? Mention it!</li>
                        </ul>
                    </div>
                </div>
                <div class="host-popup-content pull-left">
                    <div class="alert alert-info">
                        <img src="<?= base_url('theme/front/assests/img/alert-icon.png'); ?>" alt="" /><strong>Please specify check in and check out dates</strong>
                    </div>
                    <div class="host-from">
                        <h4>When are you traveling?</h4>
                        <form id="contact-form" method="post" action="<?php echo site_url("home/send_message_submit"); ?>">
                            <input type="hidden" name="host" value="<?= $hostProfileInfo->id; ?>">
                            <input type="hidden" name="space" value="<?= $space_id; ?>">
                            <div class="feild"> 
                                <ul class="clearfix">
                                    <li>
                                        <label>Check In</label>
                                        <input id="startDate2" class="textbox" type="text" name="checkIn" placeholder="Check In" readonly="" />
                                    </li>
                                    <li>
                                        <label>Check Out</label>
                                        <input id="endDate2" class="textbox" type="text" name="checkOut" placeholder="Check Out" readonly="" disabled="" />
                                    </li>
                                </ul>
                            </div>
                            <div class="feild"> 
                                <select class="selectbox" name="professionals">
                                    <?php for($i=1; $i<=$preview['professionalCapacity'];$i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?> professionals</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="feild">
                                <textarea class="textarea" name="message" placeholder="Start your message..."></textarea>
                            </div>
                            <div class="sender clearfix">
                                <div class="pull-left">
                                    <img src="<?= $user_profile_photo; ?>" alt="" />
                                </div>
                                <div class="pull-right">
                                    <button class="btn-red" type="submit">Send Message</button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($preview['gallery']) && !empty($preview['gallery'])){
    $preview_photo = base_url('uploads/user/gallery/').$preview['gallery'][0];
}else{
    $preview_photo = base_url('theme/front/assests/img/preview-no-photo.png');
}
?>
<?php $all_countries = unserialize(ALL_COUNTRY); ?>
<div class="modal fade" id="wishListModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content list-progress">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Save to Wish List</h4>
            </div>
            <div class="modal-body row">                
                <div class="col-lg-offset-1 col-lg-9 host-from">
                    <div class="alert alert-info" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Please enter your wish list name below</strong>
                    </div>
                    <form id="wishlist-form" method="post" action="<?php echo site_url("dashboard/create_wishlist"); ?>" novalidate autocomplete="off"<?php if(!empty($wishlistMaster)){ echo " style='display:none;'";}?>>
                        <input type="hidden" name="space" value="<?= $space_id; ?>">
                        <div class="form-group">
                            <label for="wishlist_name">Name</label>
                            <input class="textbox" id="wishlist_name" name="name" placeholder="Name your Wish List" required>
                            <input class="textbox" name="privacy" type="hidden" value="everyone">
                        </div>
                        <div class="sender clearfix">
                            <div class="pull-right">
                                <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn2" type="submit">Create</button>
                            </div> 
                        </div>
                    </form>
                    <ul class="wishlists"<?php if(!empty($wishlistMaster)){ echo " style='display:block;'";}?>>
                        <li>
                            <span><a href="#" id="create-wishlist-btn">Create New Wish List</a></span>
                        </li>
                        <?php $added= FALSE; if(!empty($wishlistMaster)): foreach($wishlistMaster as $wishlist):  $class=""; ?>
                        <?php if(isset($wishlist['userLists']) && !empty($wishlist['userLists'])){ foreach($wishlist['userLists'] as $userWishlist){
                            if($userWishlist['space_id'] == $space_id){
                                $class = "red";
                                $added = TRUE;
                            }
                        }} ?>
                        <li class="add-to-wishlist" data-space-id="<?= $space_id; ?>" data-wishlist-id="<?= $wishlist['id']; ?>"><span><?= $wishlist['name']; ?></span><span class="pull-right"><i class="fa fa-heart <?= isset($class)?$class:'';?>"></i></span></li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="modal-footer main-right">
                <div class="media">
                    <div class="media-left">
                        <div class="inner">
                            <img src="<?= $preview_photo;?>" alt="" />
                        </div>
                    </div>
                    <div class="media-body media-middle">
                        <h4><?= $preview['spaceTitle']; ?></h4>
                        <p><?= $preview['spaceType']; ?> in <?= $preview['city'].', '.$preview['state'].', '.$all_countries[$preview['country']]; ?></p>
                        <div class="review">
                            <span><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>" alt=""></span>
                            <span><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>" alt=""></span>
                            <span><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>" alt=""></span>
                            <span>20 reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="black_overlay"><a onclick="close_gallery()" href="#"><img src="<?php echo base_url('theme/front/assests/')?>img/big-close-icon.png" alt=""/></a></div>

<div class="banner-partner" style="background-image:url(<?php echo $preview_photo; ?>);">
    <div class="container">
        <div class="row">           
            <img class="preview-banner" src="<?php echo $preview_photo; ?>" alt="preview photo" />
        </div>
        <?php if(isset($preview['gallery']) && !empty($preview['gallery']) && count($preview['gallery']) > 1){ ?>
        <div class="view-photo">
            <a onclick="gallery()" class="btn btn-default" href="javascript:;">View Photos</a>
        </div>
        <?php } ?>
    </div>
    <div class="galleria" style="display:none;">
<!--        <a href="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/800px-Biandintz_eta_zaldiak_-_modified2.jpg">
            <img 
                src="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/100px-Biandintz_eta_zaldiak_-_modified2.jpg",
                data-big="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/1280px-Biandintz_eta_zaldiak_-_modified2.jpg"
                data-title="Biandintz eta zaldiak"
                data-description="Horses on Bianditz mountain, in Navarre, Spain."
            >
        </a>-->
        <?php if(isset($preview['gallery']) && !empty($preview['gallery'])){ foreach($preview['gallery'] as $gallery){ ?>
        <a href="<?php echo base_url('uploads/user/gallery/').$gallery; ?>">
            <img 
                src="<?php echo base_url('uploads/user/gallery/').$gallery; ?>"
                data-big="<?php echo base_url('uploads/user/gallery/').$gallery; ?>"
                data-title=""
                data-description=""
            >
        </a>
        <?php }} ?>
    </div>
</div>
<section class="middle-container new-partner43">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8 left-side">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
                    <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
                    <li><a data-toggle="tab" href="#menu2">The Host</a></li>
                    <li><a data-toggle="tab" href="#menu3">Location</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="media">
                            <div class="media-left">                             
                                <a href="<?php echo base_url('home/viewProfile/'.$hostProfileInfo->id)?>" target="_balank" ><img src="<?php echo $profile_photo; ?>" width="90px" class="media-object" alt="avatar"/></a>
                                <p><?= $hostProfileInfo->firstName;?></p>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $preview['spaceTitle']; ?></h4>
                                
                                <p><?= $preview['city'].', '.$preview['state'].', '.$all_countries[$preview['country']]; ?></p>
                                <ul class="clearfix">
                                    <li>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/icon2.png" alt="" /></span>
                                        <p><?= $preview['establishmentType']; ?></p>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/icon3.png" alt="" /></span>
                                        <p><?php echo ($preview['professionalCapacity'] > 1) ? plural($preview['professionalCapacity'].' professionals'):singular($preview['professionalCapacity'].' professionals'); ?></p>
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/icon4.png" alt="" /></span>
                                        <p><?php echo ($preview['workSpaceCount'] > 1) ? plural($preview['workSpaceCount'].' workspaces'):singular($preview['workSpaceCount'].' workspaces'); ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="about-this">
                            <h3>About this listing</h3>
<!--                            <p>My place is close to civil center, Disneyland. You’ll love my place because of. <br />My place is good for couples.</p>-->
                            <p><?= $preview['spaceDescription']; ?></p>
                            <?php if($this->session->userdata('user_id')!= NULL){ ?>
                            <a data-toggle="modal" data-target="#myModal" href="#">Contact host</a>
                            <?php }else{ ?>
                            <a href="javascript:void(0);" class="openSignInBox">Contact host</a>
                            <?php } ?>
                        </div>
                        <?php $checkInOut = unserialize(TIMES); ?>
                        <div class="the-space">
                            <ul class="accomm clearfix">
                                <li>The space</li>
                                <li>
                                    <p>Accommodates: <strong><?= $preview['professionalCapacity']; ?></strong></p>
                                    <p>Workspaces: <strong><?= $preview['workSpaceCount']; ?></strong></p>
                                    <p>Bathrooms: <strong><?= $preview['bathrooms']; ?></strong></p>
                                    <p>Bathroom type: <strong><?= (strtolower($preview['bathroomADACompliant']) == "yes")?"ADA Compliant":"Not ADA Compliant"; ?></strong></p>
                                    <a href="javascript:;" onclick="scrollToDiv('#house-rules');">House Rules</a>
                                </li>
                                <li>
                                    <p>Check In: <strong><?php $day = strtolower(date("D")); echo $checkInOut[$preview["{$day}From"]] . ' - ' . $checkInOut[$preview["{$day}To"]]; ?></strong></p>
                                    <p>Establishment type: <strong><?= $preview['establishmentType']; ?></strong></p>
                                    <p>Space type: <strong><?= $preview['spaceType']; ?></strong></p>
                                </li>
                            </ul>
                        </div>
                        <?php $facilities = unserialize(SPACES); ?>
                        <div class="the-space">
                            <ul class="accomm amenities clearfix">
                                <li>Amenities</li>
                                <li>
                                    <?php if(!empty($preview['amenities']['main'])){
                                    foreach($amenities['Important'] as $aminity){ 
                                        if(!empty($preview['amenities']['main']) && in_array($aminity['id'], $preview['amenities']['main'])){ 
                                            $aminity_value = "<strong>".$aminity['name']."</strong>";
                                        }else{
                                            $aminity_value = "<strike>".$aminity['name']."</strike>";
                                        }
                                    ?>
                                    <p><?= $aminity_value; ?></p>
                                    <?php }?>
                                    <?php
                                    foreach($amenities['General'] as $aminity){ 
                                        if(!empty($preview['amenities']['main']) && in_array($aminity['id'], $preview['amenities']['main'])){ 
                                            $aminity_value = "<strong>".$aminity['name']."</strong>";
                                        }else{
                                            $aminity_value = "<strike>".$aminity['name']."</strike>";
                                        }
                                    ?>
                                    <p class="amenity hidden"><?= $aminity_value; ?></p>
                                    <?php }?>
                                    <?php
                                    if(!empty($preview['amenities']['other'])){
                                    foreach($preview['amenities']['other'] as $aminity){ 
                                        $aminity_value = "<strong>".$aminity."</strong>";
                                    ?>
                                    <p class="amenity hidden"><?= $aminity_value; ?></p>
                                    <?php }}?>
                                    <a href="#" class="show-more" data-target-key="amenity">+ More</a>
                                    <?php }?>
                                </li>
                                <li>
                                    <?php 
                                    if(!empty($preview['facility'])){
                                        $count = 0;
                                    foreach($facilities as $facility => $values){ 
                                        if(in_array($facility, $preview['facility'])){ 
                                            $facility_value = "<strong>".$facility."</strong>";
                                        }else{
                                            $facility_value = "<strike>".$facility."</strike>";
                                        }
                                    ?>
                                    <p <?php if($count > 4){ echo "class='amenity hidden'";}?>><?php if(!empty($values['icon']) && in_array($facility, $preview['amenities'])){ ?><span><img src="<?php echo base_url('theme/front/assests/img/'.$values['icon'])?>" alt="" /></span><?php } ?><?= $facility_value; ?></p>
                                    <?php $count++;}}?>
                                </li>
                            </ul>
                        </div>
                        <div class="the-space">
                            <ul class="accomm clearfix">
                                <li>Prices</li>
                                <li>
                                    <p>Daily Discount: <strong><?= $preview['daily_discount']; ?>%</strong></p>
                                    <p>Cancellation: <a href="#">Flexible</a></p>
                                </li>
                                <li>
                                    <p>Weekly Discount: <strong><?= $preview['weekly_discount']; ?>%</strong></p>
                                </li>
                            </ul>
                        </div>
                        <div class="the-space">
                            <ul class="accomm clearfix">
                                <li>Workspace Description</li>
                                <?php
                                if(isset($preview['workSpaceDetail'])){
                                    $workSpaceDetail = json_decode($preview['workSpaceDetail'], TRUE);
                                    for($i = 1; $i<=count($workSpaceDetail); $i++){
                                ?>
                                <li>
                                    <?php if(isset($workSpaceDetail["ws{$i}"])){ ?>
                                    <p><strong>Workspace <?= $i; ?></strong></p>
                                    <p>
                                        <?php
                                            foreach($space_types as $v){
                                                if(isset($workSpaceDetail["ws{$i}"]["sp"]) && $workSpaceDetail["ws{$i}"]["sp"] == $v['id']){
                                                    echo $v['name'];
                                                }
                                            }
                                        ?>
                                    </p>
                                    
                                    <?php
                                        if(isset($workSpaceDetail["ws{$i}"]["cm"])){
                                            echo "<p>In Common Space</p>";
                                        }
                                    ?>
                                    
                                    <?php }?>
                                </li>
                                <?php }}?>
                            </ul>
                        </div>
                        <div class="the-space" id="house-rules">
                            <ul class="accomm decription may-not clearfix">
                                <li>House Rules</li>
                                <li>
                                    <?php if(isset($preview['ageRequirements']) && $preview['ageRequirements'] == "No"){ ?>
                                        <p>No age requirement for professionals</p>
                                    <?php }elseif(isset($preview['ageLimit']) && !empty($preview['ageLimit'])){ ?>
                                        <p>Minimum age requirement for professionals is <?= $preview['ageLimit']; ?></p>
                                    <?php } ?>

                                    <?php if(isset($preview['displayLicence']) && $preview['displayLicence'] == "Yes"){ ?>
                                        <p>Display License or Certificate in workspace</p>
                                    <?php }else{ ?>
                                        <p>Don't display License or Certificate in workspace</p>
                                    <?php } ?>

                                    <?php if(isset($preview['suitablePets']) && $preview['suitablePets'] == "Yes"){ ?>
                                        <p>Suitable for pets</p>
                                    <?php }else{ ?>
                                        <p>Not suitable for pets</p>
                                    <?php } ?>

                                    <?php if(isset($preview['additionalRules']) && !empty($preview['additionalRules'])){ ?> 
                                        <p><img src="<?= base_url('theme/front/assests/img/heading_base.jpg'); ?>" alt="" /></p>
                                    <?php foreach($preview['additionalRules'] as $addtionalRule){ ?>
                                        <p>- <?= $addtionalRule; ?></p>
                                    <?php }} ?>
                                </li>
                            </ul>
                        </div>
                        <div class="the-space">
                            <ul class="accomm clearfix">
                                <li>Availability</li>
                                <li>
                                    <p><strong><?= $preview['minStay']; ?> <?= $preview['minStayType']; ?></strong> minimum stay</p>
                                </li>
                                <li>
                                    <a href="javascript:;" onclick="scrollToDiv('.right-side');">View calendar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="the-space">
                            <ul class="accomm decription clearfix">
                                <li>Guidebook</li>
                                <li>
                                    <a href="#">Things to do in Los Angeles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade"> 
                        <h3>This place would love your review</h3>
                        <p>When you book this place, here’s where your review will show up!</p><br>
                        <p><?= createHTMLRating($space_id).'  '.totalReivewsGet($space_id);?> Reviews </p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Your Host</h3>
                        <div class="media">
                            <div class="media-left">
                                <img src="<?php echo $profile_photo; ?>" width="90px" class="media-object" />
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $hostProfileInfo->firstName.' '.$hostProfileInfo->lastName; ?></h4>
                                <p><?= $hostProfileInfo->countryResidence;?> - Joined in <?= date('F Y', $hostProfileInfo->createdDate)?></p>
                                <?php if($this->session->userdata('user_id')!= NULL){ ?>
                                <a data-toggle="modal" data-target="#myModal" class="btn-red" href="#">Contact host</a>
                                <?php }else{ ?>
                                <a class="btn-red openSignInBox" href="javascript:void(0);">Contact host</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div id="display_map" style="width:100%;height:350px;"></div> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 right-side">
                <div class="per-night clearfix">
                    <div class="pull-left">
                        <h3><?= getCurrency_symbol($preview['currency']).$preview['base_price']; ?></h3>  
                    </div>
                    <div class="pull-right">
                        <p>Per hour</p>
                    </div>
                </div>
                <div class="content clearfix mr20">
                    <form id="booking-form" method="post" action="<?= site_url('home/request-to-book'); ?>">
                        <input type="hidden" name="space" value="<?= $space_id; ?>">
                        <div class="feild clearfix">
                            <div class="col-sm-6">
                                <label for="startDate">Check In</label>
                                <input id="startDate" class="textbox" name="checkIn" type="text" placeholder="dd-mm-yyyy" readonly="" />
                            </div>
                            <div class="col-sm-6">
                                <label for="endDate">Check Out</label>
                                <input id="endDate" class="textbox" name="checkOut" type="text" placeholder="dd-mm-yyyy" readonly="" disabled="" />
                            </div>
                        </div>
                        <div class="feild clearfix">
                            <div class="col-xs-12">
                                <label>Professionals</label>
                                <select class="selectbox" name="professionals">
                                    <?php for($i=1; $i<=$preview['professionalCapacity'];$i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?> professionals</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="feild clearfix bookingInfo hidden">
                            <div class="col-xs-12">
                                <table class="table" style="margin-bottom: 0px;">
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <?php if($this->session->userdata('user_id')!= NULL){ ?>
                            <button type="submit" class="btn-red wide">Request to Book</button>
                            <?php }else{ ?>
                            <a href="javascript:void(0);" class="btn-red openSignInBox">Request to Book</a>
                            <?php } ?>
                            
                            <p>You won’t be charged yet</p>
                        </div>
                    </form>
                </div>
                <?php if($this->session->userdata('user_id')!= NULL){ ?>
                <div class="content clearfix wishlist-section">
                    <div class="col-xs-12">
                        <button class="btn btn-default wide" data-toggle="modal" data-target="#wishListModal"><i class="fa <?= $added?'fa-heart red':'fa-heart-o';?>"></i>&nbsp;<?= $added?'Saved':'Save';?> to Wish List</button>

                        <p></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="listing">
                <div class="col-xs-12">
                    <h3>Similar Listings</h3>
                </div>
                <div class="col-md-4 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url('theme/front/assests/')?>img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p>Private room - 1 bed 2guests</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url('theme/front/assests/')?>img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
if(isset($preview['latitude']) && isset($preview['longitude']) && !empty($preview['latitude']) && !empty($preview['longitude'])){
    $editMode = TRUE;
}else{
    $editMode = FALSE;
}
?>
<script src="<?php echo base_url('theme/front/assests/')?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/')?>js/galleria-1.5.7.js" type="text/javascript"></script>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDx2JMX91vY411oEI6jv4T34fpWeUdBRAI" type="text/javascript"></script>
<script type="text/javascript">
    //$('[data-toggle="tooltip"]').tooltip('show');
    // Load the Fullscreen theme
    Galleria.loadTheme('<?php echo base_url('theme/front/assests/')?>fullscreen/galleria.fullscreen.js');
    var check = 0;
    function gallery() {
        if(check == 0){
            Galleria.run('.galleria');
            $('#black_overlay').show();
            check = 1;
        }
        else{
            Galleria.ready(function() {
            this.enterFullscreen();
            $('#black_overlay').show();
        });
        }
    };
    
    function close_gallery(){
        Galleria.ready(function() {
            this.exitFullscreen();
            $('#black_overlay').hide();
        });
    }
    $(document).on('click', 'a.show-more', function(e){
        e.preventDefault();
        var $this = $(this), target = $(this).attr("data-target-key");

        //$("."+target).toggle();
        $( "."+target ).toggleClass(function() {
            if ( $( this ).is( ".hidden" ) ) {
                console.log('shown');
                $this.html('- Less');
                return "hidden";
            } else {
                console.log('hidden');
                $this.html('+ More');
                return "hidden";
            }

        });
    });
    var map_shown = false;
    $('.nav-tabs a').click(function(){
        $(this).tab('show');
        if($(this).attr('href') == "#menu3" && map_shown == false){
            map_shown = true;
            //init_map();
            <?php if($editMode){ ?> load_map(); <?php }?>
        }        
    });

    <?php
    $unavailable_dates = $available_dates = array();
    if(isset($preview['calendar']['available_dates']) && !empty($preview['calendar']['available_dates'])){
        $available_dates = $preview['calendar']['available_dates'];
    }
    if(isset($preview['calendar']['unavailable_dates']) && !empty($preview['calendar']['unavailable_dates'])){
        $unavailable_dates = $preview['calendar']['unavailable_dates'];
    }    
    ?>
    var availableDates = [],unavailableDates = [];
    <?php if(isset($available_dates) && !empty($available_dates)){ ?>
        availableDates = <?= json_encode($available_dates); ?>;
    <?php }?>
    $(document).ready(function(){
        $( "#startDate, #startDate2" ).datepicker({
            //title: "Check In Date",
            orientation: "bottom",
            autoclose: true,
            format: 'dd-mm-yyyy',
            weekStart: 1,
            beforeShowDay: function (date){
                var dmy = date.getDate().padLeft() + "-" + (date.getMonth()+1).padLeft() + "-" + date.getFullYear();

                //console.log(dmy+' : '+($.inArray(dmy, availableDates)));
                //console.log(unavailableDates);
                if ($.inArray(dmy, availableDates) !== -1) {
                    return {
                        enabled: true,
                        tooltip: 'Available'
                    };
                } else{
                    return {
                        enabled: false,
                        tooltip: 'Unavailable'
                    };
                    //unavailableDates.push(dmy);
                }
            }
        }) .on('change.dp', function (e) {
            dateChanged(e);
            //console.log($(e.target).attr('id'));
        });
        //console.log(unavailableDates);
        $('#startDate, #startDate2').datepicker('setDatesDisabled', unavailableDates);
        $('#startDate, #startDate2').datepicker('setStartDate', '<?= isset($available_dates)?get_start_date_by_currentdate($available_dates,$unavailable_dates):null; ?>');
        $('#startDate, #startDate2').datepicker('setEndDate', '<?= isset($available_dates)?get_end_date_by_currentdate($available_dates,$unavailable_dates):null; ?>');
    });
    function dateChanged(event) {
        var start_date = $('#'+$(event.target).attr('id')).val();

        $("#endDate,#endDate2").datepicker("destroy");
        $('#endDate,#endDate2').prop('disabled', false);

        var startDate = new Date(start_date.substring(6, 10), start_date.substring(3, 5)-1, start_date.substring(0, 2));
        var endDate = new Date(start_date.substring(6, 10), start_date.substring(3, 5)-1, start_date.substring(0, 2));
        <?php if(!empty($preview['minStay']) && !empty($preview['maxStay'])){?>
        var minNumberOfDaysToAdd = <?= $preview['minStay']; ?>, maxNumberOfDaysToAdd = <?= $preview['maxStay']; ?>;
        
        <?php if($preview['minStayType'] == "days"){ ?> startDate.setDate(startDate.getDate() + minNumberOfDaysToAdd); <?php }?>
        <?php if($preview['maxStayType'] == "days"){ ?> endDate.setDate(endDate.getDate() + maxNumberOfDaysToAdd);  <?php }?>
        <?php }?>
        var minDate = [ startDate.getDate().padLeft(), 
                    (startDate.getMonth()+1).padLeft(), 
                    startDate.getFullYear()
                  ].join('-');
        var maxDate = [ endDate.getDate().padLeft(), 
                    (endDate.getMonth()+1).padLeft(), 
                    endDate.getFullYear()
                  ].join('-');

        $( "#endDate,#endDate2" ).datepicker({
            title: "Min stay: <?= $preview['minStay']; ?> <?= $preview['minStayType']; ?>, Max stay: <?= $preview['maxStay']; ?> <?= $preview['maxStayType']; ?>",
            format: "dd-mm-yyyy",
            startDate: minDate,
            endDate: maxDate,
            orientation: "bottom",
            autoclose: true,
            weekStart: 1
        });
        
        $("#endDate").datepicker("setDate",minDate);
        $("#endDate").focus();
    }
    Number.prototype.padLeft = function(base,chr){
        var  len = (String(base || 10).length - String(this).length)+1;
        return len > 0? new Array(len).join(chr || '0')+this : this;
    };
    
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $("#endDate").on("change", function(){
        fetch_booking_info();
    });
    function scrollToDiv(div_id){
        $('html, body').animate({ scrollTop: $(div_id).offset().top}, 1000);
        if(div_id === ".right-side"){ $("#startDate").focus(); }
    }
    function fetch_booking_info(){
        $("form#booking-form").parent().block({ 
            overlayCSS: { backgroundColor: '#E5E5E5' }, 
            message: '<img src="<?= base_url(); ?>assets/images/loading-spinner-grey.gif" alt="please wait...">',
            css: { border: 'none', backgroundColor: 'transparent' }  
        });
        $.ajax({
            url: "<?= site_url('home/get_booking_info'); ?>",
            type: "POST",
            data: $("form#booking-form").serialize(),
            success: function(response) {
                $("form#booking-form").parent().unblock();
                $(".bookingInfo table tbody").html(response);
                $(".bookingInfo").removeClass('hidden');
                $('[data-toggle="tooltip"]').tooltip();
            },
            error: function(response){
                $("form#booking-form").parent().unblock();
            }
        });
    }
    <?php if($editMode){ ?>
    function load_map(){
        geocoder = new google.maps.Geocoder();

        geocoder.geocode( { 'address': "<?= $preview['full_address']; ?>" }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

//                var latitude = results[0].geometry.location.lat();
//                var longitude = results[0].geometry.location.lng();
                var lattitude = <?= $preview['latitude']; ?>;
                var longitude = <?= $preview['longitude']; ?>;

                var latlngPos = new google.maps.LatLng(lattitude, longitude);

                var myOptions = {
                    zoom: 15,
                    center: latlngPos,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE
                    }
                };
                // Define the map
                var map = new google.maps.Map(document.getElementById("display_map"), myOptions);

                var marker = new google.maps.Marker({
                    map: map,
                    position: latlngPos,
                    icon:'',
                    draggable:false,
                    setVisible: false
                });
                // Add circle overlay and bind to marker
                var circle = new google.maps.Circle({
                    map: map,
                    radius: 200,            
                    strokeColor: "#007a87",
                    strokeOpacity: 0.8,
                    strokeWeight: 1,
                    fillColor: '#007a87',
                    fillOpacity: 0.3,
                    center: latlngPos
                });
                circle.bindTo('center', marker, 'position');
            }
        });
    }
    <?php }?>
    $('#booking-form').validate({
        rules: {
            'checkIn' :{ required:true},
            'checkOut' : { required:true},
            'professionals' : { required:  true }
        },
        messages : {
            'checkIn' :{ required:"Please select a check in date."},
            'checkOut' : { required:"Please select a check out date."},
            'professionals' : { required:"Please select number of professionals."}
        }
    });
    $('#contact-form').validate({
        rules: {
            'checkIn' :{ required:true},
            'checkOut' : { required:true},
            'professionals' : { required:  true },
            'message' : {required:true}
        },
        messages : {
            'checkIn' :{ required:"Please select a check in date."},
            'checkOut' : { required:"Please select a check out date."},
            'professionals' : { required:"Please select number of professionals."},
            'message' : { required:"Please enter your message." }
        },
        submitHandler: function(form) {
            $(form).parents('div.modal-body').block({ 
                overlayCSS: { backgroundColor: '#E5E5E5' }, 
                message: '<img src="<?= base_url(); ?>assets/images/loading-spinner-grey.gif" alt="please wait...">',
                css: { border: 'none', backgroundColor: 'transparent' }  
            });
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                dataType: 'json',
                success: function(response) {
                    $(form).parents('div.modal-body').unblock();
                    $(".host-popup-content .alert strong").text(response.message);
                    if(response.success){
                        
                    }
                    $(form).trigger('reset');
                },
                error: function(response){
                    $(form).parents('div.modal-body').unblock();
                }
            });
        }
    });
    /* Wish List related code */
    $("a#create-wishlist-btn").on("click", function(e){
        e.preventDefault();
        $(this).toggle();
        $("form#wishlist-form").toggle();
    });
    $('#wishListModal').on('hidden.bs.modal', function () {
        $("#create-wishlist-btn").toggle();
        $("form#wishlist-form").toggle();
    });
    $('#wishlist-form').validate({
        rules: {
            'name' :{ required:true}
        },
        messages : {
            'name' :{ required:"Please enter your wishlist name."}
        },
        submitHandler: function(form) {
            $(form).parents('div.modal-content').block({ 
                overlayCSS: { backgroundColor: '#E5E5E5' }, 
                message: '<img src="<?= base_url(); ?>assets/images/loading-spinner-grey.gif" alt="please wait...">',
                css: { border: 'none', backgroundColor: 'transparent' }  
            });
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                dataType: 'json',
                success: function(response) {
                    $(form).parents('div.modal-content').unblock();
                    $(form).parents('div.modal-body').find(".alert strong").text(response.message);
                    $(form).parents('div.modal-body').find(".alert").show();
                    if(response.success){
                        var list_name = $(form).find("input[name='name']").val();
                        $(form).next("ul.wishlists").append('<li><span>'+list_name+'</span><span class="pull-right"><i class="fa fa-heart red"></i></span></li>');
                        $(form).next("ul.wishlists").show();
                        $(form).hide();
                        //$(".wishlist-section p").text("Saved to "+list_name);
                        $(".wishlist-section .fa").removeClass("fa-heart-o").addClass("fa-heart red");
                    }
                    $(form).trigger('reset');
                },
                error: function(response){
                    $(form).parents('div.modal-content').unblock();
                }
            });
        }
    });
    $(document).on('click', 'li.add-to-wishlist', function(){
        var $this = $(this);
        var wishlist_id = $(this).attr('data-wishlist-id');
        var space_id = $(this).attr('data-space-id');
        var params = {wishlist_id: wishlist_id, space_id: space_id};
        $.post("<?= site_url('dashboard/add_to_wishlist')?>", params, function(response){
            var result = JSON.parse(response);
            if(result.success === 1 || result.success === 2){
                $this.find('i.fa').addClass('red');
                $(".wishlist-section button").html('<i class="fa fa-heart red"></i>&nbsp;Saved to Wish List');
            }else if(result.success === 0){
                $this.find('i.fa').removeClass('red');
            }
            if(result.addedInAny === 0){
                $(".wishlist-section button").html('<i class="fa fa-heart-o"></i>&nbsp;Save to Wish List');
            }
        });
    });
</script>