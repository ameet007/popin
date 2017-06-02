<?php
	$this->load->view('frontend/include/header');
?>

<section class="middle-container account-section listings-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
                        <ul>
                            <li class="active"><a href="#">Your Listings</a></li>
                            <li><a href="#">Your Reservations</a></li>
                            <li><a href="#">Reservation Requirements</a></li>
                        </ul>
                    </div>
                    <a class="green-btn" href="#">Add New Listings</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default your-listings">
                            <div class="panel-body">
                                <h3>You don’t have any listings!</h3>
                                <p>Make money by renting out your extra space on Popln. You’ll also get to meet interesting travelers from around the world!</p>
                                <button class="btn-red">Post a new listing</button>
                            </div>
                        </div>
                        <!--<div class="panel panel-default verified-info">
                            <div class="panel-heading">Your verified info</div>
                            <div class="panel-body">
                                <h4>Email address</h4>
                                <p>You have confirmed your email: abc@gmail.com. A confirmed email is important to allow us to securely communicate with you.</p>                               
                            </div>
                        </div>-->
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php
	$this->load->view('frontend/include/footer');
?>