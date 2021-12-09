<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary">Skip to content</a>
<div id="page" class="site">
	<div class="header-bg" 
		style="background-image:url('<?php  
			echo get_template_directory_uri() . '/images/denim.jpg'; ?>);"
	>
	<header id="masthead" class="site-header">
	<?php
		$overalls_custom_description = get_bloginfo( 'description', 'display' ); 
	?>
	<a class="site-link" 
		href="<?php echo esc_url( home_url( '/' ) ); ?>" 
		rel="home"
		title="<?php echo $overalls_custom_description; ?>"
	>
		<div class="site-branding">
			<span 
			
			class="logo-tag"
			style="background-image:url('<?php 
						echo get_template_directory_uri() . '/images/tag.jpg'; ?>');" 
				>
				<?php include(get_template_directory() .'inc/overalls-svg.php'); ?>
			</span>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		</div><!-- .site-branding -->
	</a>

</header><!-- #masthead -->
</div>
<nav id="site-navigation" class="main-navigation">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
