<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	 // Featured image??
	?>

	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' ); 
		?>

		<div class="post__date"><?php the_date(); ?></div>
		<div class="entry-meta">
			<div class="post__meta">
				<?php 
					the_category(',');

					if( has_tag() ): ?>
						| <?php the_tags(''); ?> 
				<?php endif; ?>
			</div>
			<?php // use AFC or nothing
				$company_name = get_field('company_name');
				$company_url = get_field('company_url');
				if ( !empty($company_name) ):
					if ( !empty($company_url) ): ?>
						Company: 
						<a 
							href="<?php echo $company_url; ?>" 
							class="post__company"
							title="open link in new tab" target="_blank" rel="noopener">
							<?php echo $company_name; ?>
							<img 
								width="12" height="12" class="open-icon" alt="open link in new tab"
								src="<?php echo get_template_directory_uri() . '/images/open.svg'; ?>" 
							/>
						</a>
				<?php else: ?>
					<span class="post__company">
						Company: <?php echo $company_name; ?>
					</span>
			<?php endif;
				endif; 
				$job_location = get_field('job_location');
				if ( !empty($job_location) ): ?>
					<address class="post__address">
						Location: 
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
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		// The post content with <-- more --> tags
		the_content(
			sprintf(
				wp_kses(
					'Continue reading<span class="screen-reader-text"> "%s"</span>',
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		// CTA
		$cta = get_field('call_to_action');
		$cta_url = get_field('call_to_action_url');

		if ( !empty($cta) ): ?>
			<a 
				href="<?php echo $cta_url; ?>" class="post__cta card__link"
				title="open link in new tab" target="_blank" rel="noopener"
			>
				<?php echo $cta; ?> 
				<img 
					width="12" height="12" class="open-icon" alt="open link in new tab"
					src="<?php echo get_template_directory_uri() . '/images/open.svg'; ?>" 
				/>
			</a>
		<?php endif; ?>

		<?php
			// multi-page post
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . 'Pages:',
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
