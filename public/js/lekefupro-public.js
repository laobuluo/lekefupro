jQuery(document).ready(function($) {
    'use strict';

    // 处理回到顶部按钮的显示和隐藏
    var scrollToTop = $('.scroll-to-top');
    
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            scrollToTop.addClass('visible');
        } else {
            scrollToTop.removeClass('visible');
        }
    });

    // 点击回到顶部
    scrollToTop.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    });

    // 处理电话号码点击
    $('.lekefupro-icon-item .phone-number').parent().parent().on('click', function() {
        var phoneNumber = $(this).find('.phone-number').text();
        window.location.href = 'tel:' + phoneNumber;
    });
}); 