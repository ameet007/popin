<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:50%">
        50% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner32 new-partner33">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How much notice do you need before a professional arrives?</h3>
                    <div class="feild">
                        <p>Have you rented out your space before?</p>
                        <select class="selectbox">
                            <option selected="selected">1 hour</option>
                            <option>2 hour</option>
                            <option>3 hour</option>
                        </select>
                    </div>
                    <p><span>Tip:</span> At least 1 day’s notice can help you plan for a professionals arrival, but you might miss out on last-minute rentals.</p>
                    <h5>When can professionals rent your workspace?</h5>
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
                        <li><img src="<?php echo base_url('theme/front/assests/img/today-img1.jpg')?>" alt="" /></li>
                        <li><img src="<?php echo base_url('theme/front/assests/img/today-img2.jpg')?>" alt="" /></li>
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