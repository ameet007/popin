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
                        <div class="panel panel-default social-connec change-pass">
                            <div class="panel-heading">Change Your Password</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="col-md-5 text-right">
                                            <label for="old_password">Old Password</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input id="old_password"  type="password" />
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-lg-7">
                                        <div class="col-md-5 text-right">
                                            <label for="old_password">New Password</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input id="old_password"  type="password" />
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-lg-7">
                                        <div class="col-md-5 text-right">
                                            <label for="old_password">Confirm Password</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input id="old_password"  type="password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="panel-footer">
                                        <div class="align-right">
                                            <button class="btn-red">Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default social-connec change-pass">
                            <div class="panel-heading">Change Your Password</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Browser/Device</th>
                                                <th>Location <i class="fa fa-question-circle" aria-hidden="true"></i></th>
                                                <th colspan="2">Recent Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Firefox<br /> Windows 7</td>
                                                <td>Noida, UP, India </td>
                                                <td>about 1 hour ago <i class="fa fa-question-circle" aria-hidden="true"></i><br /><a href="#">2 more <i class="fa fa-sort-down" aria-hidden="true"></i></a></td>
                                                <td><a href="#">Log Out</a></td>
                                            </tr>
                                            <tr>
                                                <td>Firefox<br /> Windows 7</td>
                                                <td>Noida, UP, India </td>
                                                <td>about 1 hour ago <i class="fa fa-question-circle" aria-hidden="true"></i><br /></td>
                                                <td>Logged Out</td>
                                            </tr>
                                            <tr>
                                                <td>Firefox<br /> Windows 7</td>
                                                <td>Noida, UP, India </td>
                                                <td>about 1 hour ago <i class="fa fa-question-circle" aria-hidden="true"></i><br /></td>
                                                <td>Logged Out</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="panel-footer">
                                        <div class="align-right">
                                            <p>If you see something unfamiliar, <a href="#">change your password.</a></p>
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
