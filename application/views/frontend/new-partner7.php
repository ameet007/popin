
<?php
	$this->load->view('frontend/include-partner/header');
?>
<div id="myModal" class="modal fade new-partner-model" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Become a partner</h4>
        </div>
        <div class="modal-body">
            <button class="btn2 google-btn btn-block">Sign up with Google</button>
            <div class="signup-or-separator">
                <span class="separator-text">or</span>
                <hr>
            </div>
            <button class="btn-red btn-block">Sign up with Email</button>
            <span class="trams">By singing up, I agree to Popln’s Terms of Service, <a href="#">Nondiscrimination Policy</a>, <a href="#">Payment Terms of Services</a>, <a href="#">Privacy Policy</a>, <a href="#">Professional Refund Policy</a>, <a href="#">Owner Gurantee Terms</a>.</span>
            <div class="modal-footer clearfix">
                <div class="pull-left">
                    Alerady have a Popln account?
                </div>
                <button type="button" class="btn btn-red">Log In</button>
            </div>
        </div>
    </div>

  </div>
</div>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:20%">
        20% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner7">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How many professionals can your space accomodate?</h3>
                    <div class="feild">
                        <div class="main">
                            <input type='text' class="textbox" name='quantity' value='1 pofessionals' class='qty' />
                            <input type='button' value='' class='qtyminus' field='quantity' />
                            <input type='button' value='' class='qtyplus' field='quantity' />
                        </div>
                    </div>
                    <div class="feild">
                        <label>How many workspaces can professionals use?</label>
                        <div class="main">
                            <input type='text' class="textbox" name='quantity' value='1 workspaces' class='qty2' />
                            <input type='button' value='' class='qtyminus2' field='quantity' />
                            <input type='button' value='' class='qtyplus2' field='quantity' />
                        </div>
                    </div>
                    <div class="works-details">
                        <h4>Workspace Details</h4>
                        <ul>
                            <li class="clearfix">
                                <div class="pull-left">
                                    <strong>0 workspaces</strong>
                                    <p>Common spaces</p>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default" href="#">Add spaces</a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="pull-left">
                                    <strong>Space 1</strong>
                                    <p>0 workspaces</p>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default" href="#">Add spaces</a>
                                </div>
                            </li>
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
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url('theme/front/assests/img/blub.png')?>" alt="" />
                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?><script type="text/javascript">
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
            $('input[name='+fieldName+']').val((currentVal + 1)+" Professionals");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0 + " Professionals");
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
            $('input[name='+fieldName+']').val((currentVal - 1)+" professionals");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0+" professionals");
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
            $('input[name='+fieldName+']').val((currentVal + 1)+" workspaces");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0 + " workspaces");
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
            $('input[name='+fieldName+']').val((currentVal - 1)+" workspaces");
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0+" workspaces");
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