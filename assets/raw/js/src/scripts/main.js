/**
 * Main js file from PrettyDocs.
 */
(function($) {
    $(document).ready(function() {
        
        /* ===== Affix Sidebar ===== */
        /* Ref: http://getbootstrap.com/javascript/#affix-examples */

            
        $('#doc-menu.affix').affix({
            offset: {
                top: ($('#header').outerHeight(true) + $('#doc-header').outerHeight(true)) + 45,
                bottom: ($('#footer').outerHeight(true) + $('#promo-block').outerHeight(true)) + 75
            }
        });
        
        /* Hack related to: https://github.com/twbs/bootstrap/issues/10236 */
        $(window).on('load resize', function() {
            $(window).trigger('scroll'); 
        });

        /* Activate scrollspy menu */
        $('body').scrollspy({target: '#doc-nav', offset: 100});
        
        /* Smooth scrolling */
        $('a.scrollto').on('click', function(e){
            //store hash
            var target = this.hash;    
            e.preventDefault();
            $('body').scrollTo(target, 800, {offset: 0, 'axis':'y'});
            
        });

        /* Menu toggle */
        $('.menu-wrapper .toggle').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
            if ($('.menu-wrapper .menu').hasClass('active')) {
                $('.menu-wrapper .menu').removeClass('active');
            } else {
                $('.menu-wrapper .menu').addClass('active');
            }
        });
        
        /* ======= jQuery Responsive equal heights plugin ======= */
        /* Ref: https://github.com/liabru/jquery-match-height */
        
         $('#cards-wrapper .item-inner').matchHeight();
         $('#showcase .card').matchHeight();
         
        /* Bootstrap lightbox */
        /* Ref: http://ashleydw.github.io/lightbox/ */

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
    });
})(jQuery);