<link href="<?php echo base_url()?>assests/css/bxslider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/fileuploader.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assests/css/fileuploader-dragdrop.css" rel="stylesheet" type="text/css" />
<?php
	$this->load->view('frontend/include-partner/header3');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:10%">
        10% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner14">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-9 col-md-offset-2">
                <h3>Show professionals what your business looks like</h3>
                <div><input type="file" name="files"></div>
                <p class="need-a">NEED A PHOTOGRAPHER?</p>
                <div class="next-prevs clearfix">
                    <div class="pull-left">
                        <a class="gost-btn" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default" href="#">Skip for now</a>
                    </div>
                </div>
                <div class="tips-slder">
                    <ul class="bxslider">
                        <li>
                            <div class="close-icon">
                                <a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a>
                            </div>
                            <div class="img">
                                <img src="<?php echo base_url()?>assests/img/tip-slider-img.png" alt="" />
                            </div>
                            <p>Many owners have at least 8 photos. You can start with one photo and add more later. Include photos of all the spaces to help professionals imagine themselves using your space.</p>
                        </li>
                        <li>
                            <div class="close-icon">
                                <a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a>
                            </div>
                            <div class="img">
                                <img src="<?php echo base_url()?>assests/img/tip-slider-img.png" alt="" />
                            </div>
                            <p>Many owners have at least 8 photos. You can start with one photo and add more later. Include photos of all the spaces to help professionals imagine themselves using your space.</p>
                        </li>
                        <li>
                            <div class="close-icon">
                                <a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a>
                            </div>
                            <div class="img">
                                <img src="<?php echo base_url()?>assests/img/tip-slider-img.png" alt="" />
                            </div>
                            <p>Many owners have at least 8 photos. You can start with one photo and add more later. Include photos of all the spaces to help professionals imagine themselves using your space.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
>
<script src="<?php echo base_url()?>assests/js/bxslider.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/fileuploader.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/fileuploader-custom.js" type="text/javascript"></script>

<script type="text/javascript">
$('.bxslider').bxSlider({
    minSlides: 1,
    maxSlides: 1,
    slideWidth: 330,
    slideMargin: 10
});
</script>
</body>
</html>