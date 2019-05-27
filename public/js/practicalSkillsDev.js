$('.carousel').carousel({
     interval: 5000 //changes the speed
 })

function sticky_relocate() {
 var window_top = $(window).scrollTop();
 var div_top = $('#sticky-ancho').offset().top;
 if (window_top > div_top) {
     $('#sticky').addClass('stick');
     $('#sticky-ancho').height($('#sticky').outerHeight());
 } else {
     $('#sticky').removeClass('stick');
     $('#sticky-ancho').height(0);
 }
}

$(function() {
 $(window).scroll(sticky_relocate);
 sticky_relocate();
});
