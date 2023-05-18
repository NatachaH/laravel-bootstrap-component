/*
|--------------------------------------------------------------------------
| Toggle Select - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class ToggleSelect {

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
    this.parent = el.closest('form');

    // Get the input
    this.select = el.querySelector('select');

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
      field        : 'option', // Could be option or group label
      changeOnInit : true, // Make a change() on the init 
      resetFormWhenHidden: true, // Make form fields as null when hidden
      disabledFormWhenHidden : true, // Make form fields disabled in case you need to not send the fields to not send the fields when they are hidden
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
   * Init the Toggle Select
   */
  init() {

    //Hide or show at render page
    if(this.options.changeOnInit)
    {
      this.change();
    }

    // Hide/Show when change the select
    this.select.addEventListener('change', () => this.change(), false);

  }

  /**
   * Event when toggle Change
   */
  change() {

    const divs = this.parent.querySelectorAll('[class^="toggle-select-"],[class*=" toggle-select-"]');
    const selectOption = this.select.options[this.select.selectedIndex];
    let value;

    if(this.options.field == 'group')
    {
      value = selectOption.parentNode.label ? selectOption.parentNode.label.toLowerCase() : null;
    } else {
      value = selectOption.value;
    }

    // Toggle each div
    divs.forEach(div => {
      const isVisible = div.classList.contains('toggle-select-'+value);
      const inputs = div.querySelectorAll('select,textarea,input:not([type="hidden"],[type="checkbox"],[type="radio"])');

      // Toggle the visible div
      isVisible ? div.classList.remove('d-none') : div.classList.add('d-none');

      // Toggle the inputs
      if(inputs)
      {
        this.toggleForm(inputs,isVisible);
      }

    });

    // Run the custom callback
    this.options.onChanged(value);

  }

  /**
   * Toggl element when change the select
   * @param {array} inputs 
   * @param {boolean} isVisible 
   */
  toggleForm(inputs,isVisible) {

    inputs.forEach(input => {

        const parent = input.parentNode;

        // Make them required
        if(parent.classList.contains('field-required'))
        {
          input.required = isVisible ? true : false;
        }

        // Make them null
        if(this.options.resetFormWhenHidden)
        {
          input.value = null;
        }

        // Make them disabled
        if(this.options.disabledFormWhenHidden)
        {
          input.disabled = isVisible ? false : true;
        }
      
    });
    
  }

}

