<div class="btn-group editor-font" role="group">

  <button type="button" class="btn dropdown-toggle editor-dropdown-font" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.heading')" title="@lang('bs-component::editor.font')">
    <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path d="M10.943 4H5.057L5 6h.5c.18-1.096.356-1.192 1.694-1.235l.293-.01v6.09c0 .47-.1.582-.898.655v.5H9.41v-.5c-.803-.073-.903-.184-.903-.654V4.755l.298.01c1.338.043 1.514.14 1.694 1.235h.5l-.057-2z"/>
      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>    
    </svg>
    <small>
      @lang('bs-component::editor.paragraph')
    </small>
  </button>

  <div class="dropdown-menu p-0" >

    @if($headings)
      @foreach ($headings as $heading)
        <button type="button" class="dropdown-item editor-btn-heading" value="{{ $heading }}">
          @lang('bs-component::editor.h'.$heading)
        </button>
      @endforeach
      <hr class="dropdown-divider">
    @endif


    @if($paragraphs)
      @foreach ($paragraphs as $paragraph)
        @if($paragraph === 'p')
          <button type="button" class="dropdown-item editor-btn-paragraph" value="null">
            @lang('bs-component::editor.paragraph')
          </button>
        @else 
          <button type="button" class="dropdown-item editor-btn-paragraph" value="{{ $paragraph }}">
            {{ \Lang::has('bs-component::editor.'.$paragraph) ? __('bs-component::editor.'.$paragraph) : (\Lang::has('editor.'.$paragraph) ? __('editor.'.$paragraph) : $paragraph) }}
          </button>
        @endif
      @endforeach
    @else
      <button type="button" class="dropdown-item editor-btn-paragraph" value="null">
        @lang('bs-component::editor.paragraph')
      </button>
    @endif

  </div>
</div>
