/*
|--------------------------------------------------------------------------
| Calendar - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

import axios from 'axios'
window.axios = axios;

export default class Calendar {

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

    // Get the today date
    this.today = new Date();

    // Get the month
    this.month = this.today.getMonth();

    // Get the year
    this.year = this.today.getFullYear();

    // Get the url for load events
    this.loadEventUrl = el.getAttribute('data-events') ?? null;

    // Get the layout
    this.layout = {
      year: el.querySelector('.year span'),
      nextYear : el.querySelector('.year .next'),
      prevYear : el.querySelector('.year .prev'),
      month: el.querySelector('.month span'),
      nextMonth : el.querySelector('.month .next'),
      prevMonth : el.querySelector('.month .prev'),
      dates: el.querySelector('.dates'),
    };

    // GEt the french month @todo: Make translatable
    this.months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],

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
      onDayCreated(e){},  // Callback function
      onEventCreated(e){} // Callback function
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
   * Init the Calendar
   */
  init() {

    // Get the current month
    this.get();

    // Init Events
    this.layout.nextMonth.addEventListener('click', () => {
      this.defineMonthYear('next');
      this.get();
    });

    this.layout.prevMonth.addEventListener('click', () => {
      this.defineMonthYear('prev');
      this.get();
    });

    this.layout.nextYear.addEventListener('click', () => {
      this.year = this.year + 1;
      this.get();
    });

    this.layout.prevYear.addEventListener('click', () => {
      this.year = this.year - 1;
      this.get();
    });

  }

  /**
   * Get the calendar
   */
  get() {

    // variables
    let firstDayOfTheMonth = (new Date(this.year, this.month)).getDay();
    const daysInMonth = 32 - new Date(this.year, this.month, 32).getDate();
    const rows = Math.ceil(daysInMonth/7)+1;

    // Update the first day because if it's 0 === 'sunday' and in french calendar it's the 7th day of the week
    if(firstDayOfTheMonth === 0){firstDayOfTheMonth = 7;}

    // Set the layout
    this.layout.month.innerHTML = this.months[this.month];
    this.layout.year.innerHTML  = this.year;
    this.layout.dates.innerHTML = '';

    // Create the grid
    let dayNbr = 1;

    for (let row = 0; row < rows; row++)
    {

      // Dont do last row if not required
      if(dayNbr > daysInMonth) { break; }

      let tr = document.createElement('tr');

      for (let td = 0; td < 7; td++)
      {

        // Create a TD
        let day = document.createElement('td');

        if (row === 0 && td < firstDayOfTheMonth-1 || dayNbr > daysInMonth)
        {
            // Empty date
            day.innerHTML = '';
        } else {
            // Set the date number
            day.innerHTML = dayNbr;

            // Set the classes
            day.className = 'day day-'+dayNbr;
            if(dayNbr === this.today.getDate() && this.year === this.today.getFullYear() && this.month === this.today.getMonth())
            {
              day.classList.add('current');
            }

            // Run the custom callback
            this.options.onDayCreated(day,new Date(this.year, this.month,dayNbr));

            // Increment the number
            dayNbr++;
        }

        // Set the TR
        tr.appendChild(day);

      }

      // Append the row
      this.layout.dates.appendChild(tr);

    }

    // Get the events per month
    if(this.loadEventUrl) { this.loadEventPerMonth(); }

  }

  /**
   * Define the date when change month
   * @param {string} direction The direction of the calendar
   */
  defineMonthYear(direction = 'next') {

      const month = direction == 'prev' ? (this.month - 1) : (this.month + 1);

      if(month < 0)
      {
        // set to decembre of previous year
        this.month = 11;
        this.year  = this.year - 1;
      } else if(month > 11) {
        // set to januar or next year
        this.month = 0;
        this.year  = this.year + 1;
      } else {
        // change the month
        this.month = month;
        this.year  = this.year;
      }

  }

  /**
   * Load the events per month
   */
  loadEventPerMonth() {

    const start = new Date(this.year, this.month);
    const end = new Date(this.year, this.month + 1, 0);

    axios({
      method: 'post',
      url: this.loadEventUrl,
      params: {
        start: start,
        end: end
      }
    }).then((response)=>{
        const events = response.data;
        for (let key in events) {
          let obj = events[key];
          obj['days'].forEach(date => {

            // Define the containe to stock the events
            let td = this.layout.dates.querySelector('.day-'+date);
            let parent;
            if(!td.querySelector('.day-events'))
            {
              td.classList.add('day-with-events');
              parent = document.createElement('div');
              parent.className = 'day-events';
              td.appendChild(parent);
            } else {
              parent = td.querySelector('.day-events');
            }

            // Create the event
            let myEvent = document.createElement('span');
            myEvent.title = obj['title'] ?? null;
            if(obj['content'])
            {
              myEvent.setAttribute('data-content', obj['content']);
            }
            if(obj['color'])
            {
              myEvent.classList.add('bg-'+obj['color']);
            }

            // Append the event
            parent.appendChild(myEvent);

            // Run the custom callback
            this.options.onEventCreated(myEvent,obj);

          });
        }

    }).catch((error)=>{
      console.log(error);
    });
    

  }

}

