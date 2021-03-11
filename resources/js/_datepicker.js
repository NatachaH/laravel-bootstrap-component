/*
|--------------------------------------------------------------------------
| Modal form javascript
|--------------------------------------------------------------------------
|
| Copyright © 2020 Natacha Herth, design & web development | https://www.natachaherth.ch/
| Plugin: Flatpickr - https://flatpickr.js.org
|

OPTIONS
data-mode: Mode of flatpickr (single|multiple|range)
data-format: Date format to  send to the server(datetime|datetime-short|date|time|time-short|db-datetime|db-date|db-time)
data-allow-input: Allow the user to add manually a date
data-min-date: Minimum date
data-max-date: Maximum date
data-min-date-input: Name of input with minimum date
data-max-date-input: Name of input with maximum date

*/

const flatpickr = require("flatpickr");
const flatpickrFr = require("flatpickr/dist/l10n/fr.js").default.fr;
const flatpickrDe = require("flatpickr/dist/l10n/fr.js").default.de;
const flatpickrIt = require("flatpickr/dist/l10n/fr.js").default.it;

(function() {

  this.Datepicker = function(el,options = null) {


      this.parent      = el;
      this.inputGroup  = el.querySelector('.input-group');
      this.input       = el.querySelector('.date-picker');

      this.flatepicker = null;

      this.mode       = this.input.getAttribute('data-mode') ?? 'single';
      this.format     = this.input.getAttribute('data-format') ?? 'datetime';
      this.default    = this.input.value ?? null;
      this.isReadonly = this.input.readOnly;
      this.lang       = document.documentElement.lang;
      this.clearBtn   = this.parent.querySelector('.btn-clear');
      this.inline     = this.input.getAttribute('data-inline') ? Boolean(this.input.getAttribute('data-inline')) :  false;
      this.calendar   = this.inline ? this.parent.querySelector('.calendar') : this.parent;

      this.inputFrom   = this.parent.querySelector('.datepicker-input-from') ?? null;
      this.inputTo     = this.parent.querySelector('.datepicker-input-to') ?? null;

      this.disabled   = this.input.getAttribute('data-disabled') ? JSON.parse(this.input.getAttribute('data-disabled')) : [];
      this.events     = this.input.getAttribute('data-events') ? JSON.parse(this.input.getAttribute('data-events')) : [];

      // Define the min and max value
      this.defineMinMax(this.input.getAttribute('data-min'),this.input.getAttribute('data-max'));

      // Define option defaults
      var defaults = {
          changedCallback: function(e){}
      };

      // Create options by extending defaults with the passed in arugments
      var customOptions = (options && typeof options === "object" ? options : null );
      this.options = this.setOption(defaults, options);

      var optionsByFormat = this.setOptionByFormat(this.format );
      this.altFormat      = optionsByFormat['format'];
      this.dateFormat     = optionsByFormat['dbformat'];
      this.noCalendar     = optionsByFormat['calendar'];
      this.enableTime     = optionsByFormat['time'];
      this.enableSeconds  = optionsByFormat['second'];

      // Init the events
      this.init();

  };

  // SetOptions
  Datepicker.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

  Datepicker.prototype.setOptionByFormat = function(name)
  {
      var calendar;
      var time;
      var second;
      var format;
      var dbformat;

      switch (name) {

        case 'datetime':
          calendar  = true;
          time      = true;
          second    = true;
          format    = 'd.m.Y H:i:S';
          dbformat  = 'Y-m-d H:i:S';
          break;

        case 'datetime-short':
          calendar  = true;
          time      = true;
          second    = false;
          format    = 'd.m.Y H:i';
          dbformat  = 'Y-m-d H:i:S';
          break;

        case 'date':
          calendar  = true;
          time      = false;
          second    = false;
          format    = 'd.m.Y';
          dbformat  = 'Y-m-d';
          break;

        case 'time':
          calendar  = false;
          time      = true;
          second    = true;
          format    = 'H:i:S';
          dbformat  = 'H:i:S';
          break;

        case 'time-short':
          calendar  = false;
          time      = true;
          second    = false;
          format    = 'H:i';
          dbformat  = 'H:i:S';
          break;

        case 'db-datetime':
          calendar  = true;
          time      = true;
          second    = true;
          format    = 'Y-m-d H:i:S';
          dbformat  = 'Y-m-d H:i:S';
          break;

        case 'db-date':
          calendar  = true;
          time      = false;
          second    = false;
          format    = 'Y-m-d';
          dbformat  = 'Y-m-d';
          break;

        case 'db-time':
          calendar  = false;
          time      = true;
          second    = true;
          format    = 'H:i:S';
          dbformat  = 'H:i:S';
          break;
      }

      return {'calendar' : calendar, 'time' : time, 'second' : second, 'format' : format, 'dbformat' : dbformat};
  }

  Datepicker.prototype.init = function()
  {
        var myObject = this;

        this.flatepicker  = flatpickr(this.input, {
            mode:           myObject.mode,
            altInput:       true,
            altFormat:      myObject.altFormat,
            dateFormat:     myObject.dateFormat,
            noCalendar:     !myObject.noCalendar,
            enableTime:     myObject.enableTime,
            enableSeconds:  myObject.enableSeconds,
            time_24hr:      true,
            defaultDate:    myObject.defaultDate,
            locale:         myObject.lang,
            allowInput:     !myObject.isReadonly,
            minDate:        myObject.min,
            maxDate:        myObject.max,
            disable:        myObject.disabled,
            inline:         myObject.inline,
            appendTo:       myObject.calendar,

            onOpen: function(selectedDates, dateStr, instance) {
                if(myObject.minInput)
                {
                    instance.config.minDate = myObject.minInput.value;
                }
                if(myObject.maxInput)
                {
                    instance.config.maxDate = myObject.maxInput.value;
                }
            },

            onChange: function(selectedDates, dateStr, instance) {
              myObject.inputGroup.classList.add('date-picked');
              myObject.options.changedCallback(selectedDates);

              if(myObject.mode == 'range')
              {
                  const [to, from] = selectedDates;
                  myObject.inputFrom.value = to ? instance.formatDate(to, myObject.dateFormat) : '';
                  myObject.inputTo.value = from ? instance.formatDate(from, myObject.dateFormat) : '';
              }

            },

            onReady: function(selectedDates, dateStr, instance) {
              myObject.inputGroup.classList.add('input-group-date-picker');
              if(dateStr)
              {
                myObject.inputGroup.classList.add('date-picked');
              }
              if(myObject.inline)
              {
                myObject.inputGroup.classList.add('input-group-date-picker-inline');
              }


            },

            onDayCreate: function(dObj, dStr, instance, dayElem){
                // Utilize dayElem.dateObj, which is the corresponding Date
                var key = instance.formatDate(dayElem.dateObj, myObject.dateFormat);
                var myEvent = myObject.events[key] ?? null;
                if(myEvent)
                {
                    var className = 'event ' + 'bg-' + myEvent.color;
                    if(myEvent.title)
                    {
                        dayElem.innerHTML += "<span class='" + className + "' data-bs-toggle='tooltip'></span>";
                        var tooltips = new Bootstrap.Tooltip(dayElem.querySelector('.event'), {
                          container: dayElem,
                          trigger: 'hover',
                          title: myEvent.title
                        });
                    } else {
                        dayElem.innerHTML += "<span class='" + className + "'></span>";
                    }
                }
            }

        });

        myObject.clearBtn.addEventListener('click', (event) => {
            event.preventDefault();
            myObject.clear();
        });
  }

  Datepicker.prototype.clear = function()
  {
      this.flatepicker.clear();
      this.inputGroup.classList.remove('date-picked');
  }

  Datepicker.prototype.defineMinMax = function(min,max)
  {
      this.min = null;
      this.minInput = null;

      if(min)
      {
          if(isNaN(Date.parse(min)))
          {
            // If not date, get the input
            this.minInput = document.getElementsByName(min)[0];
          } else {
            // If a date
            this.min = min;
          }
      }

      this.max = null;
      this.maxInput = null;

      if(max)
      {
          if(isNaN(Date.parse(max)))
          {
            // If not date, get the input
            this.maxInput = document.getElementsByName(max)[0];
          } else {
            // If a date
            this.max = max;
          }
      }
  }

}());

// Init the Datalist to each .datalist
var datepickers = document.querySelectorAll('.datepicker-automatic');
Array.prototype.forEach.call(datepickers, function(el, i) {
  var datepicker = new Datepicker(el);
});
