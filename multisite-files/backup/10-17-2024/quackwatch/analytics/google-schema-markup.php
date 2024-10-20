<!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
  <?php if(is_singular('post')) { 
      $post_id = $post->ID;
      $category = wp_get_post_categories($post_id);
      $authors = wp_get_post_terms($post_id, 'authors');
      $author_list = '';
    ?>
      <script type="application/ld+json">
      {
        "@context" : "http://schema.org",
        "@type" : "Article",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?php echo get_the_permalink($post_id); ?>"
        },
        "headline" : "<?php echo get_the_title($post_id); ?>",
        "publisher" : {
          "@type" : "Organization",
          "name" : "Center for Inquiry",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo wp_get_attachment_image_url($logo, 'full'); ?>"
          }
        },
    <?php foreach ( $authors as $author ) { ?>
        "author" : {
          "@type" : "Person",
          "name" : "<?php echo $author->name; ?>"
        },
    <?php } ?>
        "datePublished" : "<?php echo get_the_date('Y-m-d' , $post_id); ?>",
        "dateModified": "<?php echo get_the_modified_date('Y-m-d' , $post_id); ?>",
        "image" : "<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>",
        "articleSection" : "<?php echo get_cat_name($category[0]); ?>",
        "articleBody" : "<?php echo str_replace( "*", "", str_replace( "\n", " ", str_replace( "\"", "'", strip_tags( wpautop( get_page($post_id)->post_content))))); ?>",
        "url" : "<?php echo get_the_permalink($post_id); ?>"
        }
      </script>
  <?php } elseif(is_singular(array('news', 'press_releases'))) { 
      $post_id = $post->ID;
      $post_type = get_post_type($post_id);
      $post_type_name = get_post_type_object($post_type);
    ?>
      <script type="application/ld+json">
      {
        "@context" : "http://schema.org",
        "@type" : "Article",
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "<?php echo get_the_permalink($post_id); ?>"
        },
        "headline" : "<?php echo get_the_title($post_id); ?>",
        "publisher" : {
          "@type" : "Organization",
          "name" : "Center for Inquiry",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo wp_get_attachment_image_url($logo, 'full'); ?>"
          }
        },
        "author" : {
          "@type" : "Organziation",
          "name" : "Center for Inquiry"
        },
        "datePublished" : "<?php echo get_the_date('Y-m-d' , $post_id); ?>",
        "dateModified": "<?php echo get_the_modified_date('Y-m-d' , $post_id); ?>",
        "image" : "<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>",
        "articleSection" : "<?php echo $post_type_name->labels->name; ?>",
        "articleBody" : "<?php echo str_replace( "*", "", str_replace( "\n", " ", str_replace( "\"", "'", strip_tags( wpautop( get_page($post_id)->post_content))))); ?>",
        "url" : "<?php echo get_the_permalink($post_id); ?>"
        }
      </script>
  <?php } ?>
<!-- End JSON -->