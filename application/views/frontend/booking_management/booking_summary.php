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
                                <label>Say hello to your host and tell them why you’re coming:</label>
                                <textarea class="textarea" name="professionalNote" placeholder="Visiting family or friends? Seeing the sights? This helps your host plan for your trip."></textarea>
                            </div>
                        </div>
                        <div class="house-rul">
                            <div class="align-center">
                                <img src="<?= base_url('theme/front/assests/img/house-rule-img.png'); ?>" alt="" />    
                                <h3><?= $hostInfo->firstName; ?>’s House Rules</h3>
                            </div>
                            <ul>
                                <li class="clearfix">
                                    <div class="pull-left">
                                        No smoking
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="pull-left">
                                        Not suitable for pets
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="pull-left">
                                        Check in time is 2PM - 2AM (next day)
                                    </div>
                                    <div class="pull-right">
                                        <img src="<?= base_url('theme/front/assests/img/blue-right.png'); ?>" alt="" />
                                    </div>
                                </li>
                            </ul>
                            <p>Please DO NOT flush toilet paper, please use trash cans. <br />(lsla Mujeres has a very delicate drainage system)</p>
                            <h4>Please turn off air conditioning when you depart the house for long</h4>
                            <a href="#"><strong>+ See all House Rules</strong></a>
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
                        <h5><?= $spaceType['name']; ?> · <span class="star"><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>"></span><span class="star"><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>"></span><span class="star"><img src="<?= base_url('theme/front/assests/img/reting-star-home.png'); ?>"></span> 129 reviews <br><?= $spaceInfo['state']; ?>, <?= $all_countries[$spaceInfo['country']]; ?></h5>
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
                                    <a href="#"><strong>Coupon</strong></a>
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
                                </div>
                            </li>
                        </ul>
                        <p>The adjusted exchange rate for booking this listing is $1.00 INR to $0.2722 MXN.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    
    $("#step1 button").on("click", function(e){
        e.preventDefault();
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