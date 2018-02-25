<?php 
/**
 * 	Template name: Landing Page Full-width 
 * 	
 * @package hitandrun
 * @since  1.0.0 [<init>]
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="container-fluid site-main">
			<div class="row row-for-main">
				<div class="col above-fold-image" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover;">

				</div> <!-- .above-fold-image -->
			</div> <!-- .row-for-main -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
