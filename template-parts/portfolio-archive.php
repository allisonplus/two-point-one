<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $image = get_field( 'featured_img' ); ?>
	<div class="portfolio-image" style="background: url(<?php echo esc_url( $image['sizes']['portfolio-archive'] ); ?>); background-size: cover; background-position: center center; background-repeat: no-repeat;"></div>

	<div class="entry-content">
		<header class="entry-header">
			<h3 class="item-name"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</header><!-- .entry-header -->

		<p><?php the_field( 'blurb' ); ?></p>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atarr' ),
				'after'  => '</div>',
			) );
		?>

		<a class="button archive-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Details', 'atarr' ); ?></a>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
