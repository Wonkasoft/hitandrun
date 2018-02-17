<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hitandrun
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hitandrun' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container-fluid">
			<div class="row row-w-logo">
				<div class="col-8 blk-bar">
		<div class="site-branding">
			<div class="row">
			<div class="col-6 logo-div">
			<?php the_custom_logo(); ?>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Hit &amp; Run <br />Batting Cages</a></span>
			<?php
			endif; ?>
			</div>
			<div class="col-3 score-board">
				<span class="score score-left">0</span>
				<span class="score score-sep"> - </span>
				<span class="score score-right">0</span>
			</div> <!-- .score-board -->
			<div class="col-3 bottom-first">
				<span class="inning">1</span>
			</div> <!-- .bottom-first -->
		</div> <!-- .row -->
		</div><!-- .site-branding -->

	</div> <!-- .col-8 -->
	<div class="col-4">
		<div class="row">
			<div class="col">
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
			<div class="col">
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .col-4 -->
</div> <!-- .row-w-logo -->

		<div class="row row-w-nav">
			<div class="col-10">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'hitandrun' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</div> <!-- .col-10 -->
	</div> <!-- .row-w-nav -->
	</header><!-- #masthead -->
