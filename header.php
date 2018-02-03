<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'navi' ); ?></a>

		<header class="site-header">

			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M5 13V8.4c0-.3.1-.5.3-.7l3-3c.4-.4 1-.4 1.4 0l3 3c.2.2.3.4.3.7V13c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1z"></path></svg> <?php bloginfo( 'name' ); ?></a></h1>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'theme' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav>

		</header>

	<div class="site-content">
