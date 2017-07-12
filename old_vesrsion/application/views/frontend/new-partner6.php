<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:10%">
        10% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>What kind of space are you listing?</h3>
                    <div class="feild">
                        <label>What type of establishment is this?</label>
                        <select class="selectbox">
                            <option>Hair salon</option>
                            <option>Hair salon</option>
                            <option>Hair salon</option> 
                        </select>
                    </div>
                    <div class="feild">
                        <label>What type of space is this?</label>
                        <select class="selectbox">
                            <option>Personal station</option>
                            <option>Hair salon</option>
                            <option>Hair salon</option> 
                        </select>
                    </div>
                    <div class="feild">
                        <label>Establishment License</label>
                        <select class="selectbox">
                            <option>Personal station</option>
                            <option>Hair salon</option>
                            <option>Hair salon</option> 
                        </select>
                    </div>
                    <div class="feild">
                        <label class="btn-block">Establishment License</label>
                        <label class="btn btn-default btn-file">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i> <input type="file" style="display: none;"> Upload Photo
                        </label>
                    </div>
                    <div class="feild">
                        <label class="btn-block">Liabilty Insurance</label>
                        <label class="btn btn-default btn-file">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i> <input type="file" style="display: none;"> Upload Photo
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
            <div class="col-md-4 entire-palce">
                <div class="entire-main">
                    <img src="<?php echo base_url()?>assests/img/blub.png" alt="" />
                    <h5>Entire place</h5>
                    <p>Professionals will rent the entire place.</p>
                    <h5>Private room</h5>
                    <p>Professionals share some spaces but they'll have their own private room for clients or work</p>
                    <h5>Shared room</h5>
                    <p>Professionals don't have a room to themselves.</p>
                    <h5>Private suite</h5>
                    <p>Professionals have their own suite within the establishment.</p>
                    <h5>Shared suite</h5>
                    <p>Professionals share a suite within the establishment. </p>
                    <h5 class="mr20">Booth</h5>
                    <h5 class="mr20">Personal station</h5>
                    <h5 class="mr20">Stocked station</h5>

                </div>
            </div>
        </div>
    </div>    
</section>
<?php
	$this->load->view('frontend/include-partner/footer');
?>
</body>
</html>