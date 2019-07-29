$(document).ready(function() {
    $('*[data-hover]').hover(function() {
        var el = '#' + $(this).data('hover');
        $(el).toggleClass('hidden');
    });
});
