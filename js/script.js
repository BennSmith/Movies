$(document).ready(function() {
    $('.purchase-page').hide();

    $('.purchase-btn').on('click', function() {
        var id = parseInt($(this).attr('id'));
        $('#movie-list').fadeOut();
        $('#purchase-' + id).fadeIn();
    })

    $('.return-btn').on('click', function() {
        $('.purchase-page').fadeOut();
        $('#movie-list').fadeIn();
    })
});