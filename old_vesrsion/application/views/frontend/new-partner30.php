<?php
	$this->load->view('frontend/include-partner/header2');
?>
<link href="<?php echo base_url()?>assests/css/btnswitch.css" rel="stylesheet" type="text/css" />
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner25 new-partner30">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Here’s how professionals will book with you</h3>
                    <div class="pro-find">
                        <p>1. Professionals find your listing in search.</p>
                        <img src="<?php echo base_url()?>assests/img/30img1.png" alt="" />
                    </div>
                    <div class="pro-find">
                        <p>2. Professionals who meet your requirement can book available time without requirement approval.</p>
                        <img src="<?php echo base_url()?>assests/img/30img2.png" alt="" />
                    </div>
                    <div class="pro-find">
                        <p>3. You’ll get a message form your frofessional about their rental, along with the reservation confirmation, how many clients theys are meeting, and check-in time.</p>
                        <img src="<?php echo base_url()?>assests/img/30img3.png" alt="" />
                    </div>
                    <ul>
                        <li class="clearfix">
                            <div class="pull-left">
                                <p>Require rental requests</p>
                            </div>
                            <div class="pull-right">
                                <div class="demo1"></div>
                            </div>
                        </li>
                    </ul>
                    <div class="next-prevs clearfix">
                        <div class="pull-left">
                            <a class="gost-btn" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn-red" href="#">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script src="<?php echo base_url()?>assests/js/jquery-3.1.1.slim.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assests/js/btnswitch.js" type="text/javascript"></script>
<script type="text/javascript">
    $('.demo1').btnSwitch();
</script>
</body>
</html>