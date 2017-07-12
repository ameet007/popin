<?php if($message_notification = $this->session->flashdata('message_notification')) { ?>
									<!-- Message Notification Start -->
									<div id="message_notification">
									<div class="alert alert-<?= $this->session->flashdata('class'); ?>">    
										<button class="close" data-dismiss="alert" type="button">×</button>
										<strong>
											<?= $this->session->flashdata('message_notification'); ?> 
										</strong>
									</div>
									</div>
									<!-- Message Notification End -->
<?php } ?>
<section class="middle-container account-section">
    <div class="container">
        <div class="main-content">
		<form name="paymentAccount" id="paymentAccount" method="post" action="<?= base_url('account/submit_payment'); ?>">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
						<ul>
							<li><a href="<?php echo base_url('account')?>" title="Notifications">Notifications</a></li>
							<li  class="active"><a href="<?php echo base_url('account/payment')?>" title="Payment Methods">Payment Methods</a></li>
							<li><a href="<?php echo base_url('account/transaction_history')?>" title="Transaction History">Transaction History</a></li>
							<li><a href="<?php echo base_url('account/privacy')?>" title="Privacy">Privacy</a></li>
							<li><a href="<?php echo base_url('account/security')?>" title="Security">Security</a></li>
							<li><a href="<?php echo base_url('account/badges')?>" title="Badges">Badges</a></li>
						</ul>
                    </div>
                    <a class="btn btn-default btn-block" href="javascript:void(0);">Rental Credit</a>
                </aside>
                 <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default pay-methods">
                            <div class="panel-heading">Payment Methods</div>
                            <div class="panel-body">
                                <div class="add-payment">
                                    <ul>
                                        <?php foreach($cardDetails as $k=>$v) { ?>
										
										<li class="clearfix">
                                            <p><?= 'XXXX-XXXX-XXXX-'.substr($v->cardNumber,-4); ?> <br/><?= (($v->expirationMonth<10)?'0'.$v->expirationMonth:$v->expirationMonth).'|'.$v->expirationYear; ?></p>
                                            <div class="wrap">
                                                <div class="pull-left">
                                                   <?php if($v->isPrimary=='Yes'){ ?>
												   Default Card
												   <?php } else { ?>
												   <a href="javascript:void(0);" onclick="setDefault('<?= $v->id; ?>')">Set Default</a>
												   <?php } ?>
                                                    <a href="javascript:void(0);" onclick="removeCard('<?= $v->id; ?>')">Remove</a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="fa fa-cc-<?= strtolower($v->cardType); ?> fa-3x"></i>
                                                </div>
                                            </div>
                                        </li>
										<?php } ?>
                                        <li class="center">
                                            <center><a href="javascript:void(0);" onclick="openAddCardBox()"><img src="<?= base_url('theme/front/img/add-plus.png'); ?>" alt="" /></a></center>
                                            <p>Add Credit / Debit Card</p>
                                        </li>
                                    </ul>
                                </div>
                                <p>Remember: <?= SITE_DISPNAME; ?> will never ask you to wire money. <a href="javascript:void(0);">Learn more</a>.</p>
                            </div>
                        </div>
                        <div class="panel panel-default gift-card">
                            <div class="panel-heading">Paypal Email Address</div>
                            <div class="panel-body">
                                <form name="paymentAccount" id="paymentAccount" method="post" action="<?= base_url('account/submit_payment'); ?>">
                                <ul>
                                    <li><input type="text" name="paypalEmail" id="paypalEmail" value="<?= $userProfileInfo->paypalEmail; ?>" /></li>
                                    <li><button type="submit" name="submit" id="submit" class="btn-red">Apply To Account</button></li>
                                </ul>
							 </form>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </form>
		</div>
    </div>
</section>
<!--User Sign In Model Start-->
<div id="addCardBox" class="modal fade new-partner-model new-signup" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Credit / Debit Card</h4>
            </div>
			<form name="addCardForm" id="addCardForm" method="post" action="<?= base_url('account/submit_card'); ?>">
            <div class="modal-body">
                <div class="felid">
                    <input placeholder="Card Number" id="cardNumber" name="cardNumber" value="" class="textbox" type="text" />
                </div>
                <div class="felid barthday">
                    <label>Expiration <i class="fa fa-question-circle" aria-hidden="true"></i></label>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="selectbox" name="expirationMonth" id="expirationMonth">
                                <?php $all_months = unserialize(MONTH_DIG); 
								foreach($all_months as $k=>$v){ ?>
								<option value="<?= $k; ?>"><?= $v; ?></option>
								<?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="selectbox" name="expirationYear" id="expirationYear">
								<option value="">Year</option>
								<?php for($i=date('Y');$i<=(date('Y')+20);$i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
				<div class="felid">
                </div><br><br>
				<input type="submit" class="btn-red btn-block" name="card_submit" id="card_submit" value="Add Card">
            </div>
			</form>
	   </div>
    </div>
</div>
<!--User Sign In Modal End-->
<script>
function openAddCardBox()
{
	$('#addCardBox').modal('show');
}
$(document).ready(function(e) {
		$('#paymentAccount').validate({
					rules: {
						paypalEmail : {email:true},
						
					},
					messages : {
						paypalEmail : {email : "Please Enter Valid Paypal Email Address"}
					}
				});		
		$('#addCardForm').validate({
					rules: {
						cardNumber : {required:true,creditcard: true},
						expirationMonth : {required:true},
						expirationYear : {required:true}						
					},
					messages : {
						cardNumber : {required : "Please Enter Card Number",creditcard: "Please Enter Valid Card Number"},
						expirationMonth : {required:"Please Select Expiration Month"},
						expirationYear : {required:"Please Select Expiration Year"}
					}
				});	
    });
	
function setDefault(id)
{
	if (confirm('Are You Sure Want To Set This Card As Default Card ?')) {
		window.location.href = "<?= base_url('account/set_default/') ?>"+id;
		
	} else {
		return false;
	}
}

function removeCard(id)
{
	if (confirm('Are You Sure Want To Remove This Card ?')) {
		window.location.href = "<?= base_url('account/remove_card/') ?>"+id;
	} else {
		return false;
	}
}

</script>
