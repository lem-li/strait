/* base.js */

$(function() {

    var c = $("#mod-nav");
    var r = $(".mod-body");
    var u = $(".mod-body>.main");
    var f = $("#mod-foot");
    if (f.length) {
        var j;
        $(".gotop").click(function() {
            document.body.scrollTop && (j = setInterval(function() {
                document.body.scrollTop > 0 ? document.body.scrollTop = document.body.scrollTop - 150 :j && (clearInterval(j), 
                j = null);
            }, 50));
        }), f.css({
            visibility:"visible"
        });
    }
	
    var q = document.documentElement.clientHeight;
    f.length && c.length ? u.css({
        "min-height":q - c[0].offsetHeight - f[0].offsetHeight - parseInt(f.css("margin-top"), 10) + "px"
    }) :c.length ? u.css({
        "min-height":q - c[0].offsetHeight + "px"
    }) :u && u.css({
        "min-height":q - parseInt(u.css("padding-bottom"), 10) - parseInt(u.css("padding-top"), 10) + "px"
    });
    
    /*表单*/
    $(".mod-form .close").each(function() {
        $(this).on("tap click", function() {
            $(this).prev("input").val(""), $(this).prev("input").focus();
        });
    });
    
    $(".mod-form input").each(function() {
        $(this).on("input focus", function() {
            var e = $(this).val().trim().length;
            e > 0 ? $(this).next(".close").show() : $(this).next(".close").hide();
        });
        
        $(this).on("blur", function() {
            var e = $(this);
            setTimeout(function() {
                e.next(".close").hide();
            }, 200);
        });
    });
    
    $(".mod-form input").bind("focus", function() {
        $(this).parents("li").addClass("focus");
    });
    $(".mod-form input").bind("blur", function() {
        $(this).parents("li").removeClass("focus");
    });
	
    /*下拉框*/
    r.delegate(".util-select", "change", function() {
        var t = $(this), e = "";
        $("option", t[0]).each(function(t, i) {
            i.selected && (e = $(i).html());
        }), t.prev("span.select-result").html(e);
		
		if(t.val() == ""){
			t.prev("span.select-result").addClass("nochoose");
		} else {
			t.prev("span.select-result").removeClass("nochoose");
		}
		
    });
    
	
});