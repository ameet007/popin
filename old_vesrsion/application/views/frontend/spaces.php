<?php
	$this->load->view('frontend/include/homepage-header');
?>
<link href="<?php echo base_url()?>assests/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<section class="spaces-home">
    <div class="container-fluid">
        <div class="col-md-8 spaces-left">
            <ul>
                <li class="space-type">
                    <a herf="#" id="space-type">Space Type <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div id="space-type_open" class="bz_guest_box clearfix" style="display: none;">
                        <ul>
                            <li>
                                <div class="feild">
                                    <label for="user_preference">
                                        <input id="user_preference" type="checkbox"> Entire home <br>
                                        <p>Have a place to yourself</p>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="feild">
                                    <label for="user_preference">
                                        <input id="user_preference" type="checkbox"> Entire home <br>
                                        <p>Have a place to yourself</p>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="feild">
                                    <label for="user_preference">
                                        <input id="user_preference" type="checkbox"> Entire home <br>
                                        <p>Have a place to yourself</p>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <div class="pull-left"><a href="#">Cancel</a></div>
                        <div class="pull-right"><a href="#">Apply</a></div>
                    </div>
                </li>
                <li class="space-type price-range">
                    <a herf="#" id="price-range">Price Range <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div id="price-range_open" class="bz_guest_box clearfix" style="display: none;">
                        <ul>
                            <li>
                                <div class="feild">
                                    <p>Price [<span id="amount"></span>]</p>
                                    <p>The average nightly price is $5,409.</p>
                                    <div id="slider-range"></div>
                                    <form method="post" action="get_items.php">
                                      <input type="hidden" id="amount1" />
                                      <input type="hidden" id="amount2" />
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <div class="pull-left"><a href="#">Cancel</a></div>
                        <div class="pull-right"><a href="#">Apply</a></div>
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
                        <div class="pull-left"><a href="#">Cancel</a></div>
                        <div class="pull-right"><a href="#">Apply</a></div>
                    </div>
                </li>
                <li class=""><a herf="#">More <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
            </ul>
            <div class="row">
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 owl-carousel">
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-main clearfix">
                            <div class="slide-contant">
                                <div class="img" style="background-image: url(<?php echo base_url()?>assests/img/image1.jpg);">
                                </div>
                                <div class="content">
                                    <p><strong>#4,452<span></span> I SETTE CONI - TRULLO EDERA </strong></p>
                                    <p><span>Entire home/apt ·</span> 2 beds</p>
                                    <div class="review">
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span><img src="<?php echo base_url()?>assests/img/reting-star-home.png" alt="" /></span>
                                        <span>1 review</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 spaces-map">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d45980098.7345709!2d99.03158682795288!3d45.30029418059744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1496324952690" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
    
</section>
<?php
	$this->load->view('frontend/include/homepage-footer');
?>

<script type="text/javascript">
$(document).ready(function(){
	$('input.icon1').focus(function() {
        $(this).attr('placeholder', 'Destination, city, address')    
    }).blur(function() {
        $(this).attr('placeholder', 'Anywhere')
    })
    
    $('#demo-range').daterangepicker();
    $('#demo-range').val('Anytime');
    
    $('#guest_button').on("click", function(e) {
        $('#guest_open').slideToggle();
        e.stopPropagation(); 
    });
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#guest_open'))){	
            $("#guest_open").slideUp();   		
        }
    });
    
    $('#space-type').on("click", function(e) {
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
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#price-range_open'))){	
            $("#price-range_open").slideUp();   		
        }
    });
    
    $('#rent-instantly').on("click", function(e) {
        $('#rent-instantly_open').slideToggle();
        e.stopPropagation(); 
    });
    $(document).on("click", function(e) {	
        if(!(e.target.closest('#rent-instantly_open'))){	
            $("#rent-instantly_open").slideUp();   		
        }
    });
    
   
    
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
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
    })
    
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 5000,
      values: [ 0, 5000 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#amount1" ).val(ui.values[ 0 ]);
		$( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    
	$( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});



</script>
</body>
</html>