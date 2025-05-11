<?php
/**
 * Display the post content in "generic" or "standard" format.
 * This will be use in the loop and full page display.
 * 
 * @package bootstrap-basic4
 */


$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header" style="margin-top: 50px">
        <a href="<?php echo esc_html(home_url('/')); ?>" class="button product_type_simple mb-3">< BACK TO STORE</a>
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <?php if ('post' == get_post_type()) { ?> 
        <div class="entry-meta">
            <?php $Bsb4Design->postOn(); ?> 
        </div><!-- .entry-meta -->
        <?php } //endif; ?> 
    </header><!-- .entry-header -->

    <?php if (is_search()) { // Only display Excerpts for Search ?> 
    <div class="entry-summary">
        <?php the_excerpt(); ?> 
        <div class="clearfix"></div>
    </div><!-- .entry-summary -->
    <?php } else { ?> 
    <div class="entry-content">
        <?php the_content($Bsb4Design->continueReading(true)); ?> 
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
    <?php } //endif; ?> 

    <footer class="entry-meta">
        <?php if ('post' == get_post_type()) { // Hide category and tag text for pages on Search ?> 
        <div class="entry-meta-category-tag">
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(__(', ', 'bootstrap-basic4'));
                if (!empty($categories_list)) {
            ?> 
            <span class="cat-links">
                <?php $Bsb4Design->categoriesList($categories_list); ?> 
            </span>
            <?php } // End if categories ?> 

            <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', __(', ', 'bootstrap-basic4'));
                if ($tags_list) {
            ?> 
            <span class="tags-links">
                <?php $Bsb4Design->tagsList($tags_list); ?> 
            </span>
            <?php } // End if $tags_list ?> 
        </div><!--.entry-meta-category-tag-->
        <?php } // End if 'post' == get_post_type() ?> 

        <div class="entry-meta-comment-tools">
            <?php if (! post_password_required() && (comments_open() || '0' != get_comments_number())) { ?> 
                        <span class="comments-link"><?php $Bsb4Design->commentsLink(); ?></span>
            <?php } //endif; ?> 

            <?php $Bsb4Design->editPostLink(); ?> 
        </div><!--.entry-meta-comment-tools-->
    </footer><!-- .entry-meta -->
    <a href="<?php echo esc_html(home_url('/')); ?>" class="button product_type_simple bottom-router mb-5">< BACK TO STORE</a>
</article><!-- #post-## -->
<?php unset($Bsb4Design); ?> 
