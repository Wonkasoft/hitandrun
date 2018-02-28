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
		<div class="row row-hours d-flex d-md-none">
			<div class="col text-center">
				<i class="fa fa-clock-o"></i> <span class="hr-hours">Hours</span> <span class="hrs hrs-weekdays">M-F: 3pm - 10pm</span> <span class="hrs hrs-weekends">Sat &amp; Sun: 9am - 4pm</span>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row row-number d-flex d-md-none">
			<div class="col text-center">
				<a href="tel:9093901300"><i class="fa fa-volume-control-phone"></i></a> <a href="/contact"><i class="fa fa-commenting-o"></i></a> <span class="hr-number"><a href="tel:9093901300">909-390-1300</a></span>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
		<div class="col-md-6 order-md-2 footer-socials">
			<span class="keep-posted">We'll keep you posted:</span>
			<a href="https://www.instagram.com/hitandrunbattingcages/" class="social-links" target="_blank"><i class="fa fa-instagram"></i></a>
			<a href="https://www.facebook.com/HitandRunBattingCages/" class="social-links" target="_blank"><i class="fa fa-facebook-square"></i></a>
			<a href="https://www.yelp.com/biz/hit-and-run-batting-cages-ontario" class="social-links" target="_blank"><i class="fa fa-yelp"></i></a>
		</div><!-- .site-info -->
		<div class="col-md-6 order-md-1 site-info">
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
