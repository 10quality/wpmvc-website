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
        'auth' => [
            'title'                 => __( 'Authentication', 'wpmvc-website' ),
            'priority'              => 115,
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
        'login_handler' => [
            'default'               => 'wp',
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'login_redirect' => [
            'default'               => true,
        ],
        'account_page_handler' => [
            'default'               => 'wp',
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'wp_login_background_color' => [
            'default'               => '#f1f1f1',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_link_color' => [
            'default'               => '#555d66',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_linkhover_color' => [
            'default'               => '#777f99',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_logo' => [
            'default'               => 0,
            'sanitize_callback'     => 'absint',
        ],
        'wp_login_logo_size' => [
            'default'               => 84,
            'sanitize_callback'     => 'absint',
        ],
        'wp_login_logo_position' => [
            'default'               => 'center top',
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'wp_login_linktext_color' => [
            'default'               => '#FFFFFF',
            'sanitize_callback'     => 'sanitize_hex_color',
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
        'login_handler' => [
                'type'              => 'select',
                'label'             => __( 'Login handler', 'wpmvc-website' ),
                'section'           => 'auth',
                'choices'           => apply_filters( 'wpmvc_login_handlers', [
                                        'wp'    => __( 'WordPress Login', 'wpmvc-website' ),
                                    ] ),
                'priority'          => 10,
        ],
        'login_redirect' => [
                'type'              => 'checkbox',
                'label'             => __( 'Login redirection', 'wpmvc-website' ),
                'description'       => __( 'Redirect to previous page after login?', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 11,
        ],
        'account_page_handler' => [
                'type'              => 'select',
                'label'             => __( 'Account page handler', 'wpmvc-website' ),
                'section'           => 'auth',
                'choices'           => apply_filters( 'wpmvc_account_page_handlers', [
                                        'wp'    => __( 'WordPress Dashboard', 'wpmvc-website' ),
                                    ] ),
                'priority'          => 20,
        ],
        'wp_login_logo' => [
                'type'              => 'media',
                'label'             => __( 'WordPress Login Logo', 'wpmvc-website' ),
                'description'       => __( 'In pixels.', 'wpmvc-website' ),
                'section'           => 'auth',
                'mime'              => 'image',
                'priority'          => 90,
        ],
        'wp_login_logo_size' => [
                'type'              => 'number',
                'label'             => __( 'WordPress Login Logo Size', 'wpmvc-website' ),
                'description'       => __( 'In pixels.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 91,
                'input_attrs'       => [
                                        'min' => 50,
                                        'max' => 320,
                                    ],
        ],
        'wp_login_logo_position' => [
                'type'              => 'select',
                'label'             => __( 'WordPress Login Logo Position', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 92,
                'choices'           => apply_filters( 'wpmvc_wp_logo_positions', [
                                        'center top'    => __( 'Center Top', 'wpmvc-website' ),
                                        'center center' => __( 'Center Center', 'wpmvc-website' ),
                                        'center bottom' => __( 'Center Bottom', 'wpmvc-website' ),
                                    ] ),
        ],
        'wp_login_background_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Background', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 100,
        ],
        'wp_login_link_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Links', 'wpmvc-website' ),
                'description'       => __( 'The small liks located after the white box.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 101,
        ],
        'wp_login_linkhover_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Links (hover)', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 102,
        ],
        'wp_login_linktext_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login link text', 'wpmvc-website' ),
                'description'       => __( 'Button text color.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 103,
        ],
    ],

];