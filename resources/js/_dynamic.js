/*
|--------------------------------------------------------------------------
| Dynamic - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
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
          addCallback: function(e){},
          removeCallback: function(e){}
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options);

      // Init variables and number of inputs
      this.el = el ? el : '.dynamic';
      this.init();

      var dynamicObject = this;

      // Add
      this.el.querySelector('.dynamic-add').addEventListener('click',function(e){
        dynamicObject.add();
      });

      // Delete
      var currents = this.el.querySelectorAll('.dynamic-item-current');
      currents.forEach((el, i) => {
        el.querySelector('.dynamic-delete').addEventListener('click',function(e){
          e.preventDefault();
          var parent = e.target.closest('.dynamic-item-btn');
          var input = parent.querySelector('.dynamic-delete-checkbox');
          input.checked = !input.checked;
          dynamicObject.delete(el,input.checked);
        });
      });

      // Remove
      var olds = this.el.querySelectorAll('.dynamic-item-old');
      olds.forEach((el, i) => {
        el.querySelector('.dynamic-remove').addEventListener('click',function(e){
          dynamicObject.remove(el);
        });
      });

  }

  //------  METHODS ------//

  // Init
  Dynamic.prototype.init = function()
  {
      var min = this.el.getAttribute('data-min');
      var max = this.el.getAttribute('data-max');

      this.key = this.el.querySelectorAll('.dynamic-item').length;
      this.min = min != '' && min != 0 ? min : 1;
      this.max = max != '' && max != 0 ? max : null;

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
          removeBtns.forEach((el, i) => {
              el.disabled = isDisabled;
          });
      }
  }


  // Add
  Dynamic.prototype.add = function()
  {
      if(this.checkMax())
      {
          var dynamicObject = this;
          var template = this.el.querySelector('script[data-template="dynamic-template"]').innerHTML.replace(/KEY/g,this.key++);
          var div = document.createElement('div');
          div.innerHTML = template;
          var item = div.children[0];
          this.el.querySelector('.dynamic-list').append(item);
          this.options.addCallback(item);
          item.querySelector('.dynamic-remove').addEventListener('click',function(e){
            dynamicObject.remove(item);
          });

      }

      this.buttons();
  }

  // Remove
  Dynamic.prototype.remove = function(item)
  {
      if(this.checkMin())
      {
          item.remove();
          this.options.removeCallback(item);
      }
      this.buttons();
  }

  // Delete
  Dynamic.prototype.delete = function(item,checked)
  {
      if (checked) {
          item.classList.add('dynamic-item-delete');
          item.querySelectorAll('input:not(.dynamic-delete-checkbox),select:not(.dynamic-delete-checkbox),textarea:not(.dynamic-delete-checkbox)').forEach(function(input){
            input.disabled=true;
          });
      } else {
          item.classList.remove('dynamic-item-delete');
          item.querySelectorAll('input:not(.dynamic-delete-checkbox),select:not(.dynamic-delete-checkbox),textarea:not(.dynamic-delete-checkbox)').forEach(function(input){
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

// Init the Dynamic to each .dynamic-automatic
var dynamic = document.querySelectorAll('.dynamic-automatic');
dynamic.forEach((el, i) => {
    var myDynamic = new Dynamic(el);
});
