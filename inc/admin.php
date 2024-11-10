<?php
require_once 'helper-functions.php';
require_once 'data.php';
function settings_page()
{
    $activate_text = OPENAI_KEY ? 'Active' : 'Not active <a href="https://platform.openai.com/account/api-keys">Get your free OpenAI API key</a>';
    ?>
    <div class="wrap">

        <?php

        if (isset($_GET['welcome_screen'])) {

            welcome_screen();
            return true;
        }
        ?>

        <div class="setting-page-wrap">

            <div class="logo-full">
                <img src="<?php echo PLUGIN_URL.'assets/images/logo.png'?>">
            </div>
            <div class="settings">
                <?php settings_errors(); ?>
                <h2 class="nav-tab-wrapper">
                    <a href="#general" class="nav-tab nav-tab-active">
                        <?php esc_html_e('General'); ?>
                    </a>
                </h2>
                <a href="https://wpwand.com/pro-plugin" target="_blank" class="get-pro-button">Get Pro Version</a>
                <form method="post" action="options.php">
                    <?php settings_fields('settings_group'); ?>
                    <?php do_settings_sections('settings_group'); ?>
                    <div id="general" class="tab-panel">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <label for="wpwand_api_key">
                                        <?php esc_html_e('OpenAI API Key'); ?>
                                        <span class="field-desc">Add your OpenAI API key to activate
                                            <?php echo esc_html('Open Source 2024') ?>
                                        </span>
                                    </label>
                                </th>
                                <td class="field">
                                    <input type="text" id="wpwand_api_key" name="api_key" class="regular-text"
                                           value="<?php echo esc_attr(OS_get_option('api_key')); ?>" />
                                    <div class="api_key_status">

                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16ZM11.7071 6.70711C12.0976 6.31658 12.0976 5.68342 11.7071 5.29289C11.3166 4.90237 10.6834 4.90237 10.2929 5.29289L7 8.58579L5.70711 7.29289C5.31658 6.90237 4.68342 6.90237 4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711L6.29289 10.7071C6.68342 11.0976 7.31658 11.0976 7.70711 10.7071L11.7071 6.70711Z"
                                                  fill="<?php echo esc_attr(OPENAI_KEY) ? '#3BCB38' : '#D1D6DB' ?>" />
                                        </svg>

                                        <span>
                                            <?php printf($activate_text) ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <?php if (OPENAI_KEY): ?>
                                <tr>
                                    <th scope="row">
                                        <label for="wpwand_model">
                                            <?php esc_html_e('Model'); ?>
                                            <span class="field-desc">Add your OpenAI API key to activate
                                                <?php echo esc_html(brand_name()) ?>
                                            </span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="wpwand_model" name="model">
                                            <option value="gpt-4o" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'gpt-4o'); ?>>
                                                <?php esc_html_e('gpt-4o'); ?></option>
                                            <option value="gpt-4" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'gpt-4'); ?>>
                                                <?php esc_html_e('gpt-4'); ?></option>
                                            <option value="gpt-3.5-turbo" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'gpt-3.5-turbo'); ?>>
                                                <?php esc_html_e('gpt-3.5-turbo'); ?></option>
                                            <option value="gpt-3.5-turbo-16k" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'gpt-3.5-turbo-16k'); ?>>
                                                <?php esc_html_e('gpt-3.5-turbo-16k'); ?></option>
                                            <option value="text-davinci-003" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'text-davinci-003'); ?>>
                                                <?php esc_html_e('text-davinci-003'); ?></option>
                                            <option value="text-curie-001" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'text-curie-001'); ?>>
                                                <?php esc_html_e('text-curie-001'); ?></option>
                                            <option value="text-babbage-001" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'text-babbage-001'); ?>>
                                                <?php esc_html_e('text-babbage-001'); ?></option>
                                            <option value="text-ada-001" <?php selected(OS_get_option('model', 'gpt-3.5-turbo'), 'text-ada-001'); ?>>
                                                <?php esc_html_e('text-ada-001'); ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="wpwand_language">
                                            <?php esc_html_e('Default Content Language')?>
                                            <span class="field-desc">Select your language</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="wpwand_language" name="language">
                                            <?php
                                            if (is_array(language_array())) {
                                                $default_language = OS_get_option('language', 'en');
                                                foreach (language_array() as $key => $value) {
                                                    printf('<option value="%s" %s >%s</option>', $key, selected($default_language, $key), $key);
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="wpwand_temperature">
                                            <?php esc_html_e('Temperature'); ?>
                                            <span class="field-desc">Controls randomness: If you lower the number, the
                                                result will be repetitive & the output quality might gets lower.</span>
                                        </label>
                                    </th>
                                    <td>

                                        <div class="slider-input-wrap">
                                            <input type="number" id="wpwand_temperature" name="temperature"
                                                   class="slider_input small-text" min="0" max="1" step="0.1"
                                                   value="<?php echo esc_attr(OS_get_option('temperature', 1)); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="wpwand_max_tokens">
                                            <?php esc_html_e('Max Token'); ?>
                                            <span class="field-desc">The maximum number of tokens to generate. One token
                                                is roughly 4 characters for normal English text.</span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="wpwand_max_tokens" name="max_tokens" min="0"
                                                   max="3600" step="1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(OS_get_option('max_tokens', 3450)); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="wpwand_presence_penalty">
                                            <?php esc_html_e('Presence Penalty'); ?>
                                            <span class="field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="wpwand_presence_penalty" name="presence_penalty"
                                                   min="0" max="2" step="0.1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(wpwand_get_option('presence_penalty', 0)); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="wpwand_frequency">
                                            <?php esc_html_e('Frequency'); ?>
                                            <span class="field-desc"></span>
                                        </label>
                                    </th>
                                    <td>
                                        <div class="slider-input-wrap">
                                            <input type="number" id="wpwand_frequency" name="frequency" min="0" max="2"
                                                   step="0.1" class="slider_input small-text"
                                                   value="<?php echo esc_attr(OS_get_option('frequency', 0)); ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th scope="row">
                                        <label for="wpwand_frequency">
                                            <?php esc_html_e('Hide ChatGPT Assistant inside gutenberg'); ?>
                                            <span class="field-desc"></span>
                                        </label>
                                    </th>

                                    <td class="field">
                                        <input type="checkbox" id="wpwand_hide_ai_bar_gutenberg"
                                               name="hide_ai_bar_gutenberg" value="1" class="hide_ai_bar_gutenberg"
                                            <?php checked(wpwand_get_option('hide_ai_bar_gutenberg', 0)) ?> />

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <label for="toggler_position">
                                            <?php esc_html_e('AI Button Position'); ?>
                                            <span class="field-desc">Change WP Wand's AI button position based on your
                                                preference</span>
                                        </label>
                                    </th>
                                    <td>
                                        <select id="toggler_position" name="toggler_position">
                                            <option value="top" <?php selected(OS_get_option('toggler_position', 'top'), 'top'); ?>>
                                                <?php esc_html_e('Top'); ?></option>
                                            <option value="side" <?php selected(OS_get_option('toggler_position', 'top'), 'side'); ?>>
                                                <?php esc_html_e('Side'); ?></option>
                                        </select>
                                    </td>
                                </tr>

                                <?php do_action('general_tab_content') ?>

                            <?php endif; ?>

                        </table>
<!--                        --><?php //model_details_card() ?>

                    </div>
                    <?php do_action('add_tab_content') ?>
                    <?php submit_button(esc_html__('Update')) ?>

                </form>
            </div>

        </div>
    </div>
    <?php
}

// The rest of the code remains unchanged