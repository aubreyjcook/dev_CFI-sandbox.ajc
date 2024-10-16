<?php
add_action( 'template_redirect', 'custom_handle_404_redirect' );

function custom_handle_404_redirect() {
    if ( is_404() ) {
        // Your custom redirect logic here
    }
}

?>