import TextStyle from '@tiptap/extension-text-style'

const Span = TextStyle.extend({

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

});

export default Span;
