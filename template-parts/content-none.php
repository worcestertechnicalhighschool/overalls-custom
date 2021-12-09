<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">Nothing Found</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					'Ready to publish your first post? <a href="%1$s">Get started here</a>.',
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
			<?php
			get_search_form();

		else :
			?>

			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
