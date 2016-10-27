<?php
/**
 * Site's footer file.
 * Wordpress template.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">
                <span>&copy; <?= date( 'Y' ) ?> <a href="http://www.10quality.com">10 Quality Studio</a></span>
                <span><?php _e( ', designed by' ) ?> <a href="http://themes.3rdwavemedia.com/" target="_blank">Xiaoying Riley</a></span>
                <span><?php _e( '. All rights reserved.' ) ?></span>
            </small>            
        </div><!--//container-->
    </footer><!--//footer-->
    <?php wp_footer(); ?>
</body>
</html>