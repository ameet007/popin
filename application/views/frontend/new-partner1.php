<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="partner-banner">
    <img src="<?php echo base_url()?>assests/img/partner-banner.jpg" alt="" />
    <div class="banner-txt">
        <div class="container clearfix">
            <div class="pull-left">
                <h3>Capitalize your business by listing available spaces using Popln</h3>
                <p>From tattoo artist booths to chiropractic rooms, we are the solution for most business owners to rent their extra spaces to increase profits.</p>
                <div class="align-center">
                    <a class="btn2" href="#">Use Popln Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="middle-container partner-section">
    <div class="container">
        <div class="row clarfix">
            <h3>What you could earn in <span>Northern Orange County</span></h3>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <select class="selectbox">
                            <option selected>Hair Saloon</option>
                            <option>Hair Saloon2</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="textbox" placeholder="e.g. Placentia" />
                    </div>
                    <div class="col-md-4">
                        <select class="selectbox qustion">
                            <option selected>1 workspace</option>
                            <option>2 workspace</option>
                        </select>
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="weekly-average">
                    <h4>$580</h4>
                    <p>weekly average</p>
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
