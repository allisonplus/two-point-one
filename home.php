<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

get_header(); ?>

	<div class="wrap">
		<div class="primary content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'blog' );

				endwhile; // End of the loop.

				the_posts_navigation();

				?>

			</main><!-- #main -->
		</div><!-- .primary -->
	</div><!-- .wrap -->

<?php get_footer(); ?>
