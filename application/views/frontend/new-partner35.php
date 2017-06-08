<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:70%">
        70% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner32 new-partner33 new-partner35">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How far in advance can professionals book?</h3>
                    <div class="feild">
                        <select class="selectbox">
                            <option selected="selected">3 months</option>
                            <option>2 months</option>
                            <option>1 months</option>
                        </select>
                    </div>
                    <p><span>Tip:</span> Tip: Most owners can keep their calendars updated up to 3 months out.</h5>
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
                <div class="to-day">
                    <h5>Today</h5>
                    <ul class="clearfix">
                        <li><img src="<?php echo base_url('theme/front/assests/img/calender-img1.jpg')?>" alt="" /></li>
                        <li><img src="<?php echo base_url('theme/front/assests/img/calender-img2.jpg')?>" alt="" /></li>
                        <li><img src="<?php echo base_url('theme/front/assests/img/calender-img3.jpg')?>" alt="" /></li>
                    </ul>
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