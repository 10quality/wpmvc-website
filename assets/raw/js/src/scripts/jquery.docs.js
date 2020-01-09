/**
 * Scroll-to sub link creator.
 * jQuery plugin.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.1.0
 */
(function($) {

    $.fn.docuMenu = function()
    {
        /**
         * Element caller.
         * @since 1.0.0
         * @var object
         */
        var $el = this;

        /**
         * Data.
         * @since 1.0.0
         * @var object
         */
        $el.data = 
        {
            active: undefined,
            sections: [],
        };

        /**
         * Initializes plugin.
         * @since 1.0.0
         */
        $el.init = function()
        {
            // Get sections
            $('.doc-section').each(function (index) {
                $el.data.sections.push({
                    id: $(this).attr('id'),
                    title: $(this).find('.block-title').text(),
                });
            });
            // Get active submenu
            $el.data.active = $el.find('li.active');
            // Render
            $el.render();
            // Scroll to
            $el.scrollTo();
        };

        /**
         * Renders submenu
         * @since 1.0.0
         */
        $el.render = function()
        {
            $html = $('<ul class="nav doc-sub-menu"></ul>');
            for (var i = 0; i < $el.data.sections.length; ++i) {
                $html.append('<li><a class="scroll-to-section" href="#'+$el.data.sections[i].id+'">'+$el.data.sections[i].title+'</a></li>');
            }
            $el.data.active.append($html);
        };

        /**
         * Adds scrollto.
         * @since 1.0.0
         */
        $el.scrollTo = function()
        {
            $('.scroll-to-section').on('click', function(e){
                //store hash
                var target = this.hash;    
                e.preventDefault();
                $($('.page-content').length > 0 ? '.page-content' : 'body').scrollTo(target, 800, {offset: 0, 'axis':'y'});
                
            });
        };

        $(document).ready($el.init);
    }

    $('#doc-menu').docuMenu();

})(jQuery);