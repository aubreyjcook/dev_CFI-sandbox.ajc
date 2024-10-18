<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */
 $logo = get_field('long_logo', 'option');
 $mobilelogo = get_field('small_logo', 'option');
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" href="https://use.typekit.net/lmm6ycy.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="apple-touch-icon" href="https://cdn.centerforinquiry.org/uploads/apple-icons/centerforinquiry/touch-icon-iphone-60x60.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://cdn.centerforinquiry.org/uploads/apple-icons/centerforinquiry/touch-icon-ipad-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://cdn.centerforinquiry.org/uploads/apple-icons/centerforinquiry/touch-icon-iphone-retina-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://cdn.centerforinquiry.org/uploads/apple-icons/centerforinquiry/touch-icon-ipad-retina-152x152.png">

        <!--wordpress head-->
        <?php wp_head(); ?> 
        <!--end wordpress head-->
        <?php
          // check if the repeater field has rows of data
          if( have_rows('analytics','options') ):
            // loop through the rows of data
              while ( have_rows('analytics','options') ) : the_row('analytics', 'options');
                  // display a sub field value
                  include_once('analytics/'.get_sub_field('file_name'));
              endwhile;
          endif;
          ?>
    </head>
    <body <?php body_class(); ?>>
        <?php include_once('analytics/google-tag-body.php'); ?>
        <div id="top" class="wrapper">
        <div class="container-fluid page-container blue" style="padding-left: 0px !important; padding-right: 0px !important;">
            <header class="page-header page-header-sitebrand-topbar">
                <div class="row main-navigation">
                    <nav class="navbar navbar-toggleable-xs">
                            <a class="home-button d-none d-md-block" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php echo wp_get_attachment_image($logo, 'full'); ?>    
                            </a>
                            <a class="home-button d-md-none" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php echo wp_get_attachment_image($mobilelogo, 'full'); ?>    
                            </a>
                    </nav>
                    <?php if( is_admin_bar_showing() ) { ?>
                    <nav class="collapse-nav" style="top: 157px;">
                    <?php } else { ?>
                    <nav class="collapse-nav" style="top: 125px;">
                    <?php }; ?>
                    </nav>
                </div><!--.main-navigation-->

            </header><!--.page-header-->
        </div>
        <noscript>
            <div class="alert alert-danger center" role="alert">
              <strong>Alert:</strong> This site works better with javascript. Enable javascript for your browser:<br /><a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-chrome.html" class="alert-link" target='_blank'>Chrome Instructions</a>, <a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-firefox.html" class="alert-link" target='_blank'>Firefox Instructions</a>, <a href="https://answers.microsoft.com/en-us/windows/forum/windows_10-networking/how-to-enable-javascript-in-microsoft-edge/ba12aa2e-6f2f-4d87-a990-5c1d2fd7036c" class="alert-link" target='_blank'>Edge Instructions</a>, <a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-internet-explorer.html" class="alert-link" target='_blank'>Internet Explorer Instructions</a>, <a href="https://aboutjavascript.com/en/how-to-enable-javascript-in-safari.html" class="alert-link" target='_blank'>Safari Instructions</a>.
            </div>
        </noscript>
        <div class="container-fluid page-container white">
            <div id="content" class="site-content row">
