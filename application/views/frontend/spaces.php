<!--<link href="<?php echo base_url('theme/front/assests/css/jquery-ui.css')?>" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<section class="spaces-home">
    <div class="container-fluid">
        <div class="col-md-8 spaces-left search-main">
            <form class="space-search-form" name="space_filter_form" method="post" action="<?= site_url('spaces'); ?>">
                <ul>
                    <li class="space-type">
                        <a herf="#" id="space-type">Space Type <span class="badge <?= isset($_POST['spaceType']) && !empty($_POST['spaceType'])?'':'hidden';?>"><?= isset($_POST['spaceType']) && !empty($_POST['spaceType'])?count($_POST['spaceType']):'';?></span> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div id="space-type_open" class="bz_guest_box clearfix" style="display: none;">
                            <ul>
                                <?php foreach($space_types as $key => $space_type){ ?>
                                <li>
                                    <div class="feild">
                                        <label for="user_preference<?= $key; ?>">
                                            <input id="user_preference<?= $key; ?>" type="checkbox" name="spaceType[]" value="<?= $space_type['id']; ?>" <?= isset($_POST['spaceType']) && in_array($space_type['id'], $_POST['spaceType'])?'checked':'';?>> <?= $space_type['name']; ?> <br>
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
                        <?php 
                            $priceRange = "Price Range";
                            if(isset($_POST['minPrice']) && !empty($_POST['minPrice']) && isset($_POST['maxPrice']) && !empty($_POST['maxPrice'])){
                                $priceRange = '$'. $_POST['minPrice'] . ' - $' . $_POST['maxPrice'];
                            }
                        ?>
                        <a herf="#" id="price-range"><?= $priceRange; ?> <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div id="price-range_open" class="bz_guest_box clearfix" style="display: none;">
                            <ul>
                                <li>
                                    <div class="feild">
                                        <p><span id="amount"></span></p>
                                        <p>The average hourly price is $1,000.</p>
                                        <div id="slider-range"></div>
                                        <input type="hidden" id="amount1" name="minPrice" value="<?= isset($_POST['minPrice'])?$_POST['minPrice']:'';?>" />
                                        <input type="hidden" id="amount2" name="maxPrice" value="<?= isset($_POST['maxPrice'])?$_POST['maxPrice']:'';?>" />
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
                                                <input type="checkbox" name="rentInstantly" value="No"  <?= isset($_POST['rentInstantly'])?'checked':'';?>>
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
            </form>
            <div class="row">
                <?php 
                   if(!empty($listings)):?>
                <?php foreach($listings as $listing): if(isset($listing['gallery']) && !empty($listing['gallery'])){?>
                <?php
                $basePrice = (!empty($listing['base_price']))? getCurrency_symbol($listing['currency']). number_format($listing['base_price']):'';
                $spaceTitle = $listing['spaceTitle'];
                $rentType = $listing['establishmentType'].'/'.$listing['spaceType'];
                $workspaces = $listing['workSpaceCount']." workspaces";
                ?>
                <div class="col-md-6 col-lg-4 owl-carousel">
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
                                            <?= createHTMLRating($listing['id']);?>
                                            <span><?=  totalReivewsGet($listing['id']);?> review</span>
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
<!--                <p>Average 4.77 out of 5 stars from 249 guest reviews</p>-->
                <h5>Additional fees apply. Taxes may be added.</h5>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-4 spaces-map">
        <!-- display all information on the map -->
        <?php 
        $getViewHtml = array();
        $count = 1;
        $basePrice = $spaceTitle = $rentType= $workspaces='';
        foreach($listings as $listing): if(isset($listing['gallery']) && !empty($listing['gallery'])){
              $basePrice = (!empty($listing['base_price']))? getCurrency_symbol($listing['currency']). number_format($listing['base_price']):'';
                $spaceTitle = $listing['spaceTitle'];
                $rentType   = $listing['establishmentType'].'/'.$listing['spaceType'];
                $workspaces = $listing['workSpaceCount']." workspaces";

        foreach($listing['gallery'] as $image):
            if ($count == 1) {
               $newHTMl  =  '<span><img style="height:120px;width:100%;" src="'.base_url('uploads/user/gallery/'.$image).'"></span><div class="content mapContent"><p><strong>'.$basePrice.' · '.$spaceTitle.'</strong></p><p><span style="font-family: \'Roboto\', sans-serif;" >'.$rentType.' · </span>'.$workspaces.'</p><div class="review">'.createHTMLRating($listing['id']).'
                <span>'.totalReivewsGet($listing['id']).' review</span>
            </div></div>';    
            $count++;
            }
        endforeach;
        $count = 1;
         $get['gallery']   = $newHTMl;
         $get['latitude']  = $listing['latitude'];
         $get['longitude'] = $listing['longitude'];
         $getViewHtml[] = $get;
        }
       endforeach;
    ?>
         <!-- close code here -->
            <div class="row">
               <div id="googlemap" style="height:750px; width: 100%; position: relative; overflow: hidden;"></div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){    
    $('#demo-range').daterangepicker({
        autoUpdateInput: false,
        minDate: moment(),
        //showDropdowns: true,
        //timePicker: true,
        //timePickerIncrement: 30,
        locale: {
            format: 'DD MMM' //MM/DD/YYYY h:mm A
        }
    }, 
    function(start, end, label) {
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $("#checkIn").val(start.format('YYYY-MM-DD'));$("#checkOut").val(end.format('YYYY-MM-DD'));
    });
    $('#demo-range').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD MMM') + ' - ' + picker.endDate.format('DD MMM'));
        $("#space-search-form").submit();
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
        mergeForms("space_search_form", "space_filter_form");
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
        $( "#price-range" ).html( 'Price Range <i class="fa fa-caret-down" aria-hidden="true"></i>' );
        
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
        mergeForms("space_search_form", "space_filter_form");
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
        mergeForms("space_search_form", "space_filter_form");
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
        min: 1,
        max: 5000,
        //step: 50,
        values: [ 1, 5000 ],
        slide: function( event, ui ) {          
            $( "#price-range" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] + ' <i class="fa fa-caret-down" aria-hidden="true"></i>' );
            $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $( "#amount1" ).val(ui.values[ 0 ]);
            $( "#amount2" ).val(ui.values[ 1 ]);
        },
        create: function(event, ui){
            if($( "#amount1" ).val() !=="" && $( "#amount2" ).val() !== ""){
                $(this).slider( 'values', [ $( "#amount1" ).val(), $( "#amount2" ).val() ] );
            }
        }
    });
    if($( "#amount1" ).val() !=="" && $( "#amount2" ).val() !== ""){
        $( "#amount" ).html( "$" + $( "#amount1" ).val() + " - $" + $( "#amount2" ).val() );
    }else{
        $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    }
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
            //console.log(mesg);
            $("#latitude").val(latitude);$("#longitude").val(longitude);
            mergeForms("space_search_form", "space_filter_form");
        });
    });
