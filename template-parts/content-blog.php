<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

?>

<article <?php post_class( 'blog-post' ); ?>>
	<div class="featured-container">
		<img class ="featured" src="<?php echo esc_attr( atarr_get_post_image_uri( 'featured-blog' ) ); ?>" alt="<?php esc_html_e( 'Featured image for', 'atarr' ); ?>">
	</div>

	<div class="blog-content">
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			// Only show meta data on single post page, not home.php.
			if ( 'post' === get_post_type() && ! ( is_home() ) ) : ?>
			<div class="entry-meta">
				<?php echo atarr_single_posted_on(); // WPCS: XSS ok. ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'atarr' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atarr' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!--.blog-content-->
</article><!-- #post-## -->
