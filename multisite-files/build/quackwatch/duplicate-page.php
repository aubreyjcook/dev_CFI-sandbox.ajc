<?php
/* Template Name: Duplicate Post Names */
// begins template. -------------------------------------------------------------------------
get_header();
?> 
        </div>

            <div id="content" class="site-content row">
                            <main id="main" class="site-main dft-padding readability" role="main">
                                <header class="entry-header">
                                    <h1 class="entry-title">Duplicate Post Names</h1>
                                    <hr />
                                    <div class="clearfix"></div>
                                </header><!-- .entry-header -->

                                    <?php 
                                // the query
                                
                                $args = array(
                                    'post_type' => 'any',
                                    'posts_per_page' => -1,
                                );
                                $the_query = new WP_Query( $args ); ?>
                                
                                <?php if ( $the_query->have_posts() ) { ?>
                                <ol>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                        if(!$post->post_parent) {
                                            //echo "not a child page";
                                        } else {
                                            $post_parent_id = $post->post_parent;
                                            $parent_post_name = get_post_field('post_name', $post_parent_id );
                                            $post_name = get_post_field('post_name', $post);
                                            if($post_name == $parent_post_name) { ?>
                                                <li><?php the_title(); ?><br />
                                                <a href="<?php echo get_the_permalink(); ?>"><?php the_permalink(); ?></a><br />
                                                <a href="<?php echo get_the_permalink($post_parent_id); ?>"><?php the_permalink($post_parent_id); ?></a></li>
                                            <?php }
                                        }
                                endwhile; ?>
                                </ol>              
                            <?php } ?>

                            <header class="entry-header">
                                    <h1 class="entry-title">Overview Post Names</h1>
                                    <hr />
                                    <div class="clearfix"></div>
                                </header><!-- .entry-header -->

                                <?php 
                                // the query
                                
                                $args = array(
                                    'post_type' => 'any',
                                    'posts_per_page' => -1,
                                    'name' => 'overview'
                                );
                                $the_query = new WP_Query( $args ); ?>
                                
                                <?php if ( $the_query->have_posts() ) { ?>
                                <ol>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                            $post_parent_id = $post->post_parent;
                                            $parent_post_name = get_post_field('post_name', $post_parent_id );
                                            $post_name = get_post_field('post_name', $post); ?>
                                                <li><?php the_title(); ?><br />
                                                <a href="<?php echo get_the_permalink(); ?>"><?php the_permalink(); ?></a><br />
                                                <a href="<?php echo get_the_permalink($post_parent_id); ?>"><?php the_permalink($post_parent_id); ?></a></li>
                                            <?php 
                                endwhile; ?>
                                </ol>              
                            <?php } ?>
                            
                            </main>
                        </div>
            </div><!--Site Content-->
<?php
get_footer();
