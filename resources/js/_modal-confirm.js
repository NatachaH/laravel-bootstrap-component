/*
|--------------------------------------------------------------------------
| Modal Confirm - Script
|--------------------------------------------------------------------------
*/

// Open Confirm Modal
var confirmModals = document.querySelectorAll('.modal-confirm');

confirmModals.forEach((modal, i) => {

  modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var action = typeof(button) !== 'undefined' ? button.getAttribute('data-action') : null;
    var form = modal.querySelector('form');

    if(action != null)
    {
      form.action = action;
    }

    form.onsubmit = function(e) {
      var loading = modal.querySelector('.spinner-border');
      loading.classList.remove('d-none');
    }
  })

});
