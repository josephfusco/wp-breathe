<?php
/**
 * Plugin Name:    WP Breathe
 * Plugin URI:     http://github.com/josephfusco/wp-breathe/
 * Description:    Easily identify a production site by literally making it breathe for admins.
 * Version:        1.0
 * Author:         Joseph Fusco
 * Author URI:     http://josephfus.co/
 * License:        GPLv2 or later
 * License URI:    http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue stylesheet
 */
function wpbreathe_styles() {
    $url = get_site_url();

    if ( ( strpos($url, '.dev') !== false ) || ( ! current_user_can('activate_plugins') ) ) {
        return;
    }

    wp_enqueue_style( 'wpbreathe-style', plugins_url( '/css/style.css' , __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'wpbreathe_styles' );
add_action( 'admin_enqueue_scripts', 'wpbreathe_styles' );
