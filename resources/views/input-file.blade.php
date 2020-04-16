<div {{ $attributes }}>

  @if($label)
    <label for="{{ $name.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  <div class="form-file {{ $size }}">
    <input
      type="file"
      name="{{ $name }}"
      class="form-file-input @error($name) is-invalid @enderror"
      id="{{ $name.'Field' }}"
      @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
      {{ $isDisabled ? 'disabled' : ''}}
      {{ $isRequired ? 'required' : ''}}
    />
    <label class="form-file-label" for="customFileDisabled">
      <span class="form-file-text">{{ $placeholder }}</span>
      <span class="form-file-button">{{ $button }}</span>
    </label>
  </div>

  @if($help)
    <small id="{{ $name.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($name)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror

</div>
