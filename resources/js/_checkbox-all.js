/*
|--------------------------------------------------------------------------
| Checkbox All - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class CheckboxAll {

  /**
   * Creates an instance
   *
   * @author: Natacha Herth
   * @param {object} parent The element
   * @param {object} options Options that you can overide
   */
  constructor(parent){

    // Get the parent => checkbox with .checkbox-all class
    this.parent = parent;

    // Get all the children by class
    const childrenClass = parent.value; // Is the value of the checkbox-all 
    this.children = document.querySelectorAll('.checkbox-'+childrenClass+' input:not(:disabled)');

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Init the Checkbox All
   */
  init() {

    this.toggleParent();

    // On toggle the parent 
    this.parent.addEventListener('change', event => this.toggleChildren(event.target.checked));

    // On toggle a child
    this.children.forEach(child => child.addEventListener('change', event => this.toggleParent()));

  }

  /**
   * Toggle the children
   * @param {boolean} value The value of the checkboxes
   */
  toggleChildren(value) {

    this.children.forEach(child => child.checked = value);

  }

  /**
   * Toggle the parent checkbox
   */
  toggleParent() {

    let isChecked = false;

    for(let i=0;i<this.children.length; ++i)
    {
        if(!this.children[i].checked)
        {
          isChecked = false;
          break;
        }
        isChecked = true;
    }

    this.parent.checked = isChecked;

  }

}

