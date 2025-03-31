<?php

/**
 * Change the subscription thank you message after purchase
 *
 * @param  int $order_id
 * @return string
 */

/* Add Custom Post Types to Archives */
function post_types_archives($query) {
	
	// Add post types to author archives
	if ( $query->is_taxonomy('authors') )
		$query->set( 'post_type', array('post', 'blog') );

	if ( $query->is_category() )
		$query->set( 'post_type', array('post', 'blog', 'videos') );
	
	// Remove the action after it's run
	remove_action( 'pre_get_posts', 'post_types_archives' );
}
add_action( 'pre_get_posts', 'post_types_archives' );


function custom_membership_thank_you( $order_id ){

    if( wcs_order_contains_subscription( $order_id ) ) {
        $thank_you_message = sprintf( __( '' ));

        return $thank_you_message;
    }

}
add_filter( 'woocommerce_memberships_thank_you_message', 'custom_membership_thank_you');

function custom_subscription_thank_you( $order_id ){

    if( wcs_order_contains_subscription( $order_id ) ) {
        $thank_you_message = sprintf( __( '' ));

        return $thank_you_message;
    }

}
add_filter( 'woocommerce_subscriptions_thank_you_message', 'custom_subscription_thank_you');


add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
	if( wcs_order_contains_subscription( $order ) ) {
		$current_user = wp_get_current_user();
		$new_str = sprintf( __( 'Thank you for your subscription! Your account is active and you may begin reading articles online right now.<br /><br />
		<a href="'.esc_url(home_url('')).'/archive/"><button class="btn primary-button">View Archive</button></a>&nbsp;&nbsp;<a href="'.esc_url(home_url('')).'/latest/"><button class="btn primary-button">View Latest Issue</button></a>&nbsp;&nbsp;<a href="'.esc_url(home_url('/?s')).'"><button class="btn primary-button">Search</button></a><br /><br />
		More details about your order have been emailed to you.<br /><br />' ));
		return $new_str;
	}
}



function subscribe_excerpt() {
    global $post;

	$output = wpautop(get_the_content());
	$wanted_number_of_paragraph = 3;
	$tmp = explode ('</p>', $output);
	for ($i = 0; $i < $wanted_number_of_paragraph; ++$i) {
	   if (isset($tmp[$i]) && $tmp[$i] != '') {
	       $tmp_to_add[$i] = $tmp[$i];
	   }
	}
	$output = implode('</p>', $tmp_to_add) . '</p>';
    echo $output;
}

function get_magazine_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '', $exclude = array() ) {
    $terms = get_the_terms( $id, $taxonomy );

    if ( is_wp_error( $terms ) )
        return $terms;

    if ( empty( $terms ) )
        return false;

    foreach ( $terms as $term ) {

        if(!in_array($term->slug,$exclude)) {
            $link = get_term_link( $term, $taxonomy );
            if ( is_wp_error( $link ) )
                return $link;
            $term_links[] = '<a href="' . $link . '" rel="tag">' . $term->name . '</a>';
        }
    }

    if( !isset( $term_links ) )
        return false;

    return $before . join( $sep, $term_links ) . $after;
}

// Category style Tags metabox
	function rudr_post_tags_meta_box_remove() {
		$id = 'tagsdiv-post_tag'; // you can find it in a page source code (Ctrl+U)
		$post_type = 'post'; // remove only from post edit screen
		$position = 'side';
		remove_meta_box( $id, $post_type, $position );
	}
	add_action( 'admin_menu', 'rudr_post_tags_meta_box_remove');

	function rudr_add_new_tags_metabox(){
		$id = 'rudrtagsdiv-post_tag'; // it should be unique
		$heading = 'Tags'; // meta box heading
		$callback = 'rudr_metabox_content'; // the name of the callback function
		$post_type = 'post';
		$position = 'side';
		$pri = 'default'; // priority, 'default' is good for us
		add_meta_box( $id, $heading, $callback, $post_type, $position, $pri );
	}
	add_action( 'admin_menu', 'rudr_add_new_tags_metabox');
 
	function rudr_metabox_content($post) {  
		// get all blog post tags as an array of objects
		$all_tags = get_terms( array('taxonomy' => 'post_tag', 'hide_empty' => 0) ); 
		// get all tags assigned to a post
		$all_tags_of_post = get_the_terms( $post->ID, 'post_tag' );  
	 
		// create an array of post tags ids
		$ids = array();
		if ( $all_tags_of_post ) {
			foreach ($all_tags_of_post as $tag ) {
				$ids[] = $tag->term_id;
			}
		}
	 
		// HTML
		echo '<div id="taxonomy-post_tag" class="categorydiv">';
		echo '<div id="tag-all" class="tabs-panel" style="display:block">';
		echo '<input type="hidden" name="tax_input[post_tag][]" value="0" />';
		echo '<ul>';
		foreach( $all_tags as $tag ){
			// unchecked by default
			$checked = "";
			// if an ID of a tag in the loop is in the array of assigned post tags - then check the checkbox
			if ( in_array( $tag->term_id, $ids ) ) {
				$checked = " checked='checked'";
			}
			$id = 'post_tag-' . $tag->term_id;
			echo "<li id='{$id}'>";
			echo "<label><input type='checkbox' name='tax_input[post_tag][]' id='in-$id'". $checked ." value='$tag->slug' /> $tag->name</label><br />";
			echo "</li>";
		}
		echo '</ul></div></div>'; // end HTML
	}

