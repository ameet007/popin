<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:30%">
        30% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner7 new-partner8">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How many bathrooms</h3>
                    <div class="feild">
                        <div class="main">
                            <input type='text' class="textbox" name='quantity' value='1 pofessionals' class='qty' />
                            <input type='button' value='' class='qtyminus' field='quantity' />
                            <input type='button' value='' class='qtyplus' field='quantity' />
                        </div>
                    </div>
                    <div class="feild">
                        <label>Is your bathroom ADA Compliant? <i class="fa fa-question-circle" aria-hidden="true"></i></label>
                        <a href="#" class="btn btn-default">Yes</a>
                        <a href="#" class="btn2">No</a>
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
                </div>
            </div>-->
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script type="text/javascript">
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val((currentVal + 1)+" bathroom");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0 + " bathroom");
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val((currentVal - 1)+" bathroom");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0+" bathroom");
        }
    });
    
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
</script>
</body>
</html>