</script>
<style>
/*close button has ben remove on the map*/
.gm-style-iw + div {display: none;}
#googleMap { width: 100%; height: 400px; top: 0; left: 0; right: 0; bottom: 0; }
/*style the box*/  
.gm-style .gm-style-iw {
background-color: #fff !important;
top: 0 !important;
left: 0 !important;
width: 120% !important;
height: 100% !important;
min-height: 150px !important;
padding-top: 2px;
padding-bottom: 5px;
display: block !important;
}    
/*style the p tag*/
.gm-style .gm-style-iw #google-popup p{
/*padding: 10px;*/
}
.gm-style-iw + div {display: none;}
/*style the arrow*/
.gm-style div div div div div div div div {
background-color: #fff !important;
padding: 0;
margin: 0;
padding: 0;
top: 0;
color: black;
font-size: 16px;
}
/*style the link*/
.gm-style div div div div div div div div a {
color: #f1f1f1;
font-weight: bold;
} 
.content.mapContent{
    padding-left: 17px;
    padding-top: 5px;
    font-family: 'Roboto', sans-serif;
    font-size: 15px;
} 
</style>
<!-- $listings -->
<script>

// console.log(getValue);
 var markers = [];
 var labels = '';// The array where to store the markers
function initialize() {
        var mapOptions = {
            zoom: 2,
            center: new google.maps.LatLng(31.7860603,132.0853276),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);
  var getJson = <?php echo json_encode($getViewHtml);?>;
  var getValue = [];
  var get = [];
  $.each(getJson, function(i,n) { 
        get['0']  = n.gallery;
        get['1']  = n.latitude;
        get['2']  = n.longitude;
        get['3']  = '';
        getValue.push(get);
        get = [];
  });
     //console.log(getJson)
        // passing array value
        var locations = getValue; 
        var marker, i;
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(map, 'click', function() {
            infowindow.close();
        });
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            //title: "Derby",
            // label: {
            // color: 'red',
            // fontWeight: 'bold',
            // text: 'Price',
            // },
            // label: "<p style='color:red;' >hello</p>",
           // animation:google.maps.Animation.DROP,
          // icon: 'http://www.codeshare.co.uk/images/blue-pin.png'
        });
     google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
            // Push the marker to the 'markers' array
        markers.push(marker);
        }
        google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    // The function to trigger the marker click, 'id' is the reference index to the 'markers' array.
    function myClick(id){
        google.maps.event.trigger(markers[id], 'click');
    }
            </script>
<script async defersrc="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuLtHPY0rnHNfMTwDnnjfP_36zxpSkw4&callback=initialize"></script> 
</body>
</html>