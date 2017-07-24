<section class="middle-container account-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <?php $this->load->view(FRONT_DIR . '/include/account-sidebar');?>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group" id="payoutMethods">
                        <div class="panel panel-default payout-methods">
                            <div class="panel-heading">Payout Methods</div>
                            <div class="panel-body">
                            <span id="showMessage"></span>
                            <span id="lsitShow">
                             <?php 
                                if (!empty($result)) {
                                    echo $result;
                                }else{ ?>
                                <div class="align-center">
                                    <p><img src="<?= base_url('theme/front/assests/'); ?>img/icon1.png" alt="" /></p>
                                    <p><strong>To get paid, you need to set up a payout method</strong></p>
                                    <p>Popln releases payouts about 24 hours after a professional’s scheduled check-in time. <br/>The time it takes for the funds to appear in your account depends on your payout method. <a href="#">Learn more</a></p>
                                    <hr>
                                    <button id="nextMessageBox" class="btn-red">Add Payout Method</button>
                                </div>
                                <?php  }
                               ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Dipaly payout mthod message show here -->
                    <div class="panel-group" id="showMessageBox">
                        <div class="panel panel-default payout-methods">
                            <div class="panel-heading">Payout Methods</div>
                            <div class="panel-body">
                                <div class="text-justify">
                                    <!-- <p><strong>To get paid, you need to set up a payout method</strong></p> -->
                                    <p>Payouts for reservations are released to you the day after your guest checks in, and it takes some additional time for the money to arrive depending on your payout method.</p>
                                    <br>
                                    <p>We can send money to people in India with these payout methods. Which do you prefer?</p>
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th>Methods</th>
                                            <th>Processed IN</th>
                                            <th>Free</th>
                                            <th>Currency</th>
                                            <th>Details</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Bank Transferr</td>
                                            <td>3-5 bussiness days</td>
                                            <td>None</td>
                                            <td>INR</td>
                                            <td>Business daay processing only; weekends and banking holidays may cause delays.</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    <hr>
                                   <span style="float: right;" ><button id="backBTn" class="btn-red">Back</button>&nbsp;&nbsp;<button id="nextBTn" class="btn-red">Next</button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add user payout method Form-->
                    <div class="panel-group" id="payoutMethodsShow">
                        <div class="panel panel-default payout-methods">
                            <div class="panel-heading">Payout Methods</div>
                            <div class="panel-body">
                            <span id="showError"></span>
                                <div class="align-center">
                                <!-- select type add account dropdown here -->
                                <span id="dropDowShow" >
                                <select class="form-control" name="selectType" >
                                    <option value="" >Select Type</option>
                                    <option value="1" >PayPal Account</option>
                                    <option value="2" >Bank Account</option>
                                </select>
                                <hr>
                                <br>
                                <span style="float: right;"><button id="backBTnSecond" class="btn-red">Back</button></span>
                                </span>
                                <!-- Add payPal account form start here -->
                                <form id="paypalForm" class="form-horizontal">
                                <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">First Name:</label>
                                      <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="pwd" placeholder="Enter first name" name="firstName" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">Last Name:</label>
                                      <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="pwd" placeholder="Enter last name" name="lastName">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Email:</label>
                                      <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">        
                                      <div class="col-sm-offset-8 col-sm-4">
                                        <button type="button" id="SubmitForm" class="btn-red">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                  <!-- Add payPal account form close here -->
                                  <!-- Add bank account information here -->
                                <form id="bankAccountForm" class="form-horizontal">
                                <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">Bank Account Type:</label>
                                      <div class="col-sm-10">          
                                        <select class="form-control" name="BankaccountType" >
                                             <option value="" >Select Account Type</option>
                                              <option value="Personal" >Personal</option>
                                              <option value="Company" >Company</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="pwd">Bank Country:</label>
                                      <div class="col-sm-10">          
                                        <select class="form-control" name="bankCountry" >
                                             <option value="" >Select bank country</option>
                                              <option value="1" >A</option>
                                              <option value="2" >B</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Bank Name:</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" placeholder="Enter bank name" name="bankName" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Account Number:</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter account number" name="accountNumber" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">IFSC Code:</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" placeholder="Enter IFSC code" name="ifscCode" required="">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">PAN Number:</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" placeholder="Enter PAN Number" name="panNumber">
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Account Type:</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="accountType" >
                                             <option value="" >Select account type </option>
                                              <option value="Current Account" >Current Account</option>
                                              <option value="Saving Account" >Saving Account</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">        
                                      <div class="col-sm-offset-8 col-sm-4">
                                        <button type="button" id="bankDetailsSumbit" class="btn-red">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                  <!-- close here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Close here form -->
                </article>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
 $('#payoutMethodsShow').css('display','none');
 $('#showMessageBox').css('display','none');
 $('#bankAccountForm').hide();
});
 $('#nextBTn').click(function(){
    $('#showMessageBox').css('display','none');
    $('#payoutMethods').css('display','none');
    $('#payoutMethodsShow').css('display','block');
  });
 $('#nextMessageBox').click(function(){
    $('#payoutMethods').css('display','none');
    $('#payoutMethodsShow').css('display','none');
    $('#paypalForm').hide();
    $('#showMessageBox').css('display','block');
  });
 $('#backBTn').click(function(){
    $('#showMessageBox').css('display','none');
    $('#payoutMethods').css('display','block');
    $('#payoutMethodsShow').css('display','none');
 });
 $('#backBTnSecond').click(function(){
   $('#showMessageBox').show();
   $('#payoutMethodsShow').hide();
 });
 $('select[name="selectType"]').change(function(){
    $('#dropDowShow').hide();
      if (this.value == 1) {
         $('#paypalForm').show();
      }else if (this.value == 2) {
        $('#bankAccountForm').show();
      }
 });
 $('#SubmitForm').click(function(){
   var formData = $('#paypalForm').serialize();
   $.ajax({
            url: '<?= base_url('account/checkPaypal_Preferences') ?>',
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $(".loader").show();
            },
            complete: function(){
                $('.loader').hide();
            },
            success: function(response) {
                var getvalue = response.split('||');
                 if (getvalue[1] == 'Failure') {
                   $('#showError').html('<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning! </strong> '+getvalue[0]+'</div>');
                 }else{
                    $('#payoutMethodsShow').css('display','none');
                    $('#showMessageBox').css('display','none');
                    $('#payoutMethods').css('display','block');
                    $('#showMessage').html('<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>success! </strong>You’ve successfully added a payout method</br>It’ll take up to 5 business days for us to verify it. Once its status is set to "Ready", we’ll pay you through this payout method.</div>');
                    $('#lsitShow').html(getvalue[2]);
                 }
             // <button id="nextMessageBox" class="btn-red">Add Payout Method</button> 
            }          
    });
 });
 $('#bankDetailsSumbit').click(function(){
    var formData = $('#bankAccountForm').serialize();
     $.ajax({
            url: '<?= base_url('account/addBank_details') ?>',
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $(".loader").show();
            },
            complete: function(){
                $('.loader').hide();
            },
            success: function(response) {
               if (response == 1) {
                  $('#showError').html('<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning! </strong> !Oops something is wrong. Please try again.</div>');
               }else{
                $('#payoutMethodsShow').css('display','none');
                    $('#showMessageBox').css('display','none');
                    $('#payoutMethods').css('display','block');
                    $('#showMessage').html('<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>success! </strong>You’ve successfully added a payout method</br>It’ll take up to 5 business days for us to verify it. Once its status is set to "Ready", we’ll pay you through this payout method.</div>');
                    $('#lsitShow').html(response);
               }
            }          
    });
 });
</script>