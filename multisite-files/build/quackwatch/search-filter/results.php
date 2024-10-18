<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	<div class="clearfix"></div>
	<p class="result-amount">Found <?php echo $query->found_posts; ?> Result(s)</p>

	<!--
	<div class="pagination">
		<div class="nav-next"><?php //previous_posts_link( '< Previous' ); ?></div>&nbsp;&nbsp;
		Page <?php //echo $query->query['paged']; ?> of <?php //echo $query->max_num_pages; ?>&nbsp;&nbsp;
		<div class="nav-previous"><?php //next_posts_link( 'Next >', $query->max_num_pages ); ?></div>
		<br />
		<?php
			/* example code for using the wp_pagenavi plugin */
			//if (function_exists('wp_pagenavi'))
			{
				//echo "<br />";
				//wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	-->
	
	
	<?php
	$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	while ($query->have_posts())
	{
		$query->the_post();
		$post_id = get_the_ID();
		$post_type = get_post_type();
		$eyedee = $f->format(get_the_id());
        $eye_dee = str_replace(' ', '-', $eyedee);
		?>
		<div class="hentry">
		<?php if($post_type == 'attachment') {
			$filetype = get_post_mime_type($post_id); 
			if($filetype == 'application/pdf') { ?>
			<h5>PDF File: <a href="<?php echo wp_get_attachment_url($post_id); ?>"><em><?php the_title(); ?>.pdf</em></a></h5>
			<div class="search-excerpt-actions">
				<!--<a data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Preview</a>-->
				<a href="<?php echo wp_get_attachment_url($post_id); ?>">View or Download PDF ></a>
			</div>
			<!--<div id="<?php echo $eye_dee; ?>" class="full-content-preview collapse">
				<?php echo do_shortcode('[pdf-embedder url="'.wp_get_attachment_url($post_id).'"]'); ?>
				<a data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-chevron-up"></i> Hide Preview</a>
			</div>--><br />
			<?php } ?>
		<?php } else { ?>
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php the_excerpt(); ?>
			<div class="search-excerpt-actions">
				<!--<a data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-plus"></i> Show/Hide Full Content</a>-->
				<a href="<?php the_permalink(); ?>">Continue Reading ></a>
			</div>
			<div id="<?php echo $eye_dee; ?>" class="full-content-preview collapse">
				<?php the_content(); ?>
				<a data-toggle="collapse" href="#<?php echo $eye_dee; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $eye_dee; ?>"><i class="fas fa-chevron-up"></i> Hide Full Content</a>
			</div><br />
		<?php } ?>
		</div>
		<hr />
		<?php
	}
	?>

	
	
	<div class="pagination">
		<div class="nav-previous"><?php previous_posts_link( '< Previous' ); ?></div><div class="total">&nbsp;Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?>&nbsp;</div><div class="nav-next"><?php next_posts_link( 'Next >', $query->max_num_pages ); ?></div>
	</div>

	<?php
}
else
{
	echo '<p class="result-amount">No results found.</p>';
}
?>
