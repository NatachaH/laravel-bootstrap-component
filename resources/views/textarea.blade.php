<div {{ $attributes }}>

  @if($label)
    <label for="{{ $name.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  <textarea
    name="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror"
    id="{{ $name.'Field' }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
    {{ $isReadonly ? 'readonly' : '' }}
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
  >{{ old($name,$value) }}</textarea>

  @if($help)
    <small id="{{ $name.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($name)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror

</div>
