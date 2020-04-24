<input
  type="{{ $type }}"
  name="{{ $name }}"
  value="{{ old($name,$value) }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($name) is-invalid @enderror"
  id="{{ $name.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
/>
