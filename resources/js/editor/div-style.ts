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
            renderHTML: attributes => {
              if (!attributes.divStyle) {
                return {}
              }
              return {
                class: attributes.divStyle.class,
              }
            },
            parseHTML: element => ({
              class: element.getAttribute('class').replace(/['"]+/g, ''),
            }),
          },
        },
      },
    ]
  },

  addCommands() {
    return {
      setDivStyle: (style) => ({ commands }) => {
        return this.options.types.every(type => commands.updateAttributes(type, { divStyle: {class:style} }))
      },
      unsetDivStyle: () => ({ commands }) => {
        return this.options.types.every(type => commands.resetAttributes(type, 'divStyle'))
      },
    }
  },
});

export default DivStyle;
