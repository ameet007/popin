<?php
	$this->load->view('frontend/include/header');
?>
<section class="middle-container account-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
                        <ul>
                            <li><a href="#">Notifications</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Payout Preferences</a></li>
                            <li><a href="#">Transaction History</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Security</a></li>
                            <li class="active"><a href="#">Connected Apps</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Badges</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-default btn-block" href="#">Rental Credit</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default connected-app">
                            <div class="panel-heading">Connected Apps</div>
                            <div class="panel-body">
                                <center><p>You haven’t connected any apps to your account.</p></center>
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