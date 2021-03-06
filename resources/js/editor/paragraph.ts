import Paragraph from '@tiptap/extension-paragraph'

const CustomParagraph = Paragraph.extend({

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

});

export default CustomParagraph;
