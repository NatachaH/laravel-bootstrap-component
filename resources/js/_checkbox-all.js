/*
|--------------------------------------------------------------------------
| Checkbox All Script
|--------------------------------------------------------------------------
|
| Allow to check all checkbox in one
|
*/

// Get the .checkbox-all inputs
var checkboxes = document.querySelectorAll('.checkbox-all input');



checkboxes.forEach((parent, i) => {
  // Variables
  var childrenClass = parent.value;
  var children      = document.querySelectorAll('.checkbox-'+childrenClass+' input:not(:disabled)');

  // Toggle the .checkbox-all
  toggleCheckboxAll(parent,children);

  // On change the .checkbox-all, toggle the children
  parent.addEventListener('change', (event) => {
      if (event.target.checked) {
        toggleChildren(children,true);
      } else {
        toggleChildren(children,false);
      }
  });

  // On change a children, toggle the parent
  children.forEach((el, i) => {
    el.addEventListener('change', (event) => {
      toggleCheckboxAll(parent,children);
    });
  });

});

/**
 * Toggle the children checkbox
 * @param  array List of children checkbox
 * @param  boolean Is checked ?
 * @return void
 */
function toggleChildren(children, value)
{
  children.forEach((el, i) => {
    el.checked = value;
  });
}

/**
 * Toggle the . checkbox-all if all children are checked
 * @param  string value
 * @return void
 */
function toggleCheckboxAll(parent, children)
{
    var isChecked = false;

    for(var i=0;i<children.length; ++i)
    {
      if(!children[i].checked)
      {
        isChecked = false;
        break;
      }
      isChecked = true;
    }

    parent.checked = isChecked;
}
