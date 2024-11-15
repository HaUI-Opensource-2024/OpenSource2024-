<?php

function hagen_admin_scripts() {

    wp_enqueue_style( 'hagen-inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap' );
    wp_enqueue_style( 'jquery-ui', HAGEN_PLUGIN_URL . 'assets/css/jquery-ui.css' );
    wp_enqueue_style( 'hagen-admin', HAGEN_PLUGIN_URL . 'assets/css/admin.css' );

    wp_enqueue_script( 'jquery-ui-slider' );
    wp_enqueue_script( 'hagen-admin', HAGEN_PLUGIN_URL . 'assets/js/admin.js', ['jquery'] );
}

add_action( 'admin_enqueue_scripts', 'hagen_admin_scripts' );
add_action( 'wp_enqueue_scripts', 'hagen_admin_scripts' );



function hagen_model_details_card() {
    if ( !HAGEN_OPENAI_KEY ) {
        return false;
    }
}

function hagen_get_option( $opt, $default ='' ) {
    if ( !empty( get_option( $opt ) ) ) {
        return get_option( $opt );
    } else {
        return $default;
    }
}
