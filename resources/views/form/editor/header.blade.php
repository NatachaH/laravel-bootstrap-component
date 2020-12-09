<div class="ql-formats btn-group">

    <button type="button" class="btn dropdown-toggle ql-dropdown-header" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.heading')">
      <svg class="bi bi-textarea-t" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M14 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 9a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M1.5 2.5A1.5 1.5 0 013 1h10a1.5 1.5 0 011.5 1.5v4h-1v-4A.5.5 0 0013 2H3a.5.5 0 00-.5.5v4h-1v-4zm1 7v4a.5.5 0 00.5.5h10a.5.5 0 00.5-.5v-4h1v4A1.5 1.5 0 0113 15H3a1.5 1.5 0 01-1.5-1.5v-4h1z" clip-rule="evenodd"/>
        <path d="M11.434 4H4.566L4.5 5.994h.386c.21-1.252.612-1.446 2.173-1.495l.343-.011v6.343c0 .537-.116.665-1.049.748V12h3.294v-.421c-.938-.083-1.054-.21-1.054-.748V4.488l.348.01c1.56.05 1.963.244 2.173 1.496h.386L11.434 4z"/>
      </svg>
      <small>
        @lang('bs-component::editor.paragraphe')
      </small>
    </button>

    <div class="dropdown-menu p-0" >

          <button class="dropdown-item p-3 ql-header" value="">
            @lang('bs-component::editor.paragraphe')
          </button>

          @foreach ($headers as $header)

              @switch($header)
                  @case('lead')
                    <button class="dropdown-item p-3 ql-lead">
                      @lang('bs-component::editor.lead')
                    </button>
                  @break

                  @case('blockquote')
                    <button class="dropdown-item p-3 ql-blockquote">
                      @lang('bs-component::editor.blockquote')
                    </button>
                  @break

                  @default
                    <button class="dropdown-item p-3 ql-header" value="{{ $header }}">
                      @lang('bs-component::editor.h'.$header)
                    </button>
              @endswitch

          @endforeach



    </div>
</div>
