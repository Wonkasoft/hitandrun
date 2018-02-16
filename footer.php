<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hitandrun
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container-fluid">
		<div class="row">
		<div class="col site-info">
			<span><?php printf( esc_html__( '%1$s %2$s, All Rights Reserved.', 'hitandrun' ), '&copy; 2018', 'Hit & Run LLC' ); ?></span>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme author. */
				printf( esc_html__( 'Website designed and created by %1$s.', 'hitandrun' ), '<a href="https://wonkasoft.com">Wonkasoft</a>' );
			?>
		</div><!-- .site-info -->
	</div><!-- .row -->
</div><!-- .container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
