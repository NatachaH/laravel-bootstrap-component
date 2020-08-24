/*
|--------------------------------------------------------------------------
| Modal Confirm - Script
|--------------------------------------------------------------------------
*/

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
confirmModals.forEach((modal, i) => {
  modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    var form = modal.querySelector('form');
    form.action = action;
    form.onsubmit = function(e) {
      var loading = modal.querySelector('.spinner-border');
      loading.classList.remove('d-none');
    }
  })

});
