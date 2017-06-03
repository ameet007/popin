<!DOCTYPE html>
<html>
<head>
<title>Popln</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo base_url()?>assests/css/jcarousel.responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>assests/js/html5.js"></script>
<link href="<?php echo base_url()?>assests/css/media.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="head home-head">
    <div class="header_top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="<?php echo base_url()?>assests/img/logo.png" alt="logo" />
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="anywhere-main clearfix">
                                <ul class="clearfix">
                                    <li class="anywhere">
                                        <input class="icon1" type="text" placeholder="Anywhere" />
                                    </li>
                                    <li class="anytime">
                                        <input class="icon1 icon2" type="text" id="demo-range" placeholder="Anytime" />
                                    </li>
                                    <li class="guest">
                                        <button id="guest_button">
                                            <span><img src="<?php echo base_url()?>assests/img/head-guest-icon.png" alt="" /></span>
                                            <span>1 guest</span>
                                        </button>
                                        <div id="guest_open" class="bz_guest_box clearfix" style="display: none;">
                                            <div class="feild">
                                                <label>Adults</label>
                                                <span><input value="" class="qtyminus" field="adult" type="button"> <input name="adult" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="adult" type="button"></span>
                                            </div>
                                            <div class="feild">
                                                <label>Children<br/> <span class="age">Ages 2 - 12</span></label>
                                                <span><input value="" class="qtyminus" field="children" type="button"> <input name="children" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="children" type="button"></span>
                                            </div>
                                            <div class="feild">
                                                <label>Infants<br/> <span class="age">Under 2</span></label>
                                                <span><input value="" class="qtyminus" field="infant" type="button"> <input name="infant" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="infant" type="button"></span>
                                            </div>
                                            <div class="pull-left"><a href="#">Cancel</a></div>
                                            <div class="pull-right"><a href="#">Apply</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pro_img">
                        <img src="<?php echo base_url()?>assests/img/profile-pic.png" alt="" />
                    </div>
                    <ul class="nav navbar-nav navbar-right navi">
                        <li><a href="#">Become a Partner</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rentals <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="head-tab">
            <div class="container-fluid">
                <div class="col-xs-12">
                    <ul>
                        <li><a class="active" href="#">Industry</a></li>
                        <li><a href="#">Spaces</a></li>
                        <li><a href="#">Workshops</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="home-main-content">
    <div class="row">
        <div class="container">
            <div class="feat-indus">
                <div class="row">
                    <div class="pull-left">
                        <h3>Featured industries</h3>
                    </div>
                    <div class="pull-right">
                        <a href="#">See all</a>
                    </div>
                </div>
                <div class="row">
                    <div id="jc1" class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul class="clearfix">
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>Beautiful</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                        <p class="jcarousel-pagination"></p>
                    </div>
                </div>
            </div>
            <div class="feat-indus work-shops">
                <div class="row">
                    <div class="pull-left">
                        <h3>Workshops</h3>
                    </div>
                    <div class="pull-right">
                        <a href="#">See all</a>
                    </div>
                </div>
                <div class="row">
                    <div id="#jc2" class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul class="clearfix">
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="slide-main clearfix">
                                        <div class="slide-contant">
                                            <div class="img">
                                                <img src="<?php echo base_url()?>assests/img/image5.jpg" alt="" />
                                            </div>
                                            <div class="content">
                                                <p><strong>$5,255</strong> Tune into daily rhythms with a Cuban scholars Team</p>
                                                <div class="review">
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                                    <span>1 review</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                        <p class="jcarousel-pagination"></p>
                    </div>
                </div>
            </div>
            <div class="feat-indus spaces">
                <div class="row">
                    <div class="pull-left">
                        <h3>Spaces</h3>
                    </div>
                    <div class="pull-right">
                        <a href="#">See all</a>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="slide-main clearfix">
                                <div class="slide-contant">
                                    <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                    </div>
                                    <div class="content">
                                        <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                        <p><span>Entire home/apt ·</span> 2 beds</p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                            <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
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
    </div>
</section>
<footer class="foot">
    <div class="container">
        <div class="row">
            <div class="foot_top clearfix">
                <div class="col-lg-3 one-foruth">
                    <select><option value="id">Bahasa Indonesia</option><option value="ms">Bahasa Melayu</option><option value="ca">Català</option><option value="da">Dansk</option><option value="de">Deutsch</option><option value="en">English</option><option value="es">Español</option><option value="el">Eλληνικά</option><option value="fr">Français</option><option value="it">Italiano</option><option value="hu">Magyar</option><option value="nl">Nederlands</option><option value="no">Norsk</option><option value="pl">Polski</option><option value="pt">Português</option><option value="fi">Suomi</option><option value="sv">Svenska</option><option value="tr">Türkçe</option><option value="is">Íslenska</option><option value="cs">Čeština</option><option value="ru">Русский</option><option value="th">ภาษาไทย</option><option value="zh">中文 (简体)</option><option value="zh-TW">中文 (繁體)</option><option value="ja">日本語</option><option value="ko">한국어</option></select>

                    <select><option value="AED">AED</option><option value="ARS">ARS</option><option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CLP">CLP</option><option value="CNY">CNY</option><option value="COP">COP</option><option value="CRC">CRC</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="HKD">HKD</option><option value="HRK">HRK</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="MAD">MAD</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PEN">PEN</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="RUB">RUB</option><option value="SAR">SAR</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="TWD">TWD</option><option value="UAH">UAH</option><option value="USD">USD</option><option value="UYU">UYU</option><option value="VND">VND</option><option value="ZAR">ZAR</option></select>
                </div>
                <div class="col-lg-3 one-foruth pd-left">
                    <h5>Popln</h5>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Policies</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Diversity &amp; Belonging</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 one-foruth pd-left">
                    <h5>Discover</h5>
                    <ul>
                        <li><a href="#">Trust &amp; Safety</a></li>
                        <li><a href="#">Travel Credit</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Popln Citizen</a></li>
                        <li><a href="#">Business Travel</a></li>
                        <li><a href="#">Guidebooks</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 one-foruth pd-left">
                    <h5>Hosting</h5>
                    <ul>
                        <li><a href="#">Why Host</a></li>
                        <li><a href="#">Hospitality</a></li>
                        <li><a href="#">Responsible Hosting</a></li>
                    </ul>
                </div>
            </div>
            <div class="foot_bottom clearfix">
                <div class="copy-right">
                    <p>&copy Popln, Inc.</p>
                </div>
                <div class="terms">
                    <ul>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url()?>assests/js/jQuery.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/jquery.jcarousel.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/jcarousel.responsive.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('input.icon1').focus(function() {
        $(this).attr('placeholder', 'Destination, city, address')
    }).blur(function() {
        $(this).attr('placeholder', 'Anywhere')
    })

    $('#demo-range').daterangepicker();
    $('#demo-range').val('Anytime');

    $('#guest_button').on("click", function(e) {
        $('#guest_open').slideToggle();
        e.stopPropagation();
    });
    $(document).on("click", function(e) {
        if(!(e.target.closest('#guest_open'))){
            $("#guest_open").slideUp();
        }
    });

    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

$(function() {
    //Initiate slider-one
    $('#jc1 .jcarousel')
        .jcarousel({
            // Core configuration goes here
        })
        .jcarouselAutoscroll({
            interval: 1000,
            target: '+=1',
            autostart: false
        });

    //Initiate slider-two
    $('#jc2 .jcarousel')
        .jcarousel({
            // Core configuration goes here
        })
        .jcarouselAutoscroll({
            interval: 1000,
            target: '+=1',
            autostart: false
        });
});


$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
  })
</script>
</body>
</html>
