import jQuery from 'jquery';

jQuery(document).on('click', '.menu-button', function () {
    jQuery('body').toggleClass('menu-open');
});
jQuery(document).on('click', '.menu-close', function () {
    jQuery('body').removeClass('menu-open');
});

