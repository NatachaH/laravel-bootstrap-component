<div class="btn-group editor-color" role="group">

    <button type="button" class="btn dropdown-toggle editor-dropdown-color" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.color')" title="@lang('bs-component::editor.color')">
      <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 01-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 005.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0010 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" clip-rule="evenodd"/>
      </svg>
    </button>

    <div class="dropdown-menu p-0" >

      <div class="row row-cols-4">

        @foreach ($colors as $color)
            <button type="button" class="col btn editor-btn-color" value="text-{{ $color }}">
              <svg class="editor-icon text-{{ $color }}" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <rect width="16" height="16" rx="2"/>
              </svg>
            </button>
        @endforeach

      </div>

    </div>
</div>
