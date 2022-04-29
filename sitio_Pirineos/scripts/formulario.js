$(window).load(function () {
    $(".form_popup").click(function(){
       $('.form_1').show();
    });
    $('.close_form_bolsa').click(function(){
        $('.form_1').hide();
    });
});

$(window).load(function () {
    $(".form_popup_2").click(function(){
       $('.form_2').show();
    });
    $('.close_form_distribuidor').click(function(){
        $('.form_2').hide();
    });
});