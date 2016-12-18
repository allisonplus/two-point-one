<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $image = get_field( 'featured_img' ); ?>

	<img class="single-portfolio-image" src="<?php echo esc_attr( $image['sizes']['portfolio'] );  ?> " alt="">
	<div class="blog-content">
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php the_field( 'description' ); ?></p>

			<?php
			// Get gallery of images.
			$images = get_field('images');

			if( $images ): ?>
				<ul class="image-gallery">
					<?php foreach( $images as $image ): ?>
					<li>
						<a href="<?php echo $image['url']; ?>">
							<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
						</a>
						<p><?php echo $image['caption']; ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if( get_field( 'url' ) ): ?>
				<a class="button project-link" href="<?php the_field( 'url' ); ?>"><?php esc_html_e( 'Project Link', 'atarr' ); ?></a>
			<?php endif; ?>

		</div><!-- .entry-content -->
	</div><!--.blog-content-->
</article><!-- #post-## -->
