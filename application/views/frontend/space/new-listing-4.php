<?php $stepData = $this->session->userdata('stepData'); ?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
        60% Complete
    </div>
</div>
<section class="middle-container new-partner6 new-partner7 new-partner8">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>How many bathrooms</h3>
                    <form action="<?php echo site_url('Space/location'); ?>" method="post">
                        <div class="feild">
                            <div class="main">
                                <input type='text' class="textbox" name='bathrooms' value='<?php echo isset($stepData['step1']['page3']['bathrooms'])? $stepData['step1']['page3']['bathrooms'] : '1'?> bathroom' class='qty' />
                                <input type='button' value='' class='qtyminus' field='bathrooms' />
                                <input type='button' value='' class='qtyplus' field='bathrooms' />
                            </div>
                        </div>
                        <div class="feild">
                            <label>Is your bathroom ADA Compliant? <i class="fa fa-question-circle" aria-hidden="true"></i></label>
                            <!-- <a href="#" class="btn btn-default">Yes</a>
                            <a href="#" class="btn2">No</a> -->
                            <input id="toggle-demo" type="checkbox" name="bathroomADACompliant" value="1"  <?php echo (isset($stepData['step1']['page3']['bathroomADACompliant']) && $stepData['step1']['page3']['bathroomADACompliant'] == 'Yes')? 'checked' : ''?>>
                        </div>
                        <div class="next-prevs clearfix">
                            <div class="pull-left">
                                <a class="gost-btn" href="<?php echo site_url('Space/workspace-detail'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                            <div class="pull-right">
                                <button class="btn-red">Next</button>
                            </div>
                        </div>
                    </form>
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
<style type="text/css">
    .new-partner6 .toggle-group label{
        margin-bottom: 0 !important;
    }
    .new-partner6 .toggle-group label.toggle-on{
        color: #fff;
    }
    .toggle-handle{
        height: 100% !important;
    }
    .new-partner8 .toggle-group .btn {
        padding-top: 12px;
        padding-bottom: 12px;
    }
</style>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#toggle-demo').bootstrapToggle({
          on: 'Yes',
          off: 'No',
          size: 'mini',
          onstyle: 'success'
        });
    })
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
    
    $("form").submit(function(e){
        //e.preventDefault();
        
        var bathrooms = parseInt($("input[name='bathrooms']").val());
        
        $("label.bathrooms").remove();
        
        if(isNaN(bathrooms) || bathrooms < 1){
            var errorMsg = $('<label for="bathrooms" class="error bathrooms">Please select a valid value.</label>');            
            errorMsg.insertAfter($("input[name='bathrooms']").parent());
            return false;
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