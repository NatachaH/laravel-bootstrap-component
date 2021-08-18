import ItalicOriginal from '@tiptap/extension-italic'

const Italic = ItalicOriginal.extend({

  parseHTML() {
    return [
      {
        tag: 'em',
      },
      {
        tag: 'i',
        getAttrs: element => {
          const hasClasses = !element.hasAttribute('class');
          return hasClasses ? {} : false;
        },
        //getAttrs: node => (node as HTMLElement).style.fontStyle !== 'normal' && null,
      },
      {
        style: 'font-style=italic',
      },
    ]
  },

});

export default Italic;
