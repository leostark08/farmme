$(document).ready(function () {
    $('.filter-buttons button').click(function () {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });
})