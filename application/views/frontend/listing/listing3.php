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
                            <div class="panel-heading">Verified ID</div>
                            <div class="panel-body">
                                <p>Your professionals will need to verify their ID before renting with you. <a href="#">Learn More</a></p>
                                <label for="user_preference">
                                    <input type="checkbox" id="user_preference" /> Require professionals to go through verification
                                </label>
                                <button class="btn-red">Save Reservation Requirements</button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('frontend/include/user-footer'); ?>
