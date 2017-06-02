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
                            <li><a href="#">Your Listings</a></li>
                            <li><a href="#">Your Reservations</a></li>
                            <li class="active"><a href="#">Reservation Requirements</a></li>
                        </ul>
                    </div>
                    <a class="green-btn" href="#">Add New Listings</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default your-reservations">
                            <div class="panel-heading">Verified ID</div>
                            <div class="panel-body">
                                <p>Your guests will need to verify their ID before booking with you. <a href="#">Learn More</a></p>
                                <label for="user_preference">
                                    <input type="checkbox" id="user_preference" /> Require guests to go through verification
                                </label>
                                <button class="btn-red">Save Reservation Requirements</button>
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