<?php $this->load->view('frontend/include/user-header'); ?>
<style>
.guest_open .feild {margin-bottom: 20px;width: 100%;}
.guest_open{display: none;}
ul.chosen-choices{margin: 0 !important;padding: 5px !important;}
ul.chosen-choices li {padding: 0 !important;border-top: none  !important;}
ul.chosen-results{ margin: 0 4px 4px 0 !important; }
ul.chosen-results li{ margin: 0 !important;padding: 5px 6px !important;border-top: none  !important; }
.new-partner25 .add-rules .pull-left .textbox{width: 300px;}
</style>
<div class="loader" style="display:none;"></div>
<section class="middle-container listing-sett">
    <div class="container">
        <div class="head-btn clearfix">
            <div class="pull-left">
                <h2>Listings</h2>
            </div>
            <div class="pull-right">
                <a href="<?= site_url('manage-calendar/'.$space_id); ?>"><button class="gost-btn">Calendar</button></a>
            </div>
        </div>
        <div class="main-content">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Listing Details</a></li>
                        <li><a data-toggle="tab" href="#menu1">Renting Settings</a></li>
                        <li><a data-toggle="tab" href="#menu2">Pricing</a></li>
                        <li><a data-toggle="tab" href="#menu3">Availability</a></li>
                        <li><a data-toggle="tab" href="#menu4">Business Partners</a></li>
                    </ul>
                </div>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="col-md-8 pric">
                                <div class="pro-requr">
                                    <h3>Title &amp; Description</h3>
                                    <button class="gost-btn edit-btn">Edit</button>
                                    <form id="title_n_desc" class="form-horizontal" method="post" action="<?= site_url('listing/update_listing_details'); ?>" autocomplete="off" style="display: none;" novalidate>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Title</label>
                                                <div class="col-sm-9"><input name="spaceTitle" class="textbox valid" type="text" value="<?= $listing['spaceTitle'];?>" placeholder="Listing Title" required></div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Description</label>
                                                <div class="col-sm-9"><textarea name="spaceDescription" class="textbox valid" placeholder="Listing Description" rows="5" required><?= $listing['spaceDescription'];?></textarea></div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Address</label>
                                                <div class="col-sm-9">
                                                    <div class="main-input">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="align-right">Street Address</label>
                                                                <input type="text" class="textbox" name="streetAddress" placeholder="e.g 123 Main St." value="<?php echo $listing['streetAddress']; ?>" required/>
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <label class="align-right">Suite, Bldg. (optional)</label>
                                                                <input type="text" class="textbox" name="suiteBuilding" placeholder="e.g. Apt #7" value="<?php echo $listing['suiteBuilding']; ?>" />
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <label class="align-right">City</label>
                                                                <input type="text" class="textbox" name="city" placeholder="City" value="<?php echo $listing['city']; ?>" required />
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <label class="align-right">State</label>
                                                                <input type="text" class="textbox" name="state" placeholder="State" value="<?php echo $listing['state']; ?>" required />
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <label class="align-right">Zip code</label>
                                                                <input type="text" class="textbox" name="zipCode" placeholder="Zip code" value="<?php echo $listing['zipCode']; ?>" required />
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <label class="align-right">Country</label>
                                                                <select class="selectbox" name="country" required>
                                                                    <?php $all_countries = unserialize(ALL_COUNTRY); 
                                                                    foreach($all_countries as $k=>$v){ ?>
                                                                    <option value="<?= $k; ?>" <?php echo ($listing['country'] == $k)? 'selected' : ''?>><?= $v; ?></option>
                                                                    <?php } ?> 
                                                                </select>
                                                            </div>
                                                            <input type="hidden" id="lat" name="latitude" value="<?= $listing['latitude'];?>">
                                                            <input type="hidden" id="lng" name="longitude" value="<?= $listing['longitude'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="pull-right">
                                                        <a class="btn2 cancel-btn" href="#">Cancel</a>
                                                        <button class="btn-red update-btn" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="listing-info">
                                        <li class="clearfix">
                                            <div class="pull-left">Title</div>
                                            <div class="pull-right"><?= $listing['spaceTitle'];?></div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="pull-left col-sm-3">Description</div>
                                                <div class="pull-right col-sm-9"><?= $listing['spaceDescription'];?></div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="pull-left col-sm-3">Address</div>
                                                <div class="pull-right col-sm-9"><?= $listing['full_address'];?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr space-r">
                                    <h3>Establishment</h3>
                                    <button class="gost-btn edit-btn">Edit</button> 
                                    <form id="establishment" class="form-horizontal" method="post" action="<?= site_url('listing/update_listing_details'); ?>" autocomplete="off" style="display: none;">
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Industry</label>
                                                <div class="col-sm-5">
                                                    <select class="selectbox" name="industryType" onchange="onchange_industry(this.value)" required>
                                                        <?php foreach($industries as $industry){ ?>
                                                        <option value="<?= $industry['id']; ?>" <?php echo ($listing['industryTypeId'] == $industry['id'])? 'selected' : ''?>><?= $industry['industry_name']; ?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Establishment Type</label>
                                                <div class="col-sm-5">
                                                    <select class="selectbox" name="establishmentType" required>
                                                        <?php foreach($establishment_types as $establishment_type){ if ($listing['industryTypeId'] == $establishment_type['industry_ID']) { ?>
                                                        <option value="<?= $establishment_type['id']; ?>" <?php echo ($listing['establishmentTypeId'] == $establishment_type['id'])? 'selected' : ''?>><?= $establishment_type['name']; ?></option>
                                                        <?php }} ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Space Type</label>
                                                <div class="col-sm-5">
                                                    <select class="selectbox" name="spaceType" required>
                                                        <?php foreach($space_types as $space_type){ ?>
                                                        <option value="<?= $space_type['id']; ?>" <?php echo ($listing['spaceTypeId'] == $space_type['id'])? 'selected' : ''?>><?= $space_type['name']; ?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <label class="align-right col-sm-3">Establishment License Number</label>
                                                <div class="col-sm-5"><input name="establishmentLicence" class="textbox valid" type="text" value="<?= $listing['establishmentLicence'];?>" placeholder="Establishment License Number" required></div>
                                            </div>
                                        </div>
                                        <div class="main-input">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="pull-right">
                                                        <a class="btn2 cancel-btn" href="#">Cancel</a>
                                                        <button class="btn-red update-btn" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="listing-info">
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Industry
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['industryType'];?>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Establishment Type
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['establishmentType'];?>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Space Type
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['spaceType'];?>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Establishment License Number
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['establishmentLicence'];?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr new-partner6 new-partner7">
                                    <h3>About Space</h3>
                                    <button class="gost-btn edit-btn">Edit</button>
                                    <div class="space-are">                                        
                                        <form id="workspaces-form" class="form-horizontal" method="post" action="<?= site_url('listing/update_listing_details'); ?>" autocomplete="off" style="display: none;">
                                            <h3>How many professionals can your space accommodate?</h3>
                                            <div class="feild">
                                                <div class="main">
                                                    <input type='text' class="textbox" name='professionalCapacity' value='<?php echo $listing['professionalCapacity']; ?> professionals' class='qty' />
                                                    <input type='button' value='' class='qtyminus' field='professionalCapacity' />
                                                    <input type='button' value='' class='qtyplus' field='professionalCapacity' />
                                                </div>
                                            </div>
                                            
                                            <h3>How many workspaces does your space have?</h3>
                                            <div class="feild">
                                                <div class="main">
                                                    <input type='text' class="textbox" name='workSpaceCount' value='<?php echo $listing['workSpaceCount'];?> workspaces' class='qty' />
                                                    <input type='button' value='' class='qtyminus' field='workSpaceCount' />
                                                    <input type='button' value='' class='qtyplus' field='workSpaceCount' />
                                                </div>
                                            </div>
                                            
                                            <h3>What kind of workspaces does your space have?</h3>
                                            <div class="feild works-details">
                                                <h4 style="font-weight: normal">Workspace Details</h4>
                                                <ul></ul>
                                            </div>
                                            
                                            <div class="main-input">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="pull-right">
                                                            <a class="btn2 cancel-btn" href="#">Cancel</a>
                                                            <button class="btn-red update-btn" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="listing-info">
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Accommodates
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['professionalCapacity'];?> Professional(s)
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Workspaces
                                            </div>
                                            <div class="pull-right">
                                                <?= $listing['workSpaceCount'];?> Workspaces(s)
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="pull-left col-sm-3">Workspace Details</div>
                                                <div class="pull-right col-sm-9">
                                                    <ul style="padding: 0;float: right;">
                                                    <?php
                                                    if(isset($listing['workSpaceDetail'])){
                                                        $workSpaceDetail = json_decode($listing['workSpaceDetail'], TRUE);
                                                        for($i = 1; $i<=count($workSpaceDetail); $i++){
                                                    ?>
                                                    <li style="display: inline-block;border: none;padding: 0 10px;">
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
                                                            <?php
                                                                if(isset($workSpaceDetail["ws{$i}"]["cm"])){
                                                                    echo "(In Common Space)";
                                                                }
                                                            ?>
                                                        </p>
                                                        <?php }?>
                                                    </li>
                                                    <?php }}?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr new-partner6 new-partner25">
                                    <h3>Amenities</h3>
                                    <button class="gost-btn edit-btn">Edit</button>
                                    <div class="space-are">                                        
                                        <form id="amenities-form" class="form-horizontal" method="post" action="<?= site_url('listing/update_listing_details'); ?>" autocomplete="off" style="display: none;">
                                            <h3>What amenities do you offer?</h3>
                                            <?php foreach($amenities['Important'] as $k => $amtyI){ ?>
                                            <div class="feild">
                                                <label for="<?= $k; ?>">
                                                    <input id="<?= $k; ?>" type="checkbox" name="amenities[main][]" value="<?= $amtyI['id']; ?>" <?php echo (isset($listing['amenities']['main']) && !empty($listing['amenities']['main']) && in_array($amtyI['id'], $listing['amenities']['main']))? 'checked' : ''?>> <?= $amtyI['name']; ?>
                                                </label>
                                            </div>
                                            <?php } ?> 
                                            <div class="feild amenity <?php if(!isset($listing['amenities']['main']) && empty($listing['amenities']['main'])){ echo "hidden";}?>">
                                                <label>More amenities</label>
                                                <select class="selectbox  chosen-select" name="amenities[main][]" data-placeholder="Select Amenities" multiple>
                                                    <?php foreach($amenities['General'] as $amtyG){ ?>
                                                    <option value="<?= $amtyG['id']; ?>" <?php echo (isset($listing['amenities']['main']) && !empty($listing['amenities']['main']) && in_array($amtyG['id'], $listing['amenities']['main']))? 'selected' : ''?>><?= $amtyG['name']; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="feild"><a href="#" class="show-more" data-target-key="amenity"><?php echo (isset($listing['amenities']['main']) && !empty($listing['amenities']['main']))? '- Less' : '+ Expand More'?></a></div>

                                            <div class="feild add-rules">
                                                <div class="additional-rules">
                                                    <?php 
                                                    if(isset($listing['amenities']['other']) && !empty($listing['amenities']['other'])){
                                                        foreach($listing['amenities']['other'] as $amenity){
                                                    ?>
                                                    <div class="append-div">
                                                        <input class="textbox" name="amenities[other][]" value="<?= $amenity; ?>" type="text" readonly />
                                                        <a class="clos cancel-rule" href="#"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt="" /></a>
                                                    </div>
                                                    <?php }} ?>
                                                </div>
                                                <div class="clearfix">
                                                    <span class="pull-left"><input id="rule-text" class="textbox" type="text" placeholder="Add your own amenities" ></span>
                                                    <span class="pull-left"><button class="red-btn" id="add-rule" type="button">Add</button></span>
                                                </div>
                                            </div>
                                            
                                            <div class="main-input">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="pull-right">
                                                            <a class="btn2 cancel-btn" href="#">Cancel</a>
                                                            <button class="btn-red update-btn" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="listing-info">
                                        <li class="clearfix">
                                            <div class="pull-left col-sm-3">
                                                Amenities
                                            </div>
                                            <div class="pull-right col-sm-9">
                                                <?php 
                                                $aminity_value = "";
                                                if(!empty($listing['amenities']['main'])){
                                                foreach($amenities['Important'] as $aminity){ 
                                                    if(!empty($listing['amenities']['main']) && in_array($aminity['id'], $listing['amenities']['main'])){ 
                                                        $aminity_value .= "<strong>".$aminity['name']."</strong>, ";
                                                    }
                                                }
                                                foreach($amenities['General'] as $aminity){ 
                                                    if(!empty($listing['amenities']['main']) && in_array($aminity['id'], $listing['amenities']['main'])){ 
                                                        $aminity_value .= $aminity['name'].", ";
                                                    }
                                                }?>
                                                <p><?= rtrim($aminity_value, ", "); ?></p>
                                                <?php }?>
                                                <?php
                                                if(!empty($listing['amenities']['other'])){
                                                    $aminity_value = implode(", ", $listing['amenities']['other']);
                                                ?>
                                                <p><?= $aminity_value; ?></p>
                                                <?php }?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">            
                            <div class="col-md-8">
                                <h3>How professionals can rent</h3>
                                <p>Partners easily get more rentals when they allow professionals to rent without requesting approval. <br/><a href="#">learn more</a></p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optradio">Professionals who meet all your requirements can rent without requesting approval
                                        <span>RECOMMENDED</span>
                                        <P>Everyone must submit a rental request</P>
                                    </label>
                                </div>
                                 <div class="radio border-none pd0">
                                     <label><input type="radio" name="optradio" value="Yes" <?= ($listing['rentalRequests']=='Yes')?'checked':''?>>All professionals must send rental requests</label>
                                </div>
                                <div class="pro-requr">
                                    <h3>Professional requirements</h3>
                                    <button class="gost-btn">Edit</button>
                                    <strong>PopIn standard requirements</strong>
                                    <p>Profile photo, confirmed email and phone number, payment information, agreement to Space Rules.</p>
                                    <ul>
                                        <?php $spaces = unserialize(REQUIREMENTS); 
                                        foreach($spaces as $k=>$v){ ?>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                <?= $v; ?> <span>Instant Rent Only</span>
                                            </div>
                                            <div class="pull-right">
                                                <?php if(!in_array($k, $listing['professionalRequirements'])){ ?>
                                                <strong>Not set</strong>
                                                <?php }else{ ?>
                                                <img src="<?= base_url('theme/front/assests/img/right-singh.png'); ?>" alt="">
                                                <?php }?>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </div>
                                <div class="pro-requr space-r">
                                    <h3>Space Rules</h3>
                                    <button class="gost-btn">Edit</button>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">Age requirement</div>
                                            <div class="pull-right"><?= $listing['ageRequirements']=='Yes'?$listing['ageLimit']:$listing['ageRequirements'];?></div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">Display License or Certificate in workspace</div>
                                            <div class="pull-right"><?=$listing['displayLicence']?></div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">Events or parties are allowed</div>
                                            <div class="pull-right"><?=$listing['eventPartiesAllowed']?></div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">Pets allowed</div>
                                            <div class="pull-right"><?=$listing['suitablePets']?></div>
                                        </li>
                                    </ul>
                                    <h4>Additional rules</h4>
                                    <?php if(isset($listing['additionalRules']) && !empty($listing['additionalRules'])){ ?>                                    
                                    <ul>
                                    <?php  foreach($listing['additionalRules'] as $additionalRules){ ?>
                                        <li><?php echo $additionalRules; ?><a class="clos cancel-rule pull-right" href="#"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt="" /></a></li>
                                    <?php } ?>
                                    </ul>
                                    <?php } ?>
                                    <div class="feild">
                                        <textarea class="textarea" placeholder="Add your own here"></textarea>
                                    </div>
                                </div>
                                <div class="pro-requr space-r policie-s">
                                    <h3>Policies</h3>
                                    <button class="gost-btn">Edit</button>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                PopIn window
                                            </div>
                                            <div class="pull-right">
                                                <strong>10 minutes before rental start time</strong>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Proof of liability insurance
                                            </div>
                                            <div class="pull-right">
                                                <strong>Not set</strong>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Cancellation policy
                                            </div>
                                            <div class="pull-right">
                                                <strong>Flexible</strong>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Confirm their popin time
                                            </div>
                                            <div class="pull-right">
                                                <strong>Not set</strong>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">
                                                Message sent about their business
                                            </div>
                                            <div class="pull-right">
                                                <strong>Not set</strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="increase-profit">
                                    <h3>Increase your profit with Instant Rent</h3>
                                    <p>Instant Rent can give your listing an advantage.<br/>Professionals enjoy the ease of renting instantly</p>
                                    <button class="btn-red">Turn on Instant Book</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="col-md-8 pric">
                                <div class="pro-requr space-r">
                                    <h3>Currency</h3>
                                    <button class="gost-btn">Edit</button>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">Currency</div>
                                            <div class="pull-right"><?= $listing['currency']?></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr space-r">
                                    <h3>Hourly Price</h3>
                                    <button class="gost-btn">Edit</button> 
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">Base price</div>
                                            <div class="pull-right"><?= getCurrency_symbol($listing['currency']).$listing['base_price'];?>/hour</div>
                                        </li>
                                        <li class="clearfix">
                                            You are responsible for choosing the listing price. <a href=”#”>Learn More</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr space-r">
                                    <h3>Discounts</h3>
                                    <button class="gost-btn">Edit</button>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">Daily</div>
                                            <div class="pull-right"><?= $listing['daily_discount']?>%</div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">Weekly</div>
                                            <div class="pull-right"><?= $listing['weekly_discount']?>%</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-requr space-r">
                                    <h3>Additional Costs</h3>
                                    <button class="gost-btn">Edit</button>
                                    <ul>
                                        <li class="clearfix">
                                            <div class="pull-left">Cleaning fee</div>
                                            <div class="pull-right">None</div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="pull-left">Security Deposit</div>
                                            <div class="pull-right">None</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<?php
$stepData['step1']['page2']['workSpaceDetail'] = $listing['workSpaceDetail'];
$this->session->set_userdata('stepData', $stepData);
?>
<script>
function  onchange_industry(getID) {
    var establishment	 = '<?php echo json_encode($establishment_types);?>';
    var html = '';
    html = '<option value="" selected disabled>Select establishment type</option>';
    $.each(JSON.parse(establishment), function(idx, obj) {
        if (obj.industry_ID === getID) {
              html += '<option value="'+obj.id+'">'+obj.name+'</option>';
        }
    });
    
    $("select[name='establishmentType']").html(html);
}
$(document).ready(function(){
    $('.chosen-select').chosen();
    
    $(".edit-btn").on("click", function(){
        $(this).parent().find("form").toggle();
        $(this).parent().find("ul.listing-info").toggle();
        
    });
    $(".cancel-btn").on("click", function(e){
        e.preventDefault();
        $(this).parents("form").toggle();
        $(this).parents(".pro-requr").find("ul.listing-info").toggle();
        
    });
    
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var fieldName = $(this).attr('field');
        // Get its current value
        var inputString = $('input[name='+fieldName+']').val();
        var currentVal = parseInt(inputString);
        inputString = inputString.replace(/[0-9]/g, '');
        // Increment
        currentVal++;
        // If is not undefined
        if (!isNaN(currentVal)) {            
            $('input[name='+fieldName+']').val(currentVal + inputString);
            if(fieldName === 'workSpaceCount'){
                create_workspace_boxes(currentVal);
            }
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var fieldName = $(this).attr('field');
        // Get its current value
        var inputString = $('input[name='+fieldName+']').val();
        var currentVal = parseInt(inputString);
        inputString = inputString.replace(/[0-9]/g, '');
        // Decrement one
        currentVal--;
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {            
            $('input[name='+fieldName+']').val(currentVal + inputString);
            if(fieldName === 'workSpaceCount'){
                create_workspace_boxes(currentVal);
            }
        }
    });
    
    var workSpacesCount = parseInt($("input[name='workSpaceCount']").val());
    create_workspace_boxes(workSpacesCount);
    activate_deactivate_submit();    
    
    $(document).on("change", ".works-details select", function(){
        var type = $(this).find("option:selected").text();
        var $parent = $(this).parents('li');
        
        $parent.find("p.workspace_type").text(type);
    });
    $(document).on("click", ".works-details input[type='checkbox']", function(){
        var $parent = $(this).parents('li');
        if($(this).is(":checked")){
            $parent.find("p.workspace_info").text("In Common Space");
        }else{
            $parent.find("p.workspace_info").text("");
        }
        
    });
    
    $(document).on('click', 'a.add_spaces', function() {      
        var button_text = $(this).text();
        
        $(this).parents('li').find(".guest_open, .workspace_type, .workspace_info").toggle();
        
        if($(this).parents('li').find(".guest_open").is(':visible')){
            button_text = "Done";
        }else{
            var action = $(this).parents('li').find("p.workspace_type").text();
            if(action !== ""){
                button_text = "Edit spaces";
            }else{
                button_text = "Add spaces";
            }
        }
        
        $(this).text(button_text);
        
        activate_deactivate_submit();
    });
    
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
                $this.html('+ Expand More');
                return "hidden";
            }

        });
    });
    
    $('#add-rule').click(function(){
        var text = $('#rule-text').val();
        if(text.trim() !== ""){
            $('.additional-rules').append('<div class="append-div"><input class="textbox" name="amenities[other][]" value="'+text+'" type="text" readonly /><a class="clos cancel-rule" href="#"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt="" /></a></div>');
            $('#rule-text').val('');
        }
    });
    $(document).on('click','.cancel-rule',function(event){
        event.preventDefault();
        $(this).parent('div').remove();
    });
    $(document).on("keypress", "input#rule-text", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById('add-rule').click();
        }
    });

    $('form').each(function() {   // <- selects every <form> on page
        $(this).validate({
            /*ignore: ":not(:visible),:disabled",
            rules: {
                spaceTitle : { required:true},
                spaceDescription : { required:true},
                country : { required:true},
                streetAddress : { required:true},
                city : { required:  true },
                state : {required:true},
                zipCode : {required:true}
            },
            messages : {
                country :{ required:"Please select a country."},
                streetAddress : { required:"Please enter street address."},
                city : { required:"Please enter city."},
                state : { required:"Please enter state." },
                zipCode : {required:"Please enter zip code."}
            },*/
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: "space_id=<?= $space_id; ?>&" + $(form).serialize(),
                    dataType: 'json',
                    beforeSend: function(){
                        $(".loader").show();
                    },
                    complete: function(){
                        $('.loader').hide();
                    },
                    success: function(response) {
                        if(response.address){
                            geocoder = new google.maps.Geocoder();

                            geocoder.geocode( { 'address': response.full_address }, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    // log out results from geocoding

                                    var latitude = parseFloat(results[0].geometry.location.lat());
                                    var longitude = parseFloat(results[0].geometry.location.lng());

                                    document.getElementById('lat').value = latitude;
                                    document.getElementById('lng').value = longitude;

                                    $.post(form.action, "space_id=<?= $space_id; ?>&" + $(form).serialize(), function(data){
                                        var response = JSON.parse(data);
                                        if(response.success){
                                            window.location.reload();
                                        }
                                    });
                                }
                            });
                        }else if(response.success){
                            window.location.reload();
                        }

                    }            
                });
            }
        });
    });
});
function create_workspace_boxes(workspaces){
    $(".works-details ul").block({ 
        overlayCSS: { backgroundColor: '#E5E5E5' }, 
        message: '<img src="<?= base_url(); ?>assets/images/loading-spinner-grey.gif" alt="please wait...">',
        css: { border: 'none', backgroundColor: 'transparent' }  
    });

    $.ajax({
        url: "<?= site_url('Space/create_workspace_boxes'); ?>",
        type: "POST",
        data: "workspaces="+workspaces,
        success: function(response) {
            $(".works-details ul").html(response);
            $(".works-details ul").unblock();
            activate_deactivate_submit();
        },
        error: function(response){
            $(".works-details ul").unblock();
        }
    });
}
function activate_deactivate_submit(){
    var fullTotal = false;
    $(".ws-box").each(function(){
        var boxValue = $(this).find('p.workspace_type').text();
        if(boxValue !== ""){
            fullTotal = true;
        }else{
            fullTotal = false;
        }
    });
    //console.log(fullTotal);
    if(fullTotal){
        $("form#workspaces-form button[type='submit']").prop("disabled", false);
    }else{
        $("form#workspaces-form button[type='submit']").prop("disabled", true);
    }
}
</script>
<?php $this->load->view('frontend/include/user-footer'); ?>