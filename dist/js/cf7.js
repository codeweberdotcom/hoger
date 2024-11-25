document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.wpcf7-form');
  const submitButton = form.querySelector('button[type="submit"]');
  form.addEventListener('submit', function (e) {
    submitButton.disabled = true;
    document.addEventListener('wpcf7submit', function () {
      submitButton.disabled = false;
    });
    document.addEventListener('wpcf7invalid', function () {
      submitButton.disabled = false;
    });
    document.addEventListener('wpcf7spam', function () {
      submitButton.disabled = false;
    });
    document.addEventListener('wpcf7mailsent', function () {});
    document.addEventListener('wpcf7mailfailed', function () {
      submitButton.disabled = false;
    });
  });
});