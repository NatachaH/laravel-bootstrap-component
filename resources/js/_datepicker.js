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
      this.min        = this.input.getAttribute('data-min-date') ?? null;
      this.max        = this.input.getAttribute('data-max-date') ?? null;
      this.minInput   = document.getElementsByName(this.input.getAttribute('data-min-date-input'))[0]
      this.maxInput   = document.getElementsByName(this.input.getAttribute('data-max-date-input'))[0]
      this.isReadonly = this.input.readOnly;
      this.lang       = document.documentElement.lang;
      this.clearBtn   = this.parent.querySelector('.btn-clear');

      var options = this.setOptionByFormat(this.format );
      this.altFormat      = options['format'];
      this.dateFormat     = options['dbformat'];
      this.noCalendar     = options['calendar'];
      this.enableTime     = options['time'];
      this.enableSeconds  = options['second'];

      // Init the events
      this.init();

  };

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
            },
            onReady: function(selectedDates, dateStr, instance) {
              myObject.inputGroup.classList.add('input-group-date-picker');
              if(dateStr)
              {
                myObject.inputGroup.classList.add('date-picked');
              }
            }
        });

        myObject.clearBtn.addEventListener('click', (event) => {
            event.preventDefault();
            myObject.flatepicker.clear();
            myObject.inputGroup.classList.remove('date-picked');
        });
  }

}());

// Init the Datalist to each .datalist
var datepickers = document.querySelectorAll('.datepicker-automatic');
Array.prototype.forEach.call(datepickers, function(el, i) {
  var datepicker = new Datepicker(el);
});
