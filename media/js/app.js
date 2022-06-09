//toggle "active" class on.click btn-menu to main-menu and  btn-menu
jQuery(function ($) {

    $('#signup').click(function () {
        $('.signUp').toggleClass('active');
        $('.logIn').removeClass('active');

    });
    $('#login').click(function () {
        $('.logIn').toggleClass('active');
        $('.signUp').removeClass('active');

    });
});