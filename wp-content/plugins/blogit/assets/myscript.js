
jQuery(function($){
    $('.nav-tabs>li').click(function () {
        $('.nav-tabs>li').removeClass('active');
        $(this).toggleClass('active');
        var id_tabs = $(this).find('a').attr('href');
        $('.tab-pane').removeClass('active');
        $(id_tabs).toggleClass('active');
    })
});
