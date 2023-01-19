<div class="btn-group editor-div" role="group">

    <button type="button" class="btn dropdown-toggle editor-dropdown-div" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.div')" title="@lang('bs-component::editor.div')">
      <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
      </svg>
      <small>
        --
      </small>
    </button>

    <div class="dropdown-menu p-0" >

      @if($divs)
        @foreach ($divs as $div)
          @if($div == 'blockquote')
            <button type="button" class="dropdown-item editor-btn-blockquote">
              @lang('bs-component::editor.blockquote')
            </button>
          @else
            <button type="button" class="dropdown-item editor-btn-div" value="{{ $div }}">
              {{ \Lang::has('bs-component::editor.'.$div) ? __('bs-component::editor.'.$div) : (\Lang::has('editor.'.$div) ? __('editor.'.$div) : $div) }}
            </button>
          @endif
        @endforeach
      @endif

    </div>
</div>
