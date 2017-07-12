<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner24 new-partner31">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Successful hosting starts with your calender</h3>
                    <p>Professionals will book available days instantly. Only get booked when you can he by keeping your calendar and availability settings up-to-date.</p>
                    <p>Canceling disrupts professional's schedules. If you cancel because your calendar is inaccurate, you'll be charged a penalty fee and the times won't be available for anyone else to rent.</p>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> I understand! I'll keep my calender up to date.
                        </label>
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
                    <h5>To prevent scheduling mishaps, we offer a service to manage your calendar for a small monthly fee. <br>This will allow you to.</h5>
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