<?php
	$this->load->view('frontend/include-partner/header');
?>

<section class="middle-container new-partner5 new-partner13 new-partner23">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-6 hi-cassiday">
                <h3>Last step!</h3>
                <p>Let’s set up your pricing and figure out your renting calender.</p>
                <div class="step">
                    <strong>STEP 1</strong>
                    <h5>Beds, bathrooms, amenities, and more</h5>
                    <a href="#">Change</a>
                </div>
                <div class="step ">
                    <strong>STEP 2</strong>
                    <h5>Photos, short description, title</h5>
                    <a href="#">Change</a>
                </div>
                <div class="step step2">
                    <strong>STEP 3</strong>
                    <h3>Get ready for professionals</h3>
                    <h5>Renting settings, calendar, price</h5>
                    <button class="btn-red">Continue</button>
                </div>
            </div>
        </div>
    </div>
    <div class="for-one">
        <div class="media">
            <div class="media-body media-middle">
                <h4 class="media-heading">New Attitudes Salon</h4>
                <a href="#">Preview</a>
            </div>
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="<?php echo base_url('theme/front/assests/img/salon-img.jpg')?>" alt="...">
                </a>
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