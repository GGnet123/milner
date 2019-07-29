$('.header-toggler').on('click touchstart', function(e) {
    e.preventDefault();
    $('header.header').toggleClass('open');
});

$(window).scroll(function() {
    var header = $('.header');
    var headerHeight = $(header).outerHeight();
    var headerTop = $(header).offset().top;
    var ht = headerHeight + headerTop;

    if($(this).scrollTop() > ht) {
        $(header).toggleClass('sticky');
    }
})
