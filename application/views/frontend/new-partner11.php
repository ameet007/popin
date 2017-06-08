<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:70%">
        70% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner11">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What amenities do you offer?</h3>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Essentials
                            <span>Towels, bed sheets, soap and toilet paper</span>
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> wifi
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Shampoo
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Closet/drawers
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> TV
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Heat
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Air Conditioning
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Breakfast, coffee. tea
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Fireplace
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Iron
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox" /> Hair dryer
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
                    <img src="<?php echo base_url('theme/front/assests/img/blub.png')?>" alt="" />
                    <h5>Have an amenity that isn’t listed? Scroll down to the bottom of the list to add your own.</h5>
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