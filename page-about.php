<?php
/**
 * The template for displaying the About page.
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

				<div class="about">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'about' );

					endwhile; // End of the loop.
					?>

					<?php if ( has_sub_field( 'factoids' ) ): ?>

						<div class="about-things">
							<h2><?php esc_html_e( 'Things to Know', 'atarr' ); ?></h2>
							<?php while( has_sub_field( 'factoids' ) ): ?>
							<div class="factoid">
								<?php the_sub_field( 'icon' ); ?>

								<div class="fact-content">
									<h3><?php the_sub_field( 'fact_title' ); ?></h3>
									<p><?php the_sub_field( 'fact' ); ?></p>
								</div>
							</div> <!--/.factoid-->
							<?php endwhile; ?>
						</div> <!--/.about-skills-->
					<?php endif; ?>
				</div><!--.about-->

			</main><!-- #main -->
		</div><!-- .primary -->

	</div><!-- .wrap -->

<?php get_footer(); ?>
