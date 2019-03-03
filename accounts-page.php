<?php 
/**
 * 	Template name: Accounts Page Full-width 
 * 	
 * @package hitandrun
 * @since  1.0.0 [<init>]
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="container-fluid site-main">
			<div class="row row-for-main">
				<div class="col-12">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/accounts', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div> <!-- .col-12 -->
			</div> <!-- .row-for-main -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
