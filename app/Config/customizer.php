<?php

/**
 * Customizer configuration file.
 */
return [

    // Settings
    'settings' => [
        'title_highlight' => [
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'title_bold' => [
            'sanitize_callback'     => 'sanitize_text_field',
        ],
    ],

    // Controlles
    'controls' => [
        'title_highlight' => [
                'type'              => 'text',
                'label'             => __( 'Title\'s highlight', 'wpmvc-website' ),
                'section'           => 'title_tagline',
                'priority'          => 15
        ],
        'title_bold' => [
                'type'              => 'text',
                'label'             => __( 'Title\'s bold', 'wpmvc-website' ),
                'section'           => 'title_tagline',
                'priority'          => 16
        ],
    ],

];