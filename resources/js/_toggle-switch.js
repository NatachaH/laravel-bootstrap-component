/*
|--------------------------------------------------------------------------
| Toggle Switch - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class ToggleSwitch {

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

    // Get the parent
    this.parent = el.parentNode;

    // Get the input
    this.input = el.querySelector('input[type="checkbox"]');

    // Get the elements to display if checked
    this.elToDisplayIfChecked = this.parent.querySelectorAll('.toggle-switch-true');

    // Get the elements to display if NOT checked
    this.elToDisplayIfNotChecked = this.parent.querySelectorAll('.toggle-switch-false');

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
      changeOnInit : true, // Make a change() on the init 
      onChanged(e){} // Callback function
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
   * Init the Toggle Switch
   */
  init() {

    // Hide and show at render page
    if(this.options.changeOnInit)
    {
      this.change()
    }

    // Hide/Show when change the switch
    this.input.addEventListener('change', () => this.change(), false);

  }

  /**
   * Event when toggle Change
   */
  change() {

    let isChecked = this.input.checked;

    // Display the elements
    this.elToDisplayIfChecked.forEach(el => {
      isChecked ? el.classList.remove('d-none') : el.classList.add('d-none');
      this.disabled(el,!isChecked);
    });

    // Hide the elements
    this.elToDisplayIfNotChecked.forEach(el => {
      isChecked ? el.classList.add('d-none') : el.classList.remove('d-none');
      this.disabled(el,isChecked);
    });

    // Run option callback
    this.options.onChanged(isChecked);

  }

  /**
   * Set the options
   *
   * @param {object} el Node element
   * @param {boolean} disabled Is disabled or not
   */
  disabled(el,disabled) {

    let inputs = el.querySelectorAll('input:not(.is-disabled),textarea:not(.is-disabled),select:not(.is-disabled)');
    inputs.forEach(el => el.disabled = disabled);

  }

}

