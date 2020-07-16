/*
|--------------------------------------------------------------------------
| Modal form javascript
|--------------------------------------------------------------------------
|
| Copyright © 2019 Natacha Herth, design & web development | https://www.natachaherth.ch/
| Plugin: Flatpickr - https://flatpickr.js.org
|
*/

/*
OPTIONS
data-mode: Mode of flatpickr (single|multiple|range)
data-format: Date format to  send to the server(datetime|datetime-short|date|time|time-short|db-datetime|db-date|db-time)
data-allow-input: Allow the user to add manually a date
data-min-date: Minimum date
data-max-date: Maximum date
data-min-date-input: Name of input with minimum date
data-max-date-input: Name of input with maximum date
*/

import flatpickr from "flatpickr";
import { fr } from "flatpickr/dist/l10n/fr.js"
import { de } from "flatpickr/dist/l10n/de.js"
import { it } from "flatpickr/dist/l10n/it.js"

var datepickers = document.querySelectorAll('.date-picker');
var currentLang = document.documentElement.lang;

Array.prototype.forEach.call(datepickers, function(el, i) {

    // Get the mode
    var dataMode = el.getAttribute('data-mode');
    var mode     = dataMode ? dataMode : 'single';

    // Get the date format
    var dataFormat = el.getAttribute('data-format');
    var format     = dataFormat ? dataFormat : 'datetime';

    // Get the default value
    var defaultDate = el.getAttribute('value');

    // Get the min and max date
    var minDate     = el.getAttribute('data-min-date');
    var maxDate     = el.getAttribute('data-max-date');

    // Get min date input
    var minDateInputData = el.getAttribute('data-min-date-input');
    var minDateInput = minDateInputData ? document.getElementsByName(minDateInputData)[0] : false;

    // Get max date input
    var maxDateInputData = el.getAttribute('data-max-date-input');
    var maxDateInput = maxDateInputData ? document.getElementsByName(maxDateInputData)[0] : false;

    // Check if the input is readonly
    var isReadonly = el.readOnly;

    // Get the options by format
    var options = get_option(format);

    // Get the parent
    var parent = el.parentNode;

    // Get the clear button
    var clearBtn = parent.querySelector('.btn-clear');

    var flatpicker = flatpickr(el, {
        mode: mode,
        altInput: true,
        altFormat: options['format'],
        dateFormat: options['dbformat'],
        noCalendar: !options['calendar'],
        enableTime: options['time'],
        enableSeconds: options['second'],
        time_24hr: true,
        defaultDate: defaultDate,
        locale: currentLang,
        allowInput: !isReadonly,
        minDate: minDate,
        maxDate: maxDate,
        onOpen: function(selectedDates, dateStr, instance) {
            if(minDateInput)
            {
                instance.config.minDate = minDateInput.value;
            }
            if(maxDateInput)
            {
                instance.config.maxDate = maxDateInput.value;
            }
        },
        onChange: function(selectedDates, dateStr, instance) {
          parent.classList.add('date-picked');
        },
        onReady: function(selectedDates, dateStr, instance) {
          parent.classList.add('input-group-date-picker');
          if(dateStr)
          {
            parent.classList.add('date-picked');
          }
        }
    });

    clearBtn.addEventListener('click', (event) => {
        event.preventDefault();
        flatpicker.clear();
        parent.classList.remove('date-picked');
    });

});


function get_option(name){

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
