/*
|--------------------------------------------------------------------------
| Editor - Script
|--------------------------------------------------------------------------
|
| Copyright © 2023 Natacha Herth, design & web development | https://www.natachaherth.ch/
| Plugin: TipTap - https://www.tiptap.dev/
|
*/

// Base
import { Editor as TipTapEditor } from '@tiptap/core'
import Document from '@tiptap/extension-document'
import Text from '@tiptap/extension-text'
import History from '@tiptap/extension-history'
import HardBreak from '@tiptap/extension-hard-break'

// Functionnalities
import Bold from '@tiptap/extension-bold'
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
import Color from './editor/color.ts'
import Div from './editor/div.ts'
import Italic from './editor/italic.ts'
import Emoji from './editor/emoji.ts'

export default class Editor {

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

    // Get the editor
    this.editor = null;

    // Get the form
    this.form          = el.closest('form');

    // Get the editor layout
    this.toolbar       = el.querySelector('.editor-toolbar');
    this.container     = el.querySelector('.editor-container');
    this.textarea      = el.querySelector('.editor-textarea');

    // Define the classes of buttons
    this.btnsClasses       = {
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

    this.buttons = {
      bold:       this.toolbar.querySelector(this.btnsClasses.bold),
      italic:     this.toolbar.querySelector(this.btnsClasses.italic),
      underline:  this.toolbar.querySelector(this.btnsClasses.underline),
      strike:     this.toolbar.querySelector(this.btnsClasses.strike),
      headings:   this.toolbar.querySelectorAll(this.btnsClasses.heading),
      blockquote: this.toolbar.querySelector(this.btnsClasses.blockquote),
      bulletlist: this.toolbar.querySelector(this.btnsClasses.bulletlist),
      orderedlist:this.toolbar.querySelector(this.btnsClasses.orderedlist),
      link:       this.toolbar.querySelector(this.btnsClasses.link),
      table:      this.toolbar.querySelector('.editor-dropdown-table'),
      tables:     this.toolbar.querySelectorAll(this.btnsClasses.table),
      tableCreate:this.toolbar.querySelector(this.btnsClasses.table+'[value="create"]'),
      tableDelete:this.toolbar.querySelector(this.btnsClasses.table+'[value="delete"]'),
      color:      this.toolbar.querySelector('.editor-dropdown-color'),
      colors:     this.toolbar.querySelectorAll(this.btnsClasses.color),
      paragraphs: this.toolbar.querySelectorAll(this.btnsClasses.paragraph),
      divs:       this.toolbar.querySelectorAll(this.btnsClasses.div),
      emoji:      this.toolbar.querySelector('.editor-dropdown-emoji'),
      emojis:     this.toolbar.querySelectorAll(this.btnsClasses.emoji),
      clear:      this.toolbar.querySelector(this.btnsClasses.clear),
    }

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
      onChanged(e){} // Callback function
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
   * Init the Editor
   */
  init() {

    const that = this;

    // Init the TipTap plugin
    this.editor = new TipTapEditor({
      element: this.container,
      extensions: [
        Document,
        CustomParagraph,
        Text,
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
        Div,
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
        that.toggleButtonsState();
        that.setCurrentFont();
        that.setCurrentDiv();
      },
    });

    // Init the buttons
    if(this.buttons.bold) {this.bold()};
    if(this.buttons.italic) {this.italic()};
    if(this.buttons.underline) {this.underline()};
    if(this.buttons.strike) {this.strike()};
    if(this.buttons.headings) {this.heading()};
    if(this.buttons.blockquote) {this.blockquote()};
    if(this.buttons.bulletlist || this.buttons.orderedlist) {this.list()};
    if(this.buttons.link) {this.link()};
    if(this.buttons.table) {this.table()};
    if(this.buttons.color) {this.color()};
    if(this.buttons.paragraphs) {this.paragraph()};
    if(this.buttons.divs) {this.div()};
    if(this.buttons.emoji) {this.emoji()};
    if(this.buttons.clear) {this.clear()};
  }

  /**
   * Get the button value
   * @param {event} event The event
   * @returns {string} The value
   */
  getButtonValue(event) {
    return event.target.closest('button').value;
  }
  
  /**
   * Toggle all the buttons state
   */
  toggleButtonsState() {

    // Bold
    if(this.buttons.bold)
    {
      this.editor.isActive('bold') ? this.buttons.bold.classList.add('active') : this.buttons.bold.classList.remove('active');
    }

    // Italic
    if(this.buttons.italic)
    {
      this.editor.isActive('italic') ? this.buttons.italic.classList.add('active') : this.buttons.italic.classList.remove('active');
    }

    // Underline
    if(this.buttons.underline)
    {
      this.editor.isActive('underline') ? this.buttons.underline.classList.add('active') : this.buttons.underline.classList.remove('active');
    }

    // Strike
    if(this.buttons.strike)
    {
      this.editor.isActive('strike') ? this.buttons.strike.classList.add('active') : this.buttons.strike.classList.remove('active');
    }

    // Heading
    if(this.buttons.headings)
    {
      this.buttons.headings.forEach((heading, i) => {
        this.editor.isActive('heading',{ level: parseInt(heading.getAttribute('value'))}) ? heading.classList.add('active') : heading.classList.remove('active');
      });
    }

    // Bloquote
    if(this.buttons.blockquote)
    {
      this.editor.isActive('blockquote') ? this.buttons.blockquote.classList.add('active') : this.buttons.blockquote.classList.remove('active');
    }

    // Bulletlist
    if(this.buttons.bulletlist)
    {
      this.editor.isActive('bulletlist') ? this.buttons.bulletlist.classList.add('active') : this.buttons.bulletlist.classList.remove('active');
    }

    // OrderedList
    if(this.buttons.orderedList)
    {
      this.editor.isActive('orderedList') ? this.buttons.orderedList.classList.add('active') : this.buttons.orderedList.classList.remove('active');
    }

    // Link
    if(this.buttons.link)
    {
      this.editor.isActive('link') ? this.buttons.link.classList.add('active') : this.buttons.link.classList.remove('active');
    }

    // Table
    if(this.buttons.table)
    {
      if(this.editor.isActive('table'))
      {
        this.buttons.table.classList.add('active');
        this.buttons.tableCreate.classList.add('d-none');
        this.buttons.tableDelete.classList.remove('d-none');
      } else {
        this.buttons.table.classList.remove('active');
        this.buttons.tableCreate.classList.remove('d-none');
        this.buttons.tableDelete.classList.add('d-none');
      }
    }

    // Color
    if(this.buttons.color)
    {
      this.editor.isActive('color') ? this.buttons.color.classList.add('active') : this.buttons.color.classList.remove('active');
    }
    if(this.buttons.colors)
    {
      this.buttons.colors.forEach(color => {
        this.editor.isActive({ class: color.getAttribute('value')}) ? color.classList.add('active') : color.classList.remove('active');
      });
    }

    // Paragraph
    if(this.buttons.paragraphs)
    {
      this.buttons.paragraphs.forEach(paragraph => {
        if(paragraph.getAttribute('value') == 'null')
        {
          this.editor.isActive('paragraph',{ class: null}) ? paragraph.classList.add('active') : paragraph.classList.remove('active');
        } else {
          this.editor.isActive('paragraph',{ class: paragraph.getAttribute('value')}) ? paragraph.classList.add('active') : paragraph.classList.remove('active');
        }
      });
    }

    // Div
    if(this.buttons.divs)
    {
      this.buttons.divs.forEach(div => {
        this.editor.isActive('div',{ class: div.getAttribute('value')}) ? div.classList.add('active') : div.classList.remove('active');
      });
    }

    // Emoji
    if(this.buttons.emoji)
    {
      this.editor.isActive('emoji') ? this.buttons.emoji.classList.add('active') : this.buttons.emoji.classList.remove('active');
    }
    if(this.buttons.emojis)
    {
      this.buttons.emojis.forEach(emoji => {
        this.editor.isActive({ class: 'emoji '+emoji.getAttribute('value')}) ? emoji.classList.add('active') : emoji.classList.remove('active');
      });
    }

  }

  /**
   * Set the current Font
   * @param {string} value
   */
  setCurrentFont(value = null) {
    const activeBtn  = this.toolbar.querySelector('.editor-font .dropdown-item.active');
    let displayedValue = this.toolbar.querySelector('.editor-dropdown-font small');
  
    if(activeBtn)
    {
      var active = value ?? activeBtn.firstChild.nodeValue;
      if(active !== displayedValue.firstChild.nodeValue)
      {
        displayedValue.firstChild.nodeValue = active;
      } 
    }
  }

  /**
   * Set the current Div
   * @param {string} value
   */
  setCurrentDiv(value = null) {
    const activeBtn  = this.toolbar.querySelector('.editor-div .dropdown-item.active');
    let displayedValue = this.toolbar.querySelector('.editor-dropdown-div small');

    if(activeBtn)
    {
      var active     = value ?? activeBtn.firstChild.nodeValue;
      if(active !== displayedValue.firstChild.nodeValue)
      {
        displayedValue.firstChild.nodeValue = active;
      }
    } else {
        displayedValue.firstChild.nodeValue = '--';
    }
  }

  /**
   * Export the editor to the textarea field
   */
  exportToTextarea() {
    var value = this.editor.getHTML() !== '<p></p>' ? this.editor.getHTML() : null;
    this.textarea.value = value;
  }

  /*
  |--------------------------------------------------------------------------
  | BUTTONS
  |--------------------------------------------------------------------------
  */

  bold() {
    this.buttons.bold.addEventListener('click', () => this.editor.chain().toggleBold().focus().run());
  }

  italic() {
    this.buttons.italic.addEventListener('click', () => this.editor.chain().toggleItalic().focus().run());
  }

  underline() {
    this.buttons.underline.addEventListener('click', () => this.editor.chain().toggleUnderline().focus().run());
  }

  strike() {
    this.buttons.strike.addEventListener('click', () => this.editor.chain().toggleStrike().focus().run());
  }

  heading() {
    this.buttons.headings.forEach(btn => {
      btn.addEventListener('click', event => {
        var value = this.getButtonValue(event);
        this.editor.chain().focus().toggleHeading({ level: parseInt(value)}).run();
      });
    });
  }

  blockquote(){
    this.buttons.blockquote.addEventListener('click', event => {
      var command = this.editor.chain().focus();
      // If it's a blockquote it can't be a div !
      if(this.editor.isActive('div'))
      {
        command.unsetDiv();
      }
      command.toggleBlockquote().run();
    });
  }

  list() {
    if(this.buttons.bulletlist)
    {
      this.buttons.bulletlist.addEventListener('click', () => this.editor.chain().focus().toggleBulletList().run());
    }
    if(this.buttons.orderedlist)
    {
      this.buttons.orderedlist.addEventListener('click', () => this.editor.chain().focus().toggleOrderedList().run());
    }
  }

  link() {
    this.buttons.link.addEventListener('click', () => {

      // Define href of link
      var href = null;

      // If not already a link
      if(!this.editor.isActive('link'))
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

  table() {
      this.buttons.tables.forEach(btn => {
        btn.addEventListener('click', event => {
          var value = this.getButtonValue(event);
          switch (value) {
            case 'create':
              this.editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: false }).run();
              break;
            case 'delete':
              this.editor.chain().focus().deleteTable().run();
              break;
            case 'col-before':
              this.editor.chain().focus().addColumnBefore().run();
              break;
            case 'col-after':
              this.editor.chain().focus().addColumnAfter().run();
              break;
            case 'col-delete':
              this.editor.chain().focus().deleteColumn().run();
              break;
            case 'row-above':
              this.editor.chain().focus().addRowBefore().run();
              break;
            case 'row-below':
              this.editor.chain().focus().addRowAfter().run();
              break;
            case 'row-delete':
              this.editor.chain().focus().deleteRow().run();
              break;
            default:
          }

        });
      });
      
  }

  color() {
    this.buttons.colors.forEach(btn => {
      btn.addEventListener('click', event => {
        var value = this.getButtonValue(event);
        this.editor.chain().toggleColor(value).focus().run();
      });
    });
  }

  paragraph() {
    this.buttons.paragraphs.forEach(btn => {
      btn.addEventListener('click', event => {
        var value = this.getButtonValue(event);
        if(this.editor.isActive('paragraph',{ class: value }) || value == 'null')
        {
          this.editor.chain().focus().unsetParagraph().run();
        } else {
          this.editor.chain().focus().setParagraph(value).run();
        }
      });
    });
  }

  div() {
    this.buttons.divs.forEach(btn => {
      btn.addEventListener('click', event => {
          var value = this.getButtonValue(event);

          var command =  this.editor.chain().focus();

          // If it's a blockquote it can't be a div !
          if(this.editor.isActive('blockquote'))
          {
            command.unsetBlockquote();
          }

          if(this.editor.isActive('div',{ class: value }))
          {
            command.unsetDiv().run();
          } if(this.editor.isActive('div')) {
            command.unsetDiv().setDiv(value).run();
          } else {
            command.setDiv(value).run();
          }
      });
    });
  }

  emoji(){
    this.buttons.emojis.forEach(btn => {
      btn.addEventListener('click', event => {
          var value = this.getButtonValue(event);
          this.editor.chain().focus().setEmoji(value).run();
      });
    });
  }

  clear() {
    this.buttons.clear.addEventListener('click', (event) => {
      this.editor.commands.clearNodes();
      this.editor.commands.unsetAllMarks();
    });
  }

}

