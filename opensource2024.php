<?php
/**
 * Plugin Name: Open Source 2024
 * Plugin URI:
 * Description: Web AI Builder creates perfect, unique, and SEO-optimized content 10x faster. Use AI Assistant directly inside your WordPress environment.
 * Version: 1.0.0
 * Author:
 * Author URI:
 * Text Domain: HaUI
 * License: GPL2
*/

if (is_admin()) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    $plugin_data = get_plugin_data(__FILE__);
    define('VERSION', $plugin_data['Version']);
} else {
    define('VERSION', '1.0.0'); // Định nghĩa một giá trị mặc định cho ngoài khu vực admin nếu cần
}
define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('OPENAI_KEY', get_option('api_key', false));
require_once(PLUGIN_DIR . 'inc/admin.php');
require_once(PLUGIN_DIR . 'inc/helper-functions.php');

if ( !defined( 'HAUI_OPENAI_KEY' ) ) {
    define('HAUI_OPENAI_KEY', get_option('api_key', false));
}



