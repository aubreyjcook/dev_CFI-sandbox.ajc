<?php
/* Template Name: Site Map */
// begins template. -------------------------------------------------------------------------
get_header();
?> 
        </div>

            <div id="content" class="site-content row">
                            <main id="main" class="site-main dft-padding readability" role="main">
                                <header class="entry-header">
                                    <h1 class="entry-title">Site Map</h1>
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
                                <div class="site-map-listing">
                                    <h5><a href="<?php echo esc_html(home_url('/'.$sites->name.'/')); ?>" target="_blank"><?php echo $sites->labels->singular_name; ?></a></h5>
                                        <p class="mb-4" style="font-size:.9em; color: grey;">/<?php echo $sites->name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo esc_html(home_url('/'.$sites->name.'/')); ?>">Copy Link</a><br />

                                    <?php 
                                // the query
                                
                                $args = array(
                                    'post_type' => $sites->name,
                                    'post_parent' => 0,
                                    'posts_per_page' => -1,
                                    'order' => ASC,
                                    'orderby' => 'name'
                                );
                                $the_query = new WP_Query( $args ); ?>
                                
                                <?php if ( $the_query->have_posts() ) { ?>
                                <a style="color: grey; text-decoration: underline;" data-toggle="collapse" href="#<?php echo $sites->name; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $sites->name; ?>"><i class="fas fa-plus"></i> Show/Hide Child Pages</a></p>
                                <ul>
                                    <div id="<?php echo $sites->name; ?>" class="collapse mb-4">
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $eyedee = $f->format(get_the_id());
                                    $eye_dee = str_replace(' ', '-', $eyedee);
                                    ?>
                                    <div class="site-map-listing">
                                    <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                        <p class="mb-4" style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                        <?php 
                                            $child_args = array(
                                                'post_type' => $sites->name,
                                                'post_parent' => get_the_id(),
                                                'posts_per_page' => -1,
                                                'order' => ASC,
                                                'orderby' => 'name'
                                            );
                                            $the_child_query = new WP_Query( $child_args );
                                            if ( $the_child_query->have_posts() ) { ?>
                                            <a style="color: grey; text-decoration: underline;" data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Child Pages</a></p>
                                            <ul>
                                                <div id="<?php echo $eye_dee; ?>" class="collapse mb-4">
                                                <?php while ( $the_child_query->have_posts() ) : $the_child_query->the_post(); 
                                                    $eyedee = $f->format(get_the_id());
                                                    $eye_dee = str_replace(' ', '-', $eyedee);
                                                ?>
                                                    <div>
                                                        <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                                        <p style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                                        <?php 
                                                            $sub_child_args = array(
                                                                'post_type' => $sites->name,
                                                                'post_parent' => get_the_id(),
                                                                'posts_per_page' => -1,
                                                                'order' => ASC,
                                                                'orderby' => 'name'
                                                            );
                                                            $the_sub_child_query = new WP_Query( $sub_child_args );
                                                            if ( $the_sub_child_query->have_posts() ) { ?>
                                                            <a style="color: grey; text-decoration: underline;" data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Child Pages</a></p>
                                                            <ul>
                                                                <div id="<?php echo $eye_dee; ?>" class="collapse mb-4">
                                                                <?php while ( $the_sub_child_query->have_posts() ) : $the_sub_child_query->the_post(); 
                                                                    $eyedee = $f->format(get_the_id());
                                                                    $eye_dee = str_replace(' ', '-', $eyedee);
                                                                ?>
                                                                
                                                                    <div>
                                                                        <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                                                        <p style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                                                        <?php 
                                                                            $sub_sub_child_args = array(
                                                                                'post_type' => $sites->name,
                                                                                'post_parent' => get_the_id(),
                                                                                'posts_per_page' => -1,
                                                                                'order' => ASC,
                                                                                'orderby' => 'name'
                                                                            );
                                                                            $the_sub_sub_child_query = new WP_Query( $sub_sub_child_args );
                                                                            if ( $the_sub_sub_child_query->have_posts() ) { ?>
                                                                            <a style="color: grey; text-decoration: underline;" data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Child Pages</a></p>
                                                                            <ul>
                                                                                <div id="<?php echo $eye_dee; ?>" class="collapse mb-4">
                                                                                <?php while ( $the_sub_sub_child_query->have_posts() ) : $the_sub_sub_child_query->the_post(); 
                                                                                    $eyedee = $f->format(get_the_id());
                                                                                    $eye_dee = str_replace(' ', '-', $eyedee);
                                                                                ?>
                                                                                
                                                                                    <div>
                                                                                        <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                                                                        <p style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                                                                        <?php 
                                                                                            $sub_sub_sub_child_args = array(
                                                                                                'post_type' => $sites->name,
                                                                                                'post_parent' => get_the_id(),
                                                                                                'posts_per_page' => -1,
                                                                                                'order' => ASC,
                                                                                                'orderby' => 'name'
                                                                                            );
                                                                                            $the_sub_sub_sub_child_query = new WP_Query( $sub_sub_sub_child_args );
                                                                                            if ( $the_sub_sub_sub_child_query->have_posts() ) { ?>
                                                                                            <a style="color: grey; text-decoration: underline;" data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Child Pages</a></p>
                                                                                            <ul>
                                                                                                <div id="<?php echo $eye_dee; ?>" class="collapse mb-4">
                                                                                                <?php while ( $the_sub_sub_sub_child_query->have_posts() ) : $the_sub_sub_sub_child_query->the_post(); 
                                                                                                    $eyedee = $f->format(get_the_id());
                                                                                                    $eye_dee = str_replace(' ', '-', $eyedee);
                                                                                                ?>
                                                                                                
                                                                                                    <div>
                                                                                                        <h5><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> &nbsp;&nbsp;&nbsp;<span style="font-size:.75em;"><a style="color: grey; text-decoration: underline;" href="<?php echo esc_html(home_url('/wp-admin/post.php?post='.get_the_id().'&action=edit')); ?>" target="_blank">Edit Page</a></span></h5>
                                                                                                        <p style="font-size:.9em; color: grey;">/<?php echo $post->post_name; ?>/ &nbsp;&nbsp;&nbsp;<a class="copy-text-link" data-tippy-content="Link Copied" style="color: grey; text-decoration: underline;" data-clipboard-text="<?php echo get_the_permalink(); ?>">Copy Link</a><br />
                                                                                                    </div>
                                                                                                
                                                                                                <?php endwhile; ?>
                                                                                                </div>
                                                                                            </ul>
                                                                                            <?php } else {
                                                                                                echo "</p>";
                                                                                            } ?>
                                                                                    </div>
                                                                                
                                                                                <?php endwhile; ?>
                                                                                </div>
                                                                            </ul>
                                                                            <?php } else {
                                                                                echo "</p>";
                                                                            } ?>
                                                                    </div>
                                                                
                                                                <?php endwhile; ?>
                                                                </div>
                                                            </ul>
                                                            <?php } else {
                                                                echo "</p>";
                                                            } ?>
                                                    </div>
                                                
                                                <?php endwhile; ?>
                                                </div>
                                            </ul>
                                            <?php } else {
                                                echo "</p>";
                                            } ?>
                                    </div>
                                
                                    <?php endwhile; ?>      
                                </div>
                                </ul>                          
                                    <?php //wp_reset_postdata(); ?>
                                    <?php } else {
                                        echo "</p>";
                                    } ?>
                            <?php } ?>

                            
                            </main>
                        </div>
            </div><!--Site Content-->
<?php
get_footer();
