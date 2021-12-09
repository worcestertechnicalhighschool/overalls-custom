<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 *
 */

get_header();
?>

	<main id="primary" class="site-main">
		<aside id="primary-search" class="widget-area primary-search">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</aside><!-- #secondary -->

		<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . 'Previous:' . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . 'Next:' . '</span> <span class="nav-title">%title</span>',
					)
				);

			endwhile;
		
		?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
