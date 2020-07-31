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

    'version' => '1.1.3',

    'author' => '10 Quality Studio <https://www.10quality.com/>',

    'autoenqueue' => [

        // Enables or disables auto-enqueue of assets
        'enabled'       => true,
        // Assets to auto-enqueue
        'assets'        => [
            // CSS
            [
                'id'        => 'bootstrap',
                'asset'     => 'css/bootstrap.min.css',
                'version'   => '3.4.1',
                'flag'      => 'all',
            ],
            [
                'id'        => 'font-awesome',
                'asset'     => 'css/font-awesome.min.css',
                'flag'      => 'all',
            ],
            [
                'asset'     => 'css/app.css',
                'dep'       => ['bootstrap', 'font-awesome'],
                'flag'      => 'all',
            ],
            // JS
            [
                'id'        => 'bootstrap',
                'asset'     => 'js/bootstrap.min.js',
                'version'   => '3.4.1',
                'footer'    => true,
            ],
            [
                'id'        => 'match-height',
                'asset'     => 'js/jquery.matchHeight-min.js',
                'version'   => '0.7.2',
                'footer'    => true,
            ],
            [
                'id'        => 'scroll-to',
                'asset'     => 'js/jquery.scrollTo.min.js',
                'version'   => '2.1.2',
                'footer'    => true,
            ],
            [
                'id'        => 'clipboard',
                'asset'     => 'js/clipboard.min.js',
                'version'   => '2.0.6',
                'footer'    => true,
            ],
            [
                'asset'     => 'js/app.js',
                'dep'       => ['jquery', 'bootstrap', 'match-height', 'scroll-to', 'wp-api'],
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