/* Set order for Archive posts
	function TOC_order_archive($query) {
		if($query->is_tax('volume-info') && $query->is_main_query()) {
			if($query->)
				$query->set('orderby','ID');
				$query->set('order', 'ASC');
		}
	}
	add_action('pre_get_posts', 'TOC_order_archive');*/


/* Gift Subscription Customizations
//if ( is_checkout()) { //display on checkout page if the cart has specified recipient
	add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );

	// Change words Ship to a different address
	add_filter('gettext', 'translate_reply');
	add_filter('ngettext', 'translate_reply');

	function translate_reply($translated) {
	$translated = str_ireplace('Ship to a different address?', 'Gift Recipient Information', $translated);
	return $translated;
	}

//}
*/

/* Reposition Checkout Addons to under Order Notes
function sv_wc_checkout_addons_change_position() {
	return 'woocommerce_after_order_notes';
}
add_filter( 'wc_checkout_add_ons_position', 'sv_wc_checkout_addons_change_position' );
*/

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


// Remove Company and Billing Phone
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_phone']);

     return $fields;
}

// Add Custom Post Types to all Archive Pages
add_filter('pre_get_posts', 'cats_all_post_types');
function cats_all_post_types($query) {
  if(is_category() && $query->is_main_query()) {
    $query->set('post_type', array('post', 'blog', 'newsletter'));
    }
    return $query;
}

// Add Custom Post Types to all Archive Pages
add_filter('pre_get_posts', 'tags_all_post_types');
function tags_all_post_types($query) {
  if(is_tag() && $query->is_main_query()) {
    $query->set('post_type', array('post', 'blog', 'newsletter'));
    }
    return $query;
}

add_filter( 'get_the_archive_title', function ($title) {
	if ( is_tag() ) {
		$title = single_tag_title( '', false );
	} 
	
	return $title;
});

// Search within PDF posts
add_filter( 'relevanssi_content_to_index', 'rlv_pdfjs_content', 10, 2 );
function rlv_pdfjs_content( $content, $post ) {
    $m = preg_match_all( '/\[wonderplugin_pdf src="(.*?)"/', $post->post_content, $matches );
    if ( $m ) {
        global $wpdb;
        $upload_dir = wp_upload_dir();
        foreach ( $matches[1] as $pdf ) {
            $pdf_url     = ltrim( str_replace( $upload_dir['baseurl'], '', urldecode( $pdf ) ), '/' );
            $pdf_content = $wpdb->get_var( $wpdb->prepare( "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '_relevanssi_pdf_content' AND post_id IN ( SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = %s )", $pdf_url ) );
            $content    .= $pdf_content;
        }
    }
    return $content;
}

// New Subscribe and Renew pages, pick one or the other
add_filter( 'woocommerce_add_to_cart_validation', 'wc_limit_one_per_order', 10, 2 );
function wc_limit_one_per_order( $passed_validation, $product_id ) {
	if ( !in_array($product_id, array(229124, 229026, 229019)) ) {
		return $passed_validation;
	}

	if ( WC()->cart->get_cart_contents_count() >= 1 ) {
		WC()->cart->empty_cart();
		//wc_add_notice( __( 'Subscription Choice Switched.', 'woocommerce' ), 'success' );
		return $passed_validation;
	}

	return $passed_validation;
}

// New Subscribe and Renew pages, pick one or the other
add_filter( 'woocommerce_add_to_cart_validation', 'wc_limit_one_per_order_fi', 10, 2 );
function wc_limit_one_per_order_fi( $passed_validation, $product_id ) {
	if ( !in_array($product_id, array(150647, 150641, 150644)) ) {
		return $passed_validation;
	}

	if ( WC()->cart->get_cart_contents_count() >= 1 ) {
		WC()->cart->empty_cart();
		//wc_add_notice( __( 'Subscription Choice Switched.', 'woocommerce' ), 'success' );
		return $passed_validation;
	}

	return $passed_validation;
}

