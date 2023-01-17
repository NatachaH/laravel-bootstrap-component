/*
|--------------------------------------------------------------------------
| Table Link - Script
|--------------------------------------------------------------------------
*/

// Table Link MODULE
(function() {

  // Define the module
  window.TableLink = function(el,options = null) {

      // Variables
      this.table = el;
      this.rows = el.querySelectorAll('tbody tr');

      // Define option defaults
      var defaults = {};

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options);

      // Init
      this.init();

  }

  //------  METHODS ------//

  // Init
  TableLink.prototype.init = function()
  {
        var myObject = this;

        myObject.rows.forEach((row, i) => {
          row.addEventListener('click',function(event){
            if(!event.target.classList.contains('table-link-disable'))
            {
              var action = this.getAttribute('data-url') ?? null;
              window.location = action;
            }
          });
        });
  }


  // SetOptions
  TableLink.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

}());

// Init the Table Link to each .table-link
var tableLinks = document.querySelectorAll('.table-link');
tableLinks.forEach((el, i) => {
    var myTable = new TableLink(el);
});
