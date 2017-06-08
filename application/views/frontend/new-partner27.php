<?php
	$this->load->view('frontend/include-partner/header2');
?>
<link href="<?php echo base_url('theme/front/assests/css/btnswitch.css')?>" rel="stylesheet" type="text/css" />
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:15%">
        15% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner25 new-partner27">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Set space rules for professionals</h3>
                    <ul>
                        <li class="clearfix">
                            <div class="pull-left">
                                <p>Age Requirements</p>
                                <input type="text" placeholder="18+" />
                            </div>
                            <div class="pull-right">
                                <div class="demo1"></div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="pull-left">
                                <p>Display License or Certificate in workspace</p>
                            </div>
                            <div class="pull-right">
                                <div class="demo1"></div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="pull-left">
                                <p>Suitable for pets</p>
                            </div>
                            <div class="pull-right">
                                <div class="demo1"></div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="pull-left">
                                <p>Events or parties allowed</p>
                            </div>
                            <div class="pull-right">
                                <div class="demo1"></div>
                            </div>
                        </li>
                    </ul>
                    <div class="add-rules">
                        <h4>Additional rules</h4>
                        <div class="alert alert-dismissable">
                            Must wear blank
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <div class="textbox clearfix">
                            <span class="pull-left">Quiet hours? No shoes in the house?</span>
                            <span class="pull-right">Add</span>
                        </div>
                    </div>
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
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url('theme/front/assests/img/blub.png')?>" alt="" />
                    <h5>In addition to Popln requirements, guests must agree to all your Hou. Rules before they book.</h5>
                    <h5>If you're ever uncomfortable with a reservation, you can cancel penalty-free before or during a trip.</h5>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script src="<?php echo base_url('theme/front/assests/js/jquery-3.1.1.slim.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/btnswitch.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/nav.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    $('.demo1').btnSwitch();
</script>
</body>
</html>