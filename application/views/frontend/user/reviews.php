<section class="middle-container account-section profile-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
						<ul>
							<li><a href="<?php echo base_url('user/profile')?>">Edit Profile</a></li>
                            <li><a href="<?php echo base_url('user/photo');?>">Photos</a></li>
                            <li><a href="<?php echo base_url('user/trust')?>">Trust and Verification</a></li>
                            <li class="active"><a href="<?php echo base_url('user/reviews')?>">Reviews</a></li>
                            <li><a href="<?php echo base_url('user/references')?>">References</a></li>
						</ul>
                    </div>
                    <a class="btn btn-default btn-block" href="javascript:void(0);">View Profile</a>
                </aside>
                <article class="col-lg-9 main-right">
                    <div id="exTab2">
                        <ul class="nav nav-tabs mr20">
                            <li class="active"><a href="#1" data-toggle="tab">Reviews About You</a></li>
                            <li><a href="#2" data-toggle="tab">Reviews By You</a></li>
                        </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="1">
                            <div class="panel-group">
                                <div class="panel panel-default reviews">
                                    <div class="panel-heading">Past Reviews</div>
                                    <div class="panel-body">
                                        <p>Reviews are written at the end of a reservation through <?= SITE_DISPNAME; ?>. Reviews you’ve received will be visible both here and on your public profile.</p>
                                        <p class="font12">No one has reviewed you yet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="panel-group">
                                <div class="panel panel-default reviews">
                                    <div class="panel-heading">Past Reviews</div>
                                    <div class="panel-body">
                                        <p>Reviews are written at the end of a reservation through <?= SITE_DISPNAME; ?>. Reviews you’ve received will be visible both here and on your public profile.</p>
                                        <p class="font12">No one has reviewed you yet.</p>
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
