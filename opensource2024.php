<?php
/**
 * Plugin Name: Open Source 2024
 * Plugin URI:
 * Description: Web AI Builder creates perfect, unique, and SEO-optimized content 10x faster. Use AI Assistant directly inside your WordPress environment.
 * Version: 1.0.0
 * Author:
 * Author URI:
 * Text Domain:
 * License: GPL2
*/

// Define constants
define( 'HAUI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HAUI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if ( !defined( 'HAUI_OPENAI_KEY' ) ) {
    define( 'HAUI_OPENAI_KEY', get_option( 'haui_api_key', false ) );
}
define( 'HAUI_AI_CHARACTER', get_option( 'haui_ai_character', esc_html( 'Ignore all previous instructions. You are an expert in SEO copywriting and specialising in WordPress related content creation.' ) ) );

function haui_init() {
    // Vendor Autoload
    if ( !class_exists( 'Orhanerday\OpenAi\OpenAi' ) ) {
        require __DIR__ . '/vendor/orhanerday/open-ai/src/Url.php';
        require __DIR__ . '/vendor/orhanerday/open-ai/src/OpenAi.php';
    }
// Include required files
    require_once HAUI_PLUGIN_DIR . 'inc/admin.php';
    require_once HAUI_PLUGIN_DIR . 'inc/data.php';
    require_once HAUI_PLUGIN_DIR . 'inc/helper-functions.php';
    require_once HAUI_PLUGIN_DIR . 'inc/frontend.php';
    require_once HAUI_PLUGIN_DIR . 'inc/api.php';
    require_once HAUI_PLUGIN_DIR . 'inc/gutenberg.php';
}

add_action( 'init', 'haui_init', 10 );

/**
 * Load plugin textdomain.
 */
function haui_load_plugin_textdomain() {
    load_plugin_textdomain( 'haui', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'haui_load_plugin_textdomain' );