/*
|--------------------------------------------------------------------------
| Datalist - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

// Datalist MODULE
(function() {

  // Define the module
  this.Datalist = function(el) {

    this.input  = el;
    this.parent = el.closest('div');
    this.list   = this.parent.querySelector('datalist');
    this.hidden = this.parent.querySelector('.datalist-hidden-field');

    var datalistObject = this;

    this.input.addEventListener('change',function(e){
      e.preventDefault();
      var value  = datalistObject.input.value;
      var option = datalistObject.list.querySelector('option[value="'+value+'"]');
      var hiddenValue = option != null ? option.getAttribute('data-value') : null;
      datalistObject.hidden.value = hiddenValue;
    });

  }

}());

// Init the Datalist to each .Datalist-automatic
var datalists = document.querySelectorAll('.datalist-with-hidden');
datalists.forEach((el, i) => {
    var myDatalist = new Datalist(el);
});
