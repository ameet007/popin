<?php
	$this->load->view('frontend/include-partner/header');
?>
<div class="progress">
    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:40%">
        40% Complete (warning)
    </div>
</div>
<section class="middle-container new-partner6 new-partner9">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8">
                <div class="space-are">
                    <h3>Where’s your business located?</h3>
                    <div class="feild">
                        <label>Country</label>
                        <select class="selectbox">
                            <option>United States</option>
                            <option>United States1</option>
                            <option>United States2</option> 
                        </select>
                    </div>
                    <div class="feild">
                        <label>Street Address</label>
                        <div class="alert alert-danger">
                            <input type="text" class="textbox" placeholder="e.g 123 Main St." />
                        </div>
                    </div>
                    <div class="feild">
                        <label>Suite, Bldg. (optional)</label>
                        <input type="text" class="textbox" placeholder="e.g. Apt #7" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="feild">
                                <label>City</label>
                                <input type="text" class="textbox" placeholder="Fullerton" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feild">
                                <label>State</label>
                                <input type="text" class="textbox" placeholder="CA" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="feild">
                                <label>ZIP Code</label>
                                <div class="alert alert-danger">
                                    <input type="text" class="textbox" placeholder="e.g. 94103" />
                                </div>
                            </div>
                        </div>
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