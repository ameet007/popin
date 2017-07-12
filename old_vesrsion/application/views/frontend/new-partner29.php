<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner16 new-partner24 new-partner29">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Review your guest requremnts</h3>
                    <div class="popln-pro">
                        <p>Popln’s professional requirements</p>
                        <ul>
                            <li>Profile photo</li>
                            <li>Confirmed email</li>
                            <li>Confirmed phone number</li>
                            <li>Payment information</li>
                            <li>A message about the guest’s trip</li>
                            <li>Check-in time for last minute trips</li>
                        </ul>
                        <button class="btn btn-defalut">Review</button>
                    </div>
                    <div class="popln-pro">
                        <p class="grey-color">Your additional requirements</p>
                        <p class="mr0">No additional requirements</p>
                        <button class="btn btn-defalut">Edit</button>
                    </div>
                    <div class="popln-pro">
                        <p>Your Space Rules</p>
                        <ul>
                            <li>Display License or Certificate in workspace</li>
                            <li>Not suitable for pets</li>
                            <li>Events or parties allowed</li>
                            <li>Minimum age requirement for professionals is 18</li>
                            <li>Must wear black </li>
                        </ul>
                        <button class="btn btn-defalut">Edit</button>
                    </div>
                    <div class="popln-pro">
                        <p>Clean up procedures</p>
                        <ul>
                            <li>Clean workspace</li>
                            <li>Check towel levels</li>
                            <li>Put client magazines back</li>
                            <li>Say goodbye to everyone working</li>
                        </ul>
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