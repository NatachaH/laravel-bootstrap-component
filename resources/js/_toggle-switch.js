/*
|--------------------------------------------------------------------------
| Toggle Switch - script
|--------------------------------------------------------------------------
*/

(function() {

  this.ToggleSwitch = function(el,options = null) {

      // Variables
      this.input = el.querySelector('input[type="checkbox"]');
      this.parent = el.parentNode;
      this.elToDisplayIfChecked = this.parent.querySelectorAll('.toggle-switch-true');
      this.elToDisplayIfNotChecked = this.parent.querySelectorAll('.toggle-switch-false');

      var defaults = {
        onChanged    : function(e){} // Callback function
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options)

      this.init();

  };

  ToggleSwitch.prototype.setOption = function(source, properties)
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
  ToggleSwitch.prototype.init = function()
  {

      var toggleSwitch = this;

      //Hide/Show at render page
      toggleSwitch.change();

      // Hide/Show when change the switch
      toggleSwitch.input.addEventListener('change',function(e){
          toggleSwitch.change();
      },false);

  }

  // Change the switch
  ToggleSwitch.prototype.change = function()
  {
      var toggleSwitch = this;
      var isChecked = toggleSwitch.input.checked;

      toggleSwitch.elToDisplayIfChecked.forEach(function(el){
        isChecked ? el.classList.remove('d-none') : el.classList.add('d-none');
        toggleSwitch.disabled(el,!isChecked);
      });

      toggleSwitch.elToDisplayIfNotChecked.forEach(function(el){
        isChecked ? el.classList.add('d-none') : el.classList.remove('d-none');
        toggleSwitch.disabled(el,isChecked);
      });

      // Run the custom callback
      toggleSwitch.options.onChanged(isChecked);
  }

  // Disable the input, select and co
  ToggleSwitch.prototype.disabled = function(element,disabled)
  {
      var inputs = element.querySelectorAll('input:not(.is-disabled),textarea:not(.is-disabled),select:not(.is-disabled)');
      inputs.forEach(function(el){
        el.disabled = disabled;
      });

  }

}());


// Init the ToggleSwitch to each .table-tree
var switchs = document.querySelectorAll('.toggle-switch');
Array.prototype.forEach.call(switchs, function(el, i) {
    var mySwitch = new ToggleSwitch(el);
});
