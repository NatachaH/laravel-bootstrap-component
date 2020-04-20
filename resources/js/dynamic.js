/*
|--------------------------------------------------------------------------
| Dynamic javascript
|--------------------------------------------------------------------------
|
| Copyright © 2019 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/


// DYNAMIC MODULE
(function() {

  // Define the module
  this.Dynamic = function(el,options = null) {

      // Variables
      this.el = null;
      this.key = 0;
      this.min = 0;
      this.max = 0;
      this.nbr = function(){
          return this.el.querySelectorAll('.dynamic-item:not(.dynamic-item-delete)').length;
      };
      this.checkMin = function(){
          var nbr = this.nbr() - 1;
          return this.min == null || nbr >= this.min;
      };
      this.checkMax = function(){
          var nbr = this.nbr() + 1;
          return this.max == null || nbr <= this.max;
      };

      // Define option defaults
      var defaults = {
          addCallback: function(e){}
      };

      // Create options by extending defaults with the passed in arugments
      var customOptions = (options && typeof options === "object" ? options : null );
      this.options = this.setOption(defaults, options);

      // Init variables and number of inputs
      this.el = el ? el : '.dynamic';
      this.init();

      var dynamicObject = this;

      // On Click
      this.el.addEventListener('click',function(e){

          var btn = e.target.closest('.btn');

          // Add
          if(btn !== null && btn.classList.contains('dynamic-add')){
            dynamicObject.add();
          }

          // Remove
          if(btn !== null && btn.classList.contains('dynamic-remove')){
            var item = e.target.closest('.dynamic-item');
            dynamicObject.remove(item);
          }

      });

      // On Change
      this.el.addEventListener('change',function(e){

          // Delete current dynamic (Toggle checkbox)
          if(e.target.classList.contains('dynamic-delete')){
            var item = e.target.closest('.dynamic-item');
            dynamicObject.delete(item,e.target.checked);
          }

      });

  }

  //------  METHODS ------//

  // Init
  Dynamic.prototype.init = function()
  {
      var min = this.el.getAttribute('data-min');
      var max = this.el.getAttribute('data-max');

      this.key = this.el.querySelectorAll('.dynamic-item').length;
      this.min = min !== '' ? min : null;
      this.max = max !== '' ? max : null;

      // Init the enable/disable buttons
      this.buttons();

      // Create empty row if min < nbr
      if(this.nbr() < this.min)
      {
          var nbr = this.min - this.nbr();
          for(var i = 1; i <= nbr; i++ )
          {
            this.add();
          }

      }
  }


  // SetOptions
  Dynamic.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

  // Disable buttons
  Dynamic.prototype.buttons = function()
  {
      // Disabled the Add button
      var addBtn = this.el.querySelector('.dynamic-add');
      if(addBtn !== null)
      {
        addBtn.disabled = !this.checkMax();
      }

      // Disabled the Remove buttons
      var removeBtns = this.el.querySelectorAll('.dynamic-remove');
      if(removeBtns !== null)
      {
          var isDisabled = !this.checkMin();
          Array.prototype.forEach.call(removeBtns, function(el, i) {
              el.disabled = isDisabled;
          });
      }
  }


  // Add
  Dynamic.prototype.add = function()
  {
      if(this.checkMax())
      {
          var template = this.el.querySelector('script[data-template="dynamic-template"]').innerHTML.replace(/KEY/g,this.key++);
          var div = document.createElement('div');
          div.innerHTML = template;
          this.el.querySelector('.dynamic-list').append(div.children[0]);
      }

      this.buttons();
  }

  // Remove
  Dynamic.prototype.remove = function(item)
  {
      if(this.checkMin())
      {
          item.remove();
      }
      this.buttons();
  }

  // Remove
  Dynamic.prototype.delete = function(item,checked)
  {
      if (checked) {
          item.classList.add('dynamic-item-delete');
          item.querySelectorAll('input:not(.dynamic-delete)').forEach(function(input){
            input.disabled=true;
          });
      } else {
          item.classList.remove('dynamic-item-delete');
          item.querySelectorAll('input:not(.dynamic-delete)').forEach(function(input){
            input.disabled=false;
          });
      }

      // Check if max and remove input if needed
      if(this.max)
      {
          var nbr = this.nbr() - this.max;
          for (var i = 0; i < nbr; i++) {
              var item = this.el.querySelector('.dynamic-list').lastElementChild;
              this.remove(item);
          }
      }

      // Check if min and add input if needed
      if(this.min)
      {
          var nbr = this.min - this.nbr();
          for (var i = 0; i < nbr; i++) {
              this.add();
          }
      }

      this.buttons();
  }

}());


// Init the Dynamic to each .dynamic
var dynamic = document.querySelectorAll('.dynamic');
Array.prototype.forEach.call(dynamic, function(el, i) {
    var myDynamic = new Dynamic(el);
});
