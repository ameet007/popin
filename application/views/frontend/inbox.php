<?php
	$this->load->view('frontend/include/user-header');
?>
<section class="middle-container inbox_x">
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-3">
                    <a class="btn2" href="<?= site_url('compose'); ?>">Compose new message</a>
                </div>
                <div class="col-md-3 all-msessage pull-right">
                    <form id="inbox" method="post" action="">
                        <select name="status" onchange="this.form.submit();">
                            <option value="" <?= ($status == "")?"selected":"";?>>All Messages (<?= $userMessages['allCount']; ?>)</option>
                            <option value="starred" <?= ($status == "starred")?"selected":"";?>>Starred (<?= $userMessages['starCount']; ?>)</option>
                            <option value="new" <?= ($status == "new")?"selected":"";?>>Unread (<?= $userMessages['newCount']; ?>)</option>
                            <option value="reservations" <?= ($status == "reservations")?"selected":"";?>>Reservations (<?= $userMessages['reserveCount']; ?>)</option>
                            <option value="pending" <?= ($status == "pending")?"selected":"";?>>Pending Requests (<?= $userMessages['pendingCount']; ?>)</option>
                            <option value="archived" <?= ($status == "archived")?"selected":"";?>>Archived (<?= $userMessages['archiveCount']; ?>)</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-body messageBlock">
                        <?php if(empty($messages)): ?>
                        <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4 text-center">
                            <h3>No messages yet.</h3><br/>
                            <p>When professionals contact you or send you rent requests, you’ll see their messages here.</p>
                            <input type='hidden' class='nextpage' value='0'>
                        </div>
                        <?php else:?>
                        <div class="table-responsive">
                            <table class="table table-condensed message-table">
                                <tbody>
                                    <?= $messages; ?>                                
                                </tbody>
                            </table>
                            <div style="text-align: center;display: none;" id="loader"><?php echo img(array("src"=>base_url("assets/images/loading-spinner-grey.gif"), "alt"=> "loading...")); ?></div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog host-popup">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="alert alert-info">
                    <img src="<?= base_url('theme/front/assests/img/alert-icon.png'); ?>" alt="" /><strong>Please enter your message below</strong>
                </div>
                <div class="host-from">
<!--                    <h4>When are you traveling?</h4>-->
                    <form id="contact-form" method="post" action="<?php echo site_url("dashboard/send_reply"); ?>">
                        <input type="hidden" name="receiver" value="">
                        <input type="hidden" name="parent" value="">
                        <div class="feild">
                            <textarea class="textarea" name="message" placeholder="Type your message..."></textarea>
                        </div>
                        <div class="sender clearfix">
                            <div class="pull-right">
                                <button class="btn-red">Send Message</button>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('theme/front/assests/js/jquery.blockUI.js') ?>" type="text/javascript"></script>
<script>
$("a.update-msg-status").on("click", function(){
    var $this = $(this),
        id = $(this).attr("data-msg-id"),
        action = $(this).attr("data-action"),
        status = $(this).attr("data-status");
    
    var postData = {msg_id: id, action: action, status: status};
    
    $.post("<?= site_url('dashboard/update_message_status');?>", postData, function(response){
        $this.html(response);
    });
});
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.attr('data-receiverName'); // Extract info from data-* attributes
    var recipientId = button.attr('data-receiverId');
    var parentId = button.attr('data-parentId');
    var modal = $(this);
    modal.find('.modal-title').text('New message to ' + recipient);
    modal.find('.modal-body input[name="receiver"]').val(recipientId);
    modal.find('.modal-body input[name="parent"]').val(parentId);
    modal.find(".modal-body .alert strong").text("Please enter your message below");
});
$('#contact-form').validate({
    rules: {
        'message' : {required:true}
    },
    messages : {
        'message' : { required:"Please enter your message." }
    },
    submitHandler: function(form) {
        $(form).parents('div.modal-body').block({ 
            overlayCSS: { backgroundColor: '#E5E5E5' }, 
            message: '<img src="<?= base_url(); ?>assets/images/loading-spinner-grey.gif" alt="please wait...">',
            css: { border: 'none', backgroundColor: 'transparent' }  
        });
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            dataType: 'json',
            success: function(response) {
                $(form).parents('div.modal-body').unblock();
                $("div.modal-body .alert strong").text(response.message);
                if(response.success){

                }
                $(form).trigger('reset');
            },
            error: function(response){
                $(form).parents('div.modal-body').unblock();
            }
        });
    }
});
//Scroll script 
var ajax_arry=[];
var ajax_index =0;
$(function () {    
    $(window).scroll(function(){
        var height = $('.messageBlock').height();
        var scroll_top = $(this).scrollTop();
        if(ajax_arry.length>0){
            for(var i=0;i<ajax_arry.length;i++){
                ajax_arry[i].abort();
            }
        }
        var page = $('.messageBlock').find('.nextpage').val();
        if ($(window).scrollTop() == $(document).height() - $(window).height() && page>0){
            $('#loader').show();
            var ajaxreq = $.ajax({
                            url:"<?php echo  site_url("dashboard/messageRequest") ?>",
                            type:"POST",
                            data:"page="+page+"&status="+$("select[name='status']").val(),
                            cache: false,
                            success: function(response){
                                $('#loader').hide();
                                $('.messageBlock').find('.nextpage').remove();
                                $('.messageBlock table tbody').append(response);
                            }
            });
            ajax_arry[ajax_index++]= ajaxreq;
        }
        return false;
    });
});
</script>
<?php
	$this->load->view('frontend/include/user-footer');
?>