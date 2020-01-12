/**
 * Scroll-to sub link creator.
 * jQuery plugin.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.9
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
            var current_url = window.location.href.replace(/\#[a-zA-Z0-9]+/gi, '');
            // Get sections
            $('.doc-section').each(function (index) {
                // Adds section for submenu rendering
                $el.data.sections.push({
                    id: $(this).attr('id'),
                    title: $(this).find('.block-title').text(),
                });
                // Apppend copy to clipboar link on titles
                var $clipboard = $('<a>#</a>')
                    .attr('href', '#'+$(this).attr('id'))
                    .attr('title', 'Copy to clipboard')
                    .attr('data-clipboard-text', current_url+'#'+$(this).attr('id'))
                    .addClass('copy-to-clipboard clipboard');
                $(this).find('.block-title').append($clipboard);
            });
            // Get active submenu
            $el.data.active = $el.find('li.active');
            // Render
            $el.render();
            // Scroll to
            $el.scrollTo();
            // Clipboard
            new ClipboardJS('.clipboard');
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
         * Scrolls to target scrollto.
         * @since 1.0.0
         */
        $el.scroll = function(target)
        {
            $($('.page-content').length > 0 ? '.page-content' : 'body').scrollTo(target, 800, {offset: 0, 'axis':'y'});
        }

        /**
         * Adds scrollto.
         * @since 1.0.0
         */
        $el.scrollTo = function()
        {
            $('.scroll-to-section').on('click', function(e) {
                e.preventDefault();
                //store hash
                var target = this.hash;    
                $el.scroll(target);
            });
            $('.copy-to-clipboard').on('click', function(e) {
                e.preventDefault();
                //store hash
                var target = this.hash;    
                $el.scroll(target);
            });
        };

        $(document).ready($el.init);
    }

    $('#doc-menu').docuMenu();

})(jQuery);