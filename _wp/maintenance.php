<?php
/**
 * Maintenance template.
 * 
 * File should be copied to [wordpress]/wp-content/maintenance.php
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.1
 */

// Tell search engines that the site is temporarily unavilable
$protocol = $_SERVER['SERVER_PROTOCOL'];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
    $protocol = 'HTTP/1.0';
header( $protocol . ' 503 Service Unavailable', true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( 'Retry-After: 600' );
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Under Maintenance - WordPress MVC framework</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style type="text/css">
            body {
                padding: 0;
                margin: 0;
                font-family: 'Open Sans',arial,sans-serif;
            }
            .content
            {
                width: calc(100vw - 30px);
                height: calc(100vh - 30px);
                padding: 15px;
                margin: 0;
                background-color: #f9f9fb;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                font-family: sans-serif;
                color: #6f7582;
            }
            img {
                margin: 0 0 20px;
            }
            h1 {
                color: #494d55;
                margin: 10px 0;
                text-align: center;
            }
            p {
                margin: 0 0 15px 0;
                text-align: center;
            }
            ul.social-networks {
                list-style: none;
                padding: 0;
                display: flex;
                font-size: 32px;
                width: 125px;
                align-items: center;
                justify-content: space-between;
                margin: 0;
            }
            ul.social-networks a {
                color: #ffa340;
            }
            ul.social-networks a:hover {
                color: #fdd4a7;
            }
            @media screen and (max-width: 450px) {
                h1 {
                   margin-bottom: 20px;
                }

                h1 .fa-spin {
                   display: block;
                }
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div>
                <img src="https://www.wordpress-mvc.com/wp-content/uploads/2020/01/wpmvs-icon-blue.png" alt="WordPress MVC Icon Blue" class="wp-image-1775">
            </div>
            <h1>Website under maintenance <i class="fa fa-circle-o-notch fa-spin"></i></h1>
            <p>We will be back shortly...</p>
        </div>
    </body>
</html>
<?php die() ?>