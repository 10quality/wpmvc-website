/**
 * Superbrowse.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @version 1.1.2
 */
( function( $ ) {
    /**
     * jQuery plugin.
     * @since 1.0.8
     */
    $.fn.superbrowse = function()
    {
        // Self
        var self = this;
        /**
         * DOM Element.
         * @since 1.0.8
         * @var {object}
         */
        self.$el = undefined;
        /**
         * Form DOM Element.
         * @since 1.0.8
         * @var {object}
         */
        self.$form = undefined;
        /**
         * Loader DOM Element.
         * @since 1.0.8
         * @var {object}
         */
        self.$loader = undefined;
        /**
         * Results DOM Element.
         * @since 1.0.8
         * @var {object}
         */
        self.$results = undefined;
        /**
         * Flag that indicates if superbrowse is ready for use.
         * @since 1.0.8
         * @var {bool}
         */
        self.ready = false;
        /**
         * Flag that indicates if the superbrowse is opened or not.
         * @since 1.0.8
         * @var {bool}
         */
        self.opened = false;
        /**
         * Flag that indicates if the superbrowse is loading or not.
         * @since 1.0.8
         * @var {bool}
         */
        self.loading = false;
        /**
         * Results data.
         * @since 1.0.8
         * @var {array}
         */
        self.data = undefined;
        /**
         * Templates.
         * @since 1.0.8
         * @var {object}
         */
        self.templates = {};
        /**
         * Private methods.
         * @since 1.0.0
         */
        self.methods = {
            /**
             * Inits plugin, checks for DOM element and binds general to events.
             * Cycle method.
             * @since 1.0.0
             */
            _init: function()
            {
                self.$el = $( '#superbrowse' );
                if ( self.$el.length ) {
                    self.$form = self.$el.find( '*[role="form"]' );
                    self.$loader = self.$el.find( '*[role="loader"]' );
                    self.$results = self.$el.find( '*[role="results"]' );
                    if ( self.$form.length === 0 || self.$loader.length === 0 || self.$results.length === 0 ) return;
                    self.ready = true;
                    // Load templates
                    $( 'script.superbrowse-template' ).each( function() {
                        if ( $( this ).attr( 'type' ) === 'text/template' && $( this ).attr( 'role' ) )
                            self.templates[$( this ).attr( 'role' )] = $( this ).html().trim();
                        $( this ).remove();
                    } );
                    // Bind close
                    self.$el.find( '*[role="close"]' ).on( 'click', self.methods._deactivate );
                    $( document ).on( 'keydown', self.methods._key_deactivate );
                    // Bind callers
                    $( document ).on( 'click', '*[role="superbrowse-caller"]', self.methods._open );
                    // Form events
                    self.$form.find( 'input[type="checkbox"]' ).on( 'change', function() {
                        self.$form.submit();
                    } );
                    self.$form.on( 'submit', function( event ) {
                        event.preventDefault();
                        return self.methods.browse();
                    } );
                }
            },
            /**
             * Opens and activates the superbrowse.
             * Cycle method.
             * @since 1.0.0
             */
            _open: function()
            {
                if ( ! self.ready ) return;
                $( window ).trigger( 'superbrowse_before_open' );
                self.methods.clear_form();
                self.$el.show();
                document.body.style.overflow = 'hidden';
                // Focus on input
                self.$form.find( 'input[type="search"]' ).focus();
                setTimeout( self.methods._activate, 150 );
            },
            /**
             * Activates the superbrowse.
             * Cycle method.
             * @since 1.0.0
             */
            _activate: function()
            {
                if ( ! self.ready ) return;
                self.$el.addClass( 'active' );
                self.opened = true;
                $( window ).trigger( 'superbrowse_after_open' );
            },
            /**
             * Closes the superbrowse.
             * Cycle method.
             * @since 1.0.0
             */
            _close: function()
            {
                if ( ! self.ready ) return;
                document.body.style.overflow = 'visible';
                self.$el.hide();
                self.opened = false;
                $( window ).trigger( 'superbrowse_after_close' );
            },
            /**
             * Deactivates and closes the superbrowse.
             * Cycle method.
             * @since 1.0.0
             */
            _deactivate: function()
            {
                if ( ! self.ready ) return;
                $( window ).trigger( 'superbrowse_before_close' );
                self.methods.clear_results();
                self.$loader.hide();
                self.$el.removeClass( 'active' );
                setTimeout( self.methods._close, 150 );
            },
            /**
             * Deactivates and closes the superbrowse vya keyword press.
             * Cycle method.
             * @since 1.0.0
             * @param {object} event
             */
            _key_deactivate: function( event )
            {
                if ( ! self.ready || ! self.opened ) return;
                if ( event.keyCode == 27 )
                    self.methods._deactivate();
            },
            /**
             * Clears form.
             * Data form method.
             * @since 1.0.0
             */
            clear_form: function()
            {
                // Form
                self.$form.find( 'input[type="search"]' ).val( '' );
                self.$form.find( 'input[type="checkbox"]' ).prop( 'checked', true );
            },
            /**
             * Clears results.
             * Data form method.
             * @since 1.0.0
             */
            clear_results: function()
            {
                self.$results.html( '' );
                self.$results.hide();
            },
            /**
             * Clears search query.
             * Data form method.
             * @since 1.0.0
             */
            clear_query: function()
            {
                self.$form.find( 'input[type="search"]' ).val( '' );
            },
            /**
             * Returns browse request.
             * Data form method.
             * @since 1.0.0
             * @return {object}
             */
            get_browse_request: function()
            {
                var request = {
                    path: 'wpmvc/v1/superbrowse',
                    data: {
                        q: self.$form.find( 'input[name="q"]' ).val(),
                    },
                };
                var types = [];
                self.$form.find( 'input[name="types[]"]' ).each( function() {
                    if ( $( this ).is( ':checked' ) )
                        types.push( $( this ).val() );
                } );
                if ( types.length )
                    request.data.types = types;
                return request;
            },
            /**
             * Browses/searches for data.
             * Data form method.
             * @since 1.0.0
             */
            browse: function()
            {
                if ( self.loading || ! self.opened ) return;
                self.methods.set_loading( true );
                var request = self.methods.get_browse_request();
                if ( request.data.q.length > 2 && request.data.types ) {
                    wp.apiRequest( request )
                        .then( self.methods.on_browse_response );
                } else {
                    self.methods.set_loading( false );
                }
            },
            /**
             * On browse response event handler.
             * Data form method.
             * @since 1.0.0
             * @param {object} data
             */
            on_browse_response: function( data )
            {
                self.methods.process_results( data );
                self.methods.set_loading( false );
            },
            /**
             * Sets loading state.
             * @since 1.0.0
             */
            set_loading: function( flag )
            {
                self.loading = flag;
                if ( flag ) {
                    self.methods.clear_results();
                    self.$loader.show();
                } else {
                    self.$loader.hide();
                }
            },
            /**
             * Process browse results.
             * Data method.
             * @since 1.0.0
             * @param {object} data
             */
            process_results: function( data )
            {
                self.data = undefined;
                if ( data.length ) {
                    self.data = {};
                    for ( var i = 0; i < data.length; ++i ) {
                        if ( self.data[ data[i].type ] === undefined )
                            self.data[ data[i].type ] = [];
                        self.data[ data[i].type ].push( data[i] );
                    }
                }
                self.methods.render();
            },
            /**
             * Renders browse data.
             * Data method.
             * @since 1.0.0
             */
            render: function()
            {
                if ( self.data && Object.keys( self.data ).length ) {
                    for ( var type in self.data ) {
                        // Display heading
                        if ( self.templates['heading-'+type] )
                            self.$results.append( self.templates['heading-'+type] );
                        var template = self.templates['result-'+type] ? self.templates['result-'+type] : self.templates.result;
                        if ( template )
                            self.data[type].map( function( result ) {
                                var $template = $( template );
                                $template.attr( 'id', 'res-' + result.data_source + '-' + result.object_id );
                                $template.addClass( result.type );
                                if ( result.title ) {
                                    $template.find( '*[data-property="title"]' ).html( result.title );
                                } else {
                                    $template.find( '*[data-property="title"]' ).remove();
                                }
                                if ( result.description ) {
                                    $template.find( '*[data-property="description"]' ).html( result.description );
                                } else {
                                    $template.find( '*[data-property="description"]' ).remove();
                                }
                                if ( result.attachment ) {
                                    var $img = $( '<img/>' )
                                        .attr( 'src', result.attachment.thumb_url )
                                        .attr( 'alt', result.attachment.title );
                                    $template.find( '*[data-property="attachment"]' ).append( $img );
                                } else {
                                    $template.find( '*[data-property="attachment"]' ).remove();
                                }
                                if ( result.url ) {
                                    $template.attr( 'href', result.url );
                                    self.$results.append( $template );
                                }
                            } );
                    }
                } else {
                    if ( self.templates.noresults )
                        self.$results.append( self.templates.noresults );
                }
                self.$results.show();
            },
        };
        $( document ).ready( self.methods._init );
        /**
         * Return public methods.
         * @since 1.0.8
         */
        return {
            /**
             * Opens superbrowse.
             * - superbrowse.open()
             * @since 1.0.8
             */
            open: function()
            {
                self.methods._open();
            },
            /**
             * Closes superbrowse.
             * - superbrowse.close()
             * @since 1.0.8
             */
            close: function()
            {
                self.methods._deactivate();
            },
        };
    };
    /**
     * Init on window.
     */
    window.superbrowse = $( window ).superbrowse();
} )( jQuery );