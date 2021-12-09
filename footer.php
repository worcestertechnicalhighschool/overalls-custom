<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<div class="footer-bg">
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>&copy; 2021 Worcester Technical High School</p>
		</div><!-- .site-info -->
		<nav class="footer-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
	</footer><!-- #colophon -->
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
