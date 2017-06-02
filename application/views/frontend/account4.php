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
                            <li class="active"><a href="#">Transaction History</a></li>
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
                        <div class="panel panel-default transa_history">
                            <div class="panel-heading">
                                <div id="exTab1">	
                                    <ul  class="nav nav-pills">
                                        <li class="active"><a  href="#1a" data-toggle="tab">Completed Transactions</a></li>
                                        <li><a href="#2a" data-toggle="tab">Future Transactions</a></li>
                                        <li><a href="#3a" data-toggle="tab">Gross Earnings</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Type</th>
                                                        <th>Details</th>
                                                        <th>Amount</th>
                                                        <th>Paid Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>03/04/17</td>
                                                    <td>Rental</td>
                                                    <td>March 3, 2017 9a-3p <br/>Orange <br/>Station A</td>
                                                    <td>$60</td>
                                                    <td>$58.20</td>
                                                  </tr>
                                                  <tr>
                                                    <td>03/07/17</td>
                                                    <td>Workshop</td>
                                                    <td>March 06, 2017 <br />Orange <br/>Introduction to Letterpressing</td>
                                                    <td>$100</td>
                                                    <td>$90</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="2a">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Type</th>
                                                        <th>Details</th>
                                                        <th>Amount</th>
                                                        <th>Paid Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>03/04/17</td>
                                                    <td>Rental</td>
                                                    <td>March 3, 2017 9a-3p <br/>Orange <br/>Station A</td>
                                                    <td>$60</td>
                                                    <td>$58.20</td>
                                                  </tr>
                                                  <tr>
                                                    <td>03/07/17</td>
                                                    <td>Workshop</td>
                                                    <td>March 06, 2017 <br />Orange <br/>Introduction to Letterpressing</td>
                                                    <td>$100</td>
                                                    <td>$90</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="3a">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Type</th>
                                                        <th>Details</th>
                                                        <th>Amount</th>
                                                        <th>Paid Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>03/04/17</td>
                                                    <td>Rental</td>
                                                    <td>March 3, 2017 9a-3p <br/>Orange <br/>Station A</td>
                                                    <td>$60</td>
                                                    <td>$58.20</td>
                                                  </tr>
                                                  <tr>
                                                    <td>03/07/17</td>
                                                    <td>Workshop</td>
                                                    <td>March 06, 2017 <br />Orange <br/>Introduction to Letterpressing</td>
                                                    <td>$100</td>
                                                    <td>$90</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
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