<?php
include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";

// Google Project API Credentials
$clientId = '962031527806-lgqqsh28c4cn3g15c758i7pcasct4g33.apps.googleusercontent.com';
$clientSecret = '5rrDAy51MKP6M0kYZY86XbZt';
$redirectUrl = base_url() . 'user/google_verification';

// Google Client Configuration
$gClient = new Google_Client();
$gClient->setApplicationName(SITE_DISPNAME);
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);
$google_oauthV2 = new Google_Oauth2Service($gClient);

if (isset($_REQUEST['code'])) {
    $gClient->authenticate();
    $this->session->set_userdata('token', $gClient->getAccessToken());
    redirect($redirectUrl);
}

$token = $this->session->userdata('token');
if (!empty($token)) {
    $gClient->setAccessToken($token);
}
$authUrl = $gClient->createAuthUrl();

$phoneVerified = strtolower($userProfileInfo->phone_verify);
$googleVerified = strtolower($userProfileInfo->googleVerified);

$establishmentLicenceLink = trim($userProfileInfo->establishmentLicence);
if ($userProfileInfo->establishmentLicence != '') {
    $establishmentLicenceLink = base_url('uploads/user/document/' . $userProfileInfo->establishmentLicence);
}
$establishmentLicenseVerified = strtolower($userProfileInfo->establishmentLicenseVerified);

$liabilityInsuranceLink = trim($userProfileInfo->liabilityInsurance);
if ($userProfileInfo->liabilityInsurance != '') {
    $liabilityInsuranceLink = base_url('uploads/user/document/' . $userProfileInfo->liabilityInsurance);
}
$liabilityInsuranceVerified = strtolower($userProfileInfo->liabilityInsuranceVerified);

$licenceLink = trim($userProfileInfo->licenceCopy);
if ($userProfileInfo->licenceCopy != '') {
    $licenceLink = base_url('uploads/user/document/' . $userProfileInfo->licenceCopy);
}
$licenceCopyVerified = strtolower($userProfileInfo->licenceCopyVerified);

$message_notification = $this->session->flashdata('message_notification')
?>
<?php if ($message_notification) { ?>
    <!-- Message Notification Start -->
    <div id="message_notification">
        <div class="alert alert-<?= $this->session->flashdata('class'); ?>">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <center><strong><?= $message_notification; ?></strong></center>
        </div>
    </div>
    <!-- Message Notification End -->
<?php } ?>
<section class="middle-container account-section profile-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <?php $this->load->view('frontend/include/profile-sidebar'); ?>
                </aside>
                <form name="trustProfile" id="trustProfile" method="post" action="<?= base_url('user/submit_trust'); ?>" enctype="multipart/form-data">
                    <article class="col-lg-9 main-right">
                        <div class="panel-group">
