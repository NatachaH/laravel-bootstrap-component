import {Command,Mark,mergeAttributes} from '@tiptap/core'

const Color = Mark.create({
  name: 'color',

  defaultOptions: {
    types: ['textStyle'],
  },

  addAttributes() {
    return {
      class: {
        default: null
      }
    }
  },

  parseHTML() {
    return [
      {
        tag: 'span',
        getAttrs: element => {
          const hasClasses = element.hasAttribute('class')
          return hasClasses ? {} : false;
        },
      },
    ]
  },

  renderHTML({ HTMLAttributes }) {
    return ['span', mergeAttributes(this.options.HTMLAttributes, HTMLAttributes), 0]
  },

  addGlobalAttributes() {
    return [
      {
        types: this.options.types,
        attributes: {
          color: {
            default: null,
            renderHTML: attributes => ({
              class: attributes.color,
            })
          },
        },
      },
    ]
  },


  addCommands() {
    return {
      setColor: color => ({ commands }) => {
        return commands.setMark('textStyle', {color});
      },
      toggleColor: color => ({ commands }) => {
        return commands.toggleMark('textStyle',{color});
      },
      unsetColor: () => ({ commands }) => {
        return commands.unsetMark('textStyle');
      },
    }
  },
});

export default Color;