function eg_add_opc_template( $templates ) {

    $templates['stacked-buttons'] = array(
        'label'       => __( 'Stacked Buttons', 'eg' ),
        'description' => __( "Choose between A or B with the product short description on display.", 'eg' ),
	);

	  // Add the "Magazines" template
	  $templates['magazines'] = array(
        'label'       => __( 'Magazines', 'eg' ),
        'description' => __( 'OPC template for CFI Magazine checkout with product selection fields in a table.', 'eg' ),
    );


    return $templates;
}
add_filter( 'wcopc_templates', 'eg_add_opc_template' );

$templates['magazines']= array(
		'label'       => __( 'Magazines', 'eg' ),
		'description' => __( "OPC template for CFI Magazine checkout with product selection fields in a table.", 'eg' ),
	);





// Longer Subscribe terms
add_filter( 'woocommerce_before_checkout_form' , 'more_subscribe_options' );
function more_subscribe_options() {
	$post = get_post();
	$mag_slug = get_field('magazine_slug', 'options');
	if($post->post_name == 'renew' || $post->post_name == 'subscribe') {
		echo '<div class="center"><h3>Want to make a longer-term subscription for more than one year? <a href="'.home_url('/store/').'">Click here to find a subscription length that works for you.</a><br />
Interested in giving a gift? Click here to <a href="'.home_url("/product/".$mag_slug."-gift-subscription/").'">give a gift subscription</a><br />Perfer to subscribe over the phone? Call (800) 634-1610 </h3></div>';
	}
}

//add_action( 'init', 'woocommerce_auto_login' );
/*function woocommerce_auto_login() {
	if ( isset( $_GET['login'] ) ) {
		$user_id = $_GET['login'];
		$user = get_user_by('ID', $user_id);
		$disallowed_roles = array('administrator');
		if(!array_intersect($disallowed_roles, $user->roles)) {
			$username = $user->user_login;
			wp_set_current_user($user_id, $username);
			wp_set_auth_cookie($user_id);
		}
	}
}*/

/** Email Validation
 * Can validate field by comparing value with other field.
 */
class WPDesk_FCF_Validation_Confirm_Field {
	/**
	 * Field to compare with validated field.
	 *
	 * @var string
	 */
	private $field_to_compare;
	/**
	 * WPDesk_FCF_Validation_Confirm_Field constructor.
	 *
	 * @param string $field_to_compare .
	 */
	public function __construct( $field_to_compare ) {
		$this->field_to_compare = $field_to_compare;
	}
	public function hooks() {
		add_filter( 'flexible_checkout_fields_custom_validation', array( $this, 'register_custom_validation' ) );
	}
	/**
	 * Register custom validation.
	 *
	 * @param array $custom_validation .
	 *
	 * @return array
	 */
	public function register_custom_validation( $custom_validation ) {
		$custom_validation[ 'field_confirmation_' . $this->field_to_compare ] = array(
			'label'    => sprintf( __( 'Compare with %1$s', 'wpdesk' ), $this->field_to_compare ),
			'callback' => array( $this, 'validate' )
		);
		return $custom_validation;
	}
	/**
	 * Validate.
	 *
	 * @param string $field_label Field label.
	 * @param string $value Field value.
	 */
	public function validate( $field_label, $value ) {
		$field_to_compare_value = sanitize_text_field( $_POST[ $this->field_to_compare ] );
		$valid = $field_to_compare_value === $value;
		if ( ! $valid ) {
			wc_add_notice( sprintf( __( 'Your email addresses do not match. Please try again.', 'wpdesk' ), '<strong>' . $field_label . '</strong>' ), 'error' );
		}
	}
}
$fcf_validation_confirm_field = new WPDesk_FCF_Validation_Confirm_Field( 'billing_email' );
$fcf_validation_confirm_field->hooks();

/**
 * Add `unfiltered_html` capability to editors (or other user roles).
 * On WordPress multisite, `unfiltered_html` is blocked for everyone but super admins. This gives that cap back to editors 
 * and above.
 *
 * @author Justin Tadlock
 * @link   http://themehybrid.com/board/topics/add-unfiltered_html-capability-to-editor-role#post-4629
 * @param  array  $caps    An array of capabilities.
 * @param  string $cap     The capability being requested.
 * @param  int    $user_id The current user's ID.
 */
function my_map_meta_cap( $caps, $cap, $user_id ) {

	if ( 'unfiltered_html' === $cap && user_can( $user_id, 'administrator' || 'editor' ) )
		$caps = array( 'unfiltered_html' );

	return $caps;
}

add_filter( 'map_meta_cap', 'my_map_meta_cap', 1, 3 );
