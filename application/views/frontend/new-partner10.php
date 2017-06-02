<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
        60% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner10">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Where’s your business located?</h3>
                    <h4>1253 E. Imperial Highway, Placentia, CA 92870, United States</h4>
                    <a href="#">Edit address</a>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.4125936805713!2d-117.84237618533072!3d33.90477913293525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd47235b6ea8b%3A0x2635dafc660a707e!2s1253+E+Imperial+Hwy%2C+Placentia%2C+CA+92870%2C+USA!5e0!3m2!1sen!2sin!4v1494927431171" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <p><strong>Drag pin to change location.</strong></p>
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