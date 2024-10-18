<?php
/** 
 * Display the page content for post type "page".
 * This will be use in full page display.
 * 
 * @package bootstrap-basic4
 */
$post_id = get_the_ID();
$thumbnail = get_the_post_thumbnail_url($post_id, 'large');
$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(get_the_post_thumbnail() != null ) { ?>
        <div class="featured-image" style="background-image:url(<?php echo $thumbnail; ?>)"></div>
    <?php } ?>
    <header class="entry-header">
            <?php if(has_category('parent-pages')) {
                echo '<h1 class="entry-title">'.strtoupper(get_the_title()).'</h1>';
                echo "<hr />";
            } elseif(has_category('home-pages')) { 
                
            } else {
                echo '<h1 class="entry-title">'.get_the_title().'</h1>';
                echo "<hr />";
            } ?>
        <div class="clearfix"></div>
        <?php
            $authors = wp_get_post_terms($post_id, 'authors');
            $count = count($authors);
                if ( $count > 0 ){ 
                $author_link = array();
                    foreach ( $authors as $author ) {
                        $author_anchor = $author->slug;
                        $author_url = '/authors/'.$author->slug;
                        $full_author_url = esc_url(home_url($author_url));
                        $author_link[] = '<a href="'.$full_author_url.'">'.$author->name.'</a>, ';
                    }
                    $author_links_list = join($author_link);
                    echo rtrim($author_links_list, ", ");
                    echo "<br />";
                } ?>
            <?php if(!has_category('parent-pages')) { 
                $post_date = get_the_date('Y-m-d');
                if($post_date > '2019-10-01' && $post_date < '2019-10-31') {
                    
                } elseif(has_category('home-pages')) { 
                
                } else {
                    echo get_the_date();
                }
            } ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php if(has_category('parent-pages')) {
            $args = array(
                'post_type' => get_post_type(),
                'post_parent' => $post_id,
            );
            $children = new WP_query($args);
            if($children->have_posts()):
                while($children->have_posts()): 
                    $children->the_post(); ?>
                    <div>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Continue Reading ></a>
                    </div>
                    <hr />
                <?php endwhile;
            endif;
            wp_reset_postdata();
            get_template_part('template-parts/partial-search-form');
        } else {
            the_content(); 
        } ?> 
        <div class="clearfix"></div>
        <?php
        /**
         * This wp_link_pages option adapt to use bootstrap pagination style.
         */
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'bootstrap-basic4') . ' <ul class="pagination">',
            'after'  => '</ul></div>',
            'separator' => ''
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php $Bsb4Design->editPostLink(); ?> 
    </footer>
</article><!-- #post-## -->
<?php unset($Bsb4Design); ?> 
