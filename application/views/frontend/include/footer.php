<footer class="foot">
    <div class="container">
        <div class="row">
            <div class="foot_top clearfix">
                <div class="col-lg-3 one-foruth">
                    <select name="site_language" id="site_language">
                        <?php $all_languages = unserialize(LANGUAGES);
                        foreach ($all_languages as $k => $v) {
                            ?>
                            <option value="<?= $k; ?>" <?= !empty($userProfileInfo->language) ? ($userProfileInfo->language == $k ? 'selected' : '') : ($k == 'en' ? 'selected' : ''); ?> ><?= $v; ?></option>
                        <?php } ?>
                    </select>

                    <select name="site_currency" id="site_currency">
                        <?php $all_currency = unserialize(CURRENCIES);
                        foreach ($all_currency as $k => $v) {
                            ?>
                            <option value="<?= $k; ?>" <?= !empty($userProfileInfo->currency) ? ($userProfileInfo->currency == $k ? 'selected' : '') : ($k == 'USD' ? 'selected' : ''); ?> ><?= $v; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                $all_footer_sections = unserialize(FOOTER_SECTION);
                foreach ($all_footer_sections as $k => $v) {
                    $CI = & get_instance();
                    $CI->load->model(ADMIN_DIR . '/AdminSettings', 'settings');
                    $pages = $CI->settings->getAllFooterPages($k);
                    $pages_array = explode(',', $pages->page);
                    /* echo '<pre>';
                      print_r($pages_array);
                      exit; */
                    ?>

                    <div class="col-lg-3 one-foruth pd-left">
                        <h5><?= $v; ?></h5>
                            <?php if (!empty($pages_array)) { ?>
                            <ul>
                                <?php
                                foreach ($pages_array as $v) {
                                    $CI = & get_instance();
                                    $CI->load->model(ADMIN_DIR . '/AdminSettings', 'settings');
                                    $pageDetail = $CI->settings->getPageDetail($v);
                                    if (!empty($pageDetail)) {
                                        ?>
                                        <li><a href="<?= base_url('p/' . $pageDetail->url); ?>"><?= $pageDetail->pageName; ?></a></li>
                                <?php }
                            } ?>
                            </ul>
                            <?php } ?>
                    </div>
                <?php } ?>

            </div>
            <div class="foot_bottom clearfix">
                <div class="copy-right">
                    <p>&copy Popln, Inc.</p>
                </div>
                <div class="terms">
                    <ul>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>