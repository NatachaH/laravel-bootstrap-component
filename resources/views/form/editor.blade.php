<div {{ $attributes }}>

    @if($label)
      <label for="{{ $name.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
    @endif

    <div class="editor">

          <div class="editor-toolbar">

            @includeWhen(in_array('font',$toolbar), 'bs-component::form.editor.font', ['headings' => $headings,'paragraphs' => $paragraphs])
            @includeWhen(in_array('div',$toolbar), 'bs-component::form.editor.div', ['divs' => $divs])
            @includeWhen(in_array('format',$toolbar), 'bs-component::form.editor.format', ['formats' => $formats])
            @includeWhen(in_array('list',$toolbar), 'bs-component::form.editor.list')
            @includeWhen(in_array('link',$toolbar), 'bs-component::form.editor.link')
            @includeWhen(in_array('color',$toolbar), 'bs-component::form.editor.color', ['colors' => $colors])
            @includeWhen(in_array('emoji',$toolbar), 'bs-component::form.editor.emoji', ['emojis' => $emojis])
            @includeWhen(in_array('table',$toolbar), 'bs-component::form.editor.table')

            <div class="btn-group" role="group">
              <button type="button" class="btn editor-btn-clear" aria-label="@lang('bs-component::editor.clean')" title="@lang('bs-component::editor.clean')">
                <svg class="editor-icon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                </svg>
              </button>
            </div>

          </div>

          <div class="editor-container @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif"></div>

          <textarea class="editor-textarea" name="{{ $name }}">{!! old($name,$value) !!}</textarea>
    </div>

    <small class="form-text">{!! __('bs-component::editor.line-break') !!}</small>

    @if($help)
      <small id="{{ $name.'FieldHelp' }}" class="form-text">{!! $help !!}</small>
    @endif

    @error($cleanName,$errorBag)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

    @if($errorRelated)
      @error($errorRelated,$errorBag)
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
      @enderror
    @endif

</div>
