<?php
/** 
 * The single post.<br>
 * This file works as display full post content page and its comments.
 * 
 * @package bootstrap-basic4
 */
$ee_image = get_field('featuredimage');
$featured_image = get_the_post_thumbnail_url($post->ID, 'medium');

// begins template. -------------------------------------------------------------------------
get_header();
?>

                <!--<?php if($featured_image) { ?>
                    <div class="article-featured-image img-fit  d-block d-print-none" style="background-image:url(<?php echo $featured_image; ?>)">
                    </div>
                <?php } elseif($ee_image) { ?>
                    <div class="ee-featured-image img-fit" style="background-image: url(<?php echo $ee_image; ?>);">
                    </div>
                 <?php } ?>-->

                <main id="main" class="col-md-12 site-main" role="main">

                    <?php
                    if (have_posts()) {
                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                            echo "\n\n";

                            $Bsb4Design->pagination();
                            echo "\n\n";

                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number()) {
                                comments_template();
                            }
                            echo "\n\n";
                        }// endwhile;

                        
                        unset($Bsb4Design);
                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_footer();
