/**
 * Home page cards manager
 * Vue component.
 * ADMIN-ONLY
 *
 * @link http://vuejs.org/guide/components.html#Registration
 * @link http://vuejs.org/api/#Built-In-Components
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0 
 */
Vue.component('cards-manager', {
    template: '',
    mixins: [
        vue.mixins.jsonData,
    ],
    data: function() {
        return {
            /**
             * Cards.
             * @since 1.0.0
             */
            cards: [],
        }
    },
    methods:
    {
        /**
         * Adds a new cart to manager.
         * @since 1.0.0
         */
        add: function()
        {
            this.cards.push({
                icon: undefined,
                title: undefined,
                url: undefined,
                color: '',
                message: undefined,
            });
        },
        /**
         * Removes a card form manager.
         * @since 1.0.0
         */
        remove: function(index)
        {
            this.cards.splice(index, 1);
        },
    },
    components:
    {
        'card': {
            template: '',
            props:
            {
                /**
                 * Card model or object data.
                 * @since 1.0.0
                 * @var bool
                 */
                model: {},
                /**
                 * Card index in parent array.
                 * @since 1.0.0
                 * @var int
                 */
                index:
                {
                    type: Number,
                },
            }
        }
    }
});