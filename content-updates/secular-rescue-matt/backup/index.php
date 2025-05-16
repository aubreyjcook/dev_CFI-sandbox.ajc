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
                <main id="main" class="col-md-12 site-main" role="main">
                    <?php if (have_posts()) { ?> 
                    <header class="page-header">
                        <h1 class="page-title">Stories and Updates</h1>
                    </header><!-- .page-header -->

                    <?php 
                        // Start the Loop
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content-excerpt');
                        } //endwhile; 

                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        $Bsb4Design->pagination();
                        unset($Bsb4Design);
                    } else {
                        get_template_part('template-parts/section', 'no-results');
                    } //endif; 
                    ?> 
                </main>
<?php
get_footer();
