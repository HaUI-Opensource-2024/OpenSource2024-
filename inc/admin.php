<?php

require_once "data.php";
function settings_page():void {
    $activate_text = HAUI_OPENAI_KEY ? 'Active' : 'Not active <a href="https://platform.openai.com/account/api-keys">Get your free OpenAI API key</a>';
    ?>
    <div class="wrap">
        <div class="setting-page-wrap">
            <div class="settings">
                <?php settings_errors();?>

                <h2 class="nav-tab-wrapper">
                    <a href="#general" class="nav-tab nav-tab-active"><?php esc_html_e( 'General', 'HaUI' );?></a>
                </h2>
                <form method="post" action="options.php">
                    <?php settings_fields( 'HaUI_settings_group' );?>
                    <?php do_settings_sections( 'HaUI_settings_group' );?>
                    <div id="general" class="tab-panel">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="api_key">
                                        <span class="field-desc">Add your OpenAI API key to activate</span>
                                    </label>
                                </th>
                                <td>
                                    <input type="text" id="api_key" name="api_key" class="regular-text"
                                           value="<?php echo esc_attr( HAUI_get_option( 'api_key' ) ); ?>" />
                                    <div class="api_key_status">

                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16ZM11.7071 6.70711C12.0976 6.31658 12.0976 5.68342 11.7071 5.29289C11.3166 4.90237 10.6834 4.90237 10.2929 5.29289L7 8.58579L5.70711 7.29289C5.31658 6.90237 4.68342 6.90237 4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711L6.29289 10.7071C6.68342 11.0976 7.31658 11.0976 7.70711 10.7071L11.7071 6.70711Z"
                                                  fill="<?php echo esc_attr( HAUI_OPENAI_KEY ) ? '#3BCB38' : '#D1D6DB' ?>" />
                                        </svg>

                                        <span><?php printf( $activate_text )?></span>
                                    </div>
                                </td>
                            </tr>

                            <?php if ( HAUI_OPENAI_KEY ): ?>
                                <tr>
                                    <th scope="row">
                                        <label for="model"><?php esc_html_e( 'Model', 'HaUI' );?>
                                            <span class="field-desc">Add your OpenAI API key to activate WP Wand</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="model" name="model">
                                            <option value="text-davinci-003"
                                                <?php selected( HAUI_get_option( 'model', 'gpt-3.5-turbo' ), 'text-davinci-003' );?>>
                                                <?php esc_html_e( 'text-davinci-003', 'HaUI' );?></option>
                                            <option value="gpt-3.5-turbo"
                                                <?php selected( HAUI_get_option( 'model', 'gpt-3.5-turbo' ), 'gpt-3.5-turbo' );?>>
                                                <?php esc_html_e( 'gpt-3.5-turbo', 'HaUI' );?></option>
                                            <option value="text-curie-001"
                                                <?php selected( HAUI_get_option( 'model', 'gpt-3.5-turbo' ), 'text-curie-001' );?>>
                                                <?php esc_html_e( 'text-curie-001', 'HaUI' );?></option>
                                            <option value="text-babbage-001"
                                                <?php selected( HAUI_get_option( 'model', 'gpt-3.5-turbo' ), 'text-babbage-001' );?>>
                                                <?php esc_html_e( 'text-babbage-001', 'HaUI' );?></option>
                                            <option value="text-ada-001"
                                                <?php selected( HAUI_get_option( 'model', 'gpt-3.5-turbo' ), 'text-ada-001' );?>>
                                                <?php esc_html_e( 'text-ada-001', 'HaUI' );?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="language"><?php esc_html_e( 'Default Content Language', 'HaUI' );?>
                                            <span class="field-desc">Select your language</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="language" name="language">
                                            <?php
                                            if(is_array(language_array())){
                                                $default_language = HAUI_get_option('language', 'en');
                                                foreach(language_array() as $key => $value){
                                                    printf( '<option value="%s" %s >%s</option>', $key, selected( $default_language, $key ), $key );
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="temperature"><?php esc_html_e( 'Temperature', 'HaUI' );?>
                                            <span class="field-desc">Controls randomness: If you lower the number, the
                                        result will be repetitive & the output quality might gets lower.</span>
                                        </label>
                                    </th>
                                    <td>

                                        <div class="slider-input-wrap">
                                            <input type="number" id="temperature" name="temperature"
                                                   class="slider_input small-text" min="0" max="1" step="0.1"
                                                   value="<?php echo esc_attr(HAUI_get_option( 'temperature', 0.5 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="max_tokens"><?php esc_html_e( 'Max Token', 'HaUI' );?>
                                            <span class="field-desc">The maximum number of tokens to generate. One token
                                        is roughly 4 characters for normal English text.</span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="max_tokens" name="max_tokens" min="0"
                                                   max="10000" step="1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(HAUI_get_option( 'max_tokens', 1000 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="presence_penalty"><?php esc_html_e( 'Presence Penalty', 'HaUI' );?>
                                            <span class="field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="presence_penalty" name="presence_penalty"
                                                   min="0" max="2" step="0.1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(HAUI_get_option( 'presence_penalty', 0 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="frequency"><?php esc_html_e( 'Frequency', 'HaUI' );?>
                                            <span class="field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="frequency" name="frequency" min="0" max="2"
                                                   step="0.1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(HAUI_get_option( 'frequency', 0 )); ?>" />
                                        </div>
                                    </td>
                                </tr>
                            <?php endif;?>

                        </table>
                    </div>
                    <?php do_action( 'wpwand_add_tab_content' )?>
                    <?php submit_button( esc_html__( 'Update', 'HaUI' ) );?>
                </form>
            </div>

        </div>
    </div>
    <?php
}

function render()
{
    ?>
    <h1>Welcome to AI Assistant</h1>
    <?php
}

function register_menu() {
    add_menu_page( 'AI-Assistant', 'AI-Assistant', 'manage_options', 'main', 'render', HAUI_logo_url() );
    add_submenu_page( 'main', 'HAUI-ASSISTANT', 'Settings', 'manage_options', 'main', 'settings_page' );
}

add_action( 'admin_menu', 'register_menu' );
add_action( 'admin_init', 'register_settings' );

function register_settings() {
    register_setting( 'HaUI_settings_group', 'api_key', array(
        'type'              => 'string',
        'description'       => esc_html__( 'OpenAI API Key', 'HaUI' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_api_key',
    ) );

    register_setting( 'HaUI_settings_group', 'model', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Model', 'HaUI' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_model',
    ) );

    register_setting( 'HaUI_settings_group', '_language', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Language', 'HaUI' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_model',
    ) );

    register_setting( 'HaUI_settings_group', 'temperature', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Temperature', 'HaUI' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_input_field',
    ) );
    register_setting( 'HaUI_settings_group', 'frequency', array(
        'type'              => 'string',
        'description'       => esc_html__( 'Frequency', 'HaUI' ),
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_input_field',
    ) );
    register_setting( 'HaUI_settings_group', 'max_tokens', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_input_field',
    ) );
    register_setting( 'HaUI_settings_group', 'presence_penalty', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_validate_input_field',
    ) );

    do_action( 'register_settings' );

}

function _validate_api_key( $input ) {
    $error = false;

    // Check if the input is empty
    if ( empty( $input ) ) {
        add_settings_error( 'api_key', '400', esc_html__( 'Please enter an OpenAI API key.', 'HaUI' ) );
        $error = true;
    } else {
        // Check if the input matches the expected format of an OpenAI secret key
        if ( !preg_match( '/^sk-\w+$/', $input ) ) {
            add_settings_error( 'api_key', '400', esc_html__( 'Invalid OpenAI API key format.', 'HaUI' ) );
            $error = true;
        }
    }

    // If there is an error, return the old value
    if ( $error ) {
        return HAUI_get_option( 'api_key' );
    }

    return $input;
}

// Validate WP Wand AI character
function _validate_input_field( $input ) {
    // Perform any additional validation here
    return $input;
}

function _validate_model( $input ) {
    $allowed_models = array( 'davinci', 'curie', 'babbage' );

    if ( !in_array( $input, $allowed_models ) ) {
        add_settings_error( 'model', 'model_invalid', esc_html__( 'Invalid model selected.', 'HaUI' ) );
        return HAUI_get_option( 'model' );
    }

    return $input;
}