/*
|--------------------------------------------------------------------------
| Editor - highlight block - Script
|--------------------------------------------------------------------------
|
| The SmartBreak will make able to add a line break in a paragraphe
| Plugin: https://quilljs.com/
|
*/

import Quill from 'Quill';

const Block = Quill.import('blots/block');

class HighlightblockFormat extends Block
{

    static create(value){
        let node = super.create();
        node.setAttribute('class',this.className);
        return node;
    }

    static formats(domNode) {
      return true;
    }

}

HighlightblockFormat.blotName = 'highlightblock';
HighlightblockFormat.className = 'highlight-block';

export default HighlightblockFormat;
