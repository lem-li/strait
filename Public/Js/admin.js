$(document).ready(function() {
    $('.page_go_mz_but').click(function(){
        var page_val = $('.page_go_mz_val').val();
        var local = location.href;
        local = local.replace(/&p=\d{1,}/,'');
        location.href = local + '&p='+page_val;
    });

});