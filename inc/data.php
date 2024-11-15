<?php

if ( !defined( 'ABSPATH' ) ) {
    exit( 'You are not allowed' );
}

function hagen_templates() {
    $all_prompts = [
        [
            'title'       => 'Headline Generation',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} Headline for '{topic}'.",
        ],
        [
            'title'       => 'Paragraph Related to Headline',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone, Word Count',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} paragraph based on '{topic}'. Keep it short and the word limit should not exceed {word count} words.",
        ],

        [
            'title'       => 'Full Blog Post',
            'is_pro'      => false,
            'fields'      => 'Topic, Keywords, Tone, Word Count',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "I need {tone} blog post on '{topic}'. Use the best practices to make it SEO friendly. Keywords to include in the first paragraph and body: {keywords}. The word limit should not exceed {word count} words.",
        ],

        [
            'title'       => 'Blog Title',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} Blog title for {topic}.",
        ],

        [
            'title'       => 'Blog Outline',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} blog outline for '{topic}'.",
        ],

        [
            'title'       => 'Blog Intro',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone, Keywords',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} blog intro for '{topic}'. Keywords to include: {keywords}.",
        ],

        [
            'title'       => 'Blog Paragraph',
            'is_pro'      => false,
            'fields'      => 'Topic, Tone, Keywords',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} blog intro for '{topic}'. Keywords to include: {keywords}.",
        ],

        [
            'title'       => 'Job Post',
            'is_pro'      => false,
            'fields'      => 'Topic, Description, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} Job post for '{topic}'. {description}. Include Responsibilities, Requirements, Benefits inside this job post.",
        ],

        [
            'title'       => 'Product Description',
            'is_pro'      => false,
            'fields'      => 'Name, Description, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} product description for '{name}'. {description}. Include features, benefits inside the description with paragraph & bullet points.",
        ],

        [
            'title'       => 'Meta Title',
            'is_pro'      => false,
            'fields'      => 'Name, Description',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write SEO friendly meta title for '{description}'. The title should be concise, accurate, and attention-grabbing, while also incorporating relevant keywords to improve search engine optimization. The website\'s brand name is '{name}'.",
        ],

        [
            'title'       => 'Meta Description',
            'is_pro'      => false,
            'fields'      => 'Name, Description',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write SEO friendly meta description for '{description}'. The description should be concise, accurate, and attention-grabbing, while also incorporating relevant keywords to improve search engine optimization. The website\'s brand name is '{name}'.",
        ],

        [
            'title'       => 'Meta Keywords',
            'is_pro'      => false,
            'fields'      => 'Name, Description',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write SEO friendly meta keywords for '{description}'. The keywords should be concise, accurate, and attention-grabbing to improve search engine optimization results. The website\'s brand name is '{name}'.",
        ],

        [
            'title'       => 'Sales Page Headlines',
            'is_pro'      => false,
            'fields'      => 'Description, Tone',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write {tone} Sales Page Headline for '{description}'. The headline should be very persuasive and engaging so that readers feel urgency to take action or scroll the page.",
        ],
        [
            'title'       => 'Sentence Expander',
            'is_pro'      => false,
            'fields'      => 'Content, Tone, Word Count',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Expand this content with more details: '{content}'. Generate with {tone} tone. Use better grammar and human friendly text so that it's easy to read and understand. The word limit should not exceed {word count} words.",
        ],
        [
            'title'       => 'Button Call to Action Text',
            'is_pro'      => false,
            'fields'      => 'Description',
            'description' => 'Generate a complete blog post based on a given topic or keywords',
            'prompt'      => "Write Call to action button text for '{description}'. The CTA should be very persuasive and engaging so that readers feel urgency to take action immediately. Keep the text short with max 4/5 words.",
        ],

    ];

    $new_prompts = apply_filters( 'hagen_all_prompts', $all_prompts );


    return array_merge( $all_prompts, $new_prompts );
}

// language set
function hagen_language_array() {
    return [
        'English'    => 'en',
        'Afrikaans'  => 'af',
        'Arabic'     => 'ar',
        'Armenian'   => 'an',
        'Bosnian'    => 'bs',
        'Bulgarian'  => 'bg',
        'Chinese'    => 'zh',
        'Croatian'   => 'hr',
        'Czech'      => 'cs',
        'Danish'     => 'da',
        'Dutch'      => 'nl',
        'Estonian'   => 'et',
        'Filipino'   => 'fil',
        'Finnish'    => 'fi',
        'French'     => 'fr',
        'German'     => 'de',
        'Greek'      => 'el',
        'Hebrew'     => 'he',
        'Hindi'      => 'hi',
        'Hungarian'  => 'hu',
        'Indonesian' => 'id',
        'Italian'    => 'it',
        'Japanese'   => 'ja',
        'Korean'     => 'ko',
        'Latvian'    => 'lv',
        'Lithuanian' => 'lt',
        'Malay'      => 'ms',
        'Norwegian'  => 'no',
        'Persian'    => 'fa',
        'Polish'     => 'pl',
        'Portuguese' => 'pt',
        'Romanian'   => 'ro',
        'Russian'    => 'ru',
        'Serbian'    => 'sr',
        'Slovak'     => 'sk',
        'Slovenian'  => 'sl',
        'Spanish'    => 'es',
        'Swedish'    => 'sv',
        'Thai'       => 'th',
        'Turkish'    => 'tr',
        'Ukrainian'  => 'uk',
        'Urdu'       => 'ur',
        'Vietnamese' => 'vi',
    ];

}