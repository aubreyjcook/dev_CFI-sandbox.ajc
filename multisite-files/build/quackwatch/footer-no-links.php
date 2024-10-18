<?php
/**
 * The theme footer.
 *
 * @package bootstrap-basic4
 */
  $logo = get_field('long_logo', 'option');
?>
            </div><!--.site-content-->
        </div><!--.page-container-->
        <div class="container-fluid blue">
            <footer id="site-footer" class="site-footer page-footer" role="contentinfo">
                <div id="footer-row" class="row contain-text m-5 mx-auto justify-content-center">
                    <div class="col-md-4 col-12 footer-left mr-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_get_attachment_image($logo, 'full'); ?></a>
                    </div>
                </div>
            </footer><!--.page-footer-->
        </div>

        <!--wordpress footer-->
        <?php wp_footer(); ?>
        <!--end wordpress footer-->
                </div><!--Wrapper-->
                <script src="https://centerforinquiry.org/js/new/nav-icon.js"></script>
                <script src="https://centerforinquiry.org/js/new/sidebar-toggle.js"></script>
                <script src="<?php echo get_theme_file_uri('js/donation-charts.js'); ?>"></script>
    </body>
</html>
