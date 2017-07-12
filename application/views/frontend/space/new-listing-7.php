<?php $stepData = $this->session->userdata('stepData'); ?>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
        100% Complete
    </div>
</div>
<section class="middle-container new-partner6 new-partner11">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What spaces can professionals use?</h3>
                    <form id="spaces-form" action="<?php echo site_url('Space/spaces_submit'); ?>" method="post">
                        <?php $spaces = unserialize(SPACES); 
                        foreach($spaces as $k=>$v){ ?>
                        <div class="feild">
                            <label for="<?= $k; ?>">
                                <input id="<?= $k; ?>" type="checkbox" name="facilities[]" value="<?= $k; ?>" <?php echo (isset($stepData['step1']['page6']['facilities']) && !empty($stepData['step1']['page6']['facilities']) && in_array($k, $stepData['step1']['page6']['facilities']))? 'checked' : ''?>> <?= $k; ?>
                                <?php if(!empty($v['desc'])): ?>
                                <span><?= $v['desc']; ?></span>
                                <?php endif;?>
                            </label>
                        </div>
                        <?php } ?> 
                        <div class="next-prevs clearfix">
                            <div class="pull-left">
                                <a class="gost-btn" href="<?php echo site_url('Space/amenities'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                            <div class="pull-right">
                                <img class="loader" src="<?php echo base_url()?>/assets/images/loading-spinner-grey.gif">&nbsp;&nbsp;
                                <button class="btn-red">Finish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url('theme/front/assests/img/bulb.png')?>" alt="" />
                    <p>Spaces should be on the property. Don’t include laundromats or nearby places that aren’t part of your property.</p>
                </div>
            </div>
        </div>
    </div>    
</section>
<script type="text/javascript">
$(".loader").hide();
$("#spaces-form").submit(function(e){
    e.preventDefault();
    $(".loader").show();
    $(this).find('button').text('Please wait...');
    $.post($(this).attr('action'), $(this).serialize(), function(){
        $(".loader").hide();
        $('#spaces-form button').text('Finished');
        window.location.href = "<?= site_url('Space/become-a-partner'); ?>";
    });
});
</script>
</body>
</html>