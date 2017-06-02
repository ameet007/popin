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
                            <li class="active"><a href="#">Your Reservations</a></li>
                            <li><a href="#">Reservation Requirements</a></li>
                        </ul>
                    </div>
                    <a class="green-" href="#">Add New Listings</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default your-reservations">
                            <div class="panel-body">
                                <p>You have no upcoming reservations.</p>
                                <a href="#">View past reservation history</a>
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