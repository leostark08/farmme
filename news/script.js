$(document).ready(function () {
    var srh = 0;
    if ($('.post-info').height() > $('.post-detail').height()) {
        if (screen.width <= 460)
            srh = 500;
        else srh = $('.post-detail').height();
        $('.post-info').css('height', srh + 'px');
    }
    $('.filter-buttons .btn-filter').click(function () {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.post-container .buttons .favorite').click(function () {
        if ($(this).hasClass('ed')) {
            $(this).removeClass('ed');
        } else $(this).addClass('ed');
    });
    $('#toggle').click(function () {
        $('.nav-container').css({ 'left': '0', 'transition': 'all 0.3s' });
        $('#toggle').css('display', 'none');
    });
    $('#nav-close').click(function () {
        $('.nav-container').css({ 'left': '100vh', 'transition': 'all 0.3s' });
        $('#toggle').css('display', 'flex');
    })
})