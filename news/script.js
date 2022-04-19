$(document).ready(function () {
    var srh = 0;
    if ($('.post-info').height() > $('.post-detail').height()) {
        if (screen.width <= 460)
            srh = 500;
        else srh = $('.post-detail').height();
        $('.post-info').css('height', srh + 'px');
    }
    $('.filter-buttons button').click(function () {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.post-container .buttons .favorite').click(function () {
        if ($(this).hasClass('ed')) {
            $(this).removeClass('ed');
        } else $(this).addClass('ed');
    })
})