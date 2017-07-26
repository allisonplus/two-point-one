<?php
/**
 * Template part for displaying archive posts (tags, etc.)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

?>

<article <?php post_class( 'tag-group' ); ?>>
	<div class="featured-container">
		<img class ="featured" src="<?php echo esc_attr( atarr_get_post_image_uri( 'featured-blog' ) ); ?>" alt="<?php esc_html_e( 'Featured image for', 'atarr' ); ?>">

		<div class="archive-content">
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			</header><!-- .entry-header -->
		</div><!--.archive-content-->
	</div>
</article><!-- #post-## -->
