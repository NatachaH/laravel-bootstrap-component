/*
|--------------------------------------------------------------------------
| Calendar - Script
|--------------------------------------------------------------------------
|
| Copyright © 2021 Natacha Herth, design & web development | https://www.natachaherth.ch/
|
*/

import axios from 'axios'
window.axios = axios;

(function() {

  window.Calendar = function(el,options = null) {

      // Variables
      this.calendar = el;
      this.today    = new Date();
      this.month    = this.today.getMonth();
      this.year     = this.today.getFullYear();
      this.events   = el.getAttribute('data-events') ?? null;

      // Basic month in french
      this.months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

      // Layout variables
      this.layout = {
        year: el.querySelector('.year span'),
        nextYear : el.querySelector('.year .next'),
        prevYear : el.querySelector('.year .prev'),
        month: el.querySelector('.month span'),
        nextMonth : el.querySelector('.month .next'),
        prevMonth : el.querySelector('.month .prev'),
        dates: el.querySelector('.dates'),
      };

      var defaults = {
        onDayCreated: function(object,date){},
        onEventCreated: function(object,event){},
      };

      // Create options by extending defaults with the passed in arugments
      this.options = this.setOption(defaults, options)

      this.init();

  };

  Calendar.prototype.setOption = function(source, properties)
  {
      var property;
      for (property in properties) {
        if (properties.hasOwnProperty(property)) {
          source[property] = properties[property];
        }
      }
      return source;
  }

  // Init
  Calendar.prototype.init = function()
  {
      // Render the current month
      this.get();

      // Init Events
      var module = this;
      this.layout.nextMonth.addEventListener('click', function(e){
          module.defineDate('next');
          module.get();
      });

      this.layout.prevMonth.addEventListener('click', function(e){
          module.defineDate('prev');
          module.get();
      });

      this.layout.nextYear.addEventListener('click', function(e){
          module.year = module.year + 1;
          module.get();
      });

      this.layout.prevYear.addEventListener('click', function(e){
          module.year = module.year - 1;
          module.get();
      });
  }

  // Render the calendar
  Calendar.prototype.get = function()
  {
      // variables
      var firstDayOfTheMonth = (new Date(this.year, this.month)).getDay();
      var daysInMonth = 32 - new Date(this.year, this.month, 32).getDate();
      var rows = Math.ceil(daysInMonth/7)+1;

      // Update the first day becaus eif it's 0 === 'sunday' and in french calendar it's the 7th day of the week
      if(firstDayOfTheMonth === 0)
      {
        firstDayOfTheMonth = 7;
      }

      this.layout.month.innerHTML = this.months[this.month];
      this.layout.year.innerHTML  = this.year;
      this.layout.dates.innerHTML = '';

      var dayNbr = 1;

      for (let row = 0; row < rows; row++) {

          // Dont do last row if not required
          if(dayNbr > daysInMonth)
          {
            break;
          }

          var tr = document.createElement('tr');

          for (let td = 0; td < 7; td++) {

              // Create a TD
              var day = document.createElement('td');

              if (row === 0 && td < firstDayOfTheMonth-1 || dayNbr > daysInMonth) {
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

          this.layout.dates.appendChild(tr);
      }

      // Get the events
      if(this.events)
      {
        this.loadEvents();
      }
  }

  // Define the date when change month
  Calendar.prototype.defineDate = function(direction = 'next')
  {
      var month = direction == 'prev' ? (this.month - 1) : (this.month + 1);

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

  // Load event for the current view
  Calendar.prototype.loadEvents = function()
  {
      var start = new Date(this.year, this.month);
      var end = new Date(this.year, this.month + 1, 0);

      axios({
          method: 'post',
          url: this.events,
          params: {
            start: start,
            end: end
          }
      }).then((response)=>{
          events = response.data;
          for (var key in events) {
            var obj = events[key];
            obj['days'].forEach((date, i) => {

              // Define the containe to stock the events
              var td = this.layout.dates.querySelector('.day-'+date);
              if(!td.querySelector('.day-events'))
              {
                td.classList.add('day-with-events');
                var parent = document.createElement('div');
                parent.className = 'day-events';
                td.appendChild(parent);
              } else {
                var parent = td.querySelector('.day-events');
              }

              // Create the event
              var myEvent = document.createElement('span');
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

      }).catch((error)=>{});
  }

}());

// Calendar
var calendars = document.querySelectorAll('.calendar-automatic')
if(calendars)
{
  calendars.forEach((el, i) => {
    new Calendar(el);
  });
}
