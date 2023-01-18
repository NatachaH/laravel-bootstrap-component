/*
|--------------------------------------------------------------------------
| Table link - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class TableLink {

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

    // Get the rows
    this.rows = el.querySelectorAll('tbody tr');

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Init the Table Link
   */
  init() {

    this.rows.forEach(row => {
      row.addEventListener('click', event => {
        if(!event.target.classList.contains('table-link-disable'))
        {
          var action = row.getAttribute('data-url') ?? null;
          window.location = action;
        }
      });
    });

  }

}

