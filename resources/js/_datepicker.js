/*
|--------------------------------------------------------------------------
| Datepicker - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
| Plugin: Flatpickr - https://flatpickr.js.org
|
*/

import { Tooltip } from "bootstrap";

import flatpickr from "flatpickr";
import { French } from "flatpickr/dist/l10n/fr.js";
import { German } from "flatpickr/dist/l10n/de.js";
import { Italian } from "flatpickr/dist/l10n/it.js";

export default class Datepicker {

  /**
   * Creates an instance
   *
   * @author: Natacha Herth
   * @param {object} el The element
   * @param {object} options Options that you can overide
   */
  constructor(el,options = null){

    // Get the element
    this.el = el;

    // Get the parent
    this.parent = el.parentNode;

    // Get the input
    this.input = el.querySelector('.date-picker');

    // Get the input group
    this.inputGroup = el.querySelector('.input-group');

    // Get the Flatpickr instance
    this.flatpickr = null;

    // Get the Clear button 
    this.clearBtn = this.el.querySelector('.btn-clear');

    // Get the input for the from and to value
    this.inputFrom = this.el.querySelector('.datepicker-input-from') ?? null;
    this.inputTo   = this.el.querySelector('.datepicker-input-to') ?? null;

    // Get the minimum date
    this.min = this.input.getAttribute('data-min');
    this.minInput = isNaN(Date.parse(this.min)) ? document.getElementsByName(this.min)[0] : null;

    // Get the maximum date
    this.max = this.input.getAttribute('data-max');
    this.maxInput = isNaN(Date.parse(this.max)) ? document.getElementsByName(this.max)[0] : null;

    // Get the disabled dates
    this.disabled = this.input.getAttribute('data-disabled') ? JSON.parse(this.input.getAttribute('data-disabled')) : [];
    
    // Get the events
    this.events = this.input.getAttribute('data-events') ? JSON.parse(this.input.getAttribute('data-events')) : [];

    // Get the Flatpickr parameters
    this.parameters = {
      mode:       this.input.getAttribute('data-mode') ?? 'single',
      format:     this.input.getAttribute('data-format') ?? 'datetime',
      default:    this.input.value ?? null,
      isReadonly: this.input.readOnly,
      lang:       document.documentElement.lang,
      inline:     this.input.getAttribute('data-inline') ? Boolean(this.input.getAttribute('data-inline')) :  false,
      static:     this.input.getAttribute('data-static') ? Boolean(this.input.getAttribute('data-static')) :  false
    };

    // Get the formats parameters
    this.parametersByFormat = this.setParametersByFormat();

    // Get the Calendar  
    this.calendar = this.parameters.inline ? this.el.querySelector('.calendar') : el;

    // Create options by extending defaults with the passed in arugments
    this.options = this.setOptions(options);

    // Init the ToggleSwitch
    this.init();

  }

  /**
   * Set the options
   *
   * @param {object} options Option that you want to overide
   * @return {object} The new option object.
   */
  setOptions(options) {

    // Variables that you can set as options
    const defaultOptions = {
      changedCallback(e){} // Callback function
    }

    // Update the options
    for (let option in options) {
      if (options.hasOwnProperty(option)) {
        defaultOptions[option] = options[option];
      }
    }

    // Return the object
    return defaultOptions;

  }

