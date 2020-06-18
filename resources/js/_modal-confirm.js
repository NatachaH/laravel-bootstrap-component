/*
|--------------------------------------------------------------------------
| SP - Backend - Modal - Script
|--------------------------------------------------------------------------
*/

// Open Confirm Modal
var confirmModals = document.getElementsByClassName('modal-confirm');
Array.prototype.forEach.call(confirmModals, function(modal) {

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
