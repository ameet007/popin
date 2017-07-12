<?php $userID = $this->session->userdata('user_id'); $upcomingRentals = $this->user->getUpcomingRentals($userID); ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rentals <span class="caret"></span></a>
<ul class="dropdown-menu">
    <li>
        <a href="<?= site_url('rentals'); ?>">
            <div class="view-trip clearfix">
                <div class="pull-left"><strong>Rentals</strong></div>
                <div class="pull-right"><strong>View Rentals</strong></div>
            </div>
        </a>
    </li>
    <?php if(!$upcomingRentals):?>
    <li>
        <div class="no-upcoming">
            <div class="content">
                <h4>No upcoming rentals</h4>
<!--                <p>Continue searching in Patagonia</p>-->
            </div>
            <div class="img-icon">
                <div class="inner">
                    <img src="<?= base_url('theme/front/img/nav-icon1.jpg'); ?>" width="75" height="75" alt="" />
                </div>
            </div>
        </div>
    </li>
    <?php else: foreach($upcomingRentals as $rental): ?>
    <li>
        <a href="<?= site_url('rentals'); ?>">
            <div class="no-upcoming">
                <div class="content">
                    <p><b><?= $rental['space']['title'];?></b>-<?= $rental['booking']['partnerStatus'];?></p>
                    <p><?= date('d M', strtotime($rental['booking']['checkIn'])).' - '. date('d M', strtotime($rental['booking']['checkOut']));?>&nbsp;<span class="dot">.</span>&nbsp;<?= $rental['booking']['professionals']; ?><?= $rental['booking']['professionals'] == 1?" professional":" professionals";?></p>
                </div>
                <div class="img-icon">
                    <div class="inner">
                        <img src="<?= $rental['space']['image'];?>" width="75" height="75" alt="" />
                    </div>
                </div>
            </div>
        </a>
    </li>
    <?php endforeach; endif; ?>
    <li>
        <a href="<?= site_url('wishlists'); ?>">
            <div class="view-trip clearfix">
                <div class="pull-left"><strong>Wish Lists</strong></div>
                <div class="pull-right"><strong>View Wish Lists</strong></div>
            </div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="no-upcoming">
                <div class="content">
                    <h4>No Wish List created</h4>
                    <p>Create a wish list</p>
                </div>
                <div class="img-icon">
                    <div class="inner">
                        <img src="<?= base_url('theme/front/img/nav-icon2.png'); ?>" alt="" />
                    </div>
                </div>
            </div>
        </a>
    </li>
</ul>