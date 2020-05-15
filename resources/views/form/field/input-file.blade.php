{{-- Bootstrap 5
<div class="form-file {{ !empty($size) ? 'form-file-'.$size : '' }}">
  <input
    type="file"
    name="{{ $name }}"
    class="form-file-input @error($cleanName) is-invalid @enderror"
    id="{{ $cleanName.'Field' }}"
    @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
  />
  <label class="form-file-label" for="customFileDisabled">
    <span class="form-file-text">{{ $placeholder }}</span>
    <span class="form-file-button">{{ $button }}</span>
  </label>
</div>
--}}

<div class="custom-file">
  <input
    type="file"
    name="{{ $name }}"
    class="custom-file-input @error($cleanName) is-invalid @enderror"
    id="{{ $cleanName.'Field' }}"
    @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
  >
  <label class="custom-file-label" for="customFile">{{ $placeholder }}</label>
  @error($cleanName)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
