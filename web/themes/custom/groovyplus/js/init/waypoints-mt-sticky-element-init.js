(function ($, Drupal) {
  Drupal.behaviors.mtWaypointsStickyElement = {
    attach: function (context, settings) {

      //The admin overlay menu height
      var toolbarHeight = parseInt($('body').css('paddingTop'));
      var offsetValue = toolbarHeight + 10;

      var inview = new Waypoint.Inview({
        element: $('.main-content__container')[0],
        entered: function(direction) {
          if (direction == "up") {
            $('body').removeClass('mt-sticky-element-enabled');
          }
        },
        exit: function(direction) {
          if (direction == "down") {
            $('body').addClass('mt-sticky-element-enabled');
          }
        },
        offset: offsetValue
      });
    }
  };
})(jQuery, Drupal);
