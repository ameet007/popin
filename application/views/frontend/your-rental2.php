<?php
	$this->load->view('frontend/include/user-header');
?>
<?php $all_countries = unserialize(ALL_COUNTRY); ?>
<!--<div class="print-section">
    <div class="container">
        <div class="row">
            <div class="media">
                <div class="media-left col-md-3">
                    <a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> To Itinerary</a>
                </div>
                <div class="media-body">
                    <button class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<section class="middle-container receipt-section">
    <div class="container">
        <div class="row">
            <div class="receipt-top clearfix">
                <h2>Receipt: 4 hours in <?= $spaceInfo['city'].', '.$spaceInfo['state']; ?></h2>
                <div class="pull-left">
                    <p>Booked by <strong><?= $userInfo->firstName.' '.$userInfo->lastName; ?></strong> <br/><?= date("l, M d, Y", $bookingInfo['createdDate']); ?></p>
                </div>
                <div class="pull-right">
                    <p><strong><?= $bookingInfo['partnerStatus']; ?></strong><br><?= $bookingInfo['transactionId']; ?></p>
                </div>
            </div>
            <div class="row receipt-slip clearfix">
                <div class="col-md-5">
                    <div class="receipt-left">
                        <ul>
                            <li class="clearfix">
                                <div class="pull-left">
                                    <span>Pop In</span>
                                    <strong><?= date("M d, Y", strtotime($bookingInfo['checkIn'])); ?>: 8a</strong>
                                </div>
                                <div class="pull-right">
                                    <span>Pop Out</span>
                                    <strong><?= date("M d, Y", strtotime($bookingInfo['checkOut'])); ?>: 12p</strong>
                                </div>
                            </li>
                            <li>
                                <?php 
                                $establishmentType = $this->space->getDropdownDataRow('establishment_types', $spaceInfo['establishmentType']); 
                                $spaceType = $this->space->getDropdownDataRow('space_types', $spaceInfo['spaceType']);
                                ?>
                                <h4><?= $establishmentType['name']; ?></h4>
                                <p><?= $spaceType['name']; ?> in <?= $spaceInfo['city']; ?> <br/><?= $spaceInfo['streetAddress']; ?> <?= !empty(trim($spaceInfo['suiteBuilding']))?'<br>'.$spaceInfo['suiteBuilding']:''; ?><br/><?= $spaceInfo['city']; ?>, <?= $spaceInfo['state']; ?> <?= $spaceInfo['zipCode']; ?> <br/><?= $all_countries[$spaceInfo['country']]; ?></p>
                                <p class="mr0">Hosted by <?= $hostInfo->firstName.' '.$hostInfo->lastName; ?> <br/>Phone: <?= $spaceInfo['mobileNumber']; ?></p>
                            </li>
                            <li>
                                <h4><?= $bookingInfo['professionals']; ?> Professional(s) on this rental</h4>
<!--                                <div class="media">
                                     <div class="media-left">
                                         <a href="#"><img class="media-object" src="<?php echo base_url('theme/front/assests/img/small-pic1.png')?>" alt=""></a>
                                     </div>
                                     <div class="media-body">
                                         <p>Cassidy Garcia</p>
                                     </div>
                                </div>
                                <a href="#"> &nbsp;+&nbsp; &nbsp; 1 more guest</a>-->
                            </li>
                        </ul>
                    </div>
                    <div class="receipt-left business-trip">
                        <h3>Business trip notes</h3>
                        <span class="font12"><?= !empty(trim($bookingInfo['professionalNote']))?$bookingInfo['professionalNote']:'None added'; ?></span>
                    </div>
                </div>
                <?php $bookingCurrency = getCurrency_symbol($bookingInfo['currency']); ?>
                <div class="col-md-7">
                    <div class="receipt-right">
                        <h3>Charges</h3>
                        <ul>
                            <li class="clearfix">
                                <div class="pull-left"><?= $bookingCurrency.$bookingInfo['amount']; ?> x <?= $bookingInfo['numberBooking'].' '.strtolower($bookingInfo['bookingType']).'(s)'; ?></div>
                                <div class="pull-right"><?= $bookingCurrency.($bookingInfo['amount'] * $bookingInfo['numberBooking']); ?></div>
                            </li>
                            <li class="clearfix">
                                <div class="pull-left">Additional Charges</div>
                                <div class="pull-right"><?= $bookingCurrency.$bookingInfo['addtionalCosts']; ?></div>
                            </li>
<!--                            <li class="clearfix">
                                <div class="pull-left">Cleaning fees</div>
                                <div class="pull-right">$5</div>
                            </li>
                            <li class="clearfix">
                                <div class="pull-left">Service fee</div>
                                <div class="pull-right">$5</div>
                            </li>
                            <li class="clearfix">
                                <div class="pull-left">Coupon discount</div>
                                <div class="pull-right">$5</div>
                            </li>-->
                        </ul>
                        <footer class="clearfix">
                            <div class="pull-left"><strong>Total</strong></div>
                            <div class="pull-right"><strong><?= $bookingCurrency.$bookingInfo['totalAmount']; ?></strong></div>
                        </footer>
                    </div>
                    
                    <div class="receipt-right payment">
                        <h3>Payment</h3>
                        <ul>
                            <?php if(!$bookingInfo['transactionId']): ?>
                            <li class="clearfix">
                                <div class="pull-left">Status: <?= $bookingInfo['paymentStatus'] ?></div>
                            </li>
                            <?php else: ?>
                            <li class="clearfix">
                                <div class="pull-left">Charged to <?= $bookingInfo['paymentAccount']; ?> <br/><?= date("M d, Y", $bookingInfo['updatedDate']); ?></div>
                                <div class="pull-right"><?= $bookingCurrency.$bookingInfo['totalAmount']; ?></div>
                            </li>
                            <?php endif;?>
                        </ul>
                        <footer class="clearfix">
                            <a href="#">Add billing details</a>
                        </footer>
                    </div>
                    
                </div>
            </div>
            <div class="cost-per">
                <strong>Cost per hour</strong>
                <p>This rental was <strong><?= getCurrency_symbol($spaceInfo['currency']).$spaceInfo['base_price']; ?></strong> per hour, excluding <br/>taxes and other fees</p>
                <strong>Security Deposit</strong>
                <p>A Partner requires a Security Deposit of $50 to book this <br />listing. The Renter is responsible for the amount of the <br/>Security Deposit, but it will not be charged unless the partner makes a claim</p>
            </div>
            <div class="need-help clearfix">
                <div class="pull-left">
                    <h4>Need help?</h4>
                    <p>Visit the <a href="#">Help Center</a> for any questions.</p>
                </div>
                <div class="pull-right">
                    <p><?= $bookingInfo['transactionId']; ?> <br/>Booked by <strong><?= $userInfo->firstName.' '.$userInfo->lastName; ?></strong> <br/><?= date("l, M d, Y", $bookingInfo['createdDate']); ?></p>
                </div>
            </div>
            <div class="policy">
                <p><strong>Cancellation policy:</strong> <a href="#">Strict.</a> Certain fees and taxes may be non-refundable. See <a href="#">here</a> for more details.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p><strong>Explanation of Security Deposit</strong></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <p>Payment Processed by:<br/><strong>Popln, Inc.</strong><br/>1253 E. Imperial Highway<br/>Placentia, CA 92870</p>
            </div>
        </div>
    <div>
</section>
<?php
	$this->load->view('frontend/include/user-footer');
?>