(function ($) {

    jQuery(document).ready(function ($) {
        $('.nav-tab-wrapper a').click(function (e) {
            e.preventDefault();
            var tab = $(this).attr('href');
            $('.nav-tab-wrapper a').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            $('.tab-panel').hide();
            $(tab).show();


            if ('#advanced' == tab) {
                $('.hagen-settings p.submit').hide();
            } else {
                $('.hagen-settings p.submit').show();

            }
        });



        let hagen_frequency_input = $(".hagen_slider_input");

        hagen_frequency_input.each(function () {
            let $this = $(this);
            $this.parent('.hagen-slider-input-wrap').prepend('<div class="hagen_slider_range regular-text"></div>');
            let hagen_slider = $this.siblings('div.hagen_slider_range');

            let min = parseFloat($this.attr("min"))
            let max = parseFloat($this.attr("max"))
            let step = parseFloat($this.attr("step"));

            let old_value = Number($this.val())


            hagen_slider.slider({
                range: "max",
                min: min,
                max: max,
                step: step,
                value: old_value,
                slide: function (event, ui) {
                    $this.val(parseFloat(ui.value));
                    // console.log("value: " + ui.value);
                }
            });

            $this.on("input", function () {
                hagen_slider.slider("value", parseFloat(this.value));
            });
        })

    });


    jQuery(window).on('load', function () {
        $('#hagen_model').change(function () {
            hagen_model_card($(this).val());
        });

        // call the function on page load with the initial value of #hagen_model
        hagen_model_card($('#hagen_model').val());
    })

    function hagen_model_card(selectedValue) {
        switch (selectedValue) {
            case 'text-davinci-003':
                $('#hagen-text-davinci-003').show();
                $('#hagen-text-davinci-003').siblings().hide()
                break;
            case 'gpt-3.5-turbo':
                $('#hagen-gpt-3-5').show();
                $('#hagen-gpt-3-5').siblings().hide()
                break;
            case 'text-curie-001':
                $('#hagen-text-curie-001').show();
                $('#hagen-text-curie-001').siblings().hide()
                break;
            case 'text-babbage-001':
                $('#hagen-text-babbage-001').show();
                $('#hagen-text-babbage-001').siblings().hide()
                break;
            case 'text-text-ada-001':
                $('#hagen-text-text-ada-001').show();
                $('#hagen-text-text-ada-001').siblings().hide()
                break;

            // add more cases as needed
            default:
                // handle other cases
                $('#hagen-gpt-3-5').show();
                $('#hagen-gpt-3-5').siblings().hide()
                break;
        }
    }
}(jQuery))