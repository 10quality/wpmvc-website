<?php

/**
 * App configuration file.
 */
return [

    'namespace' => 'WPMVCWebsite',

    'type' => 'theme',

    'paths' => [

        'base'          => __DIR__ . '/../',
        'controllers'   => __DIR__ . '/../Controllers/',
        'views'         => __DIR__ . '/../../assets/views/',
        'log'           => WP_CONTENT_DIR . '/wpmvc/log',

    ],

    'version' => '1.0.10',

    'autoenqueue' => [

        // Enables or disables auto-enqueue of assets
        'enabled'       => true,
        // Assets to auto-enqueue
        'assets'        => [
                            [
                                'asset'     => 'css/bootstrap.min.css',
                                'dep'       => [],
                                'footer'    => false,
                            ],
                            [
                                'asset'     => 'css/font-awesome.min.css',
                                'dep'       => [],
                                'footer'    => false,
                            ],
                            [
                                'asset'     => 'css/app.css',
                                'dep'       => ['bootstrap-wpmvcwebsite', 'font-awesome-wpmvcwebsite'],
                                'footer'    => false,
                            ],
                            [
                                'asset'     => 'js/vendor.js',
                                'dep'       => ['jquery'],
                                'footer'    => true,
                            ],
                            [
                                'asset'     => 'js/app.js',
                                'dep'       => ['vendor-wpmvcwebsite', 'wp-api'],
                                'footer'    => true,
                            ],
                        ],

    ],

    'cache' => [

        // Enables or disables cache
        'enabled'       => true,
        // files, auto (files), apc, wincache, xcache, memcache, memcached
        'storage'       => 'auto',
        // Default path for files
        'path'          => WP_CONTENT_DIR . '/wpmvc/cache',
        // It will create a path by PATH/securityKey
        'securityKey'   => '',
        // FallBack Driver
        'fallback'      => [
                            'memcache'  =>  'files',
                            'apc'       =>  'sqlite',
                        ],
        // .htaccess protect
        'htaccess'      => true,
        // Default Memcache Server
        'server'        => [
                            [ '127.0.0.1', 11211, 1 ],
                        ],

    ],

    'localize' => [
        // Enables or disables localization
        'enabled'       => false,
        // Default path for language files
        'path'          => __DIR__ . '/../../assets/lang/',
        // Text domain
        'textdomain'    => 'wpmvc-website',
        // Unload loaded locale files before localization
        'unload'        => false,
        // Flag that inidcates if this is a Wordpress.org plugin/theme
        'is_public'     => false,
    ],

    'github' => [
        'authorize_url' => 'https://github.com/login/oauth/authorize',
        'token_url'     => 'https://github.com/login/oauth/access_token',
        'api_url'       => 'https://api.github.com/',
        'scope'         => 'public_repo',
    ],

    'addons' => [
        'WPMVC\Addons\Customizer\CustomizerAddon',
    ],

];