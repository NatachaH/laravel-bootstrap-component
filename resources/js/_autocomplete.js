/*
|--------------------------------------------------------------------------
| Autocomplete - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

import axios from 'axios'
window.axios = axios;

export default class Autocomplete {

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
    this.input = el.querySelector('input');

    // Get the datas
    this.datas = null;

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
      url          : this.el.getAttribute('data-url'),       // Load datalist options via Axios
      field        : this.el.getAttribute('data-field'),     // Field to use for the option value
      datalist     : this.el.querySelector('datalist'),      // The datalist object
      hidden       : {
          input : this.el.querySelector('.input-hidden'),    // Input hidden
          field : this.el.getAttribute('data-hidden-field'), // Field to use for the hidden value
      },
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
   * Init the Autocomplete
   */
  init() {

    // Load datas via AXIOS
    if(this.options.url) { this.load();  }

    console.log(this.options.url);

    // If datalist is a different than the default, change the list attribute
    if(this.options.datalist.getAttribute('id') !== this.input.getAttribute('list'))
    {
        this.input.setAttribute('list',this.options.datalist.getAttribute('id'));
    }

    // Callback when input change
    this.input.addEventListener('change', e => {
        e.preventDefault();

        // Check if an option is selected
        const option = this.options.datalist.querySelector('option[value="'+e.target.value+'"]');
        const selected = option ? JSON.parse(option.getAttribute('data-json')) : null;

        // If hidden input set the value
        if(this.options.hidden.input)
        {
          this.options.hidden.input.value = option ? option.getAttribute('data-value') : null;
        }

        // Run the custom callback
        this.options.onChanged(selected);
    });

  }

  /**
   * Load via Axios the datas
   */
  load() {

    axios({
      method: 'post',
      url: this.options.url,
    }).then((response)=>{

      // Set the JSON datas
      this.datas = response.data;

      // Create the datalist options
      this.createOptions();

    }).catch((error)=>{
      console.log(error);
    });

  }

  /**
   * Create the options list
   */
  createOptions() {

    this.datas.forEach(item => {
        const option = document.createElement('option');
        const value  = item[this.options.field] ?? null;
        const hidden = item[this.options.hidden.field] ?? null;
        option.setAttribute('value',value);
        option.setAttribute('data-value', hidden);
        option.setAttribute('data-json',JSON.stringify(item));
        option.innerHTML = value;
        this.options.datalist.appendChild(option);
    });

  }


}

