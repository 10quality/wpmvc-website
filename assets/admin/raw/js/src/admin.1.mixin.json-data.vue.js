/**
 * Provides with json manipulation functionality to components.
 * Vue mixin.
 *
 * @author Alejandro Mostajo <PIXELovely>
 * @version 1.0
 */
vue.mixins.jsonData = {
    /**
     * Properties.
     * @since 1.0
     */
    props:
    {
        /**
         * Object or json string of data.
         * @since 1.0
         * @var mixed
         */
        jsonData:
        {
            type: [String, Object],
            default: function() { return '{}'; },
        },
        /**
         * Model to assign data to.
         * @since 1.0
         * @var mixed
         */
        jsonModel:
        {
            type: String,
            default: undefined,
        },
    },
    methods:
    {
        /**
         * Parses json data.
         * @since 1.0
         */
        parseJsonData: function()
        {
            var data = undefined;
            if (typeof(this.jsonData) === 'string') {
                // Use JQUERY
                data = jQuery.parseJSON(decodeURIComponent(this.jsonData.replace(/\+/g, ' ')));
            }
            if (this.jsonModel !== undefined && data !== undefined)
                this[this.jsonModel] = data;
        },
    },
    mounted: function()
    {
        this.parseJsonData();
    },
};