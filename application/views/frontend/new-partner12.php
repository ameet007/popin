<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
        100% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner11">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What spaces can professionals use?</h3>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Kitchen
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Laundy - washer
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Laundy - dryer
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Parking
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Elevator
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Pool
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Hot tub
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Gym
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Other
                        </label>
                    </div>
                    <div class="next-prevs clearfix">
                        <div class="pull-left">
                            <a class="gost-btn" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn-red" href="#">Finish</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url()?>assests/img/blub.png" alt="" />
                    <p>Spaces should be on the property. Don’t include laundromats or nearby places that aren’t part of your property.</p>
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