/*
|--------------------------------------------------------------------------
| Bootstrap Component - Script
|--------------------------------------------------------------------------
*/

import Autocomplete from './_autocomplete';
import Calendar from './_calendar';
import CheckboxAll from './_checkbox-all';
import Datepicker from './_datepicker';
import Dynamic from './_dynamic';
import Editor from './_editor';
import ModalConfirm from './_modal-confirm';
import ModalLoad from './_modal-load';
import TableLink from './_table-link';
import ToggleSelect from "./_toggle-select"; 
import ToggleSwitch from "./_toggle-switch"; 

// Init the Autocomplete
var autocompletes = document.querySelectorAll('.autocomplete')
if(autocompletes)
{
    autocompletes.forEach(el => new Autocomplete(el));
}

// Init the Calendar
var calendars = document.querySelectorAll('.calendar-automatic')
if(calendars)
{
  calendars.forEach(el => new Calendar(el));
}

// Init the Checkbox All
var checkboxes = document.querySelectorAll('.checkbox-all input');
if(checkboxes)
{
    checkboxes.forEach(el => new CheckboxAll(el));
}

// Init the Datepicker
var datepickers = document.querySelectorAll('.datepicker-automatic');
if(datepickers)
{
    datepickers.forEach(el => new Datepicker(el));
}

// Init the Dynamic
var dynamics = document.querySelectorAll('.dynamic-automatic');
if(dynamics)
{
    dynamics.forEach(el => new Dynamic(el));
}

// Init the Editor
var editors = document.querySelectorAll('.editor');
if(editors)
{
    var editorsModules = [];
    editors.forEach(el => {
        var myEditor = new Editor(el);
        editorsModules.push(myEditor);
    });

    var forms = document.querySelectorAll('form:not(.d-none)');
    forms.forEach(form => {
        form.onsubmit = function(e) {
          // For each Editor Module, save the html in textarea
          editorsModules.forEach(el => el.exportToTextarea());
          // Prevent sent for test
          //e.preventDefault();
        };
    });
}

// Init the Modal Confirm
var modalsToConfirm = document.querySelectorAll('.modal-confirm');
if(modalsToConfirm)
{
    modalsToConfirm.forEach(el => new ModalConfirm(el));
}

// Init the Modal Load
var modalsToLoad = document.querySelectorAll('.modal-load');
if(modalsToLoad)
{
    modalsToLoad.forEach(el => new ModalLoad(el));
}

// Init the Table Link
var tableLinks = document.querySelectorAll('.table-link');
if(tableLinks)
{
    tableLinks.forEach(el => new TableLink(el));
}

// Init the ToggleSelect
var selects = document.querySelectorAll('.toggle-select');
if(selects)
{
    selects.forEach(el => new ToggleSelect(el));
}

// Init the ToggleSwitch
var switchs = document.querySelectorAll('.toggle-switch');
if(switchs)
{
    switchs.forEach(el => new ToggleSwitch(el));
}
