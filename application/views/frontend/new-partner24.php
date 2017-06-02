<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:10%">
        10% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner24">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Review Pop ln’s professional requirements</h3>
                    <p>All Pop In professionals must submit the following to rent:</p>
                    <ul>
                        <li>Profile photo</li>
                        <li>Confirmed email</li>
                        <li>Confirmed phone number</li>
                        <li>Payment information</li>
                    </ul>
                    <p>Professionals must also do the following before they can rent:</p>
                    <ul>
                        <li>Agree to your Space Rules</li>
                        <li>Send you a message about their business</li>
                        <li>Tell you how many people are using workspaces</li>
                        <li>Confirm their pop-in time if they're coming the following day</li>
                        <li>Proof of liabilty insurance</li>
                        <li>Confirm their pop-in time if they're coming the following day or sooner</li>
                    </ul>
                    <p>Add more professional requirements</p>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Government-issued ID submitted to Pop In
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Government-issued License or Certificate submitted to Popln
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Reviews from other business owners and no nagative reviews
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Provide how many customers or patients are being served
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Add other
                        </label>
                    </div>
                    <p>More requirements can mean fewar rentals</p>
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
                    <h5>You nee to feel confident with every reservation. That’s why we require certain information from every guest before they can book</h5>
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