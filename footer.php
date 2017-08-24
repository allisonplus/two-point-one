<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Profesh
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
		<div class="wrap">

			<?php echo atarr_get_social_network_links(); // WPCS: XSS ok. ?>

			<div class="site-info">
				<?php echo atarr_get_copyright_text(); // WPCS: XSS ok. ?>
			</div>

		</div><!-- .wrap -->
	</footer><!-- .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
