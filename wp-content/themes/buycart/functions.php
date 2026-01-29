<?php
/**
 * Theme functions and definitions
 *
 * @package BuyCart
 */

/**
 * After setup theme hook
 */
function buycart_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'buycart' );	
}
add_action( 'after_setup_theme', 'buycart_theme_setup' );

/**
 * Load assets.
 */

function buycart_theme_css() {
	wp_enqueue_style( 'buycart-parent-theme-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'buycart_theme_css', 99);

require get_stylesheet_directory() . '/theme-functions/controls/class-customize.php';

/**
 * Import Options From Parent Theme
 *
 */
function buycart_parent_theme_options() {
	$buycart_mods = get_option( 'theme_mods_shopire' );
	if ( ! empty( $buycart_mods ) ) {
		foreach ( $buycart_mods as $buycart_mod_k => $buycart_mod_v ) {
			set_theme_mod( $buycart_mod_k, $buycart_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'buycart_parent_theme_options' );