<?php
	$this->load->view('frontend/include-partner/header3');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:80%">
        80% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner19">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Add your photo</h3>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="<?php echo base_url('theme/front/assests/img/user_pic-225x225.png')?>" alt="" /></a>
                        </div>
                        <div class="media-body">
                            <button class="btn btn-default"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Photo</button>
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
                    <h5>Everyone on Pop In has a profile photo, including professionals. this way you know who's coming, and professionals know that they're dealing with a real person too.</h5>
                    <h5>Make sure the photo clearly shows your face.</h5>
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