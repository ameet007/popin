<section class="spaces-home wishlist2">
    <div class="container-fluid">
        <div class="col-md-4 spaces-left">
            <div class="row">
                <div class="a-list">
                    <a href="<?= site_url('wishlists'); ?>">All lists</a>
                    <a class="posi" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <h3><?= $WishListMaster['name']; ?></h3>
<!--                    <p>No dates · 1 guest</p>
                    <a class="gost-btn" href="#">Invite others</a>-->
                </div>
                <div class="after-click">
                    <div class="setting-s">
                        <div class="tow-btn clearfix">
                            <a class="pull-left" id="setting-clo" href="#">Cancel</a>
                            <a class="btn2 pull-right" href="#">Save</a>
                        </div>
                        <h3>Settings</h3>
                        <div class="feild">
                            <h4>Name</h4>
                            <input type="text" class="textbox" placeholder="My First List"/>
                        </div> 
                    </div>
                    <div class="dat-e">
                        <div class="feild clearfix">
                            <h4>Dates</h4>
                            <div class="col-sm-6">
                                <label for="startDate">Check In</label>
                                <input id="startDate" class="textbox" placeholder="mm/dd/yyyy" type="text">
                            </div>
                            <div class="col-sm-6">
                                <label for="endDate">Check Out</label>
                                <input id="endDate" class="textbox" placeholder="mm/dd/yyyys" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="guest-s clearfix">
                        <div class="col-xs-12">
                            <div class="feild clearfix">
                                <label>Adults</label>
                                <span class="pull-right"><input value="" class="qtyminus" field="adult" type="button"> <input name="adult" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="adult" type="button"></span>
                            </div>
                            <div class="feild clearfix">
                                <label>Children<br> <span class="age">Ages 2 - 12</span></label>
                                <span class="pull-right"><input value="" class="qtyminus" field="children" type="button"> <input name="children" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="children" type="button"></span>
                            </div>
                            <div class="feild clearfix">
                                <label>Infants<br> <span class="age">Under 2</span></label>
                                <span class="pull-right"><input value="" class="qtyminus" field="infant" type="button"> <input name="infant" value="0" class="qty" type="text"> <input value="" class="qtyplus" field="infant" type="button"></span>
                            </div>
                            <div class="pull-left"><a href="#">Cancel</a></div>
                            <div class="pull-right"><a href="#">Apply</a></div>
                        </div>
                    </div>
                    <div class="setting-s invite-f clearfix">
                        <div class="col-xs-12">
                            <h4>Privacy</h4>
                            <select class="selectbox">
                                <option selected="selected">Everyone</option>
                                <option>Everyone2</option>
                                <option>Everyone3</option>
                            </select>
                        </div>
                    </div>
                    <div class="invite-f clearfix">
                        <h4>Friends</h4>
                        <a href="#">Invite more</a>
                        <div class="col-xs-12">
                            <div class="media">
                                <div class="media-left">
                                    <div class="inner">
                                        <img src="img/avatar-pic.png" class="img-circle" alt="" />
                                    </div>
                                </div>
                                <div class="media-body media-middle">
                                    <p>Shashank Shekhar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invite-f clearfix">
                        <h4>Friends</h4>
                        <a data-toggle="modal" data-target="#myModal2" href="#">Delete this wish list</a>
                    </div>
                </div>
            </div>
            <?php if(!empty($WishListDetails)):?>
            <div class="row">
                <h4 class="wishlist-homes"><?= count($WishListDetails); ?> listings</h4>
                <?php foreach($WishListDetails as $listing): ?>
                <?php
                $basePrice = (!empty($listing['base_price']))? getCurrency_symbol($listing['currency']). $listing['base_price']:'';
                $spaceTitle = $listing['spaceTitle'];
                $rentType = $listing['establishment_type'].'/'.$listing['space_type'];
                $workspaces = $listing['workSpaceCount']." workspaces";
                $gallery = $this->user->getSpaceGallery($listing['space_id']);
                ?>
                <div class="col-md-12 owl-carousel">
                    <?php foreach($gallery as $image):?>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?= base_url('uploads/user/gallery/'.$image); ?>);"></div>
                                <div class="content">
                                    <p><strong><?= $basePrice; ?> · <?= $spaceTitle; ?></strong></p>
                                    <p><span><?= $rentType; ?> · </span> <?= $workspaces; ?></p>
                                    <div class="review"><?= createRatingStars($listing['ratings']); ?><span><?= totalReivewsGet($listing['space_id']); ?> reviews</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-8 spaces-map">
            <div class="row">
                <div class="map-overlay"></div>
                <div class="only-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d45980098.7345709!2d99.03158682795288!3d45.30029418059744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1496324952690" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        /*$('#startDate').daterangepicker({
         singleDatePicker: true,
         startDate: moment().subtract(6, 'days')
         });
         $('#endDate').daterangepicker({
         singleDatePicker: true,
         startDate: moment()
         });
         
         $('#startDate2').daterangepicker({
         singleDatePicker: true,
         startDate: moment().subtract(6, 'days')
         });
         $('#endDate2').daterangepicker({
         singleDatePicker: true,
         startDate: moment()
         });*/
        // This button will increment the value
        $('.qtyplus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name=' + fieldName + ']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name=' + fieldName + ']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name=' + fieldName + ']').val(0);
            }
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });

    $('.map-overlay').hide();
    $('.posi').click(function () {
        $('.after-click').show();
        $('.map-overlay').show();
        $('.a-list').hide();
        $('.owl-carousel').parent().hide();
    });
    $('#setting-clo').click(function () {
        $('.after-click').hide();
        $('.map-overlay').hide();
        $('.a-list').show();
        $('.owl-carousel').parent().show();
    });
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    //highlight current or active link
    $('.head-tab ul li a').each(function() {
        if ($($(this))[0].href === String(window.location)){
            $(this).addClass('active');
        }
    });
    $('#destination').focus(function () {
        $(this).attr('placeholder', 'Destination, city, address');
    }).blur(function () {
        $(this).attr('placeholder', 'Anywhere');
    });

    $('#guest_button').on("click", function (e) {
        $('#guest_open').slideToggle();
        e.stopPropagation();
    });
    $(document).on("click", function (e) {
        if (!(e.target.closest('#guest_open'))) {
            $("#guest_open").slideUp();
        }
    });
    var initialVal = parseInt($("input[name='professionals']").val());
    // This button will increment the value
    $('.qtyplus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            currentVal++;
            $('input[name=' + fieldName + ']').val(currentVal);
            $("button#guest_button span:eq(1)").text(currentVal + " professionals");
        } else {
            // Otherwise put a 0 there
            //$('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        // Decrement one
            currentVal--;
        if (!isNaN(currentVal) && currentVal > 0) {
            
            $('input[name=' + fieldName + ']').val(currentVal);
            $("button#guest_button span:eq(1)").text(currentVal + " professionals");
        } else {
            // Otherwise put a 0 there
            //$('input[name=' + fieldName + ']').val(0);
        }
    });
    $('#guest-cancel').on("click", function(e) {
        e.preventDefault(); 
        $("input[name='professionals']").val(initialVal);
        $("button#guest_button span:eq(1)").text(initialVal+" professionals");
        $('#guest_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#guest-apply').on("click", function(e) {
        e.preventDefault(); 
        mergeForms("space_search_form", "space_filter_form");
        $('#guest_open').slideToggle();
        e.stopPropagation(); 
    });
});
function mergeForms(form1, form2) {
    var forms = [];
    $.each($.makeArray(arguments), function(index, value) {
        forms[index] = document.forms[value];
    });
    var targetForm = forms[0];
    $.each(forms, function(i, f) {
        if (i != 0) {
            $(f).find('input, select, textarea')
                .hide()
                .appendTo($(targetForm));
        }
    });
    $(targetForm).submit();
}
</script>

<script src="<?= base_url('theme/front/assests/js/ac.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('theme/front/assests/js/fileuploader.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('theme/front/assests/js/fileuploader-custom2.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('theme/front/assests/js/bxslider.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/jquery.jcarousel.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/jcarousel.responsive.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/moment.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/owl.carousel.js') ?>" type="text/javascript"></script>
<?php if(isset($search_nav) && $search_nav == 1){ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<?php }else{?>
<script src="<?php echo base_url('theme/front/assests/js/daterangepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('theme/front/assests/js/jquery-ui.js') ?>" type="text/javascript"></script>
<?php }?>
</body>
</html>
<?php
if ($this->session->userdata('session_login_id') == '') {
    include_once('include/user-modalbox.php');
}
?>
