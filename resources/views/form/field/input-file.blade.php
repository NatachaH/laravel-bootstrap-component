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
