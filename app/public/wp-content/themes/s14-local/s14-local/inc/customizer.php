<?php
/**
 * s14.local Theme Customizer
 *
 * @package s14.local
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function s14_local_customize_register($wp_customize)
{
    // Footer panel:
    if (! isset($wp_customize->panels['footer_panel'])) {
        $wp_customize->add_panel('footer_panel', [
            'title'    => __('Footer Settings', 's14-local'),
            'priority' => 160,
        ]);
    }

    // 1. Footer About Section
    $wp_customize->add_section('footer_about_sec', [
        'title'    => __('Footer About', 's14-local'),
        'panel'    => 'footer_panel',
        'priority' => 10,
    ]);

    // 2. Setting: the About text
    $wp_customize->add_setting('footer_about_text', [
        'default'           => 'The Royal African Society is a membership organisation that provides opportunities for people to connect, celebrate and engage critically with a wide range of topics and ideas about Africa today. We amplify African voices and interests in academia, business, politics, the arts and education, reaching a network of more than one million people globally.',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    // 3. Control: textarea for editing
    $wp_customize->add_control('footer_about_text', [
        'label'   => __('About Text', 's14-local'),
        'section' => 'footer_about_sec',
        'type'    => 'textarea',
    ]);
    // 1a. Footer Contact Section
    $wp_customize->add_section('footer_contact_sec', [
        'title'    => __('Footer Contact', 's14-local'),
        'panel'    => 'footer_panel', 
        'priority' => 20,
    ]);

    // 1b. Setting: raw HTML for the contact block
    $wp_customize->add_setting('footer_contact_html', [
        'default'           => '<p><strong>E-mail:</strong> <a href="mailto:hello@ras.com">hello@ras.com</a></p>' .
        '<p><strong>Address:</strong> The Royal African Society is hosted by SOAS, University of London.</p>' .
        '<p>Registered Charity 1062764</p>',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    // 1c. Control: textarea to edit that HTML
    $wp_customize->add_control('footer_contact_html', [
        'label'   => __('Contact Block HTML', 's14-local'),
        'section' => 'footer_contact_sec',
        'type'    => 'textarea',
    ]);
    // Footer Social Links Section
    $wp_customize->add_section('footer_social_sec', [
        'title'    => __('Footer Social Links', 's14-local'),
        'panel'    => 'footer_panel',
        'priority' => 30,
    ]);

    // Facebook URL setting + control
    $wp_customize->add_setting('footer_facebook_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('footer_facebook_url', [
        'label'   => __('Facebook URL', 's14-local'),
        'section' => 'footer_social_sec',
        'type'    => 'url',
    ]);

    // Instagram URL
    $wp_customize->add_setting('footer_instagram_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('footer_instagram_url', [
        'label'   => __('Instagram URL', 's14-local'),
        'section' => 'footer_social_sec',
        'type'    => 'url',
    ]);

    // YouTube URL
    $wp_customize->add_setting('footer_youtube_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('footer_youtube_url', [
        'label'   => __('YouTube URL', 's14-local'),
        'section' => 'footer_social_sec',
        'type'    => 'url',
    ]);
    // Footer Copyright Section
    $wp_customize->add_section('footer_copyright_sec', [
        'title'    => __('Footer Copyright', 's14-local'),
        'panel'    => 'footer_panel',
        'priority' => 40,
    ]);

    // Copyright text setting + control
    $wp_customize->add_setting('footer_copyright_text', [
        'default'           => '© 2025 Royal African Society ltd – All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_copyright_text', [
        'label'   => __('Copyright Text', 's14-local'),
        'section' => 'footer_copyright_sec',
        'type'    => 'text',
    ]);

    // …other footer sections here …
}
add_action('customize_register', 's14_local_customize_register');

// function s14_local_customize_register( $wp_customize ) {
// 	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
// 	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
// 	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

// 	if ( isset( $wp_customize->selective_refresh ) ) {
// 		$wp_customize->selective_refresh->add_partial(
// 			'blogname',
// 			array(
// 				'selector'        => '.site-title a',
// 				'render_callback' => 's14_local_customize_partial_blogname',
// 			)
// 		);
// 		$wp_customize->selective_refresh->add_partial(
// 			'blogdescription',
// 			array(
// 				'selector'        => '.site-description',
// 				'render_callback' => 's14_local_customize_partial_blogdescription',
// 			)
// 		);
// 	}
// }
// add_action( 'customize_register', 's14_local_customize_register' );

// /**
//  * Render the site title for the selective refresh partial.
//  *
//  * @return void
//  */
// function s14_local_customize_partial_blogname() {
// 	bloginfo( 'name' );
// }

// /**
//  * Render the site tagline for the selective refresh partial.
//  *
//  * @return void
//  */
// function s14_local_customize_partial_blogdescription() {
// 	bloginfo( 'description' );
// }

// /**
//  * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
//  */
// function s14_local_customize_preview_js() {
// 	wp_enqueue_script( 's14-local-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
// }
// add_action( 'customize_preview_init', 's14_local_customize_preview_js' );
