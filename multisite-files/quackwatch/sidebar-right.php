<?php
/**
 * The right sidebar.
 * 
 * @package bootstrap-basic4
 */
$post_id = get_the_ID();
$post_type = get_post_type($post_id);
if(is_search()) {
  $sidebar_slug = 'quackwatch-sidebar';
} elseif($post_type != 'page' ) {
  $sidebar_slug = get_post_type_object($post_type)->name.'-sidebar';
} elseif(has_category('home-pages')) {
  if(is_front_page()) {
    $sidebar_slug = 'quackwatch-sidebar';
  } else {
    $faux_post_type = get_post_type_object($post->post_name);
    $sidebar_slug = $faux_post_type->name.'-sidebar';
  }
} else {
  $sidebar_slug = 'quackwatch-sidebar';
}
?> 

      <div id="sidebar-right">
          <?php do_action('before_sidebar'); ?>
        
        <!--<aside id="social-share" class="widget">
        <h1 class="widget-title">Share this page:</h1>
          social_warfare removed
        </aside>-->

          <!--<aside id="email-subscribe" class="widget email-widget">
          <h4>RECEIVE EMAILS FROM US</h4>
          <?php //get_template_part('email-forms/first-step'); ?>
          </aside>-->
          <?php if (is_active_sidebar('universal-sidebar')) { 
            dynamic_sidebar('universal-sidebar');  
          } ?>
          <?php if (is_active_sidebar($sidebar_slug)) { 
            dynamic_sidebar($sidebar_slug);  
          } else {
            dynamic_sidebar('quackwatch-sidebar');
          } ?>
          <aside id="support" class="widget">
          <img class="programs" src="https://centerforinquiry.org/wp-content/uploads/sites/33/2019/12/quackwatch-duck-full.png" />
          <p style="text-align:center;">Quackwatch is a program of the Center for Inquiry.</p>
          <a href="https://centerforinquiry.org/"><img class="programs" src="https://centerforinquiry.org/wp-content/uploads/2020/01/CFI2017.png" /></a>
          <a href="https://centerforinquiry.org/membership" style="text-decoration: none;"><h4 class="grey-button"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-web-icons-member.png" />JOIN CFI</h4></a>
          <a href="<?php the_field('donation_form_link', 'option'); ?>" style="text-decoration: none;"><h4 class="grey-button"><img src="https://cdn.centerforinquiry.org/img/wordpress/cfi-web-icons-donate.png" />DONATE</h4></a>
          </aside>
      </div>
