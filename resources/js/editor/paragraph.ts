import Paragraph from '@tiptap/extension-paragraph'

const CustomParagraph = Paragraph.extend({


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
        tag: 'p',
        getAttrs: element => {
          const hasClasses = element.hasAttribute('class')
          return hasClasses ? {} : false;
        },
      },
    ]
  },

  addCommands() {
    return {
      setParagraph: (style) => ({ commands }) => {
        return commands.setNode('paragraph', {class:style})
      },
      toggleParagraph: (style) => ({ commands }) => {
        return commands.toggleNode('paragraph', {class:style})
      },
      unsetParagraph: () => ({ commands }) => {
        return commands.clearNodes()
      },
    }
  },

});

export default CustomParagraph;
