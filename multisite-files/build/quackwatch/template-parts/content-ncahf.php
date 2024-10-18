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
            $current_page = $post->post_name;
            echo "<!-- ".$current_page." -->";
            $current_page_par = intval(explode('-', $current_page, 2)[0]);
            echo "<!-- ".$current_page_par." -->";
            $current_page_num = intval(explode('-', $current_page, 2)[1]);
            echo "<!-- ".$current_page_num." -->";
            $parent = get_post_ancestors($post_id);
            if($parent) {
                $parent_name = get_post_field( 'post_name', $parent[0]);
                //echo $parent_name;
                //var_dump(strpos($parent_name, 'digest'));
                if(strpos($parent_name, 'digest') === 0 ) {
                    echo '<hr />';
                    $previous_page_name = sprintf("%02d", $current_page_num - 1);
                    echo "<!-- ".$previous_page_name." -->";
                    $next_page_name = sprintf("%02d", $current_page_num + 1);
                    echo "<!-- ".$next_page_name." -->";
                    $previous_page_path = $current_page_par."-".$previous_page_name;
                    echo "<!-- ".$previous_page_path." -->";
                    $next_page_path = $current_page_par."-".$next_page_name;
                    echo "<!-- ".$next_page_path." -->";

                    $previous_page = get_page_by_path("/".$parent_name."/".$previous_page_path, OBJECT, 'ncahf');
                    $next_page = get_page_by_path("/".$parent_name."/".$next_page_path, OBJECT, 'ncahf');

                    echo '<div class="center">';
                    if($previous_page) {
                        echo '<a href="'.get_the_permalink($previous_page->ID).'">< Previous Issue</a>';
                    }
                    if($previous_page && $next_page) {
                        echo ' || ';
                    }
                    if($next_page) {
                        echo '<a href="'.get_the_permalink($next_page->ID).'">Next Issue ></a>';
                    }
                    echo '</div>';
                ?> 
                <br /><p style="text-align: center;"><strong><a href="https://www.ncahf.org/digest/index.html">2001</a>&nbsp;|| <a href="https://www.ncahf.org/digest02/index.html">2002</a>&nbsp;|| <a href="https://www.ncahf.org/digest03/index.html">2003</a>&nbsp;|| <a href="https://www.ncahf.org/digest04/index.html">2004</a> || <a href="https://www.ncahf.org/digest05/index.html">2005</a> || <a href="https://www.ncahf.org/digest06/index.html">2006</a> || <a href="https://www.ncahf.org/digest07/index.html">2007</a></strong><br />
<strong><a href="https://www.ncahf.org/digest08/index.html">2008</a>&nbsp;|| <a href="https://www.ncahf.org/digest09/index.html">2009</a>&nbsp;|| <a href="https://www.ncahf.org/digest10/index.html">2010</a>&nbsp;|| <a href="https://www.ncahf.org/digest11/index.html">2011</a>&nbsp;|| <a href="https://www.ncahf.org/digest12/index.html">2012</a>&nbsp;|| <a href="https://www.ncahf.org/digest13/index.html">2013</a>&nbsp;|| <a href="https://www.ncahf.org/digest14/index.html">2014</a></strong><br />
<strong><a href="https://www.ncahf.org/digest15/index.html">2015</a>&nbsp;|| <a href="https://www.ncahf.org/digest16/index.html">2016</a>&nbsp;|| <a href="https://www.ncahf.org/digest17/index.html">2017</a>&nbsp;|| <a href="https://www.ncahf.org/digest18/index.html">2018</a>&nbsp;|| <a href="https://www.ncahf.org/digest19/index.html">2019</a>&nbsp;|| <a href="https://www.ncahf.org/digest20/index.html">2020</a>&nbsp;|| <a href="https://www.ncahf.org/digest21/">2021</a></strong><br />
<strong><a href="https://www.ncahf.org/digest22/">2022</a>&nbsp;|| <a href="https://quackwatch.org/ncahf/digest23/">2023</a> </strong> 

</p>
<p>To subscribe, <a href="http://lists.quackwatch.org/mailman/listinfo/chd_lists.quackwatch.org">click here</a>.</p>
                <?php }
            }
            
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
