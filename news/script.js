$(document).ready(function () {
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