<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profesh
 */

?>

	<div class="about-info">

		<?php $bio = get_field('work_photo'); ?>

		<img class="photo-of-me" src="<?php echo $bio['sizes']['large']; ?> " alt="<?php esc_html_e( 'Photo of me, grinning like a fool', 'atarr' ); ?>">

		<header class="entry-header">
			<h2><?php esc_html_e( 'About Allison', 'atarr' ); ?></h2>
		</header><!--.entry-header -->

		<?php the_content(); ?>
	</div> <!--.about-info-->
