/*
|--------------------------------------------------------------------------
| Modal Load - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

import axios from 'axios'
window.axios = axios;

export default class ModalLoad {

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

    // Get the body of the modal
    this.body = el.querySelector('.modal-body');

    // Create options by extending defaults with the passed in arugments
    this.options = this.setOptions(options);

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Set the options
   *
   * @param {object} options Option that you want to overide
   * @return {object} The new option object.
   */
  setOptions(options) {

    // Variables that you can set as options
    const defaultOptions = {
      loadCallback(e){} // Callback function
    }

    // Update the options
    for (let option in options) {
      if (options.hasOwnProperty(option)) {
        defaultOptions[option] = options[option];
      }
    }

    // Return the object
    return defaultOptions;

  }

  /**
   * Init the Modal Load
   */
  init() {

    this.el.addEventListener('show.bs.modal', event => {
      let button = event.relatedTarget
      let action = typeof(button) !== 'undefined' ? button.getAttribute('data-action') : null;

      console.log(action);

      axios({
          method: 'get',
          url: action,
      }).then((response)=>{
          this.body.innerHTML = response.data;
          this.options.loadCallback();
      }).catch((error)=>{
          console.log(error);
      });

    });
  }

}

