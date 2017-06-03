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
                        <div class="panel panel-default pay-methods">
                            <div class="panel-heading">Payment Methods</div>
                            <div class="panel-body">
                                <div class="add-payment">
                                    <ul>
                                        <li class="clearfix">
                                            <p>xxxxxxxxxxxxx7535 <br/>05/2019</p>
                                            <div class="wrap">
                                                <div class="pull-left">
                                                    <a href="#">Set Default</a>
                                                    <a href="#">Remove</a>
                                                </div>
                                                <div class="pull-right">
                                                    <img src="<?php echo base_url()?>assests/img/visa-icon.png" alt="" />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="center">
                                            <center><img src="<?php echo base_url()?>assests/img/add-plus.png" alt="" /></center>
                                            <p>Add Payment Method</p>
                                        </li>
                                    </ul>
                                </div>
                                <p>Remember: Popln will never ask you to wire money. <a href="#">Learn more</a>.</p>
                            </div>
                        </div>
                        <div class="panel panel-default gift-card">
                            <div class="panel-heading">Gift Card</div>
                            <div class="panel-body">
                                <h3>Popln gift card balance: <spna>0</spna></h3>
                                <p>The credit balance from gift cards will be automatically applied when you book a trip.</p>
                                <p class="card_code">Popln gift card code</p>
                                <ul>
                                    <li><input type="text" /></li>
                                    <li><button class="btn-red">Apply to Account</button></li>
                                </ul>
                                <a href="#">Popln gift cards help</a>
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
