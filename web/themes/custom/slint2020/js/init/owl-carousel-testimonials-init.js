(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.mtowlCarouselTestimonials = {
    attach: function (context, settings) {
      $(context).find('.mt-carousel-testimonials').once('mtowlCarouselTestimonialsInit').each(function() {
        $(this).owlCarousel({
          items: 1,
          autoplay: drupalSettings.slint2020.owlCarouselTestimonialsInit.owlTestimonialsAutoPlay,
          autoplayTimeout: drupalSettings.slint2020.owlCarouselTestimonialsInit.owlTestimonialsEffectTime,
          nav: true,
          dots: false,
          loop: false,
          navText: false
        });
      });
    }
  };
})(jQuery, Drupal, drupalSettings);
