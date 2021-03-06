<?php
/**
 * Profesh Theme Customizer.
 *
 * @package Profesh
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function atarr_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add our social link options.
    $wp_customize->add_section(
        'atarr_social_links_section',
        array(
            'title'       => esc_html__( 'Social Links', 'atarr' ),
            'description' => esc_html__( 'These are the settings for social links. Please limit the number of social links to 5.', 'atarr' ),
            'priority'    => 90,
        )
    );

    // Create an array of our social links for ease of setup.
    $social_networks = array( 'github', 'codepen', 'linkedin', 'twitter' );

    // Loop through our networks to setup our fields.
    foreach( $social_networks as $network ) {

	    $wp_customize->add_setting(
	        'atarr_' . $network . '_link',
	        array(
	            'default' => '',
	            'sanitize_callback' => 'atarr_sanitize_customizer_url'
	        )
	    );
	    $wp_customize->add_control(
	        'atarr_' . $network . '_link',
	        array(
	            'label'   => sprintf( esc_html__( '%s Link', 'atarr' ), ucwords( $network ) ),
	            'section' => 'atarr_social_links_section',
	            'type'    => 'text',
	        )
	    );
    }

    // Add our Footer Customization section section.
    $wp_customize->add_section(
        'atarr_footer_section',
        array(
            'title'    => esc_html__( 'Footer Customization', 'atarr' ),
            'priority' => 90,
        )
    );

    // Add our copyright text field.
    $wp_customize->add_setting(
        'atarr_copyright_text',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_control(
        'atarr_copyright_text',
        array(
            'label'       => esc_html__( 'Copyright Text', 'atarr' ),
            'description' => esc_html__( 'The copyright text will be displayed beneath the menu in the footer.', 'atarr' ),
            'section'     => 'atarr_footer_section',
            'type'        => 'text',
            'sanitize'    => 'html'
        )
    );
}
add_action( 'customize_register', 'atarr_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function atarr_customize_preview_js() {
    wp_enqueue_script( 'atarr_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'atarr_customize_preview_js' );

/**
 * Sanitize our customizer text inputs.
 */
function atarr_sanitize_customizer_text( $input ) {
    return sanitize_text_field( force_balance_tags( $input ) );
}

/**
 * Sanitize our customizer URL inputs.
 */
function atarr_sanitize_customizer_url( $input ) {
    return esc_url( $input );
}
