/*
|--------------------------------------------------------------------------
| Modal Confirm - Script
|--------------------------------------------------------------------------
*/

// Open Confirm Modal
var confirmModals = document.querySelectorAll('.modal-confirm');

confirmModals.forEach((modal, i) => {

  $(modal).on('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    var form = modal.querySelector('form');

    if(action != null)
    {
      form.action = action;
    }

    form.onsubmit = function(e) {
      var loading = modal.querySelector('.spinner-border');
      loading.classList.remove('d-none');
    }
  });

  /*
  modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var action = button.getAttribute('data-action');
    var form = modal.querySelector('form');

    if(action != null)
    {
      form.action = action;
    }

    form.action = action;
    form.onsubmit = function(e) {
      var loading = modal.querySelector('.spinner-border');
      loading.classList.remove('d-none');
    }
  })
  */

});
