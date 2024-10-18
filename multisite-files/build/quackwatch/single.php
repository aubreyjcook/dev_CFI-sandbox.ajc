<?php
/** 
 * The single post.<br>
 * This file works as display full post content page and its comments.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
?> 
    </div>
        <div id="content" class="site-content row">
                <button id="sidebar-button" class="">+</button>
                    <div id="content-wrapper" class="">
                        <main id="main" class="site-main dft-padding readability" role="main">
                            <?php
                            if (have_posts()) {
                                $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                                while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/content-page');
                                    echo "\n\n";

                                    $Bsb4Design->pagination();
                                    echo "\n\n";
                                    
                                }// endwhile;

                                
                                unset($Bsb4Design);
                            } else {
                                get_template_part('template-parts/section', 'no-results');
                            }// endif;
                            ?>                    
                        </main>
                        </div>


                    <div id="sidebar-wrapper" class="">
                        <?php get_sidebar('right'); ?>
                    </div><!-- sidebar-wrapper -->
            </div><!--Site Content-->
<?php
get_footer();
