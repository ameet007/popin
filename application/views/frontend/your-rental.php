<?php
	$this->load->view('frontend/include/user-header');
?>
<div class="rentals-banner">
    <div class="container">
        <div class="pull-left">
            <h2>Choose your next office</h2>
            <p>Give your Colleagues ₹1,200 to try Popln and you will also<br /> get ₹600 in rental credit when they complete their first rental.</p>
            <a class="green-btn" href="<?= site_url('invite');?>">Invite Colleagues</a>
        </div>
        <div class="pull-right">
            <img src="<?php echo base_url('theme/front/assests/img/promo-pak.png')?>" alt="" />
        </div>
    </div>
</div>
<?php if(!empty($userRentals['upcoming'])):?>
<section class="middle-container rentals-section">
    <div class="container">
        <h2>Upcoming Rentals</h2>
        <div class="row clearfix">
            <?php foreach($userRentals['upcoming'] as $rental):?>
            <div class="col-md-3 one-third">
                <div class="one-third-main">
                    <div class="img">
                        <img src="<?php echo $rental['space']['image']; ?>" alt="" />
                    </div>
                    <div class="content">
                        <h3><?php echo $rental['space']['title']; ?></h3>
                        <p><?php echo date("M d", strtotime($rental['booking']['checkIn'])); ?>: 8:00a-12p <br/><?php echo $rental['space']['city'].' '.$rental['space']['state'].', '.$rental['space']['country']; ?></p>
                        <ul>
                            <li></li>
                            <li><p>View Receipt</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>    
</section>
<?php endif;?>
<?php if(!empty($userRentals['past'])):?>
<section class="middle-container rentals-section">
    <div class="container">
        <h2>Past Rentals</h2>
        <div class="row clearfix">
            <?php foreach($userRentals['past'] as $rental):?>
            <div class="col-md-3 one-third">
                <div class="one-third-main">
                    <div class="img">
                        <img src="<?php echo $rental['space']['image']; ?>" alt="" />
                    </div>
                    <div class="content">
                        <h3><?php echo $rental['space']['title']; ?></h3>
                        <p><?php echo date("M d", strtotime($rental['booking']['checkIn'])); ?>: 8:00a-12p <br/><?php echo $rental['space']['city'].' '.$rental['space']['state'].', '.$rental['space']['country']; ?></p>
                        <ul>
                            <li>
                                <img src="<?php echo base_url('theme/front/assests/img/reting-star.png')?>" alt="" />
                                <p>Read Your Review</p>
                            </li>
                            <li><p>View Receipt</p></li>
                            <li><p>Send or request money</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>    
</section>
<?php endif;?>
<?php
	$this->load->view('frontend/include/user-footer');
?>