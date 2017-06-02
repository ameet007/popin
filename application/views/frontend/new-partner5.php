
<?php
	$this->load->view('frontend/include-partner/header');
?>
<section class="middle-container new-partner5">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-6 hi-cassiday">
                <h2>Hi, Cassidy! Let’s get your <br/>listing ready to start renting <br/>your space.</h2>
                <div class="step">Step 1</div>
                <h3>What kind of space do you have?</h3>
                <div class="row what-kind">
                    <div class="col-md-5">
                        <div class="feild">
                            <select class="selectbox">
                                <option>Hair Salon</option>
                                <option>1 workspace</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="feild">
                            <select class="selectbox">
                                <option>Hair Salon</option>
                                <option>1 workspace</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-10">
                        <div class="feild">
                            <input type="text" class="textbox" placeholder="Street Name, City, State Zip" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn-red">Continue</button>
                    </div>
                </div>
                <div class="listing-star">
                    <img src="<?php echo base_url()?>assests/img/star-icon.png" alt="" />
                    <p>Listing for a week, we thibk you could earn</p>
                    <h5>$548</h5>
                </div>
            </div>
        </div>
    </div>    
</section>


<?php
	$this->load->view('frontend/include-partner/footer');
?>
<script type="text/javascript">
    $('#myModal').modal('show');
</script>
</body>
</html>