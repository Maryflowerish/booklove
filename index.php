<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bookstore
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
        <?php
			endif;
			if ( is_home() && is_front_page() ) :
				?>
        <header>

            <h1 class="home-page-title">Αγαπημένα</h1>
        </header>
        <?php
			endif;

			/* Start the Loop */
			if ( is_home() && is_front_page() ) {
				$args = array(
					'post_type' => 'books', // if you want to further filter by post_type
					'tax_query' => array(
						array(
							'taxonomy' => 'gen_category',
							'field' => 'term_id',
							'terms' => 'loved' // you need to know the term_id of your term "example 1"
						)
					)
				);
				$query = new WP_Query( $args ); 
				if ( $query->have_posts() ) : 
					?>	<div class="home-articles"><?php
					while ( $query->have_posts() ) : $query->the_post(); 
			
						get_template_part( 'template-parts/content', 'home' ); 
			
					 endwhile;
					 ?>	</div><!-- .home-articles --><?php
				endif; 
			} else {

			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			}
			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </main><!-- #main -->
</div><!-- #primary -->
<?php
if ( ! is_front_page() ) {
	get_sidebar();
}
get_footer();