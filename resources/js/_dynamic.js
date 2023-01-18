/*
|--------------------------------------------------------------------------
| Dynamic - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class Dynamic {

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

    // Dynamic key for the elements
    this.key = this.el.querySelectorAll('.dynamic-item').length ?? 0;

    // Get the min elements available
    this.minData = parseInt(this.el.getAttribute('data-min'));
    this.min = this.minData != 0 ? this.minData : 1;

    // Get the max elements available
    this.maxData = parseInt(this.el.getAttribute('data-max'));
    this.max = this.maxData != 0 ? this.maxData : null;

    // Get the add button
    this.addBtn = el.querySelector('.dynamic-add'); 

    // Get the removes buttons
    this.removeBtns = el.querySelectorAll('.dynamic-remove');

    // Get old rows
    this.oldRows = el.querySelectorAll('.dynamic-item-old');

    // Get current rows
    this.currentRows = el.querySelectorAll('.dynamic-item-current');

    // Get the template
    this.template = el.querySelector('script[data-template="dynamic-template"]');

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
      addCallback(e){}, // Callback function for the add method
      removeCallback(e){} // Callback function for the remove method
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
   * Init the Dynamic
   */
  init() {

    // Init the enable/disable buttons
    this.toggleButtons();

    // Create empty row if min < nbr
    if(this.getNumber() < this.min)
    {
        for(let i = 1; i <= (this.min - this.getNumber()); i++ )
        {
          this.add();
        }
    }

    // Add Event
    this.addBtn.addEventListener('click', () => this.add());

    // Remove Event
    this.oldRows.forEach(el => {
      el.querySelector('.dynamic-remove').addEventListener('click', () => this.remove(el));
    });

    // Delete Event
    this.currentRows.forEach(el => {
      el.querySelector('.dynamic-delete').addEventListener('click', e => {
        e.preventDefault();
        let input = e.target.closest('.dynamic-item-btn').querySelector('.dynamic-delete-checkbox');
        input.checked = !input.checked;
        this.delete(el,input.checked);
      });
    });

  }

  /**
   * Get the number of elements
   * @return {number} The number of object.
   */
  getNumber() {
    return this.el.querySelectorAll('.dynamic-item:not(.dynamic-item-delete)').length;
  }

  /**
   * Check the minimum
   * @return {boolean} 
   */
  checkMin() {
    return this.min == null || (this.getNumber() - 1) >= this.min;
  }

  /**
   * Check the maximum
   * @return {boolean}
   */
  checkMax() {
    return this.max == null || (this.getNumber() + 1) <= this.max;
  }

  /**
   * Toggle buttons
   */
  toggleButtons() {

    // Disabled the add button if is max
    if(this.addBtn)
    {
      this.addBtn.disabled = !this.checkMax();
    }

    // Disabled the remove buttons if not the minimum
    if(this.removeBtns)
    {
      this.removeBtns.forEach(removeBtn => removeBtn.disabled = !this.checkMin())
    }

  }

  /**
   * Add a row
   */
  add() {
    
    if(this.checkMax())
      {

          // Get the template and replace the key
          const template = this.template.innerHTML.replace(/KEY/g,this.key++);

          // Create a new row
          const div = document.createElement('div')
          div.innerHTML = template;
          const newRow = div.children[0];

          // Append the new row to the list
          this.el.querySelector('.dynamic-list').append(newRow);

          // Add the event listener for the remove btn
          newRow.querySelector('.dynamic-remove').addEventListener('click', () => this.remove(newRow));

          // Make the custom add callback
          this.options.addCallback(newRow);

      }

      this.toggleButtons();

  }

  /**
   * Remove a row
   * @param {object} row The row to remove
   */
  remove(row) {
    
    if(this.checkMin())
    {
        row.remove();
        this.options.removeCallback(row);
    }

    this.toggleButtons();

  }

  /**
   * Delete a row
   * @param {object} row The row to delete
   * @param {boolean} checked The checkbox is checked
   */
  delete(row,checked) {
    
    const formFields = row.querySelectorAll('input:not(.dynamic-delete-checkbox),select:not(.dynamic-delete-checkbox),textarea:not(.dynamic-delete-checkbox)');

    if (checked) {
        row.classList.add('dynamic-item-delete');
        formFields.forEach(field => field.disabled=true);
    } else {
        row.classList.remove('dynamic-item-delete');
        formFields.forEach(field => field.disabled=false);
    }

    // Check if max and remove input if needed
    if(this.max)
    {
        for (let i = 0; i < (this.getNumber() - this.max); i++) {
            var row = this.el.querySelector('.dynamic-list').lastElementChild;
            this.remove(row);
        }
    }

    // Check if min and add input if needed
    if(this.min)
    {
        for (let i = 0; i < (this.min - this.getNumber()); i++) {
            this.add();
        }
    }

    // Toggle the buttons
    this.toggleButtons();

  }

}

