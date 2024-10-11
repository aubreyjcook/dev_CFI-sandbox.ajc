
<div class="tag-cloud">
    <h3>Browse by Topic</h3>
    <?php
    $tagatt = array(
        'hide_empty' => false,
    );
    $tags = get_tags($tagatt); ?>
    <div class="post_tags">
    	<?php
    		foreach ( $tags as $tag ) { 
    		$link = get_home_url();
    		$link .= '/tags/';
    		$link .= $tag->slug;
    			?>
        	<a href="<?php echo $link; ?>/"><?php echo $tag->name; ?></a>
    <?php } ?>
    </div>
</div>
