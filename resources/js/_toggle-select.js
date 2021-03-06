/*
|--------------------------------------------------------------------------
| Toggle Select - script
|--------------------------------------------------------------------------
*/

(function() {

  this.ToggleSelect = function(el,options = null) {

      // Variables
      this.select = el;

      var defaults = {
        field        : 'option', // Could be option or group label
        parent       : el.parentNode.parentNode,
        onChanged    : function(e){}, // Callback function
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options)

      this.init();

  };

  ToggleSelect.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

  // Init
  ToggleSelect.prototype.init = function()
  {
      var toggleSelect = this;

      //Hide/Show at render page
      toggleSelect.change();

      // Hide/Show when change the switch
      toggleSelect.select.addEventListener('change',function(e){
          toggleSelect.change();
      },false);
  }

  // Change the switch
  ToggleSelect.prototype.change = function()
  {
      var toggleSelect = this;
      var divs = toggleSelect.options.parent.querySelectorAll('[class^="toggle-select-"],[class*=" toggle-select-"]');
      var option = toggleSelect.select.options[toggleSelect.select.selectedIndex];
      var group  = option.parentNode.label ? option.parentNode.label.toLowerCase() : null;
      var value = toggleSelect.options.field == 'group' ? group : option.value;

      // Toggle each div
      divs.forEach((div, i) => {
          toggleSelect.toggle(div,value);
      });

      // Run the custom callback
      toggleSelect.options.onChanged(value);
  }

  // Change the switch
  ToggleSelect.prototype.toggle = function(div,value)
  {
      var isVisible = div.classList.contains('toggle-select-'+value);
      var inputs = div.querySelectorAll('select,textarea,input:not([type="hidden"],[type="checkbox"],[type="radio"])');

      // Toggle the visible div
      isVisible ? div.classList.remove('d-none') : div.classList.add('d-none');

      // Toggle the required inputs
      if(inputs)
      {
        this.required(inputs,isVisible);
      }
  }

  // Disable the input, select and co
  ToggleSelect.prototype.required = function(elements,show)
  {
      elements.forEach((el, i) => {
        var parent = el.parentNode;
        if(show)
        {
            if(parent.classList.contains('field-required')) { el.required = true; }
        } else {
            el.value = null;
            if(parent.classList.contains('field-required')) { el.required = false; }
        }
      });
  }

}());

// Init the ToggleSwitch to each .table-tree
var selects = document.querySelectorAll('.toggle-select');
Array.prototype.forEach.call(selects, function(el, i) {
    var mySelect = new ToggleSelect(el);
});
