<?php
/* Template Name: 404 Error */
get_header();
?>
                <main id="main" class="col-12 site-main dft-padding" role="main">
                    <div class="row no-stretch" id="fourohfour-row">
                        <div class="col-11 col-md-5 col-lg-6">
                            <img src="https://cdn.centerforinquiry.org/img/404page/404-page-beaker.png" id="fourohfour-image" />
                        </div>
                        <div class="col-11 col-md-5 col-lg-4">
                            <h3 id="fourohfour-subhead" class="mt-5"><strong>Evolution is messy.</strong></h3>
                            <p>Our website was recently redesigned, and some older links may have broken. Use the search bar or look around in the menu, chances are you can still find what you're looking for!</p>
                            <div class="fourohfour-search-container mt-5 mb-5">
                                <div class="widget widget_search">
                                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                        <div class="input-group">
                                            <input class="form-control fourohfour-search" type="search" name="s" value="" placeholder="Search …" title="Search …">
                                            <span class="input-group-btn">
                                            <button class="btn grey-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                            </span>
                                        </div>
                                    </form>
                                </div><!--Search Bar-->
                            </div><!--Search-Container-->
                            <a href="<?php echo esc_url(home_url()); ?>"><button class="btn grey-button-outline" id="fourohfour-button">Back Home</button></a>
                        </div><!--Col-->
                    </div><!--Row-->
                </main>
<?php
get_footer();
