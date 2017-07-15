<!--<link href="<?php echo base_url('theme/front/assests/css/jquery-ui.css')?>" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<section class="spaces-home">
    <div class="container-fluid">
        <div class="col-md-8 spaces-left search-main">
            <ul>
                <li class="space-type">
                    <a herf="#" id="space-type">Space Type <span class="badge hidden"></span> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div id="space-type_open" class="bz_guest_box clearfix" style="display: none;">
                        <ul>
                            <?php foreach($space_types as $key => $space_type){ ?>
                            <li>
                                <div class="feild">
                                    <label for="user_preference<?= $key; ?>">
                                        <input id="user_preference<?= $key; ?>" type="checkbox" name="" value="<?= $space_type['id']; ?>"> <?= $space_type['name']; ?> <br>
                                        <p><?php //echo $space_type['description']; ?></p>
                                    </label>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                        <div class="pull-left"><a href="#" id="space-type-cancel">Cancel</a></div>
                        <div class="pull-right"><a href="#" id="space-type-apply">Apply</a></div>
                    </div>
                </li>
                <li class="space-type price-range">
                    <a herf="#" id="price-range">Price Range <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div id="price-range_open" class="bz_guest_box clearfix" style="display: none;">
                        <ul>
                            <li>
                                <div class="feild">
                                    <p><span id="amount"></span></p>
                                    <p>The average nightly price is $5,409.</p>
                                    <div id="slider-range"></div>
                                    <input type="hidden" id="amount1" />
                                    <input type="hidden" id="amount2" />
                                </div>
                            </li>
                        </ul>
                        <div class="pull-left"><a href="#" id="price-range-cancel">Cancel</a></div>
                        <div class="pull-right"><a href="#" id="price-range-apply">Apply</a></div>
                    </div>
                </li>
                <li class="space-type rent-instantly">
                    <a herf="#" id="rent-instantly">Rent Instantly <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div id="rent-instantly_open" class="bz_guest_box clearfix" style="display: none;">
                        <ul>
                            <li>
                                <div class="feild clearfix">
                                    <div class="pull-left">
                                        <h4>Rent Instantly</h4>
                                        <p>Listings you can book without waiting for host approval</p>
                                    </div>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <div class="slider round"></div>
                                        </label>
                                    </div>
                                </div>
                                
                            </li>
                        </ul>
                        <div class="pull-left"><a href="#" id="rent-instantly-cancel">Cancel</a></div>
                        <div class="pull-right"><a href="#" id="rent-instantly-apply">Apply</a></div>
                    </div>
                </li>
<!--                <li class=""><a herf="#">More <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>-->
            </ul>
            <div class="row">
                <?php if(!empty($listings)):?>
                <?php foreach($listings as $listing): if(isset($listing['gallery']) && !empty($listing['gallery'])){?>
                <?php
                $basePrice = (!empty($listing['base_price']))? getCurrency_symbol($listing['currency']). number_format($listing['base_price']):'';
                $spaceTitle = $listing['spaceTitle'];
                $rentType = $listing['establishmentType'].'/'.$listing['spaceType'];
                $workspaces = $listing['workSpaceCount']." workspaces";
                ?>
                <div class="col-sm-6 col-md-6 col-lg-4 owl-carousel">
                    <?php foreach($listing['gallery'] as $image):?>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <a target="_blank" href="<?= site_url('spaces/'.$listing['id']); ?>" style="color: inherit;">
                                    <div class="img" style="background-image: url(<?= base_url('uploads/user/gallery/'.$image); ?>);">
                                    </div>
                                    <div class="content">
                                        <p><strong><?= $basePrice; ?> · <?= $spaceTitle; ?> </strong></p>
                                        <p><span><?= $rentType; ?> · </span> <?= $workspaces; ?></p>
                                        <div class="review">
                                            <span><img src="<?php echo base_url('theme/front/assests/img/reting-star-home.png')?>" alt="" /></span>
                                            <span><img src="<?php echo base_url('theme/front/assests/img/reting-star-home.png')?>" alt="" /></span>
                                            <span><img src="<?php echo base_url('theme/front/assests/img/reting-star-home.png')?>" alt="" /></span>
                                            <span>1 review</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php } endforeach; endif;?>
            </div>
            <?php if(!empty($listings)):?>
            <div class="paginate wrapper">
                <ul>
                    <li><a href="">⟨</a></li>
                    <li><a href="">1</a></li>
                    <li><a href="" class="inactive">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="" class="active">4</a></li>
                    <li><a href="">5</a></li>
                    <li><a href="" class="more">…</a></li>
                    <li><a href="">98</a></li>
                    <li><a href="">99</a></li>
                    <li><a href="">100</a></li>
                    <li><a href="">⟩</a></li>
                </ul>
            </div>
            <div class="of-ren">
                <span>1 – 18 of 142 Rentals</span>
                <p>Average 4.77 out of 5 stars from 249 guest reviews</p>
                <h5>Additional fees apply. Taxes may be added.</h5>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-4 spaces-map">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d45980098.7345709!2d99.03158682795288!3d45.30029418059744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1496324952690" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$(document).ready(function(){    
    $('#demo-range').daterangepicker({
        autoUpdateInput: false,
        minDate: moment(),
        //showDropdowns: true
    }, 
    function(start, end, label) {
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('#demo-range').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD MMM') + ' - ' + picker.endDate.format('DD MMM'));
    });
    $('#demo-range').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $(this).attr('placeholder', 'Anytime');
    });
    $('#demo-range').focus(function () {
        $(this).attr('placeholder', 'Check In - Check Out');
    }).blur(function () {
        $(this).attr('placeholder', 'Anytime');
    });
    $('#space-type').on("click", function(e) {
        $('#space-type_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#space-type_open').find("input[type='checkbox']").each(function(){
        $(this).on("click", function(){            
            var checked = $('#space-type_open').find("input[type='checkbox']:checked").length;
            $('#space-type .badge').text(checked);
            if(checked > 0){
                $('#space-type .badge').removeClass("hidden");
            }
        });
    });
    $('#space-type-cancel').on("click", function(e) {
        e.preventDefault(); 
        $('#space-type_open').find("input[type='checkbox']").each(function(){
            var ele = $(this);
            if(ele.is(':checked')){
                ele.prop('checked', false);
            }
        });
        var checked = $('#space-type_open').find("input[type='checkbox']:checked").length;
        $('#space-type .badge').text(checked);
        if(checked === 0){
            $('#space-type .badge').addClass("hidden");
        }
        $('#space-type_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#space-type-apply').on("click", function(e) {
        e.preventDefault(); 
        $('#space-type_open').slideToggle();
        e.stopPropagation(); 
    });
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#space-type_open'))){	
            $("#space-type_open").slideUp();   		
        }
    });
    
    $('#price-range').on("click", function(e) {
        $('#price-range_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#price-range-cancel').on("click", function(e) {
        e.preventDefault(); 
        $( "#price-range" ).html( 'Price range <i class="fa fa-caret-down" aria-hidden="true"></i>' );
        
        var options = $("#slider-range").slider( 'option' );
        $("#slider-range").slider( 'values', [ options.min, options.max ] );
        
        $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        $( "#amount1" ).val($( "#slider-range" ).slider( "values", 0 ));
        $( "#amount2" ).val($( "#slider-range" ).slider( "values", 1 ));
        $('#price-range_open').slideToggle();
        
        e.stopPropagation(); 
    });
    $('#price-range-apply').on("click", function(e) {
        e.preventDefault(); 
        $('#price-range_open').slideToggle();
        e.stopPropagation(); 
    });
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#price-range_open'))){	
            $("#price-range_open").slideUp();   		
        }
    });
    
    $('#rent-instantly').on("click", function(e) {
        $('#rent-instantly_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#rent-instantly-cancel').on("click", function(e) {
        e.preventDefault();
        $('#rent-instantly_open').slideToggle();
        e.stopPropagation(); 
    });
    $('#rent-instantly-apply').on("click", function(e) {
        e.preventDefault(); 
        $('#rent-instantly_open').slideToggle();
        e.stopPropagation(); 
    });
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#rent-instantly_open'))){	
            $("#rent-instantly_open").slideUp();   		
        }
    });
    
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
    $( "#slider-range" ).slider({
        range: true,
        min: 650,
        max: 50000,
        values: [ 650, 50000 ],
        slide: function( event, ui ) {          
            $( "#price-range" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] + ' <i class="fa fa-caret-down" aria-hidden="true"></i>' );
            $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $( "#amount1" ).val(ui.values[ 0 ]);
            $( "#amount2" ).val(ui.values[ 1 ]);
        }
    });
    
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});
</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDx2JMX91vY411oEI6jv4T34fpWeUdBRAI&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('destination'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var mesg = "Address: " + address;
            mesg += "\nLatitude: " + latitude;
            mesg += "\nLongitude: " + longitude;
            console.log(mesg);
            $("#latitude").val(latitude);$("#longitude").val(longitude);
            $("#space-search-form").submit();
        });
    });
</script>
</body>
</html>