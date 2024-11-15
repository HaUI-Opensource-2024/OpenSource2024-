<?php

function hagen_settings_page() {
    $activate_text = HAGEN_OPENAI_KEY ? 'Active' : 'Not active <a href="https://platform.openai.com/account/api-keys">Get your free OpenAI API key</a>';

    ?>
    <div class="wrap">
        <div class="hagen-setting-page-wrap">
            <div class="hagen-settings">
                <?php settings_errors();?>

                <h2 class="nav-tab-wrapper">
                    <a href="#general" class="nav-tab nav-tab-active"><?php esc_html_e( 'General', 'hagen' );?></a>
                    <?php do_action( 'hagen_add_tab_link' )?>
                </h2>
                <form method="post" action="options.php">
                    <?php settings_fields( 'hagen_settings_group' );?>
                    <?php do_settings_sections( 'hagen_settings_group' );?>
                    <div id="general" class="tab-panel">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="hagen_api_key">
                                        <?php esc_html_e( 'OpenAI API Key', 'hagen');?>
                                        <span class="hagen-field-desc">Add your OpenAI API key to activate Hagen</span>
                                    </label>
                                </th>
                                <td class="hagen-field">
                                    <input type="text" id="hagen_api_key" name="hagen_api_key" class="regular-text"
                                           value="<?php echo esc_attr( hagen_get_option( 'hagen_api_key' ) ); ?>" />
                                    <div class="hagen_api_key_status">

                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16ZM11.7071 6.70711C12.0976 6.31658 12.0976 5.68342 11.7071 5.29289C11.3166 4.90237 10.6834 4.90237 10.2929 5.29289L7 8.58579L5.70711 7.29289C5.31658 6.90237 4.68342 6.90237 4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711L6.29289 10.7071C6.68342 11.0976 7.31658 11.0976 7.70711 10.7071L11.7071 6.70711Z"
                                                  fill="<?php echo esc_attr( HAGEN_OPENAI_KEY ) ? '#3BCB38' : '#D1D6DB' ?>" />
                                        </svg>

                                        <span><?php printf( $activate_text )?></span>
                                    </div>
                                </td>
                            </tr>

                            <?php if ( HAGEN_OPENAI_KEY ): ?>
                                <tr>
                                    <th scope="row">
                                        <label for="hagen_model"><?php esc_html_e( 'Model', 'hagen' );?>
                                            <span class="hagen-field-desc">Add your OpenAI API key to activate Hagen</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="hagen_model" name="hagen_model">
                                            <option value="text-davinci-003"
                                                <?php selected( hagen_get_option( 'hagen_model', 'gpt-3.5-turbo' ), 'text-davinci-003' );?>>
                                                <?php esc_html_e( 'text-davinci-003', 'hagen' );?></option>
                                            <option value="gpt-3.5-turbo"
                                                <?php selected( hagen_get_option( 'hagen_model', 'gpt-3.5-turbo' ), 'gpt-3.5-turbo' );?>>
                                                <?php esc_html_e( 'gpt-3.5-turbo', 'hagen' );?></option>
                                            <option value="text-curie-001"
                                                <?php selected( hagen_get_option( 'hagen_model', 'gpt-3.5-turbo' ), 'text-curie-001' );?>>
                                                <?php esc_html_e( 'text-curie-001' , 'hagen');?></option>
                                            <option value="text-babbage-001"
                                                <?php selected( hagen_get_option( 'hagen_model', 'gpt-3.5-turbo' ), 'text-babbage-001' );?>>
                                                <?php esc_html_e( 'text-babbage-001' , 'hagen');?></option>
                                            <option value="text-ada-001"
                                                <?php selected( hagen_get_option( 'hagen_model', 'gpt-3.5-turbo' ), 'text-ada-001' );?>>
                                                <?php esc_html_e( 'text-ada-001' , 'hagen');?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="hagen_language"><?php esc_html_e( 'Default Content Language' , 'hagen');?>
                                            <span class="hagen-field-desc">Select your language</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="hagen_language" name="hagen_language">
                                            <?php
                                            if(is_array(hagen_language_array())){
                                                $default_language = hagen_get_option('hagen_language', 'en');
                                                foreach(hagen_language_array() as $key => $value){
                                                    printf( '<option value="%s" %s >%s</option>', $key, selected( $default_language, $key ), $key );
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="hagen_temperature"><?php esc_html_e( 'Temperature', 'hagen' );?>
                                            <span class="hagen-field-desc">Controls randomness: If you lower the number, the
                                        result will be repetitive & the output quality might gets lower.</span>
                                        </label>
                                    </th>
                                    <td>

                                        <div class="hagen-slider-input-wrap">
                                            <input type="number" id="hagen_temperature" name="hagen_temperature"
                                                   class="hagen_slider_input small-text" min="0" max="1" step="0.1"
                                                   value="<?php echo esc_attr(hagen_get_option( 'hagen_temperature', 0.5 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="hagen_max_tokens"><?php esc_html_e( 'Max Token' , 'hagen' );?>
                                            <span class="hagen-field-desc">The maximum number of tokens to generate. One token
                                        is roughly 4 characters for normal English text.</span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="hagen-slider-input-wrap">
                                            <input type="number" id="hagen_max_tokens" name="hagen_max_tokens" min="0"
                                                   max="10000" step="1" class="hagen_slider_input small-text"
                                                   value="<?php echo esc_attr(hagen_get_option( 'hagen_max_tokens', 1000 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="hagen_presence_penalty"><?php esc_html_e( 'Presence Penalty','hagen' );?>
                                            <span class="hagen-field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="hagen-slider-input-wrap">
                                            <input type="number" id="hagen_presence_penalty" name="hagen_presence_penalty"
                                                   min="0" max="2" step="0.1" class="hagen_slider_input small-text"
                                                   value="<?php echo esc_attr(hagen_get_option( 'hagen_presence_penalty', 0 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="hagen_frequency"><?php esc_html_e( 'Frequency', 'hagen' );?>
                                            <span class="hagen-field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="hagen-slider-input-wrap">
                                            <input type="number" id="hagen_frequency" name="hagen_frequency" min="0" max="2"
                                                   step="0.1" class="hagen_slider_input small-text"
                                                   value="<?php echo esc_attr(hagen_get_option( 'hagen_frequency', 0 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                            <?php endif;?>

                        </table>
                        <?php hagen_model_details_card()?>

                    </div>
                    <?php do_action( 'hagen_add_tab_content' )?>
                    <?php submit_button( esc_html__( 'Update', 'hagen' ) );?>

                </form>



            </div>

        </div>
    </div>
    <?php
}

function hagen_register_menu() {
    add_menu_page( 'Hagen', 'Hagen', 'manage_options', 'hagen', '', HAGEN_PLUGIN_URL.'assets/images/logo.png' );
    add_submenu_page( 'hagen', 'Hagen', 'Settings', 'manage_options', 'hagen', 'hagen_settings_page' );

}
add_action( 'admin_menu', 'hagen_register_menu' );
function hagen_enqueue_admin_styles($hook) {
    wp_enqueue_style('hagen-admin-styles', HAGEN_PLUGIN_URL . 'assets/css/admin.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'hagen_enqueue_admin_styles');
add_action( 'admin_init', 'hagen_register_settings' );


// Register Hagen settings
function hagen_register_settings() {
    register_setting( 'hagen_settings_group', 'hagen_api_key', array(
        'type'              => 'string',
        'description'       => esc_html__( 'OpenAI API Key', 'hagen' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_api_key',
    ) );

    register_setting( 'hagen_settings_group', 'hagen_model', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Model', 'hagen' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_model',
    ) );

    register_setting( 'hagen_settings_group', 'hagen_language', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Language', 'hagen' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_model',
    ) );

    register_setting( 'hagen_settings_group', 'hagen_temperature', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Temperature', 'hagen' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_input_field',
    ) );
    register_setting( 'hagen_settings_group', 'hagen_frequency', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Frequency', 'hagen' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_input_field',
    ) );
    register_setting( 'hagen_settings_group', 'hagen_max_tokens', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_input_field',
    ) );
    register_setting( 'hagen_settings_group', 'hagen_presence_penalty', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'hagen_validate_input_field',
    ) );

    do_action( 'hagen_register_settings' );

}

