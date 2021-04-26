<div class="btn-group editor-font" role="group">

    <button type="button" class="btn dropdown-toggle editor-dropdown-font" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.heading')" title="@lang('bs-component::editor.font')">
      <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M14 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M1.5 2.5A1.5 1.5 0 013 1h10a1.5 1.5 0 011.5 1.5v4h-1v-4A.5.5 0 0013 2H3a.5.5 0 00-.5.5v4h-1v-4zm1 7v4a.5.5 0 00.5.5h10a.5.5 0 00.5-.5v-4h1v4A1.5 1.5 0 0113 15H3a1.5 1.5 0 01-1.5-1.5v-4h1z" clip-rule="evenodd"/>
        <path d="M11.434 4H4.566L4.5 5.994h.386c.21-1.252.612-1.446 2.173-1.495l.343-.011v6.343c0 .537-.116.665-1.049.748V12h3.294v-.421c-.938-.083-1.054-.21-1.054-.748V4.488l.348.01c1.56.05 1.963.244 2.173 1.496h.386L11.434 4z"/>
      </svg>
      <small>
        @lang('bs-component::editor.paragraph')
      </small>
    </button>

    <div class="dropdown-menu p-0" >

      @if($headings)
        @foreach ($headings as $heading)
          <button class="dropdown-item editor-btn-heading" value="{{ $heading }}">
            @lang('bs-component::editor.h'.$heading)
          </button>
        @endforeach
        <hr class="dropdown-divider">
      @endif

      <button class="dropdown-item editor-btn-paragraph" value="null">
        @lang('bs-component::editor.paragraph')
      </button>

      @if($paragraphs)
        @foreach ($paragraphs as $paragraph)
          <button class="dropdown-item editor-btn-paragraph" value="{{ $paragraph }}">
            {{ \Lang::has('bs-component::editor.'.$paragraph) ? __('bs-component::editor.'.$paragraph) : (\Lang::has('editor.'.$paragraph) ? __('editor.'.$paragraph) : $paragraph) }}
          </button>
        @endforeach
      @endif

      @if($divs)

        <hr class="dropdown-divider">

        @foreach ($divs as $div)
          @if($div == 'blockquote')
            <button class="dropdown-item editor-btn-blockquote">
              @lang('bs-component::editor.blockquote')
            </button>
          @else
            <button class="dropdown-item editor-btn-div" value="{{ $div }}">
              {{ \Lang::has('bs-component::editor.'.$div) ? __('bs-component::editor.'.$div) : (\Lang::has('editor.'.$div) ? __('editor.'.$div) : $div) }}
            </button>
          @endif
        @endforeach
      @endif

    </div>
</div>
