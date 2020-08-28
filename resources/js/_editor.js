/*
|--------------------------------------------------------------------------
| Editor - Script
|--------------------------------------------------------------------------
|
| Plugin: https://quilljs.com/
|
*/

import Quill from 'Quill';

// Imports
let ColorClass = Quill.import('attributors/class/color');
let Delta = Quill.import('delta');
import SmartBreak from './editor/smart-break';
import HelperLink from './editor/helper-link';
import LeadFormat from './editor/lead-format';

// Add class for colors
ColorClass.keyName = 'ql-color'
Quill.register(ColorClass, true);

// Add the smart break
Quill.register(SmartBreak, true);

// Add the smart break
Quill.register(LeadFormat, true);

// Function to replace <br> to smartbreak
function lineBreakMatcher() {
  var newDelta = new Delta();
  newDelta.insert({'smartbreak': ''});
  return newDelta;
}

// Select all .edito
var editors = document.querySelectorAll('.editor');
editors.forEach((el, i) => {
    var parent = el.parentElement;
    var toolbar = parent.querySelector('.ql-toolbar');
    var editor = parent.querySelector('.ql-container');

    var headerDropdown = parent.querySelector('.ql-dropdown-header');
    var colorDropdown = parent.querySelector('.ql-dropdown-color');
    var linkBtn = parent.querySelector('.ql-link');

    // Clean the innerHTML Bootstrap class 'text'
    editor.innerHTML = editor.innerHTML.replace(/text-/g, 'ql-color-');

    var ql = new Quill(editor, {
      modules: {
          clipboard: {
            matchers: [
            ['br', lineBreakMatcher]
          ]
          },
          toolbar: {
              container: toolbar,
              handlers: {
                // handlers object will be merged with default handlers object
                'link': function(value) {
                  if (value) {

                    // Get the current selection and check is not null
                    let range = this.quill.getSelection();
                    if (range == null || range.length == 0) return;

                    // Select the preview text and check if is a link
                    let preview =  HelperLink.preview(this.quill.getText(range));

                    // Prompt with default preview
                    let href = prompt('URL', preview);

                    // Check if href is valid
                    if (!HelperLink.isUrl(href) && !HelperLink.isEmail(href)) return;

                    // Set the link and init the tooltip
                    if(HelperLink.isEmail(href)) href = 'mailto:'+href ;
                    if(href.substring(0, 4) !== 'http') href = 'http://'+href;
                    this.quill.format('link', href);
                    HelperLink.initTooltip();

                  } else {
                    this.quill.format('link', false);
                  }
                },

                'lead' : function(){
                    var range = this.quill.getSelection();
                    if (range == null || range.length == 0) return;

                    this.quill.format('lead', 'block');


                }

              }
          },
          keyboard: {
            bindings: {

              shiftEnter: {
            			key: 13,
            			shiftKey: true,
            			handler: function(range, context) {
                    // Make a line break with shift+enter
                    let currentLeaf = this.quill.getLeaf(range.index)[0]
                    let nextLeaf = this.quill.getLeaf(range.index + 1)[0]
                    this.quill.insertEmbed(range.index, 'smartbreak', true, 'user');
                    if (nextLeaf === null || (currentLeaf.parent !== nextLeaf.parent)) {
                      this.quill.insertEmbed(range.index, 'smartbreak', true, 'user');
                    }
                    this.quill.setSelection(range.index + 2, 'silent');
                  }
          		},
              tab: {
                  key: 9,
                  handler: function () {
                      return true;
                  }
              }

            }
          }
      }
    });

    // When selection change
    ql.on('selection-change', function() {

      if(ql.hasFocus()) {

        if(colorDropdown)
        {
          // Color dropdown state
          if(ql.getFormat().color) {
            colorDropdown.classList.add('ql-active');
          } else {
            colorDropdown.classList.remove('ql-active');
          }
        }

        // Header dropdown state
        if(headerDropdown)
        {
          var headerText = '';

          if(ql.getFormat().header) {
            headerDropdown.classList.add('ql-active');
            headerText = document.querySelector('.ql-header[value="'+(ql.getFormat().header)+'"]').innerHTML;
          } else if(ql.getFormat().lead){
            headerDropdown.classList.add('ql-active');
            headerText = document.querySelector('.ql-lead').innerHTML;
            document.querySelector('.ql-header').classList.remove('ql-active');
          } else {
            headerDropdown.classList.remove('ql-active');
            headerText = document.querySelector('.ql-header[value=""]').innerHTML;
          };

          headerDropdown.querySelector('small').textContent = headerText;

        }
      }

    });

    // Remove the tabindex of the toolbar buttons
    toolbar.querySelectorAll('button').forEach((el, i) => {
      el.tabIndex = -1;
    });

});

// Init the first time the tooltip
HelperLink.initTooltip();

// If a form is submit =>
var form = document.querySelector('form');
if(form !== null)
{
  form.onsubmit = function() {
    // Populate hidden form on submit
    editors.forEach((el, i) => {
      var parent = el.parentElement;
      var textarea = parent.querySelector('.ql-textarea');
      var html = parent.querySelector('.ql-editor').innerHTML;

      // Clean the <p><br/></p> to <br/>
      html = html.replace(new RegExp('<p><br></p>', 'g'), '<br>');
      html = html.replace(new RegExp('/^(\s*<br\s*\/?\s*>\s*)*|(\s*<br\s*\/?\s*>\s*)*\s*$','g'), '')

      // Clean the .ql-color- as .text-
      html = html.replace(/ql-color-/g, 'text-');

      // Populate the textarea if not empty
      if(html != '<br>') {
          textarea.value = html;
      }
    });
  };
}
