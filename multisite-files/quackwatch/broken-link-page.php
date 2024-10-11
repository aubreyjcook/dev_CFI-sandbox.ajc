<?php
/* Template Name: Broken Link Check */
// begins template. -------------------------------------------------------------------------
get_header();
?> 
        </div>

            <div id="content" class="site-content row">
                            <main id="main" class="site-main dft-padding readability" role="main">
                                <header class="entry-header">
                                    <h1 class="entry-title">Broken Link Check</h1>
                                    <hr />
                                    <div class="clearfix"></div>
                                </header><!-- .entry-header -->

                            <?php 
                            $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                            $sites = array(
                                'public' => true,
                                'hierarchical' => true,
                            );
                            $all_sites = get_post_types($sites,'objects');
                            foreach($all_sites as $sites) { ?>
                                    <?php 
                                // the query
                                
                                $args = array(
                                    'post_type' => $sites->name,
                                    'category__not_in' => array(335, 312),
                                    'posts_per_page' => -1,
                                    'order' => ASC,
                                    'orderby' => 'name'
                                );
                                $the_query = new WP_Query( $args ); ?>
                                
                                <?php if ( $the_query->have_posts() ) { 
                                    while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $child_args = array(
                                        'post_type' => $sites->name,
                                        'post_parent' => get_the_id(),
                                        'posts_per_page' => -1,
                                        'order' => ASC,
                                        'orderby' => 'name'
                                    );
                                    $the_child_query = new WP_Query( $child_args );
                                    if ( $the_child_query->have_posts() ) { ?>
                                    <div class="site-map-listing">
                                        <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                        <p class="mb-4" style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                    </div>
                                    <?php  
                                        } else {} ?>
                                <?php endwhile;
                                } ?>
                            <?php } ?>
                            
                            </main>
                        </div>
            </div><!--Site Content-->
<?php
get_footer();
