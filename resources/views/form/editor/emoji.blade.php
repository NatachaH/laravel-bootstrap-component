<div class="btn-group editor-emoji" role="group">

    <button type="button" class="btn dropdown-toggle editor-dropdown-emoji" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.emoji')" title="@lang('bs-component::editor.emoji')">
      <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
      </svg>
    </button>

    <div class="dropdown-menu p-0">

      <div class="row row-cols-4">

        @foreach ($emojis as $emoji)
            <button type="button" class="col btn editor-btn-emoji" value="{{ $emoji }}">
              <i class="{{ $emoji }}"></i>
            </button>
        @endforeach

      </div>

    </div>
</div>
