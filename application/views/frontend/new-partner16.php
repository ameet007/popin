<?php
	$this->load->view('frontend/include-partner/header3');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Start creating your description</h3>
                    <div class="feild">
                        <input type="text" class="textbox" placeholder="My business is close to" />
                    </div>
                    <div class="feild">
                        <input type="text" class="textbox" placeholder="You’ll love my workspaces because of" />
                    </div>
                    <div class="feild">
                        <textarea class="textarea" placeholder="Products carried in my business (optional)"></textarea>
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
                    <h5>This description will appear at the top of your listing page. We have selected common questions professionals have when looking for a workspace. You can edit and write more next. </h5>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>

</body>
</html>