/*
|--------------------------------------------------------------------------
| Modal Load - Script
|--------------------------------------------------------------------------
*/

// Open Modal
var modals = document.querySelectorAll('.modal-load');

modals.forEach((modal, i) => {

  modal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget
    var action = typeof(button) !== 'undefined' ? button.getAttribute('data-action') : null;
    var body = modal.querySelector('.modal-body');

    axios({
        method: 'get',
        url: action,
    }).then((response)=>{
        body.innerHTML = response.data;
    }).catch((error)=>{});

  })

});
