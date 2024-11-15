<?php
/**
 * Plugin Name: Hagen
 * Plugin URI: https://hagen.com/
 * Description: Hagen is the generative AI platform for business that helps your team create content tailored for your brand 10X faster
 * Version: 1.0.0
 * Author: WP Grids
 * Author URI: https://profiles.wordpress.org/wpgrids/
 * Text Domain: hagen
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Define constants
define( 'HAGEN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HAGEN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if ( !defined( 'HAGEN_OPENAI_KEY' ) ) {
    define( 'HAGEN_OPENAI_KEY', get_option( 'hagen_api_key', false ) );
}
define( 'HAGEN_AI_CHARACTER', get_option( 'hagen_ai_character', esc_html( 'Ignore all previous instructions. You are an expert in SEO copywriting and specialising in WordPress related content creation.' ) ) );

function hagen_init() {
    // Vendor Autoload
    if ( !class_exists( 'Orhanerday\OpenAi\OpenAi' ) ) {
        require __DIR__ . '/vendor/orhanerday/open-ai/src/Url.php';
        require __DIR__ . '/vendor/orhanerday/open-ai/src/OpenAi.php';
    }
// Include required files
    require_once HAGEN_PLUGIN_DIR . 'inc/admin.php';
    require_once HAGEN_PLUGIN_DIR . 'inc/data.php';
    require_once HAGEN_PLUGIN_DIR . 'inc/helper-functions.php';
    require_once HAGEN_PLUGIN_DIR . 'inc/frontend.php';
    require_once HAGEN_PLUGIN_DIR . 'inc/api.php';
    require_once HAGEN_PLUGIN_DIR . 'inc/gutenberg.php';
}

add_action( 'init', 'hagen_init', 10 );

/**
 * Load plugin textdomain.
 */
function hagen_load_plugin_textdomain() {
    load_plugin_textdomain( 'hagen', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'hagen_load_plugin_textdomain' );
