/*
|--------------------------------------------------------------------------
| Editor - Script
|--------------------------------------------------------------------------
|
| Copyright © 2021 Natacha Herth, design & web development | https://www.natachaherth.ch/
| Plugin: TipTap - https://www.tiptap.dev/
|
*/

// Base
import { Editor as TipTapEditor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'
import TextStyle from '@tiptap/extension-text-style'
import History from '@tiptap/extension-history'
import HardBreak from '@tiptap/extension-hard-break'

// Functionnalities
import Bold from '@tiptap/extension-bold'
import Italic from '@tiptap/extension-italic'
import Underline from '@tiptap/extension-underline'
import Strike from '@tiptap/extension-strike'
import Heading from '@tiptap/extension-heading'
import Blockquote from '@tiptap/extension-blockquote'
import BulletList from '@tiptap/extension-bullet-list'
import OrderedList from '@tiptap/extension-ordered-list'
import ListItem from '@tiptap/extension-list-item'
import Link from '@tiptap/extension-link'
import Table from '@tiptap/extension-table'
import TableRow from '@tiptap/extension-table-row'
import TableCell from '@tiptap/extension-table-cell'
import TableHeader from '@tiptap/extension-table-header'
import Gapcursor from '@tiptap/extension-gapcursor'

// Customs
import CustomParagraph from './editor/paragraph.ts'
import Span from './editor/span.ts'
import Color from './editor/color.ts'
import ParagraphStyle from './editor/paragraph-style.ts'
import Div from './editor/div.ts'
import DivStyle from './editor/div-style.ts'
import Emoji from './editor/emoji.ts'


(function() {

  window.Editor = function(el) {

      // Define the variables
      this.editor        = null;
      this.form          = el.closest('form');
      this.toolbar       = el.querySelector('.editor-toolbar');
      this.container     = el.querySelector('.editor-container');
      this.textarea      = el.querySelector('.editor-textarea');

      // Define the classes of buttons
      this.buttons       = {
        bold:       '.editor-btn-bold',
        italic:     '.editor-btn-italic',
        underline:  '.editor-btn-underline',
        strike:     '.editor-btn-strike',
        heading:    '.editor-btn-heading',
        blockquote: '.editor-btn-blockquote',
        bulletlist: '.editor-btn-bulletlist',
        orderedlist:'.editor-btn-orderedlist',
        link:       '.editor-btn-link',
        table:      '.editor-btn-table',
        color:      '.editor-btn-color',
        paragraph:  '.editor-btn-paragraph',
        div:        '.editor-btn-div',
        emoji:      '.editor-btn-emoji',
        clear:      '.editor-btn-clear',
      };

      // Init the TipTap editor
      this.initTipTap();

      // Init the buttons
      this.initButtons();

  };

  // Init the TipTap Editor
  Editor.prototype.initTipTap = function()
  {
      var module = this;

      this.editor = new TipTapEditor({
          element: this.container,
          extensions: [
            Document,
            CustomParagraph,
            Text,
            Span,
            History,
            HardBreak,
            Bold,
            Italic,
            Underline,
            Strike,
            Heading,
            Blockquote,
            BulletList,
            OrderedList,
            ListItem,
            Link,
            Table,
            TableRow,
            TableCell,
            TableHeader,
            Gapcursor,
            Color,
            ParagraphStyle,
            Div,
            DivStyle,
            Emoji
          ],
          content: this.textarea.value,
          injectCSS: false,
          methods: {
            setLink() {
              const url = window.prompt('URL')

              this.editor.chain().focus().setLink({ href: url }).run()
            },
          },
          onSelectionUpdate({ editor }) {
            module.toggleButtonsState();
            module.setCurrentFont();
          },

      });


  }

  // Init the buttons
  Editor.prototype.initButtons = function()
  {
      this.bold();
      this.italic();
      this.underline();
      this.strike();
      this.heading();
      this.blockquote();
      this.list();
      this.link();
      this.table();
      this.color();
      this.paragraphStyle();
      this.divStyle();
      this.emoji();
      this.clear();
  }

  Editor.prototype.getButtonValue = function(event)
  {
    return event.target.closest('button').value;
  }

  // Toggle the state of button
  Editor.prototype.toggleButtonsState = function()
  {
      // Bold
      var bold = this.toolbar.querySelector(this.buttons.bold);
      if(bold)
      {
        this.editor.isActive('bold') ? bold.classList.add('active') : bold.classList.remove('active');
      }

      // Italic
      var italic = this.toolbar.querySelector(this.buttons.italic);
      if(italic)
      {
        this.editor.isActive('italic') ? italic.classList.add('active') : italic.classList.remove('active');
      }

      // Underline
      var underline = this.toolbar.querySelector(this.buttons.underline);
      if(underline)
      {
        this.editor.isActive('underline') ? underline.classList.add('active') : underline.classList.remove('active');
      }

      // Strike
      var strike = this.toolbar.querySelector(this.buttons.strike);
      if(strike)
      {
        this.editor.isActive('strike') ? strike.classList.add('active') : strike.classList.remove('active');
      }

      // Heading
      var headings = this.toolbar.querySelectorAll(this.buttons.heading);
      if(headings)
      {
        headings.forEach((heading, i) => {
          this.editor.isActive('heading',{ level: parseInt(heading.getAttribute('value'))}) ? heading.classList.add('active') : heading.classList.remove('active');
        });
      }

      // Bloquote
      var blockquote = this.toolbar.querySelector(this.buttons.blockquote);
      if(blockquote)
      {
        this.editor.isActive('blockquote') ? blockquote.classList.add('active') : blockquote.classList.remove('active');
      }

      // Bulletlist
      var bulletlist = this.toolbar.querySelector(this.buttons.bulletlist);
      if(bulletlist)
      {
        this.editor.isActive('bulletlist') ? bulletlist.classList.add('active') : bulletlist.classList.remove('active');
      }

      // OrderedList
      var orderedList = this.toolbar.querySelector(this.buttons.orderedlist);
      if(orderedList)
      {
        this.editor.isActive('orderedList') ? orderedList.classList.add('active') : orderedList.classList.remove('active');
      }

      // Link
      var link = this.toolbar.querySelector(this.buttons.link);
      if(link)
      {
        this.editor.isActive('link') ? link.classList.add('active') : link.classList.remove('active');
      }

      // Table
      var table = this.toolbar.querySelector('.editor-dropdown-table');
      if(table)
      {
        var btnCreateTable = this.toolbar.querySelector(this.buttons.table+'[value="create"]');
        var btnDeleteTable = this.toolbar.querySelector(this.buttons.table+'[value="delete"]');

        if(this.editor.isActive('table'))
        {
          table.classList.add('active');
          btnCreateTable.classList.add('d-none');
          btnDeleteTable.classList.remove('d-none');
        } else {
          table.classList.remove('active');
          btnCreateTable.classList.remove('d-none');
          btnDeleteTable.classList.add('d-none');
        }
      }

      // Color
      var color = this.toolbar.querySelector('.editor-dropdown-color');
      if(color)
      {
        this.editor.isActive('textStyle') ? color.classList.add('active') : color.classList.remove('active');
      }
      var colors = this.toolbar.querySelectorAll(this.buttons.color);
      if(colors)
      {
        colors.forEach((color, i) => {
          this.editor.isActive({ color: color.getAttribute('value')}) ? color.classList.add('active') : color.classList.remove('active');
        });
      }

      // Paragraph
      var paragraphs = this.toolbar.querySelectorAll(this.buttons.paragraph);
      if(paragraphs)
      {
        paragraphs.forEach((paragraph, i) => {
          if(paragraph.getAttribute('value') == 'null')
          {
            this.editor.isActive({ paragraphStyle: null}) ? paragraph.classList.add('active') : paragraph.classList.remove('active');
          } else {
            this.editor.isActive({ paragraphStyle: paragraph.getAttribute('value')}) ? paragraph.classList.add('active') : paragraph.classList.remove('active');
          }
        });
      }

      // Div
      var divs = this.toolbar.querySelectorAll(this.buttons.div);
      if(divs)
      {
        divs.forEach((div, i) => {
          this.editor.isActive({ divStyle: div.getAttribute('value')}) ? div.classList.add('active') : div.classList.remove('active');
        });
      }

  }

  // Set current font value
  Editor.prototype.setCurrentFont = function(value = null)
  {
      var activeBtn  = this.toolbar.querySelector('.editor-font .dropdown-item.active');
      if(activeBtn)
      {
        var active     = value ?? activeBtn.firstChild.nodeValue;
        var currentBtn = this.toolbar.querySelector('.editor-dropdown-font small');
        var current    = currentBtn.firstChild.nodeValue;
        if(active !== current)
        {
          currentBtn.firstChild.nodeValue = active;
        }
      }
  }

  // Export the editor content to the textarea
  Editor.prototype.exportToTextarea = function()
  {
    var value = this.editor.getHTML() !== '<p></p>' ? this.editor.getHTML() : null;
    this.textarea.value = value;
  }

  /*
  |--------------------------------------------------------------------------
  | BUTTONS
  |--------------------------------------------------------------------------
  */

  // Bold
  Editor.prototype.bold = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.bold)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
            editor.chain().toggleBold().focus().run();
        });
      }
  }

  // Italic
  Editor.prototype.italic = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.italic)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
            editor.chain().toggleItalic().focus().run();
        });
      }
  }

  // Underline
  Editor.prototype.underline = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.underline)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
            editor.chain().toggleUnderline().focus().run();
        });
      }
  }

  // Strike
  Editor.prototype.strike = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.strike)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
          editor.chain().toggleStrike().focus().run();
        });
      }
  }

  // Heading
  Editor.prototype.heading = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.heading);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
            var value = module.getButtonValue(event);
            editor.chain().focus().toggleHeading({ level: parseInt(value)}).run();
          });
        });
      }
  }

  // Blockquote
  Editor.prototype.blockquote = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.blockquote)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
          editor.chain().focus().toggleBlockquote().run();
        });
      }
  }

  // List
  Editor.prototype.list = function()
  {
      var editor     = this.editor;
      var btnBullet  = this.toolbar.querySelector(this.buttons.bulletlist)
      var btnOrdered = this.toolbar.querySelector(this.buttons.orderedlist)

      if(btnBullet)
      {
        btnBullet.addEventListener('click', (event) => {
          editor.chain().focus().toggleBulletList().run();
        });
      }

      if(btnOrdered)
      {
        btnOrdered.addEventListener('click', (event) => {
          editor.chain().focus().toggleOrderedList().run();
        });
      }
  }

  // Link
  Editor.prototype.link = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.link)
      if(btn)
      {
        btn.addEventListener('click', (event) => {

          // Define href of link
          var href = null;

          // If not already a link
          if(!editor.isActive('link'))
          {
              // Open a Pop Up for link
              var url  = window.prompt('URL');

              // Define if it's an url or an email
              var isUrl = new RegExp('^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$','i');
              var isEmail = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

              if(isEmail.test(url))
              {
                href = 'mailto:'+url;
              } else if(isUrl.test(url)) {
                href = url.substring(0, 4) !== 'http' ? 'http://'+url : url;
              }
          }

          // Toggle the link
          this.editor.chain().focus().toggleLink({ href: href }).run();

        });
      }
  }

  // Table
  Editor.prototype.table = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.table);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
            var value = module.getButtonValue(event);
            switch (value) {
              case 'create':
                editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: false }).run();
                break;
              case 'delete':
                editor.chain().focus().deleteTable().run();
                break;
              case 'col-before':
                editor.chain().focus().addColumnBefore().run();
                break;
              case 'col-after':
                editor.chain().focus().addColumnAfter().run();
                break;
              case 'col-delete':
                editor.chain().focus().deleteColumn().run();
                break;
              case 'row-above':
                editor.chain().focus().addRowBefore().run();
                break;
              case 'row-below':
                editor.chain().focus().addRowAfter().run();
                break;
              case 'row-delete':
                editor.chain().focus().deleteRow().run();
                break;
              default:
            }

          });
        });
      }
  }

  // Color
  Editor.prototype.color = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.color);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
            var value = module.getButtonValue(event);
            editor.chain().toggleColor(value).focus().run();
          });
        });
      }
  }

  // Paragraph style
  Editor.prototype.paragraphStyle = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.paragraph);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
            var value = module.getButtonValue(event);
            if(editor.isActive({ paragraphStyle: value }) || value == 'null')
            {
              editor.chain().focus().setParagraph().unsetParagraphStyle().run();
            } else {
              editor.chain().focus().setParagraphStyle(value).run();
            }
          });
        });
      }
  }

  // Div style
  Editor.prototype.divStyle = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.div);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
              var value = module.getButtonValue(event);
              if(editor.isActive({ divStyle: value }))
              {
                editor.chain().focus().unsetDiv().run();
              } else {
                editor.chain().focus().setDiv().setDivStyle(value).run();
              }
          });
        });
      }
  }

  // Emoji
  Editor.prototype.emoji = function()
  {
      var module = this;
      var editor = this.editor;
      var btns = this.toolbar.querySelectorAll(this.buttons.emoji);
      if(btns)
      {
        btns.forEach((btn, i) => {
          btn.addEventListener('click', (event) => {
              var value = module.getButtonValue(event);
              editor.chain().focus().setEmoji(value).run();
          });
        });
      }
  }

  // Clear all style
  Editor.prototype.clear = function()
  {
      var editor = this.editor;
      var btn    = this.toolbar.querySelector(this.buttons.clear)
      if(btn)
      {
        btn.addEventListener('click', (event) => {
          editor.commands.clearNodes();
          editor.commands.unsetAllMarks();
        });
      }
  }

}());


// Define an empty array to stock the modules
var editorsModules = [];

// Init the Editor Module for each .editor
var editors = document.querySelectorAll('.editor');
editors.forEach((el, i) => {
  var myEditor = new Editor(el);
  editorsModules.push(myEditor);
});

// Init the Form Submit for each form
var forms = document.querySelectorAll('form:not(.d-none)');
forms.forEach((form, i) => {
  form.onsubmit = function(e) {

    // For each Editor Module, save the html in textarea
    editorsModules.forEach((el, i) => {
      el.exportToTextarea();
    });

    // Prevent sent for test
    //e.preventDefault();

  };
});
