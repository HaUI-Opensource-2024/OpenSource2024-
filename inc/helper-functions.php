<?php

function HAUI_get_option( $opt, $default ='' ) {
    if ( !empty( get_option( $opt ) ) ) {
        return get_option( $opt );
    } else {
        return $default;
    }
}

function HAUI_admin_scripts() {

    wp_enqueue_style( 'wpwand-inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap' );
    wp_enqueue_style( 'admin', PLUGIN_URL . 'assets/css/admin.css' );
}

add_action( 'admin_enqueue_scripts', 'HAUI_admin_scripts' );

function HAUI_logo_url():string
{
//    return "https://cdn-icons-png.flaticon.com/512/10946/10946631.png";
    return PLUGIN_URL.'assets/images/logo.png';
}