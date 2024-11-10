<?php
function welcome_screen(): void
{
    ?>

    <div class="welcome-screen-wrapper">
        <div class="welcome-screen">
            <div class="welcome-screen-header">
                <div class="logo"> <svg width="27" height="28" viewBox="0 0 27 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG path data unchanged -->
                    </svg></div>
                <h3>Welcome to
                    <?php echo esc_html('Open Source 2024') ?>
                </h3>
                <p>Your ultimate AI content generation assistant.</p>
                <iframe width="560" src="https://www.youtube.com/embed/CJkraHhSsZ8" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            <div class="welcome-screen-content">
                <?php echo esc_html("Open Source") ?> Pro for Lifetime with limited 50% discount.
                <div class="doc-button">
                    <a href="https://wpwand.com/docs/knowledge-base/getting-started/" target="_blank">
                        <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- SVG path data unchanged -->
                        </svg>
                        Read Our Documentation
                    </a>
                </div>
                <h4>What are you getting for free?</h4>
                <ul>
                    <!-- List items unchanged -->
                </ul>
            </div>
            <div class="welcome-screen-footer">
                <h4>Start by connecting your free OpenAI Key</h4>
                <div class="api-missing-notice-wrap">
                    <div class="api-missing-form-wrap">
                        <form action="" class="api-missing-form">
                            <div class="form-group">
                                <div class="form-field">
                                    <input type="text" id="api-key" name="api-key"
                                           placeholder="Paste API key here" value="<?php echo esc_html(OPENAI_KEY) ?>"
                                           required>
                                    <div class="error"></div>
                                    <a href="https://platform.openai.com/account/api-keys">Get your free OpenAI API key</a>
                                </div>
                            </div>
                            <div class="form-submit">
                                <button class="submit-button">
                                    <?php echo OPENAI_KEY ? 'Connected!' : 'Connect API'; ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}


function admin_scripts():void
{
    wp_enqueue_style('admin_css', PLUGIN_URL . 'assets/css/admin.css');
//    wp_enqueue_script('admin_scripts', PLUGIN_URL . 'assets/js/admin_1.js');
}
add_action('admin_enqueue_scripts', 'admin_scripts');

function brand_name(): string
{
    return 'WP Wand';
}

function OS_get_option($opt, $default = '')
{
    if (get_option($opt)) {
        return get_option($opt);
    } else {
        return $default;
    }
}

function model_details_card()
{
    if (!OPENAI_KEY) {
        return false;
    }
    ?>

    <div class="wpwand-model-card-wrapper">
        <div class="wpwand-model-card" id="wpwand-gpt-3-5">
            <div class="wpwand-model-card-header">
                <h3>gpt-3.5-turbo</h3>
                <p>Most capable GPT-3.5 model at 1/10th the cost of text-davinci-003. Will be updated with OpenAI’s latest
                    model iteration.</p>
            </div>
            <div class="wpwand-model-card-content">
                <h4>Cost Estimation</h4>
                <ul>
                    <li>$0.01 for approx. 1000 words</li>
                    <li>$0.1 for approx. 10,000 words</li>
                    <li>$1 for approx. 100,000 words</li>
                </ul>
            </div>
            <div class="wpwand-model-card-footer">
                <h4>Pricing Fact</h4>
                <p>Using this model, you can write approximately 65 blog posts, each containing ~1500 words, for just $1.
                </p>

            </div>
        </div>
        <div class="wpwand-model-card" id="wpwand-text-davinci-003">
            <div class="wpwand-model-card-header">
                <h3>text-davinci-003</h3>
                <p>Most capable GPT-3.5 model at 1/10th the cost of text-davinci-003. Will be updated with OpenAI’s latest
                    model iteration.</p>
            </div>
            <div class="wpwand-model-card-content">
                <h4>Cost Estimation</h4>
                <ul>
                    <li>$0.01 for approx. 1000 words</li>
                    <li>$0.1 for approx. 10,000 words</li>
                    <li>$1 for approx. 100,000 words</li>
                </ul>
            </div>
            <div class="wpwand-model-card-footer">
                <h4>Pricing Fact</h4>
                <p>Using this model, you can write approximately 65 blog posts, each containing ~1500 words, for just $1.
                </p>

            </div>
        </div>
        <div class="wpwand-model-card" id="wpwand-text-curie-001">
            <div class="wpwand-model-card-header">
                <h3>text-curie-001</h3>
                <p>Most capable GPT-3.5 model at 1/10th the cost of text-davinci-003. Will be updated with OpenAI’s latest
                    model iteration.</p>
            </div>
            <div class="wpwand-model-card-content">
                <h4>Cost Estimation</h4>
                <ul>
                    <li>$0.01 for approx. 1000 words</li>
                    <li>$0.1 for approx. 10,000 words</li>
                    <li>$1 for approx. 100,000 words</li>
                </ul>
            </div>
            <div class="wpwand-model-card-footer">
                <h4>Pricing Fact</h4>
                <p>Using this model, you can write approximately 65 blog posts, each containing ~1500 words, for just $1.
                </p>

            </div>
        </div>
        <div class="wpwand-model-card" id="wpwand-text-babbage-001">
            <div class="wpwand-model-card-header">
                <h3>text-babbage-001</h3>
                <p>Most capable GPT-3.5 model at 1/10th the cost of text-davinci-003. Will be updated with OpenAI’s latest
                    model iteration.</p>
            </div>
            <div class="wpwand-model-card-content">
                <h4>Cost Estimation</h4>
                <ul>
                    <li>$0.01 for approx. 1000 words</li>
                    <li>$0.1 for approx. 10,000 words</li>
                    <li>$1 for approx. 100,000 words</li>
                </ul>
            </div>
            <div class="wpwand-model-card-footer">
                <h4>Pricing Fact</h4>
                <p>Using this model, you can write approximately 65 blog posts, each containing ~1500 words, for just $1.
                </p>

            </div>
        </div>
        <div class="wpwand-model-card" id="wpwand-text-ada-001">
            <div class="wpwand-model-card-header">
                <h3>text-ada-001</h3>
                <p>Most capable GPT-3.5 model at 1/10th the cost of text-davinci-003. Will be updated with OpenAI’s latest
                    model iteration.</p>
            </div>
            <div class="wpwand-model-card-content">
                <h4>Cost Estimation</h4>
                <ul>
                    <li>$0.01 for approx. 1000 words</li>
                    <li>$0.1 for approx. 10,000 words</li>
                    <li>$1 for approx. 100,000 words</li>
                </ul>
            </div>
            <div class="wpwand-model-card-footer">
                <h4>Pricing Fact</h4>
                <p>Using this model, you can write approximately 65 blog posts, each containing ~1500 words, for just $1.
                </p>

            </div>
        </div>
    </div>
    <?php
}