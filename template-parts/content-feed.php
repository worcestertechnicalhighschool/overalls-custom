<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php 
		$thumb = get_template_directory_uri() . '/images/hiring.jpg';
		if(has_post_thumbnail()){
			$thumb = get_the_post_thumbnail_url();
		}
	?> 
	<div class="card__image" style="background-image:url('<?php  
			echo $thumb; ?>');">
	</div>
	<header class="card__header">
		<h2 class="card__title">
			<a 
				href="<?php the_permalink(); ?>" 
				class="card__title-link">
				<?php // use AFC or built in title
					$job_title = get_field('job_title');
					echo !empty($job_title) ? $job_title : get_the_title(); 
				?>
			</a>
		</h2>
		<?php // use AFC or nothing
			$company_name = get_field('company_name');
			$company_url = get_field('company_url');
			if ( !empty($company_name) ):
				if ( !empty($company_url) ): ?>
					<a 
						href="<?php echo $company_url; ?>" 
						class="card__company"
						title="open link in new tab" target="_blank" rel="noopener">
						<?php echo $company_name; ?>
						<img 
							width="12" height="12" class="open-icon" alt="open link in new tab"
							src="<?php echo get_template_directory_uri() . '/images/open.svg'; ?>" 
						/>
					</a>
				<?php else: ?>
					<span class="card__company">
						<?php echo $company_name; ?>
					</span>
		<?php endif;
			endif; 
			$job_location = get_field('job_location');
			if ( !empty($job_location) ): ?>
				<address class="card__address">
					<span class="location_icon">
						<img 
							height="12"
							src="<?php echo get_template_directory_uri() . '/images/location.svg'; ?>" 
							alt="location-marker"
						>
					</span>
					<?php echo $job_location; ?>
				</address>
		<?php endif; ?>

		<p class="card__meta">
			<?php the_category(','); ?> 
			<?php if( has_tag() ): ?>
				| <?php the_tags(''); ?> 
			<?php endif; ?>
		</p>
	</header><!-- .entry-header -->
	<section class="card__body">
		<div class="card__description"><?php the_excerpt(); ?></div>
	</section>
	<footer class="card__footer">
		<p class="card__date"><?php the_date(); ?></p>
		<a class="card__link" href="<?php the_permalink(); ?>">Learn More &raquo;</a>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->
