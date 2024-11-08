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

if(!class_exists("OpenSource2024_Plugin")) {
    class OpenSource2024_Plugin {
        public function __construct() {
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action("admin_enqueue_scripts", array($this, 'admin_enqueue_scripts'));
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
        }
        function admin_enqueue_scripts():void {
            wp_enqueue_style("opensource2024", plugin_dir_url(__FILE__)."assets/css/admin.css");
        }
    }
    new OpenSource2024_Plugin();
}