<!--                            <div class="panel panel-default profile-photo mr20">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <strong>Be ready to book</strong>
                                            You’ll need to provide identification before you book, so get a head start by doing it now. Learn more
                                        </div>
                                        <div class="col-md-5 align-center">
                                            <a href="javascript:void(0);" class="btn-red">Provide ID</a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="panel panel-default verified-info">
                                <div class="panel-heading">Your verified info</div>
                                <div class="panel-body">
                                    <h4 class="mr5">Email address</h4>
                                    <p>You have confirmed your email: <b><?= $userProfileInfo->email; ?></b>.<br/>A confirmed email is important to allow us to securely communicate with you.</p>
                                    <?php if ($phoneVerified == 'yes'){ ?>
                                    <h4 class="mt15 mr5">Phone number</h4>
                                    <p>Your number is only shared with another <?= SITE_DISPNAME; ?> member once you have a confirmed booking.</p>
                                    <?php } if ($googleVerified == 'yes') { ?>
                                    <h4 class="mt15 mr5">Google</h4>
                                    <p>Your <?= SITE_DISPNAME; ?> account is Connected with Google account.</p>
                                    <?php } if ($establishmentLicenseVerified == 'yes' && !empty($establishmentLicenceLink)) { ?>
                                    <h4 class="mt15 mr5">Establishment license <small>(SUBMITTED)</small></h4>

                                    <?php } if ($liabilityInsuranceVerified == 'yes' && !empty($liabilityInsuranceLink)) { ?>
                                    <h4 class="mt15 mr5">Liability insurance <small>(SUBMITTED)</small></h4>

                                    <?php } if ($licenceCopyVerified == 'yes' && !empty($licenceLink)) { ?>
                                    <h4 class="mt15 mr5">License / Certificate Copy <small>(SUBMITTED)</small></h4>

                                    <?php } ?>
                                </div>
                            </div>
                            
                            <div class="panel panel-default profile-photo verified-info">
                                <div class="panel-heading">Documents</div>
                                <div class="panel-body">
                                    <form name="trustProfile" id="trustProfile" method="post" action="<?= base_url('user/submit_trust'); ?>" enctype="multipart/form-data">
                                        <div class="row mr15">
                                            <div class="col-md-9">
                                                <h4>Establishment license</h4>
                                                <?php
                                                if (!empty($establishmentLicenceLink)) {
                                                $licenceCopy  = explode(".",$establishmentLicenceLink);
                                                if ($licenceCopy[1] == 'pdf') { ?>
                                                    <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><i class="fa fa-file-pdf-o fa-5x" aria-hidden="true"></i></a>
                                                <?php }else if ($licenceCopy[1] == 'doc' || $licenceCopy[1] == 'docx') { ?>
                                                    <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><i class="fa fa-file-word-o fa-5x" aria-hidden="true"></i></a>
                                                <?php  }else{ ?>
                                                    <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $establishmentLicenceLink; ?>" style="height:100px;" ></a>
                                                <?php  }}else{ ?>
                                                If you are listing your space, verify ownership by providing us with your license.
                                                <?php }?>
                                                <p class="establishmentLicenceError"></p>
                                            </div>
                                            <div class="col-md-3 align-center">
                                                <input type="file" name="establishmentLicence" id="establishmentLicence" required>
                                            </div>
                                        </div>
                                        <div class="row mr15">
                                            <div class="col-md-9">
                                                <h4>Liability insurance</h4>
                                                <?php
                                                if (!empty($liabilityInsuranceLink)) {
                                                $licenceCopy  = explode(".",$liabilityInsuranceLink);
                                                if ($licenceCopy[1] == 'pdf') { ?>
                                                    <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><i class="fa fa-file-pdf-o fa-5x" aria-hidden="true"></i></a>
                                                <?php }else if ($licenceCopy[1] == 'doc' || $licenceCopy[1] == 'docx') { ?>
                                                    <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><i class="fa fa-file-word-o fa-5x" aria-hidden="true"></i></a>
                                                <?php  }else{ ?>
                                                    <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $liabilityInsuranceLink; ?>" style="height:100px;" ></a>
                                                <?php  }}else{ ?>
                                                Upload a copy of your liability insurance.
                                                <?php }?>
                                                <p class="liabilityInsuranceError"></p>
                                            </div>
                                            <div class="col-md-3 align-center">
                                                <input type="file" name="liabilityInsurance" id="liabilityInsurance" required>
                                            </div>
                                        </div>
                                        <div class="row mr15">
                                            <div class="col-md-9">                                            
                                                <h4>License / Certificate Copy</h4>
                                                <?php
                                                if (!empty($licenceLink)) {
                                                $licenceCopy  = explode(".",$licenceLink);
                                                if ($licenceCopy[1] == 'pdf') { ?>
                                                    <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                                <?php }else if ($licenceCopy[1] == 'doc' || $licenceCopy[1] == 'docx') { ?>
                                                    <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><i style="font-size: 100px;" class="fa fa-file-word-o" aria-hidden="true"></i></a>
                                                <?php  }else{ ?>
                                                   <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><img title="View Licence" src="<?php echo $licenceLink; ?>" style="height:100px;" ></a>
                                                <?php  }}else{ ?>
                                                Upload a copy of your license or certificate to avoid the hassle later.
                                                <?php }?>
                                                <p class="licenceCopyError"></p>
                                            </div>
                                            <div class="col-md-3 align-center">
                                                <input  type="file" name="licenceCopy" id="licenceCopy">
                                            </div>
                                        </div>
                                        <input type="hidden" name="OldEstablishmentLicence" id="OldEstablishmentLicence" value="<?= $userProfileInfo->establishmentLicence; ?>">
                                        <input type="hidden" name="OldLiabilityInsurance" id="OldLiabilityInsurance" value="<?= $userProfileInfo->liabilityInsurance; ?>">
                                        <input type="hidden" name="OldLicenceCopy" id="OldLicenceCopy" value="<?= $userProfileInfo->licenceCopy; ?>">
                                        <input type="submit" name="submit" id="submit" class="btn green-btn pull-right" value="Upload">
                                    </form>
                                </div>
                            </div>
                            <?php if ($googleVerified != 'yes' || $phoneVerified != 'yes') { ?>
                            <div class="panel panel-default profile-photo verified-info">
                                <div class="panel-heading">Not Yet Verified</div>
                                <div class="panel-body">
                                    <div class="row mr15">
                                        <?php if ($phoneVerified != 'yes') { ?>
                                        <div class="col-md-12 mr20">
                                            <h4 class="mr5">Phone number</h4>
                                            <p>Your number is only shared with another <?php SITE_DISPNAME;  ?> member once you have a confirmed booking.</p>
                                         </div>
                                        <?php }?>

                                        <?php if ($googleVerified != 'yes') { ?>
                                        <div class="col-md-8">
                                            <h4 class="mr5">Google</h4>
                                            Connect your <?= SITE_DISPNAME; ?> account to your Goole account for simplicity and ease.
                                        </div>
                                        <div class="col-md-4 align-center">
                                            <a class="btn btn-default btn-file" href="<?php echo $authUrl; ?>"> Connect with Google </a>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </article>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function (e) {
        $('#trustProfile').validate({
            rules: {
                phone: {required: true},
                licenceCopy: {
                    extension: "jpg|png|jpeg|gif|doc|pdf|docx"
                },
                establishmentLicence: {
                    extension: "jpg|png|jpeg|gif|doc|pdf|docx"
                },
                liabilityInsurance: {
                    extension: "jpg|png|jpeg|gif|doc|pdf|docx"
                }
            },
            messages: {
                phone: {required: "Please Enter Phone Number"},
                licenceCopy: {
                    extension: "Allowed File Types Are JPG, PNG, JPEG, GIF, Doc, Pdf, Docx"
                },
                establishmentLicence: {
                    extension: "Allowed File Types Are JPG, PNG, JPEG, GIF, Doc, Pdf, Docx"
                },
                liabilityInsurance: {
                    extension: "Allowed File Types Are JPG, PNG, JPEG, GIF, Doc, Pdf, Docx"
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === 'licenceCopy') {
                    error.appendTo('.licenceCopyError');
                } else if (element.attr("name") === 'establishmentLicence')
                {
                    error.appendTo('.establishmentLicenceError');
                } else if (element.attr("name") === 'liabilityInsurance')
                {
                    error.appendTo('.liabilityInsuranceError');
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>