<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 *
 */

get_header();
?>

	<main id="primary" class="site-main">
		<aside id="primary-search" class="widget-area primary-search">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</aside><!-- #secondary -->
		
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* %s: search query. */
				printf( esc_html__( 'Search Results for: &ldquo;%s&rdquo;' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->
		
		<div class="feed">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );
				get_template_part( 'template-parts/content', 'feed' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div><!-- .feed -->
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
