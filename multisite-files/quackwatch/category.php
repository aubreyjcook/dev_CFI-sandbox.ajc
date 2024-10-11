<?php
/** 
 * The archive template.
 * 
 * Use for display author archive, category, custom post archive, custom taxonomy archive, tag, date archive.<br>
 * These archive can override by each archive file name such as category will be override by category.php.<br>
 * To learn more, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();
$category = get_queried_object();
?> 
</div>
            <div id="content" class="site-content row">
                    <button id="sidebar-button" class="">+</button>
                    <div id="content-wrapper" class="">
                        <main id="main" class="site-main dft-padding" role="main">
                            <?php if (have_posts()) { 
                                    $author_image = get_field('author_image', $category);
                                    $author_image_link = wp_get_attachment_image_src($author_image, 'medium');
                                ?> 
                            <header class="page-header">
                                <h1 class="entry-title"><?php echo $category->name; ?></h1>
                                    <hr />
                                    <div class="clearfix"></div>
                                <div class="taxonomy-description">
                                    <div class= "speaker-event-image img-fit mr-2 mb-2" style="background-image:url(<?php echo $author_image_link[0]; ?>)">
                                    </div>
                                    <?php echo apply_filters('the_content', $category->description); ?></div>
                                    <div class="clearfix"></div>
                            </header><!-- .page-header -->
                                    <?php 
                                    // Start the Loop
                                    while (have_posts()) {
                                        the_post(); 
                                        get_template_part('template-parts/blog-left-image');
                                    } //endwhile; 

                                    $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                                    $Bsb4Design->pagination();
                                    unset($Bsb4Design);
                                } else {
                                    get_template_part('template-parts/section', 'no-results');
                                } //endif; 
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
