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

        <?php if(is_single()) {
            $repost = get_field('repost', $post);
            if($repost) {
                echo '<link rel="canonical" href="'.get_field('original_article_url', $post).'" />';
            }
        } ?>

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
    <!--Nav Menu-->
    <nav class="navbar navbar-expand-lg navbar-inverse navbar-dark bg-custom">
  <a class="navbar-brand" href="/">
        <img src="https://cdn.centerforinquiry.org/wp-content/uploads/sites/28/2018/09/22141649/SRlogo.png"  class="d-inline-block align-top" alt="">
      </a>  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-auto justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto justify-content-end">
      <a class="nav-item nav-link text-nowrap" href="/about/">About</a>
      <a class="nav-item nav-link text-nowrap" href="/resources/">Resources</a>
      <a class="nav-item nav-link text-nowrap" href="/stories-and-updates/">Saved Lives</a>
      <a class="nav-item nav-link text-nowrap" href="/apply-for-help/">Apply for Help</a>
      <a class="nav-item nav-link text-nowrap" href="/donate/">Donate</a>
    </div>
  </div>
</nav> 
<!--Nav Menu-->        
        <div class="container-fluid page-container">
            <div id="content" class="site-content row">
