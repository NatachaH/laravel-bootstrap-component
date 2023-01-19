/*
|--------------------------------------------------------------------------
| Table Tree - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

export default class TableTree {

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

    // Get the rows of the table
    this.rows = el.querySelectorAll('tbody tr');

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Init the Table Tree
   */
  init() {

    this.rows.forEach(el => {
      
      const toggle = el.querySelector('.toggle-children');

      if(toggle)
      {
        toggle.addEventListener('click', () => {

          // Get the row
          const row = e.target.closest('tr');

          // Toggle the icon
          this.toggleIcon(toggle);

          // Open or close children
          if(row.classList.contains('expand'))
          {
            this.contract(row);
          } else {
            this.expand(row);
          }

        } ,false);
      }

    });
  
  }

  /**
   * Toggle the icon
   * @param {object} td
   */
  toggleIcon(td) {

    // Get the icon
    var icon = td.querySelector(' i');

    if(icon !== null)
    {
        // Toggle the classes
        icon.classList.toggle('icon-chevron-right');
        icon.classList.toggle('icon-chevron-down');
    }

  }

  /**
   * Expand a row
   * @param {object} row
   */
  expand(row) {

    // Get the children by parent id
    var children = this.el.querySelectorAll('tr[data-parent="'+(row.getAttribute('data-id'))+'"]');

    // Add the class to the row
    row.classList.add('expand');

    // Open each children
    children.forEach(child => child.classList.add('show'));

  }

  /**
   * Contract a row
   * @param {object} row
   */
  contract(row) {

    // Get the children by parent id
    var children = this.el.querySelectorAll('tr[data-parent="'+(row.getAttribute('data-id'))+'"]');

    // Remove the class to the row
    row.classList.remove('expand');

    // Close each children
    children.forEach(child => {
      child.classList.remove('show');
      this.contract(child);
    });

  }

}
