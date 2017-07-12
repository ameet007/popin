<section class="middle-container account-section">
    <div class="container">
        <div class="main-content">
            <div class="row clearfix">
                <aside class="col-lg-3 left-sidebar">
                    <?php $this->load->view(FRONT_DIR . '/include/account-sidebar');?>
                </aside>
                <article class="col-lg-9 main-right">
                    <div class="panel-group">
                        <div class="panel panel-default badges">
                            <div class="panel-body">
                                <h3>Promote yourself with <?= SITE_DISPNAME; ?> badges</h3>
                                <p>Click a badge to get the HTML code. Paste it on your website or blog to tell the world that you’re part of <?= SITE_DISPNAME; ?>. The reviews and ratings will automatically update as they do on your profile.</p>
                                <div class="your-badges">
                                    <h4>Your Badges</h4>
                                    <ul>
                                        <li>
                                            <div class="review">
                                                <div class="review-count">2</div>
                                                <p>Review</p>
                                            </div>
                                            <footer><p>Your Reviews</p></footer>
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-badges your-listing">
                                    <h4>Your Listing</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
