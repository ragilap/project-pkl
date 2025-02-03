// /**
//  * UI Tooltips & Popovers
//  */

'use strict';

(function () {
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    // added { html: true, sanitize: false } option to render button in content area of popover
    return new bootstrap.Popover(popoverTriggerEl, { html: true, sanitize: false });
  });
})();

//toogle pop up
  function togglePopup(event) {
    var container = document.querySelector('.bubble-container');
    container.classList.toggle('active');

    var popupContainer = document.querySelector('.popup-container');
    if (container.classList.contains('active')) {
        popupContainer.style.display = 'block';
    } else {
        popupContainer.style.display = 'none';
    }

    event.stopPropagation(); // Hindari propagasi ke document click event
}

document.addEventListener('click', function(event) {
    var container = document.querySelector('.bubble-container');
    if (!container.contains(event.target)) {
        container.classList.remove('active');
        var popupContainer = document.querySelector('.popup-container');
        popupContainer.style.display = 'none';
    }
});
