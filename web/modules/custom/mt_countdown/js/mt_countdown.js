/*
 * MTCountDown scripts
 *  Add any module related script here
 */
(function ($, Drupal, drupalSettings) {

  Drupal.behaviors.mtCountdown = {
    attach: function (context, settings) {
      $(context).find('.mt-count-down-slot').once('mtCountdownInit').each(function() {
        var expiration_date = $(this).attr('data-attribute-mt-date') || drupalSettings.mt_countdown.expiration_date;
        // Start countdown script.
        $(this).countdown(expiration_date, function(event) {
          $(this).html(event.strftime('' +
            '<span class="mt-time"><span class="mt-count">%D</span> <span class="mt-label">day%!d</span></span> ' +
            '<span class="mt-time"><span class="mt-count">%H</span> <span class="mt-label">hours</span></span> ' +
            '<span class="mt-time"><span class="mt-count">%M</span> <span class="mt-label">minutes</span></span> ' +
            '<span class="mt-time"><span class="mt-count">%S</span> <span class="mt-label">seconds</span></span>'));
        });
      });
    }
  };
})(jQuery, Drupal, drupalSettings);
