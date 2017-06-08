<?php
	$this->load->view('frontend/include-partner/header2');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:70%">
        70% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner7 new-partner33 new-partner36">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How long can professionals stay?</h3>
                    <div class="feild">
                        <div class="main">
                            <input type='text' class="textbox" name='quantity' value='hours min' class='qty' />
                            <input type='button' value='' class='qtyminus' field='quantity' />
                            <input type='button' value='' class='qtyplus' field='quantity' />
                        </div>
                    </div>
                    <div class="feild">
                        <div class="main">
                            <input type='text' class="textbox" name='quantity' value='hours max' class='qty2' />
                            <input type='button' value='' class='qtyminus2' field='quantity' />
                            <input type='button' value='' class='qtyplus2' field='quantity' />
                        </div>
                    </div>
                    <p><span><strong>Tips:</strong></span> Shorter rentals can mean more profit.</p>
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
                    <pre>1 night                          No max</pre>
                    <img src="<?php echo base_url('theme/front/assests/img/gredient-img1.jpg')?>" alt="" />
                    
                </div>
            </div>
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
            $('input[name='+fieldName+']').val((currentVal + 1)+" hours min");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0 + " hours min");
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
            $('input[name='+fieldName+']').val((currentVal - 1)+" hours min");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0+" hours min");
        }
    });
    
    $('.qtyplus2').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val((currentVal + 1)+" hours max");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0 + " hours max");
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus2").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val((currentVal - 1)+" hours max");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0+" hours max");
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