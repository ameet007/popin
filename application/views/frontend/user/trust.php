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
?>
<?php if ($message_notification = $this->session->flashdata('message_notification')) { ?>
    <!-- Message Notification Start -->
    <div id="message_notification">
        <div class="alert alert-<?= $this->session->flashdata('class'); ?>">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <center><strong><?= $this->session->flashdata('message_notification'); ?></strong></center>
        </div>
    </div>
    <!-- Message Notification End -->
<?php } ?>
<section class="middle-container account-section profile-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <div class="sidenav-list">
                        <ul>
                            <li ><a href="<?php echo base_url('user/profile/') ?>">Edit Profile</a></li>
                            <li><a href="<?php echo base_url('user/photo/') ?>">Photos</a></li>
                            <li class="active"><a href="javascript:void(0);">Trust and Verification</a></li>
                            <li><a href="<?php echo base_url('user/reviews/') ?>">Reviews</a></li>
                            <li><a href="<?php echo base_url('user/references/') ?>">References</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-default btn-block" href="<?= base_url('user/profile/'); ?>">View Profile</a>
                </aside>
                <form name="trustProfile" id="trustProfile" method="post" action="<?= base_url('user/submit_trust'); ?>" enctype="multipart/form-data">
                    <article class="col-lg-9 main-right">
                        <div class="panel-group">
                            <div class="panel panel-default profile-photo mr20">
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
                            </div>
                            <div class="panel panel-default verified-info">
                                <div class="panel-heading">Your verified info</div>
                                <div class="panel-body">
                                    <h4>Email address</h4>
                                    <p>You have confirmed your email: <b><?= $userProfileInfo->email; ?></b>. A confirmed email is important to allow us to securely communicate with you.</p>
                                    <h4>Phone number</h4>
                                    <p>Your number is only shared with another <?= SITE_DISPNAME; ?> member once you have a confirmed booking.</p>
                                    <?php if ($userProfileInfo->googleVerified == 'Yes') { ?>
                                        <h4>Google</h4>
                                        <p>Your <?= SITE_DISPNAME; ?> account is Connected with Goole account.</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="panel panel-default profile-photo verified-info">
                                <div class="panel-heading">Documents</div>
                                <div class="panel-body">
                                    <div class="row mr15">
                                        <div class="col-md-9">
                                            <?php
                                            if ($userProfileInfo->licenceCopy != '') {
                                                $licenceLink = base_url('uploads/user/document/' . $userProfileInfo->licenceCopy);
                                            } else {
                                                $licenceLink = 'javascript:void(0);';
                                            }
                                            if ($userProfileInfo->establishmentLicence != '') {
                                                $establishmentLicenceLink = base_url('uploads/user/document/' . $userProfileInfo->establishmentLicence);
                                            } else {
                                                $establishmentLicenceLink = 'javascript:void(0);';
                                            }
                                            if ($userProfileInfo->liabilityInsurance != '') {
                                                $liabilityInsuranceLink = base_url('uploads/user/document/' . $userProfileInfo->liabilityInsurance);
                                            } else {
                                                $liabilityInsuranceLink = 'javascript:void(0);';
                                            }
                                            ?>
                                            <h4>License / Certificate Copy <small><?= ($userProfileInfo->licenceCopy != '') ? '(Verified)' : '(Not Verified)'; ?> <a target="_blank" href="<?php echo $licenceLink; ?>" title="View Licence"><i class="fa fa-eye"></i></a></small></h4>
                                            Upload a copy of your license or certificate to avoid the hassle later.<p class="licenceCopyError"></p>
                                        </div>
                                        <div class="col-md-3 align-center">
                                            <input  type="file" name="licenceCopy" id="licenceCopy">
                                        </div>
                                    </div>
                                    <div class="row mr15">
                                        <div class="col-md-9">
                                            <h4>Establishment license <small><?= ($userProfileInfo->establishmentLicence != '') ? '(Verified)' : '(Not Verified)'; ?> <a target="_blank" href="<?php echo $establishmentLicenceLink; ?>" title="View Establishment Licence"><i class="fa fa-eye"></i></a></small></h4>
                                            If you are listing your space, verify ownership by providing us with your license<p class="establishmentLicenceError"></p>
                                        </div>
                                        <div class="col-md-3 align-center">
                                            <input type="file" name="establishmentLicence" id="establishmentLicence">
                                        </div>
                                    </div>
                                    <div class="row mr15">
                                        <div class="col-md-9">
                                            <h4>Liabilty insurance <small><?= ($userProfileInfo->liabilityInsurance != '') ? '(Verified)' : '(Not Verified)'; ?> <a target="_blank" href="<?php echo $liabilityInsuranceLink; ?>" title="View Liabilty Insurance"><i class="fa fa-eye"></i></a></small></h4>
                                            Upload a copy of your liability insurance.<p class="liabilityInsuranceError"></p>
                                        </div>
                                        <div class="col-md-3 align-center">
                                            <input type="file" name="liabilityInsurance" id="liabilityInsurance">
                                        </div>
                                    </div>
                                    <!-- <h4>Phone number</h4> -->
                                    <!-- p>Make it easier to communicate with a verified phone number. We’ll send you a code by SMS or read it to you over the phone. Enter the code below to confirm that you’re the person on the other end.</p>
                                    <p>Your number is only shared with another <?php // SITE_DISPNAME;  ?> member once you have a confirmed booking.</p> -->
<!--                                    <div class="col-sm-6"><input type="hidden" name="phone" id="phone" value="4521" class="textbox"></div>-->
                                    <input type="hidden" name="OldLicenceCopy" id="OldLicenceCopy" value="<?= $userProfileInfo->licenceCopy; ?>">
                                    <input type="hidden" name="OldEstablishmentLicence" id="OldEstablishmentLicence" value="<?= $userProfileInfo->establishmentLicence; ?>">
                                    <input type="hidden" name="OldLiabilityInsurance" id="OldLiabilityInsurance" value="<?= $userProfileInfo->liabilityInsurance; ?>">
                                    <input type="submit" name="submit" id="submit" class="btn btn-red pull-right" value="Upload">
                                </div>
                            </div>
<?php if ($userProfileInfo->googleVerified != 'Yes') { ?>
                                <div class="panel panel-default profile-photo verified-info">
                                    <div class="panel-heading">Not Verified Google</div>
                                    <div class="panel-body">
                                        <div class="row mr15">
                                            <div class="col-md-8"><br>
                                                <h4>Google</h4>
                                                Connect your <?= SITE_DISPNAME; ?> account to your Goole account for simplicity and ease.
                                            </div>
                                            <div class="col-md-4 align-center">
    <?php if ($userProfileInfo->googleVerified == 'Yes') { ?><a href="javascript:void(0);" class="btn btn-default">Verified</a><?php } else { ?><a class="btn btn-default btn-file" href="<?php echo $authUrl; ?>"> Connect with Google </a> <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php }
?>
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
                if (element.attr("name") == 'licenceCopy') {
                    error.appendTo('.licenceCopyError');
                } else if (element.attr("name") == 'establishmentLicence')
                {
                    error.appendTo('.establishmentLicenceError');
                } else if (element.attr("name") == 'liabilityInsurance')
                {
                    error.appendTo('.liabilityInsuranceError');
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
