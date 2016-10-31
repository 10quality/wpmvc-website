/**
 * Enables code editor.
 * ADMIN-ONLY
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0 
 */
var codeEditor = undefined;
(function($) {

    /**
     * Code editor plugin.
     * @since 1.0.0 
     */
    $.fn.codeEditor = function()
    {
        /**
         * Element.
         * @since 1.0.0
         * @var object 
         */
        var $el = this;
        /**
         * Editor language.
         * @since 1.0.0
         * @var string 
         */
        $el.language = undefined;
        /**
         * Inits editor.
         * @since 1.0.0
         */
        $el.init = function()
        {
            $el.language = $el.data('language');
            codeEditor = ace.edit($el.attr('id'));
            codeEditor.setTheme('ace/theme/monokai');
            codeEditor.getSession().setMode('ace/mode/'+$el.language);
            codeEditor.on('change', $el.onChange);
            codeEditor.setValue($($el.data('listener')).val());
        };
        /**
         * On Change event. 
         */
        $el.onChange = function(e)
        {
            $($el.data('listener')).val(encodeURIComponent(codeEditor.getValue()));
        };
        /**
         * Begin.
         * @since 1.0.0
         */
        $(document).ready($el.init);
    }
    $('#code-editor').codeEditor();
    $('.code-editor-mode-selector').change(function() {
        if (codeEditor === undefined) return;
            codeEditor.getSession().setMode('ace/mode/'+$(this).val());
    });
})(jQuery);