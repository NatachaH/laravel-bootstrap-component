import {Command,Node} from '@tiptap/core'

const ParagraphStyle = Node.create({
  name: 'paragraphStyle',

  defaultOptions: {
    types: ['paragraph']
  },

  addGlobalAttributes() {
    return [
      {
        types: this.options.types,
        attributes: {
          paragraphStyle: {
            default: null,
            renderHTML: attributes => ({
              class: attributes.paragraphStyle,
            })
          },
        },
      },
    ]
  },

  addCommands() {
    return {
      setParagraphStyle: (style) => ({ commands }) => {
        return this.options.types.every(type => commands.updateAttributes(type, { paragraphStyle: style }))
      },
      unsetParagraphStyle: () => ({ commands }) => {
        return this.options.types.every(type => commands.resetAttributes(type, 'paragraphStyle'))
      },
    }
  },
});

export default ParagraphStyle;
