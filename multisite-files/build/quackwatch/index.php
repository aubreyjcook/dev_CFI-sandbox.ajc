<?php
/**
 * The main template file.
 * 
 * To override home page (for listing latest post) add home.php into the theme.<br>
 * If front page displays is set to static, the index.php file will be use.<br>
 * If front-page.php exists, it will be override any home page file such as home.php, index.php.<br>
 * To learn more please go to https://developer.wordpress.org/themes/basics/template-hierarchy/ .
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
                        <main id="main" class="site-main no-stretch dft-padding" role="main">
                            <?php
                            if (have_posts()) { ?>
                            <header class="page-header">
                                <h1 class="entry-title">Blogs</h1>
                                    <hr />
                            </header><!-- .page-header -->
                                <?php while (have_posts()) {
                                    the_post();
                                    get_template_part('template-parts/blog-left-image');
                                    //get_template_part('template-parts/content', get_post_format());
                                }// endwhile;

                                $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                                $Bsb4Design->pagination();
                                unset($Bsb4Design);
                            } else {
                                get_template_part('template-parts/section', 'no-results');
                            }// endif;
                            ?> 
                        </main>
                    </div>

                
                    <div id="sidebar-wrapper" class="">
                        <?php
                        get_sidebar('right'); ?>
                    </div><!-- sidebar-wrapper -->
            </div><!--Site Content-->

<?php                          
get_footer();
