<?php

/**
 * Customizer configuration file.
 */
return [

    // Sections
    'sections' => [
        'footer' => [
            'title'                 => __( 'Footer', 'wpmvc-website' ),
            'priority'              => 110,
        ],
    ],

    // Settings
    'settings' => [
        'title_highlight' => [
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'title_bold' => [
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'copyright_text' => [
            'default'               => '',
            'sanitize_callback'     => 'sanitize_copyright',
        ],
    ],

    // Controlles
    'controls' => [
        'title_highlight' => [
                'type'              => 'text',
                'label'             => __( 'Title\'s highlight', 'wpmvc-website' ),
                'section'           => 'title_tagline',
                'priority'          => 15,
        ],
        'title_bold' => [
                'type'              => 'text',
                'label'             => __( 'Title\'s bold', 'wpmvc-website' ),
                'section'           => 'title_tagline',
                'priority'          => 16,
        ],
        'copyright_text' => [
                'type'              => 'textarea',
                'label'             => __( 'Copyright text', 'wpmvc-website' ),
                'description'       => __( 'Wildcards:<br><ul><li><strong>{copy}</strong>: &copy;</li><li><strong>{year}</strong>: Current year</li></ul>', 'wpmvc-website' ),
                'section'           => 'footer',
                'priority'          => 50,
        ],
    ],

];