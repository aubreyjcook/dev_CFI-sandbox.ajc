<?php
/**
 * The theme footer.
 *
 * @package bootstrap-basic4
 */
switch_to_blog(1);
 $officialname = get_bloginfo('name');
 $shortname = get_field('short_name');
 $cityname = substr($officialname, 4);
 $facebook = get_field('facebook', 'option');
 $meetup = get_field('meetup', 'option');
 $twitter = get_field('twitter', 'option');
 $youtube = get_field('youtube', 'option');
restore_current_blog();
 $logo = get_field('long_logo', 'option');
 $donate_icon = get_field('donate_icon', 'option');
 $donate_icon_link = wp_get_attachment_image_src($donate_icon, 'medium');
 $donate_headline = get_field('donate_headline', 'option');
 $donate_text = get_field('donate_text', 'option');
?>
            </div><!--.site-content-->
        </div><!--.page-container-->

        <?php if($donate_icon_link AND $donate_headline AND $donate_text) { ?>
            <div id="donate" class="row">
                <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                    <img src="<?php echo $donate_icon_link[0]; ?>" />
                </div>
                <div class="col-12 col-sm-5 col-md-4 col-lg-4">
                    <h2><?php echo $donate_headline; ?></h2>
                    <p><?php echo $donate_text; ?></p>
                    <a href="<?php echo esc_url(home_url('/donate/')); ?>"><button class="white-button-on-grey">Donate</button></a>
                </div>
            </div>
        <?php } ?>        

        <div id="footer-container" class="container-fluid">  
            <footer id="site-footer" class="site-footer page-footer" role="contentinfo">
                <div id="footer-row" class="row contain-text m-5 mx-auto justify-content-center">
                    <div class="col-md-4 col-12 footer-left mr-4">
                        <a href="<?php echo esc_url(home_url('')); ?>"><img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>" class="d-md-none footer-logo mb-3" /></a>
                        <h3>Quick Links</h3>
                        <hr class="mb-4" />
                        <div class="clearfix"></div>
                        <ul class="navbar-nav">
                            <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu',
                                                    'container_class' => 'footer-menu',
                                                    'fallback_cb' => false

                             ) ); ?>
                        </ul>
                        <h5 class="mt-5">FOLLOW US</h5>
                        <?php if(!empty($facebook)) { ?>
                            <a href="<?php echo $facebook; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/social/cfi-facebook.png" class="header-icon mr-2" /></a>
                        <?php } ?>
                        <?php if(!empty($twitter)) { ?>
                            <a href="<?php echo $twitter; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/social/cfi-twitter.png" class="header-icon mr-2" /></a>
                        <?php } ?>
                        <?php if(!empty($meetup)) { ?>
                            <a href="<?php echo $meetup; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/social/cfi-meetup.png" class="header-icon mr-2" /></a>
                        <?php } ?>
                        <?php if(!empty($youtube)) { ?>
                            <a href="<?php echo $youtube; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/social/cfi-youtube.png" class="header-icon mr-2" /></a>
                        <?php } ?>
                        <!--social media icons here -->
                    </div>

                    <div style="border-left: 3px solid #FFF; height:400px;" class="d-none d-md-block mr-4">
                    </div>

                    <div class="col-md-4 col-12 footer-right">
                    <a href="<?php echo esc_url(home_url('')); ?>"><img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>" class="d-none d-md-block footer-logo mb-4" /></a>
                    <span class="d-md-none"><hr /></span>
                        <p>Secular Rescue is a Program of the Center for Inquiry</p>
                        <h6><strong>Center for Inquiry – Headquarters</strong></h6>
                        <p>PO Box 741<br />
                        Amherst, NY 14226<br />
                        <a href="tel:7166364869">(716) 636-4869</p></a>
                        <br />
                        
                        <p><a href="https://centerforinquiry.org/terms-of-service/">Terms</a> &middot; <a href="https://centerforinquiry.org/privacy/">Privacy&nbsp;Statement</a><br />
                        <a href="https://centerforinquiry.org/">Center&nbsp;for&nbsp;Inquiry,&nbsp;Inc</a>&nbsp;©&nbsp;<?php echo Date('Y'); ?> &middot; All&nbsp;Rights&nbsp;Reserved.<br />
                        Registered 501(c)(3). EIN: 22-2306795</p>
                    </div>
                </div>
            </footer><!--.page-footer-->
        </div>

        <!--wordpress footer-->
        <?php wp_footer(); ?>
        <!--end wordpress footer-->
                </div><!--Wrapper-->
                <script src="https://centerforinquiry.org/js/new/main_init.js"></script>
    </body>
</html>
