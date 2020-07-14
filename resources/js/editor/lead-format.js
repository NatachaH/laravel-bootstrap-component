/*
|--------------------------------------------------------------------------
| Editor - Smart break - Script
|--------------------------------------------------------------------------
|
| The SmartBreak will make able to add a line break in a paragraphe
| Plugin: https://quilljs.com/
|
*/

import Quill from 'Quill';

const Block = Quill.import('blots/block');

class LeadFormat extends Block
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

LeadFormat.blotName = 'lead';
LeadFormat.className = 'lead';


export default LeadFormat;
