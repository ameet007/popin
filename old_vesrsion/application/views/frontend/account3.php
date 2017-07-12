<?php
	$this->load->view('frontend/include/header');
?>
<section class="middle-container account-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
											<?php
												$this->load->view('frontend/include/account-sidebar');
											?>
                    </div>
                    <a class="btn btn-default btn-block" href="#">Rental Credit</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default payout-methods">
                            <div class="panel-heading">Payout Methods</div>
                            <div class="panel-body">
                                <div class="align-center">
                                    <p><img src="<?php echo base_url()?>assests/img/icon1.png" alt="" /></p>
                                    <p><strong>To get paid, you need to set up a payout method</strong></p>
                                    <p>Popln releases payouts about 24 hours after a guest’s scheduled check-in time. <br/>The time it takes for the funds to appear in your account depends on your payout method. <a href="#">Learn more</a></p>
                                    <button class="btn-red">Add Payout Method</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php
	$this->load->view('frontend/include/footer');
?>
