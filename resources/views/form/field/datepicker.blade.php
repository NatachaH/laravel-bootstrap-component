<input
  type="text"
  name="{{ $name }}"
  value="{{ old($cleanName,$value) }}"
  class="form-control date-picker {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName) is-invalid @enderror"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
  data-mode="{{ $mode }}"
  data-format="{{ $format }}"
  data-min-date="{{ $min }}"
  data-max-date="{{ $max }}"
  data-min-date-input="{{ $minInput }}"
  data-max-date-input="{{ $maxInput }}"
/>
