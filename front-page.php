<?php
/**
 * The is for displaying the home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hitandrun
 * @since  1.0.0 [<init>]
 */

get_header(); ?>

	<div id="primary" class="primary-content-area">
		<main id="main" class="container-fluid site-main">
			<div class="row row-for-main">
				<div id="backdrop-image" class="col above-fold-image" style="background: url('/wp-content/uploads/2018/02/slide-1.jpg');background-size: cover;background-position: center center">
			<?php if ( is_front_page() && is_home() ) : ?>
				<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/home', 'posts' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php else : ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/front', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			endif;
			?>
		</div> <!-- .above-fold-image -->
		</div> <!-- .row-for-main -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
