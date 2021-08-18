import {Command,Node,mergeAttributes} from '@tiptap/core'

const Emoji = Node.create({

  name: 'emoji',

  defaultOptions: {
    HTMLAttributes: {},
  },

  group: 'inline',

  inline: true,

  selectable: true,

  atom: false,

  addAttributes() {
    return {
      class: {
        default: 'emoji'
      }
    }
  },

  parseHTML() {

    return [{
      tag: 'span',
      getAttrs: element => {
        const hasClasses = element.hasAttribute('class') && element.classList.contains('emoji');
        return hasClasses ? {} : false;
      },
    }]
  },

  renderHTML({ node, HTMLAttributes }) {
    return ['span', mergeAttributes(this.options.HTMLAttributes, HTMLAttributes), 0]
  },

  addCommands() {
    return {

      setEmoji: (value) => ({ commands,state }) => {

        var position = state.selection.anchor + 3;

        commands.insertContent(' ');

        commands.insertContent({
          type: 'emoji',
          attrs: {
            class: 'emoji ' + value
          }
        });

        commands.insertContent(' ');

        commands.focus(position)

        return true;

      }
    }
  },
});

export default Emoji;
