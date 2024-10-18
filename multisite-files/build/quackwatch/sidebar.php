<?php
/**
 * The left sidebar.
 * 
 * @package bootstrap-basic4
 */


if (is_active_sidebar('sidebar-left')) {
?> 
                <div id="sidebar-left" class="col-md-4">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-left'); ?> 
                </div>
<?php
}
