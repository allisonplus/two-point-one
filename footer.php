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

			<?php echo atarr_get_social_network_links(); ?>

			<div class="site-info">
				<?php echo atarr_get_copyright_text(); ?>
			</div>

		</div><!-- .wrap -->
	</footer><!-- .site-footer -->
</div><!-- #page -->

<?php echo atarr_get_mobile_navigation_menu(); ?>

<script>
	/* Google Analytics! */
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-60848717-1', 'auto');
	ga('send', 'pageview');
</script>

<?php wp_footer(); ?>

</body>
</html>
