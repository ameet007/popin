<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:50%">
        50% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner32">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Let’s get started with a couple questions</h3>
                    <div class="feild">
                        <p>Have you rented out your space before?</p>
                        <select class="selectbox">
                            <option selected="selected">I have</option>
                            <option>I have 2</option>
                            <option>I have 3</option>
                        </select>
                    </div>
                    <div class="feild">
                        <p>How often do you want to have professionals?</p>
                        <select class="selectbox">
                            <option selected="selected">Not sure yet</option>
                            <option>Not sure yet 2</option>
                            <option>Not sure yet 3</option>
                        </select>
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
                    <h5>Based on your responses, we can recommend specific availability settings for you.</h5>
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