// JavaScript Document

$(document).ready(function() {
    //主导航菜单
    $(".nav_item").hover(function(){
        $(this).find("span").show().next().slideDown();
    },function(){
        $(this).find(".drop_list").slideUp().prev().hide();
    });

    /* Accordion */
    $('#main-menu .menu-link').click(function() {
        $(this).toggleClass('actived');
        $(this).next('.sub-main-menu').slideToggle('fast');
    });

    /* 选项卡 */
    $('.tab-doc .tab-head .bt').mouseover(function(){
        $(this).parent().find('.bt').removeClass('selected');
        $(this).addClass('selected');
        //$(this).parent().find('.more').attr('href',$(this).attr('additional'));
        $(".tab-doc .tab-con .tab-item").addClass('hide');
        $(".tab-doc .tab-con .tab-item:eq("+$(this).index()+")").removeClass('hide');
    });

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) { 
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
             }, scroll_top_duration
        );
    });
});