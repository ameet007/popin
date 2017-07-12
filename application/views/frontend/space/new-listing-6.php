<?php $stepData = $this->session->userdata('stepData'); ?>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
        90% Complete
    </div>
</div>
<section class="middle-container new-partner6 new-partner11 new-partner25">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What amenities do you offer?</h3>
                    <form id="amenities-form" action="<?php echo site_url('Space/amenities_submit'); ?>" method="post">
                        <?php $amenities = unserialize(AMENITIES); 
                        foreach($amenities as $k=>$v){ ?>
                        <div class="feild">
                            <label for="<?= $k; ?>">
                                <input id="<?= $k; ?>" type="checkbox" name="amenities[]" value="<?= $k; ?>" <?php echo (isset($stepData['step1']['page5']['amenities']) && !empty($stepData['step1']['page5']['amenities']) && in_array($k, $stepData['step1']['page5']['amenities']))? 'checked' : ''?>> <?= $k; ?>
                                <?php if(!empty($v['desc'])): ?>
                                <span><?= $v['desc']; ?></span>
                                <?php endif;?>
                            </label>
                        </div>
                        <?php } ?> 
                        <div class="add-rules">
                            <div class="additional-rules">
                                <?php 
                                if(isset($stepData['step1']['page5']['amenities']) && !empty($stepData['step1']['page5']['amenities'])){ 
                                    $amenityArray = array_keys($amenities);
                                    foreach($stepData['step1']['page5']['amenities'] as $amenity){
                                        if(!in_array($amenity, $amenityArray)){
                                ?>
                                <div class="append-div">
                                    <input class="textbox" name="amenities[]" value="<?= $amenity; ?>" type="text" readonly />
                                    <a class="clos cancel-rule" href="#"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt="" /></a>
                                </div>
                                <?php }}} ?>
                            </div>
                            <div class="clearfix">
                                <span class="pull-left"><input id="rule-text" class="textbox" type="text" placeholder="Add your own amenities" ></span>
                                <span class="pull-left"><button class="red-btn" id="add-rule" type="button">Add</button></span>
                            </div>
                        </div>
                        <div class="next-prevs clearfix">
                            <div class="pull-left">
                                <a class="gost-btn" href="<?php echo site_url('Space/location'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                            <div class="pull-right">
                                <img class="loader" src="<?php echo base_url()?>/assets/images/loading-spinner-grey.gif">&nbsp;&nbsp;
                                <button class="btn-red" type="submit">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url('theme/front/assests/img/bulb.png')?>" alt="" />
                    <h5>Have an amenity that isn't listed? Scroll down to the bottom of the list to add your own.</h5>
                </div>
            </div>
        </div>
    </div>    
</section>
<style>
    .new-partner25 .add-rules .pull-left .textbox{
        width: 300px;
    }
</style>
<script type="text/javascript">
$(".loader").hide();
$("#amenities-form").submit(function(e){
    e.preventDefault();
    $(".loader").show();
    $(this).find("button[type='submit']").text('Please wait...');
    $.post($(this).attr('action'), $(this).serialize(), function(){
        $(".loader").hide();
        $("#amenities-form button[type='submit']").text('Next');
        window.location.href = "<?= site_url('Space/spaces'); ?>";
    });
});
$('#add-rule').click(function(){
    var text = $('#rule-text').val();
    if(text.trim() !== ""){
        $('.additional-rules').append('<div class="append-div"><input class="textbox" name="amenities[]" value="'+text+'" type="text" readonly /><a class="clos cancel-rule" href="#"><img src="<?= base_url('theme/front/assests/img/alert-close-icon.png'); ?>" alt="" /></a></div>');
        $('#rule-text').val('');
    }
});
$(document).on('click','.cancel-rule',function(event){
    event.preventDefault();
    $(this).parent('div').remove();
});
$(document).on("keypress", "input#rule-text", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('add-rule').click();
    }
});
</script>
</body>
</html>