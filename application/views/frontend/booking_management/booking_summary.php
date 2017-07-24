<?php 
$CI =& get_instance();
$CI->load->model(FRONT_DIR.'/FrontCommon','common');
$siteDetails = $CI->common->getSiteDetails();
?>

<!DOCTYPE html>
<html>
<head>
<title><?= $spaceInfo['spaceTitle']; ?></title>
<link rel="shortcut icon" href="<?= ($siteDetails->favicon!='')?base_url('uploads/site/'.$siteDetails->favicon):base_url('uploads/site/default_favicon.ico'); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo base_url('theme/front/assests/css/nav.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('theme/front/assests/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('theme/front/assests/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('theme/front/assests/css/main.css')?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('theme/front/assests/js/html5.js')?>"></script>
<link href="<?php echo base_url('theme/front/assests/css/media.css')?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('theme/front/assests/js/jQuery.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/bootstrap.min.js')?>" type="text/javascript"></script>

<!--Initialize Jquery Validation with Additional Methods-->
<script src="<?= base_url('theme/admin/assets/js/jquery.validate.js'); ?>"></script>
<script src="<?= base_url('theme/admin/assets/js/additional-methods.js'); ?>"></script>
</head>
<body>
<header class="head">
    <div class="header_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="<?php echo base_url(); ?>">
                                <img class="media-object" src="<?= base_url('uploads/site/thumb/'.$siteDetails->logo); ?>" alt="logo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="middle-container booking-summry">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-offset-1 col-lg-6">
                <div class="summry-left pay-m">
                    <form id="booking-form" method="post" action="<?= site_url('home/book_space'); ?>">
<!--                    <div class="rare-find clearfix">
                        <div class="pull-left">
                            <p><strong>This is a rare find.</strong></p>
                            <p>Michelle’s place is usually booked.</p>
                        </div>
                        <div class="pull-right">
                            <img src="img/dimaned.png" alt="" />
                        </div>
                    </div>-->
                    <div class="alert alert-danger" style="display: none;">
                        <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i></strong> Please tell about your rental, this helps the partner to plan for your rental.
                    </div>
                    <h2 id="booking-about">1. About Your Trip</h2>