// Validate Hagen API key
function hagen_validate_api_key( $input ) {
    $error = false;

    // Check if the input is empty
    if ( empty( $input ) ) {
        add_settings_error( 'hagen_api_key', 'hagen_api_key_empty', esc_html__( 'Please enter an OpenAI API key.', 'hagen' ) );
        $error = true;
    } else {
        // Check if the input matches the expected format of an OpenAI secret key
        if ( !preg_match( '/^sk-\w+$/', $input ) ) {
            add_settings_error( 'hagen_api_key', 'hagen_api_key_invalid', esc_html__( 'Invalid OpenAI API key format.', 'hagen' ) );
            $error = true;
        }
    }

    // If there is an error, return the old value
    if ( $error ) {
        return hagen_get_option( 'hagen_api_key' );
    }

    return $input;
}

// Validate Hagen AI character
function hagen_validate_input_field( $input ) {
    // Perform any additional validation here
    return $input;
}

function hagen_validate_model( $input ) {
    $allowed_models = array( 'davinci', 'curie', 'babbage' );

    if ( !in_array( $input, $allowed_models ) ) {
        add_settings_error( 'hagen_model', 'hagen_model_invalid', esc_html__( 'Invalid model selected.', 'hagen' ) );
        return hagen_get_option( 'hagen_model' );
    }

    return $input;
}