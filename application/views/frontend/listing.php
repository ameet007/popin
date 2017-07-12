<?php $this->load->view('frontend/include/user-header'); ?>
<section class="middle-container account-section listings-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-sm-3 left-sidebar">
                    <?php $this->load->view('frontend/include/listing-sidebar'); ?>
                </aside>
                <article class="col-sm-9 main-right">
                    <?php if(empty($listings)){?>
                    <div class="panel-group">
                        <div class="panel panel-default your-listings">
                            <div class="panel-body">
                                <h3>You don’t have any listings!</h3>
                                <p>Make money by renting out your extra space on Popln. You’ll also get to meet interesting travelers from around the world!</p>
                                <a class="green-btn" href="<?php echo site_url()?>Space">Post a new listing</a>
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="panel panel-default required">
                            <div class="panel-heading">Your Listings</div>
                            <div id="listingBlock" class="panel-body">
                                <?= $listings; ?>
                                <div style="text-align: center;display: none;" id="loader"><?php echo img(array("src"=>base_url("assets/images/loading-spinner-grey.gif"), "alt"=> "loading...")); ?></div>
                            </div>
                        </div>
                    <?php }?>
                </article>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('frontend/include/user-footer'); ?>
<style>
    #listingBlock .img {
        background-color: #484848;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 220px;
    }
    #listingBlock .item, #listingBlock .img {
        margin-bottom: 15px;
    }
    #listingBlock .item{
        padding: 0 8px;
    }
    #listingBlock .slide-main p {
        color: #484848;
        line-height: 16px;
        margin-bottom: 10px;
    }
    #listingBlock .slide-main p strong {
        font-size: 18px;
        font-weight: 600;
    }
</style>
<script>
//Scroll script 
var ajax_arry=[];
var ajax_index =0;
$(function () {    
    $(window).scroll(function(){
        var height = $('#listingBlock').height();
        var scroll_top = $(this).scrollTop();
        if(ajax_arry.length>0){
            for(var i=0;i<ajax_arry.length;i++){
                ajax_arry[i].abort();
            }
        }
        var page = $('#listingBlock').find('.nextpage').val();
        if ($(window).scrollTop() == $(document).height() - $(window).height() && page>0){
            $('#loader').show();
            var ajaxreq = $.ajax({
                            url:"<?php echo  site_url("Listing/listingData") ?>",
                            type:"POST",
                            data:"page="+page,
                            cache: false,
                            success: function(response){
                                    $('#listingBlock').find('.nextpage').remove();
                                    $('#listingBlock').find('#loader').remove();
                                    $('#listingBlock').append(response);
                                    $('#listingBlock').append('<div style="text-align: center;display: none;" id="loader"><?php echo img(array("src"=>base_url("assets/images/loading-spinner-grey.gif"), "alt"=> "loading...")); ?></div>');
                            }
            });
            ajax_arry[ajax_index++]= ajaxreq;
        }
        return false;
        if($(window).scrollTop() == $(window).height()) {
            alert("bottom!");
        }
    });
});
</script>