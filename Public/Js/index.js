$(document).ready(function() {
    $('.c1 .c_right .c_bt .bt').mouseover(function(){
        $(this).parent().find('.bt').removeClass('active');
        $(this).addClass('active');
        $(this).parent().find('.more').attr('href',$(this).attr('additional'));
        $('.c_right .c1_r').addClass('fn-hide');
        $(".c_right .c1_r:eq("+$(this).index()+")").removeClass('fn-hide');
    });
    $('.c2 .c_right .c2_r_1 .c_bt .bt').mouseover(function(){
        $(this).parent().find('.bt').removeClass('active');
        $(this).addClass('active');
        $('.c2 .c_right .c2_r_1 .c2_r_list').addClass('fn-hide');
        $(".c2 .c_right .c2_r_1 .c2_r_list:eq("+$(this).index()+")").removeClass('fn-hide');
    });
    $('.c2 .c_right .c2_r_2 .c_bt .bt').mouseover(function(){
        $(this).parent().find('.bt').removeClass('active');
        $(this).addClass('active');
        $('.c2 .c_right .c2_r_2 .c2_r_list').addClass('fn-hide');
        $(".c2 .c_right .c2_r_2 .c2_r_list:eq("+$(this).index()+")").removeClass('fn-hide');
    });
    $('#scro_img').scrollable({
        circular: true,
        prev: '#scro_l',
        next: '#scro_r'
    }).autoscroll({
        autoplay: true,
        interval: 5000
    }).navigator({
        navi: '#scro_nav'
    });
    //主导航菜单
    $(".nav_item").hover(function(){
        $(this).find("span").show().next().slideDown();
    },function(){
        $(this).find(".drop_list").slideUp().prev().hide();
    });
    
    //返回顶部
    var tophtml="<div id=\"izl_rmenu\" class=\"izl-rmenu\"><div class=\"btn btn-top\"></div></div>";
    $("#top").html(tophtml);
    $("#izl_rmenu").each(function(){
            $(this).find(".btn-top").click(function(){
                    $("html, body").animate({
                            "scroll-top":0
                    },"fast");
            });
    });
    var lastRmenuStatus=false;
    $(window).scroll(function(){//bug
            var _top=$(window).scrollTop();
            if(_top>200){
                    $("#izl_rmenu").data("expanded",true);
            }else{
                    $("#izl_rmenu").data("expanded",false);
            }
            if($("#izl_rmenu").data("expanded")!=lastRmenuStatus){
                    lastRmenuStatus=$("#izl_rmenu").data("expanded");
                    if(lastRmenuStatus){
                            $("#izl_rmenu .btn-top").slideDown();
                    }else{
                            $("#izl_rmenu .btn-top").slideUp();
                    }
            }
    });

});