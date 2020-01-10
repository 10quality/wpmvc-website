<?php

/**
 * Customizer configuration file.
 */
return [

    // Sections
    'sections' => [
        'header' => [
            'title'                 => __( 'Header', 'wpmvc-website' ),
            'priority'              => 108,
        ],
        'footer' => [
            'title'                 => __( 'Footer', 'wpmvc-website' ),
            'priority'              => 109,
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
        'allow_search' => [
            'default'               => true,
        ],
        'allow_login' => [
            'default'               => true,
        ],
        'allow_mobile_menu' => [
            'default'               => false,
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
        'allow_search' => [
                'type'              => 'checkbox',
                'label'             => __( 'Allow search', 'wpmvc-website' ),
                'section'           => 'header',
                'priority'          => 50,
        ],
        'allow_login' => [
                'type'              => 'checkbox',
                'label'             => __( 'Allow login', 'wpmvc-website' ),
                'section'           => 'header',
                'priority'          => 51,
        ],
        'allow_mobile_menu' => [
                'type'              => 'checkbox',
                'label'             => __( 'Allow mobile menu', 'wpmvc-website' ),
                'description'       => __( 'This menu will only appear on mobile resolutions. It needs to be configured with a menu plugin (like Mega Menu).', 'wpmvc-website' ),
                'section'           => 'header',
                'priority'          => 55,
        ],
    ],

];