  /**
   * Set the options defined by the format
   */
  setParametersByFormat() {

    switch(this.parameters.format) {
      case 'datetime-short':
        return {
          display:        'd.m.Y H:i',
          database:       'Y-m-d H:i:S',
          enableCalendar: true,
          enableTime:     true,
          enableSeconds:  false 
        };
        break;
      case 'date':
        return {
          display:        'd.m.Y',
          database:       'Y-m-d',
          enableCalendar: true,
          enableTime:     false,
          enableSeconds:  false 
        };
        break;
      case 'time':
        return {
          display:        'H:i:S',
          database:       'H:i:S',
          enableCalendar: false,
          enableTime:     true,
          enableSeconds:  true 
        };
        break;
      case 'time-short':
        return {
          display:        'H:i',
          database:       'H:i:S',
          enableCalendar: false,
          enableTime:     true,
          enableSeconds:  false 
        };
        break;
      case 'db-datetime':
        return {
          display:        'Y-m-d H:i:S',
          database:       'Y-m-d H:i:S',
          enableCalendar: true,
          enableTime:     true,
          enableSeconds:  true 
        };
        break;
      case 'db-date':
        return {
          display:        'Y-m-d',
          database:       'Y-m-d',
          enableCalendar: true,
          enableTime:     false,
          enableSeconds:  false 
        };
        break;
      case 'db-time':
        return {
          display:        'H:i:S',
          database:       'H:i:S',
          enableCalendar: false,
          enableTime:     true,
          enableSeconds:  true 
        };
        break;
      default :
        return {
          display:        'd.m.Y H:i:S',
          database:       'Y-m-d H:i:S',
          enableCalendar: true,
          enableTime:     true,
          enableSeconds:  true 
        };
        break;
    }
   
  }

  /**
   * Init the Datepicker
   */
  init() {

    const that = this;

    // Define the Flatepicker object
    this.flatpickr = flatpickr(this.input,{
        mode:           that.parameters.mode,
        altInput:       true,
        altFormat:      that.parametersByFormat.display,
        dateFormat:     that.parametersByFormat.database,
        noCalendar:     !that.parametersByFormat.enableCalendar,
        enableTime:     that.parametersByFormat.enableTime,
        enableSeconds:  that.parametersByFormat.enableSeconds,
        time_24hr:      true,
        defaultDate:    that.input.value,
        locale:         that.parameters.lang,
        allowInput:     !that.parameters.isReadonly,
        minDate:        that.min,
        maxDate:        that.max,
        disable:        that.disabled,
        inline:         that.parameters.inline,
        static:         that.parameters.static,
        appendTo:       that.calendar,

        onOpen: function(selectedDates, dateStr, instance) {
          if(that.minInput)
          {
              instance.config.minDate = that.minInput.value;
          }
          if(that.maxInput)
          {
              instance.config.maxDate = that.maxInput.value;
          }
        },

        onChange: function(selectedDates, dateStr, instance) {
          that.inputGroup.classList.add('date-picked');
          that.options.changedCallback(selectedDates);

          if(that.parameters.mode == 'range')
          {
              const [to, from] = selectedDates;
              this.inputFrom.value = to ? instance.formatDate(to, that.parametersByFormat.database) : '';
              this.inputTo.value = from ? instance.formatDate(from, that.parametersByFormat.database) : '';
          }
        },

        onReady: function(selectedDates, dateStr, instance) {
          that.inputGroup.classList.add('input-group-date-picker');
          if(dateStr)
          {
            that.inputGroup.classList.add('date-picked');
          }
          if(that.parameters.inline)
          {
            that.inputGroup.classList.add('input-group-date-picker-inline');
          }
        },

        onDayCreate: function(dObj, dStr, instance, dayElem){
          // Utilize dayElem.dateObj, which is the corresponding Date
          var key = instance.formatDate(dayElem.dateObj, that.parametersByFormat.database);
          var myEvent = that.events[key] ?? null;
          if(myEvent)
          {
              var className = 'event ' + 'bg-' + myEvent.color;
              dayElem.innerHTML += "<span class='" + className + "'></span>";

              if(myEvent.title)
              {
                  dayElem.classList.add('flatpickr-event');
                  dayElem.setAttribute('data-bs-toggle','tooltip');

                  var tooltips = new Tooltip(dayElem, {
                    placement: 'top',
                    container: dayElem,
                    trigger: 'hover',
                    title: myEvent.title
                  });
              }
          }
        }
    
    });

    this.clearBtn.addEventListener('click', event => {
        event.preventDefault();
        this.clear();
    });
   
  }

  /**
   * Clear the date
   */
  clear() {

    this.flatpickr.clear();
    this.inputGroup.classList.remove('date-picked');
  
  }


}