<!--                    <h2 class="stp1">1. About Your Trip <span class="pull-right"><a href="#">Edit</a></span></h2>-->
                    <div id="step1">
                        <div class="ple-let">
    <!--                        <div class="alert">
                                Please let us know arrival time ... Please print itinerary
                            </div>-->
                            <?php
                                $avatar = ($hostInfo->avatar!='' && file_exists('uploads/user/thumb/' . $hostInfo->avatar))?$hostInfo->avatar:'user_pic-225x225.png';
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?= base_url('uploads/user/thumb/'.$avatar); ?>" class="media-object img-circle">
                                </div>
                                <div class="media-body media-middle">
                                    <p>Your host, <?= $hostInfo->firstName; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="feild col-md-6">
                                    <label>Who’s coming?</label>
                                    <select class="selectbox" name="professionals">
                                        <?php for($i=1; $i<=$spaceInfo['professionalCapacity'];$i++){ ?>
                                        <option value="<?= $i; ?>" <?= ($booking['professionals']==$i)?'selected':'';?>><?= $i; ?> professionals</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="feild">
                                <label>Say hello to the partner and tell him why you’re coming:</label>
                                <textarea class="textarea" name="professionalNote" placeholder="This helps the partner to plan for your rental."></textarea>
                            </div>
                        </div>
                        <div class="house-rul">
                            <div class="align-center">
                                <img src="<?= base_url('theme/front/assests/img/house-rule-img.png'); ?>" alt="" />    
                                <h3><?= trim($hostInfo->firstName); ?>’s Space Rules</h3>
                            </div>
                            <?php $checkInOut = unserialize(TIMES); ?>
                            <ul>                                
                                <li class="clearfix">
                                    <div class="pull-left">
                                        Check in time is <b><?php $day = strtolower(date("D")); echo $checkInOut[$spaceInfo["{$day}From"]] . ' - ' . $checkInOut[$spaceInfo["{$day}To"]]; ?></b>
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                <?php if($spaceInfo['ageRequirements'] == 'Yes'){ ?>
                                <li class="clearfix">
                                    <div class="pull-left">
                                        Minimum age requirement for professionals is <b><?= $spaceInfo['ageLimit']; ?></b>
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                <?php } ?>
                                <?php if($spaceInfo['displayLicence'] == 'Yes'){ ?>
                                <li class="clearfix">
                                    <div class="pull-left">
                                        Display License or Certificate in workspace
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                <?php } ?>
                                
                                <li class="clearfix">
                                    <div class="pull-left">
                                        <?= ($spaceInfo['suitablePets'] == 'Yes')?"Suitable for pets":"Not suitable for pets"; ?>
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                
                                <li class="clearfix">
                                    <div class="pull-left">
                                        <?=($spaceInfo['eventPartiesAllowed'] == 'Yes')?"Events or parties are allowed":"Events or parties are not allowed"; ?>
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                            </ul>
                            <?php  if(!empty($spaceInfo['additionalRules'])){ $additionalRules = explode(" | ", $spaceInfo['additionalRules']); foreach($additionalRules as $additionalRule){ ?>
                                <p><?php echo $additionalRule; ?></p>
                            <?php }} ?>
                            <?php  if(!empty($spaceInfo['cleanUpProcedure'])){ $cleanUpProcedures = explode(" | ", $spaceInfo['cleanUpProcedure']); foreach($cleanUpProcedures as $cleanUpProcedure){ ?>
                                <h4 class="space-rules hidden"><?php echo $cleanUpProcedure; ?></h4>
                            <?php }} ?>
                            <a href="#" class="show-more" data-target-key="space-rules"><strong>+ See all Space Rules</strong></a>
                        </div>
                        <button class="btn-red" type="button">Next</button>
                    </div>
                    <input type="hidden" name="space" value="<?= $booking['space']; ?>">
                    <input type="hidden" name="checkIn" value="<?= $booking['checkIn']; ?>">
                    <input type="hidden" name="checkOut" value="<?= $booking['checkOut']; ?>">
                    <input type="hidden" name="amount" value="<?= $booking['basePrice']; ?>">
                    <input type="hidden" name="currency" value="<?= $booking['currency']; ?>">
                    <input type="hidden" name="addtionalCosts" value="<?= $booking['addtionalCosts']; ?>">
                    <input type="hidden" name="totalAmount" value="<?= $booking['totalAmount']; ?>">
                    <input type="hidden" name="bookingType" value="<?= $booking['bookingType']; ?>">
                    <input type="hidden" name="numberBooking" value="<?= $booking['numberBooking']; ?>">
                    <h2 id="booking-pay" class="stp2">2. Payment</h2>
                    <div id="step2" style="display: none;">                        
                        <div class="ple-let">
                            <h6>Cancellation policy: Strict</h6>
                            <p>Cancel up to 7days before your trip and get a 50% refund. After that time, the reservation is non-refundable.</p>
<!--                            <div class="row">
                                <div class="feild col-md-6">
                                    <label>Billing country</label>
                                    <select class="selectbox">
                                        <option>India</option>
                                        <option>India2</option>
                                        <option>India3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="feild col-md-6">
                                    <label>Payment type</label>
                                    <select class="selectbox">
                                        <option>Credit or Debit Card (INR)</option>
                                        <option>Credit or Debit Card (INR)2</option>
                                        <option>Credit or Debit Card (INR)3</option>
                                    </select>
                                </div>
                            </div>-->
                        </div>
                        <div class="house-rul">
                            <p>You will be redirected to PayPal to complete your payment. <strong>you must complete the process or the transaction will not occur.</strong></p>
                            <p>I agree to the <a href="#">House Rules</a>, <a href="#">Strict cancellation policy</a>, and to the <a href="#">Guest Refund Policy.</a> I also agree to pay the total amount shown, which includes Service Fees.</p>
                        </div>
                        <button class="btn-red" type="submit">Confirm &amp; pay</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="summry-right">
                    <div class="img">
                        <img src="<?= base_url('uploads/user/gallery/').$spaceGallery[0] ?>" alt="" />
                        <div class="pro-pic">
                            <img src="<?= base_url('uploads/user/thumb/'.$avatar); ?>" class="img-circle" height="60" width="60" alt="" />
                        </div>
                    </div>
                    <div class="content">
                        <h5>Hosted by <?= $hostInfo->firstName; ?></h5>
                        <h2><?= $spaceInfo['spaceTitle']; ?></h2>
                        <?php 
                        $all_countries = unserialize(ALL_COUNTRY);
                        $establishmentType = $this->space->getDropdownDataRow('establishment_types', $spaceInfo['establishmentType']); 
                        $spaceType = $this->space->getDropdownDataRow('space_types', $spaceInfo['spaceType']);
                        ?>
                        <h5 class="mr0"><?= $spaceType['name']; ?></h5>
                        <h5><?= createHTMLRating($spaceInfo['id']); ?> · <?=  totalReivewsGet($spaceInfo['id']);?> review <br><?= $spaceInfo['state']; ?>, <?= $all_countries[$spaceInfo['country']]; ?></h5>
                        <ul>
                            <li class="clearfix">
                                <div clas="row">
                                    <div class="col-md-6">
                                        <p>Check-in <strong><?= date('d M, Y', strtotime($booking['checkIn'])); ?></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Checkout <strong><?= date('d M, Y', strtotime($booking['checkOut'])); ?></strong></p>
                                    </div>
                                </div>
                            </li>
                            <?php $bookingCurrency = getCurrency_symbol($booking['currency']); ?>
                            <li class="clearfix">
                                <div class="pull-left">
                                    <p><?= $bookingCurrency.$booking['basePrice']; ?> x <?= $booking['numberBooking'].' '.$booking['bookingType']; ?></p>
                                    <p>Additional Charges &nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" title="Cleaning Fee, Service Fee etc."></i></p>
<!--                                    <a href="#"><strong>Coupon</strong></a>-->
                                </div>
                                <div class="pull-right">
                                    <p><?= $bookingCurrency.$booking['totalBasePrice']; ?></p>
                                    <p><?= $bookingCurrency.$booking['addtionalCosts']; ?></p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pull-left">
                                    <p><strong>Total</strong></p>
                                </div>
                                <div class="pull-right">
                                    <p><?= $bookingCurrency.$booking['totalAmount']; ?><sup><?= $booking['currency']; ?></sup></p>
                                    <p>$<?php echo $this->session->userdata('checkout_amount'); ?><sup>USD</sup></p>
                                </div>
                            </li>
                        </ul>
                        <p>The adjusted exchange rate for booking this listing is <?= $bookingCurrency; ?>1.00 <?= $booking['currency']; ?> to $<?= $this->session->userdata('exchange_rate'); ?> USD.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(document).on('click', 'a.show-more', function(e){
        e.preventDefault();
        var $this = $(this), target = $(this).attr("data-target-key");

        //$("."+target).toggle();
        $( "."+target ).toggleClass(function() {
            if ( $( this ).is( ".hidden" ) ) {
                $this.html('<b>- Less</b>');
                return "hidden";
            } else {
                $this.html('<b>+ Sell all Space Rules</b>');
                return "hidden";
            }

        });
    });
    $("#step1 button").on("click", function(e){
        e.preventDefault();
        var notes = $("textarea[name='professionalNote']").val();
        if(notes.trim() === ""){
            $(".alert.alert-danger").show();
            $("html, body").animate({ scrollTop: 0 });
            return false;
        }
        $("#step2").show();
        $("h2#booking-pay").removeClass('stp2');
        $("#step1").slideUp("slow", function() {
            // Animation complete.
            $("h2#booking-about").addClass('stp1');
            $("h2#booking-about").html('1. About Your Trip <span class="pull-right"><a href="#">Edit</a></span>');
        });
        $("html, body").animate({ scrollTop: 0 });
        return false;
    });
    $(document).on("click", "h2#booking-about a", function(e){
        e.preventDefault();
        $("#step2").hide();
        $("h2#booking-pay").addClass('stp2');
        $("#step1").slideDown("slow", function() {
            // Animation complete.
            $("h2#booking-about").removeClass('stp1');
            $("h2#booking-about span").remove();
        });
        $("html, body").animate({ scrollTop: 0 });
        return false;
    });
});
</script>
</body>
</html>