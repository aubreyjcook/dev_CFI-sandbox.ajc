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

 if(is_search()) {
  $site_title = 'Quackwatch';
  $description = 'Your Guide to Quackery, Health Fraud, and Intelligent Decisions';
  $site_link = esc_html(home_url('/'));
 } elseif($post_type != 'page' ) {
    $post_type_object = get_post_type_object($post_type);
    $site_title = $post_type_object->labels->singular_name;
    $description = $post_type_object->labels->archives;
    $site_link = esc_html(home_url('/'.$post_type_object->name.'/'));
 } elseif(has_category('home-pages')) {
    if(is_front_page()) {
      $site_title = 'Quackwatch';
      $description = 'Your Guide to Quackery, Health Fraud, and Intelligent Decisions';
      $site_link = esc_html(home_url('/'));
    } else {
      $affiliated = get_post_type_object($post->post_name);
      $site_title = $affiliated->labels->singular_name;
      $description = $affiliated->labels->archives;
      $site_link = esc_html(home_url('/'.$post_type_object->name.'/'));
    }
 } else {
  $site_title = 'Quackwatch';
  $description = 'Your Guide to Quackery, Health Fraud, and Intelligent Decisions';
  $site_link = esc_html(home_url('/'));
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
    <?php //include_once('analytics/google-tag-body.php'); ?>
    <div id="top" class="wrapper">
    <div class="container-fluid page-container blue d-block d-print-none" style="padding-left: 0px !important; padding-right: 0px !important;">
    <header class="page-header page-header-sitebrand-topbar">
    <nav class="navbar navbar-expand-lg navbar-dark row">

        <div class="col-12 col-lg-8">
          <a class="navbar-brand" href="<?php echo $site_link; ?>" title="<?php echo $site_title; ?>" rel="home">
            <img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>" alt="quackwatch-duck" id="site-logo" />
            <div>
              <h5><?php echo $site_title; ?></h5>
              <p class="d-none d-md-block"><?php echo $description; ?></p> 
            </div>
          </a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php 
                wp_nav_menu(
                    array(
                        'depth' => '1',
                        'theme_location' => 'primary', 
                        'container' => false, 
                        'menu_class' => 'navbar-nav mr-lg-auto', 
                        'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                    )
                ); 
                ?>
            <!--Search & Display for Mobile-->
            <div id="header-extras" class="d-flex flex-column align-items-center d-lg-none">
            <a href="<?php echo esc_url(home_url('/support-cfi/')); ?>" style="text-decoration: none;"><button class="white-btn-on-red">Donate</button></a>
              <form class="form-inline my-3" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="form-control mr-2" type="search" name="s" value="" placeholder="Search" aria-label="Search">
                <button class="btn btn-dark" type="submit">Search</button>
              </form>
              <select>
                <option value="#">Visit Our Affiliated Sites</option>
                <option value="quackwatch">Quackwatch</option>
                <option value="acupuncture">Acupuncture Watch</option>
                <option value="allergy">Allergy Watch</option>
                <option value="autism">Autism Watch</option>
                <option value="cancer">Cancer Treatment Watch</option>
                <option value="cases">Casewatch</option>
                <option value="chelation">Chelation Watch</option>
                <option value="chiro">Chirobase</option>
                <option value="credential">Credential Watch</option>
                <option value="dental">Dental Watch</option>
                <option value="device">Device Watch</option>
                <option value="diet">Diet Scam Watch</option>
                <option value="fibro">Fibromyalgia Watch</option>
                <option value="homeo">Homeowatch</option>
                <option value="info">Infomercial Watch</option>
                <option value="ihealth">Internet Health Pilot</option>
                <option value="mental">Mental Health Watch</option>
                <option value="mlm">MLM Watch</option>
                <option value="naturo">Naturowatch</option>
                <option value="ncahf">NCAHF</option>
                <option value="nccam">NCCAM Watch</option>
                <option value="nutrition">Nutriwatch</option>
                <option value="pharmacy">Pharmwatch</option>
              </select>
            </div>
            <!-- // -->
          </div>
        </div>

        <div class="col-12 col-lg-4 d-none d-lg-flex">
          <!--Search & Select for Desktop-->
          <div id="header-extras">
          <a href="<?php echo esc_url(home_url('/support-cfi/')); ?>" style="text-decoration: none;"><button class="white-btn-on-red">Donate</button></a>
          
            <form class="form-inline my-2" method="get" action="<?php echo esc_url(home_url('/')); ?>">
              <input class="form-control mr-sm-2" type="search" name="s" value="" placeholder="Search" aria-label="Search">
              <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
              </form>

              <!--<a href="<?php echo esc_url(home_url('?s&_sf_s=')); ?>" style="text-decoration: none;"><button class="btn btn-dark my-2 my-sm-0">Search</button>-->
              
            <select>
              <option value="#">Visit Our Affiliated Sites</option>
              <option value="quackwatch">Quackwatch</option>
              <option value="acupuncture">Acupuncture Watch</option>
              <option value="allergy">Allergy Watch</option>
              <option value="autism">Autism Watch</option>
              <option value="cancer">Cancer Treatment Watch</option>
              <option value="cases">Casewatch</option>
              <option value="chelation">Chelation Watch</option>
              <option value="chiro">Chirobase</option>
              <option value="credential">Credential Watch</option>
              <option value="dental">Dental Watch</option>
              <option value="device">Device Watch</option>
              <option value="diet">Diet Scam Watch</option>
              <option value="fibro">Fibromyalgia Watch</option>
              <option value="homeo">Homeowatch</option>
              <option value="info">Infomercial Watch</option>
              <option value="ihealth">Internet Health Pilot</option>
              <option value="mental">Mental Health Watch</option>
              <option value="mlm">MLM Watch</option>
              <option value="naturo">Naturowatch</option>
              <option value="ncahf">NCAHF</option>
              <option value="nccam">NCCAM Watch</option>
              <option value="nutrition">Nutriwatch</option>
              <option value="pharmacy">Pharmwatch</option>
            </select>
          </div>
          <!-- // -->
        </div>

      </nav>
      </div><!--.main-navigation-->

    </header><!--.page-header-->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>

    <noscript>
            <div class="alert alert-danger center" role="alert">
              <strong>Alert:</strong> This site works better with javascript. Enable javascript for your browser:<br /><a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-chrome.html" class="alert-link" target='_blank'>Chrome Instructions</a>, <a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-firefox.html" class="alert-link" target='_blank'>Firefox Instructions</a>, <a href="https://answers.microsoft.com/en-us/windows/forum/windows_10-networking/how-to-enable-javascript-in-microsoft-edge/ba12aa2e-6f2f-4d87-a990-5c1d2fd7036c" class="alert-link" target='_blank'>Edge Instructions</a>, <a href="http://aboutjavascript.com/en/how-to-enable-javascript-in-internet-explorer.html" class="alert-link" target='_blank'>Internet Explorer Instructions</a>, <a href="https://aboutjavascript.com/en/how-to-enable-javascript-in-safari.html" class="alert-link" target='_blank'>Safari Instructions</a>.
            </div>
    </noscript>
<div class="container-fluid page-container white">
