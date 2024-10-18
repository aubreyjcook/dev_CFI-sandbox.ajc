<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */
 $logo = get_field('long_logo', 'option');
 $mobilelogo = get_field('small_logo', 'option');
 $facebook = get_field('facebook', 'option');
 $meetup = get_field('meetup', 'option');
 $twitter = get_field('twitter', 'option');
 $youtube = get_field('youtube', 'option');

 $site_title = esc_attr(get_bloginfo('name', 'display'));
 $description = get_bloginfo( 'description' );

 $post_id = get_the_id();
 $post_type = get_post_type($post_id);

 if($post_type != 'page' ) {
    $post_type_object = get_post_type_object($post_type);
    $site_title = $post_type_object->labels->singular_name;
    $description = $post_type_object->labels->archives;
 } elseif(has_category('home-pages')) {
    if(has_category('acupuncture')) {
        $site_title = 'Acupuncture Watch';
        $description = 'The Skeptical Guide to Acupuncture History, Theories, and Practices';
    } elseif(has_category('allergy')) {
        $site_title = 'Allergy Watch';
        $description = 'Your Guide to Questionable Theories and Practices';
    } elseif(has_category('autism')) {
        $site_title = 'Autism Watch';
        $description = 'Your Scientific Guide to Autism';
    } elseif(has_category('cancer')) {
        $site_title = 'Cancer Treatment Watch';
        $description = 'Your Guide to Intelligent Treatment';
    } elseif(has_category('cases')) {
        $site_title = 'Casewatch';
        $description = 'Your Guide to Health-Related Legal Matters';
    } elseif(has_category('chelation')) {
        $site_title = 'Chelation Watch';
        $description = 'A Skeptical View of Chelation Therapy';
    } elseif(has_category('chiropractic')) {
        $site_title = 'Chiropractic Watch';
        $description = 'Your Skeptical Guide to Chiropractic History, Theories, and Practices';
    } elseif(has_category('credential')) {
        $site_title = 'Credential Watch';
        $description = 'Your Guide to Health-Related Education and Training';
    } elseif(has_category('dental')) {
        $site_title = 'Dental Watch';
        $description = 'Your Guide to Intelligent Dental Care';
    } elseif(has_category('device')) {
        $site_title = 'Device Watch';
        $description = 'Your Guide to Questionable Medical Devices';
    } elseif(has_category('diet')) {
        $site_title = 'Diet Scam';
        $description = 'Your Guide to Weight-Control Schemes and Ripoffs';
    } elseif(has_category('fibromyalgia')) {
        $site_title = 'Fibromyalgia Watch';
        $description = 'Your Guide to the Fibromyalgia Marketplace';
    } elseif(has_category('homeopathy')) {
        $site_title = 'Homeopathy Watch';
        $description = 'Your Skeptical Guide to Homeopathic History, Theories, and Current Practices';
    } elseif(has_category('infomercial')) {
        $site_title = 'Informercial Watch';
        $description = 'A Critical View of the Health Infomercial Marketplace';
    } elseif(has_category('ihealth-pilot')) {
        $site_title = 'Internet Health Pilot';
        $description = 'Your Gateway to Trustworthy Health Information';
    } elseif(has_category('mental-health')) {
        $site_title = 'Mental Health Watch';
        $description = 'Your Guide to the Mental Health Marketplace';
    } elseif(has_category('mlm')) {
        $site_title = 'Multilevel Marketing Watch';
        $description = 'The Skeptical Guide to Multilevel Marketing';
    } elseif(has_category('naturopathy')) {
        $site_title = 'Naturopathy Watch';
        $description = 'The Skeptical Guide to Naturopathic History, Theories, and Practices';
    } elseif(has_category('nccam')) {
        $site_title = 'NCCAM Watch';
        $description = 'An Antidote to the National Center for Complementary and Alternative Medicine';
    } elseif(has_category('nutrition')) {
        $site_title = 'Nutrition Watch';
        $description = 'Your Guide to Sensible Nutrition';
    } elseif(has_category('pharmacy')) {
        $site_title = 'Pharmacy Watch';
        $description = 'Your Guide to the Drug Marketplace and Lower Prices';
    } 
 }

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
        <script src="https://kit.fontawesome.com/11edc66555.js" crossorigin="anonymous"></script>
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
        <div class="container-fluid page-container blue d-block d-print-none" style="padding-left: 0px !important; padding-right: 0px !important;">
            <header class="page-header page-header-sitebrand-topbar">
                <div class="row main-navigation">
                    <nav class="navbar navbar-toggleable-xs">
                            <a class="home-button d-none d-md-block" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo $site_title; ?>" rel="home">
                                <?php echo wp_get_attachment_image($logo, 'full'); ?>
                                <div>
                                    <?php echo $site_title; ?><br />
                                    <span class="description"><?php echo $description; ?></span>  
                                </div>
                            </a>
                            <a class="home-button d-md-none" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo $site_title; ?>" rel="home">
                                <?php echo wp_get_attachment_image($mobilelogo, 'full'); ?> <?php echo $site_title; ?>
                            </a>
                            
                            <div class="header-right">
                                <a href="<?php echo esc_url(home_url('/support-cfi/')); ?>">
                                    <button class="btn white-button-on-blue donate-top-button">
                                    SUPPORT</button>
                                </a>
                                <a href="<?php echo esc_url(home_url('?s')); ?>"><i class="fa fa-search fa-lg top-search" aria-hidden="true"></i></a>
                                <div id="menu-text" data-toggle="collapse" data-target="#bootstrap-basic4-topnavbar" aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'bootstrap-basic4'); ?>">MENU</div>
                                <!-- Code By Jesse Couch -->
                                <div id="nav-icon3" data-toggle="collapse" data-target="#bootstrap-basic4-topnavbar" aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'bootstrap-basic4'); ?>">
                                      <span></span>
                                      <span></span>
                                      <span></span>
                                      <span></span>

                                <!--End Code by Jesse Couch-->
                                </div>
                            </div>
                    </nav>
                    <?php if( is_admin_bar_showing() ) { ?>
                    <nav class="collapse-nav" style="top: 157px;">
                    <?php } else { ?>
                    <nav class="collapse-nav" style="top: 125px;">
                    <?php }; ?>
                        <div id="bootstrap-basic4-topnavbar" class="collapse navbar-collapse">
                            <div class="mt-4 mb-4">
                            <?php 
                            wp_nav_menu(
                                array(
                                    'depth' => '2',
                                    'theme_location' => 'primary', 
                                    'container' => false, 
                                    'menu_class' => 'navbar-nav mr-auto justify-content-between', 
                                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                                )
                            ); 
                            ?> 
                            </div>
                            <a href="<?php echo esc_url(home_url('?s')); ?>"><i class="fa fa-search fa-lg bottom-search" aria-hidden="true"></i></a>
                            <a href="<?php echo esc_url(home_url('/support-cfi/')); ?>" style="text-decoration: none;">
                                    <button class="btn donate-bottom-button">
                                    SUPPORT</button>
                                </a>
                            <!-- social media icons -->
                            <div class="social-media-icons mb-5">
                                <?php if(!empty($facebook)) { ?>
                                    <a href="<?php echo $facebook; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-event-icons-new-fb-blue.png" class="header-icon mx-1" /></a>
                                <?php } ?>
                                <?php if(!empty($twitter)) { ?>
                                    <a href="<?php echo $twitter; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-event-icons-new-tw-blue.png" class="header-icon mx-1" /></a>
                                <?php } ?>
                                <?php if(!empty($meetup)) { ?>
                                    <a href="<?php echo $meetup; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-event-icons-new-mu-blue.png" class="header-icon mx-1" /></a>
                                <?php } ?>
                                <?php if(!empty($youtube)) { ?>
                                    <a href="<?php echo $youtube; ?>" target="_blank"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-event-icons-new-yt-blue.png" class="header-icon mx-1" /></a>
                                <?php } ?>
                            </div>
                            <!-- social media icons -->
                        </div><!--.navbar-collapse-->
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
