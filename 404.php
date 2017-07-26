<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Profesh
 */

get_header(); ?>

	<div class="wrap">
		<div class="primary content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Sorry, this page doesn\'t exist.', 'atarr' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">

						<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Maybe something below will help you find your way?', 'atarr' ); ?></p>

						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- .primary -->

	</div><!-- .wrap -->

<?php get_footer(); ?>
