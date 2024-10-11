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
?> 
</div>
            <div id="content" class="site-content row">
                    <button id="sidebar-button" class="">+</button>
                    <div id="content-wrapper" class="">
                        <main id="main" class="site-main no-stretch dft-padding" role="main">
                            <?php if (have_posts()) { ?> 
                            <header class="page-header">
                                <h1 class="entry-title"><?php echo str_replace("Archives: ", "", get_the_archive_title()); ?></h1>
                                    <hr />
                                    <div class="clearfix"></div>
                                <?php
                                the_archive_description('<div class="taxonomy-description">', '</div>');
                                ?>
                            </header><!-- .page-header -->

                                <?php 
                                // Start the Loop
                                while (have_posts()) {
                                    the_post(); ?>
                                    <div class="mb-5">
                                        <?php if(get_the_post_thumbnail()) { ?>
                                        <?php echo get_the_post_thumbnail(get_the_id(),'thumbnail', array('class'=>'alignleft')); ?>
                                        <?php } ?>
                                        <div class="entry-title mb-3">
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title( '' ); ?></h5></a>
                                        </div>
                                        <?php echo get_the_date();?> by <?php echo get_the_term_list( $post, 'authors', '', ', ' ); ?>
                                        <div class="entry-summary">
                                            <?php the_excerpt(); ?> 
                                            <?php //the_content(); ?> 
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php } //endwhile; 

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
