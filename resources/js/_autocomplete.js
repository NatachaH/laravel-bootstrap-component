/*
|--------------------------------------------------------------------------
| Autocomplete - Script
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

(function() {

    window.Autocomplete = function(el,options = null) {

      this.parent = el;
      this.input  = el.querySelector('input');
      this.datas  = null;

      var defaults = {
        url          : el.getAttribute('data-url'),       // Load datalist options via Axios
        field        : el.getAttribute('data-field'),     // Field to use for the option value
        datalist     : el.querySelector('datalist'),      // The datalist object
        hidden       : {
            input : el.querySelector('.input-hidden'),    // Input hidden
            field : el.getAttribute('data-hidden-field'), // Field to use for the hidden value
        },
        onChanged    : function(e){}                      // Callback function
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options);

      // Init the events
      this.init();

  };

  Autocomplete.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

  Autocomplete.prototype.init = function()
  {
      var myObject = this;

      // Load datas via AXIOS
      if(this.options.url)
      {
          this.load();
      }

      // If datalist is a different than the default, change the list attribute
      if(this.options.datalist.getAttribute('id') !== this.input.getAttribute('list'))
      {
          this.input.setAttribute('list',this.options.datalist.getAttribute('id'));
      }

      // Callback when input change
      this.input.addEventListener('change',function(e){
          e.preventDefault();

          // Check if an option is selected
          var option = myObject.options.datalist.querySelector('option[value="'+this.value+'"]');
          var selected = option ? JSON.parse(option.getAttribute('data-json')) : null;

          // If hidden input set the value
          if(myObject.options.hidden.input)
          {
              myObject.options.hidden.input.value = option ? option.getAttribute('data-value') : null;
          }

          // Run the custom callback
          myObject.options.onChanged(selected);
      });
  }

  Autocomplete.prototype.load = function(e)
  {
        axios({
            method: 'post',
            url: this.options.url,
        }).then((response)=>{

            // Set the JSON datas
            this.datas = response.data;

            // Create the datalist options
            this.createOptions();

        }).catch((error)=>{});
  }

  Autocomplete.prototype.createOptions = function(e)
  {
        var myObject = this;

        this.datas.forEach((item, i) => {
            var option = document.createElement('option');
            var value  = item[myObject.options.field] ?? null;
            var hidden = item[myObject.options.hidden.field] ?? null;
            option.setAttribute('value',value);
            option.setAttribute('data-value', hidden);
            option.setAttribute('data-json',JSON.stringify(item));
            option.innerHTML = value;
            myObject.options.datalist.appendChild(option);
        });
  }


}());


// Init the Autocomplete to each .datalist
var autocompletes = document.querySelectorAll('.autocomplete');
Array.prototype.forEach.call(autocompletes, function(el, i) {
    var autocomplete = new Autocomplete(el);
});
