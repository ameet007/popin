<?php
	$this->load->view('frontend/include-partner/header2');
?>

<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:15%">
        15% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner11 new-partner28">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Set clean up procedures for professionals</h3>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Clean workspace
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Check bathroom
                        </label>
                    </div>
                    <div class="feild">
                        <label for="user_preference">
                            <input id="user_preference" type="checkbox"> Add to list
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
            <!--<div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="img/blub.png" alt="" />
                    <h5>Have an amenity that isn’t listed? Scroll down to the bottom of the list to add your own.</h5>
                </div>
            </div>-->
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