<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bookstore
 */

?>
</div><!-- .content_wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<div class="footer-side-container">
<!-- the footer sidebar: -->
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar') ) : ?>
	<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bookstore' ) ); ?>" target="_blank">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'bookstore' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bookstore' ), 'bookstore', '<a href="http://underscores.me/" target="_blank">Manthy</a>' );
				?>
		</div><!-- .site-info -->
	</div><!-- .footer-side-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
