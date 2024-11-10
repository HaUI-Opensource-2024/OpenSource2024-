// (function ($) {
//
//     jQuery(document).ready(function ($) {
//
//         // wpwand_media_upload();
//         // if (!wpwand_glb.is_pro) {
//         //     $('#toplevel_page_wpwand ul').append('<li><a style="color:#FFDF35" href="https://wpwand.com/pricing-plan/" target="_blank">Upgrade to PRO</a></li>')
//         // }
//
//
//         // pgf tabs
//         const $nasted_tabs = $('.wpwand-nasted-tabs a');
//         const $nasted_item = $('.wpwand-nasted-item');
//
//         $nasted_item.not('.active').hide();
//
//         $nasted_tabs.on('click', function (e) {
//             e.preventDefault();
//
//             const $this = $(this);
//             const tab_id = $this.data('id');
//
//             $nasted_tabs.removeClass('active');
//             $nasted_item.removeClass('active');
//             $this.addClass('active');
//             $('#' + tab_id).show();
//             $nasted_item.not('#' + tab_id).hide();
//         });
//
//
//         var numberInput = $("input[type=number]");
//
//         // var numberInput = $("#number-input");
//
//         numberInput.each(function () {
//             if ($(this).is('[max]')) {
//                 $(this).on("input", function () {
//                     var maxAttributeValue = parseFloat($(this).attr("max"));
//                     var currentValue = parseFloat($(this).val());
//
//                     if (currentValue >= maxAttributeValue) {
//                         // Prevent typing when value reaches or exceeds max
//                         $(this).val(maxAttributeValue);
//                     }
//                 })
//             }
//
//         });
//
//
//         var markdownContent = $('body').find('.wpwand-markdown');
//         var converter = new showdown.Converter();
//         var htmlContent = converter.makeHtml(markdownContent.text());
//         markdownContent.html(htmlContent)
//
//         $('.wpwand-nav-tab-wrapper a').click(function (e) {
//             e.preventDefault();
//             var tab = $(this).attr('href');
//             $('.wpwand-nav-tab-wrapper a').removeClass('wpwand-nav-tab-active');
//             $(this).addClass('wpwand-nav-tab-active');
//             $('.tab-panel').hide();
//             $(tab).show();
//
//
//             if ('#advanced' == tab || '#custom-pro' == tab) {
//                 $('.wpwand-settings p.submit').hide();
//             } else {
//                 $('.wpwand-settings p.submit').show();
//
//             }
//         });
//
//         $('.wpwand-settings .tab-panel textarea').each(function () {
//             $(this).siblings('.wpwand-chars-count').text(($(this).val().length) + " / " + $(this).attr('maxlength'));
//         })
//         $(".wpwand-settings .tab-panel textarea").keyup(function () {
//             $(this).siblings('.wpwand-chars-count').text(($(this).val().length) + " / " + $(this).attr('maxlength'));
//         });
//
//
//         let wpwand_frequency_input = $(".wpwand_slider_input");
//
//         wpwand_frequency_input.each(function () {
//
//
//             const $this = $(this);
//             const _this = this;
//             $this.parent('.wpwand-slider-input-wrap').prepend('<div class="wpwand_slider_range regular-text"></div>');
//             let wpwand_slider = $this.siblings('div.wpwand_slider_range');
//
//             let min = parseFloat($this.attr("min"))
//             let max = parseFloat($this.attr("max"))
//             let step = parseFloat($this.attr("step"));
//
//             let old_value = Number($this.val())
//
//             var disableAttr = $(this).attr('disabled');
//
//
//             wpwand_slider.slider({
//                 range: "max",
//                 disabled: typeof disableAttr !== 'undefined' && disableAttr !== false ? true : false,
//                 min: min,
//                 max: max,
//                 step: step,
//                 value: old_value,
//                 slide: function (event, ui) {
//                     $this.val(parseFloat(ui.value));
//
//                 }
//             });
//
//             $this.on("input", function () {
//                 wpwand_slider.slider("value", parseFloat(this.value));
//             });
//
//             if ($this.is('#wpwand_max_tokens')) {
//
//                 $('#wpwand_model').change(function () {
//                     wpwand_token_adjust($(this).val(), wpwand_slider);
//                 });
//
//                 // call the function on page load with the initial value of #wpwand_model
//                 wpwand_token_adjust($('#wpwand_model').val(), wpwand_slider);
//             }
//
//
//         })
//
//
//
//
//         $('.wpwand-api-missing-form').on('submit', function (e) {
//             e.preventDefault();
//
//             const $this = $(this);
//             const api_key = $this.find('#wpwand-api-key').val();
//
//             $this.find('.wpwand-submit-button').html('Submitting...').css('background-color', 'gray')
//
//             // Use $.post instead of $.ajax for simpler code
//             $.post({
//                 url: wpwand_glb.ajax_url,
//                 data: {
//                     action: 'wpwand_api_set',
//                     api_key
//
//                 },
//                 success: function (response) {
//
//                     if (response == 'success') {
//
//                         $this.find('.wpwand-submit-button').html('Success!!').css(
//                             'background-color', '#77C155')
//                         // reload current page
//                         window.location = wpwand_glb.setting_url;
//                     } else {
//                         console.log(response)
//                         $this.find('.wpwand-submit-button').html('Connect again').css(
//                             'background-color', '#77C155')
//                         $this.find('.wpwand-error').html(
//                             '<span style="color:red">' + response.data + '</span>');
//                     }
//
//                 }
//             });
//         });
//
//
//
//
//
//
//
//         if (typeof elementor === 'undefined') {
//             wpwand_ajax();
//
//             $('body').on('click', '.wpwand-trigger', (event) => {
//                 event.stopPropagation();
//
//                 $('.wpwand-trigger').toggleClass('active');
//                 $('.wpwand-floating').toggleClass('active');
//
//             });
//         }
//
//
//         $('.wpwand-promo-notice-Hide').on('click', function (e) {
//             e.preventDefault();
//             var noticeId = $(this).data('notice-id');
//
//             $.post({
//                 url: wpwand_glb.ajax_url,
//                 data: {
//                     action: 'wpwand_dismiss_notice',
//                     notice_id: noticeId,
//                     security: $(this).data('nonce')
//                 },
//                 success: function (response) {
//                     // console.log(response);
//                     $('.wpwand-notice-' + noticeId).slideUp();
//                 }
//             });
//         });
//
//
//         // sync prompt data
//         $('.wpwand-sync-prompt-data').on('click', function (e) {
//             e.preventDefault();
//             $this = $(this);
//             $this.html('<span class="dashicons dashicons-update"></span>')
//             $.post({
//                 url: wpwand_glb.ajax_url,
//                 data: {
//                     action: 'wpwand_sync_date',
//                     sync: true
//                 },
//                 success: function (response) {
//                     // console.log(response);
//                     $this.html('Successfully Updated!');
//                     window.location.reload();
//
//                 }
//             });
//         })
//
//
//
//     });
//
//     $(window).on('elementor:init', function () {
//
//         var wpwandRunning = false; // Variable to track if wpwand_ajax is running
//         var wpwandTimeout = null; // Variable to store the timeout reference
//
//
//         // Use arrow function instead of function declaration for simpler code
//         $('body').on('click', '.wpwand-trigger', (event) => {
//             event.stopPropagation();
//
//             $('.wpwand-trigger').toggleClass('active');
//             $('.wpwand-floating').toggleClass('active');
//
//         });
//         elementor.hooks.addAction('panel/open_editor/widget', function (panel, model, view, event) {
//             // removePreviousHandlers(); // Remove previous event handlers
//
//             $('.wpwand-trigger:not(.wpwand-close-button)').remove();
//             runWpwandAjax();
//
//             panel.on('childview:render:collection', function (event) {
//                 $('.wpwand-trigger:not(.wpwand-close-button)').remove();
//                 runWpwandAjax();
//             });
//
//             panel.on('set:page', function (event) {
//                 $('.wpwand-trigger:not(.wpwand-close-button)').remove();
//                 runWpwandAjax();
//             });
//         });
//
//         function runWpwandAjax() {
//             if (wpwandTimeout) {
//                 clearTimeout(wpwandTimeout); // Clear any previous timeout
//             }
//
//             wpwandTimeout = setTimeout(function () {
//                 // This code will run only after the specified delay (e.g., 500 milliseconds)
//                 wpwand_ajax();
//                 wpwandTimeout = null; // Reset the timeout reference
//             }, 1000); // Adjust the delay as needed
//
//         }
//
//
//
//     });
//
//
//     jQuery(window).on('load', function () {
//
//     })
//
//     function wpwand_token_adjust(selectedValue, e) {
//
//
//         switch (selectedValue) {
//             case 'gpt-3.5-turbo-16k':
//                 $(e).siblings('#wpwand_max_tokens').attr('max', 14000).change();
//                 $(e).slider('option', "max", 14000).change();
//                 break;
//             case 'gpt-4':
//                 $(e).siblings('#wpwand_max_tokens').attr('max', 7200).change();
//                 $(e).slider('option', "max", 7200).change();
//                 break;
//
//             default:
//                 // handle other cases
//                 $(e).siblings('#wpwand_max_tokens').attr('max', 3600).change();
//
//                 $(e).slider('option', "max", 3600).change();
//
//                 break;
//         }
//     }
//
//
//
//
//     function wpwand_ajax() {
//
//         // Use const and let instead of var
//         const $wpwandPromptsTabs = $('.wpwand-prompts-tabs');
//         const $promptItems = $('.wpwand-prompt-item');
//
//         $promptItems.not('.active').hide();
//
//         $wpwandPromptsTabs.on('click', '.wpwand-tab-item', function (e) {
//             e.preventDefault();
//             $(this).parent().find('.wpwand-tab-item').removeClass('active');
//             $(this).addClass('active');
//             const $this = $(this);
//             const promptID = $this.data('prompt-id');
//             $('#' + promptID).show();
//
//             $promptItems.not('#' + promptID).hide();
//         });
//
//         $('.wpwand-tiemplate-item').on('click', function (e) {
//             e.preventDefault();
//
//             $(this).next('.wpwand-prompt-form-wrap').addClass('active');
//         });
//
//         $('.wpwand-back-button').on('click', function (e) {
//             e.preventDefault();
//
//             $('.wpwand-prompt-form-wrap').removeClass('active');
//         });
//
//         var isRequestInProgress = false;
//
//         $('.wpwand-prompt-form-wrap').on('submit', function (e) {
//             e.preventDefault();
//             e.stopPropagation();
//             if (isRequestInProgress) {
//                 return; // Ignore the request if another request is already in progress
//             }
//
//
//             isRequestInProgress = true;
//
//
//             const $this = $(this);
//             const template_id = $this.find('#wpwand-prompt-id').val();
//             const prompt = $this.find('#wpwand-prompt').val();
//             const topic = $this.find('#wpwand-topic').val();
//             const keyword = $this.find('#wpwand-keyword').val();
//             const result_number = $this.find('#wpwand-result-number').val();
//             const tone = $this.find('#wpwand-tone').val();
//             const point_of_view = $this.find('#wpwand-point-of-view').val();
//             const word_limit = $this.find('#wpwand-word-limit').val();
//             const product_name = $this.find('#wpwand-product-name').val();
//             const content = $this.find('#wpwand-content').val();
//             const description = $this.find('#wpwand-description').val();
//             const content_textarea = $this.find('#wpwand-content-textarea').val();
//             const product_1 = $this.find('#wpwand-product-1').val();
//             const product_2 = $this.find('#wpwand-product-2').val();
//             const description_1 = $this.find('#wpwand-description-1').val();
//             const description_2 = $this.find('#wpwand-description-2').val();
//             const language = $this.find('#wpwand-Language').val();
//             const subject = $this.find('#wpwand-subject').val();
//             const comment = $this.find('#wpwand-comment').val();
//             const question = $this.find('#wpwand-question').val();
//             const markdown = $this.find('#wpwand-markdown').val();
//             const aichar = $this.find('#wpwand-aichar').val();
//             const inc_ai = $this.find('#wpwand_ai_inf').is(':checked');
//             const inc_biz = $this.find('#wpwand_biz_inf').is(':checked');
//             const inc_tgdc = $this.find('#wpwand_tgdc_inf').is(':checked');
//             const wpwand_image_prompt = $this.find('#wpwand-image-prompt').val();
//             const image_resulation = $this.find('#wpwand-image-resulation').val();
//             const custom_textarea = $this.find('#wpwand-custom_textarea').val();
//             const is_elementor = $this.closest('.wpwand-floating').hasClass('in-elementor');
//             const is_gutenberg = $this.closest('body').hasClass('block-editor-page');
//             const elementor_control_id = $this.closest('.wpwand-floating').data('elementor-id');
//             const elementor_control_type = $this.closest('.wpwand-floating').data('type');
//
//
//             // console.log(is_elementor);
//             $this.find('.wpwand-result-box').show();
//
//             if ('undefined' != typeof wpwand_image_prompt) {
//                 $this.find('.wpwand-content-wrap').html(
//                     '<div class="wpwand-content skeleton"><div class="skeleton-left"><div class="line"></div></div></div>'
//                 );
//             } else {
//                 $this.find('.wpwand-content-wrap').html(
//                     '<div class="wpwand-content skeleton"><div class="skeleton-left"><div class="line"></div><div class="line w50"></div><div class="line w75"></div></div></div>'
//                 );
//             }
//
//
//             // Use $.post instead of $.ajax for simpler codew
//             $.post({
//                 url: wpwand_glb.ajax_url,
//                 data: {
//                     action: 'wpwand_request',
//                     prompt,
//                     topic,
//                     keyword,
//                     result_number,
//                     tone,
//                     point_of_view,
//                     word_limit,
//                     description,
//                     product_name,
//                     content_textarea,
//                     product_1,
//                     product_2,
//                     description_1,
//                     description_2,
//                     language,
//                     subject,
//                     comment,
//                     markdown,
//                     question,
//                     is_elementor,
//                     is_gutenberg,
//                     custom_textarea,
//                     wpwand_image_prompt,
//                     image_resulation,
//                     template_id,
//                     inc_ai,
//                     inc_biz,
//                     inc_tgdc,
//                     aichar
//                 },
//                 success: function (response) {
//
//                     $this.find('.wpwand-content-wrap').empty().html(response);
//
//                     if (
//                         1 == markdown
//                     ) {
//                         var markdownContent = $this.find('.wpwand-ai-response');
//                         var converter = new showdown.Converter();
//                         var htmlContent = converter.makeHtml(markdownContent.text());
//                         markdownContent.html(htmlContent)
//
//                     }
//
//
//
//
//
//                 },
//                 error: function (xhr) {
//                     // Handle AJAX errors
//                     $this.find('.wpwand-content-wrap').html('Error: ' + xhr.statusText);
//                 },
//                 complete: function () {
//                     // Reset the flag variable once the request is complete
//                     isRequestInProgress = false;
//                 }
//             });
//
//
//
//
//
//             // Use event delegation instead of attaching the click handler multiple times
//             $this.on('click', '.wpwand-copy-button', function (e) {
//                 e.preventDefault();
//
//                 const text = $(this).siblings('.wpwand-ai-response').html();
//                 const $copyButton = $(this);
//
//                 navigator.clipboard.writeText(text)
//                     .then(function () {
//                         $copyButton.text('copied');
//                     })
//                     .catch(function () {
//                         alert('Unable to copy text to clipboard!');
//                     });
//             });
//
//
//         });
//
//         wpwand_elementor_insert()
//
//         const is_gutenberg = $('body').hasClass('block-editor-page');
//         if (is_gutenberg) {
//
//             $('body').on('click', '.wpwand-insert-to-gutenberg', function (e) {
//                 e.preventDefault();
//
//
//                 const htmlContent = $(this).siblings('.wpwand-ai-response').html(); // Replace with the HTML value you want to add
//
//                 // Get the pasteHandler function from the wp.blocks module
//                 const pasteHandler = wp.blocks.pasteHandler;
//
//                 // HTML content of the scrapped data
//                 // const htmlContent = '<p>Your scrapped HTML content goes here</p>';
//
//                 // Process the HTML content using the pasteHandler
//                 const blocks = pasteHandler({
//                     HTML: htmlContent,
//                 });
//
//                 // Get the current editor instance
//                 const editor = wp.data.select('core/editor');
//
//                 // Dispatch the insert blocks action
//                 wp.data.dispatch('core/block-editor').insertBlocks(blocks);
//
//                 // Trigger a save action to update the post content
//                 wp.data.dispatch('core/block-editor').synchronizeTemplate();
//
//                 // Create a temporary container element to hold the HTML content
//                 /*    var tempContainer = document.createElement('div');
//                    tempContainer.innerHTML = htmlToAdd;
//
//                    // Array to store the blocks
//                    var blocks = [];
//
//                    // Iterate through each <p> and heading tag
//                    var elements = tempContainer.querySelectorAll('p, h1, h2, h3, h4, h5, h6');
//                    elements.forEach(function (element) {
//                        // Get the tag name
//                        var tagName = element.tagName.toLowerCase();
//
//                        if (tagName === 'h1' || tagName === 'h2' || tagName === 'h3' || tagName === 'h4' || tagName === 'h5' || tagName === 'h6') {
//                            // Create block based on the tag name
//                            var block = wp.blocks.createBlock('core/heading', {
//                                content: element.innerHTML
//                            });
//
//                        } else {
//                            // Create block based on the tag name
//                            var block = wp.blocks.createBlock('core/table', {
//                                content: element.innerHTML
//                            });
//
//                        }
//
//                        // Add the block to the array
//                        blocks.push(block);
//                    });
//
//                    // Insert the blocks into Gutenberg editor
//                    wp.data.dispatch('core/block-editor').insertBlocks(blocks); */
//
//                 $(this).text('Inserted');
//
//
//             });
//         }
//
//
//         $('body').on('click', 'button.wpwand-image-action', function (e) {
//             e.preventDefault();
//             const $this = $(this);
//             const image_url = $this.data('url');
//             const image_name = $this.data('name');
//
//
//             $this.find('span').text('Adding');
//
//             // Use $.post instead of $.ajax for simpler code
//             $.post({
//                 url: wpwand_glb.ajax_url,
//                 data: {
//                     action: 'wpwand_download_image',
//                     image_url,
//                     image_name
//
//                 },
//                 success: function (response) {
//
//                     if (response.url) {
//                         $this.addClass('added');
//                         $this.parent().append('<a href="' + wpwand_glb.admin_url + '/upload.php" target="_blank">View in media library</a>');
//                         $this.find('span').text('Added');
//                         $this.find('svg').html('<path d="M2.91699 7.58334L5.25033 9.91667L11.0837 4.08334" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>');
//                     }
//
//                 }
//             });
//         });
//
//         $('.wpwand-screen-expander').on('click', function () {
//             $('.wpwand-floating').toggleClass('wpwand-expanded')
//         })
//
//         $('#wpwand-search-input').on('input', function () {
//             var searchTerm = $(this).val().toLowerCase();
//             $('.wpwand-tiemplate-item').each(function () {
//                 var listItemText = $(this).find('h4').text().toLowerCase();
//                 if (listItemText.indexOf(searchTerm) === -1) {
//                     $(this).hide();
//                 } else {
//                     $(this).show();
//                 }
//             });
//         });
//
//
//     }
//
//
//     function wpwand_elementor_insert() {
//         const is_elementor = $('body').hasClass('elementor-editor-active');
//
//
//
//         if (is_elementor) {
//             $('body').on('click', '.wpwand-insert-to-widget', function () {
//                 const elementor_control_id = $('body').find('.wpwand-floating').data('elementor-id');
//                 const elementor_control_type = $('body').find('.wpwand-floating').data('type');
//
//                 var textToAdd = $(this).siblings('.wpwand-ai-response').html(); // Replace with the text you want to add
//
//                 if ('wysiwyg' == elementor_control_type) {
//                     var editorId = elementor_control_id; // Replace with the ID of your TinyMCE editor
//
//                     var editor = tinymce.get(elementor_control_id);
//
//                     if (editor) {
//                         editor.setContent(textToAdd);
//                         editor.fire('change');
//
//                     }
//                 } else {
//                     $('#' + elementor_control_id).val(textToAdd).trigger('input')
//                 }
//                 $(this).text('Inserted')
//             })
//         }
//     }
//
//     function wpwand_media_upload() {
//
//
//         $('.wpwand-upload-button').on('click', function (e) {
//             var customUploader;
//             e.preventDefault();
//
//             const $this = $(this);
//             if (customUploader) {
//                 customUploader.open();
//                 return;
//             }
//
//             customUploader = wp.media({
//                 title: 'Upload File',
//                 button: {
//                     text: 'Select File'
//                 },
//                 multiple: false
//             });
//
//             customUploader.on('select', function () {
//                 var attachment = customUploader.state().get('selection').first().toJSON();
//                 $this.siblings('input').val(attachment.url);
//                 $this.siblings('.wpwand-upload-preview').children('img').attr('src', attachment.url).show();
//                 $this.siblings('.wpwand-upload-preview').children('.wpwand-img-preview-remove').show()
//
//             });
//
//             customUploader.open();
//         });
//
//         $('.wpwand-img-preview-remove').on('click', function () {
//             $(this).parent().siblings('input').val('');
//             $(this).siblings('img').attr('src', '').hide();
//             $(this).hide();
//
//         })
//
//
//
//     }
//
// }(jQuery))