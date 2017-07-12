<?php $stepData = $this->session->userdata('stepData'); ?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
        20% Complete
    </div>
</div>
<section class="middle-container new-partner6">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What kind of space are you listing?</h3>
                    <form action="<?php echo site_url('Space/professionals'); ?>" method="post" enctype="multipart/form-data">
                        <div class="feild">
                            <label>What type of establishment is this?</label>
                            <select class="selectbox" name="page1[establishmentType]">
                                <?php foreach($establishment_types as $establishment){ ?>
                                <option value="<?= $establishment['id']; ?>" <?php echo (isset($stepData['start']['establishment']) && $stepData['start']['establishment'] == $establishment['id'])? 'selected' : ''?>><?= $establishment['name']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="feild">
                            <label>What type of space is this?</label>
                            <select class="selectbox" name="page1[spaceType]">
                                <?php foreach($space_types as $space){ ?>
                                <option value="<?= $space['id']; ?>" <?php echo (isset($stepData['start']['space']) && $stepData['start']['space'] == $space['id'])? 'selected' : ''?>><?= $space['name']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="feild">
                            <label>Establishment License Number</label>
                            <?php $errors_3 = $this->session->flashdata('errors_3'); if(!empty($errors_3)){ ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $errors_3; ?></div><?php }?>
                            <input type="text" class="textbox" name="page1[establishmentLicence]" placeholder="Establishment License Number" value="<?php echo isset($stepData['step1']['page1']['establishmentLicence'])? $stepData['step1']['page1']['establishmentLicence'] : ""?>"  required/>                            
                        </div>
                        <div class="feild row">   
                            <?php $errors_1 = $this->session->flashdata('errors_1'); if(!empty($errors_1)){ ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $errors_1; ?></div><?php }?>
                            <div class="col-sm-8">                                
                                <label class="btn-block">Establishment License</label>
                                <label class="btn btn-default btn-file">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> <input type="file" style="display: none;" name="establishmentLicenceFile" onchange="readImageURL(this, 'establishmentLicenceFile');"> Upload Photo
                                </label>
                            </div>
                            <?php 
                            $establishmentLicenceFile = "";
                            if(isset($stepData['step1']['page1']['establishmentLicenceFile']) && !empty($stepData['step1']['page1']['establishmentLicenceFile'])):
                                $establishmentLicenceFile = base_url('uploads/user/document/'.$stepData['step1']['page1']['establishmentLicenceFile']);
                            endif;
                            ?>
                            <div class="col-sm-4">
                                <img id="establishmentLicenceFile" src="<?= $establishmentLicenceFile; ?>" alt="establishmentLicenceFile" <?php if($establishmentLicenceFile == ""){?>style="display: none;"<?php }?>>
                            </div>
                        </div>
                        <div class="feild row">
                            <?php $errors_2 = $this->session->flashdata('errors_2'); if(!empty($errors_2)){ ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $errors_2; ?></div><?php }?>
                            <div class="col-sm-8">                                
                                <label class="btn-block">Liability Insurance</label>
                                <label class="btn btn-default btn-file">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> <input type="file" style="display: none;" name="liabilityInsurance" onchange="readImageURL(this, 'liabilityInsuranceFile');"> Upload Photo
                                </label>
                            </div>
                            <?php 
                            $liabilityInsuranceFile = "";
                            if(isset($stepData['step1']['page1']['liabilityInsurance']) && !empty($stepData['step1']['page1']['liabilityInsurance'])):
                                $liabilityInsuranceFile = base_url('uploads/user/document/'.$stepData['step1']['page1']['liabilityInsurance']);
                            endif;
                            ?>
                            <div class="col-sm-4">
                                <img id="liabilityInsuranceFile" src="<?= $liabilityInsuranceFile; ?>" alt="liabilityInsuranceFile" <?php if($liabilityInsuranceFile == ""){?>style="display: none;"<?php }?>>
                            </div>
                        </div>
                        <div class="next-prevs clearfix">
                            <div class="pull-left">
                                <a class="gost-btn" href="<?php echo site_url('Space'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                            <div class="pull-right">
                                <button class="btn-red" type="submit">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url('theme/front/assests/img/bulb.png')?>" alt="" />
                    <?php foreach($establishment_types as $key => $establishment){ ?>
                    <span id="show-<?= $key; ?>" class="sidebar-box hidden">
                        <h5><?= $establishment['name']; ?></h5>
                        <p><?= $establishment['description']; ?></p>
                    </span>
                    <?php }?>
                    
                    <?php foreach($space_types as $key => $space){ ?>
                    <span id="show2-<?= $key; ?>" class="sidebar-box-2 hidden">
                        <h5><?= $space['name']; ?></h5>
                        <p><?= $space['description']; ?></p>
                    </span>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>    
</section>
<script>
    $(document).ready(function(){
        show_hide_sidebar(".sidebar-box", "#show", $("select[name='page1[establishmentType]']").find("option:selected").index());
        $("select[name='page1[establishmentType]']").on("change", function(){
            var optionSelected = $(this).find("option:selected");
            show_hide_sidebar(".sidebar-box", "#show", optionSelected.index());
        });
        
        show_hide_sidebar(".sidebar-box-2", "#show2", $("select[name='page1[spaceType]']").find("option:selected").index());
        $("select[name='page1[spaceType]']").on("change", function(){
            var optionSelected = $(this).find("option:selected");
            show_hide_sidebar(".sidebar-box-2", "#show2", optionSelected.index());
        });
        
        $(':file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
        });
    });
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    
    function show_hide_sidebar(section, target, box_id){
        $(section).addClass("hidden");
        $(target + "-" + box_id).removeClass("hidden");
    }
    function readImageURL(input, target_id) {
        if (input.files && input.files[0] && (typeof FileReader !== "undefined")) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + target_id)
                    .attr('src', e.target.result)
                    .fadeIn('slow');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>