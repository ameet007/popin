
<?php
	$this->load->view('frontend/include-partner/header');
?>
<div id="myModal" class="modal fade new-partner-model welcom" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Welcoming professionals starts here</h4>
            </div>
            <div class="modal-body">
                <p>As Pop ln partner, you’re responsible for welcoming Professionals, clients and patients of all backgrounds, form the moment you’re considering a rental to the moment you,re greeting professionals for the first time. Please take time to read this commitment.</p>
                <p>I agree to treat everyone in the Popln community-regardless of their race, religion, national origin, ethnicity, disability, sex, gender identity, sexual orientation, or age-with respect, and without judgement or bias. </p>
                <button class="btn-red">Accept</button>
                <button class="gost-btn">Decline</button>
            </div>
        </div>
    </div>
</div>

<div class="partner-banner">
    <img src="<?php echo base_url()?>assests/img/partner-banner.jpg" alt="" />
    <div class="banner-txt">
        <div class="container clearfix">
            <div class="pull-left">
                <h3>Capitalize your business by listing available spaces using Popln</h3>
                <p>From tattoo artist booths to chiropractic rooms, we are the solution for most business owners to rent their extra spaces to increase profits.</p>
                <div class="align-center">
                    <a class="btn2" href="#">Use Popln Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="middle-container partner-section">
    <div class="container">
        <div class="row clarfix">
            <h3>What you could earn in <span>Northern Orange County</span></h3>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <select class="selectbox">
                            <option selected>Hair Saloon</option>
                            <option>Hair Saloon2</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="textbox" placeholder="e.g. Placentia" />
                    </div>
                    <div class="col-md-4">
                        <select class="selectbox qustion">
                            <option selected>1 workspace</option>
                            <option>2 workspace</option>
                        </select>
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="weekly-average">
                    <h4>$580</h4>
                    <p>weekly average</p>
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