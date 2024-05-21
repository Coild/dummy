$(document).ready(function () {
    $('.judul-faq1').click(function () {
        $('.faq1').toggleClass('active');
        // $('.judul-faq1 i').toggleClass('fa-chevron-up');
        $('.judul-faq1 i').toggleClass('fa-chevron-down fa-chevron-up');
        console.log('fadfaf')
    })
    $('.judul-faq2').click(function () {
        $('.faq2').toggleClass('active');
        $('.judul-faq2 i').toggleClass('fa-chevron-down fa-chevron-up');
        console.log('fadfaf')
    })
    $('.judul-faq3').click(function () {
        $('.faq3').toggleClass('active');
        $('.judul-faq3 i').toggleClass('fa-chevron-down fa-chevron-up');
        console.log('fadfaf')
    })
})