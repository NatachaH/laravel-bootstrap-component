import {Command,Mark,mergeAttributes} from '@tiptap/core'

const Color = Mark.create({
  name: 'color',

  defaultOptions: {
    HTMLAttributes: {},
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
          const hasClasses = element.hasAttribute('class');
          var hasColorClass = false;

          element.classList.forEach(el => {
            if(el.match('^text-')) {
              hasColorClass = true;
            };
          });

          return hasClasses && hasColorClass ? {} : false;
        },
      },
    ]
  },

  renderHTML({ HTMLAttributes }) {
    return ['span', mergeAttributes(this.options.HTMLAttributes, HTMLAttributes), 0]
  },

  addCommands() {
    return {
      setColor: value => ({ commands }) => {
        return commands.setMark('color', {class:value});
      },
      toggleColor: value => ({ commands }) => {
        return commands.toggleMark('color',{class:value});
      },
      unsetColor: () => ({ commands }) => {
        return commands.unsetMark('color');
      },
    }
  },
});

export default Color;
