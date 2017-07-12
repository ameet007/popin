<?php
$CI = & get_instance();
$CI->load->model(FRONT_DIR . '/FrontCommon', 'common');
$siteDetails = $CI->common->getSiteDetails();

if ($module_heading != '') {
    $siteTitle = $module_heading . ' | ' . SITE_DISPNAME;
} else if ($siteDetails->siteTitle != '') {
    $siteTitle = $siteDetails->siteTitle;
} else {
    $siteTitle = SITE_DISPNAME;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $siteTitle; ?></title>
        <link rel="shortcut icon" href="<?= ($siteDetails->favicon != '') ? base_url('uploads/site/' . $siteDetails->favicon) : base_url('uploads/site/default_favicon.ico'); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="format-detection" content="telephone=no" />

        <meta name="description" content="<?= (isset($metaDescription)) ? $metaDescription : $siteDetails->metaDescription; ?>">
        <meta name="author" content="<?= (isset($metaAuthor)) ? $metaAuthor : $siteDetails->metaAuthor; ?>">
        <meta name="keywords" content="<?= (isset($metaKeyWords)) ? $metaKeyWords : $siteDetails->metaKeyWords; ?>">

        <link href="<?php echo base_url('theme/front/assests/css/nav.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('theme/front/assests/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('theme/front/assests/css/bootstrap.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('theme/front/assests/css/main.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('theme/front/assests/css/chosen.css'); ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('theme/front/assests/js/html5.js') ?>"></script>
        <link href="<?php echo base_url('theme/front/assests/css/media.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('theme/front/assests/js/jQuery.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('theme/front/assests/js/nav.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('theme/front/assests/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('theme/front/assests/js/chosen.js'); ?>"  type="text/javascript"></script>

        <!--Initialize Jquery Validation with Additional Methods-->
        <script src="<?= base_url('theme/admin/assets/js/jquery.validate.js'); ?>"></script>
        <script src="<?= base_url('theme/admin/assets/js/additional-methods.js'); ?>"></script>
        <style>
            .error {
                color:red !important;
            }
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";       /* IE 8 */
                filter: alpha(opacity=50);  /* IE 5-7 */
                -moz-opacity: 0.5;          /* Netscape */
                -khtml-opacity: 0.5;        /* Safari 1.x */
                opacity: 0.5;               /* Good browsers */
                background: url('<?= base_url('assets/images/loading-spinner-grey.gif'); ?>') 50% 50% no-repeat #D3D3D3;
            }
        </style>
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
                                        <img class="media-object" src="<?= base_url('uploads/site/thumb/' . $siteDetails->logo); ?>" alt="logo" />
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control header-search" placeholder="Search" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <?php
                            if ($this->session->userdata('user_id') != '') {
                                $avatar = ($userProfileInfo->avatar != '' && file_exists('uploads/user/thumb/' . $userProfileInfo->avatar)) ? $userProfileInfo->avatar : 'user_pic-225x225.png';
                                ?>
                                <div class="pro_img">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" type="button" data-toggle="dropdown"><img height="32" width="32" src="<?= base_url('uploads/user/thumb/' . $avatar); ?>" alt="<?= $userProfileInfo->firstName . '&nbsp;' . $userProfileInfo->lastName; ?>"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= base_url('user/profile'); ?>">Edit Profile</a></li>
                                            <li><a href="<?= base_url('account'); ?>">Account Settings</a></li>
                                            <li><a href="<?= base_url('user/logout'); ?>">Logout</a></li>
                                        </ul>
                                    </div> 
                                </div>
                            <?php } ?>
                            <ul class="nav navbar-nav navbar-right navi">
                                <?php if ($this->session->userdata('session_login_id') != '') {

                                } else { ?>
                                    <li><a href="javascript:void(0);" id="openBecomePartnerBox" title="Become a Partner">Become a Partner</a></li>
                                <?php } ?>
                                <li class="dropdown">
                                    <?php $this->load->view('frontend/include/partner-tab'); ?>
                                </li>
                                <li class="dropdown trips">
                                    <?php $this->load->view('frontend/include/trips-window'); ?>
                                </li>
                                <li class="dropdown trips message">
                                    <?php $this->load->view('frontend/include/message-window'); ?>
                                </li>
                                <li><a href="#">Help</a></li>
                                <?php if ($this->session->userdata('session_login_id') != '') {

                                } else {
                                    ?>
                                    <li><a href="javascript:void(0);" class="openSignInBox">Login</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navigation">
            <div class="container">
                <div class="row">
                    <div id='cssmenu'>
                        <ul>
                            <?php
                            $last = $this->uri->total_segments();
                            $module_name = $this->uri->segment($last);
                            ?>
                            <li><a href='<?php echo site_url('dashboard') ?>'>Dashboard</a></li>
                            <li><a href='<?= site_url('inbox'); ?>'>Inbox</a></li>
                            <li <?= ($module_name == 'listing' or $module_name == 'my-reservations' or $module_name == 'reservation-requirements') ? 'class="active"' : ''; ?>><a href='<?php echo base_url('listing'); ?>'>Listings</a></li>
                            <li><a href='<?= site_url('rentals'); ?>'>Rentals</a></li>
                            <li <?= ($module_name == 'user' or $module_name == 'trust' or $module_name == 'photo' or $module_name == 'profile' or $module_name == 'reviews' or $module_name == 'references') ? 'class="active"' : ''; ?>><a href='<?php echo base_url('user/profile') ?>'>Profile</a></li>
                            <li <?= ($module_name == 'account' or $module_name == 'notifications' or $module_name == 'payment-methods' or $module_name == 'payout-preferences' or $module_name == 'transaction-history' or $module_name == 'privacy' or $module_name == 'security' or $module_name == 'connected-apps' or $module_name == 'settings' or $module_name == 'badges') ? 'class="active"' : ''; ?>><a href='<?php echo base_url('account'); ?>'>Account</a></li>
                            <li><a href='#'>Credit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>