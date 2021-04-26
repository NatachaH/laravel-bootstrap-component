import {Command,Node} from '@tiptap/core'

const DivStyle = Node.create({
  name: 'divStyle',

  defaultOptions: {
    types: ['div']
  },

  addGlobalAttributes() {
    return [
      {
        types: this.options.types,
        attributes: {
          divStyle: {
            default: null,
            renderHTML: attributes => ({
              class: attributes.divStyle,
            })
          },
        },
      },
    ]
  },

  addCommands() {
    return {
      setDivStyle: (style) => ({ commands }) => {
        return this.options.types.every(type => commands.updateAttributes(type, { divStyle: style }))
      },
      unsetDivStyle: () => ({ commands }) => {
        return this.options.types.every(type => commands.resetAttributes(type, 'divStyle'))
      },
    }
  },
});

export default DivStyle;
