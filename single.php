<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bookstore
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		
			the_post_navigation(
				array(
					'prev_text'                  => __( '<< %title' ),
					'next_text'                  => __( '%title >>' ),
					'in_same_term'               => false,
					'taxonomy'                   => __( 'post_tag' ),
					'screen_reader_text' => __( 'Continue Reading' ),
				) 
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile; // End of the loop.
		
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
