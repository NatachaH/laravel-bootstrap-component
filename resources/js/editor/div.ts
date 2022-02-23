import {Command,Node,mergeAttributes} from '@tiptap/core'

const Div = Node.create({
  name: 'div',

  defaultOptions: {
    HTMLAttributes: {},
  },

  content: 'block*',

  group: 'block',

  defining: true,

  addAttributes() {
    return {
      class: {
        default: null
      }
    }
  },

  parseHTML() {
    return [{
      tag: 'div',
      getAttrs: element => {
        const hasClasses = element.hasAttribute('class')
        return hasClasses ? {} : false;
      },
    }]
  },

  renderHTML({ node, HTMLAttributes }) {
    return ['div', mergeAttributes(this.options.HTMLAttributes, HTMLAttributes), 0]
  },

  addCommands() {
    return {
      setDiv: (style) => ({ commands }) => {
        return commands.wrapIn('div', {class:style})
      },
      toggleDiv: (style) => ({ commands }) => {
        return commands.toggleWrap('div', {class:style})
      },
      unsetDiv: () => ({ commands }) => {
        return commands.lift('div')
      },
    }
  },
});

export default Div;
