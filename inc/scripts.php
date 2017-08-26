<?php
/**
 * Custom scripts and styles.
 *
 * @package Profesh
 */

/**
 * Register Google font.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */
function atarr_font_url() {

	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by the following, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$alegreya = _x( 'on', 'Alegreya font: on or off', 'atarr' );
	$lato = _x( 'on', 'Lato font: on or off', 'atarr' );

	if ( 'off' !== $alegreya || 'off' !== $lato ) {
		$font_families = array();

		if ( 'off' !== $alegreya ) {
			$font_families[] = 'Alegreya';
		}

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,700';
		}

		// <link href="https://fonts.googleapis.com/css?family=Alegreya|Lato:400,700" rel="stylesheet">
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function atarr_scripts() {
	/**
	 * If WP is in script debug, or we pass ?script_debug in a URL - set debug to true.
	 */
	$debug = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ) || ( isset( $_GET['script_debug'] ) ) ? true : false;

	/**
	 * If we are debugging the site, use a unique version every page load so as to ensure no cache issues.
	 */
	$version = '1.0.0';

	/**
	 * Should we load minified files?
	 */
	$suffix = ( true === $debug ) ? '' : '.min';

	// Register styles.
	wp_register_style( 'atarr-google-font', atarr_font_url(), array(), null );

	// Enqueue styles.
	wp_enqueue_style( 'atarr-google-font' );
	wp_enqueue_style( 'atarr-style', get_stylesheet_directory_uri() . '/style' . $suffix . '.css', array(), $version );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	// Enqueue scripts.
	wp_enqueue_script( 'atarr-scripts', get_template_directory_uri() . '/assets/scripts/project' . $suffix . '.js', array( 'jquery' ), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue the mobile nav script
	// Since we're showing/hiding based on CSS and wp_is_mobile is wp_is_imperfect, enqueue this everywhere.
	wp_enqueue_script( 'atarr-mobile-nav', get_template_directory_uri() . '/assets/scripts/mobile-nav-menu' . $suffix . '.js', array( 'jquery' ), $version, true );
}
add_action( 'wp_enqueue_scripts', 'atarr_scripts' );

/**
 * Add SVG definitions to footer.
 */
function atarr_include_svg_icons() {

	// Define SVG sprite file.
	$svg_icons = get_template_directory() . '/assets/images/svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'atarr_include_svg_icons', 9999 );


add_action( 'wp_footer', 'atarr_google_analytics' );
/**
 * Add Google Analytics Tracking.
 */
function atarr_google_analytics() {
	// Hook into the footer. ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-60848717-1', 'auto');
		ga('send', 'pageview');
	</script>

	<?php
}
