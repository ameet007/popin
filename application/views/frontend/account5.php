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
                        <div class="panel panel-default social-connec">
                            <div class="panel-heading">Social Connections</div>
                            <div class="panel-body">
                                <p>Social Connections highlights your Popln activity, which may include your username, Facebook profile photo, and recent locations you visited to your Facebook friends who are also on Popln.</p>
                                <p>If you turn off this feature, you will still be connected to Facebook, but your Popln activity will not be shared to other Facebook friends on Popln. Your public Popln activity (such as wish lists and public reviews) on the platform will still be shown to other Popln users.</p>
                                <p>If you want to disconnect your Facebook account from Popln, go to Trust and Verifications to <a href="#">Learn more</a>.</p>
                                <p>Share my activity with my Facebook friends that are also on Popln (recommended)</p>
                                <p><label><input type="checkbox" /> &nbsp;Share my activity with my Facebook friends that are also on Popln (recommended)</label></p>
                                <div class="row">
                                    <div class="panel-footer">
                                        <div class="align-right">
                                            <button class="btn-red">Save Social Connections</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default social-connec">
                            <div class="panel-heading">Add Name to Facebook Timeline</div>
                            <div class="panel-body">
                                <p>Check this box to automatically publish your Wish Lists to Facebook.</p>
                                <p>They'll show up in your Facebook Timeline and your friends' News Feed and Ticker.</p>
                                <p><label><input type="checkbox" /> &nbsp;Automatically publish Wish List stories to Facebook (recommended)</label></p>
                                <div class="row">
                                    <div class="panel-footer">
                                        <div class="align-right">
                                            <button class="btn-red">Save Facebook Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default social-connec">
                            <div class="panel-heading">Your Listings and Profile in Search Engines</div>
                            <div class="panel-body">
                                <p>Search engines attract lots of traffic to your listing and generate interest and bookings for our hosts.</p>
                                <p>Perhaps you want to be listed on Popln but have concerns about your listings and profile being advertised more widely. You can turn off search indexing, preventing search engines such as Google and Bing from displaying your pages in their search results.</p>
                                <p>Note: This may reduce your bookings and will take a few days to take effect.</p>
                                <p><label><input type="checkbox" /> &nbsp;Include my profile and listing in search engines like Google and Bing (recommended) </label></p>
                                <div class="row">
                                    <div class="panel-footer">
                                        <div class="align-right">
                                            <button class="btn-red">Save Findability</button>
                                        </div>
                                    </div>
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
