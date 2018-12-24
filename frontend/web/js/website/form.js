$(document).ready(function () {

$(".show-next").click(function (e) {
    e.preventDefault();
   $(".display-img-2").removeClass();
    $(".display-btn-3").css('display' , 'inline-block');
   $(this).hide();
});

    $(".display-btn-3").click(function (e) {
        e.preventDefault();
        $(".display-img-3").removeClass();
        $(this).hide();
        $(".display-btn-4").css('display' , 'inline-block');

    });
    $(".display-btn-4").click(function (e) {
        e.preventDefault();
        $(".display-img-4").removeClass();
        $(this).fadeOut();
    });

});

