<?php $this->load->view('frontend/include/user-header'); ?>

<section class="middle-container account-section listings-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-sm-3 left-sidebar">
                    <?php $this->load->view('frontend/include/listing-sidebar'); ?>
                </aside>
                <article class="col-sm-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default your-reservations">
                            <div class="panel-body">
                                <p>You have no upcoming reservations.</p>
                                <a href="#">View past reservation history</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('frontend/include/user-footer'); ?>
