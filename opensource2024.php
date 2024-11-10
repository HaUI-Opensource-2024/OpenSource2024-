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
if(!class_exists("OpenSource2024_Plugin")) {
    class OpenSource2024_Plugin {

        public function __construct() {
            add_action('admin_menu', array($this, 'admin_menu'));
        }

        function admin_menu():void {
            add_menu_page(
                "AI Content Generation",
                "Open Source",
                "manage_options",
                "home",
                array($this, "render"),
                plugin_dir_url(__FILE__)."assets/images/logo.png",
                10000
            );

            add_submenu_page(
                "home",
                "Settings",
                "Settings",
                "manage_options",
                "settings",
                "settings_page",
                1
            );
        }

        function settings_page()
        {

        }
        function render(): void {
            echo '<div class="wrap"><h1>Open Source 2024</h1><p>Welcome to the AI Content Generation page!</p></div>';
        }

//        function admin_enqueue_scripts():void {
//            wp_enqueue_style("opensource2024", plugin_dir_url(__FILE__)."assets/css/admin.css");
//        }
    }
    new OpenSource2024_Plugin();
}



