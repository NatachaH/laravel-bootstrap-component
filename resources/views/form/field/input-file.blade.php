{{-- Bootstrap 5
<div class="form-file {{ !empty($size) ? 'form-file-'.$size : '' }}">
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
--}}

<div class="custom-file">
  <input
    type="file"
    name="{{ $name }}"
    class="custom-file-input @error($name) is-invalid @enderror"
    id="{{ $name.'Field' }}"
    @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
  >
  <label class="custom-file-label" for="customFile">{{ $placeholder }}</label>
</div>
