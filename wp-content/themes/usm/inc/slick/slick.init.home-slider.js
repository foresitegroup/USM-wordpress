$(document).ready(function(){
  $('.insert-page-home-slider').slick({
    appendArrows: $('.insert-page-home-slider'),
    prevArrow: '<a href="#" class="slick-prev"></a>',
    nextArrow: '<a href="#" class="slick-next"></a>',
    dots: true,
    dotsClass: 'home-slider-menu',
    customPaging: function (slider, i) {
      var title = $(slider.$slides[i]).find('.home-slider-text h2').text();
      return title;
    },
    draggable: false,
    infinite: false
  });
});