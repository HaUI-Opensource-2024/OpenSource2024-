<?php

if ( !defined( 'ABSPATH' ) ) {
    exit( 'You are not allowed' );
}

function hagen_frontend_callback() {
    ob_start();?>


    <button class="hagen-trigger hagen-open">
        <img class="logo" src="<?php echo HAGEN_PLUGIN_URL . 'assets/images/logo.png'; ?>" alt="logo hagen">
    </button>

    <div class="hagen-floating">
        <div class="hagen-floating-wraper">
            <div class="hagen-floating-header">
                <h4> 
                    <img class="logo" src="<?php echo HAGEN_PLUGIN_URL . 'assets/images/logo.png'; ?>" alt="logo hagen">
                    Hagen - Your Personal Content Creator</h4>
            </div>


            <?php if ( !HAGEN_OPENAI_KEY ): ?>
                <!-- Hagen api missing notice  -->

                <div class="hagen-api-missing-notice-wrap">
                    <div class="hagen-api-missing-notice">
                <span><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M8.21895 5.78105C7.17755 4.73965 5.48911 4.73965 4.44772 5.78105L1.78105 8.44772C0.73965 9.48911 0.73965 11.1776 1.78105 12.219C2.82245 13.2603 4.51089 13.2603 5.55228 12.219L6.28666 11.4846M5.78105 8.21895C6.82245 9.26035 8.51089 9.26035 9.55228 8.21895L12.219 5.55228C13.2603 4.51089 13.2603 2.82245 12.219 1.78105C11.1776 0.73965 9.48911 0.73965 8.44772 1.78105L7.71464 2.51412"
                                stroke="#EE2626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    Your API is not connected. Connect now to generate awesome contents.</span>
                    </div>

                    <div class="hagen-api-missing-form-wrap">
                        <form action="" class="hagen-api-missing-form">
                            <div class="hagen-form-group">
                                <div class="hagen-form-field">
                                    <label for="hagen-api-key">OpenAI API Key</label>
                                    <input type="text" id="hagen-api-key" name="hagen-api-key"
                                           placeholder="Paste API key here" required>
                                    <a href="https://platform.openai.com/account/api-keys">Get your free OpenAI API key</a>
                                </div>
                            </div>

                            <div class="hagen-form-submit">
                                <button class="hagen-submit-button">Connect API</button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php else: ?>



                <div class="hagen-prompts-tabs">
                    <button class="hagen-tab-item " data-prompt-id="templates">All Templates</button>
                    <!-- <button class="hagen-tab-item" data-prompt-id="prompt-poem">Saved</button> -->
                </div>

                <div class="hagen-prompt-from-wrap">
                    <button class="hagen-trigger hagen-close-button"><svg width="12" height="12" viewBox="0 0 12 12"
                                                                          fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 10.5L10.5 1.5M1.5 1.5L10.5 10.5" stroke="white" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round" /></svg></button>



                    <div class="hagen-prompt-item" id="templates">
                        <div class="hagen-total-templates-count"><span>Total
                        <?php echo esc_html( count( hagen_templates() ) ) ?> templates</span></div>
                        <div class="hagen-template-list">
                            <?php if ( is_array( hagen_templates() ) ):
                                foreach ( hagen_templates() as $template ):
                                    $fields = explode( ', ', $template['fields'] );
                                    ?>
                                    <div class="hagen-tiemplate-item">
                                        <h4>
                                            <?php echo esc_html($template['title']) ?>
                                            <?php if ( true == $template['is_pro'] ): ?>
                                                <span class="hagen-pro-tag">PRO</span>
                                            <?php endif;?>
                                        </h4>
                                        <p><?php echo esc_html($template['description']) ?></p>

                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 0.75L14.75 6M14.75 6L9.5 11.25M14.75 6L1.25 6" stroke="#7C838A"
                                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>

                                    <div class="hagen-prompt-form-wrap">
                        <span class="hagen-back-button"><svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M4.83333 9.08332L0.75 4.99999M0.75 4.99999L4.83333 0.916656M0.75 4.99999L11.25 4.99999"
                                        stroke="#7C838A" stroke-linecap="round" stroke-linejoin="round" /></svg> Back to
                            all templates</span>

                                        <div class="hagen-template-details">
                                            <h4><?php echo esc_html($template['title']) ?></h4>
                                            <p><?php echo esc_html($template['description']) ?></p>
                                        </div>
                                        <form action="" class="hagen-prompt-form">
                                            <input type="hidden" id="hagen-prompt" name="hagen-prompt"
                                                   value="<?PHP echo esc_html($template['prompt']) ?>">

                                            <?php if ( in_array( 'Topic', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-topic">Topic</label>
                                                        <input type="text" id="hagen-topic" name="hagen-topic"
                                                               placeholder="Write in detail about your topic">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Product Name -->
                                            <?php if ( in_array( 'Name', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-product-name">Name</label>
                                                        <input type="text" id="hagen-product-name" name="hagen-product-name"
                                                               placeholder="Write your product name">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Product Name -->
                                            <?php if ( in_array( 'Comment', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-comment">Comment</label>
                                                        <input type="text" id="hagen-comment" name="hagen-comment"
                                                               placeholder="Write your comment">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Question -->
                                            <?php if ( in_array( 'Question', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-question">Question</label>
                                                        <input type="text" id="hagen-question" name="hagen-question"
                                                               placeholder="Write your Question">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Subject -->
                                            <?php if ( in_array( 'Subject', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-subject">Subject</label>
                                                        <input type="text" id="hagen-subject" name="hagen-subject"
                                                               placeholder="Write your Subject">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Product Name -->
                                            <?php if ( in_array( 'Comment', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-comment">Comment</label>
                                                        <input type="text" id="hagen-comment" name="hagen-comment"
                                                               placeholder="Write your comment">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- Product 1 -->
                                            <?php if ( in_array( 'Product 1', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-product-1">Product 1</label>
                                                        <input type="text" id="hagen-product-1" name="hagen-product-1"
                                                               placeholder="Product 1">
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <!-- Product 2 -->
                                            <?php if ( in_array( 'Product 2', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-product-2">Product 2</label>
                                                        <input type="text" id="hagen-product-2" name="hagen-product-2"
                                                               placeholder="Product 2">
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <!-- description -->
                                            <?php if ( in_array( 'Description', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-description">Description</label>
                                                        <input type="text" id="hagen-description" name="hagen-description"
                                                               placeholder="Write a meaningful description to generate better result.">
                                                    </div>
                                                </div>
                                            <?php endif;?>

                                            <!-- description 1 -->
                                            <?php if ( in_array( 'Product 1 Description', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-description-1">Product 1 Description</label>
                                                        <input type="text" id="hagen-description-1" name="hagen-description-1"
                                                               placeholder="Write a meaningful description to generate better result.">
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <!-- description 2 -->
                                            <?php if ( in_array( 'Product 2 Description', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-description-2">Product 2 Description</label>
                                                        <input type="text" id="hagen-description-2" name="hagen-description-2"
                                                               placeholder="Write a meaningful description to generate better result.">
                                                    </div>
                                                </div>
                                            <?php endif;?>


                                            <!-- Content -->
                                            <?php if ( in_array( 'Content', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-content">Content</label>
                                                        <input name="hagen-content" id="hagen-content" placeholder="Write your content" />
                                                    </div>
                                                </div>
                                            <?php endif;?>


                                            <!-- Content Text Area -->
                                            <?php if ( in_array( 'Content Text Area', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-content-textarea">Content</label>
                                                        <textarea name="hagen-content-textarea" id="hagen-content-textarea" cols="30"
                                                                  rows="10" placeholder="Write your content"></textarea>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if ( in_array( 'Keywords', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-keyword">Keyword to Include <span
                                                                    class="hagen-optional">(Optional)</span></label>
                                                        <input type="text" id="hagen-keyword" name="hagen-keyword"
                                                               placeholder="Write keyword and separate using comma">
                                                    </div>
                                                </div>

                                            <?php endif;?>
                                            <div class="hagen-form-group hagen-col-2">

                                                <?php //if ( true == $template['fields']['result_number'] ): ?>
                                                <div class="hagen-form-field">
                                                    <label for="hagen-result-number">Number of Results</label>
                                                    <input type="number" id="hagen-result-number" name="hagen-result-number"
                                                           value="1">
                                                </div>
                                                <?php //endif;?>

                                                <?php if ( in_array( 'Tone', $fields ) ): ?>
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-tone">Tone</label>
                                                        <select name="hagen-tone" id="hagen-tone">
                                                            <option value="friendly"> Friendly</option>
                                                            <option value="helpful"> Helpful</option>
                                                            <option value="informative"> Informative</option>
                                                            <option value="aggressive"> Aggressive</option>
                                                            <option value="professional"> Professional</option>
                                                            <option value="witty"> Witty</option>
                                                        </select>
                                                    </div>
                                                <?php endif;?>
                                            </div>


                                            <?php if ( in_array( 'Word Count', $fields ) ): ?>
                                                <div class="hagen-form-group">
                                                    <div class="hagen-form-field">
                                                        <label for="hagen-word-limit">Maximum Word Limit</label>
                                                        <input type="number" id="hagen-word-limit" name="hagen-word-limit" value="100">
                                                    </div>
                                                </div>
                                            <?php endif;?>


                                            <!-- Language option  -->
                                            <div class="hagen-form-group">
                                                <div class="hagen-form-field">
                                                    <label for="hagen-Language">Language</label>
                                                    <select name="hagen-Language" id="hagen-Language">
                                                        <?php
                                                        if(is_array(hagen_language_array())){
                                                            $default_language = hagen_get_option('hagen_language', 'en');
                                                            foreach(hagen_language_array() as $key => $value){
                                                                printf( '<option value="%s" %s >%s</option>', $key, selected( $default_language, $key ), $key );
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="hagen-form-submit">
                                                <?php if ( $template['is_pro'] ): ?>
                                                    <a href="https://hagen.com/pro-plugin" target="_blank" class="hagen-submit-pro"><svg width="14" height="16" viewBox="0 0 14 16"
                                                                                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                    d="M7 10.25V11.75M2.5 14.75H11.5C12.3284 14.75 13 14.0784 13 13.25V8.75C13 7.92157 12.3284 7.25 11.5 7.25H2.5C1.67157 7.25 1 7.92157 1 8.75V13.25C1 14.0784 1.67157 14.75 2.5 14.75ZM10 7.25V4.25C10 2.59315 8.65685 1.25 7 1.25C5.34315 1.25 4 2.59315 4 4.25V7.25H10Z"
                                                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                        Get Pro to Use This Template</a>
                                                <?php else: ?>
                                                    <button class="hagen-submit-button">Generate Content</button>
                                                <?php endif;?>
                                            </div>
                                        </form>

                                        <div class="hagen-result-box" style="display:none">
                                            <h4>AI Generated Content</h4>
                                            <div class="hagen-content-wrap"></div>

                                        </div>
                                    </div>
                                <?php endforeach;endif;?>
                        </div>

                    </div>

                </div>
            <?php endif;?>

        </div>
    </div>


    <script>
        jQuery(document).ready(function ($) {
            // Use const and let instead of var
            const $hagenPromptsTabs = $('.hagen-prompts-tabs');
            const $promptItems = $('.prompt-item');

            $promptItems.hide();

            $hagenPromptsTabs.on('click', '.hagen-tab-item', function (e) {
                e.preventDefault();

                const $this = $(this);
                const promptID = $this.data('prompt-id');

                $('#' + promptID).show();
                $promptItems.not('#' + promptID).hide();
            });

            $('.hagen-tiemplate-item').on('click', function (e) {
                e.preventDefault();

                $(this).next('.hagen-prompt-form-wrap').addClass('active');
            });

            $('.hagen-back-button').on('click', function (e) {
                e.preventDefault();

                $('.hagen-prompt-form-wrap').removeClass('active');
            });

            $('.hagen-prompt-form-wrap').on('submit', function (e) {
                e.preventDefault();

                const $this = $(this);
                const prompt = $this.find('#hagen-prompt').val();
                const topic = $this.find('#hagen-topic').val();
                const keyword = $this.find('#hagen-keyword').val();
                const result_number = $this.find('#hagen-result-number').val();
                const tone = $this.find('#hagen-tone').val();
                const word_limit = $this.find('#hagen-word-limit').val();
                const product_name = $this.find('#hagen-product-name').val();
                const content = $this.find('#hagen-content').val();
                const description = $this.find('#hagen-description').val();
                const content_textarea = $this.find('#hagen-content-textarea').val();
                const product_1 = $this.find('#hagen-product-1').val();
                const product_2 = $this.find('#hagen-product-2').val();
                const description_1 = $this.find('#hagen-description-1').val();
                const description_2 = $this.find('#hagen-description-2').val();
                const language = $this.find('#hagen-Language').val();
                const subject = $this.find('#hagen-subject').val();
                const comment = $this.find('#hagen-comment').val();
                const question = $this.find('#hagen-question').val();

                $this.find('.hagen-result-box').show();
                $this.find('.hagen-content-wrap').html(
                    '<div class="hagen-content skeleton"><div class="skeleton-left"><div class="line"></div><div class="line w50"></div><div class="line w75"></div></div></div>'
                );

                // Use $.post instead of $.ajax for simpler codew
                $.post({
                    url: '<?php echo  esc_url( admin_url( 'admin-ajax.php' )); ?>',
                    data: {
                        action: 'hagen_request',
                        prompt,
                        topic,
                        keyword,
                        result_number,
                        tone,
                        word_limit,
                        description,
                        product_name,
                        content_textarea,
                        product_1,
                        product_2,
                        description_1,
                        description_2,
                        language,
                        subject,
                        comment,
                        question,
                    },
                    success: function (response) {
                        console.log(response);
                        $this.find('.hagen-content-wrap').html(response);

                        // Use event delegation instead of attaching the click handler multiple times
                        $this.on('click', '.hagen-copy-button', function (e) {
                            e.preventDefault();

                            const text = $(this).data('copy-text');
                            const $copyButton = $(this);

                            navigator.clipboard.writeText(text)
                                .then(function () {
                                    $copyButton.text('copied');
                                })
                                .catch(function () {
                                    alert('Unable to copy text to clipboard!');
                                });
                        });
                    },
                    error: function (xhr) {
                        // Handle AJAX errors
                        $this.find('.hagen-content-wrap').html('Error: ' + xhr.statusText);
                    }
                });
            });



            $('.hagen-api-missing-form').on('submit', function (e) {
                e.preventDefault();

                const $this = $(this);
                const api_key = $this.find('#hagen-api-key').val();

                $this.find('.hagen-submit-button').html('Submitting...').css('background-color', 'gray')

                // Use $.post instead of $.ajax for simpler code
                $.post({
                    url: '<?php echo esc_url(admin_url( 'admin-ajax.php' )); ?>',
                    data: {
                        action: 'hagen_api_set',
                        api_key

                    },
                    success: function (response) {

                        if (response == 'success') {

                            $this.find('.hagen-submit-button').html('Success!!').css(
                                'background-color', '#77C155')
                            // reload current page
                            window.location.reload();
                        } else {
                            $this.find('.hagen-submit-button').html('Connect again').css(
                                'background-color', '#77C155')
                            $this.find('.hagen-form-submit').append(
                                '<span style="color:red">' + response.data + '</span>');
                        }

                    }
                });
            });

            // Use arrow function instead of function declaration for simpler code
            $('.hagen-trigger').on('click', () => {
                $('.hagen-trigger').toggleClass('active');
                $('.hagen-floating').toggleClass('active');
            });
        });
    </script>
    <?php printf( ob_get_clean());

}

add_action( 'admin_footer', 'hagen_frontend_callback' );
add_action( 'wp_footer', 'hagen_frontend_callback' );