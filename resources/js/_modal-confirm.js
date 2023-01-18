/*
|--------------------------------------------------------------------------
| Modal Confirm - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class ModalConfirm {

  /**
   * Creates an instance
   *
   * @author: Natacha Herth
   * @param {object} el The element
   * @param {object} options Options that you can overide
   */
  constructor(el,options = null){

    // Get the element
    this.el = el;

    // Get the form in the modal
    this.form = el.querySelector('form');

    // Get the loading in the modal
    this.lodaing = el.querySelector('.spinner-border');

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Init the Modal Confirm
   */
  init() {

    this.el.addEventListener('show.bs.modal', event => {
     
      var button = event.relatedTarget
      var action = typeof(button) !== 'undefined' ? button.getAttribute('data-action') : null;

      // Set the action
      if(action != null)
      {
        this.form.action = action;
      }

      // Event on submit the form
      this.form.onsubmit = () => {
        this.loading.classList.remove('d-none');
      }

    });
  }

}

