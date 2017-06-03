<?php
	$this->load->view('frontend/include-partner/header3');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:80%">
        80% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner18">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Name your space</h3>
                    <div class="feild">
                        <input type="text" class="textbox" placeholder="Listing Title" />
                    </div>
                    <div class="feild">
                        <input type="text" class="textbox" placeholder="Business Name" />
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
                    <img src="<?php echo base_url()?>assests/img/blub.png" alt="" />
                    <h5>You can simply use your business name or make your own name for each workspace you are listing. We recommend haying unique names for each workspace to make it easier to manage Some examples include naming them alphabetically or using street names.</h5>
                </div>
            </div>
        </div>
    </div>    
</section>

<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script type="text/javascript">
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
</script>
</body>
</html>