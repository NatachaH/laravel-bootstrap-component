<div {{ $attributes }}>

    @if($label)
      <label for="{{ $name.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
    @endif

    <div class="editor">

          <div class="ql-toolbar btn-toolbar">

            @includeWhen(in_array('header',$toolbar), 'bs-component::form.editor.header', ['headers' => $headers])
            @includeWhen(in_array('format',$toolbar), 'bs-component::form.editor.format', ['formats' => $formats])
            @includeWhen(in_array('list',$toolbar), 'bs-component::form.editor.list')
            @includeWhen(in_array('link',$toolbar), 'bs-component::form.editor.link')
            @includeWhen(in_array('code',$toolbar), 'bs-component::form.editor.code')
            @includeWhen(in_array('color',$toolbar), 'bs-component::form.editor.color', ['colors' => $colors])


            <div class="ql-formats btn-group">
              <button class="btn ql-clean" aria-label="@lang('bs-component::editor.clean')">
                <svg class="bi bi-slash-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                </svg>
              </button>
            </div>

          </div>

          <div class="ql-container @error($cleanName) is-invalid @enderror">{!! old($name,$value) !!}</div>

          <textarea class="ql-textarea" name="{{ $name }}"></textarea>
    </div>

    <small class="form-text text-muted">{!! __('bs-component::editor.line-break') !!}</small>

    @if($help)
      <small id="{{ $name.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
    @endif

    @error($cleanName)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>
