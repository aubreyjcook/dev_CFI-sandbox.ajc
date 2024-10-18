<?php
/* Template Name: Home Page */
get_header();
?>
    <main id="main" class="col-md-12 site-main" role="main">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                $slider = get_field('slider_id');
                $mission = get_field('mission');
                $mission_icon = get_field('mission_icon');
                $mission_icon_link = wp_get_attachment_image_src($mission_icon, 'medium');
                $mission_link = get_field('mission_link');
                $featured_events = get_field('featured_events');
                $news = get_field('news');
                $blog = get_field('blog');
                $thumbnail = get_the_post_thumbnail_url();
                ?>

                    <div class="slider-container">
                    <?php if($slider != null) { ?>
                        <?php echo do_shortcode("[metaslider id=$slider]"); ?>
                    <?php } else { ?>
                        <?php if(get_the_post_thumbnail() != null ) { ?>
                            <div class="featured-image" style="background-image:url(<?php echo $thumbnail; ?>)"></div>
                        <?php } ?>
                    <?php } ?>
                    </div>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <div class="mission-container orange mb-5">
                                <div class="row align-items-stretch mx-auto justify-content-center">
                                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                                            <img src="<?php echo $mission_icon_link[0]; ?>" id="mission-icon-02"/>
                                        </div>
                                        <div class="col-12 col-sm-10 col-md-4 col-lg-3 col-xl-6">
                                            <h2 style="color: white;" class="text-uppercase">Our Mission</h2>
                                            <hr />
                                            <p style="color: white;"><?php echo $mission;?></p>
                                            <a href="<?php echo $mission_link; ?>"><button class=" btn white-button-on-orange">Learn More</button></a>
                                        </div>
                                </div><!--Row-->
                            </div><!--Mission Container-->
                            <div class="clearfix"></div>

                        <div class="entry-content">
                            <div class="row justify-content-center mb-5">
                                <div class="col-10 col-md-6">
                                    <h2 class="h2-headers">The Latest Blogs</h2>
                                    <hr class="home-underliner" />
                                    <div class="clearfix"></div>
                                        <?php
                                            $args = array(
                                            'posts_per_page' => 1,
                                            'post_type' => 'post',
                                            'cat' => 143
                                            );
                                            $recent_posts = new WP_query($args);
                                            // to only display posts if active posts are available
                                                if ( $recent_posts->have_posts() ) : while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                                    <?php get_template_part('template-parts/blog-left-image'); ?>
                                           <?php
                                                endwhile;
                                                endif;
                                            wp_reset_postdata();
                                            ?>
                                        <?php
                                            $args = array(
                                            'posts_per_page' => 2,
                                            'post_type' => array('post','videos'),
                                            'category__not_in' => 143
                                            );
                                            $recent_posts = new WP_query($args);
                                            // to only display posts if active posts are available
                                                if ( $recent_posts->have_posts() ) : while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                                    <?php get_template_part('template-parts/blog-left-image'); ?>
                                           <?php
                                                endwhile;
                                                endif;
                                            wp_reset_postdata();
                                            ?>
                                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" style="text-decoration: none;"><button class="btn blue-button-ghost blue-home-buttons">See All</button></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="band grey">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-2">
                                        <h2 class="member-home-text">Be a Leader,<br /> Not a Follower.</h2>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <a href="https://centerforinquiry.org/membership" style="text-decoration: none;"><button class="btn member-button">Become a<br />Member</button></a>
                                    </div>
                                </div>
                            </div>

                                <div class="row justify-content-center mt-5 mb-5">
                                    <div class="col-10 col-md-6">
                                        <h2 class="h2-headers">News &amp; Announcements</h2>
                                        <hr class="home-underliner mb-5" />
                                        <div class="clearfix"></div>
                                            <?php
                                                $args = array(
                                                'posts_per_page' => 3,
                                                'post_type' => array('news','action_alerts'),
                                                );
                                            $news_posts = new WP_query($args);
                                            // to only display posts if active posts are available
                                                if ( $news_posts->have_posts() ) : while ( $news_posts->have_posts() ) : $news_posts->the_post(); 
                                                        get_template_part('template-parts/news', 'stacked-block'); 
                                                endwhile;
                                                endif;
                                            wp_reset_postdata();
                                            ?>
                                        <a href="<?php echo esc_url(home_url('/news/')); ?>" style="text-decoration: none;"><button class="btn blue-button-ghost blue-home-buttons">See All</button></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 orange donate-email-home align-items-center">
                                    <img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-web-icon-set-44.svg" class="home-icon-donate mb-4" />
                                    <h3 style="color: white; text-transform: uppercase; font-weight: 900; margin-bottom: 20px;">Donations are<br />greatly appreciated</h3>
                                    <a href="<?php the_field('donation_form_link', 'option'); ?>"><button class="btn white-button-on-orange">Donate Now</button></a>
                                </div>
                                <div class="col-12 col-md-6 px-5 tan donate-email-home align-items-center">
                                    <img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-web-icon-set-47-01.svg" class="home-icon-email mb-3" />
                                    <h3 style="color: #333; text-transform: uppercase; font-weight: 900; margin-bottom: 20px;">Receive Emails from&nbsp;Us</h3>
                                        <?php get_template_part('email-forms/first-step'); ?>
                                </div>
                            </div>

                                <div class="row justify-content-center pt-5 pb-5 lite-grey">
                                    <div class="col-10 col-md-6 text-center">
                                        <h2 class="h2-headers text-left">Advocate With Us</h2>
                                        <hr class="home-underliner mb-5" />
                                        <div class="clearfix"></div>
                                        <div class="shadow white round-corners">
                                            <a class="twitter-timeline" href="https://twitter.com/center4inquiry?ref_src=twsrc%5Etfw" data-tweet-limit="3" data-width="100%"
                                            data-height="300">Tweets by center4inquiry</a> 
                                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                        </div><!--shadow-->
                                    </div><!--Col-->
                                </div><!--Row-->


                                <div class="row justify-content-center mt-5 mb-5">
                                    <div class="col-10 col-md-6 blog-text">
                                        <h2 class="h2-headers">Press Releases</h2>
                                        <hr class="home-underliner mb-5" />
                                        <div class="clearfix"></div>
                                                <?php
                                                    $args = array(
                                                    'posts_per_page' => 3,
                                                    'post_type' => 'press_releases'
                                                    );
                                                $press_releases = new WP_query($args);
                                                // to only display posts if active posts are available
                                                    if ( $press_releases->have_posts() ) : while ( $press_releases->have_posts() ) : $press_releases->the_post(); ?>
                                                        <?php get_template_part('template-parts/news', 'stacked-block'); ?>
                                               <?php
                                                    endwhile;
                                                    endif;
                                                wp_reset_postdata();
                                                ?>
                                        <a href="<?php echo esc_url(home_url('/press_releases/')); ?>" style="text-decoration: none;"><button class="btn grey-button-outline blue-home-buttons">See All</button></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
            <?php }// endwhile;
        }// endif;
        ?>
    </main>
<?php
get_footer();
?>
