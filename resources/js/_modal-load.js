/*
|--------------------------------------------------------------------------
| Modal Load - Script
|--------------------------------------------------------------------------
*/

// Modal load MODULE
(function() {

  // Define the module
  this.ModalLoad = function(el,options = null) {

      // Variables
      this.modal = el;

      // Define option defaults
      var defaults = {
          loadCallback: function(e){},
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options);

      // Init
      this.init();

  }

  //------  METHODS ------//

  // Init
  ModalLoad.prototype.init = function()
  {
        var myObject = this;

        myObject.modal.addEventListener('show.bs.modal', function(event) {
          var button = event.relatedTarget
          var action = typeof(button) !== 'undefined' ? button.getAttribute('data-action') : null;
          var body = myObject.modal.querySelector('.modal-body');

          axios({
              method: 'get',
              url: action,
          }).then((response)=>{
              body.innerHTML = response.data;
              myObject.options.loadCallback();
          }).catch((error)=>{});

        })
  }


  // SetOptions
  ModalLoad.prototype.setOption = function(source, properties)
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

// Init the Modal Load to each .modal-load
var modals = document.querySelectorAll('.modal-load');
modals.forEach((el, i) => {
    var myModal = new ModalLoad(el);
});
