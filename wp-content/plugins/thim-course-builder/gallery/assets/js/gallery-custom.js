(function ($) {
	"use strict";

    $(window).load(function() {
        if( $('.thim-sc-gallery .wrapper-gallery-filter').length > 0 ) {
            $('.thim-sc-gallery .wrapper-gallery-filter').isotope({filter: '*'});
        }
    });

    $(document).on('click', '.thim-sc-gallery .filter-controls .filter', function (e) {
        e.preventDefault();
        var filter = $(this).data('filter'),
            filter_wraper = $(this).parents('.thim-sc-gallery').find('.wrapper-gallery');
        $('.filter-controls .filter').removeClass('active');
        $(this).addClass('active');
        filter_wraper.isotope({filter: filter});
    });

    $('.wrapper-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
                return element.find('img');
            }
        }
    });


})(jQuery);