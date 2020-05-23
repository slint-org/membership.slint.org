jQuery(document).ready(function($) {
  var deferredPrompt;
  window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
    deferredPrompt.prompt();
  });
});
