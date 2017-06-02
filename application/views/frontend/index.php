<?php
	$this->load->view('frontend/include/header');
?>

<section class="middle-container">
    <div class="container">
        <div class="alert alert-info fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><img src="<?php echo base_url()?>assests/img/alert-close-icon.png" alt="" /></a>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="<?php echo base_url()?>assests/img/doller-icon.png" alt="" />
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Earn $5 rental credit</h4>
                    <p>Give your colleagues $5 off their first rental on Popln and you’ll get up to $20 rental credit.</p>
                    <button class="btn2">Invite Colleagues</button>
                    <button class="btn btn-default">Later</button>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="profile">
                        <div class="pro-img">
                            <img src="<?php echo base_url()?>assests/img/pic-1.jpg" alt="" />
                        </div>
                        <div class="pro-content">
                            <h3>Cassidy</h3>
                            <a href="#">View Profile</a>
                            <a href="#">Edit Peofile</a>
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Verified info</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><span class="pull-left">Personal info</span> <span class="pull-right"><img src="<?php echo base_url()?>assests/img/right-singh.png" alt="" /></span></li>
                                    <li class="clearfix"><span class="pull-left">Email address</span> <span class="pull-right"><img src="<?php echo base_url()?>assests/img/right-singh.png" alt="" /></span></li>
                                    <li class="clearfix"><span class="pull-left">Phone number</span> <span class="pull-right"><img src="<?php echo base_url()?>assests/img/right-singh.png" alt="" /></span></li>
                                    <li class="clearfix"><span class="pull-left">Work email</span> <span class="pull-right"><img src="<?php echo base_url()?>assests/img/right-singh.png" alt="" /></span></li>
                                    <li class="clearfix"><a href="#">Verify more info</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Connected accounts</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><span class="pull-left">Google</span> <span class="pull-right"><img src="<?php echo base_url()?>assests/img/right-singh.png" alt="" /></span></li>
                                    <li class="clearfix"><a href="#">Verify more info</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Quick Links</div>
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Upcoming Rentals</a></li>
                                    <li><a href="#">Listing on Popln</a></li>
                                    <li><a href="#">Renting on Popln</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default notification">
                            <div class="panel-heading">Notifications</div>
                            <div class="panel-body">
                                <ul>
                                    <li class="clearfix"><a href="#">Cassidy, new spaces have arrived! Book now before they run out.</a><span class="pull-right"><a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a></span></li>
                                    <li class="clearfix"><a href="#">Book workshops. led by experienced business owners. Now over, 51 to choose form.</a><span class="pull-right"><a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a></span></li>
                                    <li class="clearfix"><a href="#">Invite your friend to join Popln and you’ll get $10 after their first rental.</a><span class="pull-right"><a href="#"><img src="<?php echo base_url()?>assests/img/close-icon.png" alt="" /></a></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default notification messages">
                            <div class="panel-heading">Messages (O New)</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td><center><img src="<?php echo base_url()?>assests/img/pic-2.jpg" alt="" /></center></td>
                                                <td><span class="dark-gery">Freya <br />08/11/2016</span></td>
                                                <td>Okay!! <br />Orange, CA (April 14, 2017 10a-2p)</td>
                                                <td>
                                                    <h4>Accepted</h4>
                                                    <span class="price">&40</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a class="link" href="#">All messages</a>
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