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
                            <li class="active"><a href="#">Notifications</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Payout Preferences</a></li>
                            <li><a href="#">Transaction History</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Connected Apps</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Badges</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-default btn-block" href="#">Rental Credit</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default push-noti">
                            <div class="panel-heading">Push Notification Settings</div>
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-left">
                                        <p>Receive Push Notifications to your iPhone, iPad or Android device.</p>
                                    </div>
                                    <div class="media-body">
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Messages</strong>
                                                    <p>From partners and users</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Rental Updates</strong>
                                                    <p>Requests, confirmations, changes and more</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Account Activity</strong>
                                                    <p>Changes made to your account</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Workshop Recommendations</strong>
                                                    <p>Experience suggestions and price alerts</p>
                                                </label>
                                            </div>
                                        </div>
                                        <!--<div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Travel Assistant</strong>
                                                    <p>Helpful tips to improve your trip</p>
                                                </label>
                                            </div>
                                        </div>-->
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Other</strong>
                                                    <p>Feature updates and more</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default push-noti">
                            <div class="panel-heading">Text Message Settings</div>
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-left">
                                        <p>Receive mobile updates by regular SMS text message.</p>
                                        <p><strong>Note:</strong> For more information, text HELP to 247262. To cancel mobile notifications, reply STOP to 247262. Message and Data rates may apply.</p>
                                    </div>
                                    <div class="media-body">
                                        <div class="receive-sms">
                                            <ul>
                                                <li>Receive SMS notifications to: <br /><a href="#">Change phone numbers</a></li>
                                                <li>
                                                    <select>
                                                        <option selected>+1*** *** 3903</option>
                                                        <option>+1*** *** 3904</option>
                                                        <option>+1*** *** 3904</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Messages</strong>
                                                    <p>From partners and users</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Rental Updates</strong>
                                                    <p>Requests, confirmations, changes and more</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Other</strong>
                                                    <p>Feature updates and more</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default push-noti">
                            <div class="panel-heading">Email Settings</div>
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-left">
                                        <p><strong>I want to receive:</strong></p>
                                        <p>You can disable these at any time.</p>
                                    </div>
                                    <div class="media-body">
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>General and promotional emails</strong>
                                                    <p>General promotions, updates, news about Popln or general promotions for partner campaigns and services, user surveys, inspiration, and love from Popln. </p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Rental and review reminders</strong>
                                                    <p>Notifications about upcoming trips and review periods.</p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Account activity </strong>
                                                    <p>Payment notices, Rental confirmations, review activity, and security alerts. These are required to service your account. You may not opt out of these notices.</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default push-noti">
                            <div class="panel-heading">Phone Preferences</div>
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-left">
                                        <p><strong>I want to receive:</strong></p>
                                        <p>You can disable these at any time.</p>
                                    </div>
                                    <div class="media-body">
                                        <div class="checkbox-him">
                                            <div class="row">
                                                <label class="col-sm-1">
                                                    <input id="new" type="checkbox">
                                                </label>
                                                <label for="new" class="col-sm-11">
                                                    <strong>Calls about my account, listings, Rentals, or the Popln community</strong>
                                                    <p>If you opt out, we may still call you about your account if it’s urgent or if previous emails didn’t reach you.</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="align-right">
                            <a class="btn-red" href="#">Save</a>
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