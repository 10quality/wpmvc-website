/**
 * jQuery app.
 * ADMIN-ONLY
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0 
 */
(function($) {
    $(document).ready(function() {

        var app = {
            /**
             * Checks a specific template and hides or shows content.
             * @since 1.0.0
             * @param string template
             */
            checkPageTemplate: function(template)
            {
                $('.page-template-section').hide();
                $('div [data-template="'+template+'"]').show();
            }
        };

        /**
         * Hide and show template panels.
         * On change event.
         * @since 1.0.0
         */
        $('#page_template').change(function() {
            app.checkPageTemplate($(this).val());
        });

        /**
         * Set initial value.
         * @since 1.0.0
         */
        app.checkPageTemplate($('#page_template').val());

    });
})(jQuery);