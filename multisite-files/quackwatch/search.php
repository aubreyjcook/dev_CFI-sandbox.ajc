<?php
/** 
 * The search template.
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
                    <main id="main" class="site-main dft-padding no-stretch" role="main">
                        <header class="entry-header">
                            <h1 class="entry-title">Search</h1>
                            <hr />
                        </header><!-- .entry-header -->
                        <?php echo do_shortcode('[searchandfilter slug="search"]'); ?>
                        <?php echo do_shortcode('[searchandfilter slug="search" show="results"]'); ?>
                
                    </main>
                </div>
                

                <div id="sidebar-wrapper" class="">
                    <?php
                    get_sidebar('right'); ?>
                </div><!-- sidebar-wrapper -->
        </div><!--Site Content-->
 <?php
get_footer();
