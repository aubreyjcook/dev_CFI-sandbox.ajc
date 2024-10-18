<?php
/**
 * The theme footer.
 *
 * @package bootstrap-basic4
 */
 $officialname = get_bloginfo('name');
 $shortname = get_field('short_name');
 $cityname = substr($officialname, 4);
 $facebook = get_field('facebook', 'option');
 $meetup = get_field('meetup', 'option');
 $twitter = get_field('twitter', 'option');
 $youtube = get_field('youtube', 'option');
?>
            </div><!--.site-content-->
        </div><!--.page-container-->
        <div id="extras" class="container-fluid d-block d-print-none">
            <div class="row">
                <div id="hon-code" class="col-md-6">
                    <img src="https://centerforinquiry.org/wp-content/uploads/sites/33/quackwatch/hon.gif" />
                    <p>Quackwatch abides by the <a href="/about/honcode">HONcode principles</a> of the Health On the Net Foundation</p>
                </div>
                <div id="error-form" class="col-md-6">
                    <h5>Notice an error on this page?</h5>
                    <p>We've recently redesigned this website, let us know if anything got lost or broken during the move.</p>
                    <a href="#" data-toggle="modal" data-target="#feedbackModal"><button class="btn white-button-on-blue">Report an Issue</button></a>
                </div>
            </div>
            <div class="row">
                <div id="disclaimer" class="col-md-12">
                    <p class="small">All articles on this Web site except government reports are copyrighted. Single copies can be downloaded for personal education; other uses without authorization are illegal.<br />"Quackwatch" and the duck picture are service-marked; their unauthorized use is illegal.</p>
                </div>
            </div>
        </div>
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Quackwatch Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode('[ninja_form id=2]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid blue d-block d-print-none">
            <footer id="site-footer" class="site-footer page-footer" role="contentinfo">
                <div id="footer-row" class="row contain-text m-5 mx-auto justify-content-center">
                    <div class="col-md-4 col-12 footer-left mr-4">
                        <a href="<?php echo esc_url(home_url('')); ?>"><img src="https://cdn.centerforinquiry.org/img/CFImark2017-on-blue.png" class="d-md-none footer-logo mb-3" /></a>
                        <h3>Quick Links</h3>
                        <hr class="mb-4" />
                        <div class="clearfix"></div>
                        <ul class="navbar-nav">
                            <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu',
                                                    'container_class' => 'footer-menu',
                                                    'fallback_cb' => false

                             ) ); ?>
                        </ul>
                    </div>

                    <div style="border-left: 3px solid #FFF; height:400px;" class="d-none d-md-block mr-4">
                    </div>

                    <div class="col-md-4 col-12 footer-right">
                    <a href="<?php echo esc_url(home_url('')); ?>"><img src="https://cdn.centerforinquiry.org/img/wordpress/CFI2017-on-blue.png" class="d-none d-md-block footer-logo mb-4" /></a>
                    <span class="d-md-none"><hr /></span>
                        <h6><strong>Center for Inquiry – Headquarters</strong></h6>
                        <p>PO Box 741<br />
                        Amherst, NY 14226<br />
                        <a href="tel:7166364869">(716) 636-4869</p></a>
                        <br />
                        <h6><strong>Center for Inquiry – Executive Office</strong></h6>
                        <p>1012 14th Street, NW, Suite 205<br />
                        Washington, DC 20005</p>
                        <p><a href="<?php echo esc_url(home_url('')); ?>/terms-of-service/">Terms</a> &middot; <a href="<?php echo esc_url(home_url('')); ?>/privacy/">Privacy&nbsp;Statement</a><br />
                        <a href="<?php echo esc_url(home_url('')); ?>">Center&nbsp;for&nbsp;Inquiry,&nbsp;Inc</a>&nbsp;©&nbsp;<?php echo Date('Y'); ?> &middot; All&nbsp;Rights&nbsp;Reserved.<br />
                        Registered 501(c)(3). EIN: 22-2306795</p>
                    </div>
                </div>
            </footer><!--.page-footer-->
        </div>

        <!--wordpress footer-->
        <?php wp_footer(); ?>
        <!--end wordpress footer-->
                </div><!--Wrapper-->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script type="text/javascript" src="https://centerforinquiry.org/js/new/main_init.js"></script>
    </body>
</html>
